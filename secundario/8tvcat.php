<?php

class OchoTVcat extends cadena{

function calcula(){

$obtenido=array('enlaces' => array());

if(preg_match('#<param.+?name="@videoPlayer".+?value="(.+?)"#', $this->web_descargada, $matches))
	$contentId=$matches[1];
if(!isset($contentId)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}

if(preg_match('#<param.+?name="playerID".+?value="(.+?)"#', $this->web_descargada, $matches))
	$experienceID=$matches[1];
if(!isset($experienceID)){
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
