<?php
/*
ESTA FALLANDO:
http://tvolucion.esmas.com/telenovelas/comedia/que-pobres-tan-ricos/247137/que-pobres-tan-ricos-capitulo-42/
*/





/*
http://tvnhds.tvolucion.com/z/lgata/delivery//5a/64/5a6429f9-541d-48dd-8bc5-e4ab8927e1eb/lgata-c090.mp4_,235,480,600,970,k.mp4.csmil/manifest.f4m?g=PFIJJOXYLNCM&hdcore=3.4.0&plugin=aasp-3.4.0.132.124
http://tvnhds.tvolucion.com/z/lgata/delivery//5a/64/5a6429f9-541d-48dd-8bc5-e4ab8927e1eb/lgata-c090.mp4_,235,480,600,970,k.mp4.csmil/manifest.f4m?hdcore=3.4.0


http://www.televisa.com/crossiframes/iframetest-resize.html?height=246&guid=7ad293a6-85de-1032-9c2f-0019b9d72c08


http://amp.televisa.com/embed/embed.php?id=272220&w=620&h=345&autoplay=false&canal=es.televisa.video|telenovelas|drama|la-gata


http://amp.televisa.com/tvenvivofiles/2.4.0008/amp.premier/config_dvr_vod.xml?rnd=2788165180


http://amp.televisa.com/tvenvivofiles/272220/params_dvr.json



http://tvnhds.tvolucion.com/i/lgata/delivery//5a/64/5a6429f9-541d-48dd-8bc5-e4ab8927e1eb/lgata-c090.mp4_,235,480,600,970,k.mp4.csmil/master.m3u8

http://tvnhds.tvolucion.com/z/lgata/delivery//5a/64/5a6429f9-541d-48dd-8bc5-e4ab8927e1eb/lgata-c090.mp4_,235,480,600,970,k.mp4.csmil/manifest.f4m

http://tvnhds.tvolucion.com/z/lgata/delivery//5a/64/5a6429f9-541d-48dd-8bc5-e4ab8927e1eb/lgata-c090.mp4

http://m4v.tvolucion.com/m4v/tln/lgata/45201db85a8e3a0ffa8d5f77ce9249e8/lgata-c090.jpg
*/

function televisa(){
global $web,$web_descargada;
$retfull=&$web_descargada;


/*
$proxy = '189.174.63.36:8080';

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'http://tvnpod.tvolucion.com/indom/delivery/6dd74f0d-18d9-412a-bd59-5071182ffdbd/indom-c120.mp4_970k.mp4');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_PROXY,$proxy);
curl_setopt($ch,CURLOPT_HEADER,1);
curl_setopt($ch,CURLOPT_RANGE,'1-200');

$t=curl_exec($ch);
if(curl_errno($ch))dbug('Curl error: '.curl_error($ch));

curl_close($ch);
dbug($t);
exit;
*/

if(enString($web, '//m.')){
	$web = str_replace('//m.', '//www.', $web);
	dbug('Movil -> escritorio');
	$retfull=CargaWebCurl($web,'',0,'',array('Referer: '.$web));
	
	if(!enString($retfull,'<html'))
		$retfull=CargaWebCurl($web);
}



//usarse a sí mismo como réferer
if(!enString($retfull,'<html'))
	$retfull=CargaWebCurl($web,'',0,'',array('Referer: '.$web));

if(!enString($retfull,'<html'))
	$retfull=CargaWebCurl($web);

//dbug_($retfull);

$obtenido=array('enlaces' => array());



//para televisa.com/novelas
if(stringContains($retfull,array('showVideo(','data-id="'))){
	if(enString($retfull,'showVideo(')){
		preg_match('@showVideo\(([0-9]+)\)@',$retfull,$match);
	}
	elseif(enString($retfull,'data-id="')){
		preg_match('@data-id="([0-9]+)"@',$retfull,$match);
	}

	if(isset($match[1])){
		$idVideo=$match[1];
		dbug($idVideo);
		// $web='http://amp.televisa.com/embed/embed.php?id='.$idVideo.'&w=620&h=345';
		$web='http://tvolucion.esmas.com/embed/embed.php?id='.$idVideo.'&w=620&h=345';
		$retfull=CargaWebCurl($web,'',0,'',array('Referer: '.$web));
		if(enString($retfull,'ya no se encuentra disponible')){
			setErrorWebIntera('Éste vídeo ya no se encuentra disponible.');
			return;
		}
		//dbug_($retfull);
	}
}



if(enString($retfull, 'params_dvr.json')){
	$hostname = 'tvolucion.esmas.com';
	$json = "http://{$hostname}/tvenvivofiles/{$idVideo}/params_dvr.json";
	$json = CargaWebCurl($json);
	$json = utf8_encode($json);
	$json = json_decode($json, true);
	dbug_r($json);
	
	$titulo = $json['channel']['item']['title'];
	$imagen = $json['channel']['item']['media-group']['media-thumbnail']['@attributes']['url'];

	foreach($json['channel']['item']['media-group']['media-content'] as &$elem){
		if(enString($elem['@attributes']['url'], '.f4m')){
			$obtenido['enlaces'][] = array(
				'url'  => $elem['@attributes']['url'],
				'nombre_archivo' => generaNombreWindowsValido($titulo),
				'tipo' => 'f4m'
			);
		}
		elseif(enString($elem['@attributes']['url'], '.m3u8')){
			$obtenido['enlaces'][] = array(
				'url'  => $elem['@attributes']['url'],
				'tipo' => 'm3u8'
			);
		}
	}
	
	$obtenido['alerta_especifica'] = 'Es necesario usar un proxy de México. El programa F4M-Downloader permite indicar un proxy.';
}
else {



//http://c.brightcove.com/services/messagebroker/amf?playerKey=AQ~~,AAAAEUA28vk~,ZZqXLYtFw-ADB2SpeHfBR3cyrCkvIrAe
if(enString($retfull,'playerKey:"'))
	$playerKey=entre1y2($retfull,'playerKey:"','"');
elseif(enString($retfull,'<param name="playerKey"'))
	$playerKey=entre1y2($retfull,'<param name="playerKey" value="','"');
if(!isset($playerKey)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}
dbug('playerKey -> '.$playerKey);
$messagebroker='http://c.brightcove.com/services/messagebroker/amf?playerKey='.$playerKey;


if(enString($retfull,'playerID:"'))
	$experienceID=entre1y2($retfull,'playerID:"','"');
elseif(enString($retfull,'<param name="playerID"'))
	$experienceID=entre1y2($retfull,'<param name="playerID" value="','"');
if(!isset($experienceID)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}
dbug('experienceID -> '.$experienceID);
	
if(enString($retfull,'videoId:"'))
	$contentId=entre1y2($retfull,'videoId:"','"');
elseif(enString($retfull,'<param name="videoId"'))
	$contentId=entre1y2($retfull,'<param name="videoId" value="','"');
if(!isset($contentId)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}
dbug('contentId -> '.$contentId);


include 'brightcove-funciones.php';

//$aa = 'AAMAAAABAEZjb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkV4cGVyaWVuY2VSdW50aW1lRmFjYWRlLmdldERhdGFGb3JFeHBlcmllbmNlAAIvMQAAAe8KAAAAAgIAKDcyOTBiYTVlOTQzZGM0MmI3ZDY4NmE1NjJmOTZkNWI0MGI0ZjE3OTIRCmNjY29tLmJyaWdodGNvdmUuZXhwZXJpZW5jZS5WaWV3ZXJFeHBlcmllbmNlUmVxdWVzdBlleHBlcmllbmNlSWQhY29udGVudE92ZXJyaWRlcxFUVExUb2tlbhlkZWxpdmVyeVR5cGUTcGxheWVyS2V5B1VSTAVCYrdWAacgAAkDAQqBA1Njb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkNvbnRlbnRPdmVycmlkZRtjb250ZW50UmVmSWRzDXRhcmdldBVmZWF0dXJlZElkE2NvbnRlbnRJZBdjb250ZW50VHlwZRtmZWF0dXJlZFJlZklkFWNvbnRlbnRJZHMZY29udGVudFJlZklkAQYXdmlkZW9QbGF5ZXIFf////+AAAAAFQoo2IT7sSAAEAAEBAQYBBX/////gAAAABmVBUX5+LEFBQUFFVUEyOHZrfixaWnFYTFl0RnctQURCMlNwZUhmQlIzY3lyQ2t2SXJBZQaBGWh0dHA6Ly9ub3RpY2llcm9zLnRlbGV2aXNhLmNvbS9wcm9ncmFtYXMtbm90aWNpZXJvLWNvbi1qb2FxdWluLWxvcGV6LWRvcmlnYS8=';
//dbug_r(brightcove_decode(base64_decode($aa)));

$a_encodear = array
(
	'target'	=> 'com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience',
	'response'	=> '/1',
	'data'		=> array
	(
		'0' => '7290ba5e943dc42b7d686a562f96d5b40b4f1792',
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
					'contentOverrides' => array
					(
						new SabreAMF_TypedObject
						(
							'com.brightcove.experience.ContentOverride',
							array
							(
								'contentRefId' => null,
								'contentIds' => null,
								'featuredRefId' => null,
								'contentRefIds' => null,
								'contentType' => 0,
								'target' => 'videoPlayer',
								'featuredId' => NAN,
								'contentId' => $contentId
							)
						)
					)
				)
			)
		)
	)
);


// FALLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
$post = brightcove_encode($a_encodear);
dbug(base64_encode($post));
//dbug_r(brightcove_decode($post));

//dbug_r(brightcove_decode(base64_decode('AAMAAAABAEZjb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkV4cGVyaWVuY2VSdW50aW1lRmFjYWRlLmdldERhdGFGb3JFeHBlcmllbmNlAAIvMQAAAhYKAAAAAgIAKDcyOTBiYTVlOTQzZGM0MmI3ZDY4NmE1NjJmOTZkNWI0MGI0ZjE3OTIRCmNjY29tLmJyaWdodGNvdmUuZXhwZXJpZW5jZS5WaWV3ZXJFeHBlcmllbmNlUmVxdWVzdBlkZWxpdmVyeVR5cGUHVVJMGWV4cGVyaWVuY2VJZCFjb250ZW50T3ZlcnJpZGVzE3BsYXllcktleRFUVExUb2tlbgV/////4AAAAAaBZ2h0dHA6Ly90dm9sdWNpb24uZXNtYXMuY29tL3RlbGVub3ZlbGFzL2RyYW1hL2xhLXJvc2EtZGUtZ3VhZGFsdXBlLzIzNjM0OS9yb3NhLWd1YWRhbHVwZS1wZXF1ZW5hLWdyYW4taGlzdG9yaWEtYW1vci8FQmK3VgGnIAAJAwEKgQNTY29tLmJyaWdodGNvdmUuZXhwZXJpZW5jZS5Db250ZW50T3ZlcnJpZGUNdGFyZ2V0FWZlYXR1cmVkSWQTY29udGVudElkG2ZlYXR1cmVkUmVmSWQVY29udGVudElkcxljb250ZW50UmVmSWQbY29udGVudFJlZklkcxdjb250ZW50VHlwZQYXdmlkZW9QbGF5ZXIFf////+AAAAAFQoNbrQiDiAABAQEBBAAGZUFRfn4sQUFBQUVVQTI4dmt+LFpacVhMWXRGdy1BREIyU3BlSGZCUjNjeXJDa3ZJckFlBgE=')));





dbug('a descargar: '.$messagebroker);
$t = brightcove_curl_web($messagebroker, $post);
$res_decoded=brightcove_decode($t);
dbug_r($res_decoded);

$titulo1=$res_decoded['data']->getAMFData();
$titulo2=$titulo1['programmedContent']['videoPlayer']->getAMFData();

dbug_r($titulo2);



$titulo3=$titulo2['mediaDTO']->getAMFData();

$titulo=$titulo3['displayName'];





//scar todas las URL
//preg_match_all('@http(s)?://[a-z0-9A-Z.?/%_=~-]+@i', $t, $match); 
preg_match_all('@http(s)?://[a-z0-9A-Z./%_-]+@i', $t, $match); 

//buscar qué URLs son las pics y los vídeos para usarlas
dbug_r($match[0]);


$imagen=$match[0][1];






$urls_total=count($match[0]);
for($i=0;$i<$urls_total;$i++){
	if(esVideoAudioAnon($match[0][$i]))
		$obtenido['enlaces'][] = array(
			'url'  => strtr($match[0][$i],array('http://tvnhds.tvolucion.com/z/'=>'http://tvnpod.tvolucion.com/')),
			'tipo' => 'http'
		);
}

}



$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}

?>