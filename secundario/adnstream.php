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
function adnstream(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

//mirar si hay video
$obtenido=array();

if(!enString($retfull,'_w320.jpg'))
	return;




$iframe=$web_descargada;;

$p=strpos($iframe,'og:image');
$imagen=entre1y2_a($iframe, $p, 'content="', '"');
dbug('imagen='.$imagen);

$p=strrposF($imagen,'/');
$f=strpos($imagen,'_',$p);
$id=substr($imagen,$p,$f-$p);
dbug('id='.$id);

$ret=CargaWebCurl('http://www.adnstream.com/get_playlist.php?lista=video&param='.$id);

$p=strpos($ret,'<title>')+7;
$f=strpos($ret,'<',$p);
$titulo=substr($ret,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

if(enString($ret,'hd.file>')){
	$p=strpos($ret,'hd.file>')+8;
	$f=strpos($ret,'<',$p);
	$ret=substr($ret,$p,$f-$p);
}elseif(enString($ret,'file>')){
	$p=strpos($ret,'file>')+5;
	$f=strpos($ret,'<',$p);
	$ret=substr($ret,$p,$f-$p);
}else{
	$p=strpos($ret,'http://')+7;
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