<?php

class Crtvg extends cadena{

function calcula(){
//title: "Matalobos quotAno 1 A familiaquot",
$titulo=entre1y2($this->web_descargada,'<title>','<');
if (enString($titulo, ' |')) {
	$titulo=entre1y2($titulo,0,' |');
}
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

if (enString($this->web_descargada, "id=$(this).attr('id').split('|');")) {
	dbug('modo 1');
	preg_match("#url:.*?'(.*?)',#i", $this->web_descargada, $matches);
	dbug_r($matches);
	
	$url = $matches[1];
	if ($url[0] === '/') {
		$url = 'http://www.crtvg.es' . $url;
	} else if ($url[0] !== 'h') {
		$url = substr($this->web, 0, strrposF($this->web, '/')) . $url;
	}
	dbug_r($url);
	
	preg_match_all("#<div class='cap' id='([0-9]+?)\|([0-9]+?)'>#", $this->web_descargada, $matches);
	dbug_r($matches);
	
	$obtenido = array(
		'titulo'  => $titulo,
		'imagen'  => '/canales/tvg.jpg',
		'enlaces' => array()
	);
	
	for ($i = 0, $i_t = count($matches[0]); $i < $i_t; $i++) {
		$ret = CargaWebCurl($url, 'idSerie='.$matches[1][$i].'&idCapitulo='.$matches[2][$i]);
		//dbug_($ret);
		$tit = entre1y2($ret, '<div id="titulo">', '</div');
		$tit = strip_tags($tit);
		$this->parsefragment($obtenido['enlaces'], $ret, $tit, true);
	}
} elseif(enString($this->web_descargada, '"playlist":')) {
	dbug('modo 2');
	//backgroundImage: "url(http://www.crtvg.es/files/web/000020120911000003.jpg)"
	if (enString($this->web_descargada,'backgroundImage:')) {
		$p=strpos($this->web_descargada,'backgroundImage:');
		$imagen=entre1y2_a($this->web_descargada,$p,'url(',')');
	} else {
		$imagen = entre1y2($this->web_descargada, '"playlist":[{"url":"', '"');
		$imagen = str_replace('\\', '', $imagen);
	}
	dbug('imagen='.$imagen);
	
	$obtenido = array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array()
	);
	
	$this->parsefragment($obtenido['enlaces'], $this->web_descargada, $titulo);
} else {
	$obtenido = array(
		'titulo' => entre1y2($this->web_descargada, 'og:title" content="', '"'),
		'imagen' => entre1y2($this->web_descargada, 'og:image" content="', '"')
	);
	
	$url = desde1a2($this->web_descargada, 'http://media1.crtvg.es/', '.m3u8', true);
	
	if (!enString($url, '<script')) {
		$obtenido['enlaces'] = array(
			array(
				'url'  => $url,
				'tipo' => 'm3u8'
			)
		);
	}
	else if (preg_match('@url = "(https?://.*?\.mp4.*?)"@i', $this->web_descargada, $matches)) {
		dbug_r($matches);
		
		$url = $matches[1];
		
		$url = str_replace('ondemand-crtvg-origin.flumotion.com', 'www.crtvg.es', $url);
		
		$obtenido['enlaces'] = array(
			array(
				'url'     => $url,
				'url_txt' => 'Descargar',
				'tipo'    => 'http'
			)
		);
	}
}


if (enString($url, '<script')) {
	return;
}

finalCadena($obtenido);
}

function parsefragment(&$arr, $html, $titulo, $multiple = false) {
	//rtmp://media1.crtvg.es:80/vod
	$p=strpos($html,'clip:'); if(!$p) $p = strposF($html,'"clip":');
	$p=strpos($html,'url:',$p); if(!$p) $p = strposF($html,'"provider":"rtmp","url":');
	$url=entre1y2_a($html,$p,'"','"');
	$url = str_replace('\\', '', $url);
	dbug('url='.$url);
	
	//netConnectionUrl: "rtmp://media1.crtvg.es:80/vod"
	$p=strpos($html,'netConnectionUrl:'); if(!$p) $p = strposF($html,'"netConnectionUrl":');
	$preurl=entre1y2_a($html,$p,'"','"');
	$preurl = str_replace('\\', '', $preurl);
	dbug('$preurl='.$preurl);
	
	
	
	//ipadUrl: "http:// m3u8"
	$p=strpos($html,'ipadUrl:'); if(!$p) $p = strposF($html,'"ipadUrl":');
	$ipadUrl=entre1y2_a($html,$p,'"','"');
	$ipadUrl = str_replace('\\', '', $ipadUrl);
	dbug('$ipadUrl='.$ipadUrl);
	
	if ($multiple) {
		$arr[] = array(
			'titulo' => $titulo
		);
	}
	
	$arr[] = array(
		'url'  => ' ',
		'rtmpdump' => '-r "'.$preurl.'" -y "'.$url.'" -o "'.generaNombreWindowsValido($titulo).'.mp4"',
		'tipo' => 'rtmpConcreto'
	);
	
	if(strlen($ipadUrl) > 10){
		$arr[] = array(
			'url'  => $ipadUrl,
			'tipo' => 'm3u8'
		);
	}
}

function calculaXabarin(){
	// https://xabarin.gal/videos/93195-maimino/
	// direct_url:"https:\u002F\u002Fcrtvg-bucket.flumotion.cloud\u002Fondemand\u002Fad36b3e0-7c04-4908-93af-640cb2ed95c8\u002F3df87e19-ea32-4c18-8292-d691ef0aea0e\u002Fhls\u002Fmaster.m3u8"
	//      image:"https:\u002F\u002Fd1oldvcs710rcb.cloudfront.net\u002Fimages_slider\u002F2d5ef743104d414abdae2fb6293b87e4.png"
	// thumbnail_track_url:"https:\u002F\u002Fprogressive.codev8.net\u002Fuserdatanew\u002Fad36b3e0-7c04-4908-93af-640cb2ed95c8\u002Fstoryboard\u002F3df87e19-ea32-4c18-8292-d691ef0aea0e.vtt"
	
	
	if (preg_match("#return ({.*?})}}\(#", $this->web_descargada, $matches)) {
		dbug_r($matches);
		$jsObject = $matches[1];
		// Can't parse the javascript object as json
		dbug_($jsObject);
			
		$obtenido = array(
			'titulo'  => 'Xabarín',
			'imagen'  => '/canales/tvg.jpg',
			'enlaces' => array()
		);
		
		//$p = "(?:\".*?\"|.+?)";
		//if (preg_match("#return {.*?}}}\({$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},{$p},({$p}),#", $this->web_descargada, $matches)) {
		if (preg_match("#name:(\"[\s\S]*?\")#", $this->web_descargada, $matches)) {
			dbug_r($matches);
			$titulo = json_decode($matches[1], true);
			dbug_($titulo);
			$obtenido['titulo'] = $titulo;
		}
		
		/*
		// Imagen incorrecta a veces
		if (preg_match("#image:(\"http.*?\")#", $this->web_descargada, $matches)) {
			dbug_r($matches);
			$imagen = json_decode($matches[1], true);
			dbug_($imagen);
			$obtenido['imagen'] = $imagen;
		}
		*/
		
		// No encuentro .mp4
		if (preg_match("#direct_url:(\"http.*?\")#", $this->web_descargada, $matches)) {
			dbug_r($matches);
			$url = json_decode($matches[1], true);
			dbug_($url);
			
			$obtenido['enlaces'][] = array(
				'url'     => $url,
				'url_txt' => 'Descargar',
				'tipo'    => 'm3u8'
			);
		}

/*		
		// No son subs, es la preview del vídeo entero
		if (preg_match("#thumbnail_track_url:(\"http.*?\")#", $this->web_descargada, $matches)) {
			dbug_r($matches);
			$url = json_decode($matches[1], true);
			dbug_($url);
			
			$obtenido['enlaces'][] = array(
				'url'     => $url,
				'url_txt' => 'Subtítulos',
				'tipo'    => 'srt'
			);
		}
*/

		finalCadena($obtenido);
	}
}

/*
http://ondemand-crtvg-origin.flumotion.com/videos/MD/2023/07/bb476e72-608f-4c4a-821d-b6f50f880725.mp4
http://ondemand-crtvg-origin.flumotion.com/videos/MD/2023/07/bb476e72-608f-4c4a-821d-b6f50f880725.mp4/playlist.m3u8
http://www.crtvg.es/videos/MD/2023/07/bb476e72-608f-4c4a-821d-b6f50f880725.mp4
*/
}
