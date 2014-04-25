<?php
function rtvcm(){
global $web,$web_descargada;
$retfull=$web_descargada;

$obtenido=array('enlaces' => array());

//showVideo(videoURL){
$p=strpos($retfull,"showVideo(videoURL){");
$p=strpos($retfull,"url: '",$p)+6;
$f=strpos($retfull,"'",$p);
$baseLimpia=substr($retfull,$p,$f-$p);

//showVideo('
$videos=substr_count($retfull,"showVideo('");

$total=array();
$last=0;
for($i=0;$i<$videos;$i++){
	$p=strpos($retfull,"showVideo('",$last)+11;
	$f=strpos($retfull,"'",$p);
	$last=$f;
	$vid=$baseLimpia.substr($retfull,$p,$f-$p);
	dbug('video='.$vid);

	$p=strpos($retfull,'title="',$last)+7;
	$f=strpos($retfull,'"',$p);
	$tit=substr($retfull,$p,$f-$p);
	dbug('tit='.$tit);
	
	array_push($total,array(
		$vid,
		utf8_encode($tit)
	));
}

for($i=0;$i<$videos;$i++){
	array_push($obtenido['enlaces'],array(
		'titulo' => $total[$i][1],
		'url'    => $total[$i][0],
		'tipo'   => 'rtmp'
	));
}

$p=strpos($retfull,'<title>');
$p=strpos($retfull,' - ',$p)+3;
$f=strpos($retfull,'<',$p);
$titulo=utf8_encode(substr($retfull,$p,$f-$p));
$titulo=limpiaTitulo($titulo);

$imagen='http://www.rtvcm.es/img/logos_cab_esq.gif';

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido);
}
?>