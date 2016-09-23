<?php
/*
$publis=array(
	'300x250' => '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
<SCRIPT SRC="http://ib.adnxs.com/ttj?id=8551763&size=300x250" TYPE="text/javascript"></SCRIPT>
<!-- END TAG -->'
,
	'728x90' => '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
<SCRIPT SRC="http://ib.adnxs.com/ttj?id=8551763&size=728x90" TYPE="text/javascript"></SCRIPT>
<!-- END TAG -->'
,
	'728x90 2' => '<!-- BEGIN IFRAME TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
<IFRAME SRC="http://ib.adnxs.com/tt?id=8551763&size=728x90" FRAMEBORDER="0" SCROLLING="no" MARGINHEIGHT="0" MARGINWIDTH="0" TOPMARGIN="0" LEFTMARGIN="0" ALLOWTRANSPARENCY="true" WIDTH="728" HEIGHT="90"></IFRAME>
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
*/
function getPubliJS($width, $height){
	return '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
		<SCRIPT SRC="http://ib.adnxs.com/ttj?id=8551763&size='.$width.'x'.$height.'" TYPE="text/javascript"></SCRIPT>
		<!-- END TAG -->';
}
function getPubliIFRAME($width, $height){
	return '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
		<IFRAME SRC="http://ib.adnxs.com/tt?id=8551763&size='.$width.'x'.$height.'" FRAMEBORDER="0" SCROLLING="no" MARGINHEIGHT="0" MARGINWIDTH="0" TOPMARGIN="0" LEFTMARGIN="0" ALLOWTRANSPARENCY="true" WIDTH="'.$width.'" HEIGHT="'.$height.'"></IFRAME>
		<!-- END TAG -->';
}
