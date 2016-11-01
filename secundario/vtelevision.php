<?php
// http://media.vtelevision.es/default/2011/09/28/0031_10_99379/Foto/img_99379.jpg
// http://media.vtelevision.es/default/2011/09/28/0031_10_99379/Video/video_99379.mp4

class Vtelevision extends cadena{

function calcula(){
//titulo
$titulo=utf8_encode(entre1y2($this->web_descargada, '<title>', '<'));//utf-8... mirar esto
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

$p=strpos($this->web_descargada,'og:image');
$imagen=entre1y2_a($this->web_descargada, $p, 'content="', '"');
dbug('imagen='.$imagen);

if(enString($this->web_descargada, 'og:video')){
	$p=strpos($this->web_descargada,'og:video');
	$url=entre1y2_a($this->web_descargada, $p, 'content="', '"');
	dbug('video='.$url);
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url_txt' => 'Descargar',
				'url'  => $url,
				'tipo' => 'http'
			)
		)
	);
}
elseif(preg_match('@<source src="(.+?)" type="video/mp4">@', $this->web_descargada, $matches)){
	//http://progresive.vtelevision.es/ANTIGUOS/VTV/pd/2728142669001/201610/2728142669001_5176434641001_4924951631001-vs.jpg?pubId=2728142669001
	//http://progresive.vtelevision.es/ANTIGUOS/VTV/hd/2728142669001/201610/2728142669001_5176436919001_4924951631001.mp4?pubId=2728142669001%3C/object%3EvideoId=4924951631001
	dbug_r($matches);
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url_txt' => 'Descargar',
				'url'  => $matches[1],
				'tipo' => 'http'
			)
		)
	);
}
elseif(enString($this->web_descargada, '<object class="BrightcoveExperience"')){
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array()
	);
	
	require_once 'brightcove-funciones.php';
	
	/*
	$ejemplo = 'AAMAAAABAEZjb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkV4cGVyaWVuY2VSdW50aW1lRmFjYWRlLmdldERhdGFGb3JFeHBlcmllbmNlAAIvMQAAAe4KAAAAAgIAKGQ4Y2ZhOGIwZWQwYWVlM2YyMmRmZWRlMGYyZTU4NzRjYjViNGFmNjcRCmNjY29tLmJyaWdodGNvdmUuZXhwZXJpZW5jZS5WaWV3ZXJFeHBlcmllbmNlUmVxdWVzdCFjb250ZW50T3ZlcnJpZGVzGWV4cGVyaWVuY2VJZAdVUkwTcGxheWVyS2V5GWRlbGl2ZXJ5VHlwZRFUVExUb2tlbgkDAQqBA1Njb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkNvbnRlbnRPdmVycmlkZRtjb250ZW50UmVmSWRzDXRhcmdldBVjb250ZW50SWRzF2NvbnRlbnRUeXBlE2NvbnRlbnRJZBtmZWF0dXJlZFJlZklkGWNvbnRlbnRSZWZJZBVmZWF0dXJlZElkAQYXdmlkZW9QbGF5ZXIBBAAFQoobzh2jSAABAQV/////4AAAAAVCg917rY7IAAaBF2h0dHA6Ly93d3cudnRlbGV2aXNpb24uZXMvcHJvZ3JhbWFzL3ZheWF2LzIwMTQvMDUvMjcvMDAzMV8zNTg4MzQwNTYxMDAxLmh0bQZlQVF+fixBQUFDZXpINWhNa34sa29OVmZFd3lwcTZXeGYyS01zN3EtM2V1R0wyOU1Pck0Ff////+AAAAAGAQ==';
	$ejemplo = base64_decode($ejemplo);
	print_r(brightcove_decode($ejemplo));
	*/
	
	
	preg_match('/<param value="(.*?)" name="playerID"/', $this->web_descargada, $matches);
	$experienceID = $matches[1];
	preg_match('/<param value="(.*?)" name="playerKey"/', $this->web_descargada, $matches);
	$playerKey = $matches[1];
	preg_match('/<param value="(.*?)" name="@videoPlayer"/', $this->web_descargada, $matches);
	$contentId = $matches[1];
	
	$messagebroker="http://c.brightcove.com/services/messagebroker/amf?playerKey=".$playerKey;
	
	$a_encodear = array
	(
		'target'	=> 'com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience',
		'response'	=> '/1',
		'data'		=> array
		(
			'0' => 'd8cfa8b0ed0aee3f22dfede0f2e5874cb5b4af67',
			'1' => new SabreAMF_AMF3_Wrapper
			(
				new SabreAMF_TypedObject
				(
					'com.brightcove.experience.ViewerExperienceRequest',
					array
					(
						'TTLToken' => null,
						'deliveryType' => NAN,
						'URL' => $this->web, //Innecesario
						'experienceId' => $experienceID,
						'playerKey' => $playerKey,
						'contentOverrides' => array(
							'0' => new SabreAMF_TypedObject
							(
								'com.brightcove.experience.ContentOverride',
								array
								(
									'contentRefIds' => null,
									'target' => 'videoPlayer',
									'contentIds' => null,
									'contentType' => 0,
									'contentId' => $contentId,
									'featuredRefId' => null,
									'contentRefId' => null,
									'featuredId' => NAN
								)
							)
						)
					)
				)
			)
		)
	);
	
	$post = brightcove_encode($a_encodear);
	//print_r(brightcove_decode($post));
	
	dbug('a descargar: '.$messagebroker);
	$t=brightcove_curl_web($messagebroker,$post);
	
	$res_decoded=brightcove_decode($t);
	dbug('RESPUESTA BRIGHTCOVE:');
	dbug_r($res_decoded);
	
	
	
	
	
	
	/*
	view-source:http://c.brightcove.com/services/mobile/streaming/index/rendition.m3u8?assetId=3588406440001
	http://progresive.lavozdegalicia.es/BCOVE/VTV/pd/2728142669001/201405/3588406440001/2728142669001_3588406440001_s-1.ts?
	http://videohdvtv-vh.akamaihd.net/BCOVE/VTV/hd/2728142669001/201405/2728142669001_3588398678001_PRG-VAYAVT4-0032.mp4
	http://progresive.lavozdegalicia.es/BCOVE/VTV/hd/2728142669001/201405/2728142669001_3588398678001_PRG-VAYAVT4-0032.mp4
	*/
	
	
	
	$base=$res_decoded['data']->getAMFData();
	$base=$base['programmedContent']['videoPlayer']->getAMFData();
	$base=$base['mediaDTO']->getAMFData();
	
	$obtenido['enlaces'] = brightcove_genera_obtenido($this, $base, array(
		'IOSRenditions' => 'm3u8',
		'renditions' => 'http',
	));
	
}



finalCadena($obtenido);
}

function URLSDelArrayBrightCove($r, $tipo, &$obtenido_enlaces){
	if($r['audioOnly']!='1'){
		$obtenido_enlaces[]=array(
			'calidad_ordenar' =>$r['encodingRate'],
			'titulo'          => 'Calidad: '.floor($r['encodingRate']/1000).' Kbps',
			'url_txt'         => 'Descargar',
			'url'             => strtr($r['defaultURL'], array('videohdvtv-vh.akamaihd.net'=>'progresive.lavozdegalicia.es')),
			'tipo'            => $tipo
		);
	}
}

}
