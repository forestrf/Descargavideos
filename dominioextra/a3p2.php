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
<!DOCTYPE html><html><body><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="0" height="0" id="descargador_archivos_id"><param name="movie" value="descargador_archivos.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000" /><param name="allowScriptAccess" value="always" /><!--[if !IE]>--><embed src="descargador_archivos.swf" quality="high" bgcolor="#000" width="0" height="0" name="descargador_archivos" align="middle" play="true" loop="true" quality="high" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed><!--<![endif]--></object><script>function A(){if(typeof DESCARGADOR_ARCHIVOS_SWF==="undefined"){setTimeout(A,200);}else if(DESCARGADOR_ARCHIVOS_SWF===true){B()}}function C(a){if(a.indexOf("{")!==-1){a=JSON.parse(a);if(a!=""&&a.result=="0"){D(a.resultDes);return true;}}return false;}function B(){G("descargador_archivos").CargaWeb({"url":"https://servicios.atresplayer.com/api/urlVideoLanguage/<?php echo $episode?>/web/<?php echo $episode?>|<?php echo $tiempo?>|<?php echo $hmac?>/es.json","metodo":"GET"},"E");}function E(a){if(!C(a)){F();}}function D(a){window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":"'+a+'"}','*');}function F(){window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":false}','*');}function G(m){var a=navigator.appName.indexOf("Microsoft")!=-1;return (a)?window[m+'_id']:document[m];}A();</script>