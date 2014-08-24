<?php
function t7rm(){
global $web,$web_descargada;

$enlace = array();

//&file=media/53/Video/10/1/10107_BAJA.mp4&

//file
$file=entre1y2($web_descargada,'file=','&');

//image=http://mediateca.regmurcia.com/MediatecaCRM/ServletLink?METHOD=MEDIATECA%26accion=imagen%26id=10107
$p=strrposF($file,'/');
$f=strpos($file,'_',$p);
$imagen='http://mediateca.regmurcia.com/MediatecaCRM/ServletLink?METHOD=MEDIATECA&accion=imagen&id='.substr($file,$p,$f-$p);

//&title=Metros cuadrados&
$titulo=utf8_encode(entre1y2($web_descargada,'&title=','&'));
$titulo=limpiaTitulo($titulo);

//&description=Programa nº 62.
$descripcion=utf8_encode(entre1y2($web_descargada,'&description=',"'"));
$descripcion=limpiaTitulo($descripcion, 300);

//server
$server=entre1y2($web_descargada,'streamer=','&');

$tipo="http";
if(enString($server,'rtmp')){
	$server = substr($server, 0, strrpos($server, '/'));
	$file = 'mp4:'.$file;
	$enlace = array(
		'url'  => '-',
		'rtmpdump' => '-r "'.$server.'" -y "'.$file.'"',
		'nombre_archivo' => generaNombreWindowsValido($titulo.'.mp4'),
		'tipo' => 'rtmpConcreto'
	);
}
elseif(enString($server,'http')){
	$enlace = array(
		'url'  => $server.'/'.$file,
		'tipo' => 'http',
	);
}
dbug('url=>'.$url);


$obtenido=array(
	'titulo'      => $titulo,
	'imagen'      => $imagen,
	'descripcion' => $descripcion,
	'enlaces' => array($enlace)
);

finalCadena($obtenido,true);
}
?>