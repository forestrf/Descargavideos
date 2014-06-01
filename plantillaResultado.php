<?php

//print_r($R);


switch($R['MODO']){
	case 'RESULTADO':
		include plantillaInclude('resultados.php');
	break;
	case 'ERROR':
		include plantillaInclude('fallo.php');
	break;
}



// Únicamente necesita de la variable $R
function generaInnerResultado(){
	global $R, $R2;
	if($R['BASE']['titulo'] == '')
		$R['BASE']['titulo'] = 'Sin título';
	
	if(isset($R['BASE']['imagen']))
		if($R['BASE']['imagen'] == '')
			$R['BASE']['imagen'] = '/img/picture_unrelated.jpg';
	
	
	$num = 0;
	foreach($R['BASE']['enlaces'] as $res){
		$url             = isset($res['url']) ? $res['url'] : '';
		$rtmpdump        = isset($res['rtmpdump']) ? $res['rtmpdump'] : '';
		$rtmpdumpHTTP    = isset($res['rtmpdumpHTTP']) ? $res['rtmpdumpHTTP'] : '';
		$m3u8_pass       = isset($res['m3u8_pass']) ? $res['m3u8_pass'] : '';
		$url_txt         = isset($res['url_txt']) ? $res['url_txt'] : '';
		$extension       = isset($res['extension']) ? $res['extension'] : '';
		$titulo          = isset($res['titulo']) ? html_entity_decode($res['titulo']) : '';
		$otros_datos_mp3 = isset($res['otros_datos_mp3']) ? $res['otros_datos_mp3'] : '';
		$nombre_archivo  = isset($res['nombre_archivo']) ? $res['nombre_archivo'] : '';
		dbug('$url='.$url);
		dbug('$rtmpdump='.$rtmpdump);
		dbug('$rtmpdumpHTTP='.$rtmpdumpHTTP);
		dbug('$m3u8_pass='.$m3u8_pass);
		dbug('$url_txt='.$url_txt);
		dbug('$extension='.$extension);
		dbug('$titulo='.$titulo);
		dbug('$otros_datos_mp3='.$otros_datos_mp3);
		dbug('$nombre_archivo='.$nombre_archivo);
	
		// Array temporal. Se genera por cada ciclo del foreach y se rellena con lo necesario para escribir la plantilla de resultados
		$R2 = array();
	
		if($titulo || (MODO_API && $url_txt)){
			$R2['dir_resultado']   = $titulo;
			$R2['dir_resultado_2'] = $url_txt;
			include plantillaInclude('resultado_texto.php');
		}
	
		$aIncluir = '';
	
		//$tipo = "http" o "rtmp"
		if($url){
			if($res['tipo'] === 'rtmp'){
				$aIncluir = plantillaInclude('resultado_rtmp.php');
				//{extension_res}
				if(!$extension)
					$extension = extraeExtension($url, ':');
			}
			elseif($res['tipo'] === 'rtmpConcreto'){
				$aIncluir = plantillaInclude('resultado_rtmpConcreto.php');
				
				if($nombre_archivo === ''){
					preg_match('@-o.*?"(.*?)"@i', $rtmpdump, $matches);
					$nombre_archivo = $matches[1];
				}
				
				if(!$extension)
					$extension = extraeExtension($url,".");
			}
			elseif($res['tipo'] === 'rtmpConcretoHTTP'){
				$aIncluir = plantillaInclude('resultado_rtmpConcretoHTTP.php');
				
				if($nombre_archivo == '')
					$nombre_archivo = 'video.mp4';
				
				if(!$extension)
					$extension = extraeExtension($url, '.');
			}
			elseif($res['tipo'] === 'm3u8'){
				$aIncluir = plantillaInclude('resultado_m3u8.php');
	
				if(!$extension)
					$extension = 'm3u8';
			}
			elseif($res['tipo'] === 'js'){
				$aIncluir = plantillaInclude('resultado_js.php');
	
				if(!$extension)
					$extension = 'm3u8';
			}
			elseif($res['tipo'] === 'srt'){
				$aIncluir = plantillaInclude('resultado_srt.php');
			}
			else{
			// if($res['tipo'] == 'http'){
				$aIncluir = plantillaInclude('resultado_url.php');
	
				if(!$extension)
					$extension = extraeExtension($url, '.');
			}
			if($url_txt)
				$url_txt = $url_txt;
			else
				$url_txt = $url;
		}
	
		global $lastID;
		if(!$lastID)
			$lastID = 1;
		
		$R2['dir_resultado']                               = $url;
		$R2['dir_resultado_reproductor']                   = urlencode($url);
		$R2['dir_resultado_urlencode']                     = urlencode($url);
		$R2['dir_resultado_txt']                           = htmlentities($url_txt);
		$R2['dir_resultado_txt_esc_simplecoma']            = htmlentities(strtr($url_txt, array("'"=>"\\'")));
		$R2['dir_resultado_enc_rtmpdump']                  = $url;
		$R2['dir_resultado_rtmpdump_manual']               = $rtmpdump;
		$R2['dir_resultado_rtmpdump_manual_esc_doblecoma'] = strtr($rtmpdump, array('"'=>'&quot;'));
		$R2['dir_resultado_rtmpdumpHTTP']                  = $rtmpdumpHTTP;
		$R2['dir_resultado_rtmpdumpHTTP_esc_doblecoma']    = strtr($rtmpdumpHTTP, array('"'=>'&quot;'));
		$R2['dir_resultado_enc_rtmpdump_manual']           = urlencode($rtmpdump);
		$R2['nombre_resultado_rtmpdump_manual']            = $nombre_archivo;
		$R2['pass_m3u8']                                   = $m3u8_pass;
		$R2['extension_res']                               = $extension;
		$R2['otros_datos_mp3']                             = $otros_datos_mp3;
		$R2['num']                                         = $num;
		$R2['random_id']                                   = $lastID;
	
		++$lastID;
		++$num;
		
		include $aIncluir;
	}
}

//print_r($R);


?>