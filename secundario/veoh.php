<?php
function veoh(){
global $web,$web_descargada;
$ret=$web_descargada;
//$ret=CargaWebCurl($web);

//get the music_id
$ari=explode("/",$web);
$v_id=array_pop($ari);

dbug("http://www.veoh.com/rest/video/".$v_id."/details");

//retrieve xml files
$ret=CargaWebCurl("http://www.veoh.com/rest/video/".$v_id."/details");

$c=strpos($ret,"videoId");

//titulo
$p=strpos($ret,'title="',$c)+7;
$f=strpos($ret,'"',$p);
$titulo=substr($ret,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//imagen
$p=strpos($ret,'fullHighResImagePath="',$c)+22;
$f=strpos($ret,'"',$p);
$imagen=substr($ret,$p,$f-$p);
dbug('imagen='.$imagen);

$p=strpos($ret,'fullPreviewHashPath="',$c)+21;
$f=strpos($ret,'"',$p);
$url=substr($ret,$p,$f-$p);

//yell it loud
$url=trim($url);
dbug($url);

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