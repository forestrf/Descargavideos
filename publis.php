<?php
$publis=array(
/*
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

	'rascacielos' => '',
*/
	'yepdigital 300x250' => '<!-- Placement: 300x250, Size: 300x250, Type: Banner -->
<!--Copy and paste the code below into the location on your website where the ad will appear.-->
<script type=\'text/javascript\'>
var adParams = {a: \'58921111\', size: \'300x250\',serverdomain: \'ads.adservhere.com\'  ,context:\'c58831098\' };
</script>
<script type=\'text/javascript\' src=\'http://cdn.adservhere.com/yepdigital/scripts/smart/smart.js\'></script>',

	'yepdigital 468x60' => '<!-- Placement: 468x60, Size: 468x60, Type: Banner -->
<!--Copy and paste the code below into the location on your website where the ad will appear.-->
<script type=\'text/javascript\'>
var adParams = {a: \'58921111\', size: \'468x60\',serverdomain: \'ads.adservhere.com\'  ,context:\'c58941095\' };
</script>
<script type=\'text/javascript\' src=\'http://cdn.adservhere.com/yepdigital/scripts/smart/smart.js\'></script>',

	'yepdigital 468x60 (2)' => '<!-- Placement: 468x60 (2), Size: 468x60, Type: Banner -->
<!--Copy and paste the code below into the location on your website where the ad will appear.-->
<script type=\'text/javascript\'>
var adParams = {a: \'58921111\', size: \'468x60\',serverdomain: \'ads.adservhere.com\'  ,context:\'c58931094\' };
</script>
<script type=\'text/javascript\' src=\'http://cdn.adservhere.com/yepdigital/scripts/smart/smart.js\'></script>'
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
