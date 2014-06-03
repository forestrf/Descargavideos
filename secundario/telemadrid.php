<?php
function telemadrid(){
global $web,$web_descargada;
$retfull=$web_descargada;


$obtenido=array('enlaces' => array());


if(enString($retfull,'<param name="publisherID"'))
	$publisherId=entre1y2($retfull,'<param name="publisherID" value="','"');
if(!isset($publisherId)){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}

if(enString($retfull,'<param name="@videoPlayer"'))
	$contentId=entre1y2($retfull,'<param name="@videoPlayer" value="','"');
if(!isset($contentId)){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}

if(enString($retfull,'<param name="playerID"'))
	$experienceID=entre1y2($retfull,'<param name="playerID" value="','"');
if(!isset($experienceID)){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}
dbug("experienceID = playerId -> ".$experienceID);
$messagebroker="http://c.brightcove.com/services/messagebroker/amf?playerId=".$experienceID;



include 'brightcove-funciones.php';


/*
$lol="AAMAAAABAEZjb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkV4cGVyaWVuY2VSdW50aW1lRmFjYWRlLmdldERhdGFGb3JFeHBlcmllbmNlAAIvMQAAAcsKAAAAAgIAKDBhMGVmYTdhMTBjMTg2M2IyZjk5MmE2MGQ3MjJiYTlkNDExMzg4NGQRCmNjY29tLmJyaWdodGNvdmUuZXhwZXJpZW5jZS5WaWV3ZXJFeHBlcmllbmNlUmVxdWVzdCFjb250ZW50T3ZlcnJpZGVzE3BsYXllcktleRFUVExUb2tlbhlkZWxpdmVyeVR5cGUHVVJMGWV4cGVyaWVuY2VJZAkDAQqBA1Njb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkNvbnRlbnRPdmVycmlkZRtmZWF0dXJlZFJlZklkFWNvbnRlbnRJZHMZY29udGVudFJlZklkF2NvbnRlbnRUeXBlDXRhcmdldBtjb250ZW50UmVmSWRzFWZlYXR1cmVkSWQTY29udGVudElkAQEBBAAGF3ZpZGVvUGxheWVyAQV/////4AAAAAVChKrndlYIAAYBBgEFf////+AAAAAGgTVodHRwOi8vd3d3LnRlbGVtYWRyaWQuZXMvcHJvZ3JhbWFzL21hZHJpbGVub3MtcG9yLWVsLW11bmRvL21hZHJpbGVub3MtcG9yLWVsLW11bmRvLXNpY2lsaWEFQjoHC+3hAAA=";

print_r(brightcove_decode(base64_decode($lol)));
*/




$a_encodear = array
(
	"target"	=> "com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience",
	"response"	=> "/1",
	"data"		=> array
	(
		"0" => "0a0efa7a10c1863b2f992a60d722ba9d4113884d",
		"1" => new SabreAMF_AMF3_Wrapper
		(
			new SabreAMF_TypedObject
			(
				"com.brightcove.experience.ViewerExperienceRequest",
				array
				(
					"contentOverrides" => array(
						new SabreAMF_TypedObject
						(
							"com.brightcove.experience.ContentOverride",
							array
							(
								"featuredRefId" => null,
								"contentIds" => null,
								"contentRefId" => null,
								"contentType" => 0,
								"target" => "videoPlayer",
								"contentRefIds" => null,
								"featuredId" => NAN,
								"contentId" => $contentId
							)
						)
					),
					"playerKey" => null,
					"TTLToken" => null,
					"deliveryType" => NAN,
					"URL" => $web, //Innecesario
					"experienceId" => $experienceID
				)
			)
		)
	)
);

$post = brightcove_encode($a_encodear);

/*
print_r(brightcove_decode($post));
exit;
*/

dbug('a descargar: '.$messagebroker);
$t=brightcove_curl_web($messagebroker,$post);

$res_decoded=brightcove_decode($t);
dbug("PRIMERA RESPUESTA BRIGHTCOVE (enlaces de vídeos aquí):");
dbug_r($res_decoded);







$base=$res_decoded["data"]->getAMFData();
$base2=$base["programmedContent"]["videoPlayer"]->getAMFData();
$base3=$base2["mediaDTO"]->getAMFData();

$titulo=$base3["shortDescription"];
$imagen=$base3["videoStillURL"];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);


$mediaId = $base2["mediaId"];
dbug('mediaId = '.$mediaId);





//http://telemadrid-f.akamaihd.net/hd/104403117001/201312/104403117001_2893,100922,090935,103695,001_6760d109-240a-432a-a857-f4434542ea55.mp4.csmil/bitrate=2?videoId=2892867548001&pubId=104403117001&playerId=111787372001&lineUpId=&affiliateId=&bandwidthEstimationTest=true&v=&fp=&r=&g=
$finalURL = '.csmil/bitrate=2?videoId='.$mediaId.'&pubId='.$publisherId.'&playerId='.$experienceID.'&v=&fp=&r=&g=';


$aPartir = array();

$URLBase = '';
$inicio = 0;

dbug('renditions');
$renditions = $base3["renditions"];
for($i=0; $i<$i_total=Count($renditions); $i++){
	$temp=$renditions[$i]->getAMFData();
	$URLBase = $temp["defaultURL"];
	$inicio = strpos($URLBase, '_') +1;
	$final = strpos($URLBase, '_', $inicio);
	$n1 = substr($URLBase,$inicio,5);
	$n2 = substr($URLBase,$inicio+5,5);
	$n3 = substr($URLBase,$inicio+10,3);
	$aPartir[] = substr($URLBase, $inicio, $final -$inicio);
}



dbug_r($aPartir);

dbug('$URLBase => '.$URLBase);

$principio = substr($URLBase,0,$inicio);
$inicio2 = strpos($URLBase, '_', $inicio);
$final = substr($URLBase,$inicio2,strlen($URLBase)-$inicio2);

dbug('$principio => '.$principio);
dbug('$final => '.$final);
dbug('$finalURL => '.$finalURL);


//Se supone que todos son igual de largos. Los número separados por comas se formar a partir de el inicio común de todos como primer número, el final común como último número, y los intermedios son lo que cambia.

/*
Las siguientes son todas URL válidas:

http://telemadridhdhd-f.akamaihd.net/hd/104403117001/104403117001_28405,62175,77044,77622,001_e9b9daed-e008-470c-b1d4-6463de1bb823.mp4.csmil/bitrate=2?videoId=2840532536001&lineUpId=&pubId=104403117001&playerId=111787372001&affiliateId=&bandwidthEstimationTest=true&v=3.1.0&fp=WIN%2011,9,900,170&r=PBMXA&g=DBNLQTFOYOHN
http://telemadridhdhd-f.akamaihd.net/hd/104403117001/104403117001_284,05621750,05770440,05776220,01_e9b9daed-e008-470c-b1d4-6463de1bb823.mp4.csmil/bitrate=2?videoId=2840532536001&lineUpId=&pubId=104403117001&playerId=111787372001&affiliateId=&bandwidthEstimationTest=true&v=3.1.0&fp=WIN%2011,9,900,170&r=PBMXA&g=DBNLQTFOYOHN
http://telemadridhdhd-f.akamaihd.net/hd/104403117001/104403117001_,2840562175001,2840577044001,2840577622001,_e9b9daed-e008-470c-b1d4-6463de1bb823.mp4.csmil/bitrate=2?videoId=2840532536001&lineUpId=&pubId=104403117001&playerId=111787372001&affiliateId=&bandwidthEstimationTest=true&v=3.1.0&fp=WIN%2011,9,900,170&r=PBMXA&g=DBNLQTFOYOHN
*/


$obtenido['enlaces']=array(
	array(
		'url_txt'	=> 'Descargar',
		'url'		=> $principio.','.implode(',',$aPartir).','.$final.$finalURL,
		'tipo'		=> 'http',
		'extension'	=> 'mp4'
	)
);




$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}
?>