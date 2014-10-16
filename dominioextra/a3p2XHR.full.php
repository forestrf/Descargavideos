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
<!DOCTYPE html>
<html>
<body>
<script>

function xhr(url, callbackOK, callbackFAIL) {
	var x;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		x = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		x = new ActiveXObject("Microsoft.XMLHTTP");
	}
	x.open('GET', url, true);
	x.timeout = 5000;
	x.onreadystatechange = x.ontimeout = function () {
		if (x.readyState == 4) {
			if (x.status == 200) {
				callbackOK(x.responseText);
			} else {
				callbackFAIL();
			}
		}
	};
	
	x.send();
}

function calculaA3P(data){
	if(data.indexOf("{") !== -1){
		data = JSON.parse(data);
		if(data != "" && data["result"] == "0"){
			mostrarResultado(data["resultDes"]);
			return true;
		}
	}
	return false;
}
function lanzaA3P(){
	xhr(
		"https://servicios.atresplayer.com/api/urlVideoLanguage/<?php echo $episode?>/web/<?php echo $episode?>|<?php echo $tiempo?>|<?php echo $hmac?>/es.json",
		procesaA3P2,
		procesaA3P2
	);
}
function procesaA3P2(data){
	if(!calculaA3P(data)){
		mostrarFallo();
	}
}

function mostrarResultado(entrada){
	window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":"'+entrada+'"}','*');
}

function mostrarFallo(){
	window.parent.postMessage('{"RESPUESTA_DV":"<?php echo $obj?>","CONTENIDO_DV":false}','*');
}


lanzaA3P();

</script>