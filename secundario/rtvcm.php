<?php

class Rtvcm extends cadena{
	
function calcula(){
$obtenido=array('enlaces' => array());

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
