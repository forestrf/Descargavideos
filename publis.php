<?php
$publisUsadas = array();

$publis=array(
	'336x280' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Banner pagina resultados grande -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-1209387661883940"
     data-ad-slot="3949236667"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>'
,

	'300x250' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Banner pagina resultados -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-1209387661883940"
     data-ad-slot="7855372317"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>'
,

	'728x90' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Banner pagina principal -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-1209387661883940"
     data-ad-slot="6314077409"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>'

);

function getPubli($i){
	global $publis, $publisUsadas;
	//return '';
	return $publis[$i];
}

function getPubliJS($width, $height, $ignorePublisUsadas = false){
	global $publisUsadas;
	if (isset($publisUsadas[$width.'x'.$height]) && !$ignorePublisUsadas)
		return '';
	$publisUsadas[$width.'x'.$height] = true;
	return getPubli($width.'x'.$height);
	return '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
		<SCRIPT SRC="http://ib.adnxs.com/ttj?id=8551763&size='.$width.'x'.$height.'" TYPE="text/javascript"></SCRIPT>
		<!-- END TAG -->';
}
function getPubliIFRAME($width, $height, $ignorePublisUsadas = false, $style = ''){
	global $publisUsadas;
	if (isset($publisUsadas[$width.'x'.$height]) && !$ignorePublisUsadas)
		return '';
	$publisUsadas[$width.'x'.$height] = true;
	return getPubli($width.'x'.$height);
	return '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
		<IFRAME SRC="http://ib.adnxs.com/tt?id=8551763&size='.$width.'x'.$height.'" FRAMEBORDER="0" SCROLLING="no" MARGINHEIGHT="0" MARGINWIDTH="0" TOPMARGIN="0" LEFTMARGIN="0" ALLOWTRANSPARENCY="true" WIDTH="'.$width.'" HEIGHT="'.$height.'" style="'.$style.'"></IFRAME>
		<!-- END TAG -->';
}
