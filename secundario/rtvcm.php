<?php

class Rtvcm extends cadena{
	
function calcula(){
$obtenido=array('enlaces' => array());

if (enString($this->web_descargada, 'var videos = [{"')) {
	// var videos = [{"titulo":"Un lugar donde vivir","video":"8965","imagen":"http:\/\/api.rtvcm.webtv.flumotion.com\/videos\/8965\/thumbnail.jpg","fecha":"15\/06\/2015","format_date":"2015-06-15 00:00","descripcion":"Descubrimos los municipios de Cristo del Esp\u00edritu Santo (Ciudad Real) y Vega del Codorno en Cuenca.","fecha-publicacion":"1434404700"},{"titulo":"Un lugar donde vivir","fecha":"08\/06\/2015","format_date":"2015-06-08 00:00","descripcion":"","video":"8738","imagen":"http:\/\/api.rtvcm.webtv.flumotion.com\/videos\/8738\/thumbnail.jpg","fecha-publicacion":""},{"titulo":"Promo Un lugar donde vivir","fecha":"01\/06\/2015","format_date":"2015-06-01 00:00","descripcion":"","video":"8642","imagen":"http:\/\/api.rtvcm.webtv.flumotion.com\/videos\/8642\/thumbnail.jpg","fecha-publicacion":""}];
	// http://play.rtvcm.webtv.flumotion.com/play/player?player=8&pod=8965
	// <meta property=og:title content="Unlugardondevivir15062015.mp4">
	// http://ondemand.rtvcm.ondemand.flumotion.com/rtvcm/ondemand/video/mp4/med/Unlugardondevivir15062015.mp4
	
	$json = json_decode('[' . entre1y2($this->web_descargada, 'var videos = [', '];') . ']', true);
	
	dbug_r($json);
	
	
	for ($i = 0, $i_t = count($json); $i < $i_t; $i++){
		
		//$video = CargaWebCurl('http://play.rtvcm.webtv.flumotion.com/play/player?player=8&pod=' . $json[$i]['video']);
		
		// http://api.rtvcm.webtv.flumotion.com/videos/8965/thumbnail.jpg
		// http://media0.ntt.webtv.flumotion.com/cust/rtvcm//outgoingimg/Unlugardondevivir15062015.mp4/Unlugardondevivir15062015.mp4-04.jpg
		// Queremos la redirección de la imagen
		$imgRealUrl = CargaWebCurl($json[$i]['imagen'], '', true, '', array(), false);
		dbug($imgRealUrl);
		$imgRealUrl = entre1y2($imgRealUrl, 'Location: ', "\r");
		dbug($imgRealUrl);
		
		preg_match('@/([^/]+\.mp4)@', $imgRealUrl, $matches);
		dbug_r($matches);
		$mp4Url = $matches[0];
		
		
		$obtenido['enlaces'][] = array(
			'titulo' => $json[$i]['titulo'] . ' - ' . $json[$i]['fecha'],
			'url'    => 'http://ondemand.rtvcm.ondemand.flumotion.com/rtvcm/ondemand/video/mp4/med/' . $mp4Url,
			'url_txt' => 'Descargar'
		);
	}
	
	$p=strpos($this->web_descargada,'<title>');
	$titulo=utf8_encode(entre1y2_a($this->web_descargada,$p,' - ','<'));
	$titulo=limpiaTitulo($titulo);
	
	$imagen='https://pbs.twimg.com/profile_images/585353307331301377/k1CugBXh_400x400.jpg';
	
	$obtenido['titulo']=$titulo;
	$obtenido['imagen']=$imagen;
	
	finalCadena($obtenido);
	
	
	
	
} else {
	
//showVideo(videoURL){
$p=strpos($this->web_descargada,"showVideo(videoURL){");
$baseLimpia=entre1y2_a($this->web_descargada,$p,"url: '","'");

//showVideo('
$videos=substr_count($this->web_descargada,"showVideo('");

$total=array();
$last=0;
for($i=0;$i<$videos;$i++){
	$p=strposF($this->web_descargada,"showVideo('",$last);
	$f=strpos($this->web_descargada,"'",$p);
	$last=$f;
	$vid=$baseLimpia.substr($this->web_descargada,$p,$f-$p);
	dbug('video='.$vid);

	$tit=entre1y2_a($this->web_descargada,$last,'title="','"');
	dbug('tit='.$tit);
	
	$total[] = array(
		$vid,
		utf8_encode($tit)
	);
}

for($i=0;$i<$videos;$i++){
	$obtenido['enlaces'][] = array(
		'titulo' => $total[$i][1],
		'url'    => 'http://ondemand.rtvcm.ondemand.flumotion.com/rtvcm/ondemand/video/mp4/med/' . entre1y2($total[$i][0], 'mp4:'),
		'url_txt' => 'Descargar'
	);
}

$p=strpos($this->web_descargada,'<title>');
$titulo=utf8_encode(entre1y2_a($this->web_descargada,$p,' - ','<'));
$titulo=limpiaTitulo($titulo);

$imagen='http://www.rtvcm.es/img/logos_cab_esq.gif';

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido);

}

}

}
