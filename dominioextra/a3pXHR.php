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
<!DOCTYPE html><html><body><script>function E(a,b,c){var x;if(window.XMLHttpRequest){x=new XMLHttpRequest();}else{x=new ActiveXObject("Microsoft.XMLHTTP");}x.open('GET',a,true);x.timeout=5000;x.onreadystatechange=x.ontimeout=function(){if(x.readyState==4){if(x.status==200)b(x.responseText);else c();}};x.send()}function A(a){if(a.indexOf("{")!==-1){a=JSON.parse(a);if(a!=""&&a["result"]=="0"){B(a["resultDes"]);return true;}}else if(a!=""&&a.indexOf("<resultDes>OK</resultDes>")!==-1&&a.indexOf("http")!==-1){B(a.slice(a.indexOf("http")).split("<")[0].replace("&amp;","&"));return true;}return false;}function D(){E("https://servicios.atresplayer.com/api/urlVideoLanguage/<?php echo $episode?>/android_tablet/<?php echo $episode?>|<?php echo $tiempo?>|<?php echo $hmac?>/es.json",F,F);}function F(a){if(!A(a)){E("http://servicios.atresplayer.com/api/urlVideo/<?php echo $episode?>/android_tablet/<?php echo $episode?>|<?php echo $tiempo?>|<?php echo $hmac?>",G,G);}}function G(a){if(!A(a)){C();}}function B(a){window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":"'+a+'"}','*');}function C(){window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":false}','*');}D();</script>