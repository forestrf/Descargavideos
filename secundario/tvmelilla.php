<?php
function tvmelilla(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

preg_match('@video.php\?v=(.*?)$@', $web, $matches);

$url = 'http://www.tvmelilla.es/videoalacarta/'.$matches[1];


$imagen=strtr($url, array(".mp4"=>".jpg"));
dbug('imagen = '.$imagen);

$titulo=utf8_encode(entre1y2($retfull,'<title>','<'));
dbug('titulo = '.$titulo);


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