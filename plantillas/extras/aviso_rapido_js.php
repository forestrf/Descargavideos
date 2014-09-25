<?php
	$web_escapado = strtr($R['WEB'], array('script'=>'','"'=>'\\"','\\'=>'\\\\"'));
?>
<span id="informaFalloRapido">Informar de resultado incorrecto</span>
<script>
	D.g('informaFalloRapido').onclick = function(){
		var prmpt = prompt("Está a punto de informar que hay un problema con el resultado para el siguiente enlace:\n<?php echo $web_escapado?>\n\nSe recomienda usar el formulario de contacto.\n\nSi lo deseas, puedes incluir un comentario junto al aviso (Si indicas tu correo electrónico podremos contestarte):\n","Insertar comentario (indique su correo si es posible)...");
		if(prmpt !== null){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("POST","/flag.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('url='+encodeURIComponent("<?php echo $web_escapado;?>")+'&comentario='+encodeURIComponent(prmpt));
			alert('Gracias por el aviso.\nRevisaremos el fallo lo antes posible');
		}
	};
</script>