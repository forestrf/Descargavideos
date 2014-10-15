<?php

class Veoh extends cadena{

function calcula(){
//get the music_id
$ari=explode("/",$this->web);
$v_id=array_pop($ari);

dbug("http://www.veoh.com/rest/video/".$v_id."/details");

//retrieve xml files
$this->web_descargada=CargaWebCurl("http://www.veoh.com/rest/video/".$v_id."/details");

$c=strpos($this->web_descargada,"videoId");

//titulo
$titulo=entre1y2_a($this->web_descargada,$c,'title="','"');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//imagen
$imagen=entre1y2_a($this->web_descargada,$c,'fullHighResImagePath="','"');
dbug('imagen='.$imagen);

$url=entre1y2_a($this->web_descargada,$c,'fullPreviewHashPath="','"');

//yell it loud
$url=trim($url);
dbug($url);

$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'     => $url,
			'url_txt' => 'Descargar',
			'tipo'    => 'http'
		)
	)
);

finalCadena($obtenido);
}

}
