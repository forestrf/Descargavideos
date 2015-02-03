<?php

class Ondaluztv extends cadena{

function calcula(){
	
	
	preg_match('#file:.*"(http.*?.mp4)"#', $this->web_descargada, $matches);
	dbug_r($matches);
	$url = $matches[1];
	
	$titulo = entre1y2($this->web_descargada, '<h6>', '</h6');
	$titulo = strip_tags($titulo);
	$titulo = limpiaTitulo($titulo);
	
	$imagen = entre1y2($this->web_descargada, '"og:image" content="', '"');
	
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
