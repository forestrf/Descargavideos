<?php

include_once 'definiciones.php';

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
	define('ERROR_TRACK_NAME', $error);
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

function extraeExtension($de=''){
	if (preg_match('#\.(mp4|m4v|mp3|ogg|flv|f4v|m3u8?|mpe?g|gifv?|mov|avi|webm|wmv)#i', $de, $matches)) {
		return $matches[1];
	} else return 'mp4';
}

function generaNombreWindowsValido($filename, $max = 50){
	if (mb_strlen($filename, 'UTF-8') > $max) $filename = mb_substr($filename, 0, $max, 'UTF-8') . '... ';
	$bad = array_merge(
		array_map('chr',range(0, 31)),
		array('<','>',':','"','/','\\','|','?','*')
	);
	return str_replace($bad, '', $filename);
}

function limpiaTitulo($titulo, $max = 200){
	if (mb_strlen($titulo, 'UTF-8') > $max)
		$titulo = mb_substr($titulo, 0, $max, 'UTF-8').'...';
	return trim(strtr($titulo, array('%27'=>'', '*'=>'',"'"=>'')));
}

function strposF($donde, $que, $desde = 0){
	return strpos($donde, $que, $desde) + strlen($que);
}
function strrposF($donde, $que, $desde = 0){
	return strrpos($donde, $que, $desde) + strlen($que);
}

function entre1y2_a(&$que, $desfaseInicio, $start, $fin = null){
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

function desde1a2_a(&$que, $desfaseInicio, $start, $fin = null, $incluyeFinal = false){
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
	foreach ($arr_substrs as &$word)
		if (enString($donde, $word))
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

	$url = preg_replace_callback('/[^ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789\-._~:\/?#[]@!$&\'()*+,;=`]/', 'urlencode_noAscii', $url);
	//dbug('Comprobando URL (2) => '.$url);
	
	
	$t = CargaWebCurl($url, '', true, '', array(), false); // Why not resolve automatically? because some webs return a wrong location: header and the url makes CURL fail
	
	if($t === false) {
		dbug('problema al descargar la url');
		dbug('Curl error "'.curl_error($ch).'" code "'.curl_errno($ch).'" http status "'.$z.'"');
		return false;
	}
	
	$GLOBALS['web_descargada'] = &$t;
	
	$web_descargada_headers = explode("\r\n", substr($t, 0, strpos($t, "\r\n\r\n")));
	
	$GLOBALS['web_descargada_headers'] = &$web_descargada_headers;
	
	
	$z=intval(substr($web_descargada_headers[0], strpos($web_descargada_headers[0], " ") + 1, 3));
	if ($z >= 300 && $z <= 308) {
		dbug("Buscando location");
		for ($i = 0, $l = count($web_descargada_headers); $i < $l; $i++) {
			if (preg_match('@location: (.*)@i', $web_descargada_headers[$i], $matches)) {
				dbug("Location encontrado: {$matches[1]}");
				$url = $matches[1];
				return url_exists_full($url, $preg_match_prerealizado, $timeout);
			}
		}
	}
	
	if(!enString(strtolower($t), 'content-type: text')){
		dbug('Petición indica mimetype DISTINTO a text');
		return false;
	}
	
	dbug('Petición indica mimetype text');
	
	dbug_r($web_descargada_headers);
	
	dbug('Response code (200, 301, 404, etc...): '.$z);
	
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


function dbug_log($name) {
	if (!defined('DEBUG_2_FILE')) {
		define('DEBUG_2_FILE', 'logs_saved/'.$name.' - '.time().'.log');
		if (!file_exists('logs_saved/')) {
			mkdir('logs_saved/', 0777);
		}
		dbug("saving debug to file: ".DEBUG_2_FILE);
	}
}

function dbug($msg){
	if(defined('DEBUG'))
		echo $msg."<br/>\r\n";
	if(defined('DEBUG_2_FILE'))
		file_put_contents(DEBUG_2_FILE, $msg."<br/>\r\n", FILE_APPEND);
	return true;
}

function dbug_(&$msg){
	if(defined('DEBUG'))
		echo $msg."<br/>\r\n";
	if(defined('DEBUG_2_FILE'))
		file_put_contents(DEBUG_2_FILE, $msg."<br/>\r\n", FILE_APPEND);
	return true;
}

function dbug_r(&$arr){
	if(defined('DEBUG'))
		print_r($arr);
	if(defined('DEBUG_2_FILE'))
		file_put_contents(DEBUG_2_FILE, var_export($arr, true), FILE_APPEND);
	return true;
}

function dbug_exit(){
	if(defined('DEBUG')) exit;
}

function in_array_part($needle, &$haystack) {
	foreach ($haystack as $elem)
		if (enString($elem,$needle))
			return true;
	return false;
}

//url, contenido post a enviar, retornar cabecera, cabecera custom
function CargaWebCurl($url,$post='',$cabecera=0,$cookie='',$cabeceras=array(),$sigueLocation=true,$esquivarCache=false,$customIp=false){
	if (strpos($url, '//') === 0)
		$url = 'http:' . $url;
	
	// Browser headers
	if (!in_array_part('User-Agent:', $cabeceras))      $cabeceras[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/116.0';
	if (!in_array_part('Accept:', $cabeceras))          $cabeceras[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
	if (!in_array_part('Accept-Language:', $cabeceras)) $cabeceras[] = 'Accept-Language: es-ES,es;en-US,en;q=0.5';
	if (!in_array_part('Accept-Encoding:', $cabeceras)) $cabeceras[] = 'Accept-Encoding: gzip, deflate';
	if (!in_array_part('DNT:', $cabeceras))             $cabeceras[] = 'DNT: 1'; // Do Not Track
	if (!in_array_part('Connection:', $cabeceras))      $cabeceras[] = 'Connection: close';
	
	
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
	
	dbug_r($cabeceras);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $cabeceras);
	
	// https
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	
	// force ipv4
	if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	}
	
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
	if (!isset($listado_web_curl_obtenidas)) return '';
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
	'http://192.168.191.35:8084/'
	/*
	'https://dvidhelper.webcindario.com/'
	'http://descvid.webcindario.com/'
	,'http://vddvd.webcindario.com/'
	,'http://jorll.webcindario.com/'
	,'http://omgrolff.webcindario.com/'
	,'http://descv.webcindario.com/'
	*/
);

function CargaWebCurlProxy($web,$pais='ESP',$post='',$cabeceras=array()){
	global $cargawebcurl_proxyarray;
	$redir='';
	
	// http://teleport.to
	// http://www.publicproxyservers.com/proxy/list1.html
	
	dbug('cargando web (Proxy): '.$web);
	
	switch ($pais) {
	case 'ES':
	case 'ESP':
		$rand = rand(0, count($cargawebcurl_proxyarray) - 1);
		$redir          = $cargawebcurl_proxyarray[$rand] . 'redir.php?a=';
		break;
	case 'MX':
		// proxy domain hidden to prevent searching of sourcecode
		// http://phptester.net/
		/*
		echo '$domain = "";'
		. 'foreach (array('
		. implode(',', array_map(
			function($t) { return ord($t);},
			str_split("some string")))
		. ') as $num) $domain .= chr($num);';
		*/
		$domain = ""; foreach (array(112,114,111,120,105,116,101,46,110,101,116) as $num) $domain .= chr($num);
		return CargaWebCurl('http://'.$domain.'/browse.php?u='.urlencode($web).'&b=4&f=norefer', '', false, '', array_merge($cabeceras, array('Referer: http://proxite.net/')));
		//return CargaWebCurl('http://server.proxymexico.com/includes/process.php?action=update', 'u='.urlencode($web).($post!==''?('&'.$post):''), false, '', array_merge($cabeceras, array('Referer: http://proxymexico.com/')));
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
	if($retfull === '' || !$retfull || enString($retfull,'solicitada no existe') || enString($retfull,'class="error_404"') || enString($retfull,'Page Not Found')){
		$retfull=CargaWebCurl($web,$post,0,'',$cabeceras);
	}
	
	return $retfull;
}

function enString($cual,$que,$desde=0){
	return strpos($cual,$que,$desde)!==false;
}

function startsWith($haystack, $needle) {
	$length = strlen($needle);
	return substr($haystack, 0, $length) === $needle;
}

function endsWith($haystack, $needle) {
	$length = strlen($needle);
	if (!$length) {
		return true;
	}
	return substr($haystack, -$length) === $needle;
}

function limpiaCDATAXML($que){
	return strtr($que,array('<![CDATA['=>'',']]>'=>''));
}

//$order has to be either asc or desc
 function sortmulti($array,$index,$order,$natsort=FALSE,$case_sensitive=FALSE) {
	if(is_array($array)&&count($array)>0){
		foreach(array_keys($array)as $key)
			if (isset($array[$key][$index]))
				$temp[$key]=$array[$key][$index];
			else {
				dbug('index "' . $index . '" not found at key "' . $key . '". The element was:');
				dbug_r($array[$key]);
				$temp[$key]=0;
			}
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

function CheckIfDEV($msgIfNotDev = 'No soportado') {
	if (!stringContains($_SERVER['SERVER_NAME'], array('localhost', 'dev.descargavideos.tv'))) {
		setErrorWebIntera($msgIfNotDev);
		return false;
	}
	return true;
}

function TVButton($R_ID, $video, $ext = "mp4", $img = "") {
	return '<form method="post" target="_blank" action="/player/" style="display:inline">'.
		'<input type="hidden" id="id'.$R_ID.'TVURL" name="video" value="'.htmlentities($video).'">'.
		'<input type="hidden" id="id'.$R_ID.'TVEXT" name="ext" value="'.htmlentities($ext).'">'.
		'<input type="hidden" id="id'.$R_ID.'TVIMG" name="img" value="'.htmlentities($img).'">'.
		'<input type="submit" value="Ver online" class="TV">'.
	'</form>';
}

?>