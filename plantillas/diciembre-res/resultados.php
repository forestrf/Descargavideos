<script>
	ga('send', 'event', "Descargas Realizadas","<?php echo $R['CANAL'];?>");
	ga('send', 'event', "Descargas URL",<?=json_encode($web)?>);
	
	aC(D.g("cabecera"), "conresultado");
</script>

<div class="titulo_res">
	<span id="titulo_res"><?php echo $R['titulo_res'];?></span><br/>
	<div class="descripcion_res" id="descripcion_res"><?php echo $R['descripcion_res'];?></div>
</div>
<div id="enlaces" class="bloque">

<?php
// Aquí va la selección de qué tipo de resultado(s) van para luego completarlos
generaInnerResultado();
?>

</div>

<div class="infoExtraResultado bloque">
	<?php if(isset($R['alerta_especifica'])){ ?>
		<div class="alerta_especifica"><?php echo $R['alerta_especifica'];?></div>
	<?php } ?>
	
	<div class="instrucciones_descarga">
		<b>Cómo descargar:</b><br/>
		Clic derecho sobre el botón naranja, clic sobre "Guardar enlace Como...".<br/>
		<a href="http://www.youtube.com/watch?v=7-Xvmz-jNrg">Ver en YouTube cómo descargar un enlace.</a>
	</div>
	
	<?php
	if(!defined('IGNORA_AVISO_RAPIDO')) include 'plantillas/extras/aviso_rapido_js.php'
	?>
</div>
