<?php
/*
DailyMotion


http://www.dailymotion.com/video/x1wl3zv_real-madrid-con-la-10%C2%AA-copa-champions-en-cibeles_sport

http://vid2.ak.dmcdn.net/sec%28dcde62630084d7a3470ed11e5cbae68f%29/video/348/891/115198843_mp4_h264_aac_hd.mnft#cell=akamai2
http://vid2.ak.dmcdn.net/sec%28dcde62630084d7a3470ed11e5cbae68f%29/video/348/891/115198843_mp4_h264_aac_hd.mnft
http://vid2.ak.dmcdn.net/sec%28dcde62630084d7a3470ed11e5cbae68f%29/video/348/891/115198843_mp4_h264_aac_hd.m3u8

http://vid2.ak.dmcdn.net/sec%28dcde62630084d7a3470ed11e5cbae68f%29/video/348/891/115198843_mp4_h264_aac_hd.flv

http://vid2.ec.dmcdn.net/sec%28c1d480eb58ebac8a06ba174a542e3bdc%29/video/793/312/115213397_mp4_h264_aac_hd.flv

http://www.dailymotion.com/video/x1wl3zv_real-madrid-con-la-10%C2%AA-copa-champions-en-cibeles_sport

http://vid2.ec.dmcdn.net/sec%28c1d480eb58ebac8a06ba174a542e3bdc%29/video/793/312/115213397_mp4_h264_aac_ld.flv
http://vid2.ec.dmcdn.net/sec%28c1d480eb58ebac8a06ba174a542e3bdc%29/video/793/312/115213397_mp4_h264_aac_hd.flv
 */

function dailymotioncom(){
	global $web,$web_descargada;
	
	$urlContenedor = entre1y2($web_descargada, 'sequence=','"');
	dbug_($urlContenedor);
	
	$jsonUrlContenedor = json_decode(urldecode($urlContenedor), true);
	dbug_r($jsonUrlContenedor);
	
	$obtenido=array(
		'titulo'  => $jsonUrlContenedor['config']['metadata']['title'],
		'imagen'  => $jsonUrlContenedor['config']['preview_url'],
		'enlaces' => array()
	);
	
	
	$preEnlaces = CargaWebCurl($jsonUrlContenedor['sequence'][0]['layerList'][0]['sequenceList'][2]['layerList'][2]['param']['autoURL']);
	dbug_($preEnlaces);
	
	$preEnlaces = json_decode($preEnlaces, true);
	dbug_r($preEnlaces);
	
	// Todas las calidades
	for($i=count($preEnlaces['alternates'])-1; $i>=0; --$i){
		$obtenido['enlaces'][] = array(
			'titulo'  => $preEnlaces['alternates'][$i]['name'].'p',
			'url'     => parseaTemplateDailyMotion($preEnlaces['alternates'][$i]['template']),
			'url_txt' => 'Descargar',
			'tipo'    => 'http'
		);
	}
	
	
	finalCadena($obtenido);
}

function parseaTemplateDailyMotion($url){
	return strtr($url, array(
		'.mnft'=>'.flv',
		entre1y2($url,'http://','/sec')=>'vid2.ec.dmcdn.net'
	));
}
?>