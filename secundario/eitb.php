<?php
function eitbcom(){
global $web,$web_descargada;
$retfull=&$web_descargada;
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

if(enString($retfull, '<div class="player">')){
	if(!enString($retfull, 'detalle_video_')){
		setErrorWebIntera('No se puede encontrar ningún vídeo.');
		return;
	}
	$p=strpos($retfull,'<div class="player">');
	$id=entre1y2_a($retfull,$p,'detalle_video_','"');
	dbug('id='.$id);
}
elseif(enString($retfull, 'insertar_player_video(')){
	$id=entre1y2($retfull,'insertar_player_video(',',');
	dbug('id='.$id);
}
$ret=CargaWebCurl('http://www.eitb.com/es/get/multimedia/video/id/'.$id.'/size/grande/');

$imagen=entre1y2($ret,'thumbnail url="','"');

if(enString($ret, 'manifest.f4m')){
	$p=strpos($ret,'<media:content url="');
	$p=strpos($ret,'url="',$p);
	$p=strposF($ret,'z/',$p);
	$f=strpos($ret,'/manifest.f4m',$p);
	$url='http://www.eitb.com/'.substr($ret,$p,$f-$p);
	
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
	$url='http://www.eitb.com/'.entre1y2($ret,'<media:content url="','"');
	
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
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}
dbug('playerKey -> '.$playerKey);
$messagebroker='http://c.brightcove.com/services/messagebroker/amf?playerKey='.$playerKey;


if(enString($retfull,'<param name="playerID"'))
	$experienceID=entre1y2($retfull,'<param name="playerID" value="','"');
if(!isset($experienceID)){
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}
dbug('experienceID -> '.$experienceID);


include 'brightcove-funciones.php';

$a_encodear = array
(
	'target'	=> 'com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience',
	'response'	=> '/1',
	'data'		=> array
	(
		'0' => 'a8cdc396a50ca2415ddd0e33cca179431347adc5',
		'1' => new SabreAMF_AMF3_Wrapper
		(
			new SabreAMF_TypedObject
			(
				'com.brightcove.experience.ViewerExperienceRequest',
				array
				(
					'TTLToken' => null,
					'deliveryType' => NAN,
					'URL' => $web, //Innecesario
					'experienceId' => $experienceID,
					'playerKey' => $playerKey,
					'contentOverrides' => null
				)
			)
		)
	)
);

$post = brightcove_encode($a_encodear);



dbug('a descargar: '.$messagebroker);
$t=brightcove_curl_web($messagebroker,$post);

$res_decoded=brightcove_decode($t);
dbug('PRIMERA RESPUESTA BRIGHTCOVE:');
dbug_r($res_decoded);


$publisherId1=$res_decoded['data']->getAMFData();
$publisherId=$publisherId1['publisherId'];
dbug('publisherId -> '.$publisherId);

preg_match_all('@/([0-9]+)/([0-9]+)/@i', $web, $match); 
$elem1=$match[1][0];
$elem2=$match[2][0];


$a_encodear_2 = array
(
	'target'	=> 'com.brightcove.player.runtime.PlayerMediaFacade.findMediaById',
	'response'	=> '/1',
	'data'		=> array
	(
		'0' => '1667452d348dee57623638675cb12b6418e7ccc3',
		'1' => $experienceID,
		'2' => $elem2,
		'3' => $publisherId
	)
);

$post = brightcove_encode($a_encodear_2);

$t=brightcove_curl_web($messagebroker,$post);

$res_decoded=brightcove_decode($t);
dbug('SEGUNDA RESPUESTA BRIGHTCOVE (enlaces de vídeos aquí):');
dbug_r($res_decoded);

if($res_decoded['data'] === null){
	// Seguro que el vídeo no funciona en la página oficial.
	setErrorWebIntera('No se puede reproducir el vídeo desde el enlace que ha indicado.');
	return;
}

$base=$res_decoded['data']->getAMFData();
$titulo=$base['displayName'];
$imagen=$base['videoStillURL'];
dbug('titulo = '.$titulo);
dbug('imagen = '.$imagen);


$obtenido['enlaces'] = brightcove_genera_obtenido($base, array(
	'IOSRenditions' => 'm3u8',
	'renditions' => 'rtmpConcreto'
), $titulo);
	


$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}

function URLSDelArrayBrightCove($r, $tipo, &$obtenido_enlaces, $titulo){
	if($r['audioOnly']!='1'){
		$arrayTemp=array(
			'calidad_ordenar' => $r['encodingRate'],
			'titulo'          => 'Calidad: '.floor($r['encodingRate']/1000).' Kbps',
			'url'             => $r['defaultURL'],
			'tipo'            => $tipo
		);
		
		//rtmpdump --rtmp "rtmp://brightcove.fcod.llnwd.net/a500/e1/uds/rtmp/ondemand/&mp4:102076681001/102076681001_1194607581001_40628-20111001-193913.mp4&1396378800000&8ea0d55b8390f639ceb5d6cb0012f5a1" --app="a500/e1/uds/rtmp/ondemand?videoId=1194575820001&lineUpId=&pubId=102076681001&playerId=2202962695001" --swfUrl="http://admin.brightcove.com/viewer/us20121218.1107/federatedVideoUI/BrightcovePlayer.swf?uid=1355158765470" --playpath="mp4:102076681001/102076681001_1194607581001_40628-20111001-193913.mp4?videoId=1194575820001&lineUpId=&pubId=102076681001&playerId=2202962695001" --pageUrl="http://www.eitb.tv/es/video/escepticos/1162371025001/1194575820001/-todo-esta-escrito-/" -C "B:0" -C "S:mp4:102076681001/102076681001_1194607581001_40628-20111001-193913.mp4&1396378800000&8ea0d55b8390f639ceb5d6cb0012f5a1" -o "Escepticos_-3-.mp4"
		
		if(enString($r['defaultURL'], 'brightcove')){
			preg_match('@://.*?/(.*?)[\?&].*?mp4:(.*?)$@', $r['defaultURL'], $matches);
			$a = $matches[1];
			$CS = $matches[2];
			$extra = '-a "'.$a.'" -C "B:0" -C "S:'.$CS.'" ';
		}
		else{ //else edgefcs
			$extra = '';
		}
		
		//print_r($matches);
		
		
		
		if($tipo === 'rtmpConcreto'){
			preg_match_all('@(mp4:.*?\.mp4)@i', $r['defaultURL'], $match);
			$y = $match[0][0];
			$arrayTemp['rtmpdump'] = '-r "'.strtr($r['defaultURL'],array('&'.$y=>'')).'" -y "'.$y.'" '.$extra.' -o "'.generaNombreWindowsValido($titulo.' - '.floor($r['encodingRate']/1000).' Kbps'.'.mp4').'"';
		}
		
		$obtenido_enlaces[] = $arrayTemp;
	}
}
?>