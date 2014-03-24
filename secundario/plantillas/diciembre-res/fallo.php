<div class="error_res"><?php echo $R['error_texto'];?></div>
<span id="informaFalloRapido">Informar de resultado incorrecto</span>
<script>
document.getElementById('informaFalloRapido').onclick = function(){
	if(confirm("Estás a punto de informar de un resultado incorrecto.\n¿Es incorrecto el resultado mostrado?")){
		var iframe = document.createElement('iframe');
		iframe.src = '/flag.php?url='+encodeURIComponent('<?php echo $R['WEB'];?>');
		document.body.appendChild(iframe);
		alert('Gracias por el aviso.\nRevisaremos el fallo lo antes posible');
	}
};

_gaq.push(["_trackEvent","Descargas","Fallidas","Versión sin info extra"]);</script>