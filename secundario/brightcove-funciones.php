<?php

require_once __DIR__.'/SabreAMF/Message.php';

function brightcove_encode($string){
	$stream = new SabreAMF_OutputStream();
	$message = new SabreAMF_Message();
	$message->addBody($string);
	//$message->setEncoding(SabreAMF_Const::AMF3);
	$message->setEncoding(SabreAMF_Const::MIMETYPE);
	$message->serialize($stream);

	$data = $stream->getRawData();
	//strtr concierte de amf0 a amf3
	//return $data;
	
	//Arreglo para Google App Engine
	$data = strtr($data, array("\x7F"=>"\xFF"));
	
	
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

function brightcove_genera_obtenido($base, $config, $titulo = ''){
	$obtenido2 = array();
	
	foreach($config as $pathBase => $tipoObtenido){
		dbug($pathBase);
		$IOSRenditions = $base[$pathBase];
		for($i=0; $i<$i_total=Count($IOSRenditions); $i++){
			$temp=$IOSRenditions[$i]->getAMFData();
			URLSDelArrayBrightCove($temp, $tipoObtenido, $obtenido2, $titulo);
		}
	}
	
	//ordenar usando ['calidad_ordenar']
	for($i=0; $i<=$i_total=Count($obtenido2)-1; $i++){
		for($j=$i+1; $j<=$i_total; $j++){
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
	for($i=0; $i<$i_total=Count($obtenido2); $i++)
		unset($obtenido2[$i]['calidad_ordenar']);
	
	//sacar 'url-txt' a otro res de solo 'titulo'
	$obtenido_enlaces_temp=array();
	for($i=0; $i<$i_total=Count($obtenido2); $i++){
		$obtenido_enlaces_temp[]=$obtenido2[$i];
	}
	return $obtenido_enlaces_temp;
}

?>