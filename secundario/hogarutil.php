<?php

class Hogarutil extends cadena{

function calcula(){

$obtenido=array('enlaces' => array());

//<script src="//players.brightcove.net/2385340627001/01e63247-a390-454c-8b58-79195ab81075_default/index.min.js" 
//http://c.brightcove.com/services/viewer/federated_f9?&flashID=ms-player2-continuo-bcObject&playerID=2418571368001&publisherID=2385340627001&%40videoPlayer=2875076343001&isVid=true&isUI=true&linkBaseURL=".urlencode()
preg_match('@players\.brightcove\.net/(.+?)/.+\.js@i',$this->web_descargada,$matches);
dbug_r($matches);

if(!isset($matches[1]) || !is_numeric($matches[1])){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}

$contentId = $matches[1];

// https://edge.api.brightcove.com/playback/v1/accounts/2385340627001/videos/4655083972001
//<script src="//players.brightcove.net/2385340627001/01e63247-a390-454c-8b58-79195ab81075_default/index.min.js"
//policyKey: "BCpkADawqM3ZOdsILEAA2DA3O1l-WzgvE56gtWPSJxFUBd9Yi1lfIoYbCM8Epl2JeEcWd2STSSeHLvlhqh6H4eYGOm2I3O8qD2u7jqoVh64x3Oc399mPDZ02WCKepmxVHdjVrtM4iI7WTJFp"
$js = CargaWebCurl($matches[0]);
$pk = entre1y2($js, 'policyKey:"', '"');
dbug('pk='.$pk);

//players.brightcove.net/

$data_video_id = entre1y2($this->web_descargada, 'data-video-id="', '"');
$ret = CargaWebCurl('https://edge.api.brightcove.com/playback/v1/accounts/'.$contentId.'/videos/'.$data_video_id, '', false, '', array(
	'Referer: http://www.hogarmania.com/tv/programas/decogarden/201512/12/index.html',
	'Origin: http://www.hogarmania.com',
	'Accept: application/json;pk='.$pk
));
dbug_r($ret);

$json = json_decode($ret, true);
dbug_r($json);

foreach ($json['sources'] as $source) {
	if (isset($source['app_name'])) continue;
	if (isset($source['type'])) continue;
	dbug_r($source);
	$obtenido['enlaces'][] = array(
		'url'     => $source['src'],
		'url_txt' => 'Descargar',
		'titulo'  => 'Calidad: ' . $source['width'] . 'x' . $source['height'],
		'width'   => $source['width']
	);
}

usort($obtenido['enlaces'], function ($a, $b) {
	return $a['width'] < $b['width'];
});


$obtenido['titulo']=$json['name'];
$obtenido['imagen']=$json['poster'];
$obtenido['descripcion']=$json['description'];

finalCadena($obtenido,false);
}

}
