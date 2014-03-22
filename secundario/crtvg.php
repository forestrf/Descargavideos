<?php
function crtvg(){
global $web,$web_descargada;
$ret=$web_descargada;
//$ret=CargaWebCurl($web);


//title: "Matalobos quotAno 1 A familiaquot",
$p=strpos($ret,'<title>')+7;
$f=strpos($ret,' |',$p);
$titulo=substr($ret,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);


//backgroundImage: "url(http://www.crtvg.es/files/web/000020120911000003.jpg)"
$p=strpos($ret,'backgroundImage:');
$p=strpos($ret,'url(',$p)+4;
$f=strpos($ret,')',$p);
$imagen=substr($ret,$p,$f-$p);
dbug('imagen='.$imagen);



//rtmp://media1.crtvg.es:80/vod
$p=strpos($ret,'clip:');
$p=strpos($ret,'url:',$p);
$p=strposF($ret,'"',$p);
$f=strpos($ret,'"',$p);
$url=substr($ret,$p,$f-$p);
dbug('url='.$url);

//netConnectionUrl: "rtmp://media1.crtvg.es:80/vod"
$p=strpos($ret,'netConnectionUrl:');
$p=strposF($ret,'"',$p);
$f=strpos($ret,'"',$p);
$preurl=substr($ret,$p,$f-$p);
dbug('$preurl='.$preurl);



//ipadUrl: "http:// m3u8"
$p=strpos($ret,'ipadUrl:');
$p=strposF($ret,'"',$p);
$f=strpos($ret,'"',$p);
$ipadUrl=substr($ret,$p,$f-$p);
dbug('$ipadUrl='.$ipadUrl);


$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => ' ',
			'rtmpdump' => '-r "'.$preurl.'" -y "'.$url.'" -o "'.generaNombreWindowsValido($titulo).'.mp4"',
			'tipo' => 'rtmpConcreto'
		)
	)
);
if(strlen($ipadUrl) > 10){
	$obtenido['enlaces'][] = array(
		'url'  => $ipadUrl,
		'tipo' => 'm3u8'
	);
}

finalCadena($obtenido);
}
?>