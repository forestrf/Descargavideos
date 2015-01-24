<?php

class Facebook extends cadena{

function calcula(){
	$titulo = entre1y2($this->web_descargada, '<title', '<');
	$titulo = substr($titulo, strposF($titulo, '>'));
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array()
	);
	
	
	
	$datos = desde1a2($this->web_descargada, '[["params","', '.forEach');
	dbug_($datos);
	$datos = json_decode($datos, true);
	dbug_r($datos);
	
	foreach ($datos as $dato) {
		if ($dato[0] === 'params') {
			$datos = urldecode($dato[1]);
			$datos = json_decode($datos, true);
			break;
		}
	}
	dbug_r($datos);
	
	if (isset($datos['video_data'][0]['hd_src_no_ratelimit']))
		$hd = $datos['video_data'][0]['hd_src_no_ratelimit'];
	elseif (isset($datos['video_data'][0]['hd_src']))
		$hd = $datos['video_data'][0]['hd_src'];
	
	if (isset($hd))	
		$obtenido['enlaces'][] = array(
			'url_txt' => 'Calidad HD',
			'url'     => $hd,
			'tipo'    => 'http'
		);
	
	
	
	if (isset($datos['video_data'][0]['sd_src_no_ratelimit']))
		$sd = $datos['video_data'][0]['sd_src_no_ratelimit'];
	elseif (isset($datos['video_data'][0]['sd_src']))
		$sd = $datos['video_data'][0]['sd_src'];
	
	if (isset($hd))	
		$obtenido['enlaces'][] = array(
			'url_txt' => 'Calidad SD',
			'url'     => $sd,
			'tipo'    => 'http'
		);
	
	
	finalCadena($obtenido);
}

}
