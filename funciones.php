<?php
// Los proxys de este listado deben respetar los header enviados por DV (ejem: Si DV envñia user-agent movil, el proxy usa ese user agent en la llamada que haga).
function listado_proxys(){
	global $listado_proxys_array;
	if($listado_proxys_array === null){
		$listado_proxys_array = array(
			array(
				'dominio'=>'webproxy.net',
				'pais'=>'',
				'proxy'=>'https://webproxy.net/view?q='
			)
		);
	}
	return $listado_proxys_array;
}

//comprobar que es una url y que es de un vídeo/audio.
function esVideoAudioAnon($enlace){
	if(!preg_match('@^https?://(([^/^\.]+\.)+?[^/^\.]+?)(/.*)?$@i',$enlace))
		return false;
	elseif(stringContains($enlace,array(' ','<','>')))
		return false;
	elseif(stringContains($enlace,array('.mp4','.mp3','.wmv','.avi','.f4v','.flv','.mov','.3gp','.3g2','.aac','.m4a','.ogv','.ogg')))
		return true;
	return false;
}

// No se puede hacer varios resultados a la vez, entre otras razones, por que esta función es llamada dentro de cadenas
function setErrorWebIntera($error = 'A ocurrido un error'){
	global $fallourlinterna;
	$fallourlinterna = $error;
	if(defined('DEBUG')){
		dbug('----------------------------------');
		dbug('ERROR: '.$fallourlinterna);
		exit;
	}
}

function comienzaPor($que,$por){
	return strpos($que,$por)===0;
}


//remplazar en donde, desde(num o string) (buscar desde i1) hasta(num o string), por
function ReemplazaDeAPor($donde, $desde, $i1, $hasta, $por){
	if(is_int($desde))
		$p = $desde;
	else
		$p=strpos($donde,$desde,$i1);
	if(is_int($hasta))
		$f=$hasta;
	else
		$f=strposF($donde, $hasta, $p);
	$extracto=substr($donde, $p, $f-$p);
	dbug('recortado desde '.$p.' hasta '.$f);
	return strtr($donde,array($extracto=>$por));
}

function extraeExtension($de='', $separador='.'){
	$p = strrpos($de, '/')+1;
	$ext = substr($de, $p, strlen($de)-$p);
	if(enString($ext, $separador)){
		$p = strpos($ext, $separador)+1;
		$ext = substr($ext, $p, strlen($ext) -$p);
		if(enString($ext,'?'))
			$ext = substr($ext, 0, strpos($ext, '?'));
	}
	if($ext=='m4v')
		$ext = 'mp4';
	return $ext;
}

function generaNombreWindowsValido($filename){
	$bad=array_merge(
		array_map('chr',range(0,31)),
		array('<','>',':','"','/','\\','|','?','*')
	);
	return str_replace($bad, '', $filename);
}

function limpiaTitulo($titulo, $max=200){
	if(strlen($titulo) > $max)
		$titulo = substr($titulo, 0, $max).'...';
	return strtr($titulo, array('%27'=>'', '*'=>'',"'"=>''));
}

function strposF($donde, $que, $desde=0){
	return strpos($donde, $que, $desde) +strlen($que);
}
function strrposF($donde, $que, $desde=0){
	return strrpos($donde, $que, $desde) +strlen($que);
}

function entre1y2_a($que, $desfaseInicio=0, $start, $fin){
	if(is_int($start))
		$p = $start;
	else
		$p = strposF($que, $start, $desfaseInicio);
	if(is_int($fin))
		$f = $fin;
	else
		$f = strpos($que, $fin, $p);
	return substr($que, $p, $f-$p);
}
function entre1y2($que, $start, $fin){
	return entre1y2_a($que,0,$start,$fin);
}

function stringContains($donde, $que){
	for($i=0; $i<$i_t=count($que); $i++)
		if(enString($donde,$que[$i]))
			return true;
	return false;
}



function urlencode_noAscii($c){
	return urlencode($c[0]);
}

//Aquí se rellena web_descargada. también se corrige $url en caso de ser corregible.
function url_exists_full(&$url, $preg_match_prerealizado = false){
	dbug('Comprobando URL => '.$url);
	if(!$preg_match_prerealizado){
		if(!preg_match('@^https?://(([^/^\.]+\.)+?[^/^\.]+?)(/.*)?$@i',$url)){
			return false;
		}
	}

	$url = preg_replace_callback('/[^(\x20-\x7F)]/', 'urlencode_noAscii', $url);
	
	$context =
		array('http'=>
			array(
				'method' => 'GET',
				'header' => "User-agent: Mozilla/5.0 (Windows NT 6.1; rv:11.0) Gecko/20100101 Firefox/11.0\r\n".
							"Connection: close\r\n".
							"Accept-Language: es-ES,es;en-US;en\r\n".
							"Accept: text/html,application/xhtml+xml,application/xml\r\n".
							"Accept-Encoding: gzip\r\n",
				'timeout' => 15,
				'follow_location' => true,
				'ignore_errors' => '1' /*,
				'ssl' => array(
					'verify_peer' => false
				)*/
			)
		);
	$preContext = $context;
	$preContext['http']['method'] = 'HEAD';

	$context = stream_context_create($context);
	$preContext = stream_context_create($preContext);
	
	if(file_get_contents($url, false, $preContext) === false){
		dbug_r($http_response_header);
		dbug('problema al descargar la url');
		return false;
	}
	
	$content_type_valido = false;
	foreach($http_response_header as $header){
		if(enString(strtolower($header), 'content-type: text')){
			$content_type_valido = true;
			continue;
		}
	}
	if(!$content_type_valido){
		dbug('Petición HEAD indica mimetype DISTINTO a text');
		return false;
	}
	dbug('Petición HEAD indica mimetype text');
	

	global $web_descargada, $web_descargada_headers;
	if(($web_descargada = file_get_contents($url, false, $context)) === false){
		dbug_r($http_response_header);
		dbug('problema al descargar la url');
		return false;
	}
	
	if(in_array('Content-Encoding: deflate', $http_response_header)){
		dbug_r($http_response_header);
		dbug('web en formato deflate. Deflateando.');
		$web_descargada = gzuncompress($web_descargada);
	}
	
	if(in_array('Content-Encoding: gzip', $http_response_header)){
		dbug_r($http_response_header);
		dbug('web en formato gzip. De-gzip-eando.');
		$web_descargada = gzdecode($web_descargada);
	}
	
	$web_descargada = parsea_headers($http_response_header, $response_code).$web_descargada;
	$web_descargada_headers = $http_response_header;
	
	$z=intval($response_code);
	
	if(($z>=200 && $z<350) || $z===403 || $z===409 || $z===410 || $z===0)
		return true;
	
	return false;
}

function parsea_headers($http_response_header, &$responde_code){
	//print_r($http_response_header);
	$ultHTTP = 0;
	for($i=0; $i<$i_t=count($http_response_header); $i++){
		if(strpos($http_response_header[$i], 'HTTP/') === 0)
			$ultHTTP = $i;
	}
	$responde_code = substr($http_response_header[$ultHTTP], 9, 3);
	//echo $ultHTTP;
	$cadena = '';
	for($i=$ultHTTP; $i<$i_t; $i++){
		$cadena .= $http_response_header[$i]."\r\n";
	}
	$cadena.="\r\n";
	return $cadena;
}

function dbug($msg){
	if(defined('DEBUG'))
		echo $msg.'<br>
';
}

function dbug_(&$msg){
	if(defined('DEBUG'))
		echo $msg.'<br>
';
}

function dbug_r(&$arr){
	if(defined('DEBUG'))
		print_r($arr);
}

//url, contenido post a enviar, retornar cabecera, cabecera custom
function CargaWebCurl($url,$post='',$cabecera=0,$cookie='',$cabeceras=array(),$sigueLocation=true,$esquivarCache=false,$ignoraErrores = 0){
	dbug('cargando web ('.(CURL ? 'CURL as ' : 'file_get_contents as').' CURL):'.$url);
	if(!$esquivarCache){
		$t=carga_web_curl_obtenida($url,$post,$cookie,$cabeceras,$sigueLocation);
		if($t!=''){
			dbug('Web cargada anteriormente. Retornando web cacheada.');
			return $t;
		}
	}
	
	
	if(CURL){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, $cabecera ? 1 : 0);
		
		if($sigueLocation){
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		}
		
		if($cookie !== ''){
			curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		}
		
		$cabeceras[] = 'Accept-Encoding: gzip';
		$cabeceras[] = 'Connection: Connection';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $cabeceras);
		
		curl_setopt($ch, CURLOPT_ENCODING, '');
		
		if($post != ''){
			curl_setopt($ch, CURLOPT_POST, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			dbug('activando post en la actual curl');
		}
		
		$t = curl_exec($ch);
		
	} else {
		$context =
			array('http'=>
				array(
					'method' => 'GET',
					'header' => "User-agent: Mozilla/5.0 (Windows NT 6.1; rv:11.0) Gecko/20100101 Firefox/11.0\r\n".
								($cookie!=''?('Cookie: '.$cookie."\r\n"):'').
								(count($cabeceras)>0?(implode("\r\n", $cabeceras)."\r\n"):'').
								"Accept-Encoding: gzip\r\n".
								"Connection: close\r\n",
					'timeout' => 20,
					'follow_location' => $sigueLocation
				)
			);
		
		if($ignoraErrores == 1){
			$context['http']['ignore_errors'] = '1';
		}
		
		if($post!=''){
			$context['http']['method'] = 'POST';
			$context['http']['content'] = $post;
			dbug('activando post en la actual curl');
		}
		
		//Llamar URL
		$context = stream_context_create($context);
		if(($t = file_get_contents($url, false, $context)) === false){
			//Fallo, OJO
			return false;
		}
		
		if(in_array('Content-Encoding: deflate', $http_response_header)){
			dbug('web en formato deflate. Deflateando.');
			$t = gzuncompress($t);
		}
		
		if(in_array('Content-Encoding: gzip', $http_response_header)){
			dbug('web en formato gzip. De-gzip-eando.');
			$t = gzdecode($t);
		}
	
		if($cabecera!=0)
			$t = parsea_headers($http_response_header, $response_code).$t;
	}

	guarda_web_curl_obtenida($t,$url,$post,$cookie,$cabeceras,$sigueLocation);
	return $t;
}

//ESTO ES PARA NO VOLVER A DESCARGAR UNA MISMA URL.
function guarda_web_curl_obtenida($t='',$url='',$post='',$cookie='',$cabeceras=array(),$sigueLocation=true){
	global $listado_web_curl_obtenidas;
	$listado_web_curl_obtenidas[]=array(
		't'=>$t,
		'url'=>$url,
		'post'=>$post,
		'cookie'=>$cookie,
		'cabeceras'=>$cabeceras,
		'sigueLocation'=>$sigueLocation
	);
	dbug('Web agregada al caché. Total en caché: '.count($listado_web_curl_obtenidas));
}
function carga_web_curl_obtenida($url='',$post='',$cookie='',$cabeceras=array(),$sigueLocation=true){
	global $listado_web_curl_obtenidas;
	$total=count($listado_web_curl_obtenidas);
	dbug('Webs cargadas en caché: '.$total);
	for($i=0; $i<$total; $i++){
		$c=$listado_web_curl_obtenidas[$i];
		if(
			$c['url']==$url&&
			$c['post']==$post&&
			$c['cookie']==$cookie&&
			$c['cabeceras']==$cabeceras&&
			$c['sigueLocation']==$sigueLocation
		){
			return $c['t'];
		}
	}
	return '';
}

function CargaWebCurlProxy($web,$pais='ESP',$post='',$cabeceras=array()){
	$redir='';
	$actualizaredir='';
	
	if($pais=='ESP'){
		$rand = rand(1, 5);
		switch($rand){
			case 1:
				$redir='http://descvid.webcindario.com/redir.php?a=';
				$actualizaredir='http://descvid.webcindario.com/actualizar.php';
			break;
			
			case 2:
				$redir='http://vddvd.webcindario.com/redir.php?a=';
				$actualizaredir='http://vddvd.webcindario.com/actualizar.php';
			break;
			
			case 3:
				$redir='http://jorll.webcindario.com/redir.php?a=';
				$actualizaredir='http://jorll.webcindario.com/actualizar.php';
			break;
			
			case 4:
				$redir='http://omgrolff.webcindario.com/redir.php?a=';
				$actualizaredir='http://omgrolff.webcindario.com/actualizar.php';
			break;
			
			case 5:
				$redir='http://descv.webcindario.com/redir.php?a=';
				$actualizaredir='http://descv.webcindario.com/actualizar.php';
			break;
		}
	}
	
	elseif($pais=='aleatorio'){
		return CargaWebCurl($web,$post,0,'',$cabeceras);
	}
	
	dbug($redir);
	$cabecerasString = implode("\r\n",$cabeceras)."\r\n";
	
	$urlPreparada = $redir.urlencode($web).($post!=''?'&p='.urlencode(base64_encode($post)):'').(count($cabeceras)?'&h='.urlencode(base64_encode($cabecerasString)):'');
	dbug($urlPreparada);
	dbug('<a href="'.$urlPreparada.'">'.$urlPreparada.'</a>');

	$retfull=CargaWebCurl($urlPreparada);
	if(enString($retfull,'solicitada no existe') || enString($retfull,'class="error_404"') || enString($retfull,'Page Not Found')){
		dbug('actualizando redir...');
		CargaWebCurl($actualizaredir);
		$retfull=CargaWebCurl($urlPreparada,'',0,'',array(),true,true);
	}
	if($retfull === '' || !$retfull || enString($retfull,'solicitada no existe') || enString($retfull,'class="error_404"') || enString($retfull,'Page Not Found')){
		$retfull=CargaWebCurl($web,$post,0,'',$cabeceras);
	}
	
	return $retfull;
}

function enString($cual,$que,$desde=0){
	return strpos($cual,$que,$desde)!==false;
}

function limpiaCDATAXML($que){
	return strtr($que,array('<![CDATA['=>'',']]>'=>''));
}

//$order has to be either asc or desc
 function sortmulti($array,$index,$order,$natsort=FALSE,$case_sensitive=FALSE) {
	if(is_array($array)&&count($array)>0){
		foreach(array_keys($array)as $key)
		$temp[$key]=$array[$key][$index];
		if(!$natsort){
			if($order=='asc')
				asort($temp);
			else   
				arsort($temp);
		}
		else{
			if($case_sensitive===true)
				natsort($temp);
			else
				natcasesort($temp);
			if($order!='asc')
				$temp=array_reverse($temp,TRUE);
		}
		foreach(array_keys($temp)as $key)
			if(is_numeric($key))
				$sorted[]=$array[$key];
			else   
				$sorted[$key]=$array[$key];
		return $sorted;
	}
	return $sorted;
}


// Funciona de PM incluso en appengine
function jsonRemoveUnicodeSequences($struct){
	//return preg_replace("/\\\\u([a-f0-9]{4})/","iconv('UCS-4LE','UTF-8',pack('V',hexdec('U$1')))",$struct);
	return preg_replace_callback("/\\\\u([a-f0-9]{4})/", 'jsonRemoveUnicodeSequences2', $struct);
}

function jsonRemoveUnicodeSequences2($entrada){
	return json_decode('"\u'.$entrada[1].'"');
}


function plantillaInclude($cual){
	global $path_plantilla;
	return $path_plantilla.$cual;
}

// Copia de mysql_real_escape_string para uso sin conexión abierta
// http://es1.php.net/mysql_real_escape_string
function mysql_escape_mimic($inp) {
	if(is_array($inp))
		return array_map(__METHOD__, $inp);

	if(!empty($inp) && is_string($inp)) {
		return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
	}

	return $inp;
}

function decode_entities($text){
	$text= html_entity_decode($text,ENT_QUOTES,"ISO-8859-1"); #NOTE: UTF-8 does not work!
	$text= preg_replace_callback('/&#(\d+);/m',function($a){return chr($a[1]);},$text); #decimal notation
	$text= preg_replace_callback('/&#x([a-f0-9]+);/mi',function($a){return chr('0x'.$a[1]);},$text);  #hex notation
	return $text;
}

function genera_swf_object($swf, $id = 'descargador_archivos'){
	return '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="0" height="0" id="'.$id.'">'.
		'<param name="movie" value="'.$swf.'" />'.
		'<param name="quality" value="high" />'.
		'<param name="bgcolor" value="#000" />'.
		'<param name="allowScriptAccess" value="always" />'.
		//'<!--[if !IE]>-->'.
		'<embed src="'.$swf.'" quality="high" bgcolor="#000" '.
			'width="0" height="0" name="descargador_archivos" align="middle" '.
			'play="true" loop="true" quality="high" allowScriptAccess="always" '.
			'type="application/x-shockwave-flash" '.
			'pluginspage="http://www.macromedia.com/go/getflashplayer">'.
		'</embed>'.
		//'<!--<![endif]-->'.
	'</object>';
}

function htmlentities2($entrada){
	return strtr(htmlentities($entrada, ENT_QUOTES), array('%'=>'&#37;'));
}
?>