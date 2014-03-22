<?php
function ideal(){
global $web,$web_descargada;
$retfull=$web_descargada;



$obtenido=array('enlaces' => array());


preg_match("@/([0-9]*?)-@", $web, $matches);


if(!isset($matches[1]) || !is_numeric($matches[1])){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}


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
					"URL" => $web, //Innecesario
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
dbug($t);
exit;*/
$t=brightcove_curl_web($messagebroker,$post);
dbug($t);

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


dbug('IOSRenditions');//m3u8
$IOSRenditions = $base["IOSRenditions"];
for($i=0; $i<$i_total=Count($IOSRenditions); $i++){
	$temp=$IOSRenditions[$i]->getAMFData();
	URLSDelArrayBrightCove($temp, "m3u8", $obtenido['enlaces']);
}


dbug('renditions');
$renditions = $base["renditions"];
for($i=0; $i<$i_total=Count($renditions); $i++){
	$temp=$renditions[$i]->getAMFData();
	URLSDelArrayBrightCove($temp, "rtmp", $obtenido['enlaces']);
}

//ordenar usando ['calidad_ordenar']
for($i=0; $i<=$i_total=Count($obtenido['enlaces'])-1; $i++){
	for($j=$i+1; $j<=$i_total; $j++){
		//dbug("i:".$i." - j:".$j);
		if($obtenido['enlaces'][$i]['calidad_ordenar']<$obtenido['enlaces'][$j]['calidad_ordenar']){
			$temp=$obtenido['enlaces'][$i];
			$obtenido['enlaces'][$i]=$obtenido['enlaces'][$j];
			$obtenido['enlaces'][$j]=$temp;
		}
	}
}
dbug_r($obtenido['enlaces']);
//borrar ['calidad_ordenar']
for($i=0; $i<$i_total=Count($obtenido['enlaces']); $i++)
	unset($obtenido['enlaces'][$i]['calidad_ordenar']);

//sacar 'url-txt' a otro res de solo 'titulo'
$obtenido_enlaces_temp=array();
for($i=0; $i<$i_total=Count($obtenido['enlaces']); $i++){
	$obtenido_enlaces_temp[]=array('titulo' => $obtenido['enlaces'][$i]['url_txt']);
	unset($obtenido['enlaces'][$i]['url_txt']);
	$obtenido_enlaces_temp[]=$obtenido['enlaces'][$i];
}
$obtenido['enlaces']=$obtenido_enlaces_temp;
	


$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}

function URLSDelArrayBrightCove($r, $tipo, &$obtenido_enlaces){
	if($r["audioOnly"]!="1"){
		$obtenido_enlaces[]=array(
			'calidad_ordenar'=>$r["encodingRate"],
			'url_txt' => 'Calidad: '.floor($r["encodingRate"]/1000)." Kbps",
			'url'     => $r["defaultURL"],
			'tipo'    => $tipo
		);
	}
}
?>