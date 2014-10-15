<?php

class Vimeo extends cadena{

function calcula(){
$obtenido=array('enlaces' => array());

if(strpos($this->web, 'http://player.vimeo.com/video/') === 0){
	$ret = desde1a2($this->web_descargada, '{"', ';');
	$json_respuesta = json_decode($ret, true);
} else {
	$ret = CargaWebCurl('http://player.vimeo.com/video/'.html_entity_decode(entre1y2($this->web_descargada, 'http://player.vimeo.com/video/', '"')));
	$json_respuesta = json_decode($ret, true);
}


dbug_r($json_respuesta);

$opciones = $json_respuesta['request']['files']['h264'];
dbug_r($opciones);


if(count($opciones) == 3 && isset($opciones['mobile']) && isset($opciones['hd']) && isset($opciones['sd'])){
	$obtenido['enlaces'][] = array(
		'url'	 => $opciones['hd']['url'],
		'url_txt'=> "Calidad: Alta",
		'tipo'	 => 'http'
	);
	$obtenido['enlaces'][] = array(
		'url'	 => $opciones['sd']['url'],
		'url_txt'=> "Calidad: Media",
		'tipo'	 => 'http'
	);
	$obtenido['enlaces'][] = array(
		'url'	 => $opciones['mobile']['url'],
		'url_txt'=> "Calidad: Baja",
		'tipo'	 => 'http'
	);
}
else{
	foreach($opciones as $index=>$elem){
		$obtenido['enlaces'][] = array(
			'url'	 => $elem['url'],
			'url_txt'=> "Calidad: ".$index,
			'tipo'	 => 'http'
		);
	}
}


$titulo=$json_respuesta['video']['title'];
$titulo=limpiaTitulo($titulo);

$obtenido['titulo']=$titulo;
$obtenido['imagen']=current($json_respuesta['video']['thumbs']);

finalCadena($obtenido);

return $obtenido;

}

}
