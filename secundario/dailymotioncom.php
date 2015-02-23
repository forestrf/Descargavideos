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
	/*
	// Nada de vídeos con filtro parental because adsense
	if(!enString($this->web_descargada, 'sequence=')){
		dbug('Desactivando filtro familiar');
		$this->web_descargada = CargaWebCurl($this->web,'','','ff=off');
	}
	*/
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
	
	$urlContenedor = urldecode(entre1y2($this->web_descargada, 'sequence=','"'));
	
	dbug_($urlContenedor);
	
	$jsonUrlContenedor = json_decode($urlContenedor, true);
	dbug_r($jsonUrlContenedor);
	
	$obtenido=array(
		'titulo'  => $jsonUrlContenedor['config']['metadata']['title'],
		'imagen'  => $jsonUrlContenedor['config']['preview_url'],
		'enlaces' => array()
	);
	
	foreach($jsonUrlContenedor['sequence'][0]['layerList'][0]['sequenceList'][2]['layerList'] as $preManifest){
		if(isset($preManifest['param']['autoURL'])){
			$manifest = $preManifest['param']['autoURL'];
		}
	}
	
	// ff=off permite tmbn descargar porno y esto va contra adsense.
	//$preEnlaces = CargaWebCurl($manifest,'','','ff=off');
	$preEnlaces = CargaWebCurl($manifest);
	dbug_($preEnlaces);
	
	$preEnlaces = json_decode($preEnlaces, true);
	dbug_r($preEnlaces);
	
	// Todas las calidades
	for($i=count($preEnlaces['alternates'])-1; $i>=0; --$i){
		$obtenido['enlaces'][] = array(
			'titulo'    => $preEnlaces['alternates'][$i]['name'].'p',
			'url'       => $this->parseaTemplateDailyMotion($preEnlaces['alternates'][$i]['template']),
			'extension' => 'm3u8',
			'url_txt'   => 'Descargar',
			'tipo'      => 'm3u8'
		);
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
	if(strpos($this->web, 'http://www.dailymotion.com/embed/') === 0){
		dbug('Lanza resultado');
		return 'bookmarklet_form();';
	} else {
		if (!enString($this->web_descargada, 'sequence=')) {
			return 'xhr("' . bm_scape($this->web) . '", null, function(data){lanzaDVxhr("' . bm_scape($this->web) . '", data);});';
		}
		
		$urlContenedor = urldecode(entre1y2($this->web_descargada, 'sequence=', '"'));
		dbug_($urlContenedor);
		
		$jsonUrlContenedor = json_decode($urlContenedor, true);
		dbug_r($jsonUrlContenedor);
		dbug_($jsonUrlContenedor['config']['sharing']['embedCode']);
		$urlEmbed = entre1y2($jsonUrlContenedor['config']['sharing']['embedCode'], 'src="', '"');
		
		dbug('Pedir embed');
		return 'xhr("' . bm_scape($urlEmbed) . '", null, function(data){lanzaDVform("http:' . bm_scape($urlEmbed) . '", data);});';
	}
}

}
