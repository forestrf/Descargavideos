<?php
include_once 'definiciones.php';
include_once 'funciones.php';

// Mirar el referer. Si es adfly o linkbucks (Por mirar cuales más hay. Redirigir a mi adfly).
// En caso de que sea mi adfly, continuar la marcha normal



if(
	
	isset($_SERVER['HTTP_REFERER']) &&
	strpos($_SERVER['HTTP_REFERER'],'http://adf.ly/3649838/') === false &&
	(
		//Adf.ly
		strpos($_SERVER['HTTP_REFERER'],'adf.ly') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'q.gs') !== false ||
	
		//Linkbuks
		strpos($_SERVER['HTTP_REFERER'],'linkbucks.com') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'any.gs') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'cash4links.co') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'cash4files.com') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'dyo.gs') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'filesonthe.net') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'goneviral.com') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'megaline.co') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'miniurls.co') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'qqc.co') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'seriousdeals.net') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'theseblogs.com') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'theseforums.com') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'tinylinks.co') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'tubeviral.com') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'tubeviral.com') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'ultrafiles.net') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'urlbeat.net') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'whackyvidz.com') !== false ||
		strpos($_SERVER['HTTP_REFERER'],'yyv.co') !== false
		//strpos($_SERVER['HTTP_REFERER'],) !== false ||
	)
){
	header("HTTP/1.1 302 Moved Temporarily");
	header('Location: http://adf.ly/3649838/'.urlencode('http://www.descargavideos.tv'.$_SERVER['REQUEST_URI']));
	exit;
}




chdir('secundario');
include_once 'mitele_handler.php';
?>





