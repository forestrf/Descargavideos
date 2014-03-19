<?php

if(!isset($_GET['path']))
	exit;

require '../funciones.php';
header('Access-Control-Allow-Origin: http://atresplayer.com, http://www.atresplayer.com');



$path = $_GET['path'];



$WebSubtitulos = CargaWebCurl("http://www.atresplayer.com/episodexml/".$path);
//dbug($WebSubtitulos);
if(enString($WebSubtitulos, "<subtitle>")){
	// Puede que tenga subtitulos
	$urlSubtitulos = entre1y2($WebSubtitulos, "<subtitle><![CDATA[", "]");
	dbug($urlSubtitulos);
	if(enString($urlSubtitulos, ".srt")){
		echo "jorl('".$urlSubtitulos."')";
	}
}


?>