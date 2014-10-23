<?php

class Twitchtv extends cadena{

function calcula(){
	preg_match('@/[a-z]/[0-9]+@', $this->web, $matches);
	
	dbug_r($matches);
	
	$url = 'https://api.twitch.tv/api/videos/'.str_replace('/', '', $matches[0]).'?as3=t';
	dbug_($url);
	
	$json = CargaWebCurl($url);
	
	$json = json_decode($json, true);
	
	dbug_r($json);
	
	$obtenido=array(
		'titulo'  => entre1y2($this->web_descargada, 'title>','</') . ' | [' . $json['start_offset'] . '->' . $json['end_offset'] . ']',
		'imagen'  => $json['preview'],
		'enlaces' => array()
	);
	
	$suma = 0;
	foreach($json['chunks']['live'] as $url){
		$suma += $url['length'];
		$obtenido['enlaces'][] = array(
			'url'     => $url['url'],
			'tipo'    => 'http',
			'url_txt' => $suma
		);
	}
		
	
	finalCadena($obtenido);
}

}
