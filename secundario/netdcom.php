<?php
function netdcom(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);


preg_match('@#player-container \.player-display.*?url.*?\'(.*?)\'@', $retfull, $matches);

dbug_r($matches);

$urlPreM3U8='http://www.netd.com'.$matches[1];

$ret=CargaWebCurl($urlPreM3U8);

dbug($ret);

preg_match('@preview.*?\'(.*?)\'@', $ret, $matches);
$imagen='http:'.$matches[1];
dbug('imagen = '.$imagen);

$titulo=entre1y2($retfull,'<title>','<');
dbug('titulo = '.$titulo);

preg_match('@defaultServiceUrl.*?\'(.*?)\'.*?path.*?\'(.*?)\'@', $ret, $matches);
dbug_r($matches);

$url=$matches[1].'/'.$matches[2];
dbug_r('URL = '.$url);


$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $url,
			'tipo' => 'm3u8'
		)
	)
);

finalCadena($obtenido);
}
?>