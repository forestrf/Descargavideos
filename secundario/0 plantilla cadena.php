<?php

class Cadena extends cadena{

function calcula(){
	
	
	//Código
	
	
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
