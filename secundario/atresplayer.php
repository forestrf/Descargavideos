<?php
/*
http://desprogresiva.antena3.com/assets4/2013/09/26/B553499C-8C62-46FC-9E72-A8331CD46498/video_720_900k_es.mp4

https://servicios.atresplayer.com/api/urlVideoLanguage/20131002-EPISODE-00003-false/web/20131002-EPISODE-00003-false%7C1380911694%7C744c9fe34ca6ed4fd574d654fbcdd5ae/es.xml
https://servicios.atresplayer.com/api/urlVideoLanguage/20130924-EPISODE-00037-false/web/20130924-EPISODE-00037-false%7C1380911694%7C97c77e82b393d0b295021e8cdb41e3b6/es.xml


http://desprogresiva.antena3.com/assets3/2013/10/02/E78E8D76-3735-4BB8-9426-388DDB0ECC9F/video_720_900k_es.mp4
*/


/*
chunklist_b648000.m3u8
chunklist_b948000.m3u8
chunklist_b1348000.m3u8
chunklist_b1548000.m3u8
chunklist_b1973000.m3u8
*/

/*
proxys (DV y PyDownTV IPs bloqueadas):
http://www.gmodules.com/ig/proxy?url=
https://webproxy.net/view?q=
*/

//ES NECESARIO ESTAR LOGUEADO. Crear cuenta falsa.

$atresplayer_obtenido_alerta = 'Es necesario estar en España para descargar de ATresPlayer. Si no se encuentra en España puede usar el programa <a target="_blank" href="http://hola.org">hola.org</a> para simular que se encuentra en España.<br/>Es necesario tener habilitadas las <a href="http://es.wikipedia.org/wiki/Cookie_%28inform%C3%A1tica%29#Privacidad_y_cookies_de_terceros">cookies de terceros</a>.<br/>Si no puede ver el vídeo desde la web oficial, no lo podrá descargar, no se puede descargar vídeos premium sin serlo.';

function atresplayer(){
/*
header('Location: http://descargavid.blogspot.com.es/2013/11/segunda-solucion-para-atresplayer.html');
exit;
*/

global $web,$web_descargada;

$obtenido=array('enlaces' => array());

if(preg_match('@<div.*?capa_modulo_player.*?episode ?= ?"(.*?)">@i', $web_descargada, $matches)){
	$episode = $matches[1];
	$obtenido['enlaces'] = resultadoA3PNormal($web, $web_descargada, $episode);
	
	
	$obtenido['titulo'] = entre1y2($web_descargada, '<title>','<');
	
	preg_match('@<meta (name="product\\-image")|(property="og\\:image") content=\'(.*?)\'@i', $web_descargada, $matches);
	$obtenido['imagen'] = $matches[3];
}
else{
	if(enString($web, '#')){
		$carusel = entre1y2($web, 0, '#').'carousel.json';
	}
	else{
		$carusel = $web.'carousel.json';
	}
	dbug('$carusel = '.$carusel);
	$carusel = CargaWebCurl($carusel);
	$carusel = json_decode($carusel, true);
	//dbug_r($carusel);
	if(count($carusel)>0){
		$max = 30;
		foreach($carusel as $elem){
			$obtenido['enlaces'] = array_merge($obtenido['enlaces'], resultadoA3PNormal($elem['hrefHtml'],'','',$elem['title']));
			if(--$max<=0)
				break;
		}
	}
	else{
		setErrorWebIntera('No se encontró ningún vídeo');
		return;
	}
	
	$obtenido['titulo'] = entre1y2($web_descargada, '<title>','<');
	
	$p = strpos($web_descargada, '<div class="over">');
	$obtenido['imagen'] = 'http://www.atresplayer.com/'.entre1y2_a($web_descargada, $p, 'src="', '"');
}

global $atresplayer_obtenido_alerta;
$obtenido['alerta_especifica'] = $atresplayer_obtenido_alerta;



finalCadena($obtenido);
}

function resultadoA3PNormal($web, $web_descargada='', $episode='', $title=''){
	$cabeceras = array(
		'User-Agent: iOS / Safari 7: Mozilla/5.0 (iPad; CPU OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11B554a Safari/9537.53'
	);
		
	if($web_descargada === ''){
		$web_descargada = CargaWebCurl($web, '', 1, '', $cabeceras);
		if(!preg_match('@<div.*?capa_modulo_player.*?episode ?= ?"(.*?)">@i', $web_descargada, $matches)){
			return array();
		}
		$episode = $matches[1];
	}
	
	$obtenido = array();
	
	
	dbug('episode = '.$episode);
	
	/*
	$proxys = listado_proxys();
	
	$random = rand(0,count($proxys)-1);
	
	dbug('proxy elegido: '.$proxys[$random]['proxy']);
	*/
	
	$tiempo = time() +3000;
	
	$key = "puessepavuestramerced";
	$key = "dXN#2nqgo)T2LDPi,5R;3XVK"; // swf
	//$key = "QWtMLXs414Yo+c#_+Q#K@NN)"; // móvil
	$msg = $episode.$tiempo;

	$hmac = bin2hex(custom_hmac('md5', $msg, $key, true));
	dbug('hmac = '.$hmac);
	
	//jojojo.tk
	//briscaonline.tk
	
	$urljs = 'function A3P{{random_id}}creaboton(que){'.
			'if(que === false || que === "OK"){'.
				'finalizar{{random_id}}("","Necesitas iniciar sesión en ATresPlayer para descargar este vídeo, el vídeo no existe o no se puede generar un enlace de descarga");'.
			'}'.
			'else{'.
				'finalizar{{random_id}}(que,"Descargar");'.
			'}'.
		'}'.
		
		'D.g("enlaces").innerHTML += \'<iframe width="0" height="0" style="position:absolute" src="http://sandia.tk/a3p.php?o=A3P{{random_id}}creaboton&e='.$episode.'&t='.$tiempo.'&h='.$hmac.'">\';';
	
	
	
	$resultado = array(
					'url'  => $urljs,
					'tipo' => 'jsFlash'
				);
	
	if($title!=='')
		$resultado['titulo'] = $title;
	
	$obtenido[] = &$resultado;
	
	// Buscar subtitulos
	$preSubtitulos = CargaWebCurl('http://servicios.atresplayer.com/episode/get?episodePk='.$episode);
	dbug($preSubtitulos);
	$preSubtitulos = json_decode($preSubtitulos, true);
	dbug_r($preSubtitulos);
	if($preSubtitulos['subtitle']){
		$obtenido[] = array(
					'url'  => $preSubtitulos['urlSubtitle'],
					'tipo' => 'srt'
				);
	}
	
	
	$urljs_f4m = 'f{{random_id}} = function(){};'.
	
		'var tmp{{random_id}} = D.g("rtmp{{random_id}}").innerHTML;'.
		
		'D.g("rtmp{{random_id}}").innerHTML = "Se requiere Adobe Flash Player";'.
		
		'function A3P{{random_id}}creaboton(que){'.
			'if(que === false || que === "OK"){'.
				'D.g("rtmp{{random_id}}").innerHTML = D.g("rtmp{{random_id}}").innerHTML = "Necesitas iniciar sesión en ATresPlayer para descargar este vídeo, el vídeo no existe o no se puede generar un enlace de descarga";'.
			'}'.
			'else{'.
				'D.g("rtmp{{random_id}}").innerHTML = tmp{{random_id}}.replace(/--manifest ".*?"/, "--manifest \""+que+"\"");'.
				'if(typeof f4mdownloader !== "undefined"){'.
					'D.g("rtmp{{random_id}}furl").value = D.g("rtmp{{random_id}}furl").value.replace(/--manifest ".*?"/, "--manifest \""+que+"\"");'.
					'activa{{random_id}}();'.
				'}'.
			'}'.
		'}'.
		
		'D.g("enlaces").innerHTML += \'<iframe width="0" height="0" style="position:absolute" src="http://sandia.tk/a3p2.php?o=A3P{{random_id}}creaboton&e='.$episode.'&t='.$tiempo.'&h='.$hmac.'">\';';
	
	
	// f4m url
	$obtenido[] = array(
		'url'            => '-',
		'tipo'           => 'f4m',
		'nombre_archivo' => generaNombreWindowsValido($preSubtitulos['name']),
		'script'         => $urljs_f4m
	);
	
	return $obtenido;
}


function custom_hmac($algo, $data, $key, $raw_output = false){
	$algo = strtolower($algo);
	$pack = 'H'.strlen($algo('test'));
	$size = 64;
	$opad = str_repeat(chr(0x5C), $size);
	$ipad = str_repeat(chr(0x36), $size);
	
	if (strlen($key) > $size) {
		$key = str_pad(pack($pack, $algo($key)), $size, chr(0x00));
	} else {
		$key = str_pad($key, $size, chr(0x00));
	}
	
	for ($i = 0; $i < strlen($key) - 1; $i++) {
		$opad[$i] = $opad[$i] ^ $key[$i];
		$ipad[$i] = $ipad[$i] ^ $key[$i];
	}
	
	$output = $algo($opad.pack($pack, $algo($ipad.$data)));
	
	return ($raw_output) ? pack($pack, $output) : $output;
}


?>