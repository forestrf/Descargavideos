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
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="0" height="0" id="descargador_archivos_id">
	<param name="movie" value="descargador_archivos.swf" />
	<param name="quality" value="high" />
	<param name="bgcolor" value="#000" />
	<param name="allowScriptAccess" value="always" />
	<!--[if !IE]>-->
	<embed src="descargador_archivos.swf" quality="high" bgcolor="#000" 
		width="0" height="0" name="descargador_archivos" align="middle" 
		play="true" loop="true" quality="high" allowScriptAccess="always" 
		type="application/x-shockwave-flash" 
		pluginspage="http://www.macromedia.com/go/getflashplayer">
	</embed>
	<!--<![endif]-->
</object>
<script>


function preLanzaA3P(){
	if(typeof DESCARGADOR_ARCHIVOS_SWF === "undefined"){
		setTimeout(preLanzaA3P, 200);
	}
	else if(DESCARGADOR_ARCHIVOS_SWF === true){
		lanzaA3P()
	}
}
function calculaA3P(data){
	if(data.indexOf("{") !== -1){
		data = JSON.parse(data);
		if(data != "" && data["result"] == "0"){
			mostrarResultado(data["resultDes"]);
			return true;
		}
	}
	else if(data != "" && data.indexOf("<resultDes>OK</resultDes>")!==-1 && data.indexOf("http")!==-1){
		mostrarResultado(data.slice(data.indexOf("http")).split("<")[0].replace("&amp;","&"));
		return true;
	}
	return false;
}
function lanzaA3P(){
	getFlashMovie("descargador_archivos").CargaWeb({
		"url":"https://servicios.atresplayer.com/api/urlVideoLanguage/<?php echo $episode?>/android_tablet/<?php echo $episode?>|<?php echo $tiempo?>|<?php echo $hmac?>/es.json",
		"metodo":"GET"
	}, "procesaA3P1");
}
function procesaA3P1(data){
	if(!calculaA3P(data)){
		getFlashMovie("descargador_archivos").CargaWeb({
			"url":"http://servicios.atresplayer.com/api/urlVideo/<?php echo $episode?>/android_tablet/<?php echo $episode?>|<?php echo $tiempo?>|<?php echo $hmac?>",
			"metodo":"GET"
		}, "procesaA3P2");
	}
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


function getFlashMovie(m){var isIE=navigator.appName.indexOf("Microsoft")!=-1;return (isIE)?window[m+'_id']:document[m];}


preLanzaA3P();

</script>