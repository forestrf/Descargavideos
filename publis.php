<?php
$publisUsadas = array();

function getPubliJS($width, $height, $ignorePublisUsadas = false){
	global $publisUsadas;
	if (isset($publisUsadas[$width.'x'.$height]) && !$ignorePublisUsadas)
		return '';
	$publisUsadas[$width.'x'.$height] = true;
	return '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
		<SCRIPT SRC="http://ib.adnxs.com/ttj?id=8551763&size='.$width.'x'.$height.'" TYPE="text/javascript"></SCRIPT>
		<!-- END TAG -->';
}
function getPubliIFRAME($width, $height, $ignorePublisUsadas = false, $style = ''){
	global $publisUsadas;
	if (isset($publisUsadas[$width.'x'.$height]) && !$ignorePublisUsadas)
		return '';
	$publisUsadas[$width.'x'.$height] = true;
	return '<!-- BEGIN JS TAG - [Descargavideos] - Default < - DO NOT MODIFY -->
		<IFRAME SRC="http://ib.adnxs.com/tt?id=8551763&size='.$width.'x'.$height.'" FRAMEBORDER="0" SCROLLING="no" MARGINHEIGHT="0" MARGINWIDTH="0" TOPMARGIN="0" LEFTMARGIN="0" ALLOWTRANSPARENCY="true" WIDTH="'.$width.'" HEIGHT="'.$height.'" style="'.$style.'"></IFRAME>
		<!-- END TAG -->';
}
