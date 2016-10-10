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


if(!defined('IS_MOBILE'))
	define('IS_MOBILE', isset($_SERVER['HTTP_USER_AGENT']) && preg_match('@playstation|iphone|ipad|android|opera mini|blackberry|palm os|windows ce|windows mobile|palm|hiptop|avantgo|plucker|xiino|blazer|elaine|iris|3g_t|
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
		vodafone|o2|pocket|kindle|mobile|psp|treo@i', $_SERVER['HTTP_USER_AGENT'] ));

if(!defined('ADS')) {
	$wantedAdStatus = false;
	define('ADS', !IS_MOBILE && $wantedAdStatus);
}

?>