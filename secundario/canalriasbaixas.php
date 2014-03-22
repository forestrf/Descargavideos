<?php
function canalriasbaixas(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

preg_match("@http://[^ ]*?\.mp4@i", $retfull, $matches);

$url=$matches[0];

$p=strpos($retfull,'property="title"');
$titulo=entre1y2_a($retfull,$p,'content="','"');
$titulo=utf8_encode($titulo);
$titulo=limpiaTitulo($titulo);

dbug('titulo='.$titulo);

//imagen
$p=strpos($retfull,'property="og:image"');
$imagen=entre1y2_a($retfull,$p,'content="','"');
dbug('imagen='.$imagen);

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

finalCadena($obtenido);
}
?>