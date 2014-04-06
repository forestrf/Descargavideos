<?php
function esVideoAudio($enlace){
	global $web;
	//comprobar que es una url

	if(stringContains($enlace, array(/*" ",*/"<",">"))){
		//no es correcto
		//informar de fallo
		addError($web, "El enlace obtenido no era una url");
		return false;
	}
	else{
		//comprobar que la url contiene .mp4 .mp3 .wmv .avi .f4v .flv .mov .3gp .3g2 .aac .m4a .ogv .ogg
		if(stringContains($enlace, array(".mp4",".mp3",".wmv",".avi",".f4v",".flv",".mov",".3gp",".3g2",".aac",".m4a",".ogv",".ogg",".fll"))||strlen(strstr($enlace,'|'))>0){
			//es un enlace. todo correcto
			//informar de correcto
			dbug('agregado perfect');
			return true;
		}
		else{
			//informar de fallo
			addError($web, "El enlace obtenido era una URL, pero no la que se pretendia");
			return false;
		}
	}
}

//comprobar que es una url y que es de un vídeo/audio.
function esVideoAudioAnon($enlace){
	if(!preg_match('@^https?://(([^/^\.]+\.)+?[^/^\.]+?)(/.*)?$@i',$enlace))
		return false;
	elseif(stringContains($enlace,array(" ","<",">")))
		return false;
	elseif(stringContains($enlace,array(".mp4",".mp3",".wmv",".avi",".f4v",".flv",".mov",".3gp",".3g2",".aac",".m4a",".ogv",".ogg")))
		return true;
	return false;
}

// No se puede hacer varios resultados a la vez, entre otras razones, por que esta función es llamada dentro de cadenas
function setErrorWebIntera($error = "A ocurrido un error"){
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
	dbug("recortado desde ".$p." hasta ".$f);
	return strtr($donde,array($extracto=>$por));
}

function extraeExtension($de="", $separador="."){
	$p = strrpos($de, '/')+1;
	$ext = substr($de, $p, strlen($de)-$p);
	if(enString($ext, $separador)){
		$p = strpos($ext, $separador)+1;
		$ext = substr($ext, $p, strlen($ext) -$p);
		if(enString($ext,"?"))
			$ext = substr($ext, 0, strpos($ext, "?"));
	}
	if($ext=="m4v")
		$ext = "mp4";
	return $ext;
}

function generaNombreWindowsValido($filename){
	$bad=array_merge(
		array_map('chr',range(0,31)),
		array('<','>',':','"','/','\\','|','?','*')
	);
	return str_replace($bad, "", $filename);
}

function limpiaTitulo($titulo, $max=1000){
	if(strlen($titulo) > $max)
		$titulo = substr($titulo, 0, $max).'...';
	return strtr($titulo, array("%27"=>"", "*"=>"","'"=>""));
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
		array("http"=>
			array(
				"method" => "GET",
				"header" => "User-agent: Mozilla/5.0 (Windows NT 6.1; rv:11.0) Gecko/20100101 Firefox/11.0\r\n".
							"Connection: close\r\n".
							"Accept-Language: es-ES,es;en-US;en\r\n".
							"Accept: text/html,application/xhtml+xml,application/xml\r\n".
							"Accept-Encoding: gzip\r\n",
				"timeout" => 15,
				'follow_location' => true/*,
				"ssl" => array(
					"verify_peer" => false
				)*/
			)
		);
	$context = stream_context_create($context);
	
	

	global $web_descargada;
	if(($web_descargada = file_get_contents($url, false, $context)) === false){
		dbug_r($http_response_header);
		dbug('problema al descargar la url');
		return false;
	}
	
	if(in_array("Content-Encoding: deflate", $http_response_header)){
		dbug_r($http_response_header);
		dbug('web en formato deflate. Deflateando.');
		$web_descargada = gzuncompress($web_descargada);
	}
	
	if(in_array("Content-Encoding: gzip", $http_response_header)){
		dbug_r($http_response_header);
		dbug('web en formato gzip. De-gzip-eando.');
		$web_descargada = gzdecode($web_descargada);
	}
	
	$web_descargada = parsea_headers($http_response_header, $responde_code).$web_descargada;
	
	$z=intval($responde_code);
	
	if(($z>=200 && $z<350) || $z===409 || $z===410 || $z===0)
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
	if(defined("DEBUG"))
		echo $msg.'<br>
';
}

function dbug_r(&$arr){
	if(defined("DEBUG"))
		print_r($arr);
}

//url, contenido post a enviar, retornar cabecera, cabecera custom
function CargaWebCurl($url,$post="",$cabecera=0,$cookie="",$cabeceras=array(),$sigueLocation=true,$esquivarCache=false){
	dbug('cargando web (file_get_contents as CURL):'.$url);
	if(!$esquivarCache){
		$t=carga_web_curl_obtenida($url,$post,$cookie,$cabeceras,$sigueLocation);
		if($t!=""){
			dbug("Web cargada anteriormente. Retornando web cacheada.");
			return $t;
		}
	}
	$context =
		array("http"=>
			array(
				"method" => "GET",
				"header" => "User-agent: Mozilla/5.0 (Windows NT 6.1; rv:11.0) Gecko/20100101 Firefox/11.0\r\n".
							($cookie!=""?("Cookie: ".$cookie."\r\n"):'').
							(count($cabeceras)>0?(implode("\r\n", $cabeceras)."\r\n"):"").
							"Accept-Encoding: gzip\r\n",
				"timeout" => 20,
				'follow_location' => $sigueLocation
			)
		);
	
	if($post!=""){
		$context["http"]["method"] = "POST";
		$context["http"]["content"] = $post;
		dbug("activando post en la actual curl");
	}
	
	//Llamar URL
	$context = stream_context_create($context);
	if(($t = file_get_contents($url, false, $context)) === false){
		//Fallo, OJO
		return false;
	}
	
	if(in_array("Content-Encoding: deflate", $http_response_header)){
		dbug('web en formato deflate. Deflateando.');
		$t = gzuncompress($t);
	}
	
	if(in_array("Content-Encoding: gzip", $http_response_header)){
		dbug('web en formato gzip. De-gzip-eando.');
		$t = gzdecode($t);
	}
	
	if($cabecera!=0)
		$t = parsea_headers($http_response_header).$t;

	
	guarda_web_curl_obtenida($t,$url,$post,$cookie,$cabeceras,$sigueLocation);
	return $t;
}

//ESTO ES PARA NO VOLVER A DESCARGAR UNA MISMA URL.
function guarda_web_curl_obtenida($t="",$url="",$post="",$cookie="",$cabeceras=array(),$sigueLocation=true){
	global $listado_web_curl_obtenidas;
	$listado_web_curl_obtenidas[]=array(
		"t"=>$t,
		"url"=>$url,
		"post"=>$post,
		"cookie"=>$cookie,
		"cabeceras"=>$cabeceras,
		"sigueLocation"=>$sigueLocation
	);
	dbug("Web agregada al caché. Total en caché: ".count($listado_web_curl_obtenidas));
}
function carga_web_curl_obtenida($url="",$post="",$cookie="",$cabeceras=array(),$sigueLocation=true){
	global $listado_web_curl_obtenidas;
	$total=count($listado_web_curl_obtenidas);
	dbug("Webs cargadas en caché: ".$total);
	for($i=0; $i<$total; $i++){
		$c=$listado_web_curl_obtenidas[$i];
		if(
			$c["url"]==$url&&
			$c["post"]==$post&&
			$c["cookie"]==$cookie&&
			$c["cabeceras"]==$cabeceras&&
			$c["sigueLocation"]==$sigueLocation
		){
			return $c["t"];
		}
	}
	return "";
}

function CargaWebCurlProxy($web,$pais="ESP"){
	$redir='';
	$actualizaredir='';
	
	if($pais=="ESP"){
		$rand = rand(1, 5);
		switch($rand){
			case 1:
				$redir="http://descvid.webcindario.com/redir.php?a=";
				$actualizaredir="http://descvid.webcindario.com/actualizar.php";
			break;
			
			case 2:
				$redir="http://vddvd.webcindario.com/redir.php?a=";
				$actualizaredir="http://vddvd.webcindario.com/actualizar.php";
			break;
			
			case 3:
				$redir="http://jorll.webcindario.com/redir.php?a=";
				$actualizaredir="http://jorll.webcindario.com/actualizar.php";
			break;
			
			case 4:
				$redir="http://omgrolff.webcindario.com/redir.php?a=";
				$actualizaredir="http://omgrolff.webcindario.com/actualizar.php";
			break;
			
			case 5:
				$redir="http://descv.webcindario.com/redir.php?a=";
				$actualizaredir="http://descv.webcindario.com/actualizar.php";
			break;
		}
	}
	
	elseif($pais=="aleatorio"){
		$rand = rand(1, 5);
		switch($rand){
			case 1:
				$redir="http://grandenauer.hol.es/redir.php?a=";
				$actualizaredir="http://grandenauer.hol.es/actualizar.php";
			break;
			
			case 2:
				$redir="http://pphah.hol.es/redir.php?a=";
				$actualizaredir="http://pphah.hol.es/actualizar.php";
			break;
			
			case 3:
				$redir="http://aguaas.pusku.com/redir.php?a=";
				$actualizaredir="http://aguaas.pusku.com/actualizar.php";
			break;
			
			case 4:
				$redir="http://sebasa.besaba.com/redir.php?a=";
				$actualizaredir="http://sebasa.besaba.com/actualizar.php";
			break;
			
			case 5:
				$redir="http://ajofeifo.eu5.org/redir.php?a=";
				$actualizaredir="http://ajofeifo.eu5.org/actualizar.php";
			break;
		}
	}
	
	
	$retfull=CargaWebCurl($redir.urlencode($web));
	if(enString($retfull,"solicitada no existe") || enString($retfull,'class="error_404"') || enString($retfull,'Page Not Found')){
		dbug("actualizando redir...");
		CargaWebCurl($actualizaredir);
		$retfull=CargaWebCurl($redir.urlencode($web),"",0,"",array(),true,true);
	}
	if($retfull === "" || !$retfull || enString($retfull,"solicitada no existe") || enString($retfull,'class="error_404"') || enString($retfull,'Page Not Found')){
		$retfull=CargaWebCurl($web);
	}
	
	return $retfull;

}

function enString($cual,$que,$desde=0){
	return strpos($cual,$que,$desde)!==false;
}

function limpiaCDATAXML($que){
	return strtr($que,array("<![CDATA["=>"","]]>"=>""));
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
	return preg_replace_callback("/\\\\u([a-f0-9]{4})/", "jsonRemoveUnicodeSequences2", $struct);
}

function jsonRemoveUnicodeSequences2($entrada){
	return json_decode('"\u'.$entrada[1].'"');
}


function plantillaInclude($cual){
	global $path_plantilla;
	return $path_plantilla.$cual;
}
?>