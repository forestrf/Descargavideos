<?php
function intereconomia(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

if(enString($retfull,"mp4:")){
	//http://www.intereconomia.com/sites/default/files/videos/rosa_paya.mp4
	$p=strposF($retfull,'mp4:');
	$f=strposF($retfull,'.mp4',$p);
	$url="http://www.intereconomia.com/sites/default/files/videos/".substr($retfull,$p,$f-$p);
}
elseif(enString($retfull,"mp3:")){
	$p=strposF($retfull,'mp3:');
	$f=strposF($retfull,'.mp3',$p);
	$url="http://www.intereconomia.com/sites/default/files/videos/".substr($retfull,$p,$f-$p);
}

//titulo
$p=strposF($retfull,"'Start','");
$f=strpos($retfull,"'",$p);
$titulo=substr($retfull,$p,$f-$p);

//imagen
$p=strpos($retfull,'/sites/default/files/imagecache/');
$f=strposF($retfull,'.',$p)+3;//así se soporta .jpg y .gif
$imagen="http://www.intereconomia.com".substr($retfull,$p,$f-$p);

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