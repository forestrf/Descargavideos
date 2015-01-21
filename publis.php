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
	global $publis, $publisUsadas, $PUBLICIDAD;
	if(!isset($publisUsadas[$i])){
		$publisUsadas[$i]=true;
		return $publis[$i];
	}
	else
		return "<!--nope-->";
}
