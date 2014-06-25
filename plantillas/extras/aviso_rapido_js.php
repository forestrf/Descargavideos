<span id="informaFalloRapido">Informar de resultado incorrecto</span>
<script>
	D.g('informaFalloRapido').onclick = function(){
		var prmpt = prompt("Estás a punto de informar que el resultado para el siguiente enlace es incorrecto:\n<?php echo strtr($web, array('script'=>'','"'=>'\\"'))?>"+"\n\nSi el fallo persiste pasado un tiempo, por favor usa el formulario de contacto.\n\nSi lo deseas, puedes incluir un comentario junto al aviso:\n","Insertar comentario...");
		if(prmpt !== null){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("POST","/flag.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('url='+encodeURIComponent('<?php echo $R['WEB'];?>')+'&comentario='+encodeURIComponent(prmpt));
			alert('Gracias por el aviso.\nRevisaremos el fallo lo antes posible');
		}
	};
</script>