<?php
function tvg(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

//debe haber un video
if(enString($retfull,"flowplayer(")){
	//netConnectionUrl: "rtmp://media1.crtvg.es:80/vod" //Para VOD
	$p=strpos($retfull,'netConnectionUrl: "')+19;
	$f=strpos($retfull,'"',$p);
	$ret=substr($retfull,$p,$f-$p);
	dbug($ret);
	
	//clip: {
	//url: "mp4:02/0000/0000_20121206000000.mp4",
	$clip=strpos($retfull,'clip: {');
	$p=strpos($retfull,'url: "',$clip)+6;
	$f=strpos($retfull,'"', $p);
	$ret=$ret.'/'.substr($retfull,$p,$f-$p);
	dbug($ret);
	
	//title: "Tourilandia recibe a visita de David Vidal",
	$p=strpos($retfull,'title: "',$clip)+8;
	$f=strpos($retfull,'"',$p);
	$titulo=substr($retfull,$p,$f-$p);
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);

	//imagen
	//backgroundImage: "url(http://www.crtvg.es/files/web/000020121206000000.jpg)"
	$p=strpos($retfull,'backgroundImage: "url(')+22;
	$f=strpos($retfull,')', $p);
	$imagen=substr($retfull, $p, $f-$p);
	dbug('imagen='.$imagen);
}

$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $ret,
			'tipo' => 'rtmp'
		)
	)
);

finalCadena($obtenido);
}
?>