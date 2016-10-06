<?php

if(!defined('DOMINIO'))
	define('DOMINIO', 'www.descargavideos.tv');

if(!defined('BOOKMARKLET'))
	define('BOOKMARKLET',
		"javascript:(function(){".
			"var f=document.createElement('form');".
				"f.setAttribute('method','post');".
				"f.setAttribute('target','_blank');".
				"f.setAttribute('action','//".DOMINIO."/web/bookmarklet/');".
			"var h=document.createElement('input');".
				"h.setAttribute('type','hidden');".
				"h.setAttribute('name','web');".
				"h.setAttribute('value',encodeURIComponent(location.href));".
			"f.appendChild(h);".
			"document.body.appendChild(f);".
			"f.submit();".
		"})()");
	define('BOOKMARKLET_V2', "javascript:(function(d,s){s=d.createElement('script');s.type='text/javascript';s.src='//".DOMINIO."/js/bookmarklet.js';d.body.appendChild(s)})(document)");

if(!defined('MAX_ULTIMOS_VIDEOS_CALCULADOS'))
	define('MAX_ULTIMOS_VIDEOS_CALCULADOS', 25);

?>