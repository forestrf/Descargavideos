<?php

class Ideal extends cadena{

function calcula(){

$obtenido=array('enlaces' => array());


preg_match("@([0-9]+?)(?:\.html|-)@", $this->web, $matches);

dbug_r($matches);

if(!isset($matches[1]) || !is_numeric($matches[1])){
	// http://granadacf.ideal.es/noticias/201410/20/entrenamiento-mucho-contenido-fisico-20141020130408.html
	// http://granadacf.ideal.es/modgen/?idModulo=rediseno2014/PPLL_playerVideoShowVideo&modoExtendido=player&idDivVideo=video_3849210620001_3092136624146_1_1413829041980&classVideo=story&widthVideo=490&heightVideo=490&idVideo=3849210620001&linkURLVideo=http%3A//www.ideal.es/videos/granadacf/201410/20/entrenamiento-mucho-contenido-fisico-3849210620001-mm.html&stillURLVideo=http%3A//www.ideal.es/noticias/201410/20/media/cortadas/entreno--490x490.jpg&medio=ideal&dominio=http%3A//www.ideal.es&location=granadacf.ideal.es&nameVideo=Entrenamiento%20con%20mucho%20contenido%20f%26iacute%3Bsico%20para%20iniciar%20la%20semana&shortDescriptionVideo=Entrenamiento%20con%20mucho%20contenido%20f%26iacute%3Bsico%20para%20iniciar%20la%20semana&creationDateMilisecondsVideo=1413821723&origenVideo=bc&capaModal=true&usoResizer=false&autoStartVideo=true&charset=WINDOWS-1252&authorVideo=STUDIO%20SUR&smoothingVideo=false&loid=30.9.2136624146&dispositivo=pc
	
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}

// http://www.ideal.es/videos/granada/noticias/1342041315001-02184-serie-tercer-premio-acera-darro.html
$idVideo = $matches[1];
$datosBC = "http://modulos-mm.ideal.es/includes/manuales/videos/php/proxyModgen.php?idVideo=".$idVideo."&idModulo=VOC_playerVideoShowVideo&modoExtendido=player&idDivVideo=video&medio=ideal&origenVideo=bc";


$datosBC = CargaWebCurl($datosBC);
dbug($datosBC);



$publisherID = entre1y2($datosBC,'"publisherID" value="','"');
$playerID = entre1y2($datosBC,'"playerID" value="','"');


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
		"0" => "ebcf49ebfaf7ae1b09cf79a1ab47c1286b3a0605",
		"1" => new SabreAMF_AMF3_Wrapper
		(
			new SabreAMF_TypedObject
			(
				"com.brightcove.experience.ViewerExperienceRequest",
				array
				(
					"TTLToken" => null,
					"deliveryType" => NAN,
					"URL" => $this->web, //Innecesario
					"experienceId" => $playerID,
					"playerKey" => null,
					"contentOverrides" => array(
						"0" => new SabreAMF_TypedObject
						(
							"com.brightcove.experience.ContentOverride",
							array
							(
								"contentIds" => null,
								"contentRefId" => null,
								"contentRefIds" => null,
								"featuredRefId" => null,
								"contentType" => 0,
								"target" => "videoPlayer",
								"featuredId" => NAN,
								"contentId" => $idVideo
							)
						)
					)
				)
			)
		)
	)
);

$post = brightcove_encode($a_encodear);

//$test="AAMAAAABAEZjb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkV4cGVyaWVuY2VSdW50aW1lRmFjYWRlLmdldERhdGFGb3JFeHBlcmllbmNlAAIvMQAAAdAKAAAAAgIAKGViY2Y0OWViZmFmN2FlMWIwOWNmNzlhMWFiNDdjMTI4NmIzYTA2MDURCmNjY29tLmJyaWdodGNvdmUuZXhwZXJpZW5jZS5WaWV3ZXJFeHBlcmllbmNlUmVxdWVzdCFjb250ZW50T3ZlcnJpZGVzEVRUTFRva2VuGWRlbGl2ZXJ5VHlwZQdVUkwZZXhwZXJpZW5jZUlkE3BsYXllcktleQkDAQqBA1Njb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkNvbnRlbnRPdmVycmlkZRVjb250ZW50SWRzGWNvbnRlbnRSZWZJZBtjb250ZW50UmVmSWRzG2ZlYXR1cmVkUmVmSWQXY29udGVudFR5cGUNdGFyZ2V0FWZlYXR1cmVkSWQTY29udGVudElkAQEBAQQABhd2aWRlb1BsYXllcgV/////4AAAAAVCgOqrnL6IAAYBBX/////gAAAABoE/aHR0cDovL3d3dy5pZGVhbC5lcy92aWRlb3MvZ3JhbmFkYS9ub3RpY2lhcy8yMzI1MDEwOTQ2MDAxLWRpbGlnZW5jaWFzLXZ1ZWx2ZW4tdmFsbGUtbGVjcmluLmh0bWwFQlH8m6HwQAAGAQ==";
//dbug_r(brightcove_decode(base64_decode($test)));





dbug('a descargar: '.$messagebroker);
/*$t=brightcove_curl_web("http://forestrf.no-ip.org/",$post); //borrar, es una prueba
dbug_($t);
exit;*/
$t=brightcove_curl_web($messagebroker,$post);
dbug_($t);

$res_decoded=brightcove_decode($t);
dbug("PRIMERA RESPUESTA BRIGHTCOVE:");
dbug_r($res_decoded);






$base = $res_decoded["data"]->getAMFData();
$base = $base['programmedContent']['videoPlayer']->getAMFData();
$base = $base['mediaDTO']->getAMFData();
dbug_r($base);


$titulo=$base["linkText"];
$imagen=$base["videoStillURL"];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);


$obtenido['enlaces'] = brightcove_genera_obtenido($this, $base, array(
	'IOSRenditions' => 'm3u8',
	'renditions' => 'rtmp'
));
	


$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}

function URLSDelArrayBrightCove($r, $tipo, &$obtenido_enlaces){
	if($r["audioOnly"]!="1"){
		$obtenido_enlaces[]=array(
			'calidad_ordenar'=>$r["encodingRate"],
			'titulo' => 'Calidad: '.floor($r["encodingRate"]/1000)." Kbps",
			'url'     => $r["defaultURL"],
			'tipo'    => $tipo
		);
	}
}

}
