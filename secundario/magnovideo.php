<?php
function magnovideo(){
	global $web,$web_descargada;
	
	if(enString($web, '&')){
		$idVideo = entre1y2($web, 'v=', '&');
	}
	else{
		$idVideo = substr($web, strposF($web, 'v='));
	}
	dbug('idVideo='.$idVideo);
	//Código
	
	
	$titulo = trim(entre1y2($web_descargada,'<title>','</title>'));
	dbug('titulo='.$titulo);
	
	
	$retfull = CargaWebCurl('http://www.magnovideo.com/player_config.php?mdid='.$idVideo);
	

	
	$imagen = entre1y2($retfull,'<tile_thumbs>','</tile_thumbs>');
	dbug('imagen='.$imagen);
	
	
	$video_name = entre1y2($retfull,'<video_name>','</video_name>');
	$sto = entre1y2($retfull,'<sto>','</sto>');
	
	
	$url = substr($imagen, 0, -18).$video_name.'?'.$sto;
	
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