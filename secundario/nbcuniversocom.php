<?php

class Nbcuniversocom extends cadena{

function calcula(){
	$obtenido = array(
		'enlaces' => array()
	);
	
	/*
	http://www.nbcuniverso.com/shows/a-toda-gloria/toda-gloria-extended-scene-gloria-llega-peru-episode-13
	
	http://mun2-static.nbcuni.com/MPX/image/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a.jpg
	http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_4000.mp4
	http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_2500.mp4 
	*/
	
	$titulo = entre1y2($this->web_descargada, '<meta property="og:title" content="', '"');
	$obtenido['descripcion'] = entre1y2($this->web_descargada, '<meta name="description" content="', '"');
	
	if(enString($this->web, '/now/')){
		dbug('now');
		// now.telemundo.com
		$desde = 1;
		
		$player = 'http:'.desde1a2($this->web_descargada, '//player.theplatform.com/p/', '"');
		dbug_($player);
	} else {
		dbug('no now');
		$desde = 2;
		
		//$imagen = entre1y2($this->web_descargada, '<meta property="og:image" content="', '"');
		
		if (enString($this->web_descargada, '<li class="player--nav-item-active">')) {
			$titulo .= ', parte '.trim(strip_tags(entre1y2($this->web_descargada, '<li class="player--nav-item-active">', '</li')));
		}
		
		$player = desde1a2($this->web_descargada, 'http://player.theplatform.com', '"');
		dbug_($player);
		$player = str_replace('/swf/', '/embed/', $player);
		dbug_($player);
	}
	
	$ret = CargaWebCurl($player);
	
	$imagen = entre1y2($ret, '<meta property="og:image" content="', '"');
	dbug_($imagen);
	
	
	$releaseUrl = entre1y2($ret, 'releaseUrl="', '"');
	dbug_($releaseUrl);
	$releaseUrl .= '&switch=progressive&formats=mpeg4&format=SMIL&embedded=true&tracking=true';
	dbug_($releaseUrl);
	
	$ret = CargaWebCurlProxy($releaseUrl, 'MX');
	dbug_($ret);
	
	$obtenido['titulo']=$titulo;
	$obtenido['imagen']=$imagen;
	
	
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
		
		$supuesta_url_base = entre1y2($imagen, 0, 'anvver');
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
	
	finalCadena($obtenido,false);
}

function quitar_akami_telemundo($url) {
	return preg_replace('#http://tve_?telemundo-vh.akamaihd.net/z/prod/#', 'http://tve_static-telemundo.nbcuni.com/prod/', //http://tve_static ó http://tve-static no importa
		entre1y2($url, 0, '?')
	);
}

}
