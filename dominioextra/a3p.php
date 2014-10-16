<?php
if(
	strpos($_SERVER['HTTP_REFERER'], 'http://www.descargavideos.tv') !== 0 &&
	strpos($_SERVER['HTTP_REFERER'], 'http://localhost/') !== 0
)
	exit;

$obj     = $_GET['o'];
$episode = $_GET['e'];
$tiempo  = $_GET['t'];
$hmac    = $_GET['h'];

?>
<!DOCTYPE html><html><body><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="0" height="0" id="descargador_archivos_id"><param name="movie" value="descargador_archivos.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000" /><param name="allowScriptAccess" value="always" /><!--[if !IE]>--><embed src="descargador_archivos.swf" quality="high" bgcolor="#000" width="0" height="0" name="descargador_archivos" align="middle" play="true" loop="true" quality="high" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed><!--<![endif]--></object><script>function A(){"undefined"===typeof DESCARGADOR_ARCHIVOS_SWF?setTimeout(A,200):!0===DESCARGADOR_ARCHIVOS_SWF&&B()}function C(a){if(-1!==a.indexOf("{")){if(a=JSON.parse(a),""!=a&&"0"==a.result)return D(a.resultDes),!0}else if(""!=a&&-1!==a.indexOf("<resultDes>OK</resultDes>")&&-1!==a.indexOf("http"))return D(a.slice(a.indexOf("http")).split("<")[0].replace("&amp;","&")),!0;return!1} function B(){F("descargador_archivos").CargaWeb({url:"https://servicios.atresplayer.com/api/urlVideoLanguage/<?php echo $episode?>/android_tablet/<?php echo $episode?>|<?php echo $tiempo?>|<?php echo $hmac?>/es.json",metodo:"GET"},"procesaA3P1")}function procesaA3P1(a){C(a)||F("descargador_archivos").CargaWeb({url:"http://servicios.atresplayer.com/api/urlVideo/<?php echo $episode?>/android_tablet/<?php echo $episode?>|<?php echo $tiempo?>|<?php echo $hmac?>",metodo:"GET"},"procesaA3P2")} function procesaA3P2(a){C(a)||E()}function D(a){window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":"'+a+'"}',"*")}function E(){window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":false}',"*")}function F(a){return-1!=navigator.appName.indexOf("Microsoft")?window[a+"_id"]:document[a]}A();</script>