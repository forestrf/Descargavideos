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
<script type=\'text/javascript\' src=\'http://adk2cdn.cpmrocket.com/cpmrocket/scripts/smart/smart.js\'></script>',

	'Chitika 728x90' => '<script type="text/javascript">
  ( function() {
    if (window.CHITIKA === undefined) { window.CHITIKA = { \'units\' : [] }; };
    var unit = {"calltype":"async[2]","publisher":"forestrf","width":728,"height":90,"sid":"Chitika Default"};
    var placement_id = window.CHITIKA.units.length;
    window.CHITIKA.units.push(unit);
    document.write(\'<div id="chitikaAdBlock-\' + placement_id + \'"></div>\');
}());
</script>
<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>',

	'Chitika 550x250' => '<script type="text/javascript">
  ( function() {
    if (window.CHITIKA === undefined) { window.CHITIKA = { \'units\' : [] }; };
    var unit = {"calltype":"async[2]","publisher":"forestrf","width":550,"height":250,"sid":"Chitika Default"};
    var placement_id = window.CHITIKA.units.length;
    window.CHITIKA.units.push(unit);
    document.write(\'<div id="chitikaAdBlock-\' + placement_id + \'"></div>\');
}());
</script>
<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>'

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
