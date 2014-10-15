<?php

class Crtvg extends cadena{

function calcula(){
//title: "Matalobos quotAno 1 A familiaquot",
$titulo=entre1y2($this->web_descargada,'<title>',' |');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);


//backgroundImage: "url(http://www.crtvg.es/files/web/000020120911000003.jpg)"
$p=strpos($this->web_descargada,'backgroundImage:');
$imagen=entre1y2_a($this->web_descargada,$p,'url(',')');
dbug('imagen='.$imagen);



//rtmp://media1.crtvg.es:80/vod
$p=strpos($this->web_descargada,'clip:');
$p=strpos($this->web_descargada,'url:',$p);
$url=entre1y2_a($this->web_descargada,$p,'"','"');
dbug('url='.$url);

//netConnectionUrl: "rtmp://media1.crtvg.es:80/vod"
$p=strpos($this->web_descargada,'netConnectionUrl:');
$preurl=entre1y2_a($this->web_descargada,$p,'"','"');
dbug('$preurl='.$preurl);



//ipadUrl: "http:// m3u8"
$p=strpos($this->web_descargada,'ipadUrl:');
$ipadUrl=entre1y2_a($this->web_descargada,$p,'"','"');
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

}
