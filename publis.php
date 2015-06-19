<?php
$publis=array(
	'cpmrocket 728x90' => '<!--Copy and paste the code below into the location on your website where the ad will appear.-->
<script type=\'text/javascript\'>
var adParams = {a: \'65851155\', size: \'728x90\',serverdomain: \'adk2trk2.cpmrocket.com\'  ,context:\'c65861171\' };
</script>
<script type=\'text/javascript\' src=\'http://adk2cdn.cpmrocket.com/cpmrocket/scripts/smart/smart.js\'></script>',

	'cpmrocket 290x58' => '<!--Copy and paste the code below into the location on your website where the ad will appear.-->
<script type=\'text/javascript\'>
var adParams = {a: \'65851155\', size: \'290x58\',serverdomain: \'adk2trk2.cpmrocket.com\'  ,context:\'c65861171\' };
</script>
<script type=\'text/javascript\' src=\'http://adk2cdn.cpmrocket.com/cpmrocket/scripts/smart/smart.js\'></script>'

);

$publisUsadas = array();

function getPubli($i){
	//return '';
	global $publis, $publisUsadas, $PUBLICIDAD;
	if(!isset($publisUsadas[$i])){
		$publisUsadas[$i]=true;
		return $publis[$i];
	}
	else
		return "<!--nope-->";
}
