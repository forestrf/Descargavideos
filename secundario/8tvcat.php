<?php

class OchoTVcat extends cadena{

function calcula(){

$obtenido=array('enlaces' => array());


if (!enString($this->web_descargada, 'name="@videoPlayer"')) {
	// <iframe id="entry-player" src="//players.brightcove.net/1589608506001/78ec8cae-ae89-481a-8e95-b434e884e65c_default/index.html?videoId=5165793197001&autoplay"
	// https://edge.api.brightcove.com/playback/v1/accounts/1589608506001/videos/5165793197001
	
	if (preg_match('@//players.brightcove.net/([0-9]+?)/.+?videoId=([0-9]+?)[&"]@', $this->web_descargada, $matches)) {
		dbug_r($matches);
		/* Para que la url de la api funcione hay que enviar la cabecera
		Accept: application/json;pk=BCpkADawqM0yNpRcqDSHVNbUNbcN95zKSM60CvPyMAaTR-Gr8cF3B6l2mV8foou1rmu08m3an1yjj-ikUuwKjVMLSKEolTur7xeCJlf2QrnaAodMX2l4WfINughBDczNizUI6su9QedX7xJ-
		pk se saca del iframe player
		policyKey:\"BCpkADawqM0yNpRcqDSHVNbUNbcN95zKSM60CvPyMAaTR-Gr8cF3B6l2mV8foou1rmu08m3an1yjj-ikUuwKjVMLSKEolTur7xeCJlf2QrnaAodMX2l4WfINughBDczNizUI6su9QedX7xJ-\"
		*/
		$iframe = CargaWebCurl('http:' . $matches[0]);
		dbug_($iframe);
		
		if (preg_match("@policyKey(?:\\\\?\")?:(?:\\\\?\")?([a-zA-Z0-9-]{15,}+)@", $iframe, $policyKey)) {
			dbug_r($policyKey);
			
			$xhr = 'https://edge.api.brightcove.com/playback/v1/accounts/'.$matches[1].'/videos/'.$matches[2];
			$xhr = CargaWebCurl($xhr, '', false, '', Array('Accept: application/json;pk='.$policyKey[1]));
			dbug_($xhr);
			$xhr = json_decode($xhr, true);
			$xhr['sources'] = sortmulti($xhr['sources'], 'avg_bitrate', 'desc');
			dbug_r($xhr);
			
			foreach($xhr['sources'] as $source) {
				if (strpos($source['src'], 'http:') === 0 && !enString($source['src'], '.m3u8')) {
					$obtenido['enlaces'][] = array(
						'titulo'  => 'Tamaño: ' . $source['width'] . ' x ' . $source['height'],
						'url_txt' => 'Descargar',
						'url'     => $source['src'],
						'tipo'    => 'http'
					);
				}
			}
			
			$obtenido['titulo'] = $xhr['name'];
			$obtenido['imagen'] = $xhr['poster'];
			
			finalCadena($obtenido,false);
			return;
		}
	}
}


if(preg_match('#<param.+?name="@videoPlayer".+?value="(.+?)"#', $this->web_descargada, $matches))
	$contentId=$matches[1];
else {
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}

if(preg_match('#<param.+?name="playerID".+?value="(.+?)"#', $this->web_descargada, $matches))
	$experienceID=$matches[1];
else {
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}

dbug('$contentId -> '.$contentId);
dbug('experienceID = playerId -> '.$experienceID);

$messagebroker='http://c.brightcove.com/services/messagebroker/amf?playerId='.$experienceID;



include 'brightcove-funciones.php';



$a_encodear = array
(
	'target'	=> 'com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience',
	'response'	=> '/1',
	'data'		=> array
	(
		'0' => 'fcc17f21d09457d5e28d64c3dc0c0a3cb8863710',
		'1' => new SabreAMF_AMF3_Wrapper
		(
			new SabreAMF_TypedObject
			(
				'com.brightcove.experience.ViewerExperienceRequest',
				array
				(
					'contentOverrides' => array(
						new SabreAMF_TypedObject
						(
							'com.brightcove.experience.ContentOverride',
							array
							(
								'featuredRefId' => null,
								'contentIds' => null,
								'contentRefId' => null,
								'contentType' => 0,
								'target' => 'videoPlayer',
								'contentRefIds' => null,
								'featuredId' => NAN,
								'contentId' => $contentId
							)
						)
					),
					'playerKey' => null,
					'TTLToken' => null,
					'deliveryType' => NAN,
					'URL' => $this->web, //Innecesario
					'experienceId' => $experienceID
				)
			)
		)
	)
);

$post = brightcove_encode($a_encodear);


dbug('a descargar: '.$messagebroker);
$t=brightcove_curl_web($messagebroker,$post);

dbug_($t);

$res_decoded=brightcove_decode($t);
dbug('PRIMERA RESPUESTA BRIGHTCOVE (enlaces de vídeos aquí):');
dbug_r($res_decoded);




$base=$res_decoded['data']->getAMFData();
$base2=$base['programmedContent']['videoPlayer']->getAMFData();
$base3=$base2['mediaDTO']->getAMFData();

$titulo=$base3['displayName'];
$titulo=limpiaTitulo($titulo);
$imagen=$base3['videoStillURL'];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);



$obtenido['enlaces'] = brightcove_genera_obtenido(false, $base3, array(
	'IOSRenditions' => 'm3u8',
	'renditions' => 'rtmpConcreto'
), $titulo);

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}

}
