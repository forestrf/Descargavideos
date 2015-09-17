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

class Dailymotioncom extends cadena{

function calcula(){
	// Quitar filtro parental
	if(!enString($this->web_descargada, 'sequence=')){
		dbug('Desactivando filtro familiar');
		$this->web_descargada = CargaWebCurl($this->web,'','','ff=off');
	}
	
	if (!$this->normal_desde_bookmarklet) {
		// Es necesario usar el bookmarklet V2
		define('IGNORA_AVISO_RAPIDO', true);
		setErrorWebIntera(USE_BOOKMARKLET_2);
		return;
	}
	
	if(strpos($this->web, 'http://www.dailymotion.com/embed/') === 0){
		dbug('embed');
		if ($this->normal_desde_bookmarklet) {
			dbug('embed');
			$info = entre1y2($this->web_descargada, 'var info = ', ",\n");
			$info = json_decode($info, true);
			dbug_r($info);
			$webPrincipal = CargaWebCurl($info['url']);
			
			$urlContenedor = urldecode(entre1y2($webPrincipal, 'sequence=','"'));
			//dbug_($urlContenedor);
			
			$jsonUrlContenedor = json_decode($urlContenedor, true);
			//dbug_r($jsonUrlContenedor);
			
			$obtenido=array(
				'titulo'  => entre1y2($this->web_descargada, 'title>','<'),
				'imagen'  => strtr(entre1y2($this->web_descargada, '"thumbnail_url":"','"'), array('\\'=>'')),
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
				if(enString($this->web_descargada, $calidad.'":"h')){
				$url = strtr(entre1y2($this->web_descargada, $calidad.'":"','"'), array('\\'=>''));
				dbug('url '.$nombre.': '.$url);
					$obtenido['enlaces'][] = array(
						'titulo'  => $nombre,
						'url'     => $url,
						'url_txt' => 'Descargar',
						'tipo'    => 'http'
					);
				}
			}
			finalCadena($obtenido, false);
			return;
		} else {
			$preweb = entre1y2($this->web_descargada, 'var info = ',",\n");
			$preweb = json_decode($preweb, true);
			dbug_r($preweb);
			$this->web_descargada = CargaWebCurl($preweb['url']);
		}
	}
	
	$urlContenedor = urldecode(entre1y2($this->web_descargada, '"qualities":','}]}')).'}]}';
	
	dbug_($urlContenedor);
	
	$jsonUrlContenedor = json_decode($urlContenedor, true);
	dbug_r($jsonUrlContenedor);
	
	$titulo = json_decode('"' . entre1y2($this->web_descargada, '"LR_TITLE":"', '",') . '"', true);
	$imagen = json_decode('"' . entre1y2($this->web_descargada, '"poster_url":"', '",') . '"', true);
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array()
	);
	
	foreach($jsonUrlContenedor as $quality => $urlArr){
		if($quality != 'auto'){
			$obtenido['enlaces'][] = array(
				'titulo'    => $quality.'p',
				'url'       => $urlArr[0]['url'],
				'extension' => 'mp4',
				'url_txt'   => 'Descargar',
				'tipo'      => 'http'
			);
		}
	}
	
	
	finalCadena($obtenido, false);
}

function parseaTemplateDailyMotion($url){
	return strtr($url, array(
		'.mnft'=>'.m3u8',
		//'.mnft'=>'.mp4',
		entre1y2($url,'http://','/sec')=>'vid2.ec.dmcdn.net'
	));
}

function bookmarklet() {
	return 'bookmarklet_form();';
}


}
