<?php

if(!defined('Dominio'))
	define('Dominio', 'descargavideos.tv');

if(!defined('BOOKMARKLET'))
	define('BOOKMARKLET', "javascript:(function(){window.open('http://www.".Dominio."/web/bookmarklet/?web='+encodeURIComponent(location.href));})()");

?>