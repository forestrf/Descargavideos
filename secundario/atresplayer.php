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

preg_match('@<div.*?capa_modulo_player.*?episode ?= ?"(.*?)">@i', $web_descargada, $matches);

if(!$matches[1]){
	setErrorWebIntera('No se encontró ningún vídeo');
}

$episode = $matches[1];
dbug('episode = '.$episode);


$key = "puessepavuestramerced";

$tiempo = time()+3000;

$msg = $episode.$tiempo;

$hmac = bin2hex(custom_hmac('md5', $msg, $key, true));



$urljs = 
	"function lanzaA3P(){".
		"jQuery.support.cors=true;".
		
		"apiUrl='http://servicios.atresplayer.com/api/urlVideo/".$episode."/android_tablet/".$episode."|".$tiempo."|".$hmac."';".
		"jQuery.ajax({".
			"type:'GET',".
			"url:apiUrl,".
			"data:'blabla',".
			"crossDomain:true,".
			"cache:false,".
			"dataType:'jsonp'".
		"})".
		".done(function(data){".
			"if(data!=null){".
				"if(data['resultDes']=='OK'){".
					"mostrarResultado(data['resultObject']['es']);".
				"}".
				"else{".
					"apiUrl = 'https://servicios.atresplayer.com/api/urlVideoLanguage/".$episode."/android_tablet/".$episode."|".$tiempo."|".$hmac."/es.json';".
					"jQuery.ajax({".
						"type:'GET',".
						"url:apiUrl,".
						"data:'blabla',".
						"crossDomain:true,".
						"cache:false,".
						"dataType:'jsonp'".
					"})".
					".done(function(data){".
						"if(data != null)".
							"if(data['result'] == '0'){".
								"mostrarResultado(data['resultDes']);".
							"}".
							"else{".
								"mostrarFallo();".
							"}".
					"}).fail(".
						"mostrarFallo".
					");".
				"}".
			"}".
			"else{".
				"mostrarFallo();".
			"}".
		"}).fail(".
			"mostrarFallo".
		");".
	"}".
	
	"function mostrarResultado(entrada){".
		"finalizar(entrada,'Descargar');".
	"}".
	
	"function mostrarFallo(){".
		"finalizar('','Necesitas iniciar sesión en ATresPlayer para descargar este vídeo o bien el vídeo no existe');".
	"}".
	
	"lanzaA3P();";



$titulo = entre1y2($web_descargada, '<title>','<');

preg_match('@<meta (name="product\\-image")|(property="og\\:image") content=\'(.*?)\'@i', $web_descargada, $matches);
$imagen = $matches[3];




$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $urljs,
			'tipo' => 'js'
		)
	)
);



// Vulnerabilidad xss
// https://servicios.atresplayer.com/episode/checkEpisode?callback=alert%28%27alert%27%29;jorl&episodePk=20140128-EPISODE-00025-false

// Para ver si tiene subtitulos es necesario cargar el xml
// http://www.atresplayer.com/episodexml/80000608/80000001/110001214/110001215/2014/02/24/1B1E7AC8-D23A-482C-AD91-523704547B67.xml
// https://servicios.atresplayer.com/episode/getplayer?callback=jQuery18105513220074448444_1393974286813&episodePk=20140224-EPISODE-00009-false&_=1393974323306
$WebSubtitulos = CargaWebCurl("https://servicios.atresplayer.com/episode/getplayer?episodePk=".$episode);
dbug($WebSubtitulos);
$WebSubtitulos = JSON_decode($WebSubtitulos, true);
dbug_r($WebSubtitulos);
if(isset($WebSubtitulos['pathData']) && strlen($WebSubtitulos['pathData'])>1){
	$WebSubtitulos = CargaWebCurl("http://www.atresplayer.com/episodexml/".$WebSubtitulos['pathData']);
	dbug($WebSubtitulos);
	if(enString($WebSubtitulos, "<subtitle>")){
		// Puede que tenga subtitulos
		$urlSubtitulos = entre1y2($WebSubtitulos, "<subtitle><![CDATA[", "]");
		dbug($urlSubtitulos);
		if(enString($urlSubtitulos, ".srt")){
			$obtenido['enlaces'][] = array(
				'url_txt' => "Subtitulos",
				'url'     => $urlSubtitulos,
				'tipo'    => 'srt'
			);
			dbug("LEEEEEEEL");
		}
	}
}









finalCadena($obtenido);



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