<?php
$publis=array(
	'300x250' => '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
<SCRIPT SRC="http://ib.adnxs.com/ttj?id=8551763&size=300x250" TYPE="text/javascript"></SCRIPT>
<!-- END TAG -->'
,
	'728x90' => '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
<SCRIPT SRC="http://ib.adnxs.com/ttj?id=8551763&size=728x90" TYPE="text/javascript"></SCRIPT>
<!-- END TAG -->'

);

$publisUsadas = array();

function getPubli($i){
	global $publis, $publisUsadas, $PUBLICIDAD;
	//return '';
	if(isset($publis[$i]) && !isset($publisUsadas[$i])){
		$publisUsadas[$i]=true;
		return $publis[$i];
	}
	else
		return "<!--nope-->";
}
