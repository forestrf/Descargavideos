<?php

class Liveleak extends cadena{

function calcula(){
	//titulo
	$titulo='LiveLeak';
	dbug('titulo='.$titulo);
	
	//imagen
	$imagen=entre1y2($this->web_descargada, 'image: "', '"');
	dbug('imagen='.$imagen);
	
	if (enString($this->web_descargada, 'config: "')) {
		$config=entre1y2($this->web_descargada, 'config: "', '"');
		dbug_($config);
		$config = explode('&', $config);
		dbug_r($config);
		
		$url = '';
		foreach($config as $elem){
			if(strpos($elem, 'hd_file_url') === 0){
				$url = urldecode(substr($elem, strposF($elem, '=')));
				break;
			}
			if(strpos($elem, 'file_url') === 0){
				$url = urldecode(substr($elem, strposF($elem, '=')));
			}
		}
	} else {
		preg_match('#file: "(http.*?\.mp4.*?)"#', $this->web_descargada, $matches);
		dbug_r($matches);
		$url = $matches[1];
	}
	
	
	dbug_r($url);
	
	
	$obtenido = array(
		'titulo' => $titulo,
		'imagen' => $imagen,
		'enlaces' => array(
			array(
				'url_txt' => 'Descargar',
				'url'  => $url,
				'tipo' => 'http'
			)
		)
	);
	
	finalCadena($obtenido);
}

}
