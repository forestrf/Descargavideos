<?php

class Tvmelilla extends cadena{

function calcula(){
preg_match('@video.php\?v=(.*?)$@', $this->web, $matches);

dbug_r($matches);

if (enString($matches[1], '.mp4')) {
	$url = 'http://www.tvmelilla.es/videoalacarta/'.$matches[1];
	
	$imagen=strtr($url, array(".mp4"=>".jpg"));
	dbug('imagen = '.$imagen);
	
	$titulo=utf8_encode(entre1y2($this->web_descargada,'<title>','<'));
	dbug('titulo = '.$titulo);
	
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

} else {
	$vimeo = new Vimeo();
	$vimeoURL = 'http://vimeo.com/'.$matches[1];
	$vimeoWeb_descargada = CargaWebCurl($vimeoURL);
	$vimeo->init($vimeoURL, $vimeoWeb_descargada);
	
	$obtenido = $vimeo->calcula();
}

finalCadena($obtenido);
}

}
