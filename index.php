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



if(isset($_POST["web64"])){
	$_POST["web"] = base64_decode($_POST["web64"]);
}


if(defined('DEBUG') && isset($_GET["web"])) {
	dbug('Web sacada de GET (debug) a POST');
	$_POST['web'] = $_GET['web'];
}
if(isset($_GET["webdebug"])) {
	dbug('Web sacada de GET (webdebug) a POST');
	$_POST['web'] = $_GET['webdebug'];
}

if (isset($_GET['web']) || isset($_GET['web64'])) {
	header('Location: /404', true, 301);
	exit;
}


//url a descargar. Si hay algo toca descargar la url. Usar Request ya que puede venir por GET y POST
if(isset($_POST["web"])){
	$web = $_POST["web"];
	
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
define('MODO_API', isset($_GET['modoApi']));





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






//Idiomas (en preparaPagina() tmbn se manejan)
include_once 'idiomas/'.IDIOMA.'/index.php';

preparaPagina($pag);





//no hay petición de ninguna web
$modo = 1;
if(isset($web)){
	$modo=isset($_REQUEST['modo'])?$_REQUEST['modo']:1;
	if($modo !== '1' && $modo !== '2'){
		$modo = 1;
	}
	//Aparenta ser una url. Método del formulario de copia/pega o método antiguo o el pavo tiene la web antigua en cache...

	if (chdir('secundario')) {
		// Aunque chdir cambia la ruta, incluir index.php no incluye secundario/index.php sino index.php, el php en el que estamos ahora mismo. Cambiar el nombre a secundario/index.php también lo arregla
		require_once __DIR__.'/secundario/index.php';
		chdir("..");
	} else {
		dbug('No se puede ir a la carpeta secundario');
	}
}






//Leer Cookie para saber el modo para el css
$css_modo_cookie = isset($_COOKIE['Estilo_modo']) ? $_COOKIE['Estilo_modo'] : 'defaul';

if(!is_numeric($css_modo_cookie) || $css_modo_cookie<1 || $css_modo_cookie>10)
	$css_modo_cookie='default';

$css_modo = $css_modo_cookie=='default' ? 2 : $css_modo_cookie;






if(MODO_API)
	require_once 'indexRenderApi.php';
else if(isset($_GET['ajax']))
	require_once 'indexRenderAjax.php';
else
	require_once 'indexRenderEscritorio.php';



?>