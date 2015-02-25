<?php

// Va: msnlatino.telemundo.com
// No va: now.telemundo.com, m.telemundo.com

/*
http://msnlatino.telemundo.com/videos?videoid=4fe391cb-4faf-417d-bc24-8e1ffc78096b&src=v5:pause:titleBar^link:uuids

http://hub.video.msn.com/services/videodata/?callback=JsonpCb0&ids=aec373a6-f1e7-4114-8815-c2d6596b3935&detailed=true&responseEncoding=json&v=2

http://content3.catalog.video.msn.com/e2/ds/d05e9aa6-c254-458e-8a5b-19cca7eb45d5.mp4
http:/img3.catalog.video.msn.com/image.aspx?uuid=aec373a6-f1e7-4114-8815-c2d6596b3935&w=300&h=225&so=4
http://img3.catalog.video.msn.com/image.aspx?uuid=aec373a6-f1e7-4114-8815-c2d6596b3935&w=500&h=250&so=4
*/

class Telemundocom extends cadena{

function calcula(){
	//dbug_($this->web_descargada);
	
	$obtenido = array(
		'enlaces' => array()
	);
	
	if(!enString($this->web_descargada, 'catalog.video.msn.com/image.aspx')){
		dbug('modo nuevo');
		
		// No soportado
		// http://m.telemundo.com/video.php?show=elsenordeloscieloscapitulosecreto&id=najcVXTKRqnrWKiVUmcE&key=video
		// http://m.telemundo.com/video.php?show=lavozkids&id=oWvtdFNRlmwOemyqHpCF&key=video
		//setErrorWebIntera('No se encuentra ningún vídeo o no está soportado');
		
		
		// http://now.telemundo.com/caso-cerrado/full-episodes/abuso-polic%C3%ADaco/322424899858
		// http://player.theplatform.com/p/HNK2IC/telemundo_vod_noauth/embed/select/uLCEWFk911nP?autoPlay=true&mbr=true&FWsiteSection=tm_tveverywhere_vod_hub#playerurl=http%3A//now.telemundo.com/caso-cerrado/full-episodes/abuso-polic%25C3%25ADaco/322424899858
		// https://player.theplatform.com/p/HNK2IC/telemundo_vod_noauth/embed/select/uLCEWFk911nP?autoPlay=false
		// https://link.theplatform.com/s/HNK2IC/uLCEWFk911nP?mbr=true&policy=2713557&player=Telemundo VOD No Auth Player (pub7)&manifest=f4m&format=SMIL&Tracking=true&Embedded=true&formats=F4M,MPEG4
		
		// No va
		// https://link.theplatform.com/s/HNK2IC/uLCEWFk911nP?mbr=true&policy=2713557&player=Telemundo VOD No Auth Player (pub7)
		
		
		// Parece que se puede arreglar así:
		/*
		http://www.telemundo.com/shows/2014/11/20/maestros-armados-por-defensa-y-gemelas-con-el-mismo-marido-caso-cerrado-video
		
		"clip_image":"http:\/\/www.telemundo.com\/sites\/nbcutelemundo\/files\/images\/mpx\/2014\/11\/21\/141120_2829830_Maestros_armados_por_defensa_y_gemelas_con_e_0.jpg"
		"clip_title":"Maestros armados por defensa y gemelas con el mismo marido. Caso Cerrado (VIDEO)"
		"clip_descr":"Marlene es profesora, y quiere ir a dar clase con una pistola para poder defenderse en caso de una asesino en serie. Y, Karla y Tania tienen el mismo marido y reclaman la herencia que les dej\u00f3 su padre.\u00a0"
		
		iframe
		//player.theplatform.com/p/0L7ZPC/ztJiSNFd5ggr/embed/select/iWUW_xbJZGrj?siteSectionId=telemundo_video_hub_vod&amp;autoPlay=true
		//theplatform.com/p/0L7ZPC/ztJiSNFd5ggr/embed/select/iWUW_xbJZGrj?siteSectionId=telemundo_shows_vod&amp;autoPlay=true
		
		
		http://proxymexico.com
		http://link.theplatform.com/s/0L7ZPC/iWUW_xbJZGrj?mbr=true&player=P7%20VOD%20Player&policy=40180
		
		http://link.theplatform.com/s/0L7ZPC/EuIyUv4n0nlm?mbr=true&player=P7%20VOD%20Player&policy=40180&switch=progressive&formats=mpeg4&format=SMIL&embedded=true&tracking=true
		
		
		*/
		
		if(enString($this->web, '//now.')){
			// now.telemundo.com
			$desde = 1;
			
			// "episode_thumbnail":{"url":"http:\/\/tve_static-telemundo.nbcuni.com\/prod\/image\/478\/1007\/141117_2828781_Andrea_del_Junco_anvver_1_560x315_362507843555.jpg"
			// "synopsis":"Scarlet Gruber es Andrea del Junco, una joven seria, reservada y competente que anhela ser como su madre."
			$p = strpos($this->web_descargada, '//player.');
			$imagen = entre1y2_a($this->web_descargada, $p, 'src="','"');
			dbug_($imagen);
			
			$titulo = entre1y2($this->web_descargada, '<meta property="og:title" content="', '"');
			
			$player = 'http:'.desde1a2($this->web_descargada, $p, '"');
			dbug_($player);
			
		} else {
			$desde = 2;
			
			$imagen = entre1y2($this->web_descargada, '"clip_image":"','"');
			$imagen = json_decode('"'.$imagen.'"');
			dbug_($imagen);
			
			$titulo = entre1y2($this->web_descargada, '"clip_title":"','"');
			$titulo = json_decode('"'.$titulo.'"');
			dbug_($titulo);
			
			// buscar si es una parte.
			if (enString($this->web_descargada, '<li class="player--nav-item-active">')) {
				$titulo .= ', parte '.trim(strip_tags(entre1y2($this->web_descargada, '<li class="player--nav-item-active">', '</li')));
			}
			
			$descripcion = entre1y2($this->web_descargada, '"clip_descr":"','"');
			$descripcion = json_decode('"'.$descripcion.'"');
			dbug_($descripcion);
			
			$iframe = entre1y2($this->web_descargada, '<iframe', '<');
			dbug_($iframe);
			$player = 'http://'.desde1a2($iframe, 'player.', '"');
			dbug_($player);
			
			$obtenido['descripcion']=$descripcion;
		}
			
		$obtenido['titulo']=$titulo;
		$obtenido['imagen']=$imagen;
		
		
		$ret = CargaWebCurl($player);
		
		$releaseUrl = entre1y2($ret, 'releaseUrl="', '"');
		dbug_($releaseUrl);
		$releaseUrl .= '&switch=progressive&formats=mpeg4&format=SMIL&embedded=true&tracking=true';
		dbug_($releaseUrl);
	
		$ret = CargaWebCurlProxy($releaseUrl, 'MX');
		dbug_($ret);
		
		if (preg_match_all('@"(https?://[^"]+\.(?:mp4|flv).+?)".+?bitrate="(.+?)"@i', $ret, $matches)) {
			dbug_r($matches);
			$links = array_unique($matches[1]);
			$calidades = array_unique($matches[2]);
			dbug_r($links);
			
			for ($i = 0, $i_t = count($links); $i < $i_t; $i++) {
				$obtenido['enlaces'][] = array(
					'url'     => $desde === 1 ? $this->quitar_akami_telemundo($links[$i]) : $links[$i],
					'url_txt' => 'Descargar en calidad ' . intval($calidades[$i] / 1024),
					'tipo'    => 'http'
				);
			}
		} else {
			dbug('Adivinar urls a partir de la imagen');
			dbug_($imagen);
			
			$posibles_calidades = array(
				'4000',
				'2500',
				'1800',
				'1696',
				'1296',
				'1200',
				'896',
				'700',
				'696',
				'496',
				'400',
				'306',
				'240',
				'200'
			);
			
			if (preg_match('#anvver#', $imagen, $matches) || preg_match('#[0-9]+x[0-9]+#', $imagen, $matches)) {
				dbug_r($matches);
				
				$supuesta_url_base = entre1y2($imagen, 0, $matches[0]);
				$supuesta_url_base = str_replace('/image/', '/video/', $supuesta_url_base);
				
				for ($i = 0, $i_t = count($posibles_calidades); $i < $i_t; $i++) {
					$obtenido['enlaces'][] = array(
						'url'     => $supuesta_url_base . $posibles_calidades[$i] . '.mp4',
						'url_txt' => 'Descargar en calidad ' . $posibles_calidades[$i],
						'tipo'    => 'http'
					);
				}
				
				$obtenido['alerta_especifica'] = 'No se ha podido encontrar ningún enlace para el vídeo pero alguno de los siguientes podría funcionar.';
			}
		}
		
		
	} else {
		dbug('modo antiguo');
	
		$imagen = 'http://img3.catalog.video.msn.com/image.aspx'.entre1y2($this->web_descargada, 'catalog.video.msn.com/image.aspx','"');
		dbug_($imagen);
		
		$uuid = entre1y2($imagen, 'uuid=', '&');
		dbug_($uuid);
		
		$imagen = 'http://img3.catalog.video.msn.com/image.aspx?uuid='.$uuid.'&w=500&h=250&so=4';
		dbug_($imagen);
		
		$url = "http://hub.video.msn.com/services/videodata/?callback=JsonpCb0&ids={$uuid}&detailed=true&responseEncoding=json&v=2";
		$ret = CargaWebCurl($url);
		$ret = substr($ret, 9, -1);
		$ret = str_replace("'", '"', $ret);
		$ret = preg_replace('/(\w+):/i', '"\1":', $ret);
		$ret = preg_replace_callback('/\\\\x.{2}/i', function($a){return chr('0'.substr($a[0], 1));}, $ret);
		dbug_($ret);
		
		$ret = json_decode($ret, true);
		dbug(json_last_error());
		dbug_r($ret);
		
		
		$titulo = $ret['videos'][0]['title'];
		
		
		$calidades = array(
			'105' => '1080p',
			'104' => '720p',
			'103' => '480p',
			'102' => '360p',
			'101' => '240p',
			
			'1005' => '1080p',
			'1004' => '720p',
			'1003' => '480p',
			'1002' => '360p',
			'1001' => '240p'
		);
		
		foreach($ret['videos'][0]['files'] as &$elem){
			$ret['videos'][0]['files'][$elem['formatCode']] = &$elem;
		}
		
		foreach($calidades as $i => $calidad){
			if(isset($ret['videos'][0]['files'][$i])){
				$elem = &$ret['videos'][0]['files'][$i];
				if(!stringContains($elem['url'], array('.mp4', '.flv'))){
					continue;
				}
				
				foreach($obtenido['enlaces'] as &$enl){
					if(substr($enl['url'], 20) === substr($elem['url'], 20)){
						continue 2;
					}
				}
				
				$obtenido['enlaces'][] = array(
					'url'     => $elem['url'],
					'url_txt' => 'Descargar en '.$calidad,
					'tipo'    => 'http'
				);
			}
		}
		
		$obtenido['titulo']=$titulo;
		$obtenido['imagen']=$imagen;
	
	}
	
	finalCadena($obtenido,false);
}

function quitar_akami_telemundo($url) {
	return preg_replace('#http://tve_?telemundo-vh.akamaihd.net/z/prod/#', 'http://tve_static-telemundo.nbcuni.com/prod/', //http://tve_static ó http://tve-static no importa
		entre1y2($url, 0, '?')
	);
}

}
