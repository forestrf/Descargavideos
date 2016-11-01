<?php
header('X-Robots-Tag: none');

define('N', "\r\n");

include_once '../funciones.php';

$url = $_GET['rtveurl'];

if (!preg_match('@^https?://[a-z0-9\.]+rtve\.es@i', $url)) exit;

$rtve = CargaWebCurl($url);

if (!preg_match('@<div class=".+trasBox.+">@', $rtve)) exit;

if (preg_match_all('@<p data-config=\'{"init":([0-9]+?)\.?([0-9]*?)}\'>([\s\S]+?)</p>@m', $rtve, $matches)) {
	header('Content-Type: text/srt');
	header('Content-Disposition: inline; filename="transcripcion.srt"');
	
	//print_r($matches);
		
	for ($i = 0, $l = count($matches[0]); $i < $l; $i++) {
		echo ($i + 1) . N;
		echo segundosAHora($matches[1][$i], $matches[2][$i]);
		echo ' --> ';
		if ($i < $l - 1)
			echo segundosAHora($matches[1][$i + 1], $matches[2][$i + 1]);
		else 
			echo segundosAHora($matches[1][$i] + 60, $matches[2][$i] + 60);
		echo N;
		echo trim(strip_tags($matches[3][$i])) . N;
		
		
		echo N;
	}
}



function segundosAHora($s, $ms) {
	return sprintf("%02d:%02d:%02d,%0-3s", $s / 3600, ($s / 60)  % 60, $s % 60, $ms);
}

?>
