<?php

if(!defined('DOMINIO'))
	define('DOMINIO', 'descargavideos.tv');

if(!defined('BOOKMARKLET'))
	define('BOOKMARKLET', "javascript:(function(){window.open('http://www.".DOMINIO."/web/bookmarklet/?web='+encodeURIComponent(location.href));})()");
	define('BOOKMARKLET_V2', "javascript:(function(d,s){s=d.createElement('script');s.type='text/javascript';s.src='//www.".DOMINIO."/js/bookmarklet.js';d.body.appendChild(s)})(document)");

if(!defined('MAX_ULTIMOS_VIDEOS_CALCULADOS'))
	define('MAX_ULTIMOS_VIDEOS_CALCULADOS', 25);

?>