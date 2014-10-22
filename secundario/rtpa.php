<?php

class Rtpa extends cadena{

//esta web trabaja con webs con espacios (" ") sin %20 incluso en las imágenes
function calcula(){
//titulo
//<p class="fecha">08-05-2012</p>
//<p class="programa">Objetivo Asturias</p>

//<meta property="og:title" content=" La Agencia Tributaria inició hace cuatro meses una investigación fiscal en el Montepío de la Minería" />

$p = strpos($this->web_descargada, 'og:title');
$titulo=entre1y2_a($this->web_descargada, $p, 'content="', '"');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//&image=fotos//11/10/121317639014_Cabecera Objetivo Asturias.jpg&
//imagen
$p=strposF($this->web_descargada,"'image':");
$imagen = entre1y2_a($this->web_descargada, $p, "'", "'");
dbug('imagen='.$imagen);

$p=strposF($this->web_descargada,"'file'");
$url=entre1y2_a($this->web_descargada,$p,"'", "'");
dbug($url);

dbug("A");
if(!stringContains($url, array(".mp4",".flv"))){
	dbug("B");
	// Probemos con la api de json
	$apiURL = "http://rtpa.es/api/muestra_json_vod.php?id_programa=".entre1y2($this->web_descargada, "id_programa=", "&");
	$apiResp = CargaWebCurl($apiURL);
	dbug($apiResp);
	$apiResp = json_decode($apiResp, true);
	dbug_r($apiResp);
	
	$imagen = $apiResp['VOD'][0]['url_imagen'];
	dbug('imagen='.$imagen);
	
	$titulo = $apiResp['VOD'][0]['nombre_programa'];
	dbug('$titulo='.$titulo);
	
	$url = "http://rtpa.ondemand.flumotion.com/rtpa/ondemand/vod/".$apiResp['VOD'][0]['id_programacion']."_1.mp4";
	dbug($url);
	
	// http://www.rtpa.es/programa:EMBAJADORES_1393094582.html
	// http://rtpa.es/api/muestra_json_vod.php?id_programa=1393094582
	// http://rtpa.ondemand.flumotion.com/rtpa/ondemand/vod/66103_1.mp4?start=0
	
}

//no borrar hasta confirmar que rtpa ya no tiene listas de reproduccion
/*
if(enString($retfull,"reproductorVideoOnDemmand-mp4-rtpa.swf")){
	//<source src="http://asturiastv.eu/vod/2012/04/20120417TPANOTICIAS1_1.mp4" type="video/mp4">
	$p=strpos($ret,'<source src="')+13;
	$f=strpos($ret,'"', $p);
	$ret=substr($ret, $p, $f-$p);
	//ret ya tiene el enlace. fue rapido
}
if(enString($retfull,"reproductorVideoOnDemmand.swf")){
	//<source src="http://asturiastv.eu/vod/2012/04/20120417TPANOTICIAS1_1.mp4" type="video/mp4">
	$p=strpos($ret,'partes=')+7;
	$f=strpos($ret,'&',$p);
	$partes=substr($ret,$p,$f-$p);

	$files=array();

	for($i=1;$i<$partes+1;$i++){
		$nvideo="video".$i."=";
		$p=strpos($retfull,$nvideo,$lastpos)+strlen($nvideo);
		$f=strpos($retfull,'&',$p);
		$temp=substr($retfull,$p,$f-$p);
		$temp='http://195.55.74.217/rtpa/ondemand/vod/'.$temp.'_'.$i.'.mp4';
		
		if(esVideoAudioAnon($temp)){
			$files[]=$temp;
			dbug('url='.$temp);
		}
		else
			dbug('debería haber una url pero no lo era');
	}
	$ret="";
	foreach($files as $value_display){
		//echo "</br>".$value_display."</br>";
		$ret.=$value_display."|";
	}
	$ret=substr($ret, 0, -1);
}
*/

$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $url,
			'tipo' => 'http'
		)
	)
);

finalCadena($obtenido);
}

}
