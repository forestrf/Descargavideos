<?php
/*
"http://canaldehistoria.es/aula/union-europea/"

<iframe src="http://www.adnstream.com/embed3/dheWtoYpuJ" height="398" width="706" frameborder="0" scrolling="no">

dheWtoYpuJ

"http://www.adnstream.com/embed3/dheWtoYpuJ"

<meta property="og:image" content="http://46.4.33.243/static/thbs/d/dheWtoYpuJ_w320.jpg" />

"http://46.4.33.243/static/thbs/d/dheWtoYpuJ_w320.jpg"

"http://www.adnstream.com/get_playlist_embed.php?param=dheWtoYpuJ"

<title>25 años en Europa</title>

<jwplayer:file>http://82.165.193.211/video/4bba500c634b149cac372353b1913bb6/dheWtoYpuJ.H264-480p.mp4</jwplayer:file>

<jwplayer:hd.file>http://82.165.193.211/video/4bba500c634b149cac372353b1913bb6/dheWtoYpuJ.H264-720p.mp4</jwplayer:hd.file>
*/
function canaldehistoria(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

//mirar si hay video
$obtenido=array();

if(!enString($retfull,'<iframe'))
	return;

$p=strpos($retfull,'<iframe');
$p=strposF($retfull,'src="',$p);
$f=strpos($retfull,'"',$p);
$iframe=substr($retfull,$p,$f-$p);
dbug('iframe='.$iframe);

$p=strrposF($iframe,'/');
$id=substr($iframe,$p);
dbug('id='.$id);

$iframe=CargaWebCurl($iframe);

$p=strpos($iframe,'og:image');
$p=strposF($iframe,'content="',$p);
$f=strpos($iframe,'"',$p);
$imagen=substr($iframe,$p,$f-$p);
dbug('imagen='.$imagen);

$ret=CargaWebCurl('http://www.adnstream.com/get_playlist_embed.php?param='.$id);

$p=strposF($ret,'<title>');
$f=strpos($ret,'<',$p);
$titulo=substr($ret,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

if(enString($ret,'hd.file>')){
	$p=strposF($ret,'hd.file>');
	$f=strpos($ret,'<',$p);
	$ret=substr($ret,$p,$f-$p);
}elseif(enString($ret,'file>')){
	$p=strposF($ret,'file>');
	$f=strpos($ret,'<',$p);
	$ret=substr($ret,$p,$f-$p);
}else{
	$p=strposF($ret,'http://');
	$f=strpos($ret,'<',$p);
	$ret=substr($ret,$p,$f-$p);
}

$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $ret,
			'tipo' => 'http'
		)
	)
);

finalCadena($obtenido);
}
?>