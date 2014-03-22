<?php
function telefe(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$ret=CargaWebCurl($web);


preg_match("@playlist[\s\S]*?image.*?'([\s\S]*?)'[\s\S]*?sources[\s\S]*?'(http://.*?)'@i", $retfull, $matches);
dbug_r($matches);


$url=$matches[2];
dbug($url);


$imagen=$matches[1];
dbug('imagen='.$imagen);





$titulo=entre1y2($retfull,'<title>', '</title>');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);





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