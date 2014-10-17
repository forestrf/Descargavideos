<?php

class Hogarutil extends cadena{

function calcula(){

$obtenido=array('enlaces' => array());

//http://c.brightcove.com/services/viewer/federated_f9?&flashID=ms-player2-continuo-bcObject&playerID=2418571368001&publisherID=2385340627001&%40videoPlayer=2875076343001&isVid=true&isUI=true&linkBaseURL=".urlencode()
$patron = '@GENERAL.videoBrightcove.*?\(.*?"(.*?)".*?,.*?"(.*?)"@i';
preg_match($patron,$this->web_descargada,$matches);
dbug_r($matches);



if(!isset($matches[2]) || !is_numeric($matches[2])){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}

$contentId = $matches[2];

$publisherID = 2385340627001;
$playerID = 2418571368001;


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
					"playerKey" => null,
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


$titulo=$base["displayName"];
$imagen=$base["videoStillURL"];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);



$obtenido['enlaces'] = brightcove_genera_obtenido($this, $base, array(
	'IOSRenditions' => 'm3u8',
	'renditions' => 'rtmpConcreto'
), $titulo);




$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;
$obtenido['descripcion']=$base["longDescription"];

finalCadena($obtenido,false);
}

function URLSDelArrayBrightCove($r, $tipo, &$obtenido_enlaces, $titulo){
	if($r["audioOnly"]!="1"){
		if($tipo === 'rtmpConcreto'){
			$_r = substr($r["defaultURL"], 0, strpos($r["defaultURL"], 'mp4'));
			$_r = substr($_r, 0, strrposF($_r, '/'));
			$_y = 'mp4'.entre1y2($r["defaultURL"], 'mp4', '?');
			$_ry = substr($r["defaultURL"], strpos($r["defaultURL"], '?'));
			dbug_($_r);
			dbug_($_y);
			dbug_($_ry);
			$obtenido_enlaces[]=array(
				'calidad_ordenar'=>$r["encodingRate"],
				'titulo'   => 'Calidad: '.floor($r["encodingRate"]/1000)." Kbps",
				'url'      => $r["defaultURL"],
				'tipo'     => $tipo,
				'rtmpdump' => '-r "'.$_r.$_ry.'" -y "'.$_y.$_ry.'" -o "'.$titulo.'.mp4"'
			);
		}
		else{
			$obtenido_enlaces[]=array(
				'calidad_ordenar'=>$r["encodingRate"],
				'titulo' => 'Calidad: '.floor($r["encodingRate"]/1000)." Kbps",
				'url'    => $r["defaultURL"],
				'tipo'   => $tipo
			);
		}
	}
}

}
