<?php
$publis=array(
	'720x90 epom' => '<!-- BEGIN TAG - DO NOT MODIFY -->
<script type="text/javascript">
//<![CDATA[
epom_key = "00271353c5ccf16e930a95d8f6889c90";
epom_channel = "";
epom_code_format = "ads-sync.js";
epom_ads_host = "//www.adshost2.com";
epom_click = "";
epom_custom_params = {};

document.write("<script type=\'text\/javascript\' src=\'"+(location.protocol == \'https:\' ? \'https:\' : \'http:\') + "//www.adshost2.com\/js/show_ads.js\'><\/script>");
//]]>
</script>
<!-- END TAG -->',

	'300x250 epom' => '<!-- BEGIN TAG - DO NOT MODIFY -->
<script type="text/javascript">
//<![CDATA[
epom_key = "c8048db413e0658a3b82fac3a9d47cdd";
epom_channel = "";
epom_code_format = "ads-sync.js";
epom_ads_host = "//www.adshost2.com";
epom_click = "";
epom_custom_params = {};

document.write("<script type=\'text\/javascript\' src=\'"+(location.protocol == \'https:\' ? \'https:\' : \'http:\') + "//www.adshost2.com\/js/show_ads.js\'><\/script>");
//]]>
</script>
<!-- END TAG -->',

	'rascacielos' => ''
);

$publisUsadas = array();

function getPubli($i){
	return '';
	global $publis, $publisUsadas, $PUBLICIDAD;
	if(!isset($publisUsadas[$i])){
		$publisUsadas[$i]=true;
		return $publis[$i];
	}
	else
		return "<!--nope-->";
}
