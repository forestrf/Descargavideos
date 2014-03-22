<?php
function hogarutil(){
global $web,$web_descargada;
$retfull=$web_descargada;



$obtenido=array('enlaces' => array());

//http://c.brightcove.com/services/viewer/federated_f9?&flashID=ms-player2-continuo-bcObject&playerID=2418571368001&publisherID=2385340627001&%40videoPlayer=2875076343001&isVid=true&isUI=true&linkBaseURL=".urlencode()
$patron = '@GENERAL.videoBrightcove.*?\(.*?"(.*?)".*?,.*?"(.*?)"@i';
preg_match($patron,$retfull,$matches);
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
					"URL" => $web, //Innecesario
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