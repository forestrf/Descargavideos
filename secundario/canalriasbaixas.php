<?php
function canalriasbaixas(){
global $web_descargada;

preg_match("@http://[^ ]*?\.mp4@i", $web_descargada, $matches);

$url=$matches[0];

$p=strpos($web_descargada,'property="title"');
$titulo=entre1y2_a($web_descargada,$p,'content="','"');
$titulo=utf8_encode($titulo);
$titulo=limpiaTitulo($titulo);

dbug('titulo='.$titulo);

//imagen
$p=strpos($web_descargada,'property="og:image"');
$imagen=entre1y2_a($web_descargada,$p,'content="','"');
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