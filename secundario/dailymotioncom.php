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
	
	if(strpos($web, 'dailymotion.com/embed/') === false){
		dbug('Cargando vídeo embedido.');
		$ret = CargaWebCurl(strtr($web, array('dailymotion.com/'=>'dailymotion.com/embed/')));
	} else {
		dbug('No es necesario cargar vídeo embedido, ya lo tenemos.');
		$ret = &$web_descargada;
	}
	
	$obtenido=array(
		'titulo'  => entre1y2($ret, 'title>','<'),
		'imagen'  => strtr(entre1y2($ret, '"thumbnail_url":"','"'), array('\\'=>'')),
		'enlaces' => array()
	);
	
	/*
	"stream_h264_url",
	"stream_h264_ld_url",
	"stream_h264_hq_url",
	"stream_h264_hd_url",
	"stream_h264_hd1080_url",
	"stream_audio_url"
	
	"stream_live_hls_url"
	*/
	
	$posibilidades = array(
		'1080p' => 'stream_h264_hd1080_url',
		'720p' => 'stream_h264_hd_url',
		'480p' => 'stream_h264_hq_url',
		'360p' => 'stream_h264_url',
		'240p' => 'stream_h264_ld_url'/*,
		'' => 'stream_audio_url'*/
	);
	
	foreach($posibilidades as $nombre=>$calidad){
		if(enString($ret, $calidad.'":"h')){
		$url = strtr(entre1y2($ret, $calidad.'":"','"'), array('\\'=>''));
		dbug('url '.$nombre.': '.$url);
			$obtenido['enlaces'][] = array(
				'titulo'  => $nombre,
				'url'     => $url,
				'url_txt' => 'Descargar',
				'tipo'    => 'http'
			);
		}
	}
	
	finalCadena($obtenido);
}
?>