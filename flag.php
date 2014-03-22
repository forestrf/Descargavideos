<?php

if(isset($_REQUEST['url'])){
	$url=$_REQUEST['url'];

	date_default_timezone_set('Europe/Madrid');
	
	$datos = "URL: ".$url."\n".
	"IP: ".$_SERVER['REMOTE_ADDR']."\n".
	"Hora: ".date("G:i:s j/m/Y", time())."\n".
	"------------------------------------------------------------------------\n";

	$archivo="avisos_fallos.txt";
	if(!file_exists($archivo)){
		$fp=fopen($archivo,"a+");
		fclose($fp);
		chmod($archivo,0777);
	}
	$fp=fopen($archivo,"a+");
	fwrite(
		$fp, $datos
	);
	fclose($fp);
}


echo ' ';
?>