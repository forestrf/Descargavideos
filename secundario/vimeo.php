<?php
function vimeo(){
global $web,$web_descargada;

$obtenido=array('enlaces' => array());



preg_match_all('@/([0-9]+)(/|$)@', $web, $id);
dbug_r($id);
$id=$id[1][0];
dbug("ID=".$id);

$referer="http://vimeo.com/";

$r=array(
	"Referer: ".$referer
);
$ret=CargaWebCurl('http://player.vimeo.com/v2/video/'.$id.'/config','', 0, '', $r);

$json_respuesta = json_decode($ret, true);
//dbug_r($json_respuesta);

$opciones = $json_respuesta['request']['files']['h264'];
dbug_r($opciones);


if(count($opciones) == 3 && isset($opciones['mobile']) && isset($opciones['hd']) && isset($opciones['sd'])){
	array_push($obtenido['enlaces'],array(
		'url'	 => $opciones['hd']['url'],
		'url_txt'=> "Calidad: Alta",
		'tipo'	 => 'http'
	));
	array_push($obtenido['enlaces'],array(
		'url'	 => $opciones['sd']['url'],
		'url_txt'=> "Calidad: Media",
		'tipo'	 => 'http'
	));
	array_push($obtenido['enlaces'],array(
		'url'	 => $opciones['mobile']['url'],
		'url_txt'=> "Calidad: Baja",
		'tipo'	 => 'http'
	));
}
else{
	foreach($opciones as $index=>$elem){
		array_push($obtenido['enlaces'],array(
			'url'	 => $elem['url'],
			'url_txt'=> "Calidad: ".$index,
			'tipo'	 => 'http'
		));
	}
}


$titulo=$json_respuesta['video']['title'];
$titulo=limpiaTitulo($titulo);

$imagen=array_shift(array_values($json_respuesta['video']['thumbs']));

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

dbug_r($obtenido);
finalCadena($obtenido);
}
?>