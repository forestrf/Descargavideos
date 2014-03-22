<?php

if(!isset($_GET['ep']))
	exit;

require '../funciones.php';
header('Access-Control-Allow-Origin: http://atresplayer.com, http://www.atresplayer.com');



$episode = $_GET['ep'];





$WebSubtitulos = CargaWebCurl("https://servicios.atresplayer.com/episode/getplayer?episodePk=".$episode);
//dbug($WebSubtitulos);
$WebSubtitulos = JSON_decode($WebSubtitulos, true);
//dbug_r($WebSubtitulos);
if(isset($WebSubtitulos['pathData']) && strlen($WebSubtitulos['pathData'])>1){
	$WebSubtitulos = CargaWebCurl("http://www.atresplayer.com/episodexml/".$WebSubtitulos['pathData']);
	//dbug($WebSubtitulos);
	if(enString($WebSubtitulos, "<subtitle>")){
		// Puede que tenga subtitulos
		$urlSubtitulos = entre1y2($WebSubtitulos, "<subtitle><![CDATA[", "]");
		dbug($urlSubtitulos);
		if(enString($urlSubtitulos, ".srt")){
			echo "jorl('".$urlSubtitulos."')";
		}
	}
}



?>