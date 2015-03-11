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
	
	$obtenido['titulo']=$titulo;
	
	$ret = CargaWebCurl($player);
	
	$imagen = entre1y2($ret, '<meta property="og:image" content="', '"');
	dbug_($imagen);
	$obtenido['imagen']=$imagen;
	
	if (enString($this->web, '/now/')) {
		$obtenido['alerta_especifica'] = 'No se ha podido encontrar ningún enlace para el vídeo pero alguno de los siguientes podría funcionar.';
		
		$urlNuevo = preg_replace('#http://.*?/image/#', 'https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/', $imagen);
		$urlViejo = preg_replace('#http://.*?/image/#', 'https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/', $imagen);
		
		$nuevoAgregado = false;
		if (preg_match('#anvver_([0-9])_#', $urlNuevo, $matches)) {
			dbug_r($matches);
			$urlNuevo = desde1a2($urlNuevo, 0, $matches[0]) . 'anvver_' . ($matches[1] - 1) . '_,40,25,18,12,7,4,2,00.mp4.csmil/master.m3u8';
			dbug_($urlNuevo);
			$obtenido['enlaces'][] = array(
				'titulo' => 'Calidades nuevas',
				'url' => $urlNuevo,
				'tipo' => 'm3u8'
			);
			$nuevoAgregado = true;
		}
		
		if (preg_match('#anvver#', $urlViejo, $matches) || preg_match('#[0-9]+x[0-9]+#', $urlViejo, $matches)) {
			dbug_r($matches);
			$urlViejo = entre1y2($urlViejo, 0, $matches[0]) . ',1696,1296,896,696,496,240,306,.mp4.csmil/master.m3u8';
			dbug_($urlViejo);
			$obtenido['enlaces'][] = array(
				'titulo' => 'Calidades antiguas',
				'url' => $urlViejo,
				'tipo' => 'm3u8'
			);
			
			if (!$nuevoAgregado) {
				$urlNuevo = entre1y2($urlNuevo, 0, $matches[0]) . ',40,25,18,12,7,4,2,00.mp4.csmil/master.m3u8';
				dbug_($urlNuevo);
				$obtenido['enlaces'][] = array(
					'titulo' => 'Calidades nuevas',
					'url' => $urlNuevo,
					'tipo' => 'm3u8'
				);
			}
		}
		
		
		
		
		finalCadena($obtenido,false);
		return;
	}
	
	
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



/*


HAY QUE VER EL VÍDEO ANTES DE INTENTAR DESCARGARLO O SI NO NO VA EL ENLACE DE DESCARGA


<smil xmlns="http://www.w3.org/2005/SMIL21/Language">
<head>
	<meta name="refreshToken" content="014bbf228642c17625bc7863505648d529dad7ee1491aa9d7e709708237c8001a416eb606dde"/>
</head>
<body>
<seq>
	<ref src="http://ads.freewheel.tv/" no-skip="true" tags="preroll">
	</ref>
<par>
	<video src="https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/master.m3u8?__b__=1000&amp;hdnea=st=1424829774~exp=1424829834~acl=/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=3c707706-5667-450d-a34b-34f5c8b3cc8d~hmac=f8784b887134f4fc9f754e6e06963f43f7b11d311521c1d5edc452cfee4d4af6" title="Dia 2 - Parte 1" abstract="Disfruta de las presentaciones de Ricardo Arjona, Reik y el comediante Centella." dur="7387314ms" guid="2847811" categories="Series/Festival Intl de Viña del Mar" keywords="latino,hispanic,music,concert,musica,festival,cancion,chile,america latina" ratings="urn%3Av-chip:tv-pg" provider="NBC Universo" type="application/x-mpegURL" height="1080" width="1920" clipBegin="0:00" clipEnd="16:14">
		<param name="entitlement" value="auth"/>
		<param name="episodeNumber" value="4"/>
		<param name="externalAdvertiserId" value="UVSO_ANV_2847811"/>
		<param name="fullEpisode" value="true"/>
		<param name="seasonNumber" value="1"/>
		<param name="advertisingGenre" value="Music"/>
		<param name="trackingData" value="aid=2304989560|b=4215924|bc=NBCU-MPAT|ci=1|cid=403457091915|d=1424829804505|l=7387314|mediaPid=7DUEcSnu0Jyq|pd=1424732400000|pid=jq3kl6RT_ocs|pl=NBC Universo VOD Player (Phase 3)|prid=12441471|pvid=13511235786|rid=403458627883|rnid=26954"/>
	</video>
	<textstream src="http://tve-static-nbcuniverso.nbcuni.com/prod/caption/767/683/150217_2847811_Dia_2___Parte_1.tt" lang="es" type="application/smptett+xml"/>
	<imagestream src="http://tve-static-nbcuniverso.nbcuni.com/prod/image/767/683/150217_2847811_Dia_2___Parte_1_4000.fs" width="190" height="107" type="application/filmstrip+json"/>
</par>
	<ref src="http://ads.freewheel.tv/" no-skip="true" tags="midroll">
	</ref>
<par>
	<video src="https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/master.m3u8?__b__=1000&amp;hdnea=st=1424829774~exp=1424829834~acl=/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=3c707706-5667-450d-a34b-34f5c8b3cc8d~hmac=f8784b887134f4fc9f754e6e06963f43f7b11d311521c1d5edc452cfee4d4af6" title="Dia 2 - Parte 1" abstract="Disfruta de las presentaciones de Ricardo Arjona, Reik y el comediante Centella." dur="7387314ms" guid="2847811" categories="Series/Festival Intl de Viña del Mar" keywords="latino,hispanic,music,concert,musica,festival,cancion,chile,america latina" ratings="urn%3Av-chip:tv-pg" provider="NBC Universo" type="application/x-mpegURL" height="1080" width="1920" clipBegin="16:14">
		<param name="entitlement" value="auth"/>
		<param name="episodeNumber" value="4"/>
		<param name="externalAdvertiserId" value="UVSO_ANV_2847811"/>
		<param name="fullEpisode" value="true"/>
		<param name="seasonNumber" value="1"/>
		<param name="advertisingGenre" value="Music"/>
		<param name="trackingData" value="aid=2304989560|b=4215924|bc=NBCU-MPAT|ci=1|cid=403457091915|d=1424829804505|l=7387314|mediaPid=7DUEcSnu0Jyq|pd=1424732400000|pid=jq3kl6RT_ocs|pl=NBC Universo VOD Player (Phase 3)|prid=12441471|pvid=13511235786|rid=403458627883|rnid=26954"/>
	</video>
	<textstream src="http://tve-static-nbcuniverso.nbcuni.com/prod/caption/767/683/150217_2847811_Dia_2___Parte_1.tt" lang="es" type="application/smptett+xml"/>
	<imagestream src="http://tve-static-nbcuniverso.nbcuni.com/prod/image/767/683/150217_2847811_Dia_2___Parte_1_4000.fs" width="190" height="107" type="application/filmstrip+json"/>
</par>
	<ref src="http://ads.freewheel.tv/" no-skip="true" tags="postroll">
	</ref>
</seq>
</body>
</smil>











#EXTM3U
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=816000,RESOLUTION=640x360,CODECS="avc1.66.30, mp4a.40.2"
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/index_4_av.m3u8?null=&id=AgCtSDnnF0PyZ50t7VR35A5tTFi3hOsGowCZP8XaCGSN1K0forQRUgzvgo7vujUshQ322aOX5hpm%2fg%3d%3d
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=4212000,RESOLUTION=1920x1080,CODECS="avc1.77.30, mp4a.40.2"
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/index_0_av.m3u8?null=&id=AgCtSDnnF0PyZ50t7VR35A5tTFi3hOsGowCZP8XaCGSN1K0forQRUgzvgo7vujUshQ322aOX5hpm%2fg%3d%3d
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=2676000,RESOLUTION=1280x720,CODECS="avc1.77.30, mp4a.40.2"
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/index_1_av.m3u8?null=&id=AgCtSDnnF0PyZ50t7VR35A5tTFi3hOsGowCZP8XaCGSN1K0forQRUgzvgo7vujUshQ322aOX5hpm%2fg%3d%3d
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=1959000,RESOLUTION=960x540,CODECS="avc1.77.30, mp4a.40.2"
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/index_2_av.m3u8?null=&id=AgCtSDnnF0PyZ50t7VR35A5tTFi3hOsGowCZP8XaCGSN1K0forQRUgzvgo7vujUshQ322aOX5hpm%2fg%3d%3d
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=1316000,RESOLUTION=960x540,CODECS="avc1.66.30, mp4a.40.2"
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/index_3_av.m3u8?null=&id=AgCtSDnnF0PyZ50t7VR35A5tTFi3hOsGowCZP8XaCGSN1K0forQRUgzvgo7vujUshQ322aOX5hpm%2fg%3d%3d
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=516000,RESOLUTION=416x236,CODECS="avc1.66.30, mp4a.40.2"
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/index_5_av.m3u8?null=&id=AgCtSDnnF0PyZ50t7VR35A5tTFi3hOsGowCZP8XaCGSN1K0forQRUgzvgo7vujUshQ322aOX5hpm%2fg%3d%3d
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=316000,RESOLUTION=416x236,CODECS="avc1.66.30, mp4a.40.2"
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/index_6_av.m3u8?null=&id=AgCtSDnnF0PyZ50t7VR35A5tTFi3hOsGowCZP8XaCGSN1K0forQRUgzvgo7vujUshQ322aOX5hpm%2fg%3d%3d








m3u8



http://www.nbcuniverso.com/now/festival-intl-de-vi%C3%B1a-del-mar/full-episode/dia-2-parte-1/403457091915



view-source:http://link.theplatform.com/s/HNK2IC/jq3kl6RT_ocs?mbr=true&player=NBC%20Universo%20VOD%20Player%20%28Phase%203%29&auth=%3CsignatureInfo%3EpMsxXD6JnF8nCqPndv5YkPlZEtrloXiDTCek3cZ2sVDAelTUtJqBMnVScsWNeZkIBcXgYHV4aB5ntfeHstf%2B0P1bTIV4GiWdIElqepQ1lGZRLvtV8en2UNAe%2FPDb4%2FKusLjRZpAQ3xbBsG5eYEhZrJY1%2BlcrVqzohfdRYWKUazI%3D%3CsignatureInfo%3E%3CauthToken%3E%3CsessionGUID%3E13595ff68848d66447ffe68b0afa4982%3C%2FsessionGUID%3E%3CrequestorID%3Emun2%3C%2FrequestorID%3E%3CresourceID%3E%3C!%5BCDATA%5B%3Crss%20version%3D%222.0%22%20xmlns%3Amedia%3D%22http%3A%2F%2Fsearch.yahoo.com%2Fmrss%2F%22%3E%3Cchannel%3E%3Ctitle%3Emun2%3C%2Ftitle%3E%3Citem%3E%3Ctitle%3E%3C!%5BCDATA%5BDia%202%20-%20Parte%201%5D%5D%5D%5D%3E%3E%3C!%5BCDATA%5B%3C%2Ftitle%3E%3Cguid%3E2847811%3C%2Fguid%3E%3Cmedia%3Arating%20scheme%3D%22urn%3Ampaa%22%3Etv-pg%3C%2Fmedia%3Arating%3E%3C%2Fitem%3E%3C%2Fchannel%3E%3C%2Frss%3E%5D%5D%3E%3C%2FresourceID%3E%3Cttl%3E420000%3C%2Fttl%3E%3CissueTime%3E2015-02-24%2017%3A58%3A01%20-0800%3C%2FissueTime%3E%3CmvpdId%3EVerizon%3C%2FmvpdId%3E%3C%2FauthToken%3E&manifest=m3u&format=SMIL&Tracking=true&Embedded=true&formats=M3U,MPEG4



view-source:https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_,40,25,18,12,7,4,2,00.mp4.csmil/master.m3u8?__b__=1000&amp;hdnea=st=1424829774~exp=1424829834~acl=/i/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=3c707706-5667-450d-a34b-34f5c8b3cc8d~hmac=f8784b887134f4fc9f754e6e06963f43f7b11d311521c1d5edc452cfee4d4af6






Subtítulos

http://link.theplatform.com/s/HNK2IC/_0IqXkSD31Kn?mbr=true&player=NBC%20Universo%20VOD%20Player%20%28Phase%203%29&format=Script&height=576&width=1024






http://tve-static-nbcuniverso.nbcuni.com/prod/image/485/623/141215_2834830_Y_Voy_Mas_Alto_anvver_3_800x450_380830787530.jpg
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/485/623/141215_2834830_Y_Voy_Mas_Alto_anvver_2_,40,25,18,12,7,4,2,00.mp4.csmil/master.m3u8



https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/485/623/141215_2834830_Y_Voy_Mas_Alto_anvver_2_,40,25,18,12,7,4,2,00.mp4.csmil/master.m3u8





antiguos no tienen anvver, y si lo tienen lo quitan.



antiguo
http://tve-static-nbcuniverso.nbcuni.com/prod/image/712/947/141230_2837435_Capitulo_58_anvver_2_800x450_392445507754.jpg
http://tve-static-nbcuniverso.nbcuni.com/prod/image/691/811/141217_2835623_Capitulo_31_anvver_1_800x450_400667203608.jpg
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/691/811/141217_2835623_Capitulo_31_,1696,1296,896,696,496,240,306,.mp4.csmil/master.m3u8


nuevo
http://tve-static-nbcuniverso.nbcuni.com/prod/image/24/111/141215_2834673_Mini_Honeymoon_in_Mazatlan_anvver_2_800x450_384357955880.jpg
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/24/111/141215_2834673_Mini_Honeymoon_in_Mazatlan_anvver_(n-1)_,40,25,18,12,7,4,2,00.mp4.csmil/master.m3u8


https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/24/111/141215_2834673_Mini_Honeymoon_in_Mazatlan_anvver_1_,40,25,18,12,7,4,2,00.mp4.csmil/index_0_av.m3u8?null=&id=AgCtSDnnF0PyZEJw7lT+zMgNBvEv0M+Q1JwH40xR+pWNxQINUXM%2fXZILXi2DbitC4e0sIBTrqiPMGw%3d%3d
https://tvenbcuniverso-vh.akamaihd.net/i/prod/video/24/111/141215_2834673_Mini_Honeymoon_in_Mazatlan_anvver_1_,40,25,18,12,7,4,2,00.mp4.csmil/index_4_av.m3u8?null=&id=AgCtSDnnF0PyZGlw7lSLlQ1Q3S0ghB6F7rGabp7IWFAm7Bbc61xfJrOmJypPZPdPGsRVfbCQqBVDaw%3d%3d








<smil xmlns="http://www.w3.org/2005/SMIL21/Language">
<head>
	<meta name="refreshToken" content="014bbf10e4cafb52535fc7f54786167f29d485e68ff108ee7be92be3507a91e9ac5be676672c"/>
</head>
<body>
<seq>
	<ref src="http://ads.freewheel.tv/" no-skip="true" tags="preroll">
	</ref>
<par>
<switch>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_4000.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="4215924" height="1080" width="1920"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_2500.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="2560000" height="720" width="1280"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_1800.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="1843000" height="540" width="960"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_1200.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="1200000" height="540" width="960"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_700.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="700000" height="360" width="640"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_400.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="400000" height="234" width="416"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_200.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="200000" height="234" width="416"/>
	<ref src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_4000.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" title="Dia 2 - Parte 1" abstract="Disfruta de las presentaciones de Ricardo Arjona, Reik y el comediante Centella." dur="7387314ms" guid="2847811" categories="Series/Festival Intl de Viña del Mar" keywords="latino,hispanic,music,concert,musica,festival,cancion,chile,america latina" ratings="urn%3Av-chip:tv-pg" provider="NBC Universo" type="video/mp4" height="1080" width="1920" clipBegin="0:00" clipEnd="16:14">
		<param name="entitlement" value="auth"/>
		<param name="episodeNumber" value="4"/>
		<param name="externalAdvertiserId" value="UVSO_ANV_2847811"/>
		<param name="fullEpisode" value="true"/>
		<param name="seasonNumber" value="1"/>
		<param name="advertisingGenre" value="Music"/>
		<param name="trackingData" value="aid=2304989560|b=4215924|bc=NBCU-MPAT|ci=1|cid=403457091915|d=1424828649248|l=7387314|mediaPid=7DUEcSnu0Jyq|pd=1424732400000|pid=jq3kl6RT_ocs|pl=NBC Universo VOD Player (Phase 3)|prid=12441471|pvid=13511235786|rid=403458627883|rnid=26954"/>
	</ref>
</switch>
	<textstream src="http://tve-static-nbcuniverso.nbcuni.com/prod/caption/767/683/150217_2847811_Dia_2___Parte_1.tt" lang="es" type="application/smptett+xml"/>
	<imagestream src="http://tve-static-nbcuniverso.nbcuni.com/prod/image/767/683/150217_2847811_Dia_2___Parte_1_4000.fs" width="190" height="107" type="application/filmstrip+json"/>
</par>
	<ref src="http://ads.freewheel.tv/" no-skip="true" tags="midroll">
	</ref>
<par>
<switch>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_4000.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="4215924" height="1080" width="1920"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_2500.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="2560000" height="720" width="1280"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_1800.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="1843000" height="540" width="960"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_1200.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="1200000" height="540" width="960"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_700.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="700000" height="360" width="640"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_400.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="400000" height="234" width="416"/>
	<video src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_200.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" system-bitrate="200000" height="234" width="416"/>
	<ref src="http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_4000.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db4" title="Dia 2 - Parte 1" abstract="Disfruta de las presentaciones de Ricardo Arjona, Reik y el comediante Centella." dur="7387314ms" guid="2847811" categories="Series/Festival Intl de Viña del Mar" keywords="latino,hispanic,music,concert,musica,festival,cancion,chile,america latina" ratings="urn%3Av-chip:tv-pg" provider="NBC Universo" type="video/mp4" height="1080" width="1920" clipBegin="16:14">
		<param name="entitlement" value="auth"/>
		<param name="episodeNumber" value="4"/>
		<param name="externalAdvertiserId" value="UVSO_ANV_2847811"/>
		<param name="fullEpisode" value="true"/>
		<param name="seasonNumber" value="1"/>
		<param name="advertisingGenre" value="Music"/>
		<param name="trackingData" value="aid=2304989560|b=4215924|bc=NBCU-MPAT|ci=1|cid=403457091915|d=1424828649248|l=7387314|mediaPid=7DUEcSnu0Jyq|pd=1424732400000|pid=jq3kl6RT_ocs|pl=NBC Universo VOD Player (Phase 3)|prid=12441471|pvid=13511235786|rid=403458627883|rnid=26954"/>
	</ref>
</switch>
	<textstream src="http://tve-static-nbcuniverso.nbcuni.com/prod/caption/767/683/150217_2847811_Dia_2___Parte_1.tt" lang="es" type="application/smptett+xml"/>
	<imagestream src="http://tve-static-nbcuniverso.nbcuni.com/prod/image/767/683/150217_2847811_Dia_2___Parte_1_4000.fs" width="190" height="107" type="application/filmstrip+json"/>
</par>
	<ref src="http://ads.freewheel.tv/" no-skip="true" tags="postroll">
	</ref>
</seq>
</body>
</smil>






http://player.theplatform.com/p/h8w-TC/6wT_2oWk1kCT/embed/select/media/NfR4Q296vr7p?uniNext=&autoPlay=true
http://player.theplatform.com/p/h8w-TC/GyElTZk7UMvV/swf/select/media/HxUAiNFjtUmL&amp;autoPlay=true


http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_4000.mp4?hdnea=st=1424824010~exp=1424824610~acl=/*~hmac=b31fcb346293d651907c68365610745aff5de6d6
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_2500.mp4?hdnea=st=1424824010~exp=1424824610~acl=/*~hmac=b31fcb346293d651907c68365610745aff5de6d6
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_1800.mp4?hdnea=st=1424824010~exp=1424824610~acl=/*~hmac=b31fcb346293d651907c68365610745aff5de6d6
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_1200.mp4?hdnea=st=1424824010~exp=1424824610~acl=/*~hmac=b31fcb346293d651907c68365610745aff5de6d6
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_700.mp4?hdnea=st=1424824010~exp=1424824610~acl=/*~hmac=b31fcb346293d651907c68365610745aff5de6d6
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_400.mp4?hdnea=st=1424824010~exp=1424824610~acl=/*~hmac=b31fcb346293d651907c68365610745aff5de6d6
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_200.mp4?hdnea=st=1424824010~exp=1424824610~acl=/*~hmac=b31fcb346293d651907c68365610745aff5de6d6


http://mun2-static.nbcuni.com/MPX/image/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a.jpg
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_4000.mp4
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_2500.mp4
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_1800.mp4
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_1200.mp4
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_700.mp4
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_400.mp4
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_200.mp4



http://mun2-static.nbcuni.com/MPX/image/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a.jpg
http://mun2-pmd.edgesuite.net/MPX/video/NBCU_mun2/978/1019/141224_2836917_A_Toda_Gloria_extended_scene__Gloria_llega_a_4000.mp4
http://tve-static-nbcuniverso.nbcuni.com/prod/image/767/683/150217_2847811_Dia_2___Parte_1_800x450_403459139777.jpg
http://tvenbcuniverso-vh.akamaihd.net/prod/video/767/683/150217_2847811_Dia_2___Parte_1_800x450_403459139777_4000.mp4
http://tvenbcuniverso-vh.akamaihd.net/prod/video/767/683/150217_2847811_Dia_2___Parte_1_4000.mp4?hdnea=st=1424828619~exp=1424828679~acl=/z/prod/video/767/683/150217_2847811_Dia_2___Parte_1_*~id=77270b33-f07d-4da7-bae0-24742c5bd064~hmac=11abd852963ccbbbe5114ccfafea9cfc379ee5447ead37cd944871b6eeeb9db

http://tvenbcuniverso-vh.akamaihd.net/z/prod/video/782/823/150217_2847813_Dia_2___Parte_3_,40,25,18,12,7,4,2,00.mp4.csmil/0_99d5d2de5725874a_Seg1-Frag29_AQCtSDnnF0PyZ%2f4h7VTnPLLlSJ%2f%2f2ZqKH1sOk5PAhkt7RzLE2D8hgNV3LtsGk4pnJS44ncdV?hdntl=exp=1424913277~acl=%2fz%2fprod%2fvideo%2f782%2f823%2f150217_2847813_Dia_2___Parte_3_*~data=hdntl~hmac=14b5f16b83d4699a012fc3c17be9d05c75f2f66cad25e5bec49cb2b49424d21c&als=67.23,300,28.76,6,2045,89041,30,914,0,197,t,102.92,4055.79,f,s,JQKMEIITTEZP,3.3.0,197&hdcore=3.3.0







*/





}
