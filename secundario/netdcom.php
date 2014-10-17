<?php

class Netdcom extends cadena{

function calcula(){

$titulo=entre1y2($this->web_descargada,'<title>','<');
dbug('titulo = '.$titulo);

if(preg_match('@http://media.*?\.mp4@', $this->web_descargada, $matches)){
	
	$imagen=entre1y2_a($this->web_descargada, strposF($this->web_descargada,'"og:image"'), '"', '"');
	dbug('imagen = '.$imagen);

	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url'  => $matches[0],
				'tipo' => 'http'
			)
		)
	);
	
} else {
	preg_match('@#player-container \.player-display.*?url.*?\'(.*?)\'@', $this->web_descargada, $matches);
	
	dbug_r($matches);
	
	$urlPreM3U8='http://www.netd.com'.$matches[1];
	
	$ret=CargaWebCurl($urlPreM3U8);
	
	dbug_($ret);
	
	preg_match('@defaultServiceUrl.*?\'(.*?)\'.*?path.*?\'(.*?)\'@', $ret, $matches);
	dbug_r($matches);
	
	$url=$matches[1].'/'.$matches[2];
	dbug('URL = '.$url);
	
	preg_match('@preview.*?\'(.*?)\'@', $ret, $matches);
	$imagen='http:'.$matches[1];
	dbug('imagen = '.$imagen);
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url'  => $url,
				'tipo' => 'm3u8'
			)
		)
	);
}

finalCadena($obtenido);
}

}
