<?php
$publis=array(
	'banner largo' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
	style="display:inline-block;width:728px;height:90px"
	data-ad-client="ca-pub-1209387661883940"
	data-ad-slot="6314077409"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>',

	'banner largo adstract' => "<!-- Placement: www.descargavideos.tv, Size: 728x90, Type: Banner -->
<!--Copy and paste the code below into the location on your website where the ad will appear.-->
<script type='text/javascript'>
var adParams = {p: '55961161', size: '728x90', serverdomain: 'adstract' , ap:'1300'  };
</script>
<script type='text/javascript' src='http://cdn.adk2.com/adstract/tags/xbanner/xbanner.js?ap=1300'></script>",

	'boton adstract' => '<a href="http://cdn.adstract.com/adstract/tags/xdirect/xdirect.html?p=55112590&serverdomain=adstrac&ct=html&ap=1304&cb=[CACHEBUSTER]" target="_blank"><img src="http://cdn.adstract.com/adstract/creatives/54624818" alt="" width="199" height="34" /></a>',

	'cuadrado grande' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
	style="display:inline-block;width:336px;height:280px"
	data-ad-client="ca-pub-1209387661883940"
	data-ad-slot="3949236667"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>',

	'rascacielos' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
	style="display:inline-block;width:300px;height:600px"
	data-ad-client="ca-pub-1209387661883940"
	data-ad-slot="6862806668"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>'
);

$publisUsadas = array();

function getPubli($i){
	return ''; // Publicidad deshabilitada temporalmente
	global $publis, $publisUsadas, $PUBLICIDAD;
	if(!isset($publisUsadas[$i])){
		$publisUsadas[$i]=true;
		return $publis[$i];
	}
	else
		return "<!--nope-->";
}
