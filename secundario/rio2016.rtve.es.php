<?php

class RtveRio2016 extends cadena{

function calcula(){

setErrorWebIntera('RTVE Rio 2016 no está soportado'); // ffmpeg necesita usar cookies, pero no funcionan
return;

dbug('empezando RTVE Rio 2016');

// http://rio2016.rtve.es/video/article/oro-marcus-walz-prueba-completa.html
// data-videoid="29219"
// http://rio2016.rtve.es/VideoData/29219.xml
// http://dvr-s.rio2016.rtve.es/dvr/3d971e6c-20e4-4f42-bfcd-a265c9e44333/3d971e6c-20e4-4f42-bfcd-a265c9e44333.ism/manifest
// http://dvr-s.rio2016.rtve.es/dvr/3d971e6c-20e4-4f42-bfcd-a265c9e44333/3d971e6c-20e4-4f42-bfcd-a265c9e44333.ism/manifest?hdnea=st=1471387084~exp=1471387114~acl=/*~hmac=f8ed24fb88ec1b485b716a030ec7b99f46dc09905a76f0d68acbb4d51f1cdffb


$titulo = entre1y2_a($this->web_descargada, 'or-article--title', '>', '<');
$imagen = 'http://rio2016.rtve.es/' . entre1y2($this->web_descargada, '<source srcset="', '"');
dbug('titulo='.$titulo);
dbug('imagen='.$imagen);

$idVideo = entre1y2($this->web_descargada, 'data-videoid="', '"');
dbug('$idVideo='.$idVideo);

$dataVideo = CargaWebCurl('http://rio2016.rtve.es/VideoData/' . $idVideo . '.xml');
dbug_($dataVideo);

$window = 5000;
$st = time();
$exp = $st + $window;

$data = "st=$st~exp=$exp~acl=/*";

$key = hex2bin('f47696a792f90447306bf56b630a173c');
$hmac = $this::custom_hmac($data, $key, 'SHA256');
dbug_($data);
dbug_($hmac);

$urlExtra = "?hdnea=$data~hmac=$hmac";
dbug_($urlExtra);

$urlM3U8 = entre1y2_a($dataVideo, '"HLS"', 'uri>', '<') . $urlExtra;
$m3u8list = CargaWebCurl($urlM3U8, '', true);
dbug_($m3u8list);

preg_match_all('#QualityLevels\(([0-9]+)\).*#', $m3u8list, $matches);
array_multisort($matches[1], SORT_DESC, SORT_NUMERIC, $matches[0]);
dbug_r($matches);
$m3u8 = trim($matches[0][0]);

$m3u8fileUrl = desde1a2($urlM3U8, 0, strrpos($urlM3U8, '/manifest')) . '/' . $m3u8;
$cookie = entre1y2($m3u8list, 'Set-Cookie: ', "\r\n");
/*
$m3u8file = CargaWebCurl($m3u8fileUrl, '', false, $cookie);
dbug_($m3u8file);
*/


$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'     => desde1a2($urlM3U8, 0, strrpos($urlM3U8, '/manifest')) . '/' . $m3u8,
			'nombre_archivo' => generaNombreWindowsValido($titulo) . '.mp4',
			'tipo'    => 'm3u8',
			'headers' => "Cookie: $cookie"
		)
	)
);

finalCadena($obtenido, false);
}

static function custom_hmac($data, $key, $hash_func='md5', $raw_output = false) {
	$hash_func = strtolower($hash_func);
	$pack = 'H'.strlen(hash($hash_func, 'test'));
	$size = 64;
	$opad = str_repeat(chr(0x5C), $size);
	$ipad = str_repeat(chr(0x36), $size);
	
	if (strlen($key) > $size)
		$key = str_pad(pack($pack, hash($hash_func, $key)), $size, chr(0x00));
	else
		$key = str_pad($key, $size, chr(0x00));
	
	
	for ($i = 0, $i_t = strlen($key) - 1; $i < $i_t; $i++) {
		$opad[$i] = $opad[$i] ^ $key[$i];
		$ipad[$i] = $ipad[$i] ^ $key[$i];
	}
	
	$output = hash($hash_func, $opad.pack($pack, hash($hash_func, $ipad.$data)));
	
	return ($raw_output) ? pack($pack, $output) : $output;
}

static function b64d($encoded){
	$decoded="";
	$base64=strtr($encoded,'-_','+/');
	for($i=0;$i<ceil(strlen($base64)/64);$i++)
		$decoded.=base64_decode(substr($base64,$i*64,64));
	return $decoded;
}

}

?>