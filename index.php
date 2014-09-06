<?php



if(isset($_GET['debug']) || isset($_COOKIE['debug'])){
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	define('DEBUG',true);
}
else{
	error_reporting(0);
}
	


$encoding = $_SERVER['HTTP_ACCEPT_ENCODING'];



require_once 'definiciones.php';
require_once 'funciones.php';
require_once 'publis.php';
require_once 'funcionesIndex.php';
header('Content-Type: text/html; charset=UTF-8');



dbug('dbug activado');
dbug('<pre>');



//Indicamos el idioma. Es la carpeta a usar dentro de idiomas.
// define('IDIOMA', 'castellano');
seteaIdioma();



if(isset($_REQUEST["web64"])){
	$_REQUEST["web"] = base64_decode($_REQUEST["web64"]);
}



//url a descargar. Si hay algo toca descargar la url. Usar Request ya que puede venir por GET y POST
if(isset($_REQUEST["web"])){
	$web = $_REQUEST["web"];
	
	//En raras ocasiones se trata de un enlace url_encodeado por lo que lo desen_url_codeamos
	if(strpos($web,"http%3A") === 0 || strpos($web,"https%3A") === 0){
		$web = urldecode($web);
	}

}




//pagina. Ignorar si hay $web

if(isset($_GET["pag"])){
	$pag = esPagina("/".$_GET["pag"]);
}
elseif(!isset($pag)){
	$pag = esPagina($_SERVER["REQUEST_URI"]);
}


//$a = $_SERVER["REQUEST_URI"]
//$_SERVER["REQUEST_URI"] => "/changelog#contenido"
function esPagina($a){
	$paginas = array('lab','changelog','contacta','faq','agradecimientos','legal','donar');
	$pag = "";
	for($i = 0; $i<$i_t=count($paginas); $i++){
		if(strpos($a, $paginas[$i]) === 1){
			return $paginas[$i];
		}
	}
	return "";
}



//para el gestor. No será usado porque el gestor accede directamente a los servidores secundarios
//Ahora ya no hay server secundarios. Sí es utilizado
define('MODO_API', isset($_REQUEST['modoApi']));





/*
páginas ($pag):
	lab
	changelog
	gestor -> redireccion a lab
	contacta
	blog
	addon
	faq
	agradecimientos
*/



//no hay petición de ninguna web
$modo = 1;
if(isset($web)){
	$modo=isset($_REQUEST['modo'])?$_REQUEST['modo']:1;
	//Aparenta ser una url. Método del formulario de copia/pega o método antiguo o el pavo tiene la web antigua en cache...

	$aPaloSeco=1;
	chdir('secundario');
	require_once 'index.php';
	
	chdir("..");
}




preparaPagina($pag);

//Idiomas (en preparaPagina() tmbn se manejan)
include_once 'idiomas/'.IDIOMA.'/index.php';






//Leer Cookie para saber el modo para el css
$css_modo_cookie = isset($_COOKIE['Estilo_modo']) ? $_COOKIE['Estilo_modo'] : 'defaul';

if(!is_numeric($css_modo_cookie) || $css_modo_cookie<1 || $css_modo_cookie>10)
	$css_modo_cookie='default';

$css_modo = $css_modo_cookie=='default' ? 2 : $css_modo_cookie;









$cookie_modoEscritorio = isset($_COOKIE['modoEscritorio'])?true:false;
if($cookie_modoEscritorio){
	$is_mobile = false;
}
else{
	$is_mobile = false;
	if(isset($_SERVER['HTTP_USER_AGENT'])){
		$is_mobile = preg_match('@playstation|iphone|ipad|android|opera mini|blackberry|palm os|windows ce|windows mobile|palm|hiptop|avantgo|plucker|xiino|blazer|elaine|iris|3g_t|
		windows ce|opera mobi|windows ce; smartphone;|windows ce; iemobile|mini 9.5|vx1000|lge |m800|e860|u940|ux840|compal|wireless| mobi|ahong|lg380|lgku|lgu900|lg210|lg47|lg920|lg840|lg370|sam-r|mg50|s55|g83|t66|vx400|mk99|d615|d763|el370|sl900|mp500|samu3|
		samu4|vx10|xda_|samu5|samu6|samu7|samu9|a615|b832|m881|s920|n210|
		s700|c810|_h797|mobx|sk16d|848b|mowser|s580|r800|471x|v120|rim8|
		c500foma:|160x|x160|480x|x640|t503|w839|i250|sprint|w398samr810|
		m5252|c7100|mt126|x225|s5330|s820|htil-g1|fly v71|s302|-x113|novarra|
		k610i|-three|8325rc|8352rc|sanyo|vx54|c888|nx250|n120|mtk|
		c5588|s710|t880|c5005|i;458x|p404i|s210|c5100|teleca|s940|c500|s590
		|foma|samsu|vx8|vx9|a1000|_mms|myx|a700|gu1100|bc831|e300|ems100|
		me701|me702m-three|sd588|s800|8325rc|ac831|mw200|brew|d88|htc\/|
		htc_touch|355x|m50|km100|d736|p-9521|telco|sl74|ktouch|m4u\/|me702|
		8325rc|kddi|phone|lg|sonyericsson|samsung|240x|x320|vx10|nokia|sony
		cmd|motorola|up.browser|up.link|mmp|symbian|smartphone|midp|wap|
		vodafone|o2|pocket|kindle|mobile|psp|treo@i', $_SERVER['HTTP_USER_AGENT'] );
	}
}



if($is_mobile)
	require_once 'indexRenderMovil.php';
else
	require_once 'indexRenderEscritorio.php';



?>