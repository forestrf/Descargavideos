<?php
function vk(){
	global $web,$web_descargada;
	
	
	// http://www.buencine.tv/ver-pelicula/juegos-diabolicos-poltergeist-completa.html
	// <iframe src="http://vk.com/video_ext.php?oid=213767042&id=165699052&hash=af270e543acb41ae&hd=1" width="570" height="360" frameborder="0"></iframe>
	// http://vk.com/video_ext.php?oid=213767042&id=165699052&hash=af270e543acb41ae&hd=1
	
	// url240=(.*?)&amp;
	// url360=(.*?)&amp;
	// Estos no están confirmados. Buscar de todas formas desde el de abajo (+ calidad) hasta el de arriba.
	// url480=(.*?)&amp;
	// url720=(.*?)&amp;
	// url1080=(.*?)&amp;
	
	// http://cs535109v4.vk.me/u213767042/videos/3c0947d3c5.360.mp4
	
	if(enString($web, 'video_ext.php')){
		$url = resuelve_vk($web, $web_descargada);
		if($url === false){
			setErrorWebIntera("No se encuentra ningún vídeo.");
			return;
		}
	}
	else{
		setErrorWebIntera("No se encuentra ningún vídeo.");
		return;
	}
	
	$obtenido=array(
		'titulo'  => 'Vídeo VK',
		'imagen'  => '',
		'enlaces' => array(
			array(
				'url'  => $url,
				'tipo' => 'http'
			)
		)
	);
	
	finalCadena($obtenido);
}

function resuelve_vk($url_video_ext, $webDescargada = false){
	// url240=(.*?)&amp;
	// url360=(.*?)&amp;
	// Estos no están confirmados. Buscar de todas formas desde el de abajo (+ calidad) hasta el de arriba.
	// url480=(.*?)&amp;
	// url720=(.*?)&amp;
	// url1080=(.*?)&amp;
	
	// http://cs535109v4.vk.me/u213767042/videos/3c0947d3c5.360.mp4
	if($webDescargada === false){
		if(!enString($url_video_ext, 'video_ext.php')){
			return false;
		}
		$webDescargada = CargaWebCurl($url_video_ext);
	}
	
	if(enString($webDescargada, 'url1080=')){
		$url = entre1y2($webDescargada, 'url1080=', '&amp;');
	}
	elseif(enString($webDescargada, 'url720=')){
		$url = entre1y2($webDescargada, 'url720=', '&amp;');
	}
	elseif(enString($webDescargada, 'url480=')){
		$url = entre1y2($webDescargada, 'url480=', '&amp;');
	}
	elseif(enString($webDescargada, 'url360=')){
		$url = entre1y2($webDescargada, 'url360=', '&amp;');
	}
	elseif(enString($webDescargada, 'url240=')){
		$url = entre1y2($webDescargada, 'url240=', '&amp;');
	}
	else{
		return false;
	}
	return $url;
	
}
?>