<?php

/*
Formato de las respuestas:
array(
	'titulo'            => título principal de la respuesta,
	'descripcion'       => descripción que acompañe el título, // Optativo
	'imagen'            => url de la imagen,
	'alerta_especifica' => 'texto con html', // Optativo
	'enlaces' => array(
		n => array(
			'titulo'          => texto que acompaña el enlace como descripción,
			'url'             => direccion de la descarga,
			'tipo'            => rtmp/rtmpConcreto/rtmpConcretoHTTP/m3u8/f4m/js/jsFlash/srt/http,
			'url_txt'         => texto que se verá en el enlace en lugar de url
			'extension'       => mp4, avi, flv...
			'rtmpdump'        => comando rtmpdump
			'rtmpdumpHTTP'    => url http que genera el comando rtmpdump para rtmp-downloader
			'm3u8_pass'       => pass m3u8 para f4m-downloader
			'otros_datos_mp3' => resultados mp3 (duración, peso, etc)
			'nombre_archivo'  => para f4m y rtmp downloader
			'script'          => js
		)
	)
);

si está presente url_txt, no estará titulo, y viceversa (esto vendrá bien para el gestor de descargas)
*/

if(!defined('DEBUG')){
	if(isset($_GET['debug']) || isset($_COOKIE['debug'])){
		ini_set('display_errors',1);
		ini_set('display_startup_errors',1);
		error_reporting(-1);
		define('DEBUG',true);
	}
	else{
		error_reporting(0);
	}
}

include_once '../definiciones.php';
include_once '../funciones.php';


//NO CACHE. Los resultados no se deben cachear
header('Expires: Tue, 01 Jul 2001 06:00:00 GMT');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache');










//recogemos variables
if(!isset($web)){
	if(isset($_REQUEST['web']))
		$web=$_REQUEST['web'];
	else
		$web='';
}


//API. devolver SOLO el enlace (1/2)
if(!defined('MODO_API')){
	define('MODO_API', isset($_REQUEST['modoApi']));
}


$fallourlinterna='';
$errorImprimible='';

//2012-5-25 -> ya no está
//junio
//agosto-movil
//septiembre-api
//diciembre-res
$plantillaDefault='diciembre-res';
$plantillaApi='septiembre-api';
$plantillaRes='diciembre-res';
$plantillaResMp3='febrero-res-mp3';
$path_plantilla='';


if(!isset($modo)){
	if(isset($_REQUEST['modo'])){
		$modo=$_REQUEST['modo'];
		if($modo != 1 && $modo != 2){
			$modo = 1;
		}
	} else {
		$modo = 1;
	}
}




if(isset($_REQUEST['plantilla']))
	$path_plantilla='plantillas/'.$_REQUEST['plantilla'].'/';
elseif(MODO_API){
	//API. devolver SOLO el enlace (2/2)
	$path_plantilla='plantillas/'.$plantillaApi.'/';
	dbug('plantilla api');
}elseif($modo==2)
	$path_plantilla='plantillas/'.$plantillaResMp3.'/';
elseif($path_plantilla=='')
	$path_plantilla='plantillas/'.$plantillaDefault.'/';


/*
array(
	n => array(
		0 => array(
			n => A buscar en enString $web
		)
		1 => array(	phps a importar
			n => Include n
		)
		2 => Funcion a lanzar
	)
);
*/

/*
Dominio(s)
PHP(s) a incluir
Class a crear
Función del objeto de la class a llamar
*/
$cadenas = array(
	array(
		array('rtve.es', 'tve.es'),
		array('rtve.php'),
		'Rtve',
		'calcula'
	)
	,array(
		array('canalriasbaixas.com', 'canalriasbaixas.tv'),
		array('canalriasbaixas.php'),
		'Canalriasbaixas',
		'calcula'
	)
	,array(
		array('univision.com'),
		array('univision.php'),
		'Univision',
		'calcula'
	)
	,array(
		array('uvideos.com'),
		array('univision.php'),
		'Univision',
		'calculaUVideos'
	)
	,array(
		array('univision.mobi'),
		array('univision.php'),
		'Univision',
		'calculaMovil'
	)
	,array(
		array('rtpa.es'),
		array('rtpa.php'),
		'Rtpa',
		'calcula'
	)
	,array(
		array('7rm.es','orm.es'),
		array('7rm.php'),
		'T7rm',
		'calcula'
	)
	,array(
		array('canalextremadura.es'),
		array('canalextremadura.php'),
		'Canalextremadura',
		'calcula'
	)
	,array(
		array('lasexta.com','antena3.com'),
		array('a3borrado.php'),
		'A3',
		'calcula'
	)
	,array(
		array('atresplayer.com'),
		array('a3borrado.php'),
		'Atresplayer',
		'calcula'
	)
	,array(
		array('cuatro.com','telecinco.es','divinity.es','mediaset.es','mitelekids.es'),
		array('mitele.php'),
		'Mitele',
		'mitele_directo'
	)
	,array(
		array('mitele.es'),
		array('mitele.php'),
		'Mitele',
		'calcula'
	)
	/*,array(
		array('gamespot.com'),
		array('gamespot.php'),
		'gamespot'
	)*/
	,array(
		array('soundcloud.com'),
		array('soundcloud.php'),
		'Soundcloud',
		'calcula'
	)
	,array(
		array('veoh.com'),
		array('veoh.php'),
		'Veoh',
		'calcula'
	)
	,array(
		array('tv3.cat','324.cat','esport3.cat','3xl.cat','super3.cat','ccma.cat'),
		array('tv3cat.php'),
		'Tv3cat',
		'calcula'
	)
	,array(
		array('aragontelevision.es'),
		array('aragontv.php'),
		'Aragontv',
		'calcula'
	)
	,array(
		array('canalsuralacarta.es','canalsur.es'),
		array('canalsuralacarta.php'),
		'Canalsuralacarta',
		'calcula'
	)
	,array(
		array('rtvcm.es'),
		array('rtvcm.php'),
		'Rtvcm',
		'calcula'
	)
	,array(
		array('rt.com'),
		array('rt.php'),
		'Rt',
		'calcula'
	)
	,array(
		array('vtelevision.es'),
		array('vtelevision.php'),
		'Vtelevision',
		'calcula'
	)
	,array(
		array('medici.tv'),
		array('medici.php'),
		'Medici',
		'calcula'
	)
	,array(
		array('goear.com'),
		array('goear.php'),
		'Goear',
		'calcula'
	)
	,array(
		array('canaldehistoria.es','canalhistoria.es'),
		array('canaldehistoria.php','adnstream.php','vimeo.php'),
		'Canaldehistoria',
		'calcula'
	)
	,array(
		array('adnstream.com'),
		array('adnstream.php'),
		'Adnstream',
		'calcula'
	)
	,array(
		array('crtvg.es'),
		array('crtvg.php'),
		'Crtvg',
		'calcula'
	)
	,array(
		array('mtv.es'),
		array('mtves.php'),
		'Mtves',
		'calcula'
	)
	,array(
		array('eitb.com', 'eitb.eus'),
		array('eitb.php'),
		'Eitb',
		'calculacom'
	)
	,array(
		array('8tv.cat'),
		array('8tvcat.php'),
		'OchoTVcat',
		'calcula'
	)
	,array(
		array('eitb.tv'),
		array('eitb.php'),
		'Eitb',
		'calculatv'
	)
	/*
	,array(
		array('intereconomia.com','radiointereconomia.com'),
		array('intereconomia.php'),
		'Intereconomia',
		'calcula'
	)
	*/
	,array(
		array('vimeo.com'),
		array('vimeo.php'),
		'Vimeo',
		'calcula'
	)
	/*,array(
		array('grooveshark.com'),
		array('grooveshark.php'),
		'grooveshark'
	)*/
	,array(
		array('cope.es'),
		array('cope.php'),
		'Cope',
		'calcula'
	)
	,array(
		array('cadenaser.com'),
		array('cadenaser.php'),
		'Cadenaser',
		'calcula'
	)
	,array(
		array('televisa.com','esmas.com'),
		array('televisa.php'),
		'Televisa',
		'calcula'
	)
	,array(
		array('hogarutil.com'),
		array('hogarutil.php'),
		'Hogarutil',
		'calcula'
	)
	,array(
		array('telemadrid.es', 'telemadrid2020.es'),
		array('telemadrid.php'),
		'Telemadrid',
		'calcula'
	)
	,array(
		array('netd.com'),
		array('netdcom.php'),
		'Netdcom',
		'calcula'
	)
	,array(
		array('telefe.com'),
		array('telefe.php'),
		'Telefe',
		'calcula'
	)
	/*
	,array(
		array('toons.tv'),
		array('toonstv.php'),
		'Toonstv',
		'calcula'
	)
	*/
	,array(
		array('youtube.com'),
		array('youtube.php','youtubehelper.php'),
		'Youtubehelper',
		'calcula'
	)
	,array(
		array('youtu.be'),
		array('youtube.php','youtubehelper.php'),
		'Youtubehelper',
		'calcula_urlAcortada'
	)
	,array(
		array('tvmelilla.es'),
		array('tvmelilla.php', 'vimeo.php'),
		'Tvmelilla',
		'calcula'
	)
	,array(
		array('tune.pk'),
		array('tunepk.php'),
		'Tunepk',
		'calcula'
	)
	,array(
		array('ideal.es'),
		array('ideal.php'),
		'Ideal',
		'calcula'
	)
	/*
	,array(
		array('magnovideo.com'),
		array('magnovideo.php'),
		'magnovideo'
	)
	*/
	,array(
		array('vk.com'),
		array('vk.php'),
		'Vk',
		'calcula'
	)
	,array(
		array('played.to'),
		array('playedto.php'),
		'Playedto',
		'calcula'
	)
	,array(
		array('allmyvideos.net','allmyvideos.com'),
		array('allmyvideosnet.php'),
		'Allmyvideosnet',
		'calcula'
	)
	,array(
		array('dailymotion.com'),
		array('dailymotioncom.php'),
		'Dailymotioncom',
		'calcula'
	)
	,array(
		array('liveleak.com'),
		array('liveleak.php'),
		'Liveleak',
		'calcula'
	)
	,array(
		array('crunchyroll.com'),
		array('crunchyrollcom.php'),
		'Crunchyrollcom',
		'calcula'
	)
	,array(
		array('telemundo.com'),
		array('telemundocom.php'),
		'Telemundocom',
		'calcula'
	)
	,array(
		array('discoverymax.es','discoverymax.marca.com'),
		array('discoverymaxes.php'),
		'Discoverymaxes',
		'calcula'
	)
	,array(
		array('13.cl'),
		array('13cl.php'),
		'T13cl',
		'calcula'
	)
	,array(
		array('disneychannel.es'),
		array('antena3.php'),
		'A3',
		'calcula'
	)
	,array(
		array('twitch.tv'),
		array('twitchtv.php'),
		'Twitchtv',
		'calcula'
	)
	,array(
		array('canalplus.es'),
		array('canalpluses.php'),
		'Canalpluses',
		'calcula'
	)
);


//hora de descargar y mostrar el resultado
//AVERIGUAR SERVIDOR
if($modo==1){
	$R = array();
	
	while(preg_match('@descargavideos\.tv.+?web=(.+?)(?:$|&)@', $web, $matches)){
		dbug_r($matches);
		
		if($matches && $matches[1]){
			dbug('sacando la web de descargavideos.tv/?web=...');
			$web = urldecode($matches[1]);
			dbug('Nueva web: '.$web);
		} else {
			break;
		}
	}
	
	
	if(trim($web) === ''){
		setErrorWebIntera('Especifique la dirección de la web que contiene el vídeo.');
	}
	elseif(validar_enlace($web)){
		//La función anterior, si es exitosa, finaliza la web. Si falla (url de un server no válido o la función del canal se acabó antes de lo previsto, se ejecuta lo próximo
		$cadena_elegida_arr = averiguaCadena($web);
		if($cadena_elegida_arr===false){
			//no es una url aceptada de una web permitida
			setErrorWebIntera('Has introducido un enlace de una página web no soportada. Puedes consultar el listado de webs soportadas en el siguiente enlace:<br/><a href="http://www.descargavideos.tv/faq#p_q_c_s_d">http://www.descargavideos.tv/faq#p_q_c_s_d</a>');
			
			//lanzaBusquedaGoogle();
		}
		else{
			$intentos = 3;
			$intento = 0;
			$exito = false;
			
			// url_exists_full descarga la web para comprobar si es un enlace válido. De paso, guarda en web_descargada el resultado, para no tener que re-descargarlo inúltilmente
			
			while(!$exito &&
					$intento < $intentos &&
					dbug('Intento '.$intento) &&
					!($exito = url_exists_full($web, true, 5 + $intento *5))){
				$intento++;
			}
			
			if($exito){
				dbug('enlace correcto (se pudo abrir la URL)=>'.$web);
				
				// Includes
				dbug('Incluyendo PHPs');
				include 'cadena.class.php';
				
				for($k=0,$k_t=count($cadena_elegida_arr[1]);$k<$k_t;$k++){
					dbug('Incluyendo: '.$cadena_elegida_arr[1][$k]);
					include_once $cadena_elegida_arr[1][$k];
				}
				
				//Crear objeto
				$cadena = new $cadena_elegida_arr[2]();
				$cadena->init($web, $web_descargada, $web_descargada_headers);
				
				// Lanzar función cadena
				// Estas funciones pueden modificar el valor de web_descargada ya que se para por parámetro, pero no de web
				dbug('Lanzando función cadena: '.$cadena_elegida_arr[3]);
				dbug('--------------------------------------');
				$cadena->$cadena_elegida_arr[3]();
				
				if($fallourlinterna==''){
					if(!isset($resultado['enlaces']) || count($resultado['enlaces'])==0){
						//no es una url aceptada de una web permitida
						setErrorWebIntera('No se pudo encontrar ningún video o audio.');
						dbug('URL correcta, de server soportado, pero no debería de haber nada dentro');
					}
					else{
						// Tenemos resultado
						
						generaR();
						
						global $Cadena_elegida;
						saveDownload($Cadena_elegida, $web, $resultado['titulo']);
					}
				}
			}
			else{
				dbug('fallo al abrir la url=>'.$web);
				// Concretar el tipo de fallo para evitar que, en caso de ser fallo del usuario, no cometa el mismo error.
				if(substr_count($web, 'http') > 1){
					setErrorWebIntera('Introduzca un solo enlace. No se permiten calcular varios resultados al mismo tiempo');
				}else{
					setErrorWebIntera('No se ha podido abrir el enlace o no es un enlace válido');
				}
			}
		}
	}
	else{
		setErrorWebIntera('URL no válida');
		//lanzaBusquedaGoogle();
	}
	if(defined('DEBUG')){
		dbug('-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_');
		dbug('DEBUG en marcha, terminando.');
		exit;
	}
}
elseif($modo==2){
	//la canción se buscará en soundcloud y goear por ahora
	dbug('texto a buscar: '.$web);

	//$nombres=array('dilandau','emp3world','forshared','goear','soso','soundcloud');

	$nombres=array('soundcloud','goear','forshared','emp3world');

	$total=array();


	foreach($nombres as $nombre){
		include_once 'buscaMp3/'.$nombre.'.php';
		$lolol=$nombre();
		foreach($lolol['enlaces'] as $elem){
			$otros_datos_mp3='';
			if(isset($elem['duracion']))
				$otros_datos_mp3.=$elem['duracion'].'s, ';
			if(isset($elem['peso']))
				$otros_datos_mp3.=$elem['peso'].'MB, ';
			if(isset($elem['bitrate']))
				$otros_datos_mp3.=$elem['bitrate'].'kbps, ';
			$otros_datos_mp3=substr($otros_datos_mp3,0,strlen($otros_datos_mp3)-2);
			$aAgregar=array(
				'url_txt'=>html_entity_decode($elem['titulo']),
				'url'=>$elem['url'],
				'tipo'=>'http',
				'otros_datos_mp3'=>$otros_datos_mp3
			);
			$total[]=$aAgregar;//sin ordenar ni na, pero bueno.
		}
	}


	$obtenido=array(
		'titulo'  => $web,
		'enlaces' => $total
	);

	if(count($total) > 0)
		finalCadena($obtenido,false);
	else
		$errorImprimible='No se encontró ningún resultado.';
}


if($fallourlinterna!=''){
	if($fallourlinterna=='premium')
		$errorImprimible='Error. Los vídeos premium o de pago no están soportados.';

	elseif($fallourlinterna=='full')
		$errorImprimible='Error. Introduce los vídeos de uno en uno, y no la serie completa.';

	else
		//$errorImprimible='Error. Lo sentimos.';
		$errorImprimible='Error: '.$fallourlinterna;
}


// imprimir web
if($web=='')
	generaF();
elseif($errorImprimible!='')
	generaF();

/*
function lanzaBusquedaGoogle(){
	global $web;
	echo '<script>
	window.open("http://www.google.es/?cx=partner-pub-1209387661883940:1395957069&ie=UTF-8&sa=1&q='.urlencode(strtr($web,array("http://"=>""))).'");
	</script>';
	exit;
}
*/


function generaR(){
	global $Cadena_elegida, $web, $R;

	$R['url_img_res'] = $R['BASE']['imagen'];
	$R['titulo_res'] = html_entity_decode($R['BASE']['titulo']);
	$R['descripcion_res'] = isset($R['BASE']['descripcion']) ? html_entity_decode($R['BASE']['descripcion']) : '';
	$R['contenido'] = array();
	$R['CANAL'] = $Cadena_elegida;
	$R['WEB'] = $web;
	
	$R['MODO'] = 'RESULTADO';
	
	if(isset($R['BASE']['alerta_especifica'])){
		$R['alerta_especifica'] = $R['BASE']['alerta_especifica'];
	}
	
	define('HAY_RESULTADO', true);
	dbug('HAY_RESULTADO generado en generaR');
}

function generaF(){
	global $Cadena_elegida, $web, $R, $errorImprimible;

	$R['error_texto'] = $errorImprimible;
	$R['CANAL'] = $Cadena_elegida;
	$R['WEB'] = $web;
	
	$R['MODO'] = 'ERROR';
	
	define('HAY_RESULTADO', true);
	dbug('HAY_RESULTADO generado en generaF');
}




//Se seta $Cadena_elegida
function averiguaCadena($web){
	global $cadenas,$Cadena_elegida;
	dbug('averiguando cadena');
	for($i=0,$i_t=count($cadenas); $i<$i_t; $i++)
		for($j=0,$j_t=count($cadenas[$i][0]); $j<$j_t; $j++){
			$pattern="@^https?://(([^/^\.]+\.)*?".strtr($cadenas[$i][0][$j], array('.'=>'\\.')).")(/.*)?$@i";
			preg_match($pattern, $web, $matches);
			if($matches){
				//Cadena encontrada
				$Cadena_elegida=$cadenas[$i][0][$j];
				dbug($cadenas[$i][0][$j]);
				return $cadenas[$i];
			}
		}
	return false;
}

function validar_enlace($link){
	global $web;

	if(enString($link, 'http://www.descargavideos.tv')){
		return false;
	}

	$link = trim($link);

	// Quitar espacios y pasarlos a guiones (-) en rtpa.es
	if(enString($link, 'rtpa.es')){
		$link = strtr($link,' ','-');
	}

	// http://http//www....
	if(enString($link,'http//')){
		// http// esta en el enlace. Quitarlo
		$link = strtr($link, array('http//' => ''));
	}
	
	if(strpos($link, '//') === 0){
		$link = 'http:'.$link;
	}
	
	if(strpos($link, '/') === 0){
		$link = 'http:/'.$link;
	}
	
	// http://http://www....
	if(strpos($link,'http://http://') === 0){
		$link = substr($link, strlen('http://'));
	}
	
	// http:// está en el enlace. Si no, lo agregamos
	if(enString($link,'http://')||enString($link,'https://')){
		// Comprobar si estamos con un iframe
		if(enString($link,'<iframe')){
			dbug('Detectado iframe');
			preg_match('@src.*?=.*?["\'](.*?)["\']@', $link, $matches);
			dbug_r($matches);
			if(isset($matches[1])){
				$link = $matches[1];
				if(strpos($link, '//') === 0){
					$link = 'http:'.$link;
				}
			}
			else{
				return false;
			}
		}
		if(($i = strpos($link, 'http')) !== 0){
			$link = substr($link, $i);
			dbug('Quitado texto existente antes de http(s)://');
		}
		$enlace = $link;
	}
	else{
		$enlace = 'http://'.$link;
	}
	
	$enlace = trim($enlace);

	$amos='si';
	if(preg_match('@^https?://(([^/^\.]+\.)+?[^/^\.]+?)(/.*)?$@i', $enlace)){
		$web=$enlace;
		dbug('enlace bien escrito (estructura de un enlace)');

		$web = $enlace;
		dbug('enlace correcto (pregmatch válido)=>'.$enlace);
		return true;
	}
	else{
		dbug('fallo en pregmatch de la url (enlace mal construido. No es un enlace)');
		return false;
	}

	return false;
}


//$obtenido -> array con los resultados
//$asegurate -> boolean: verdadero=comprobar si los enlaces son válidos. Falso=no comprobar
function finalCadena($obtenido, $asegurate=true){
	global $resultado, $R;

	$ind=(!isset($obtenido['enlaces'][0]['url']))?0:1;
	if(isset($obtenido['enlaces'][$ind]['url']))
		$duda1=esVideoAudioAnon($obtenido['enlaces'][$ind]['url']);
	else
		$duda1=true;
	if(isset($obtenido['enlaces'][$ind]['tipo']))
		$duda2=$obtenido['enlaces'][$ind]['tipo']!='http';
	else
		$duda2=true;
	if(!$asegurate || $duda1 || $duda2){
		dbug('Obtenido!');
		dbug_r($obtenido);

		$resultado=$obtenido;
		$R['BASE'] = $obtenido;
	}
	else{
		dbug('Error!');
		setErrorWebIntera('Ha ocurrido un error.');
	}
}
?>