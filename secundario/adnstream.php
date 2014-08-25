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
global $web, $web_descargada;

//mirar si hay video
$obtenido=array();

if(!enString($web_descargada,'_w320.jpg'))
	return;



$p=strpos($web_descargada,'og:image');
$imagen=entre1y2_a($web_descargada, $p, 'content="', '"');
dbug('imagen='.$imagen);

$ret=CargaWebCurl(urldecode(entre1y2($web_descargada, "'file': '", "'")));

$titulo=entre1y2($ret, '<title>', '<');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

$descripcion=entre1y2($ret, '<description>', '<');
dbug('descripcion='.$descripcion);

if(enString($ret,'hd.file>')){
	$ret=entre1y2($ret, 'hd.file>', '<');
}elseif(enString($ret,'file>')){
	$ret=entre1y2($ret, 'file>', '<');
}else{
	$p=strpos($ret,'http://');
	$f=strpos($ret,'<',$p);
	$ret=substr($ret,$p,$f-$p);
}

$obtenido=array(
	'titulo'      => $titulo,
	'imagen'      => $imagen,
	'descripcion' => $descripcion,
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