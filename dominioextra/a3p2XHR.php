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
<!DOCTYPE html><html><body><script>function E(a,b,c){var x;if(window.XMLHttpRequest){x=new XMLHttpRequest();}else{x=new ActiveXObject("Microsoft.XMLHTTP");}x.open('GET',a,true);x.timeout=5000;x.onreadystatechange=x.ontimeout=function(){if(x.readyState==4){if(x.status==200)b(x.responseText);else c();}};x.send()}function A(a){if(a.indexOf("{")!==-1){a=JSON.parse(a);if(a!=""&&a["result"]=="0"){D(a["resultDes"]);return true;}}return false;}function C(){E("https://servicios.atresplayer.com/api/urlVideoLanguage/<?php echo $episode?>/web/<?php echo $episode?>|<?php echo $tiempo?>|<?php echo $hmac?>/es.json",B,B);}function B(a){if(!A(a)){F();}}function D(a){window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":"'+a+'"}','*');}function F(){window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":false}','*');}C();</script>