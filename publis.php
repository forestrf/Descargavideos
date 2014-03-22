<?php
$publis=array(
	0=>'<script type="text/javascript"><!--
google_ad_client = "ca-pub-1209387661883940";
/* Banner pagina principal */
google_ad_slot = "6314077409";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>',
	1=>'<script type="text/javascript"><!--
google_ad_client = "ca-pub-1209387661883940";
/* Banner pagina resultados grande */
google_ad_slot = "3949236667";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>'
);
$publisUsadas=array();
function getPubli($i){
	global $publis, $publisUsadas, $PUBLICIDAD;
	if(!isset($publisUsadas[$i])){
		$publisUsadas[$i]=true;
		return $publis[$i];
	}
	else
		return "<!--nope-->";
}
?>