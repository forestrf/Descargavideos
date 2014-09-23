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

function discoverymaxes(){
	global $web, $web_descargada;

	// http://www.discoverymax.es/wp-content/plugins/dni_carrington_build_modules/modules/dni-video-playlist/video.php?instanceID=dni-video-playlist-611327198&instance_id=dni-video-playlist-611327198&video_player_id=3570805961001&video_player_key=AQ%7E%7E%2CAAAAAFIw8-k%7E%2CRzpKFESr-2ALjDz9LZTdOIeBssZPLQ5q&autostart=false&playlist=

	$obtenido=array(
		'enlaces' => array()
		,'alerta_especifica' => 'Todos los vídeos indican ocupar 2GB a pesar de no ser real. El tamaño de los vídeos que indica la descarga no es real.'
	);
	
	
	$p = strpos($web_descargada, '<iframe');
	
	//http://c.brightcove.com/services/messagebroker/amf?playerKey=AQ~~,AAAAEUA28vk~,ZZqXLYtFw-ADB2SpeHfBR3cyrCkvIrAe
	if(enString($web_descargada,'<param name="playerKey"'))
		$playerKey=entre1y2($web_descargada,'<param name="playerKey" value="','"');
	elseif(enString($web_descargada,'video_player_key='))
		$playerKey=urldecode(entre1y2_a($web_descargada,$p,'video_player_key=','&'));
	else{
		setErrorWebIntera('No se ha encontrado ningún vídeo.');
		return;
	}
	dbug('playerKey -> '.$playerKey);
	$messagebroker='http://c.brightcove.com/services/messagebroker/amf?playerKey='.$playerKey;
	
	if(enString($web_descargada,'<param name="playerID"'))
		$experienceID=entre1y2($web_descargada,'<param name="playerID" value="','"');
	elseif(enString($web_descargada,'video_player_id='))
		$experienceID=urldecode(entre1y2_a($web_descargada,$p,'video_player_id=','&'));
	else{
		setErrorWebIntera('No se ha encontrado ningún vídeo.');
		return;
	}
	dbug('experienceID -> '.$experienceID);
	
	if(preg_match('@#([0-9]+?)$@', $web, $matches))
		$contentId=$matches[1];
	elseif(enString($web_descargada,'playlist='))
		$contentId=urldecode(entre1y2_a($web_descargada,$p,'playlist=','"'));
	else{
		setErrorWebIntera('No se ha encontrado ningún vídeo.');
		return;
	}
	dbug('contentId -> '.$contentId);
	
	include 'brightcove-funciones.php';
	
	$a_encodear = array
	(
		'target'	=> 'com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience',
		'response'	=> '/1',
		'data'		=> array
		(
			'0' => '9445764b9bbb1dcb6ca98bb1b0c00cb2762cd3f8',
			'1' => new SabreAMF_AMF3_Wrapper
			(
				new SabreAMF_TypedObject
				(
					'com.brightcove.experience.ViewerExperienceRequest',
					array
					(
						'TTLToken' => null,
						'deliveryType' => NAN,
						'URL' => $web, //Innecesario
						'experienceId' => $experienceID,
						'playerKey' => $playerKey,
						'contentOverrides' => array(
							new SabreAMF_TypedObject
							(
								'com.brightcove.experience.ContentOverride',
								array
								(
									'contentType' => 0,
									'featuredId' => NAN,
									'contentId'=> $contentId,
									'featuredRefId' => null,
									'contentIds' => null,
									'target' => 'videoPlayer',
									'contentRefId' => null,
									'contentRefIds' => null
								)
							)
						)
					)
				)
			)
		)
	);
	
	$post = brightcove_encode($a_encodear);
	
	// Por culpa de geobloqueo, la llamada la hará un swf en lugar de descargavideos y el js sacará las urls
	
	$urlJS = 
	'function lanzaDiscoveryMax(){
		if(typeof DESCARGADOR_ARCHIVOS_SWF === "undefined"){
			setTimeout(lanzaDiscoveryMax, 200)
		}
		else if(DESCARGADOR_ARCHIVOS_SWF === true){
			getFlashMovie("descargador_archivos").CargaWeb({
				"url":"'.$messagebroker.'"
				,"metodo":"POST"
				,"contentType":"application/x-amf"
				,"postBase64":"'.base64_encode($post).'"
				,"resp":"base64"
			}, "procesaDiscoveryMax");
		}
	}
	
	function procesaDiscoveryMax(txt){
		var x = Base64Binary.decode(txt);
		var mediaDTO = decodeAMF(x).messages[0].body.programmedContent.videoPlayer.mediaDTO;
		var titulo = mediaDTO.displayName;
		var img = mediaDTO.videoStillURL;

		D.g("imagen_res").src = decode_utf8(img);
		D.g("titulo_res").innerHTML = decode_utf8(titulo);
		
		var res = mediaDTO.renditions[0];
		for(var i = 1; i < mediaDTO.renditions.length; i++){
			if(mediaDTO.renditions[i].encodingRate > res.encodingRate){
				res = mediaDTO.renditions[i];
			}
		}

		mostrarResultado(res.defaultURL);
	}
	
	function decode_utf8(s) {
  		return decodeURIComponent(escape(s));
	}
	
	
	function mostrarResultado(entrada){
		finalizar(entrada,"Descargar");
	}
	
	function mostrarFallo(){
		finalizar("","No se ha encontrado ningún resultado");
	}
	
	
	if(typeof descargador_archivos === "undefined"){
		D.g("enlaces").innerHTML += \''.genera_swf_object('/util/fla/f/player.swf').'\';
		var descargador_archivos = D.g("descargador_archivos");
	}
	
	lanzaDiscoveryMax();';
	
	$titulo = '';
	$imagen = '';
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url'  => strtr($urlJS, array("\t"=>'', "\r"=>'', "\n"=>'')),
				'tipo' => 'jsFlash'
			)
		)
	);
	
	/*
	dbug('a descargar: '.$messagebroker);
	
	$t=brightcove_curl_web($messagebroker,$post);
	echo bin2hex($t);
	/*
	$res_decoded=brightcove_decode($t);
	dbug('RESPUESTA BRIGHTCOVE:');
	dbug_r($res_decoded);
	
	
	if($res_decoded['data'] === null){
		// Seguro que el vídeo no funciona en la página oficial.
		setErrorWebIntera('No se puede reproducir el vídeo desde el enlace que ha indicado.');
		return;
	}
	
	$base=$res_decoded['data']->getAMFData();
	$base=$base['programmedContent']['videoPlayer']->getAMFData();
	$base=$base['mediaDTO']->getAMFData();
	$titulo=$base['displayName'];
	$imagen=$base['videoStillURL'];
	dbug('titulo = '.$titulo);
	dbug('imagen = '.$imagen);
	
	
	$obtenido['enlaces'] = brightcove_genera_obtenido($base, array(
		'IOSRenditions' => 'm3u8',
		'renditions' => 'http'
	), $titulo);
		
	
	$obtenido['titulo']=$titulo;
	$obtenido['imagen']=$imagen;
	*/
	
	finalCadena($obtenido,false);
}

function URLSDelArrayBrightCove($r, $tipo, &$obtenido_enlaces, $titulo){
	if($r['audioOnly']!='1'){
		$arrayTemp=array(
			'calidad_ordenar' => $r['encodingRate'],
			'titulo'          => 'Calidad: '.floor($r['encodingRate']/1000).' Kbps',
			'url'             => $r['defaultURL'],
			'url_txt'         => 'Descargar',
			'tipo'            => $tipo
		);
		
		$obtenido_enlaces[] = $arrayTemp;
	}
}
?>