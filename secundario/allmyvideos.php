<?php
/*
http://www.allmyvideos.net/v/v-m0PYNx
http://allmyvideos.net/builtin-z09n80ux7q8m.html

*/

function allmyvideos(){
	global $web,$web_descargada;
	
	
	//Código
	$ret = CargaWebCurl('http://allmyvideos.net/builtin-'.entre1y2($web_descargada, 'http://allmyvideos.net/builtin-', '"'), '', 0, '', array('Referer: '.$web));
	dbug($ret);
	
	$ret = strtr($ret, array(' '=>''));
	
	$imagen = entre1y2($ret, '"image":"', '"');
	dbug('imagen='.$imagen);
	
	$url = 'http://'.entre1y2($ret, '"file":"http://', '"');
	dbug('url='.$url);
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url'  => $url,
				'tipo' => 'http'
			)
		)
	);
	
	finalCadena($obtenido);
}
?>