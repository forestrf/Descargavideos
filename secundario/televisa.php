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




<title><![CDATA[As� fue el gran final de Un camino hacia el destino]]></title>
<description><![CDATA[Paulina Goto y Horacio Pancheri finalmente unieron sus vidas ante el altar dentro del gran final de Un camino hacia el destino.]]></description>
<external_id>362893</external_id>
<pubDate>2016-07-18 13:39:37 </pubDate>
<enable>true</enable>
<alternative_streams>
<default>http://apps.esmas.com/criticalmedia/files/2016/07/18/27633070-ed9cd597-75b0-4679-be75-52e626d07c12.mp4</default>
</alternative_streams>
<image_assets>
    <image_asset>
        <key>image_base</key>
        <url>http://television.televisa.com/television/fotos/videos/2016/07/18/gran-final-camino-hacia-destino-novela-telenovela-paulina-goto.jpg/jcr:content/renditions/cq5dam.thumbnail.624.351.jpg</url>
    </image_asset>
</image_assets>



Esta:
http://m4vhds.tvolucion.com/z/m4v/ent/pvent/cbd3368c5233e832ceaed413223a5050/33e832ceae-480.mp4
Ejemplo:
http://apps.tvolucion.com/m4v/boh/poamo/bb736008968dab82c22dc0480e1aae0a/8dab82c22d-480.mp4
Resultado:
http://apps.tvolucion.com/m4v/ent/pvent/cbd3368c5233e832ceaed413223a5050/33e832ceae-480.mp4
 
*/

class Televisa extends cadena{

function calcula(){
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
dbug_($t);
exit;
*/

if(enString($this->web, '//m.')){
	$this->web = str_replace('//m.', '//www.', $this->web);
	dbug('Movil -> escritorio');
	$this->web_descargada=CargaWebCurl($this->web,'',0,'',array('Referer: '.$this->web));
	
	if(!enString($this->web_descargada,'<html'))
		$this->web_descargada=CargaWebCurl($this->web);
}



//usarse a sí mismo como réferer
if(!enString($this->web_descargada,'<html'))
	$this->web_descargada=CargaWebCurl($this->web,'',0,'',array('Referer: '.$this->web));

if(!enString($this->web_descargada,'<html'))
	$this->web_descargada=CargaWebCurl($this->web);

$web_original = $this->web_descargada;

//dbug_($this->web_descargada);

$obtenido=array('enlaces' => array());



if (preg_match('#<iframe src="https?://amp.televisa.com/embed/embed.php.+?id=([0-9]+)#', $this->web_descargada, $match)) {
	dbug_r($match);
	$idVideo=$match[1];
	dbug($idVideo);
	// $this->web='http://amp.televisa.com/embed/embed.php?id='.$idVideo.'&w=620&h=345';
	$this->web='http://tvolucion.esmas.com/embed/embed.php?id='.$idVideo.'&w=620&h=345';
	$this->web_descargada=CargaWebCurl($this->web,'',0,'',array('Referer: '.$this->web));
	if(enString($this->web_descargada,'ya no se encuentra disponible')){
		setErrorWebIntera('Éste vídeo ya no se encuentra disponible.');
		return;
	}
	
}



//para televisa.com/novelas
if(stringContains($this->web_descargada,array('showVideo(','data-idvideo="','embed.php?id='))){
	if(enString($this->web_descargada,'showVideo(')){
		dbug('-1-');
		preg_match('@showVideo\(([0-9]+)\)@',$this->web_descargada,$match);
	}
	elseif(enString($this->web_descargada,'data-id="')){
		dbug('-2-');
		preg_match('@data-id="([0-9]+)"@',$this->web_descargada,$match);
	}
	elseif(enString($this->web_descargada,'data-idvideo="')){
		dbug('-2.5-');
		preg_match('@data-idvideo="([0-9]+)"@',$this->web_descargada,$match);
	}
	elseif(enString($this->web_descargada,'embed.php?id=')){
		dbug('-3-');
		preg_match('@embed.php\?id=([0-9]+)@',$this->web_descargada,$match);
	}

	if(isset($match[1])){
		$idVideo=$match[1];
		dbug($idVideo);
		// $this->web='http://amp.televisa.com/embed/embed.php?id='.$idVideo.'&w=620&h=345';
		$this->web='http://tvolucion.esmas.com/embed/embed.php?id='.$idVideo.'&w=620&h=345';
		$this->web_descargada=CargaWebCurl($this->web,'',0,'',array('Referer: '.$this->web));
		if(enString($this->web_descargada,'ya no se encuentra disponible')){
			setErrorWebIntera('Éste vídeo ya no se encuentra disponible.');
			return;
		}
		//dbug_($this->web_descargada);
	}
}



if(enString($this->web_descargada, 'params_dvr.json')){
	if (!isset($idVideo)) {
		preg_match('#/([0-9]+?)/params_dvr.json#', $this->web_descargada, $matches);
		$idVideo = $matches[1];
	}
	$hostname = 'tvolucion.esmas.com';
	$json = "http://{$hostname}/tvenvivofiles/{$idVideo}/params_dvr.json";
	$json = CargaWebCurl($json);
	$json = utf8_encode($json);
	$json = json_decode($json, true);
	dbug_r($json);
	
	$titulo = $json['channel']['item']['title'];
	if ($titulo == '') $titulo = entre1y2($web_original, '<meta property="og:title" content="', '"');
	
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
	
	$obtenido['alerta_especifica'] = 'Es necesario usar un proxy de México o estar en México. El programa F4M-Downloader permite indicar un proxy.';
}
else {



//http://c.brightcove.com/services/messagebroker/amf?playerKey=AQ~~,AAAAEUA28vk~,ZZqXLYtFw-ADB2SpeHfBR3cyrCkvIrAe
if(enString($this->web_descargada,'playerKey:"'))
	$playerKey=entre1y2($this->web_descargada,'playerKey:"','"');
elseif(enString($this->web_descargada,'<param name="playerKey"'))
	$playerKey=entre1y2($this->web_descargada,'<param name="playerKey" value="','"');
if(!isset($playerKey)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}
dbug('playerKey -> '.$playerKey);
$messagebroker='http://c.brightcove.com/services/messagebroker/amf?playerKey='.$playerKey;


if(enString($this->web_descargada,'playerID:"'))
	$experienceID=entre1y2($this->web_descargada,'playerID:"','"');
elseif(enString($this->web_descargada,'<param name="playerID"'))
	$experienceID=entre1y2($this->web_descargada,'<param name="playerID" value="','"');
if(!isset($experienceID)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}
dbug('experienceID -> '.$experienceID);
	
if(enString($this->web_descargada,'videoId:"'))
	$contentId=entre1y2($this->web_descargada,'videoId:"','"');
elseif(enString($this->web_descargada,'<param name="videoId"'))
	$contentId=entre1y2($this->web_descargada,'<param name="videoId" value="','"');
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
					'URL' => $this->web, //Innecesario
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



$renditions = $res_decoded['data']->getAMFData();
$renditions = $renditions['programmedContent']['videoPlayer']->getAMFData();
$renditions = $renditions['mediaDTO']->getAMFData();
$imagen = $renditions['videoStillURL'];
$renditions = $renditions['renditions'];
dbug_r($renditions);

$urls = array();
for($i = 0, $i_t = count($renditions); $i < $i_t; $i++)
	$urls[] = $renditions[$i]->getAMFData();
sortmulti($urls, 'frameWidth', 'DESC');
dbug_r($urls);


for($i = 0, $i_t = count($urls); $i < $i_t; $i++){
	$video = $urls[$i];
	$url = $video['defaultURL'];
	if (enString($url, '?'))
		$url = entre1y2($url, 0, '?');
	$url = preg_replace('@[a-zA-Z0-9]+\.tvolucion\.com/z@', 'apps.tvolucion.com', $url);
	$obtenido['enlaces'][] = array(
		'url_txt' => 'Tamaño: ' . $video['frameWidth'] . 'x' . $video['frameHeight'],
		'url'  => $url,
		'tipo' => 'http'
	);
}

$obtenido['alerta_especifica'] = "Puede ser necesario usar un Proxy ya que los vídeos pueden tener GeoBloqueo (restricción por país).";

}



$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}

}
