<?php

require_once __DIR__.'/SabreAMF/Message.php';

function brightcove_encode($string){
	$stream = new SabreAMF_OutputStream();
	$message = new SabreAMF_Message();
	$message->addBody($string);
	$message->setEncoding(SabreAMF_Const::AMF0);
	$message->serialize($stream);

	$data = $stream->getRawData();
	//strtr concierte de amf0 a amf3
	//return $data;
	
	return strtr($data,array("\x00\x00\x00\x00\x00\x01\x00"=>"\x00\x03\x00\x00\x00\x01\x00"));
}


function brightcove_decode($string){
	$stream = new SabreAMF_InputStream($string);
	$message = new SabreAMF_Message();
	$message->deserialize($stream);

	$t=$message->getBodies();
	
	return $t[0];
}

function brightcove_curl_web($url,$post){
	$r=array(
		"Connection: close",
		"Content-type: application/x-amf"
	);
	return CargaWebCurl($url,$post,0,"",$r);
}

function brightcove_genera_obtenido($dis = false, $base, $config, $titulo = ''){
	$obtenido2 = array();
	
	foreach($config as $pathBase => $tipoObtenido){
		dbug($pathBase);
		$IOSRenditions = $base[$pathBase];
		for ($i = 0, $i_t = count($IOSRenditions); $i < $i_t; $i++) {
			$temp=$IOSRenditions[$i]->getAMFData();
			if ($dis !== false) {
				$parameters = array($temp, $tipoObtenido, &$obtenido2, $titulo);
				call_user_func_array(array($dis, 'URLSDelArrayBrightCove'), $parameters);
			} else {
				URLSDelArrayBrightCove($temp, $tipoObtenido, $obtenido2, $titulo);
			}
		}
	}
	
	//ordenar usando ['calidad_ordenar']
	for($i=0, $i_t = count($obtenido2)-1; $i<=$i_t; $i++){
		for($j=$i+1; $j<=$i_t; $j++){
			//dbug("i:".$i." - j:".$j);
			if($obtenido2[$i]['calidad_ordenar']<$obtenido2[$j]['calidad_ordenar']){
				$temp=$obtenido2[$i];
				$obtenido2[$i]=$obtenido2[$j];
				$obtenido2[$j]=$temp;
			}
		}
	}
	dbug_r($obtenido2);
	//borrar ['calidad_ordenar']
	for($i=0, $i_t=count($obtenido2); $i<$i_t; $i++)
		unset($obtenido2[$i]['calidad_ordenar']);
	
	//sacar 'url-txt' a otro res de solo 'titulo'
	$obtenido_enlaces_temp=array();
	for($i=0, $i_t=count($obtenido2); $i<$i_t; $i++){
		$obtenido_enlaces_temp[]=$obtenido2[$i];
	}
	return $obtenido_enlaces_temp;
}

// Por defecto
function URLSDelArrayBrightCove($r, $tipo, &$obtenido_enlaces, $titulo){
	if($r["audioOnly"]!="1"){
		if($tipo === 'rtmpConcreto'){
			$_r = substr($r["defaultURL"], 0, strpos($r["defaultURL"], 'mp4'));
			$_r = substr($_r, 0, strrposF($_r, '/'));
			$_y = 'mp4'.entre1y2($r["defaultURL"], 'mp4', '?');
			$_ry = substr($r["defaultURL"], strpos($r["defaultURL"], '?'));
			dbug_($_r);
			dbug_($_y);
			dbug_($_ry);
			$obtenido_enlaces[]=array(
				'calidad_ordenar'=>$r["encodingRate"],
				'titulo'   => 'Calidad: '.floor($r["encodingRate"]/1000)." Kbps",
				'url'      => $r["defaultURL"],
				'tipo'     => $tipo,
				'rtmpdump' => '-r "'.$_r.$_ry.'" -y "'.$_y.$_ry.'" -o "'.$titulo.'.mp4"'
			);
		}
		else{
			$obtenido_enlaces[]=array(
				'calidad_ordenar'=>$r["encodingRate"],
				'titulo' => 'Calidad: '.floor($r["encodingRate"]/1000)." Kbps",
				'url'    => $r["defaultURL"],
				'tipo'   => $tipo
			);
		}
	}
}
