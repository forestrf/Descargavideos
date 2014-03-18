<?php
function t7rm(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

//&file=media/53/Video/10/1/10107_BAJA.mp4&

//file
$file=entre1y2($retfull,'file=','&');

//image=http://mediateca.regmurcia.com/MediatecaCRM/ServletLink?METHOD=MEDIATECA%26accion=imagen%26id=10107
$p=strrpos($file,'/')+1;
$f=strpos($file,'_',$p);
$imagen='http://mediateca.regmurcia.com/MediatecaCRM/ServletLink?METHOD=MEDIATECA&accion=imagen&id='.substr($file,$p,$f-$p);

//&title=Metros cuadrados&
$titulo=utf8_encode(entre1y2($retfull,'&title=','&'));
$titulo=limpiaTitulo($titulo);

//server
$server=entre1y2($retfull,'streamer=','&');

$tipo="http";
if(enString($server,'rtmp')){
	$url=$server.':'.$file;
	$tipo="rtmp";
}
elseif(enString($server,'http'))
	$url=$server.'/'.$file;
dbug('url=>'.$url);


$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $url,
			'tipo' => $tipo,
		)
	)
);

finalCadena($obtenido,true);
}
?>