<?php

if(!defined('DOMINIO'))
	define('DOMINIO', 'descargavideos.tv');

if(!defined('BOOKMARKLET'))
	define('BOOKMARKLET', "javascript:(function(){window.open('http://www.".DOMINIO."/web/bookmarklet/?web='+encodeURIComponent(location.href));})()");

if(!defined('MAX_ULTIMOS_VIDEOS_CALCULADOS'))
	define('MAX_ULTIMOS_VIDEOS_CALCULADOS', 25);

?>