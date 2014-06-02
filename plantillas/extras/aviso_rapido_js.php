<span id="informaFalloRapido">Informar de resultado incorrecto</span>
<script>
	D.g('informaFalloRapido').onclick = function(){
		var prmpt = prompt("Estás a punto de informar que el resultado para el siguiente enlace es incorrecto:\n<?php echo strtr($web, array('script'=>'','"'=>'\\"'))?>"+"\n\nSi lo deseas, puedes incluir un comentario junto al aviso:\n","Insertar comentario...");
		if(prmpt !== null){
			var iframe = document.createElement('iframe');
			iframe.src = '/flag.php?url='+encodeURIComponent('<?php echo $R['WEB'];?>')+'&comentario='+encodeURIComponent(prmpt);
			document.body.appendChild(iframe);
			alert('Gracias por el aviso.\nRevisaremos el fallo lo antes posible');
		}
	};
</script>