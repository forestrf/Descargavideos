<?php

class BoingWardcampbellcom extends cadena{

function calcula(){

$obtenido=array('enlaces' => array());



if(!preg_match('#<param name="playerID" value="(.+?)"#', $this->web_descargada, $matches)){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}
$playerID = $matches[1];

if(!preg_match('#<param name="publisherID" value="(.+?)"#', $this->web_descargada, $matches)){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}
$publisherID = $matches[1];

if(!preg_match('#<param name="videoId" value="(.+?)"#', $this->web_descargada, $matches)){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}
$contentId = $matches[1];


//$urlBC = 'http://c.brightcove.com/services/viewer/federated_f9?&flashID='.$matches[1].'-bcObject&playerID='.$playerID.'&publisherID='.$publisherID.'&%40videoPlayer='.$matches[2].'&isVid=true&isUI=true&linkBaseURL='.urlencode('http://www.hogarutil.com'.$matches[6]);




//http://c.brightcove.com/services/messagebroker/amf?playerKey=AQ~~,AAAAEUA28vk~,ZZqXLYtFw-ADB2SpeHfBR3cyrCkvIrAe
$messagebroker="http://c.brightcove.com/services/messagebroker/amf?playerId=".$playerID;





include 'brightcove-funciones.php';

$a_encodear = array
(
	"target"	=> "com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience",
	"response"	=> "/1",
	"data"		=> array
	(
		"0" => "8ea8d3dc9fe7f3763119fb54107e6b5f814b876f",
		"1" => new SabreAMF_AMF3_Wrapper
		(
			new SabreAMF_TypedObject
			(
				"com.brightcove.experience.ViewerExperienceRequest",
				array
				(
					"TTLToken" => null,
					"deliveryType" => NAN,
					"playerKey" => "",
					"URL" => $this->web, //Innecesario
					"experienceId" => $playerID,
					"contentOverrides" => array(
						"0" => new SabreAMF_TypedObject
						(
							"com.brightcove.experience.ContentOverride",
							array
							(
								"target" => "videoPlayer",
								"featuredId" => NAN,
								"contentType" => 0,
								"contentId" => $contentId,
								"featuredRefId" => null,
								"contentIds" => null,
								"contentRefId" => null,
								"contentRefIds" => null
							)
						)
					)
				)
			)
		)
	)
);

$post = brightcove_encode($a_encodear);




dbug('a descargar: '.$messagebroker);
$r=array(
	"Connection: close",
	"Content-type: application/x-amf"
);
$t=CargaWebCurlProxy($messagebroker,'ESP',$post,$r);
dbug_($t);

$res_decoded=brightcove_decode($t);
dbug('PRIMERA RESPUESTA BRIGHTCOVE:');
dbug_r($res_decoded);






$base = $res_decoded['data']->getAMFData();
$base = $base['programmedContent']['videoPlayer']->getAMFData();
$base = $base['mediaDTO']->getAMFData();
dbug_r($base);


$titulo=$base['displayName'];
$imagen=$base['thumbnailURL'];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);



$obtenido['enlaces'] = brightcove_genera_obtenido(false, $base, array(
	'IOSRenditions' => 'm3u8',
	'renditions' => 'http'
), $titulo);




$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;
$obtenido['descripcion']=$base['shortDescription'];

finalCadena($obtenido,false);
}

}
