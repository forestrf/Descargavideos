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
		if(enString($ext,'#'))
			$ext = substr($ext, 0, strpos($ext, '#'));
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
	if(mb_strlen($titulo, 'UTF-8') > $max)
		$titulo = mb_substr($titulo, 0, $max, 'UTF-8').'...';
	return trim(strtr($titulo, array('%27'=>'', '*'=>'',"'"=>'')));
}

function strposF($donde, $que, $desde=0){
	return strpos($donde, $que, $desde) +strlen($que);
}
function strrposF($donde, $que, $desde=0){
	return strrpos($donde, $que, $desde) +strlen($que);
}

function entre1y2_a(&$que, $desfaseInicio=0, $start, $fin = null){
	if(is_int($start))
		$p = $start;
	else
		$p = strposF($que, $start, is_int($desfaseInicio) ? $desfaseInicio : strposF($que, $desfaseInicio));
	if ($fin === null)
		return substr($que, $p);
	if(is_int($fin))
		$f = $fin;
	else
		$f = strpos($que, $fin, $p);
	return substr($que, $p, $f-$p);
}
function entre1y2(&$que, $start, $fin = null){
	return entre1y2_a($que, 0, $start, $fin);
}

function desde1a2_a(&$que, $desfaseInicio=0, $start, $fin = null, $incluyeFinal = false){
	$t = entre1y2_a($que, $desfaseInicio, $start, $fin);
	if ($incluyeFinal && !is_int($fin))
		$t .= $fin;
	if(!is_int($start))
		return $start.$t;
	return $t;
}
function desde1a2(&$que, $start, $fin = null, $incluyeFinal = false){
	return desde1a2_a($que, 0, $start, $fin, $incluyeFinal);
}

function stringContains($donde, $arr_substrs){
	foreach($arr_substrs as $word)
		if(enString($donde, $word))
			return true;
	return false;
}



function urlencode_noAscii($c){
	return urlencode($c[0]);
}

//Aquí se rellena web_descargada. también se corrige $url en caso de ser corregible.
function url_exists_full(&$url, $preg_match_prerealizado = false, $timeout = 20){
	dbug('Comprobando URL => '.$url);
	if(!$preg_match_prerealizado){
		if(!preg_match('@^https?://(([^/^\.]+\.)+?[^/^\.]+?)(/.*)?$@i',$url)){
			return false;
		}
	}
	
	if(enString($url, 'eitb.tv')){
		$url = strtr($url, array('&'=>''));
	}

	$url = preg_replace_callback('/[^(\x20-\x7F)]/', 'urlencode_noAscii', $url);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	
	//CURLOPT_CONNECTTIMEOUT - The number of seconds to wait while trying to connect. Use 0 to wait indefinitely.
	//CURLOPT_TIMEOUT - The maximum number of seconds to allow cURL functions to execute.
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	
	// https
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	
	// auto decoding
	curl_setopt($ch, CURLOPT_ENCODING, '');
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		"User-agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0",
		"Connection: close",
		"Accept-Language: es-ES,es;en-US;en",
		"Accept: text/html,application/xhtml+xml,application/xml",
		"Accept-Encoding: gzip"
	));
	
	$t = curl_exec($ch);
	
	if($t === false){
		dbug('problema al descargar la url');
		dbug('Curl error: '.curl_error($ch));
		return false;
	}
	
	if(!enString(strtolower($t), 'content-type: text')){
		dbug('Petición indica mimetype DISTINTO a text');
		return false;
	}
	
	dbug('Petición indica mimetype text');
	
	$GLOBALS['web_descargada'] = &$t;
	
	$web_descargada_headers = explode("\r\n", substr($t, 0, strpos($t, "\r\n\r\n")));
	
	$GLOBALS['web_descargada_headers'] = &$web_descargada_headers;
	
	$z=intval(substr($web_descargada_headers[0], 9, 3));
	dbug('code response: '.$z);
	
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
		echo $msg."<br/>\r\n";
	return true;
}

function dbug_(&$msg){
	if(defined('DEBUG'))
		echo $msg."<br/>\r\n";
	return true;
}

function dbug_r(&$arr){
	if(defined('DEBUG'))
		print_r($arr);
	return true;
}

//url, contenido post a enviar, retornar cabecera, cabecera custom
function CargaWebCurl($url,$post='',$cabecera=0,$cookie='',$cabeceras=array(),$sigueLocation=true,$esquivarCache=false,$customIp=false){
	
	// Browser headers
	$cabeceras[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0';
	$cabeceras[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
	$cabeceras[] = 'Accept-Language: en-US,en;q=0.5';
	$cabeceras[] = 'Accept-Encoding: gzip, deflate';
	$cabeceras[] = 'DNT: 1'; // Do Not Track
	$cabeceras[] = 'Connection: Close';

	
	dbug('cargando web (CURL): '.$url);
	if(!$esquivarCache){
		$t=carga_web_curl_obtenida($url,$post,$cookie,$cabeceras,$sigueLocation);
		if($t!=''){
			dbug('Web cargada anteriormente. Retornando web cacheada.');
			return $t;
		}
	}
	
	$ch = curl_init();
	if ($customIp !== false) {
		$domain = getDomain($url);
		dbug("Using as Host: $domain");
		array_unshift($cabeceras, 'Host: '.$domain);
		$url = str_replace($domain, $customIp, $url);
		dbug("New url after ip change: $url");
	}
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, $cabecera ? 1 : 0);
	
	if($sigueLocation){
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEFILE, ""); // Esto es para que en las redirecciones use las cookies que salgan durante las redirecciones
	}
	
	if($cookie !== ''){
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	}
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, $cabeceras);
	
	// https
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	
	// auto decoding
	curl_setopt($ch, CURLOPT_ENCODING, '');
	
	if($post != ''){
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		dbug('activando post en la actual curl: ' . $post);
	}
	
	$t = curl_exec($ch);

	guarda_web_curl_obtenida($t,$url,$post,$cookie,$cabeceras,$sigueLocation);
	return $t;
}

function getDomain($url) {
	$parse = parse_url($url);
	return $parse['host'];
}


//ESTO ES PARA NO VOLVER A DESCARGAR UNA MISMA URL.
function guarda_web_curl_obtenida(&$t,$url='',$post='',$cookie='',$cabeceras=array(),$sigueLocation=true){
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
		$c=&$listado_web_curl_obtenidas[$i];
		if(
			$c['url']===$url&&
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

$cargawebcurl_proxyarray = array(
	'http://descvid.webcindario.com/'
	,'http://vddvd.webcindario.com/'
	,'http://jorll.webcindario.com/'
	,'http://omgrolff.webcindario.com/'
	,'http://descv.webcindario.com/'
);

function CargaWebCurlProxy($web,$pais='ESP',$post='',$cabeceras=array()){
	global $cargawebcurl_proxyarray;
	$redir='';
	$actualizaredir='';
	
	// http://teleport.to
	// http://www.publicproxyservers.com/proxy/list1.html
	
	dbug('cargando web (Proxy): '.$web);
	
	switch ($pais) {
	case 'ESP':
		$rand = rand(0, count($cargawebcurl_proxyarray) - 1);
		$redir          = $cargawebcurl_proxyarray[$rand] . 'redir.php?a=';
		$actualizaredir = $cargawebcurl_proxyarray[$rand] . 'actualizar.php';
		break;
	case 'MX':
		return CargaWebCurl('http://server.proxymexico.com/includes/process.php?action=update', 'u='.urlencode($web).($post!==''?('&'.$post):''), false, '', array_merge($cabeceras, array('Referer: http://proxymexico.com/')));
	case 'US':
		return CargaWebCurl('http://anonymouse.org/cgi-bin/anon-www.cgi/'.$web, $post, false, '', array_merge($cabeceras, array('Referer: http://anonymouse.org/anonwww.html')));
	default:
	case 'aleatorio':
		return CargaWebCurl($web,$post,0,'',$cabeceras);
	}
	
	dbug_($redir);
	$cabecerasString = implode("\r\n",$cabeceras)."\r\n";
	
	$urlPreparada = $redir.urlencode($web).($post!=''?'&p='.urlencode(base64_encode($post)):'').(count($cabeceras)?'&h='.urlencode(base64_encode($cabecerasString)):'');
	dbug_($urlPreparada);
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

function saveDownload($dominio, $url, $titulo){
	/*
	$db_filename = '../cpanel/ultimasdescargas.sqlite';
	if(!file_exists($db_filename)){
		file_put_contents($db_filename, '');
	}
	$db = new PDO('sqlite:'.$db_filename);

	$result = $db->query('SELECT * FROM descargas;');
	if($result === false){
		$db->query('CREATE TABLE descargas (ID INTEGER PRIMARY KEY AUTOINCREMENT, web STRING, titulo STRING, fecha DATETIME DEFAULT current_timestamp);');
	}

	$titulo = limpiaTitulo($titulo);
	$dominio = strtoupper(substr($dominio, 0, strpos($dominio, '.')));

	$db->query('INSERT INTO descargas (web, titulo) VALUES (\''.mysql_escape_mimic($url).'\', \''.mysql_escape_mimic($dominio.' - '.$titulo).'\');');

	$n = $db->query('SELECT `ID`, count(0) as `n` FROM descargas;')->fetchAll();
	$n = &$n[0];
	if(intval($n['n']) > MAX_ULTIMOS_VIDEOS_CALCULADOS){
		$db->query('DELETE FROM descargas WHERE `ID` <= '.($n['ID'] - MAX_ULTIMOS_VIDEOS_CALCULADOS ).';');
	}
	*/
}

function getDownloads(){
	/*
	$db = new PDO('sqlite:cpanel/ultimasdescargas.sqlite');

	return $db->query('SELECT * FROM descargas ORDER BY `ID` DESC;');
	*/
}

function comprobarPais(){
	require_once 'geoiploc.php';
	return getCountryFromIP($_SERVER['REMOTE_ADDR']);
}

function bm_scape($web) {
	return str_replace('"', '\"', $web);
}

function custom_hmac($data, $key, $hash_func='md5', $raw_output = false) {
	$hash_func = strtolower($hash_func);
	$pack = 'H'.strlen(hash($hash_func, 'test'));
	$size = 64;
	$opad = str_repeat(chr(0x5C), $size);
	$ipad = str_repeat(chr(0x36), $size);
	
	if (strlen($key) > $size)
		$key = str_pad(pack($pack, hash($hash_func, $key)), $size, chr(0x00));
	else
		$key = str_pad($key, $size, chr(0x00));
	
	
	for ($i = 0, $i_t = strlen($key) - 1; $i < $i_t; $i++) {
		$opad[$i] = $opad[$i] ^ $key[$i];
		$ipad[$i] = $ipad[$i] ^ $key[$i];
	}
	
	$output = hash($hash_func, $opad.pack($pack, hash($hash_func, $ipad.$data)));
	
	return ($raw_output) ? pack($pack, $output) : $output;
}
function b64d($encoded){
	$decoded="";
	$base64=strtr($encoded,'-_','+/');
	for($i=0;$i<ceil(strlen($base64)/64);$i++)
		$decoded.=base64_decode(substr($base64,$i*64,64));
	return $decoded;
}


?>