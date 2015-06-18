<?php

require_once 'ooyala-funciones.php';

class Mundofoxcom extends cadena{

function calcula(){
	
	/*
	http://www.mundofox.com/videos/quien-mato-patricia-soler-22664
	https://player.ooyala.com/tframe.html?embedCode=FmZmowczoxwPru9zkOwKFWvZNW_K6JEH&amp;amp;pbid=81a5821a635845fb8f8a1368a9b402e9#sthash.NnkiKZi8.dpuf
	
	
	
	<script type="text/javascript" src="//player.ooyala.com/v3/81a5821a635845fb8f8a1368a9b402e9?tweaks=android-enable-hls"></script>
	http://player.ooyala.com/v3/81a5821a635845fb8f8a1368a9b402e9?tweaks=android-enable-hls
	OO.ready(function() { OO.Player.create('ooyalaplayer', 'FmZmowczoxwPru9zkOwKFWvZNW_K6JEH'); });
	"pcode":"NzYTAyOn6FTBAa0fo4wFfZoRHubJ"
	http://player.ooyala.com/player_api/v1/metadata/embed_code/81a5821a635845fb8f8a1368a9b402e9/FmZmowczoxwPru9zkOwKFWvZNW_K6JEH?videoPcode=NzYTAyOn6FTBAa0fo4wFfZoRHubJ&
	
	
	http://player.ooyala.com/info/primary/
	respuesta:
	Vhor0n+Xh0BdBhI8INdUxJNndoWEZ5zeDYXPKxCfyCAY+/WCAU9AcfZYdiSUD+3sLZ0LnZVK2cqr5MFQv/7EfsxyC+kw1R+s9HhpuzMVDJ6YOKDcwNA4VSgs8JV7Ke9Nph6jjOOykyngC092EmUuS6c7ByJFCL369xt+23hrpNLzZsmmFrnagF0cDZlQsvo2xhOln6A25C8P0UqZMPx6rsflbKp2gGuOVU8WiBvk9DaplKfbTNxHSD4JWlFYMm1ZwEtIEFxOsLKfSK+fNNDvf8W0jHG3uPo4uYfV/1Jqc24vKlWC/dcmzy8Z/5SHSRKdpAUQT9Ea2aibNGzORFi4OLLsceN9sHkfhqhu/OIDIsSwxQpz38vLFA==
	
	
	http://player.ooyala.com/nuplayer?embedCode=FmZmowczoxwPru9zkOwKFWvZNW_K6JEH&playerBrandingId=81a5821a635845fb8f8a1368a9b402e9
	respuesta:
	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
	z3sPNVelOaB0O8ugPt9f
	
	
	http://player.ooyala.com/sas/authorized?analytics_params=%7B%22pcode%22%3A%22NzYTAyOn6FTBAa0fo4wFfZoRHubJ%22%7D&device=WIN%2016%2C0%2C0%2C305&domain=www.mundofox.com&embed_code_list=FmZmowczoxwPru9zkOwKFWvZNW_K6JEH&parent_authorized=true&playerType=full&signature=dMPkmR3luQfoR1vpnXrIra3D04gA8AznaIKxrVTbSno&timestamp=1423361297617&token=AA-oI9kU1Dvf-0054d6c4d5-5xYuEbIJG1MKilRIiAxoWX.gksb9QkZhCUNEXxGs.04
	respuesta:
	Zz6FR1Eq4YsJ4/hhMwTUqqZ/Ej4Z4vTeBS1Qp8AjLl6NEu5qkvHA97oiEPdR
	8mGqNnneG5482VecYCob11IZQyTFDrHNTx6gM65fdZ36wg0RXNNVJpWxzZhQ
	ltFkBJW97gctNsp5m39ek10O3n148dScXzRz/lICStrwCdaVRXTTK2KX9Nch
	JtW+a+nRDoLQ1TomcsZJp5d5W6i3By60YyI6JzzrmBrfrxjSXQMEo6dwWbPF
	OYbZZ2KxNC4+0gXrlxEgNzjIsaKIlVnyKPMDKa6l5J46fy8bZHo5NjK2zgI3
	The0IXK36fPL4/WkEQ8csU0JPSmOTZ9AVHWEtNXiL+siy7fqijBHQYi3kAZ8
	6PkFDwDIh5kb5oLLZmxh/F+jn2c3reNm0ndpPgrMZf4fXuiPvcLLQR5ddCdt
	qVF8syD0YSEcLo1SYqd2DBdZeCQ6Zw4Q2oO9W5NEnGWhjwymhhnxweLmsMe5
	jnMMm+02p83enLJLa5LXbxBHOc8zVXsc+t9OgtLSUEYmKJ3T18WTn/V/px9/
	ToB+hG20u5Sj9dhOM07uoDy2VLVUs1fDM+q2uClCfiICZe91M9H36IF98ly6
	6x3vDStgADKhv0xBP85nxf5RRNBD/wp/pYSIykYwMrEDJIYyYXOM5ZoYr/hJ
	aWtLpQ5FwClHy4Us9NVNdMqFgPW7VjcCIe2H6xpt2KIL6jMK222NY6u4y/JZ
	37jJXlEoipfvrNiF/QQ9773demFMacC9GLX5S5W0CrM5k12tg4qfGdEACB0P
	WRosfMzJsg==
	
	
	Referer:	http://player.ooyala.com/static/cacheable/947272d312bbb31971ab9ee0b28b5a1f/player_v2.swf?player=81a5821a635845fb8f8a1368a9b402e9
	http://player.vimeo.com/external/117856376.hd.mp4?s=8c4b9b0d62db18eb3f0338b2b3963e43
	http://pdl.vimeocdn.com/96029/918/329902523.mp4?token2=1423375948_2fde98bab4d75f510ef74a6c2616aaf4&aksessionid=72878d8fc8ad2a274ca033ecb04904639c6912c41423361548
	
	
	
	
	
	http://player.ooyala.com/player.swf?player=81a5821a635845fb8f8a1368a9b402e9
	http://player.ooyala.com/static/cacheable/947272d312bbb31971ab9ee0b28b5a1f/player_v2.swf?player=81a5821a635845fb8f8a1368a9b402e9
	*/
	
	//Código
	
	if(preg_match('#OO\.ready\(function\(\).*?\'ooyalaplayer\'.*?\'(.+?)\'#', $this->web_descargada, $matches)) {
		dbug_r($matches);
		$embedCode = $matches[1];
	} elseif(preg_match('#OO\.Player\.create\(\'.+?\',\'(.+?)\'#', $this->web_descargada, $matches)) {
		dbug_r($matches);
		$embedCode = $matches[1];
	} else {
		setErrorWebIntera('No se pudo encontrar algún vídeo.');
		return;
	}
	
	$embedCode = trim($embedCode);
	
	if (preg_match('#player.ooyala.com/v3/(.+?)["\'\?]#', $this->web_descargada, $matches)) {
		dbug_r($matches);
		$playerBrandingId = $matches[1];
	} else {
		setErrorWebIntera('No se pudo encontrar algún vídeo.');
		return;
	}
	
	$url = 'http://player.ooyala.com/nuplayer?autoplay=1&hide=all&embedCode='.$embedCode;
	//$url = 'http://player.ooyala.com/nuplayer?embedCode='.$embedCode.'&playerBrandingId='.$playerBrandingId;
	$txt = CargaWebCurl($url);
	dbug_($txt);
	
	$res = ooyala_decrypt($txt);
	dbug_($res);
	
	$titulo = entre1y2($res, '<title>','</');
	if (enString($res, 'previewImages')) {
		$imagen = entre1y2_a($res, 'previewImages', '<url>', '</');
	} else {
		preg_match('#<promo>.*:([a-zA-Z0-9]+?)<#', $res, $matches);
		dbug_r($matches);
		$imagen = entre1y2($res, '<shelfDomain>','<') . '/' . $embedCode . '/' . $matches[1];
	}
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array()
	);
	
	if (enString($res, '<flv_url>')) {
		$url = entre1y2($res, '<flv_url>', '</flv_url>');
	
		$obtenido['enlaces'][] = array(
			'url'     => $url,
			'url_txt' => 'Descargar',
			'tipo'    => 'http'
		);
	} else {
		$pcode = entre1y2($res, '<pcode>', '</pcode>');
		$url = 'http://player.ooyala.com/sas/player_api/v1/authorization/embed_code/'.$pcode.'/'.$embedCode.'?device=android-html5&domain=www.mundofox.com&supportedFormats=m3u8,mp4&profiles=&_=1407599471980';
		$txt = CargaWebCurlProxy($url, 'MX');
		dbug_($txt);
		$data = entre1y2($txt, '"data":"', '"');
		$m3u8 = base64_decode($data);
		
		//m3u8 downloade tiene un bug. Darle directamente el m3u8 que queremos
		
		$m3u8 = CargaWebCurl($m3u8);
		dbug_($m3u8);
		
		preg_match('#http[^\r^\n]*#', $m3u8, $matches);
		dbug_r($matches);
		$m3u8 = $matches[0];
		
		$obtenido['enlaces'][] = array(
			'url'     => $m3u8,
			'nombre_archivo' => generaNombreWindowsValido($titulo) . '.mp4',
			'tipo'    => 'm3u8'
		);
	}
	/*
	} else if (enString($res, '<httpDynamicStreamUrl>')) {
		$f4m = entre1y2($res, '<httpDynamicStreamUrl>', '</httpDynamicStreamUrl>');
	
		$obtenido['enlaces'][] = array(
			'url'     => $f4m,
			'nombre_archivo' => generaNombreWindowsValido($titulo) . '.mp4',
			'tipo'    => 'f4m'
		);
	}
	*/
	finalCadena($obtenido);
}

}
