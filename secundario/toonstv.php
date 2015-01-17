<?php

class Toonstv extends cadena{

function calcula(){

$obtenido=array('enlaces' => array());


// https://www.toons.tv/channels/Angry_Birds_Toons/2836878488001
// $contentId = 2836878488001;
preg_match("@/([0-9]*?)$@", $this->web, $matches);
dbug_r($matches);
$contentId = $matches[1];


$playerID = 2575783636001;
$playerKey = "AQ~~,AAAB4eGoB7k~,qFXAwsXF0CNH_yigPCPuBhmMwKcWfpTc";



include 'brightcove-funciones.php';



//2836878488001
/*
$lol = "AAMAAAABAEZjb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkV4cGVyaWVuY2VSdW50aW1lRmFjYWRlLmdldERhdGFGb3JFeHBlcmllbmNlAAIvMQAABFYKAAAAAgIAKDc1Mzg0ZjZkNmJiMTdmOWJkZDQ0YjgxNTc0ODdiOWE2NGY0MGY2YjQRCmNjY29tLmJyaWdodGNvdmUuZXhwZXJpZW5jZS5WaWV3ZXJFeHBlcmllbmNlUmVxdWVzdBlkZWxpdmVyeVR5cGUTcGxheWVyS2V5B1VSTBlleHBlcmllbmNlSWQhY29udGVudE92ZXJyaWRlcxFUVExUb2tlbgV/////4AAAAAZlQVF+fixBQUFCNGVHb0I3a34scUZYQXdzWEYwQ05IX3lpZ1BDUHVCaG1Nd0tjV2ZwVGMGimdodHRwczovL3NhZG1pbi5icmlnaHRjb3ZlLmNvbS92aWV3ZXIvdXMyMDE0MDEzMC4xMzIwL0JyaWdodGNvdmVCb290bG9hZGVyLnN3Zj9wbGF5ZXJJRD0yNTc1NzgzNjM2MDAxJnBsYXllcktleT1BUSU3RSU3RSUyQ0FBQUI0ZUdvQjdrJTdFJTJDcUZYQXdzWEYwQ05IX3lpZ1BDUHVCaG1Nd0tjV2ZwVGMmc2VjdXJlQ29ubmVjdGlvbnM9dHJ1ZSZwdXJsPWh0dHBzJTNBJTJGJTJGd3d3LnRvb25zLnR2JTJGY2hhbm5lbHMlMkZBbmdyeV9CaXJkc19Ub29ucyUyRjI4MzY4Nzg0ODgwMDEmYXV0b1N0YXJ0PSZiZ2NvbG9yPSUyMzQ5NDk0OSZkZWJ1Z2dlcklEPSZkeW5hbWljU3RyZWFtaW5nPXRydWUmZmxhc2hJRD1teUV4cGVyaWVuY2UmaGVpZ2h0PTM2MCZodG1sRGVmYXVsdEJpdHJhdGU9ODk2MDAwJmluY2x1ZGVBUEk9dHJ1ZSZpc1VJPXRydWUmaXNWaWQ9dHJ1ZSZvcmlnaW5hbFRlbXBsYXRlUmVhZHlIYW5kbGVyPUJDTC5vblRlbXBsYXRlUmVhZHkmc2VjdXJlSFRNTENvbm5lY3Rpb25zPXRydWUmc3RhcnRUaW1lPTEzOTE0NjU2ODk4NzYmdGVtcGxhdGVMb2FkSGFuZGxlcj1CQ0wub25UZW1wbGF0ZUxvYWQmdGVtcGxhdGVSZWFkeUhhbmRsZXI9YnJpZ2h0Y292ZSU1QiUyMnRlbXBsYXRlUmVhZHlIYW5kbGVybXlFeHBlcmllbmNlJTIyJTVEJnZpZGVvSUQ9MjgzNjg3ODQ4ODAwMSZ3aWR0aD02NDAmd21vZGU9b3BhcXVlBUKCvcVZYQgACQMBCoEDU2NvbS5icmlnaHRjb3ZlLmV4cGVyaWVuY2UuQ29udGVudE92ZXJyaWRlFWZlYXR1cmVkSWQTY29udGVudElkG2ZlYXR1cmVkUmVmSWQVY29udGVudElkcxljb250ZW50UmVmSWQNdGFyZ2V0G2NvbnRlbnRSZWZJZHMXY29udGVudFR5cGUFf////+AAAAAFQoSkGROOCAABAQEGF3ZpZGVvUGxheWVyAQQABgE=";
$lol = base64_decode($lol);

dbug_r(brightcove_decode($lol));
*/





//http://c.brightcove.com/services/messagebroker/amf?playerKey=AQ~~,AAAAEUA28vk~,ZZqXLYtFw-ADB2SpeHfBR3cyrCkvIrAe
$messagebroker="https://secure.brightcove.com/services/messagebroker/amf?playerKey=".$playerKey;





$a_encodear = array
(
	"target"	=> "com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience",
	"response"	=> "/1",
	"data"		=> array
	(
		"0" => "75384f6d6bb17f9bdd44b8157487b9a64f40f6b4",
		"1" => new SabreAMF_AMF3_Wrapper
		(
			new SabreAMF_TypedObject
			(
				"com.brightcove.experience.ViewerExperienceRequest",
				array
				(
					"deliveryType" => NAN,
					"playerKey" => $playerKey,
					"URL" => $this->web, //Parece que hay bloqueo por referer. Este es el referer.
					"experienceId" => $playerID,
					"contentOverrides" => array(
						"0" => new SabreAMF_TypedObject
						(
							"com.brightcove.experience.ContentOverride",
							array
							(
								"featuredId" => NAN,
								"contentId" => $contentId,
								"featuredRefId" => null,
								"contentIds" => null,
								"contentRefId" => null,
								"target" => "videoPlayer",
								"contentRefIds" => null,
								"contentType" => 0
							)
						)
					),
					"TTLToken" => null
				)
			)
		)
	)
);

$post = brightcove_encode($a_encodear);




dbug('a descargar: '.$messagebroker);
/*$t=brightcove_curl_web("http://forestrf.no-ip.org/",$post); //borrar, es una prueba
dbug($t);
exit;*/
$t=brightcove_curl_web($messagebroker,$post);
dbug($t);

$res_decoded=brightcove_decode($t);
dbug("PRIMERA RESPUESTA BRIGHTCOVE:");
dbug_r($res_decoded);





// http://roviohdhd-f.akamaihd.net/hd/2069665155001/2069665155001_28369,42536,43153,38732,39126,001_ABT-E0530-SLUMBERMILL-Panama-MASTER.mp4.csmil/bitrate=3?videoId=2836878488001&lineUpId=&pubId=2069665155001&playerId=2575783636001&affiliateId=&v=&fp=&r=&g=





$base=$res_decoded["data"]->getAMFData();
$base2=$base["programmedContent"]["videoPlayer"]->getAMFData();
$base3=$base2["mediaDTO"]->getAMFData();

$titulo=$base3["shortDescription"];
$imagen=$base3["videoStillURL"];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);


$mediaId = $base2["mediaId"];
dbug('mediaId = '.$mediaId);





// http://roviohdhd-f.akamaihd.net/hd/2069665155001/2069665155001_28369,42536,43153,38732,39126,001_ABT-E0530-SLUMBERMILL-Panama-MASTER.mp4.csmil/bitrate=3?videoId=2836878488001&lineUpId=&pubId=2069665155001&playerId=2575783636001&affiliateId=&v=&fp=&r=&g=
$finalURL = '.csmil/bitrate=3?videoId='.$mediaId.'&pubId=&playerId=&v=&fp=&r=&g=';


$aPartir = array();

$URLBase = '';
$inicio = 0;

dbug('renditions');
$renditions = $base3["renditions"];
for($i=0,$i_t = count($renditions); $i<$i_t; $i++){
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
$final = substr($URLBase,$inicio2);

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

}
