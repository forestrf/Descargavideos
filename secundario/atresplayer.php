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
	$carusel = $web.'carousel.json';
	dbug('$carusel = '.$carusel);
	$carusel = CargaWebCurl($carusel);
	$carusel = json_decode($carusel, true);
	//dbug_r($carusel);
	if(count($carusel)>0){
		foreach($carusel as $elem){
			$obtenido['enlaces'] = array_merge($obtenido['enlaces'], resultadoA3PNormal($elem['hrefHtml'],'','',$elem['title']));
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
	/*
	$apiURL = 'https://servicios.atresplayer.com/api/urlVideoLanguage/'.$episode.'/android_tablet/'.urlencode($episode.'|'.$tiempo.'|'.$hmac).'/es.json';
	dbug($apiURL);
	
	$apiContent = CargaWebCurl($proxys[$random]['proxy'].urlencode($apiURL), '', 1, '', $cabeceras);
	//$apiContent = CargaWebCurl($apiURL, '', 1, $cookie, $cabeceras);
	dbug('-----------------apiContent-----------------');
	dbug($apiContent);
	
	
	$url = 'http://'.entre1y2($apiContent, 'http://', '"');
	
	
	
	
	if($title != ''){
		$obtenido[] = array(
					'titulo'  => $title,
					'url'  => $url,
					'tipo' => 'http',
					'url_txt' => 'Descargar'
				);
	}
	else{
		$obtenido[] = array(
					'url'  => $url,
					'tipo' => 'http',
					'url_txt' => 'Descargar'
				);
	}
	*/
	/*
	global $rnd_a3p;
	if($rnd_a3p==null)
		$rnd_a3p = 0;
	else
		++$rnd_a3p;
	
	$js = 'function lanzaA3P'.$rnd_a3p.'(){'.
		'if(typeof DESCARGADOR_ARCHIVOS_SWF === "undefined"){'.
			'setTimeout(lanzaA3P'.$rnd_a3p.', 200)'.
		'}'.
		'else if(DESCARGADOR_ARCHIVOS_SWF === true){'.
			'getFlashMovie("descargador_archivos").CargaWeb({'.
				'"url":"'.$apiURL.'",'.
				'"metodo":"GET"'.
			'}, "procesaA3P'.$rnd_a3p.'");'.
		'}'.
	'}'.
	
	'function procesaA3P'.$rnd_a3p.'(txt){'.
		//'console.log(txt);'.
		'var url = JSON.parse(txt)["resultDes"]'.
		//'console.log(url);'.
		'mostrarResultado(url);'.
	'}'.
	
	
	'function mostrarResultado(entrada){'.
		'finalizar(entrada,"Descargar");'.
	'}'.
	
	'function mostrarFallo(){'.
		'finalizar("","Necesitas iniciar sesión en ATresPlayer para descargar este vídeo o bien el vídeo no existe");'.
	'}'.
	
	
	
	'lanzaA3P'.$rnd_a3p.'();';
	*/
	
	
	
	
	
	
	
	    
    $urljs = 
		'function preLanzaA3P{{random_id}}(){'.
            'if(typeof DESCARGADOR_ARCHIVOS_SWF === "undefined"){'.
				'setTimeout(preLanzaA3P{{random_id}}, 200)'.
			'}'.
			'else if(DESCARGADOR_ARCHIVOS_SWF === true){'.
				'lanzaA3P{{random_id}}()'.
			'}'.
		'}'.
		'function calculaA3P{{random_id}}(data){'.
			'if(data.indexOf("{") !== -1){'.
				'data = JSON.parse(data);'.
				'if(data != "" && data["result"] == "0"){'.
					'mostrarResultado{{random_id}}(data["resultDes"]);'.
					'return true;'.
				'}'.
				'else{'.
					'return false;'.
				'}'.
			'}'.
			'else{'.
				'if(data != "" && data.indexOf("<resultDes>OK</resultDes>")!==-1){'.
					'mostrarResultado{{random_id}}(data.slice(data.indexOf("http")).split("<")[0].replace("&amp;","&"));'.
					'return true;'.
				'}'.
				'else{'.
					'return false;'.
				'}'.
			'}'.
		'}'.
        'function lanzaA3P{{random_id}}(){'.
			'getFlashMovie("descargador_archivos").CargaWeb({'.
				"'url':'https://servicios.atresplayer.com/api/urlVideoLanguage/$episode/android_tablet/$episode|$tiempo|$hmac/es.json',".
				'"metodo":"GET"'.
			'}, "procesaA3P1{{random_id}}");'.
		'}'.
		'function procesaA3P1{{random_id}}(data){'.
			'if(!calculaA3P{{random_id}}(data)){'.
				'getFlashMovie("descargador_archivos").CargaWeb({'.
					"'url':'http://servicios.atresplayer.com/api/urlVideo/$episode/android_tablet/$episode|$tiempo|$hmac',".
					'"metodo":"GET"'.
				'}, "procesaA3P2{{random_id}}");'.
			'}'.
		'}'.
		'function procesaA3P2{{random_id}}(data){'.
			'if(!calculaA3P{{random_id}}(data)){'.
				'mostrarFallo{{random_id}}();'.
			'}'.
        '}'.
        
        'function mostrarResultado{{random_id}}(entrada){'.
            'finalizar{{random_id}}(entrada,"Descargar");'.
        '}'.
        
        'function mostrarFallo{{random_id}}(){'.
            'finalizar{{random_id}}("","Necesitas iniciar sesión en ATresPlayer para descargar este vídeo o bien el vídeo no existe");'.
        '}'.
        
		'if(typeof descargador_archivos === "undefined"){'.
			'document.getElementById("enlaces").innerHTML += \'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="0" height="0" id="descargador_archivos" align="middle">'.
				'<param name="movie" value="/util/fla/f/http://www.atresplayer.com/" />'.
				'<param name="quality" value="high" />'.
				'<param name="bgcolor" value="#000" />'.
				'<param name="allowScriptAccess" value="sameDomain" />'.
				'<!--[if !IE]>-->'.
				'<embed src="/util/fla/f/http://www.atresplayer.com/" quality="high" bgcolor="#000"'.
					'width="0" height="0" name="descargador_archivos" align="middle"'.
					'play="true" loop="true" quality="high" allowScriptAccess="sameDomain"'.
					'type="application/x-shockwave-flash"'.
					'pluginspage="http://www.macromedia.com/go/getflashplayer">'.
				'</embed>'.
				'<!--<![endif]-->'.
			'</object>\';'.
			'var descargador_archivos = document.getElementById("descargador_archivos");'.
		'}'.
		
		
		
		
        'preLanzaA3P{{random_id}}();';
		
		
		
		
    

	
	
	$obtenido[] = array(
					'url'  => $urljs,
					'tipo' => 'js'
				);
	
	
	return $obtenido;
}


function custom_hmac($algo, $data, $key, $raw_output = false)
{
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