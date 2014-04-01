<?php

/*
http://www.magnovideo.com/?v=BMCX9KSL
http://www.magnovideo.com/player_config.php?mdid=BMCX9KSL

DESCARGA:



http://o1.magnovideo.com:8080/storage/files/part1/0/15/111/175/1.mp4?burst=3000k&u=600k&md=1bVi10TyubRRLgKy3UsEjA&e=1393897743


<tile_thumbs>http://o1.magnovideo.com:8080//storage/files/part1/0/15/111/175/tmpsmall/tiles.jpg</tile_thumbs>

<video_name>1.mp4</video_name>
<storage_path>http://o1.magnovideo.com:8080/</storage_path>
<sto>md=xqBNmNJjsMILgDz7p3J7IQ&e=1393897903</sto>

http://o1.magnovideo.com:8080/storage/files/part1/0/15/111/175/1.mp4?md=xqBNmNJjsMILgDz7p3J7IQ&e=1393897903
*/


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