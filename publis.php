<?php
$publisUsadas = array();

function getPubliJS($width, $height, $ignorePublisUsadas = false){
	return "";
	global $publisUsadas;
	if (isset($publisUsadas[$width.'x'.$height]) && !$ignorePublisUsadas)
		return '';
	$publisUsadas[$width.'x'.$height] = true;
	return '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
		<SCRIPT SRC="//ib.adnxs.com/ttj?id=8551763&size='.$width.'x'.$height.'" TYPE="text/javascript"></SCRIPT>
		<!-- END TAG -->';
}
function getPubliIFRAME($width, $height, $ignorePublisUsadas = false, $style = ''){
	return "";
	global $publisUsadas;
	$ignorePublisUsadas = true;
	if (isset($publisUsadas[$width.'x'.$height]) && !$ignorePublisUsadas)
		return '';
	$publisUsadas[$width.'x'.$height] = true;
	return '<!-- Begin Adversal 728x90 - descargavideos.tv Code -->
		<SCRIPT SRC="http://go.adversal.com/ttj?id=9891541&size=728x90&promo_sizes=468x60,320x50,300x50,216x36" TYPE="text/javascript"></SCRIPT>
		<!-- End Adversal 728x90 - descargavideos.tv Code -->';
	return '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
		<IFRAME SRC="//ib.adnxs.com/tt?id=8551763&size='.$width.'x'.$height.'" FRAMEBORDER="0" SCROLLING="no" MARGINHEIGHT="0" MARGINWIDTH="0" TOPMARGIN="0" LEFTMARGIN="0" ALLOWTRANSPARENCY="true" WIDTH="'.$width.'" HEIGHT="'.$height.'" style="'.$style.'"></IFRAME>
		<!-- END TAG -->';
}
