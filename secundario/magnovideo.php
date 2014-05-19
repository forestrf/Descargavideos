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


BLOQUEADO POR IP.

Usan un flash que cargue el xml ya que el flash podría cargarlo gracias al crossdomain
http://www.magnovideo.com/crossdomain.xml

Flash hecho, solo falta implementarlo



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
	
	$imagen = '';
	
	
	
	/*
	// En caso de que No hubiera bloqueo de IP
	$retfull = CargaWebCurl('http://www.magnovideo.com/player_config.php?mdid='.$idVideo);
	

	
	$imagen = entre1y2($retfull,'<tile_thumbs>','</tile_thumbs>');
	dbug('imagen='.$imagen);
	
	
	$video_name = entre1y2($retfull,'<video_name>','</video_name>');
	$sto = entre1y2($retfull,'<sto>','</sto>');
	
	
	$url = substr($imagen, 0, -18).$video_name.'?'.$sto;
	*/
	
	
	$urlJS = 
	'function lanzaMagnovideo(){'.
		'if(typeof DESCARGADOR_ARCHIVOS_SWF === "undefined"){'.
			'setTimeout(lanzaMagnovideo, 200)'.
		'}'.
		'else if(DESCARGADOR_ARCHIVOS_SWF === true){'.
			'getFlashMovie("descargador_archivos").CargaWeb({"url":"http://www.magnovideo.com/player_config.php?mdid='.$idVideo.'"}, "procesaMagnovideo");'.
		'}'.
	'}'.
	
	'function procesaMagnovideo(txt){'.
		//'console.log(txt);'.
		'var imagen = txt.split("<tile_thumbs>")[1].split("</tile_thumbs>")[0];'.
		//'console.log(imagen);'.
		
		'var video_name = txt.split("<video_name>")[1].split("</video_name>")[0];'.
		//'console.log(video_name);'.
		'var sto = txt.split("<sto>")[1].split("</sto>")[0];'.
		//'console.log(sto);'.
		
		'var url = imagen.split("tmpsmall/tiles.jpg")[0] +video_name + "?" + sto;'.
		//'console.log(url);'.
		'mostrarResultado(url);'.
	'}'.
	
	'function mostrarResultado(entrada){'.
		'finalizar(entrada,"Descargar");'.
	'}'.
	
	'function mostrarFallo(){'.
		'finalizar("","Necesitas iniciar sesión en ATresPlayer para descargar este vídeo o bien el vídeo no existe");'.
	'}'.
	
	'var descargadorArchivosEmbed = document.createElement("embed");'.
	'descargadorArchivosEmbed.setAttribute("src","/util/fla/descargador_archivos.swf");'.
	'descargadorArchivosEmbed.setAttribute("name","descargador_archivos");'.
	'descargadorArchivosEmbed.setAttribute("width","0");'.
	'descargadorArchivosEmbed.setAttribute("height","0");'.
	//'descargadorArchivosEmbed.setAttribute("allowScriptAccess","sameDomain");'.
	'document.body.appendChild(descargadorArchivosEmbed);'.
	
	'lanzaMagnovideo();';
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url'  => $urlJS,
				'tipo' => 'js'
			)
		)
	);
	
	finalCadena($obtenido);
}
?>