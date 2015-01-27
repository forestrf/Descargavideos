<?php
	require_once '../../funciones.php';
?>
<script src="/js/funciones.min.js"></script>

<form>
	<input type="text" id="url" placeholder="url" size="50"/>
	<input type="button" value="Submit" onclick="xhr_swf(D.g('url').value)"/>
</form>

<textarea id="resultado"></textarea>
<div id="enlaces"></div>

<script>
	function xhr_swf(url){
		if(typeof DESCARGADOR_ARCHIVOS_SWF === "undefined"){
			setTimeout(function(){xhr_swf(url)}, 200)
		}
		else if(DESCARGADOR_ARCHIVOS_SWF === true){
			getFlashMovie("descargador_archivos").CargaWeb({
				"url":url
				,"metodo":"GET"
			}, "imprime");
		}
	}
	
	function imprime(txt){
		D.g("resultado").value += txt;
	}
	
	if(typeof descargador_archivos === "undefined"){
		D.g("enlaces").innerHTML += '<?=genera_swf_object('/util/fla/f/player.swf')?>';
		var descargador_archivos = D.g("descargador_archivos");
	}
</script>





