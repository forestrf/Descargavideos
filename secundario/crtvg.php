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
$p=strpos($ret,'"',$p)+1;
$f=strpos($ret,'"',$p);
$url=substr($ret,$p,$f-$p);

//netConnectionUrl: "rtmp://media1.crtvg.es:80/vod"
$p=strpos($ret,'netConnectionUrl:');
$p=strpos($ret,'"',$p)+1;
$f=strpos($ret,'"',$p);
$preurl=substr($ret,$p,$f-$p);

$ret=$preurl.'/'.$url;

dbug('url='.$ret);


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

finalCadena($obtenido);
}
?>