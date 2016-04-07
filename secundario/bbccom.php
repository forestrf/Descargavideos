<?php

class Bbccom extends cadena{

function calcula(){

$obtenido=array('enlaces' => array());



// http://open.live.bbc.co.uk/mediaselector/5/select/version/2.0/vpid/p03q9wfm/format/json/mediaset/journalism-http-tablet/jsfunc/JS_callbacks0



$json_info = entre1y2($this->web_descargada, 'data-playable=\'', '\'>');
dbug_($json_info);
$json_info = json_decode($json_info, true);
dbug_r($json_info);

$titulo = $json_info['settings']['playlistObject']['title'];
$imagen = $json_info['otherSettings']['unProcessedImageUrl'];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);


$url = 'http://open.live.bbc.co.uk/mediaselector/5/select/version/2.0/vpid/' . $json_info['settings']['playlistObject']['items'][0]['vpid'] . '/format/json/mediaset/journalism-http-tablet/jsfunc/JS_callbacks0';
$json2 = CargaWebCurl($url);
dbug_($json2);
$json2 = entre1y2($json2, '(');
$json2 = substr($json2, 0, strrpos($json2, ')'));
dbug_($json2);
$json2 = json_decode($json2, true);
dbug_r($json2);

$media = sortmulti($json2['media'], 'width', 'desc');
dbug_r($media);

foreach ($media as $elem) {
	$obtenido['enlaces'][] = array(
		'url'     => $elem['connection'][0]['href'],
		'url_txt' => 'Tamaño: ' . $elem['width'] . ' x ' . $elem['height']
	);
}


$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}

}
