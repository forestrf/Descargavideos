<?php
//esta web trabaja con webs con espacios (" ") sin %20 incluso en las imágenes
function rtpa(){
global $web,$web_descargada;
$ret=$web_descargada;
//$ret=CargaWebCurl($web);

//titulo
//<p class="fecha">08-05-2012</p>
//<p class="programa">Objetivo Asturias</p>
$p=strpos($ret,'class="fecha">')+14;
$f=strpos($ret,'<',$p);
$titulof=substr($ret,$p,$f-$p);

$p=strpos($ret,'class="programa">')+17;
$f=strpos($ret,'<',$p);
$titulop=substr($ret,$p,$f-$p);

$titulo=$titulop.' - '.$titulof;
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//&image=fotos//11/10/121317639014_Cabecera Objetivo Asturias.jpg&
//imagen
$p=strpos($ret,"'image'")+7;
$p=strpos($ret,"'",$p)+1;
$f=strpos($ret,"'",$p);
$imagen='http://www.rtpa.es/'.substr($ret,$p,$f-$p);
dbug('imagen='.$imagen);

$p=strpos($ret,"'file'")+6;
$p=strpos($ret,"'",$p)+1;
$f=strpos($ret,"'",$p);
$url=substr($ret,$p,$f-$p);
dbug($url);

dbug("A");
if(!stringContains($url, array(".mp4",".flv"))){
	dbug("B");
	// Probemos con la api de json
	$apiURL = "http://rtpa.es/api/muestra_json_vod.php?id_programa=".entre1y2($ret, "id_programa=", "&");
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
?>