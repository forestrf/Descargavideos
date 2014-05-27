<?php
$cssNombreAll		= "all.css";
$cssNombreFuentes	= "font/fuentes.css";

$cssTimeAll			= filemtime($cssNombreAll);
$cssTiempoFuentes	= filemtime($cssNombreFuentes);


$etag = '"'.$cssTimeAll.$cssTiempoFuentes.'"';

//print_r($_SERVER);


$if_none_match = isset($_SERVER["HTTP_IF_NONE_MATCH"]) ? $_SERVER["HTTP_IF_NONE_MATCH"] : false;

header("Content-Type: text/css; charset=UTF-8");

if($if_none_match && $if_none_match === $etag){
	header("HTTP/1.1 304 Not Modified");
	exit;
}
else{
	header('ETag: '.$etag);
	
	$encoding = $_SERVER["HTTP_ACCEPT_ENCODING"];
	
	if(strpos($encoding, "gzip") >= 0){
	
		header("Content-Encoding: gzip");
		
		$aComprimir = file_get_contents("reset.css");
		$aComprimir .= file_get_contents($cssNombreAll);
		$aComprimir .= file_get_contents($cssNombreFuentes);
		
		echo gzencode($aComprimir, 9);
		
	}
	else{
		include "reset.css";
		include $cssNombreAll;
		include $cssNombreFuentes;
	}
}
?>