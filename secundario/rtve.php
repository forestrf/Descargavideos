<?php

class Rtve extends cadena{

function calcula(){
dbug('empezando RTVE');

/*
// Hay vídeos que funcionan y a pesar de ello incluyen esta línea dentro de <noscript>. Por tanto no se puede usar
if (enString($this->web_descargada, 'css/alacarta20/i/imgError/video.png')) {
	setErrorWebIntera('El vídeo ya no está disponible debido a restricciones de derechos o no se puede encontrar ahora mismo.<br/>En ocasiones RTVE falla durante varios minutos, si ese es el caso por favor inténtelo de nuevo más tarde');
	return;
}
*/

// http://hlsvod.lvlt.rtve.es/resources/TE_NGVA//data/nfs/video/tomcat/cms/resources/mp4/1/1/1296036164211.mp4/playlist.m3u8
// http://mvod.lvlt.rtve.es/resources/TE_NGVA//data/nfs/video/tomcat/cms/resources/mp4/1/1/1296036164211.mp4

//si no se pone / al final de un enlace que lo necesita, se arma parda. aplicar la / en caso de que se necesite.
/*$p=strrpos($this->web,"/");
if($p!=strlen($this->web)-1){
	$analisis=substr($this->web,$p);
	if(!enString($analisis,"."))
		$this->web.='/';
}*/

if (enString($this->web_descargada, 'Sorry, but the page you\'re trying to view is not available, either because its URL has changed or it doesn\'t exist anymore.')) {
	setErrorWebIntera('La página solicitada no está disponible por haber cambiado la dirección (URL) o no existir.');
	return;
}

//modo audio
//modo infantil
//modo alacarta
if(enString($this->web, '/audios/')){
	dbug('modo audio');
	//$retfull=CargaWebCurl($this->web);
	$audio=1;
}
elseif(enString($this->web, '/infantil/')){
	dbug('modo infantil');
	
	if(strposF($this->web, '/todos')+2 > strlen($this->web) || !strpos($this->web, '/', strposF($this->web, '/todos')+2)){
		$web2 = strtr($this->web, array('/#'=>''));
		$enlaceInfantil = substr($web2, strpos($web2, '/infantil/'));
		dbug('$enlaceInfantil = '.$enlaceInfantil);
		if(enString($this->web_descargada, $enlaceInfantil)){
			preg_match('@(TE_[A-Z]+).*?'.$enlaceInfantil.'@', $this->web_descargada, $matches);
			dbug_r($matches);
			$pre_asset=$matches[1];
			dbug('pre_asset='.$pre_asset);
			
			$pre_asset = 'http://www.rtve.es/infantil/components/'.$pre_asset.'/videos/videos-1.inc';
			$pre_asset = CargaWebCurl($pre_asset);
			preg_match('@/([0-9]+?)/@', $pre_asset, $matches);
			dbug_r($matches);
			$asset = $matches[1];
			dbug('asset='.$asset);
			/*
			$titulo = entre1y2($pre_asset, 'title="', '"');
			dbug('$titulo='.$titulo);
			$imagen = entre1y2($pre_asset, '<img src="', '"');
			dbug('$imagen='.$imagen);
			*/
		}
	}
	else{
		$p=strrposF($this->web,"/",strrposF($this->web,"/")-2-strlen($this->web));
		$f=strpos($this->web,"/",$p);
		$asset=substr($this->web,$p,$f-$p);
		dbug('asset='.$asset);
		
		if(!is_numeric($asset)){
			$preIDURL=entre1y2($this->web_descargada,"/#/",'"');
			dbug('preIDURL='.$preIDURL);
			$p=strpos($preIDURL,"/",strlen($preIDURL)-12);
			$asset=entre1y2_a($preIDURL,$p,"/","/");
			dbug('asset='.$asset);
		}
		
		if(!is_numeric($asset)){
			$asset = $this->encuentraAssetEnContenido($this->web_descargada);
		}
	}
	
}
else{
	dbug('modo normal');
	
	//assetID=974036_
	$asset = $this->encuentraAssetEnContenido($this->web_descargada);
}

$obtenido = array(
	'enlaces' => array()
);

//audio
if(isset($audio)){
	dbug('audio');

	//file:'/resources/TE_SENTREN/mp3/0/3/1329728190030.mp3'

	//obtener url (boton descargar en pagina)
	$p = strpos($this->web_descargada,'class="download"');
	$ret = entre1y2_a($this->web_descargada, $p, 'href="', '"');
	if (!enString($ret, '://') || $ret[0] === '/'){
		$ret = 'http://www.rtve.es'.$ret;
	}


	if (enString($ret, '.mp3')) {
		dbug('El mp3 estaba en la web: ' . $ret);

		$obtenido['enlaces'][] = array(
			'url'     => $ret,
			'tipo'    => 'http',
			'url_txt' => 'Descargar'
		);
	}
	else {
		dbug('Toca sacar el audio por metodo nuevo');

		//$ret=assetdataid
		$asset = entre1y2($this->web_descargada, 'data-assetID="', '_');
		$links = $this->convierteID($asset, array('audio', 'video'));
		if($links === false)
			return;
		$this->AddLinksFromConvierteID($links, $obtenido['enlaces']);
	}
}
//video
else {
	if ($asset == '') {
		setErrorWebIntera('No se puede encontrar la id de ningún vídeo. Esto puede pasar porque no hay un vídeo en la web introducida, el vídeo que hay ya no está disponible o rara vez aleatoriamente por culpa de rtve');
		return;
	}
	$links = $this->convierteID($asset);
	if($links === false)
		return;
	$this->AddLinksFromConvierteID($links, $obtenido['enlaces']);
}

if (isset($asset)) {
	//titulo
	$opciones = array("videos", "audios");
	$sigue = 0;
	
	$opciones_length = count($opciones);
	for ($i = 0; $i < $opciones_length && !$sigue; $i++) {
		$urlmedia = 'http://www.rtve.es/api/'.$opciones[$i].'/'.$asset.'/config/mmedia.json';
		dbug('urlmedia='.$urlmedia);
		$retmedia = CargaWebCurl($urlmedia);
		if (!enString($retmedia,"no existir") && !enString($retmedia, "Informe de Error") && strlen($retmedia) > 0)
			$sigue=1;
	}
	if ($sigue) {
		$sustituir = array('\\"'=>"'");
		$retmedia = strtr($retmedia, $sustituir);
		$titulo = entre1y2($retmedia, '"title":"', '"');
		$titulo = limpiaTitulo($titulo);

		//imagen
		if (enString($retmedia, '"image":null')) {
			$imagen = 'http://'.DOMINIO.'/canales/rtve.png';
			dbug('imagen null');
		}
		else {
			$imagen=entre1y2($retmedia, '"image":"', '"');
		}
	}
	else {
		$titulo = "RTVE";
		$imagen = 'http://'.DOMINIO.'/canales/rtve.png';
	}
}
else {
	//titulo
	if (enString($this->web_descargada, '<meta name="audio_title" content="')) {
		$titulo = entre1y2($this->web_descargada, '<meta name="audio_title" content="', '"');
		$imagen = entre1y2($this->web_descargada, '<link rel="image_src" href="', '"');
	} else {
		$p=strpos($this->web_descargada,'class="header"');
		$p=strpos($this->web_descargada,'titu',$p);
		$titulo=entre1y2_a($this->web_descargada, $p, '>', '<');
		$titulo=limpiaTitulo($titulo);
		
		//imagen
		$p=strpos($this->web_descargada,'imgPrograma');
		$imagen=entre1y2_a($this->web_descargada, $p, 'src="', '"');
	}
}
dbug('titulo='.$titulo);
dbug('imagen='.$imagen);


$obtenido['titulo'] = $titulo;
$obtenido['imagen'] = $imagen;

if(isset($asset)){
	// Buscar subtítulos. Tienen extensión .vtt
	$subs = CargaWebCurl('http://www.rtve.es/api/videos/'.$asset.'/subtitulos.json');
	$subs = json_decode($subs, true);
	dbug_r($subs);
	if (isset($subs['page']['items'][0])) {
		foreach($subs['page']['items'] as $subtitle) {
			$obtenido['enlaces'][] = array(
				'url'     => $subtitle['src'],
				'tipo'    => 'srt',
				'url_txt' => 'Descargar subtítulos ('.$subtitle['lang'].')'
			);
		}
		dbug('Agregados subtítulos ('.$subtitle['lang'].')');
	}
}
if(isset($asset)){
	if (preg_match('@<div class=".+trasBox.+">@', $this->web_descargada)) {
		$obtenido['enlaces'][] = array(
			'url'     => 'http://' . DOMINIO . '/util/rtve-transcripcion-2-srt.php?rtveurl=' . urlencode($this->web),
			'tipo'    => 'srt',
			'url_txt' => 'Descargar transcripción'
		);
	}
}

$obtenido['alerta_especifica'] =
	'Las opciones se encuentran ordenadas de mayor a menor calidad. Pruébalas en orden.<p>' .
	'Los resultados M3U8 en ocasiones tienen más calidad.<p>' .
	'Reintenta dentro de varios minutos si falla la descarga.';

finalCadena($obtenido, false);
}

// Ya casinunca quita geobloqueo, retorna la url tal cual
function quita_geobloqueo($url) {
	dbug('quita_geobloqueo para: '.$url);
	// Quitar lo que hay a continuación del ? en ocasiones supone que el vídeo no funcione o tenga un tamaño incorrecto.
	// Pero parece que hay vídeos que tienen geobloqueo dado que tras quitar el geobloqueo, algunas personas empezaron a tener problemas.
	// mvod.rtve.es (no requiere de parámetros GET) retorna tamaños incorrectos de vídeo en ocasiones mientras que mvod2.rtve.es (requiere de parámetros GET) no, pero usar www.rtve.es para conseguir una redirección al enlace usa mvod con parámetros GET (que son ignorados) y el tamaño del vídeo es por tanto, incorrecto
	
	if (strpos($url, '.mp3') !== false) return $url;
	if (enString($url, '?')) {
		$url = substr($url, 0, strpos($url, '?'));
	}
	$url = preg_replace('#//.*?.rtve.es#', '//www.rtve.es', $url);
	// URL ok: http://mvod1.akcdn.rtve.es/resources/TE_GL16/mp4/1/1/1513296993011.mp4
	return $url;
}

function convierteID($asset, $modos = array('video', 'audio')) {
	$ret="";
	$links = array();
	
	// Intentar nuevo método
	$ret = $this->GetInfoFromImage($asset);
	if ($ret === "error") return false;
	
	// http://hlsvod2017b.akamaized.net/resources/TE_GL16/mp4/9/0/1513297074209.mp4/playlist.m3u8
	if ($ret !== false) {
		$this->FindUrls($ret, $links, false);
		$this->FindUrls($ret, $links, true);
	}

	foreach ($modos as $modo) {
		if (0 !== count($links)) break;
		
		$codificado = $asset.'_banebdyede_'.$modo.'_es';
		$codificado = self::encripta($codificado);
		$server5 = 'http://ztnr.rtve.es/ztnr/res/'.$codificado;

		dbug('idasset web='.$server5);

		$content = CargaWebCurl($server5);
		$content = self::desencripta($content);
		
		dbug_($content);
		
		if (preg_match_all('@http://[^<^>]*?\\.(?:mp4|mp3)[^<^>]*@', $content, $m)) {
			dbug_r($m);
			$this->FindUrls($m[0], $links, false);
			$this->FindUrls($m[0], $links, true);
		}
		
		if (preg_match_all('@http://[^<^>]*?\\.(?:flv)[^<^>]*@', $content, $m)) {
			dbug_r($m);
			$this->FindUrls($m[0], $links, false);
		}
	}
	
	if (0 === count($links)) {
		setErrorWebIntera("No se ha podido encontrar ningún vídeo.");
		return false;
	}
	
	return $links;
	//return str_replace('/playlist.m3u8', '', $ret);
}

function FindUrls(&$raw_urls, &$links, $m3u8) {
	dbug('FindUrls $m3u8 = ' . ($m3u8 ? 'TRUE' : 'FALSE'));
	foreach ($raw_urls as $i) {
		if (!stringContains($i, array('1100000000000', 'l3-onlinefs.rtve.es', '.mpd', '.vcl', '/tomcat/'))) {
			if (enString($i, '.mp4/video.m3u8')) {
				
				$i = desde1a2($i, 'http', '.mp4', true);
				dbug('Opción encontrada (modo nuevo, quitando m3u8): '.$i);
				$links[] = $i;
			}
			else {
				if ($m3u8 && (!enString($i, '.m3u8') || !enString($i, '.rtve.es/'))) continue;
				if (!$m3u8 && enString($i, '.m3u8')) continue;

				dbug('Opción encontrada ('.$m3u8.'): '.$i);
				$links[] = $i;
			}
		}
	}
}

function AddLinksFromConvierteID($links, &$enlaces) {
	dbug('Enlaces encontrados:');
	dbug_r($links);
	
	for ($i = 0, $i_t = count($links); $i < $i_t; $i++) {
		$enlaces[] = array(
			'url'     => $links[$i],
			'tipo'    => enString($links[$i], '.m3u8') ? 'm3u8' : 'http',
			'url_txt' => 'Descargar (opción ' . ($i + 1) . ')'
		);
		
		/*
		if (!enString($links[$i], '.m3u8')) {
			$enlaces[] = array(
				'url'     => $this->quita_geobloqueo($links[$i]),
				'tipo'    => 'http',
				'url_txt' => 'Descargar (opción ' . ($i + 1) . ', sin geobloqueo)'
			);
		}
		*/
	}
}

function encuentraAssetEnContenido($web_descargada){
	$asset = "Por rellenar";
	dbug('asset, prueba 0: '.$asset);
	if(stringContains($asset,array('"','{','}','<','>',' ')) && enString($web_descargada, "assetID=")){
		$asset=entre1y2($web_descargada,'assetID=','_');
	}
	dbug('asset, prueba 1: '.$asset);
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		$asset=substr($asset,1);
		dbug('asset, prueba 2: '.$asset);
	}
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		if(enString($web_descargada,'lass="imgT"')&&enString($web_descargada,'href="')){
			$p=strpos($web_descargada,'lass="imgT"');
			$asset=entre1y2_a($web_descargada, $p, 'href="', '"');
			dbug('extraer asset de url: '.$asset);
			
			if(enString($asset, '.shtml')){
				if(!enString($asset, 'rtve.es')){
					$asset = 'http://www.rtve.es/'.$asset;
				}
				$assetW = CargaWebCurl($asset);
				dbug('lanzando encuentraAssetEnContenido() con el contenido de '.$asset);
				$asset = $this->encuentraAssetEnContenido($assetW);
			}
			else{
				preg_match_all('@/(\d+)/@', $asset, $matches);
				$asset=$matches[1][0];
			}
			dbug('asset, prueba 3: '.$asset);
		}
		else
			dbug('asset, prueba 3. No se realiza.');
	}
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		if (preg_match_all('@data-assetid="?(\d+)@i', $web_descargada, $matches)) {
			dbug_r($matches);
			$asset=$matches[1][0];
			dbug('asset, prueba 3.5: '.$asset);
		}
		else dbug('asset, prueba 3.5 fallida');
	}
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		if (preg_match_all('@data-idasset="?(\d+)@i', $web_descargada, $matches)) {
			dbug_r($matches);
			$asset=$matches[1][0];
			dbug('asset, prueba 3.6: '.$asset);
		}
		else dbug('asset, prueba 3.6 fallida');
	}
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		if (preg_match_all('@DC.identifier" ?content="(\d+)"@', $web_descargada, $matches)) {
			$asset=$matches[1][0];
			dbug('asset, prueba 4: '.$asset);
		}
		else dbug('asset, prueba 4 fallida');
	}
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		if (preg_match_all('@/(\d+)/@', $this->web, $matches)) {
			$asset=$matches[1][0];
			dbug('asset, prueba 3 (de la url): '.$asset);
		}
		else dbug('asset, prueba 3 (de la url) fallida');
	}
	if (!is_numeric($asset) && preg_match('#class="M[ "][\s\S]*?<a href=.*/([0-9]+)/#', $web_descargada, $matches)) {
		dbug_r($matches);
		$asset = $matches[1];
	}
	
	dbug('asset='.$asset);
	return $asset;
}

static function encripta($que){
	$key = 'yeL&daD3';
	
	if (version_compare(PHP_VERSION, '7.1.8') >= 0) { 
		$encrypted = openssl_encrypt($que, 'BF-ECB', $key, OPENSSL_DONT_ZERO_PAD_KEY);
	} else {
		$cipher = mcrypt_module_open(MCRYPT_BLOWFISH,'','ecb','');
		
		$modulo = strlen($que) % 8;
		$completar = (8 - $modulo);
		$k = "";
		for($j = 0; $j < $completar; $j++) $k = $k . chr($completar);
		
		mcrypt_generic_init($cipher, $key, "12345678");
		$encrypted = mcrypt_generic($cipher, $que.$k);
		mcrypt_generic_deinit($cipher);
		$encrypted=base64_encode($encrypted);
	}
	return strtr($encrypted, array('+'=>'-', '/'=>'_'));
}

//http://www.rtve.es/ztnr/decrypt.jsp
static function desencripta($que){
	$key = 'yeL&daD3';
	
	if (version_compare(PHP_VERSION, '7.1.8') >= 0) { 
		return openssl_decrypt(self::b64d($que), 'BF-ECB', $key, OPENSSL_DONT_ZERO_PAD_KEY | OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING);
	} else {
		$cipher = mcrypt_module_open(MCRYPT_BLOWFISH, '', 'ecb', '');
		mcrypt_generic_init($cipher, $key, "12345678");
		$decrypted = mdecrypt_generic($cipher, self::b64d($que));
		mcrypt_generic_deinit($cipher);
		return $decrypted;
	}
}

static function b64d($encoded){
	$decoded="";
	$base64=strtr($encoded,'-_','+/');
	for($i=0;$i<ceil(strlen($base64)/64);$i++)
		$decoded.=base64_decode(substr($base64,$i*64,64));
	return $decoded;
}


// ztnrThumbnail.js
function GetInfoFromImage($id) {
	// default, banebdyede, amonet, apedemak, anat
	// Cada opción depende del navegador. banebdyede equivale a un navegador de escritorio.
	$idManagers = array('rtveplayw', 'default', 'banebdyede', 'amonet', 'apedemak', 'anat');
	foreach ($idManagers as $idManager) {
		//$img = CargaWebCurl("http://www.rtve.es/ztnr/movil/thumbnail/{$idManager}/videos/{$id}.png"); // Antiguo, los videos que retorna son menores de 1080p
		$img = CargaWebCurl("http://ztnr.rtve.es/ztnr/movil/thumbnail/{$idManager}/videos/{$id}.png?q=v2");
		dbug_($img);
		if (enString($img, 'Informe de Error</title>')) {
			dbug("El server java de RTVE ha fallado. Esto pasa cuando el server de RTVE está saturado.");			
			setErrorWebIntera('RTVE parece tener problemas ahora mismo, por favor inténtelo dentro de unas horas. Si el problema persiste considera reportarlo.');
			return "error";
		}
		if (enString($img, 'Asset is not published')) {
			dbug("Asset is not published");			
			setErrorWebIntera('RTVE indica que el vídeo no se encuentra disponible.');
			return "error";
		}
		if ($img != '') {
			$byteArray = PNG_RTVE_Data::Img2ByteArray($img);
			
			$i;
			$pointer = 8;
			$encontrados = array();
			do {
				$i = PNG_RTVE_Data::r($byteArray, $pointer);
				if ("tEXt" === $i['type']) {
					$s = $i['data'];
					$h = "";
					$o = 0;
					for ($o = 0; $o < count($s); $o++)
						if (0 !== $s[$o])
							$h .= chr($s[$o]);
					dbug_($h);
					$res = PNG_RTVE_Data::n($h);
					dbug("GetInfoFromImage(): " . $res);
					$encontrados[] = $res;
				}
			} while ("IEND" !== $i['type']);
			if (count($encontrados) > 0) {
				dbug_r($encontrados);
				return $encontrados;
			}
		}
	}
	dbug("GetInfoFromImage no ha encontrado nada");
	return false;
}

}

class PNG_RTVE_Data {
	static function Img2ByteArray($imgDownloaded) {
		$decoded = base64_decode($imgDownloaded);
		dbug_($decoded);
		$byteArray = array();
		foreach(str_split($decoded) as $byte) {
			$byteArray[] = bindec(sprintf("%08b", ord($byte)));
		}
		return $byteArray;
	}
	
	static function r($byteaArray, &$pointer) {
		$e = self::readInt($byteaArray, $pointer);
		dbug_($e);
		$i = self::readChars($byteaArray, $pointer, 4);
		dbug_($i);
		$r = array();
		if (self::read($byteaArray, $pointer, $r, 0, $e) !== $e)
			throw "Out of bounds";
		$pointer += 4;
		return array(
			'type' => $i,
			'data' => $r
		);
	}
	
	static function readInt($byteaArray, &$pointer) {
		$t0 = $byteaArray[$pointer++];
		$t1 = $byteaArray[$pointer++];
		$t2 = $byteaArray[$pointer++];
		$t3 = $byteaArray[$pointer++];
		return $t0 << 24 | $t1 << 16 | $t2 << 8 | $t3;
	}
	static function readChars($byteaArray, &$pointer, $t) {
		for ($r = "", $i = 0; $t > $i; $i++) {
			$r .= chr($byteaArray[$pointer++]);
		}
		return $r;
	}
	static function read($byteaArray, &$pointer, &$t, $r, $i) {
		for ($e = 0; $i > $e;) {
			$n = $byteaArray[$pointer++];
			$t[$r + $e] = $n;
			$e++;
		}
		dbug_($e);
		return $e;
	}
	
	static function n($t) {
		$s = strpos($t, "#");
		dbug_($s);
		$n = self::i(substr($t, 0, $s));
		dbug_($n);
		$r = substr($t, $s + 1);
		dbug_($r);
		return self::e($r, $n);
	}
	
	static function i($t) {
		$r = "";
		$i = 0;
		$e = 0;
		$n = 0;
		for (; $i < strlen($t); $i++)
			if (0 === $n) {
				$r .= substr($t, $i, 1);
				$e = ($e + 1) % 4;
				$n = $e;
			} else {
				$n--;
			}
		return $r;
	}
	
	static function e($t, $r) {
		for ($i = "", $e = 0, $n = 0, $s = 3, $h = 1, $e = 0; $e < strlen($t); $e++) {
			if (0 === $n) { 
				$a = 10 * intval(substr($t, $e, 1));
				$n = 1; 
			} else {
				if (0 === $s) {
					$a += intval(substr($t, $e, 1));
					$i .= substr($r, $a, 1);
					$s = ($h + 3) % 4;
					$n = 0;
					$h++;
				} else {
					$s--;
				}
			}
		}
		return $i;
	}
}

/*
http://www.rtve.es/alacarta/videos/amar-en-tiempos-revueltos/amar-tiempos-revueltos-t7-capitulo-200/1441367/
http://mvod.akcdn.rtve.es/resources/TE_NGVA/mp4/0/6/1340123093060.mp4
acceso denegado.
http://www.rtve.es/resources/TE_NGVA/mp4/0/6/1340123093060.mp4
funciona
*/

/*
4371826_banebdyede_video_es

http://ztnr.rtve.es/ztnr/res/h1cY6ITT9JXlVR7FSV_TCG6mba5nqN8Z7Lpm50K5VNg=

[0] => http://hlsvod2017b.akamaized.net/resources/TE_GL16/mp4/1/1/1513296993011.mp4/playlist.m3u8
[1] => http://hlsvod.lvlt.rtve.es/resources/TE_GL16/mp4/1/1/1513296993011.mp4/playlist.m3u8
[2] => http://dashvod2017b.akamaized.net/resources/TE_GL16/mp4/1/1/1513296993011.mp4/video.mpd
[3] => http://mvod.lvlt.rtve.es/resources/TE_GL16/mp4/1/1/1513296993011.mp4
[4] => http://mvod2.lvlt.rtve.es/resources/TE_GL16/mp4/1/1/1513296993011.mp4?nvb=20180204161027&nva=20180204181027&token=06cdb70d3598eac8b7eef
[5] => http://mvod1.akcdn.rtve.es/resources/TE_GL16/mp4/1/1/1513296993011.mp4
[6] => http://hlsvod2017b.akamaized.net/resources/TE_GL16/mp4/9/0/1513297074209.mp4/playlist.m3u8
[7] => http://hlsvod.lvlt.rtve.es/resources/TE_GL16/mp4/9/0/1513297074209.mp4/playlist.m3u8
[8] => http://dashvod2017b.akamaized.net/resources/TE_GL16/mp4/9/0/1513297074209.mp4/video.mpd
[9] => http://mvod.lvlt.rtve.es/resources/TE_GL16/mp4/9/0/1513297074209.mp4
[10] => http://mvod2.lvlt.rtve.es/resources/TE_GL16/mp4/9/0/1513297074209.mp4?nvb=20180204161027&nva=20180204181027&token=0c4c7db01221a83fe1d39
[11] => http://mvod1.akcdn.rtve.es/resources/TE_GL16/mp4/9/0/1513297074209.mp4
[12] => http://hlsvod2017b.akamaized.net/resources/TE_GL16/mp4/8/7/1513297117578.mp4/playlist.m3u8
[13] => http://hlsvod.lvlt.rtve.es/resources/TE_GL16/mp4/8/7/1513297117578.mp4/playlist.m3u8
[14] => http://dashvod2017b.akamaized.net/resources/TE_GL16/mp4/8/7/1513297117578.mp4/video.mpd
[15] => http://mvod.lvlt.rtve.es/resources/TE_GL16/mp4/8/7/1513297117578.mp4
[16] => http://mvod2.lvlt.rtve.es/resources/TE_GL16/mp4/8/7/1513297117578.mp4?nvb=20180204161027&nva=20180204181027&token=031f0a11df5ee991908b3
[17] => http://mvod1.akcdn.rtve.es/resources/TE_GL16/mp4/8/7/1513297117578.mp4
*/


/*
https://www.rtve.es/play/videos/serengueti/episodio-5-exodo/5924746/

https://api2.rtve.es/api/videos/5924746/subtitulos.json
{"page":{"items":[{"src":"http://www.rtve.es/resources/vtt/9/2/1623311421629.vtt","lang":"es"}],"number":1,"size":1,"offset":0,"total":1,"totalPages":1,"numElements":1}}
https://www.rtve.es/resources/vtt/9/2/1623311421629.vtt

https://ztnr.rtve.es/ztnr/movil/thumbnail/rtveplayw/videos/5924746.png?q=v2

iVBORw0KGgoAAAANSUhEUgAAAsAAAAGMAQMAAADuk4YmAAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAADlJREFUeF7twDEBAAAAwiD7p7bGDlgYAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwAGJrAABgPqdWQAAApx0RVh0eG9PdyZTU1JsSVlIOG4wa21DS0VxN0JseHNuNk9RbUtiJkF2QEZ6SiZZY0hWYXNObi45RjVzZlJ1eTRXeTY/V1NWbE9lQUBtN2xrdDMzAGxpQ0Q2c0hQOV9JMFhUTDpEekk1OE5keW5paTN4NEVwNDhqajU9LU9JZkd4L0pMOlh5R0R1cUg3OEZDX0JvTVQxLVZnZUZ3aHJnXz1aWiZhOGxVcVQ5ODItaEktS2p3TlhlZFJfJiM1MDU2OTMwMzUwNDU3MzE4NjUwNTA0NDk0MzA5NjQ2MjAzMDEzNDcxMjA1NjQ2OTYzMTQwMTE0NDUzMDE1NDA2NDM1Mjg1MzAyODA3MDI2OTEwMzk2MDMyMDMwMTc0NzE0MDE1MTI5NzAxNDA0MDM5MTgzMDI3MDQwMDMyNzExMDE3ODE0NTE1NDQ4MDE1MDg0NjY0Njk2NzIwNzQ0MzAxMDUzNTUwMzI2NDI3MDE3NzIwMTI1MDQ3NDI5NjUwMDc2ODMxMDI3NDIwMjA1NzI3MDIwNDg0NzM5NDI4NDExOTE4NDYyNDM0MDQ0MzI5MzM0MjM0OTI3MTQwNzk1MDUzNzMzNjQ2NjUwNjI2MzYxNDQ2MzYyMDMwMzIwNDUzNTQ0MjI3ODEzODQ3MzE5MTQyNDc0MzQ2MjA0NDkxNjQzNTMxNDAwMzA3MDUwNTE1NzkxMjA4MjQyNTYyMDcyNTIwMzc1NTk2ODMxMTgwNjMwNjE0MTUxNTYxMzExNTQ0ODUyNDMwMzUzMTU3NDQ1NjE1ODU0NjAxNjExMTMyNDQzNjM0MzA2NDQwMDUyNzEwMTQ4NjM0NzMxNDAxMzgxNjUwMTUzMzA3MDM3MDQ4MjYyNDAwMTIwNjI2NDIyNDIzMzI5NDQzNTOdWPc4AAACSHRFWHRHVzI2OlVseGxjU2tuR184V1dnamlab2h5dU1IPWZLTFo4NzFMWm93JldrcEhzSFEzL0RGdkhBcDhhLWhALnJzeUx1aXhnZCZZRC56d2wALV95YjlSWHFTNFp0Q3BhS1hNQy9zJkJLUXVlQWQzeVIuS1QvWDRGeVhISXNKOkQwbzhwNkVAUFhzLUBpZTpObmVfcD10SkliM1JGdGZtSGk0T1dQVlRBP0t5YXhYUjU1MzcxaWZsIzIyNTAzMzUzMTUyNDAyMTY0Njg1NTEyOTE3MDkyNjI0NTM1MjMxNTQxNzI3NzQzNzExNDgyNjgxMDA0MDkyODczMTA3NjkzMDQ0NTU3NzMwNDg1NDIwNTY1MzUyNjE1MzA3NDY2NzQ1NzE4ODE0Njk2MDc1MjU3MjY4MDgzODM3MTc3MjEwMzkyODY4MjM1NjEwMTE3OTI2NzU1ODA2NzE4MDA5MTQyMDIwODU1MDM1NzcxODM4MTE0Mzk0NTUyMjM3NzEwMjExNDA0NTYyNDczMzUxMjAyNTYwNjAxMDc5NjIyNDIyMjQ4NjE0Njk1NzA4MTE5NjU5MTA3OTE0MDc0NTEwNDEwODQxNjgyNzk0NjA2MTM4MjM1MTczMDUwNjUwNjgyOTU1NDIxNDQ2NDIyMjgyNDEwMjYxOTI3MTAyODgyMTIyODU3MDA5NDM4NDYzMzMyMjIyMzg2NzY2MDEwMTgyODM0NzExMzgxNDgwODU3MzA1NTU2ODYzMDE5MzMwMDE0ODY2NzI4NDA0NjUzMXBdCuQAAAMadEVYdGYwTzRZOGZWOF8uYmNncmdnaHAmNzEvNU5uSVAtRzZATFE1NT9TYkhvRFlkP3NEZThOVy9rMGtWMUlzM1JFMUM9Rk4mMGhVME1Ib0FsbwA9OmFsdlZleVBpdEpkam1pMEVWWjh6WC5AR2d1L3ZORFNrUDFTQjRneDJpVFQyOWVTZmQmdGxJdDFsTng4d2JnP3hTNG9XSi1aUTBAU3JCMS1xOUxDL054Njh2S2plPXpzUXREM3AjMjc0Nzc1MjU4MjcxMjEzMDIzMTA5MDU5NjQ3MjU4MDIyMzM1ODA1MTU5MzcyODc1MDMwNjQwNzgzNDA2MjMzMTU2MzU1NjU3NjA5NTQ0MzIzODQ3MTE1MjAwNDE0ODUwNTAwMjY2NTQyNjAyNTUxMDAwMjE0MDAxODYxNTU2NTI1NTI3MTY1MjQwNjgxMzQwMDUyMDI0MTMzMDUzMDMwNTIwNjk2MDcyNTc4MzAxODE0NjQ4MDI2NTE4MjA1NTAwMTA0ODAwMDU5NDkzODgwNjQzNDY2MjQ0NDMwODI2ODQzNTMwODE5MTIxMDQ1OTM3MjE3NzE1NDgwODA5MTE0NTIwOTEzNDA0ODkyMzEwNTEyNDU3NDAzNzEyMjg0NTg0MDc2ODM0NjQyNDE2MTIyMzExNDQxMTg2MjA0MzM3NzA2MTU0NDE4NTc0NzgzNzg2MzYyNDIxODE2ODU4NjA1MjYwMjY5MTE0Njg1NDQxNjU3NTgwNTg1NTg4MTA2NDIwNzE2MDM2ODM1NDQ4NjY5NDE3NjA1MTQwNzc3NDc2NTE2MTM0NDE3ODcxMjQ3NzQ3MTcyNTQ4NTI1MjM1MDI3ODAwNDQ3MTAzMTMzODYyNjI3ODk0NzYwMTQwNDc0NjI2NzYxNjA0NDIyNzAxMDg4NDc0Nzc2MjMxNTI0NzgyMzA4ODAyODc1ODQ3MjE2MjgxNTgxMDEwNzIwNjk2NTEwNDEwMzU3MzI1MDQyNzI1MDUwNjY0ODI1Mzg2NTQyMDI1MTM1MjM0MzcwNDg1MDgyMTA2NDU2MDQ3Njc1NjMxNjYxMDY4mu1dbQAAAABJRU5ErkJggg==

https://rtvehlsvodlote7.rtve.es/mediavodv2/resources/TE_SSERENG/mp4/6/5/1622542900356.mp4/video.m3u8?hls_no_audio_only=true&idasset=5924746
https://rtvehlsvodlote7.rtve.es/mediavodv2/resources/TE_SSERENG/mp4/6/5/1622542900356.mp4/1622542900356-audio=192231-video=2750000.m3u8?idasset=5924746
https://rtvehlsvodlote7.rtve.es/mediavodv2/resources/TE_SSERENG/mp4/6/5/1622542900356.mp4/1622542900356-audio=192231-video=2750000-2.ts?idasset=5924746
https://rtvehlsvodlote7.rtve.es/mediavodv2/resources/TE_SSERENG/mp4/6/5/1622542900356.mp4
*/

// https://ztnr.rtve.es/ztnr/6543984.mpd?web=true
// /deliverty/main/resources/m4a/5/5/1653051296355.m4a

?>
