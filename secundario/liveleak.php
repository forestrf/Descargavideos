<?php
function liveleak(){
	global $web_descargada;
	
	//titulo
	$titulo='LiveLeak';
	dbug('titulo='.$titulo);
	
	//imagen
	$imagen=entre1y2($web_descargada, 'image: "', '"');
	dbug('imagen='.$imagen);
	
	$config=entre1y2($web_descargada, 'config: "', '"');
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
?>