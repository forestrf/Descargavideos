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
elseif(preg_match("@/Api/Videos/GetSourceUrl/([0-9]+?)/0/@i", $this->web_descargada, $matches)){
	// http://test.telefe.com
	// http://telefe.com/media/18066023/nina-hero-2b.webm
	// http://telefe.com/Api/Videos/GetSourceUrl/476667/0/HTTP
	// http://pmd-telefe.edgesuite.net/TOK/Educando_A_Nina/201610/AR/TLF5581253-EDUCANDO_A_NINA-ARGENTINA.mp4?token=1477932889_8d40463a4caa95be79fa4deba59afbb4
	// http://pmd-telefe.edgesuite.net/TOK/Entre_Canibales/201508/AR/TLF3064820-ENTRE_CANIBALES-ARGENTINA.mp4?token=1477934405_d6163cd018307e9a7738c21a3667ac7e
	// http://telefe.com/Api/Videos/GetSourceUrl/475960/0/HTTP
	// http://pmd-telefe.edgesuite.net/TOK/Educando_A_Nina/201610/AR/TLF5575218-EDUCANDO_A_NINA-ARGENTINA.mp4?token=1477934897_0bb05f601dc731682a616e966f500abe
	dbug_r($matches);
	
	$url = 'http://telefe.com' . $matches[0] . 'HTTP';
	dbug($url);
	
	if (preg_match("@\"url\":\"(/media/([0-9]+?)/.+?\.jpg)\"@i", $this->web_descargada, $matches)) {
		$imagen = 'http://telefe.com' . $matches[1];
		dbug('imagen='.$imagen);
	}
}


$titulo=entre1y2($this->web_descargada,'<title>', '</title>');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);


$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'alerta_especifica' => 'Hace falta usar un Proxy de Argentina, como por ejemplo <a href="http://hola.org">Hola.org</a>.',
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
