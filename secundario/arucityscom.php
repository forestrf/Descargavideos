<?php

class Arucitys extends cadena{

function calcula(){

$obtenido=array('enlaces' => array());

$pageId = substr($this->web, strrposF($this->web, '/'));
dbug_($pageId);

if(preg_match('#"pageId":"'.$pageId.'".+?"urls":\[(.+?)[,\]]#', $this->web_descargada, $matches))
	$jsonurl = $matches[1];
elseif(preg_match('#"'.$pageId.'".+?"urls":\[(.+?)[,\]]#', $this->web_descargada, $matches))
	$jsonurl = $matches[1];
else {
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}

dbug_($jsonurl);
$jsonurl = json_decode($jsonurl, true);
dbug_($jsonurl);
$json = CargaWebCurl($jsonurl);
dbug_($json);
$json2 = json_decode($json, true);
$titulo = $json2['title'];

// http://www.arucitys.com.usrfiles.com/html/5eb649_d2c495cc1c5e09ffcb959aa180074c3d.html
$html = desde1a2($json, '"html/', '"', true);
$html = json_decode($html, true);
$html = 'http://www.arucitys.com.usrfiles.com/' . $html;
dbug_($html);

$html = CargaWebCurl($html);
dbug_($html);


$app_flash = trim(entre1y2($html, 'app_flash=', '&'));
dbug_($app_flash);

if(preg_match('#ubicacion_fichero=(.+)[&\r\n$]#', $html, $matches)) {
	dbug_r($matches);
	$ubicacion_fichero = $matches[1];
	dbug_($ubicacion_fichero);
} else {
	setErrorWebIntera('No se ha encontrado ningún vídeo.');
	return;
}

$rtmpbase = 'rtmp://178.33.166.26/' . $app_flash;

$rtmp = $rtmpbase . '/mp4:' . $ubicacion_fichero;
		
$obtenido['enlaces'] = array(
	array(
		'url'     => $rtmp,
		'rtmpdump'  => '-r "'.$rtmpbase.'" -y "'.$ubicacion_fichero.'" -o "'.generaNombreWindowsValido($titulo).'.mp4"',
		'url_txt' => 'Descargar',
		'tipo'    => 'rtmpConcreto'
	)
);

$obtenido['titulo']=$titulo;
if (preg_match('@frame=(.+\.jpg)@', $html, $matches)) {
	dbug_r($matches);
	$obtenido['imagen']=$matches[1];
}

finalCadena($obtenido,false);
}

}
