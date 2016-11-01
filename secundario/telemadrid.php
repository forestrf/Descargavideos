<?php

class Telemadrid extends cadena{
	
function calcula(){

$obtenido=array('enlaces' => array());


if(enString($this->web_descargada,'<param name="publisherID"'))
	$publisherId=entre1y2($this->web_descargada,'<param name="publisherID" value="','"');
if(!isset($publisherId)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}

if(enString($this->web_descargada,'<param name="@videoPlayer"'))
	$contentId=entre1y2($this->web_descargada,'<param name="@videoPlayer" value="','"');
if(!isset($contentId)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}

if(enString($this->web_descargada,'<param name="playerID"'))
	$experienceID=entre1y2($this->web_descargada,'<param name="playerID" value="','"');
if(!isset($experienceID)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}

dbug('$publisherId -> '.$publisherId);
dbug('$contentId -> '.$contentId);
dbug('experienceID = playerId -> '.$experienceID);

$messagebroker='http://c.brightcove.com/services/messagebroker/amf?playerId='.$experienceID;



include 'brightcove-funciones.php';


/*
$lol="AAMAAAABAEZjb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkV4cGVyaWVuY2VSdW50aW1lRmFjYWRlLmdldERhdGFGb3JFeHBlcmllbmNlAAIvMQAAAcsKAAAAAgIAKDBhMGVmYTdhMTBjMTg2M2IyZjk5MmE2MGQ3MjJiYTlkNDExMzg4NGQRCmNjY29tLmJyaWdodGNvdmUuZXhwZXJpZW5jZS5WaWV3ZXJFeHBlcmllbmNlUmVxdWVzdCFjb250ZW50T3ZlcnJpZGVzE3BsYXllcktleRFUVExUb2tlbhlkZWxpdmVyeVR5cGUHVVJMGWV4cGVyaWVuY2VJZAkDAQqBA1Njb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkNvbnRlbnRPdmVycmlkZRtmZWF0dXJlZFJlZklkFWNvbnRlbnRJZHMZY29udGVudFJlZklkF2NvbnRlbnRUeXBlDXRhcmdldBtjb250ZW50UmVmSWRzFWZlYXR1cmVkSWQTY29udGVudElkAQEBBAAGF3ZpZGVvUGxheWVyAQV/////4AAAAAVChKrndlYIAAYBBgEFf////+AAAAAGgTVodHRwOi8vd3d3LnRlbGVtYWRyaWQuZXMvcHJvZ3JhbWFzL21hZHJpbGVub3MtcG9yLWVsLW11bmRvL21hZHJpbGVub3MtcG9yLWVsLW11bmRvLXNpY2lsaWEFQjoHC+3hAAA=";

print_r(brightcove_decode(base64_decode($lol)));
*/




$a_encodear = array
(
	'target'	=> 'com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience',
	'response'	=> '/1',
	'data'		=> array
	(
		'0' => '0a0efa7a10c1863b2f992a60d722ba9d4113884d',
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
/*
dbug(base64_encode($post));

$t = 'AAMAAAABAEZjb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkV4cGVyaWVuY2VSdW50aW1lRmFjYWRlLmdldERhdGFGb3JFeHBlcmllbmNlAAIvMQAAAa8KAAAAAgIAKDBhMGVmYTdhMTBjMTg2M2IyZjk5MmE2MGQ3MjJiYTlkNDExMzg4NGQRCmNjY29tLmJyaWdodGNvdmUuZXhwZXJpZW5jZS5WaWV3ZXJFeHBlcmllbmNlUmVxdWVzdCFjb250ZW50T3ZlcnJpZGVzEVRUTFRva2VuGWRlbGl2ZXJ5VHlwZRNwbGF5ZXJLZXkHVVJMGWV4cGVyaWVuY2VJZAkDAQqBA1Njb20uYnJpZ2h0Y292ZS5leHBlcmllbmNlLkNvbnRlbnRPdmVycmlkZRtjb250ZW50UmVmSWRzF2NvbnRlbnRUeXBlFWZlYXR1cmVkSWQTY29udGVudElkDXRhcmdldBtmZWF0dXJlZFJlZklkFWNvbnRlbnRJZHMZY29udGVudFJlZklkAQQABX/////gAAAABUKMGgqQeggABhd2aWRlb1BsYXllcgEBAQYBBX/////gAAAABgEGf2h0dHA6Ly93d3cudGVsZW1hZHJpZC5lcy9wcm9ncmFtYXMvcnV0YS0xNzkvcnV0YS0xNzktbGEtY2FicmVyYQVCOgcL7eEAAA==';
dbug_($t);
$t = base64_decode($t);
$t = brightcove_decode($t);
//dbug_r($t);
$t = brightcove_encode($t);
dbug(base64_encode($t));
$t = brightcove_decode($t);
dbug_r($t);
exit;
*/

dbug('a descargar: '.$messagebroker);
$t=brightcove_curl_web($messagebroker,$post);

dbug_($t);

$res_decoded=brightcove_decode($t);
dbug('PRIMERA RESPUESTA BRIGHTCOVE (enlaces de vídeos aquí):');
dbug_r($res_decoded);







$base=$res_decoded['data']->getAMFData();
$publisherId=$base['publisherId'];
$base2=$base['programmedContent']['videoPlayer']->getAMFData();
$base3=$base2['mediaDTO']->getAMFData();

$titulo=$base3['shortDescription'];
$titulo=limpiaTitulo($titulo);
$imagen=$base3['videoStillURL'];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);

$mediaId = $base2['mediaId'];
dbug('mediaId = '.$mediaId);



dbug('renditions');
$renditions = $base3['renditions'];

$t = $renditions[0]->getAMFData();
if(enString($t['defaultURL'], '/hd/')){
	// Modo url larga
	//http://telemadrid-f.akamaihd.net/hd/104403117001/201312/104403117001_2893,100922,090935,103695,001_6760d109-240a-432a-a857-f4434542ea55.mp4.csmil/bitrate=2?videoId=2892867548001&pubId=104403117001&playerId=111787372001&lineUpId=&affiliateId=&bandwidthEstimationTest=true&v=&fp=&r=&g=
	$finalURL = '.csmil/bitrate=2?videoId='.$mediaId.'&pubId='.$publisherId.'&playerId='.$experienceID.'&v=&fp=&r=&g=';
	
	
	$aPartir = array();
	
	$URLBase = '';
	
	dbug('renditions');
	$renditions = $base3['renditions'];
	for($i=0, $i_t=count($renditions); $i<$i_t; $i++){
		$temp = $renditions[$i]->getAMFData();
		$URLBase = &$temp['defaultURL'];
		$inicio = strposF($URLBase, '_');
		$final = strpos($URLBase, '_', $inicio);
		$n1 = substr($URLBase,$inicio,5);
		$n2 = substr($URLBase,$inicio+5,5);
		$n3 = substr($URLBase,$inicio+10,3);
		$aPartir[] = substr($URLBase, $inicio, $final -$inicio);
	}
	
	
	
	dbug_r($aPartir);
	
	dbug('$URLBase => '.$URLBase);
	
	$principio = substr($URLBase, 0, $inicio);
	$inicio2 = strpos($URLBase, '_', $inicio);
	$final = substr($URLBase, $inicio2);
	
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
}
else{
	$url = array('', 0);
	for($i=0,$i_t=count($renditions); $i<$i_t; $i++){
		$temp=$renditions[$i]->getAMFData();
		if($url[1] < $temp['encodingRate']){
			$url[0] = $temp['defaultURL'];
			$url[1] = $temp['encodingRate'];
		}
	}
	
	
	
	dbug('$url => '.$url[0]);
	
	if (strpos($url[0], 'http') === 0) {
		// http://telemadrid1-bc-od.hls.adaptive.level3.net/Telemadrid_104403117001/pd/104403117001/201610/2059/104403117001_5175441680001_5175262977001.mp4
		$obtenido['enlaces']=array(
			array(
				'url'       => $url[0],
				'url_txt'   => 'Descargar',
				'tipo'      => 'http',
				'extension' => 'mp4'
			)
		);
	} else {
		/*
		rtmpdump
		-r "rtmp://telemadrid2-bc-od-flashfs.fplive.net:1935/telemadrid2-bc-od-flash?videoId=3712633770001&lineUpId=&pubId=104403117001&playerId=111787372001&affiliateId="
		-a "telemadrid2-bc-od-flash?videoId=3712633770001&lineUpId=&pubId=104403117001&playerId=111787372001&affiliateId="
		-f "WIN 14,0,0,145"
		-W "http://admin.brightcove.com/viewer/us20140807.1543/federatedVideoUI/BrightcovePlayer.swf?uid=1407518049436"
		-p "http://www.telemadrid.es/programas/aqui-en-madrid/aqui-en-madrid-04082014"
		-y "mp4:rtmp_uds/104403117001/201408/951/104403117001_3712803353001_d721fb63-a0b2-4ec6-a3cf-85641c726e34.mp4?videoId=3712633770001&lineUpId=&pubId=104403117001&playerId=111787372001&affiliateId="
		-o 104403117001_371280335
		3001_d721fb63-a0b2-4ec6-a3cf-85641c726e34.flv
		*/
		
		/*
		$dominio = entre1y2($url[0], 'http://','/');
		dbug($dominio);
		//$url[0] = strtr($url[0], array($dominio => 'brightcove04.o.brightcove.com'));
		*/
		
		$andpos = strpos($url[0], '&');
		$end = '?videoId='.$mediaId.'&lineUpId=&pubId='.$publisherId.'&playerId='.$experienceID.'&affiliateId=';
		
		$r = substr($url[0], 0, $andpos);
		if ($r[strlen($r) - 1] === '/') {
			$r = substr($r, 0, strlen($r) - 1);
		}
		
		$obtenido['enlaces']=array(
			array(
				'url'            => '-',
				'rtmpdump'       => '-r "'.$r.$end.'" '.
									'-y "'.substr($url[0], $andpos+1).$end.'"',
				'nombre_archivo' => generaNombreWindowsValido($titulo).'.mp4',
				'tipo'           => 'rtmpConcreto',
				'extension'      => 'mp4'
			)
		);
	}
}





$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}

}
