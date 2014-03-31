<?php
function eitbcom(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

//titulo
//<meta property="og:title" content="Alaska y Mario Episodio Extra - Pierrot"/>
$p=strpos($retfull,'og:title');
$p=strpos($retfull,'content="',$p)+9;
$f=strpos($retfull,'"',$p);
$titulo=substr($retfull,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//imagen
//<meta property="og:image" content="http://....jpg?height=106&amp;quality=0.91"/>
$p=strpos($retfull,'og:image');
$p=strpos($retfull,'content="',$p)+9;
$f=strpos($retfull,'?',$p);
$imagen=substr($retfull,$p,$f-$p);
if(enString($imagen,'mtvnimages.com'))
	$imagen=$imagen.'?height=180&quality=1';
else
	$imagen=substr($imagen,0,strpos($imagen,'"'));
dbug('imagen='.$imagen);


//en la página
/*
http://www.eitb.com/es/videos/detalle/1258848/video-meteorito-rusia--mas-100-heridos-al-caer-meteorito/
detalle_video_1258848
http://www.eitb.com/es/get/multimedia/video/id/1258848/size/grande/
<media:content url="http://hdstreameitb-f.akamaihd.net/z/multimediahd/videos/2013/02/15/1045086/20130215_15532024_0005703037_001_001____T1_METEOR.mp4/manifest.f4m" type="video/x-flv"/>
http://www.eitb.com/multimediahd/videos/2013/02/15/1045086/20130215_15532024_0005703037_001_001____T1_METEOR.mp4
http://www.eitb.com/multimedia/videos/2011/10/24/558362/PIRINEOS_ES_20111024_101408.flv
*/



$p=strpos($retfull,'<div class="player">');
$id=entre1y2_a($retfull,$p,'detalle_video_','"');
dbug('id='.$id);
$ret=CargaWebCurl("http://www.eitb.com/es/get/multimedia/video/id/".$id."/size/grande/");

$imagen=entre1y2($ret,'thumbnail url="','"');

if(enString($ret, 'manifest.f4m')){
	$p=strpos($ret,'<media:content url="');
	$p=strpos($ret,'url="',$p);
	$p=strposF($ret,'z/',$p);
	$f=strpos($ret,'/manifest.f4m',$p);
	$url="http://www.eitb.com/".substr($ret,$p,$f-$p);
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url'  => $url,
				'tipo' => 'http'
			)
		)
	);
}
elseif(enString($ret, '.mp4') || enString($ret, '.flv')){
	$url="http://www.eitb.com/".entre1y2($ret,'<media:content url="','"');
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url'  => $url,
				'tipo' => 'http',
				'extension' => substr($url,-3,3)
			)
		)
	);
}

//a la carta: Ni idea
/*
http://www.eitb.tv/es/#/video/2142574288001
http://www.eitb.tv/es/get/videoplaylist/2142574288001/


*/




finalCadena($obtenido);
}










function eitbtv(){
global $web,$web_descargada;
$retfull=$web_descargada;


$obtenido=array('enlaces' => array());


//http://c.brightcove.com/services/messagebroker/amf?playerKey=AQ~~,AAAAEUA28vk~,ZZqXLYtFw-ADB2SpeHfBR3cyrCkvIrAe
if(enString($retfull,'<param name="playerKey"'))
	$playerKey=entre1y2($retfull,'<param name="playerKey" value="','"');
if(!isset($playerKey)){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}
dbug("playerKey -> ".$playerKey);
$messagebroker="http://c.brightcove.com/services/messagebroker/amf?playerKey=".$playerKey;


if(enString($retfull,'<param name="playerID"'))
	$experienceID=entre1y2($retfull,'<param name="playerID" value="','"');
if(!isset($experienceID)){
	setErrorWebIntera("No se ha encontrado ningún vídeo.");
	return;
}
dbug("experienceID -> ".$experienceID);


include 'brightcove-funciones.php';

$a_encodear = array
(
	"target"	=> "com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience",
	"response"	=> "/1",
	"data"		=> array
	(
		"0" => "a8cdc396a50ca2415ddd0e33cca179431347adc5",
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
					"experienceId" => (int)$experienceID,
					"playerKey" => $playerKey,
					"contentOverrides" => null
				)
			)
		)
	)
);

$post = brightcove_encode($a_encodear);



dbug('a descargar: '.$messagebroker);
$t=brightcove_curl_web($messagebroker,$post);

$res_decoded=brightcove_decode($t);
dbug("PRIMERA RESPUESTA BRIGHTCOVE:");
dbug_r($res_decoded);


$publisherId1=$res_decoded["data"]->getAMFData();
$publisherId=$publisherId1["publisherId"];
dbug("publisherId -> ".$publisherId);

preg_match_all('@/([0-9]+)/([0-9]+)/@i', $web, $match); 
$elem1=$match[1][0];
$elem2=$match[2][0];


$a_encodear_2 = array
(
	"target"	=> "com.brightcove.player.runtime.PlayerMediaFacade.findMediaById",
	"response"	=> "/1",
	"data"		=> array
	(
		"0" => "1667452d348dee57623638675cb12b6418e7ccc3",
		"1" => $experienceID,
		"2" => $elem2,
		"3" => $publisherId
	)
);

$post = brightcove_encode($a_encodear_2);

$t=brightcove_curl_web($messagebroker,$post);

$res_decoded=brightcove_decode($t);
dbug("SEGUNDA RESPUESTA BRIGHTCOVE (enlaces de vídeos aquí):");
dbug_r($res_decoded);



$base=$res_decoded["data"]->getAMFData();
$titulo=$base["displayName"];
$imagen=$base["videoStillURL"];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);


dbug('IOSRenditions');//m3u8
$IOSRenditions = $base["IOSRenditions"];
for($i=0; $i<$i_total=Count($IOSRenditions); $i++){
	$temp=$IOSRenditions[$i]->getAMFData();
	URLSDelArrayBrightCove($temp, "m3u8", $obtenido['enlaces'], $titulo);
}


dbug('renditions');
$renditions = $base["renditions"];
for($i=0; $i<$i_total=Count($renditions); $i++){
	$temp=$renditions[$i]->getAMFData();
	URLSDelArrayBrightCove($temp, "rtmpConcreto", $obtenido['enlaces'], $titulo);
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

function URLSDelArrayBrightCove($r, $tipo, &$obtenido_enlaces, $titulo){
	if($r["audioOnly"]!="1"){
		$arrayTemp=array(
			'calidad_ordenar'=>$r["encodingRate"],
			'url_txt' => 'Calidad: '.floor($r["encodingRate"]/1000)." Kbps",
			'url'     => $r["defaultURL"],
			'tipo'    => $tipo
		);
		
		if($tipo === "rtmpConcreto"){
			preg_match_all('@(mp4:.*?\.mp4)@i', $r["defaultURL"], $match);
			$y = $match[0][0];
			$arrayTemp['rtmpdump'] = '-r "'.strtr($r["defaultURL"],array('&'.$y=>'')).'" -y "'.$y.'" -o "'.generaNombreWindowsValido($titulo." - ".floor($r["encodingRate"]/1000)." Kbps".'.mp4').'"';
		}
		
		$obtenido_enlaces[] = $arrayTemp;
	}
}
?>