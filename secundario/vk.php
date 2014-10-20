<?php

class Vk extends cadena{

function calcula(){
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
	if(enString($this->web, 'video_ext.php')){
		dbug('modo 1');
		$url = $this->resuelve_vk($this->web, $this->web_descargada);
		if($url === false){
			setErrorWebIntera("No se encuentra ningún vídeo.");
			return;
		}
	}
	elseif(enString($this->web_descargada, '<meta property="og:video" content="http://vk.com/video?act=get_swf')){
		$url = $this->modo2($this->web_descargada);
		if($url === false){
			setErrorWebIntera("No se encuentra ningún vídeo.");
			return false;
		}
	}
	elseif(enString($this->web_descargada, '<a href="/video')){
		dbug('modo 3');
		
		$videoPreExt = 'http://vk.com/video'.entre1y2($this->web_descargada, '<a href="/video', '"');
		dbug($videoPreExt);
		
		$videoPreExt = CargaWebCurl($videoPreExt,'',0,'',array(),true,false,1);
		
		$url = $this->modo2($videoPreExt);
		
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
				'url'     => $url,
				'tipo'    => 'http',
				'url_txt' => 'Descargar'
			)
		)
	);
	
	finalCadena($obtenido);
}

function modo2(&$web_descargada){
	dbug('modo 2');
	$videoExt = entre1y2($web_descargada, '<meta property="og:video" content="', '"');
	dbug($videoExt);
	if(!$url_video_ext = $this->vk_videoExt_desde_ogVideo($videoExt)){
		setErrorWebIntera("No se encuentra ningún vídeo.");
		return;
	}
	dbug($url_video_ext);
	
	return $this->resuelve_vk($url_video_ext);
}

function vk_videoExt_desde_ogVideo($ogVideo){
	$videoExt = explode('&', $ogVideo);
	dbug_r($videoExt);
	if($videoExt[0] !== 'http://vk.com/video?act=get_swf'){
		return false;
	}
	$url_video_ext = 'http://vk.com/video_ext.php?oid='.substr($videoExt[1], strposF($videoExt[1], '=')).
														'&id='.substr($videoExt[2], strposF($videoExt[2], '=')).
														'&hash='.substr($videoExt[3], strposF($videoExt[3], '=')).
														'&hd=1';
	return $url_video_ext;
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

}
