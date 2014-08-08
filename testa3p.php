<!DOCTYPE html>
<html>
<body>
<script src="/js/funciones.min.js"></script>
<script>
	function finalizar(a){
		D.g("echo").value += "--------------------------------\n"+a+"\n--------------------------------\n";
	}
</script>
<div id="enlaces"></div>
<textarea id="echo" rows="20" cols="80"></textarea>

<?php

foreach($_SERVER as $key => $value) {
	dbug($key.' => '.$value);
}

$obtenido = array();
$episode = '20131112-EPISODE-00026-false';


dbug('episode = '.$episode);

$tiempo = time() +3000;

$key = "puessepavuestramerced";
$key = "dXN#2nqgo)T2LDPi,5R;3XVK"; // swf
//$key = "QWtMLXs414Yo+c#_+Q#K@NN)"; // móvil
$msg = $episode.$tiempo;

$hmac = bin2hex(custom_hmac('md5', $msg, $key, true));
dbug('hmac = '.$hmac);

//jojojo.tk
//briscaonline.tk

echo '<script>
D.g("enlaces").innerHTML += \'<iframe width="0" height="0" style="position:absolute" src="http://sandia.tk/a3p.php?o=finalizar&e='.$episode.'&t='.$tiempo.'&h='.$hmac.'">\';
</script>';


$obtenido[] = &$resultado;

// Buscar subtitulos
$preSubtitulos = file_get_contents('http://servicios.atresplayer.com/episode/get?episodePk='.$episode);
//dbug($preSubtitulos);
$preSubtitulos = json_decode($preSubtitulos, true);
//print_r($preSubtitulos);


echo '<script>
D.g("enlaces").innerHTML += \'<iframe width="0" height="0" style="position:absolute" src="http://sandia.tk/a3p2.php?o=finalizar&e='.$episode.'&t='.$tiempo.'&h='.$hmac.'">\';
</script>
';


function dbug($que){
	echo '<script>D.g("echo").value += "'.strtr($que, array('"'=>'\\"')).'\n";</script>';
}



function custom_hmac($algo, $data, $key, $raw_output = false){
	$algo = strtolower($algo);
	$pack = 'H'.strlen($algo('test'));
	$size = 64;
	$opad = str_repeat(chr(0x5C), $size);
	$ipad = str_repeat(chr(0x36), $size);
	
	if (strlen($key) > $size) {
		$key = str_pad(pack($pack, $algo($key)), $size, chr(0x00));
	} else {
		$key = str_pad($key, $size, chr(0x00));
	}
	
	for ($i = 0; $i < strlen($key) - 1; $i++) {
		$opad[$i] = $opad[$i] ^ $key[$i];
		$ipad[$i] = $ipad[$i] ^ $key[$i];
	}
	
	$output = $algo($opad.pack($pack, $algo($ipad.$data)));
	
	return ($raw_output) ? pack($pack, $output) : $output;
}


?>