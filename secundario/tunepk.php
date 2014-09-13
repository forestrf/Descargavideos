<?php
function tunepk(){
global $web_descargada;

preg_match('@(?:sources: |video_files = )(\[[\s\S]*?\])@', $web_descargada, $matches);

dbug_r($matches);

$json = $matches[1];
//dbug($json);

$json = strtr($json,array("\r"=>"","\n"=>""," "=>"","'"=>'"'));
$json = strtr($json,array(",}"=>"}",",]"=>"]"));
//dbug($json);

$json = preg_replace("@(\\,|{)([a-z]+?):@i", '$1"$2":', $json);
dbug($json);

$json = json_decode($json, true);
dbug_r($json);

if($json === null){
	$files = preg_match('@http://.+?\.mp4@', $web_descargada, $matches);
	$obtenido['enlaces'][] = array(
		'url_txt' => 'Descargar',
		'url'  => $matches[0],
		'tipo' => 'http'
	);
} else {
	foreach($json as $elem){
		$obtenido['enlaces'][] = array(
			'url_txt' => $elem['label'],
			'url'  => $elem['file'],
			'tipo' => 'http'
		);
	}
}


$imagen=entre1y2($web_descargada, '<meta property="og:image" content="', '"');
dbug('imagen = '.$imagen);

$titulo=entre1y2($web_descargada, '<meta property="og:title" content="', '"');
dbug('titulo = '.$titulo);


$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;


finalCadena($obtenido);
}
?>