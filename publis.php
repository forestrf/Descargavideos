<?php
$publis=array(
	'exoclick banner resultados' => '<script type="text/javascript">
var ad_idzone = "1333964",
	 ad_width = "300",
	 ad_height = "250";
</script>
<script type="text/javascript" src="https://ads.exoclick.com/ads.js"></script>
<noscript><a href="http://main.exoclick.com/img-click.php?idzone=1333964" target="_blank"><img src="https://syndication.exoclick.com/ads-iframe-display.php?idzone=1333964&output=img&type=300x250" width="300" height="250"></a></noscript>'

);

$publisUsadas = array();

function getPubli($i){
	global $publis, $publisUsadas, $PUBLICIDAD;
	return '';
	if(isset($publis[$i]) && !isset($publisUsadas[$i])){
		$publisUsadas[$i]=true;
		return $publis[$i];
	}
	else
		return "<!--nope-->";
}
