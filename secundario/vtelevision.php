<?php
function vtelevision(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

//titulo
$p=strpos($retfull,'<title>')+7;
$f=strpos($retfull,'<',$p);
$titulo=utf8_encode(substr($retfull,$p,$f-$p));//utf-8... mirar esto
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

$p=strpos($retfull,'og:image')+8;
$p=strpos($retfull,'content="',$p)+9;
$f=strpos($retfull,'"',$p);
$imagen=substr($retfull,$p,$f-$p);
dbug('imagen='.$imagen);

$p=strpos($retfull,'og:video')+8;
$p=strpos($retfull,'content="',$p)+9;
$f=strpos($retfull,'"',$p);
$url=substr($retfull,$p,$f-$p);
dbug('video='.$url);

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