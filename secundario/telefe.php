<?php
function telefe(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$ret=CargaWebCurl($web);


if(preg_match("@playlist[\s\S]*?image.*?'([\s\S]*?)'[\s\S]*?sources[\s\S]*?'(http://.*?)'@i", $retfull, $matches)){
	dbug_r($matches);
	
	$url=$matches[2];
	dbug($url);
	
	$imagen=$matches[1];
	dbug('imagen='.$imagen);
}
elseif(preg_match("@['\"](https?://.+?token=.+?)['\"]@i", $retfull, $matches)){
	dbug_r($matches);
	
	$url=$matches[1];
	dbug($url);
	
	preg_match("@thumbail['\"].*?:.*?['\"](.+?)['\"]@i", $retfull, $matches);
	dbug_r($matches);
	
	$imagen=$matches[1];
	dbug('imagen='.$imagen);
}




$titulo=entre1y2($retfull,'<title>', '</title>');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);





$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'     => $url,
			'url_txt' => 'Descargar',
			'tipo'    => 'http'
		)
	)
);

finalCadena($obtenido);
}
?>