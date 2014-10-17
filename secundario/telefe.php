<?php

class Telefe extends cadena{

function calcula(){

if(preg_match("@playlist[\s\S]*?image.*?'([\s\S]*?)'[\s\S]*?sources[\s\S]*?'(http://.*?)'@i", $this->web_descargada, $matches)){
	dbug_r($matches);
	
	$url=$matches[2];
	dbug($url);
	
	$imagen=$matches[1];
	dbug('imagen='.$imagen);
}
elseif(preg_match("@['\"](https?://.+?token=.+?)['\"]@i", $this->web_descargada, $matches)){
	dbug_r($matches);
	
	$url=$matches[1];
	dbug($url);
	
	preg_match("@thumbail['\"].*?:.*?['\"](.+?)['\"]@i", $this->web_descargada, $matches);
	dbug_r($matches);
	
	$imagen=$matches[1];
	dbug('imagen='.$imagen);
}


$titulo=entre1y2($this->web_descargada,'<title>', '</title>');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);


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
