<?php

/*
Formato de las respuestas:
array(
	'titulo'  => título principal de la respuesta,
	'imagen'  => url de la imagen,
	'alerta_especifica' => 'texto con html', // Optativo
	'enlaces' => array(
		n => array(
			'titulo'  => texto que acompaña el enlace como descripción,
			'url'     => direccion de la descarga,
			'tipo'    => http/rtmp, uno de los dos,
			'url_txt' => texto que se verá en el enlace en lugar de url
			'extension' => mp4, avi, flv...
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








$servidorPrincipal='www.'.Dominio;



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



if(isset($_REQUEST['modo']))
	$modo=$_REQUEST['modo'];
else
	$modo=1;




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


// $fallo_plantilla=template2('fallo.html');


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
Función a llamar
*/
$cadenas=array(
	array(
		array('rtve.es'),
		array('rtve.php'),
		'rtve'
	),
	array(
		array('canalriasbaixas.com'),
		array('canalriasbaixas.php'),
		'canalriasbaixas'
	),
	array(
		array('tve.es'),
		array('rtve.php'),
		'rtve'
	),
	array(
		array('univision.com'),
		array('univision.php'),
		'univision'
	),
	array(
		array('univision.mobi'),
		array('univision.php'),
		'univisionMovil'
	),
	array(
		array('rtpa.es'),
		array('rtpa.php'),
		'rtpa'
	),
	array(
		array('7rm.es','orm.es'),
		array('7rm.php'),
		't7rm'
	),
	array(
		array('canalextremadura.es'),
		array('canalextremadura.php'),
		'canalextremadura'
	),
	array(
		array('lasexta.com','antena3.com'),
		array('antena3.php'),
		'a3'
	),
	array(
		array('atresplayer.com'),
		array('atresplayer.php'),
		'atresplayer'
	),
	array(
		array('cuatro.com','telecinco.es','divinity.es','mediaset.es','mitelekids.es'),
		array('mitele.php'),
		'mitele_directo'
	),
	array(
		array('mitele.es'),
		array('mitele.php'),
		'mitele'
	),
	/*array(
		array('gamespot.com'),
		array('gamespot.php'),
		'gamespot'
	),*/
	array(
		array('soundcloud.com'),
		array('soundcloud.php'),
		'soundcloud'
	),
	array(
		array('veoh.com'),
		array('veoh.php'),
		'veoh'
	),
	array(
		array('tv3.cat','324.cat','esport3.cat','3xl.cat','super3.cat'),
		array('tv3cat.php'),
		'tv3cat'
	),
	array(
		array('aragontelevision.es'),
		array('aragontv.php'),
		'aragontv'
	),
	array(
		array('canalsuralacarta.es','canalsur.es'),
		array('canalsuralacarta.php'),
		'canalsuralacarta'
	),
	array(
		array('rtvcm.es'),
		array('rtvcm.php'),
		'rtvcm'
	),
	array(
		array('rt.com'),
		array('rt.php'),
		'rt'
	),
	array(
		array('vtelevision.es'),
		array('vtelevision.php'),
		'vtelevision'
	),
	array(
		array('medici.tv'),
		array('medici.php'),
		'medici'
	),
	array(
		array('goear.com'),
		array('goear.php'),
		'goear'
	),
	array(
		array('canaldehistoria.es'),
		array('canaldehistoria.php'),
		'canaldehistoria'
	),
	array(
		array('adnstream.com'),
		array('adnstream.php'),
		'adnstream'
	),
	array(
		array('crtvg.es'),
		array('crtvg.php'),
		'crtvg'
	),
	array(
		array('mtv.es'),
		array('mtv.php'),
		'mtv'
	),
	array(
		array('eitb.com'),
		array('eitb.php'),
		'eitbcom'
	),
	array(
		array('intereconomia.com'),
		array('intereconomia.php'),
		'intereconomia'
	),
	array(
		array('vimeo.com'),
		array('vimeo.php'),
		'vimeo'
	),
	/*array(
		array('grooveshark.com'),
		array('grooveshark.php'),
		'grooveshark'
	),*/
	array(
		array('cope.es'),
		array('cope.php'),
		'cope'
	),
	array(
		array('cadenaser.com'),
		array('cadenaser.php'),
		'cadenaser'
	),
	array(
		array('televisa.com','esmas.com'),
		array('televisa.php'),
		'televisa'
	),
	array(
		array('eitb.com'),
		array('eitb.php'),
		'eitbcom'
	),
	array(
		array('eitb.tv'),
		array('eitb.php'),
		'eitbtv'
	),
	array(
		array('hogarutil.com'),
		array('hogarutil.php'),
		'hogarutil'
	),
	array(
		array('telemadrid.es', 'telemadrid2020.es'),
		array('telemadrid.php'),
		'telemadrid'
	),
	array(
		array('netd.com'),
		array('netdcom.php'),
		'netdcom'
	),
	array(
		array('telefe.com'),
		array('telefe.php'),
		'telefe'
	),
	array(
		array('toons.tv'),
		array('toonstv.php'),
		'toonstv'
	),
	array(
		array('youtube.com'),
		array('youtube.php','youtubehelper.php'),
		'youtubehelper'
	),
	array(
		array('youtu.be'),
		array('youtube.php','youtubehelper.php'),
		'youtubehelper_urlAcortada'
	),
	array(
		array('tvmelilla.es'),
		array('tvmelilla.php'),
		'tvmelilla'
	),
	array(
		array('tune.pk'),
		array('tunepk.php'),
		'tunepk'
	),
	array(
		array('ideal.es'),
		array('ideal.php'),
		'ideal'
	),
	array(
		array('magnovideo.com'),
		array('magnovideo.php'),
		'magnovideo'
	),
	array(
		array('vk.com'),
		array('vk.php'),
		'vk'
	),
	array(
		array('played.to'),
		array('playedto.php'),
		'playedto'
	),
	array(
		array('allmyvideos.net'),
		array('allmyvideosnet.php'),
		'allmyvideosnet'
	),
	array(
		array('dailymotion.com'),
		array('dailymotioncom.php'),
		'dailymotioncom'
	)
);


//hora de descargar y mostrar el resultado
//AVERIGUAR SERVIDOR
if($modo==1){
	$R = array();
	if(validar_enlace($web)){
		//La función anterior, si es exitosa, finaliza la web. Si falla (url de un server no válido o la función del canal se acabó antes de lo previsto, se ejecuta lo próximo
		$cadena_elegida_arr = averiguaCadena($web);
		if($cadena_elegida_arr===false){
			//no es una url aceptada de una web permitida
			setErrorWebIntera('Has introducido un enlace de una página web no soportada. Puedes consultar el listado de webs soportadas en el siguiente enlace:<br><a href="http://www.descargavideos.tv/faq#p_q_c_s_d">http://www.descargavideos.tv/faq#p_q_c_s_d</a>');
			
			//lanzaBusquedaGoogle();
		}
		else{
			if(url_exists_full($web, true)){
				dbug('enlace correcto (se pudo abrir la URL)=>'.$web);
				
				//Includes
				dbug('Incluyendo PHPs');
				for($k=0;$k<count($cadena_elegida_arr[1]);$k++){
					dbug('Incluyendo: '.$cadena_elegida_arr[1][$k]);
					include_once $cadena_elegida_arr[1][$k];
				}
				
				//Lanzar función cadena
				dbug('Lanzando función cadena: '.$cadena_elegida_arr[2]);
				dbug('--------------------------------------');
				$cadena_elegida_arr[2]();
				
				if($fallourlinterna==''){
					if(!isset($resultado['enlaces']) || count($resultado['enlaces'])==0){
						//no es una url aceptada de una web permitida
						setErrorWebIntera('No se pudo encontrar ningún video o audio.');
						dbug('URL correcta, de server soportado, pero no debería de haber nada dentro');
					}
				}
				
			}
			else{
				dbug('fallo al abrir la url=>'.$web);
				setErrorWebIntera('No se ha podido abrir el enlace o no es un enlace válido');
			}
		}
	}
	else{
		setErrorWebIntera('URL no válida');
		//lanzaBusquedaGoogle();
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
	for($i=0;$i<count($cadenas);$i++)
		for($j=0;$j<count($cadenas[$i][0]);$j++){
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

	// Quitar espacios y pasarlos a guiones (-) en rtpa.es
	if(enString($link, 'rtpa.es')){
		$link = strtr($link,' ','-');
	}

	// http://http//www....
	if(enString($link,'http//')){
		// http// esta en el enlace. Quitarlo
		$link = strtr($link, array('http//' => ''));
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

		// url_exists_full descarga la web para comprobar si es un enlace válido. De paso, guarda en web_descargada el resultado, para no tener que re-descargarlo inúltilmente
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

function template2($cual){
	global $path_plantilla;
	return file_get_contents($path_plantilla.$cual);
}



//$obtenido -> array con los resultados
//$asegurate -> boolean: verdadero=comprobar si los enlaces son válidos. Falso=no comprobar
function finalCadena($obtenido,$asegurate=true){
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
		if(defined('DEBUG')){
			echo 'Obtenido!';
			print_r($obtenido);

			$resultado=$obtenido;
			$R['BASE'] = $obtenido;

			generaR();
			
			exit;
		}
		else{
			$resultado=$obtenido;
			$R['BASE'] = $obtenido;

			generaR();
		}
	}
	else{
		dbug('Error!');
		
		global $web,$fallourlinterna;
		$fallourlinterna='Ha ocurrido un error.';
		$web='';
	}
}
?>