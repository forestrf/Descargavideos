<?php
function tunepk(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

$json = "[".entre1y2($retfull, "sources: [", "]")."]";
//dbug($json);

$json = strtr($json,array("\r"=>"","\n"=>""," "=>"","'"=>'"'));
$json = strtr($json,array(",}"=>"}",",]"=>"]"));
//dbug($json);

$json = preg_replace("@(\\,|{)([a-z]+?):@i", '$1"$2":', $json);
dbug($json);

$json = json_decode($json, true);
dbug_r($json);


foreach($json as $elem){
	$obtenido['enlaces'][] = array(
		'url_txt' => $elem['label'],
		'url'  => $elem['file'],
		'tipo' => 'http'
	);
}


$imagen=entre1y2($retfull, '<meta property="og:image" content="', '"');
dbug('imagen = '.$imagen);

$titulo=entre1y2($retfull, '<meta property="og:title" content="', '"');
dbug('titulo = '.$titulo);


$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;


finalCadena($obtenido);
}
?>