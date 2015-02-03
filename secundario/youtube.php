<?php
class youtube{
	var $error=false;
		  
	function parse($html){
	
		//$html='stream_map": "fallback_host%3Dtc.v17.cache2.googlevideo.com%5Cu0026quality%3Dhd720%5Cu0026type%3Dvideo%2Fmp4%3B%20codecs%3D%22avc1.64001F%2C%20mp4a.40.2%22%5Cu0026s%3DA59EE37E231AADDA34E5DF9739714313B6BD9F34.A6230113607CC22E239893E978A17B2D366687F8F8%5Cu0026itag%3D22%5Cu0026url%3Dhttp%3A%2F%2Fr4---sn-aigllme7.googlevideo.com%2Fvideoplayback%3Fupn%3DV4rgg6ZIH4Y%26ip%3D84.123.127.22%26key%3Dyt5%26ipbits%3D0%26ratebypass%3Dyes%26source%3Dyoutube%26sparams%3Did%252Cip%252Cipbits%252Citag%252Cratebypass%252Csource%252Cupn%252Cexpire%26ms%3Dau%26id%3Da4f97cd4bc490cd8%26itag%3D22%26mt%3D1393007561%26nh%3DEAM%26expire%3D1393032001%26sver%3D3%26fexp%3D903903%252C913564%252C914086%252C916624%252C936106%252C937417%252C937416%252C913434%252C936910%252C936913%252C902907%26mv%3Dm%2Cfallback_host%3Dtc.v7.cache1.googlevideo.com%5Cu0026quality%3Dmedium%5Cu0026type%3Dvideo%2Fwebm%3B%20codecs%3D%22vp8.0%2C%20vorbis%22%5Cu0026s%3D382B760164237407432285C331C854AA68FB4BF7.DBDD79E539AB2E05A234B68308E07F838F7C485353%5Cu0026itag%3D43%5Cu0026url%3Dhttp%3A%2F%2Fr4---sn-aigllme7.googlevideo.com%2Fvideoplayback%3Fupn%3DV4rgg6ZIH4Y%26ip%3D84.123.127.22%26key%3Dyt5%26ipbits%3D0%26ratebypass%3Dyes%26source%3Dyoutube%26sparams%3Did%252Cip%252Cipbits%252Citag%252Cratebypass%252Csource%252Cupn%252Cexpire%26ms%3Dau%26id%3Da4f97cd4bc490cd8%26itag%3D43%26mt%3D1393007561%26nh%3DEAM%26expire%3D1393032001%26sver%3D3%26fexp%3D903903%252C913564%252C914086%252C916624%252C936106%252C937417%252C937416%252C913434%252C936910%252C936913%252C902907%26mv%3Dm%2Cfallback_host%3Dtc.v7.cache8.googlevideo.com%5Cu0026quality%3Dmedium%5Cu0026type%3Dvideo%2Fmp4%3B%20codecs%3D%22avc1.42001E%2C%20mp4a.40.2%22%5Cu0026s%3DCC585EC7882C8006BFB7FAF1FDA32085E524EF99.B9A6673A44FA14DBE0CBAC893B9DEE3D33C9C88686%5Cu0026itag%3D18%5Cu0026url%3Dhttp%3A%2F%2Fr4---sn-aigllme7.googlevideo.com%2Fvideoplayback%3Fupn%3DV4rgg6ZIH4Y%26ip%3D84.123.127.22%26key%3Dyt5%26ipbits%3D0%26ratebypass%3Dyes%26source%3Dyoutube%26sparams%3Did%252Cip%252Cipbits%252Citag%252Cratebypass%252Csource%252Cupn%252Cexpire%26ms%3Dau%26id%3Da4f97cd4bc490cd8%26itag%3D18%26mt%3D1393007561%26nh%3DEAM%26expire%3D1393032001%26sver%3D3%26fexp%3D903903%252C913564%252C914086%252C916624%252C936106%252C937417%252C937416%252C913434%252C936910%252C936913%252C902907%26mv%3Dm%2Cfallback_host%3Dtc.v15.cache7.googlevideo.com%5Cu0026quality%3Dsmall%5Cu0026type%3Dvideo%2Fx-flv%5Cu0026s%3DBB586A37D8F8BFDA02D8CE5CAD94F52C6E7DBD38.9FA5698F6B625914F577AEDB2014FE087F14598282%5Cu0026itag%3D5%5Cu0026url%3Dhttp%3A%2F%2Fr4---sn-aigllme7.googlevideo.com%2Fvideoplayback%3Fupn%3DV4rgg6ZIH4Y%26ip%3D84.123.127.22%26key%3Dyt5%26ipbits%3D0%26source%3Dyoutube%26sparams%3Did%252Cip%252Cipbits%252Citag%252Csource%252Cupn%252Cexpire%26ms%3Dau%26id%3Da4f97cd4bc490cd8%26itag%3D5%26mt%3D1393007561%26nh%3DEAM%26expire%3D1393032001%26sver%3D3%26fexp%3D903903%252C913564%252C914086%252C916624%252C936106%252C937417%252C937416%252C913434%252C936910%252C936913%252C902907%26mv%3Dm%2Cfallback_host%3Dtc.v16.cache5.googlevideo.com%5Cu0026quality%3Dsmall%5Cu0026type%3Dvideo%2F3gpp%3B%20codecs%3D%22mp4v.20.3%2C%20mp4a.40.2%22%5Cu0026s%3D8B93478A603B1CDC23B9DF5B4D28839DA1621848.3C650BD9D392067235C8173BCC376C9F8BEB804747%5Cu0026itag%3D36%5Cu0026url%3Dhttp%3A%2F%2Fr4---sn-aigllme7.googlevideo.com%2Fvideoplayback%3Fupn%3DV4rgg6ZIH4Y%26ip%3D84.123.127.22%26key%3Dyt5%26ipbits%3D0%26source%3Dyoutube%26sparams%3Did%252Cip%252Cipbits%252Citag%252Csource%252Cupn%252Cexpire%26ms%3Dau%26id%3Da4f97cd4bc490cd8%26itag%3D36%26mt%3D1393007561%26nh%3DEAM%26expire%3D1393032001%26sver%3D3%26fexp%3D903903%252C913564%252C914086%252C916624%252C936106%252C937417%252C937416%252C913434%252C936910%252C936913%252C902907%26mv%3Dm%2Cfallback_host%3Dtc.v13.cache1.googlevideo.com%5Cu0026quality%3Dsmall%5Cu0026type%3Dvideo%2F3gpp%3B%20codecs%3D%22mp4v.20.3%2C%20mp4a.40.2%22%5Cu0026s%3D3A5C6E337F7A0F7925696BE69DAE8D06B5640A4E.23C7CE0459AC6E1238DBB9BC014A2CC62E215D8383%5Cu0026itag%3D17%5Cu0026url%3Dhttp%3A%2F%2Fr4---sn-aigllme7.googlevideo.com%2Fvideoplayback%3Fupn%3DV4rgg6ZIH4Y%26ip%3D84.123.127.22%26key%3Dyt5%26ipbits%3D0%26source%3Dyoutube%26sparams%3Did%252Cip%252Cipbits%252Citag%252Csource%252Cupn%252Cexpire%26ms%3Dau%26id%3Da4f97cd4bc490cd8%26itag%3D17%26mt%3D1393007561%26nh%3DEAM%26expire%3D1393032001%26sver%3D3%26fexp%3D903903%252C913564%252C914086%252C916624%252C936106%252C937417%252C937416%252C913434%252C936910%252C936913%252C902907%26mv%3Dm"';
	
		if(strstr($html,'verify-age-thumb')){
			$this->error = "El vídeo contiene contenido adulto.";
			return false;
		}

		if(strstr($html,'das_captcha')){
			$this->error = "A causa de la gran cantidad de peticiones es necesario resolver un captcha. La resolución de dicho captcha todavía no está implementado en Descargavideos.";
			return false;
		}

		if(!preg_match('/stream_map":[ \t\r\n]*"(.[^"]*?)"/i',$html,$match)){
			$this->error = "Descargavideos.tv no puede acceder al vídeo debido a un geobloqueo. No se puede encontrar ninguna URL para descargar el vídeo.";
			return false;
		}

		//dbug_r($match);
		
		$fmt_url=urldecode($match[1]);
		$fmt_url = preg_replace('/codecs="(.*?)"/','codecs=""',$fmt_url);
		dbug($fmt_url);
		$urls=explode(',',$fmt_url);
		
		
		
		if(preg_match('/"adaptive_fmts":[ \t\r\n]*"(.[^"]*?)"/i',$html,$match)){
			$fmt_url2=urldecode($match[1]);
			$fmt_url2 = preg_replace('/codecs="(.*?)"/','codecs=""',$fmt_url2);
			dbug($fmt_url2);
			$urls=array_merge($urls, explode(',',$fmt_url2));
		}
		
		
		$foundArray = array();

		foreach($urls as $url){
			$url .= "\\u0026";
			if(preg_match('/itag=([0-9]+)\\\\u0026/',$url,$tm) && preg_match('/sig?=(.*?)\\\\u0026/',$url,$si) && preg_match('/url=(.*?)\\\\u0026/',$url,$um)){
				$u=urldecode($um[1]);
				$foundArray[$tm[1]]=$u.'&signature='.$si[1];
			}
			elseif(preg_match('/itag=([0-9]+)\\\\u0026/',$url,$tm) && preg_match('/(\\\\u0026|^)s=(.*?)\\\\u0026/',$url,$si) && preg_match('/url=(.*?)\\\\u0026/',$url,$um)){
				$u=urldecode($um[1]);
				if(enString($si[2], '=') || strlen($si[2]) < 30){
					dbug('variable s incorrecta');
					return false;
				}
				$signature = $this->de_cipher_yt($html, $si[2]);
				$foundArray[$tm[1]]=$u.'&signature='.$signature;
			}
			elseif(preg_match('/itag=([0-9]+)\\\\u0026/',$url,$tm) && preg_match('/url=(.*?)\\\\u0026/',$url,$um)){
				$u=urldecode($um[1]);
				$foundArray[$tm[1]]=$u;
			}
		}
		
		$typeMap = array();
		
		$typeMap[38] = array("38",	"MP4",	"3072p", "(4096x2030)",	"2D",	"ACC");
		$typeMap[45] = array("46",	"WEBM",	"1080p", "(1920x1080)",	"2D",	"Vorbis");
		$typeMap[37] = array("37",	"MP4",	"1080p", "(1920x1080)",	"2D",	"ACC");
		$typeMap[22] = array("22",	"MP4",	"720p",  "(1280x720)",	"2D",	"ACC");
		$typeMap[45] = array("45",	"WEBM",	"720p",  "(1280x720)",	"2D",	"Vorbis");
		$typeMap[35] = array("35",	"FLV",	"480p",  "(854x480)",	"2D",	"ACC");
		$typeMap[44] = array("44",	"WEBM",	"480p",  "(854x480)",	"2D",	"Vorbis");
		$typeMap[34] = array("34",	"FLV",	"360p",  "(640x360)",	"2D",	"ACC");
		$typeMap[43] = array("43",	"WEBM",	"360p",  "(640x360)",	"2D",	"Vorbis");
		$typeMap[18] = array("18",	"MP4",	"360p",  "(480x360)",	"2D",	"ACC");
		$typeMap[6]  = array("6",	"FLV",	"270p",  "(640x360)",	"2D",	"MP3");
		$typeMap[5]  = array("5",	"FLV",	"240p",  "(400x226)",	"2D",	"MP3");
		$typeMap[36] = array("36",	"3GP",	"240p",  "(320x240)",	"2D",	"ACC");
		$typeMap[17] = array("17",	"3GP",	"144p",  "(176x144)",	"2D",	"ACC");
		$typeMap[13] = array("13",	"3GP",	"-144p", "(***x***)",	"2D",	"---");
		//3D
		$typeMap[84] = array("84",	"MP4",	"720p",  "(1280x720)",	"3D",	"ACC");
		$typeMap[102]= array("102",	"WebM",	"720p",  "(1280x720)",	"3D",	"Vorbis");
		$typeMap[85] = array("85",	"MP4",	"520p",  "(960x540)",	"3D",	"ACC");
		$typeMap[101]= array("101",	"WebM",	"360p",  "(640x360)",	"3D",	"Vorbis");
		$typeMap[100]= array("100",	"WebM",	"360p",  "(640x360)",	"3D",	"Vorbis");
		$typeMap[82] = array("82",	"MP4",	"360p",  "(480x360)",	"3D",	"ACC");
		$typeMap[83] = array("83",	"MP4",	"240p",  "(320x240)",	"3D",	"ACC");

		//adaptive_fmts. Las calidades más altas de vídeo están aquí en lugar de en el otro listado.
		$typeMap[171]= array("171",	"WebM (Audio solo)",	"Audio",   "Audio",		"2D",	"OGG");
		
		$typeMap[137]= array("137",	"WebM (Video solo)",	"1080p", "(1920x1080)",	"2D",	"---");
		$typeMap[247]= array("247",	"WebM (Video solo)",	"720p",  "(1280x720)",	"2D",	"---");
		$typeMap[244]= array("244",	"WebM (Video solo)",	"480p",  "(854x480)",	"2D",	"---");
		$typeMap[243]= array("243",	"WebM (Video solo)",	"360p",  "(640x360)",	"2D",	"---");
		$typeMap[242]= array("242",	"WebM (Video solo)",	"240p",  "(400x226)",	"2D",	"---");
		
		
		$videos=array();

		if(!isset($_GET['testing'])){
			foreach($typeMap as $format => $meta){
				if(isset($foundArray[$format])){
					$videos[] = array(
						'ext' => $meta[1],
						'p' => $meta[2],
						'axb' => $meta[3],
						'2D-3D' => $meta[4],
						'audio' => $meta[5],
						'url' => $foundArray[$format]
					);
				}
			}
		}
		else{
			foreach($foundArray as $format=>$url){
				$videos[] = array(
					'ext' => $format,
					'p' => '',
					'axb' => '',
					'2D-3D' => '',
					'audio' => '',
					'url' => $url
				);
			}
		}
		
		return $videos;
	}

	function de_cipher_yt($html, $si){
		//dbug('$si = '.$si);
		$js_decipher = 'http://s.ytimg.com/yts/jsbin/html5player-'.strtr(entre1y2($html, 'html5player-','"'), array('\\'=>''));
		//$js_decipher = 'http://s.ytimg.com/yts/jsbin/html5player-'.$this->CIPHER_TEST[0].'.js';
		dbug('$js_decipher = '.$js_decipher);
		$js_decipher_contenido = CargaWebCurl($js_decipher);
		// El contenido de $js_decipher_contenido es demasiado grande para imprimirlo, por no tengo idea qué razón
		
		$js_decipher_contenido = strtr($js_decipher_contenido, array("\n"=>''));
		$expr = '@([a-zA-Z])=[a-zA-Z\.]+?\.split\(""\).*?\}+@';
		preg_match($expr, $js_decipher_contenido, $matches, PREG_OFFSET_CAPTURE);
		dbug_r($matches);
		
		if(count($matches) > 0){
		$var = $matches[1][0];
		dbug('$var='.$var);
		
		$instrucciones_raw = $matches[0][0].';';
		
		// Identificar funciones. Ver si están cerca.
		$txt_cerca = substr($js_decipher_contenido, $matches[0][1]-500, 500);
		dbug($txt_cerca);
		
		$funciones = array();
		$expr = '@([a-zA-Z][a-zA-Z0-9]{1,3})[:=]function\(.*?\){(.+?)}@';
		preg_match_all($expr, $txt_cerca, $m);
		dbug('$m');
		dbug_r($m);
		for($i = 0, $i_t = count($m[0]); $i < $i_t; $i++){
			if(strpos($m[2][$i], 'lice') !== false){
				$funciones[$m[1][$i]] = 'slice';
			}
			elseif(strpos($m[2][$i], 'reverse') !== false){
				$funciones[$m[1][$i]] = 'reverse';
			}
			elseif(strpos($m[2][$i], 'var c=a[0];a[0]=a[b%a.length];a[b]=c') !== false){
				$funciones[$m[1][$i]] = 'switch';
			}
		}
		
		dbug_r($funciones);
		
		
		
		
		preg_match_all('@(.*?)(,'.$var.'|;)@', $instrucciones_raw, $matches);
		//dbug_r($matches);
		
		foreach($matches[1] as $orden){
			dbug($orden);
			if(enString($orden,'split'))
				continue;
			
			foreach($funciones as $o=>$f){
				if(strpos($orden, $o) !== false){
					switch ($f) {
						case 'slice':
							preg_match('@\(.*?(\d+)@', $orden, $n);
							$this->y_slice($si, $n[1]);
							break;
						case 'reverse':
							$this->y_reverse($si);
							break;
						case 'switch':
							preg_match('@\(.*?(\d+)@', $orden, $n);
							$this->y_switch($si, $n[1]);
							break;
						default:
							
							break;
					}
					continue 2;
				}
			}
			
			if(enString($orden,'slice')){
				$this->y_slice($si, intval(entre1y2($orden, '(',')')));
				continue;
			}
			elseif(preg_match('@\('.$var.',(\d+?)\)@', $orden, $res)){
				$this->y_switch($si, $res[1]);
				continue;
			}
			elseif(preg_match('@\[(\d+?)%'.$var.'.length\]@', $orden, $res)){
				dbug('switch sin función: '.$b);
				$this->y_switch($si, $res[1]);
				continue;
			}
			elseif(enString($orden, 'reverse')){
				$this->y_reverse($si);
				continue;
			}
		}
		
		return $si;
		}
		return false;
	}


	// http://www.jwz.org/hacks/youtubedown

	function y_slice(&$si, $b){
		dbug('s(p)lice: '.$b);
		dbug($si);
		$si = substr($si, $b);
		dbug($si);
	}
	function y_switch(&$si, $b){
		dbug('switch: '.$b);
		dbug($si);
		$this->y_swapLetters($si,$b);
		dbug($si);
	}
	function y_reverse(&$si){
		dbug('reverse');
		dbug($si);
		$si = strrev($si);
		dbug($si);
	}
	
	function y_swapLetters(&$a, $b){
		$c=$a[0];
		$a[0]=$a[$b % strlen($a)];
		$a[$b]=$c;
	}
}