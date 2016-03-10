<?php

class Univision extends cadena{

function calculaMovil() {
	$w = $this->web . 'FINAL';
	$id = entre1y2($w, '?id=', 'FINAL');
	dbug('id=' . $id);
	$this->univisionID($id);
}

function calcula() {
	if (enString($this->web_descargada, 'video_id=')) {
		$id = entre1y2($this->web_descargada, 'video_id=', ',');
	} elseif (enString($this->web_descargada, 'fw_video_asset_id')) {
		preg_match("@fw_video_asset_id.*?([0-9]+)@", $this->web_descargada, $match);
		$id = $match[1];
	} elseif (enString($this->web_descargada, 'videoEmbedCode')) {
		preg_match("@videoEmbedCode.*?([0-9]+)@", $this->web_descargada, $match);
		$id = $match[1];
	} elseif (enString($this->web_descargada, 'data-video="extId:')) {
		$id = entre1y2($this->web_descargada, 'data-video="extId:', '"');
	} else {
		return;
	}

	dbug('id=' . $id);
	$this->univisionID($id);
}

function calculaUVideos() {
	if (enString($this->web_descargada, 'data-video="extId:')) {
		$id = entre1y2($this->web_descargada, 'data-video="extId:', '"');
	} else if (enString($this->web_descargada, '<meta property="og:image" content="')) {
		$imagen_preid = entre1y2($this->web_descargada, '<meta property="og:image" content="', '"');
		$id = substr($imagen_preid, strrposF($imagen_preid, '/'));
	} else {
		return;
	}

	dbug('id=' . $id);
	$this->univisionID($id);
}

function univisionID($id) {
	dbug('univisionID');
	$ret = 'http://cdn-download.mcm.univision.com/videos_mcm/' . $id . '.js';
	dbug('url=' . $ret);

	$ret = CargaWebCurl($ret);

	if(enString($ret, "Access Denied")) {
		setErrorWebIntera("El vídeo de Univisión está bloqueado.");
		return;
	}

	$obtenido = array('enlaces' => array());

	//imagen
	$imagen = entre1y2($ret, '"src_image_url":"', '"');
	$imagen = strtr($imagen, array('\\' => ''));
	dbug('imagen=' . $imagen);

	//titulo
	$titulo = entre1y2($ret, '"def_title":"', '"');
	$titulo = jsonRemoveUnicodeSequences($titulo);
	$titulo = limpiaTitulo($titulo);
	dbug('titulo=' . $titulo);

	if (!enString($ret, '"published_urls":[]')) {
		dbug('No aparece "published_urls":[]');
		
		$json = substr($ret, strposF($ret, '('));
		$json = substr($json, 0, strrpos($json, ')'));
		dbug_($json);
		$json = json_decode($json, true);
		dbug_r($json);
		
		$urls = array();
		if(isset($json['published_urls'])){
			foreach($json['published_urls'] as &$url){
				if(enString($url['embed_url'], '.mp4')){
					$u = &$url['embed_url'];
					dbug_($u);
					$p = strrposF($u, '_');
					$f = strpos($u, '.', $p);
					$calidad = substr($u, $p, $f - $p);
					$urls[] = array(
						$u,
						$calidad
					);
				}
			}
			
		}
		
		dbug('urls: ' . count($urls));
		
		//ya tenemos las urls en formato: /120615_2708697_El_Talisman_Capitulo_98_99___Ultimo_capitulo_1339800465_2000.mp4
		//ordenar
		if (count($urls) > 0) {
			$urls = sortmulti($urls, 1, "123", true);
		}
	}
	
	if (enString($ret, '"published_urls":[]') || (isset($urls) && count($urls) === 0)) {
		dbug('No se pueden encontrar urls. Usando método 2');
		// http://vmscdn-download.s3.amazonaws.com/videos_mcm/variant/2912557.m3u8

		$m3u8FuenteUrls = 'http://vmscdn-download.s3.amazonaws.com/videos_mcm/variant/' . $id . '.m3u8';
		dbug('$m3u8FuenteUrls = ' . $m3u8FuenteUrls);

		$m3u8FuenteUrls = CargaWebCurl($m3u8FuenteUrls);
		dbug($m3u8FuenteUrls);

		preg_match('@http://.*media(.*?)_[0-9]{3,4}.m3u8@', $m3u8FuenteUrls, $matches);
		dbug_r($matches);

		$urlBase = $matches[1];

		$calidades = array(2000, 1200, 810, 800, 510, 500, 270, 150);

		$urls = array();
		foreach ($calidades as $calidad) {
			$urlT = 'http://h.univision.com/media' . $urlBase . '_' . $calidad . '.mp4';
			$urls[] = array($urlT, $calidad);
		}
		//ya tenemos las urls en formato: /120615_2708697_El_Talisman_Capitulo_98_99___Ultimo_capitulo_1339800465_2000.mp4
		//ya está ordenado
	}

	$urls_length = count($urls);
	for ($i = 0; $i < $urls_length; $i++) {
		if($urls[$i][1] == 2000){
			$preContext =
			array('http'=>
				array(
					'method' => 'HEAD',
					'header' => "User-agent: Mozilla/5.0 (Windows NT 6.1; rv:11.0) Gecko/20100101 Firefox/11.0\r\n".
								"Connection: close\r\n".
								"Accept-Language: es-ES,es;en-US;en\r\n".
								"Accept: text/html,application/xhtml+xml,application/xml\r\n",
					'timeout' => 5,
					'ignore_errors' => '1'
				)
			);
			
			$preContext = stream_context_create($preContext);
			if(file_get_contents($urls[$i][0], false, $preContext) === false){
				dbug('no se puede abrir la url de calidad 2000');
				continue;
			}
			dbug_r($http_response_header);
			if(strpos($http_response_header[0], ' 404 ')){
				dbug('la url de calidad 2000 da 404');
				continue;
			}
		}
		if (esVideoAudioAnon($urls[$i][0])) {
			$obtenido['enlaces'][] = array(
				'url' => $urls[$i][0],
				'url_txt' => 'Calidad: ' . $urls[$i][1] . " Kbps",
				'tipo' => 'http'
			);
		}
	}

	for ($i = 0, $ii = count($json['captions']); $i < $ii; $i++) {
		if ($json['captions'][$i]['language'] === 'es') {
			$url = $json['captions'][$i]['url'];
			$obtenido['enlaces'][] = array(
				'url_txt' => 'Subtítulos en formato ' . substr($url, strrposF($url, '.')),
				'url' => $url,
				'tipo' => 'srt'
			);
		}
	}

	$obtenido['titulo'] = $titulo;
	$obtenido['imagen'] = $imagen;
	
	$obtenido['alerta_especifica'] = 'Si no puedes descargar el vídeo necesitas usar proxy.<br/>Descarga el programa ultrasurf (<a href="https://ultrasurf.us/download/u.zip">Descargar ultrasurf</a>), descomprime el archivo, ejecuta el programa y una vez hecho intenta descargar el vídeo de nuevo.<br/>Si 2000kbps da error prueba 1200kbps.';

	finalCadena($obtenido, false);
}

}
