<div class="titulo_res">
	<img class="img" id="imagen_res" alt="Imagen miniatura del vídeo" src="<?php echo $R['url_img_res'];?>">
	<span id="titulo_res" aria-label="Título del vídeo"><?php echo $R['titulo_res'];?></span><br/>
	<div class="descripcion_res" id="descripcion_res"><?php echo $R['descripcion_res'];?></div>
</div>
<nav id="enlaces" class="bloque" aria-label="Listado de enlaces encontrados">

<?php
// Aquí va la selección de qué tipo de resultado(s) van para luego completarlos
generaInnerResultado();
?>

</nav>

<div class="infoExtraResultado bloque">
	<?php if(isset($R['alerta_especifica'])){ ?>
		<div class="alerta_especifica"><?php echo $R['alerta_especifica'];?></div>
	<?php } ?>
	
	<div class="instrucciones_descarga">
		<b>Cómo descargar:</b><br/>
		Clic derecho sobre el botón naranja, clic sobre "Guardar enlace Como...".<br/>
		<a href="http://www.youtube.com/watch?v=7-Xvmz-jNrg">Ver en YouTube cómo descargar un enlace.</a>
	</div>
	
	<!--
	<div class="instrucciones_descarga">
		Al clicar en el siguiente botón se abrirá una página web con publicidad. Mientras visitas dicha web:<br/>
		<ul style="list-style:inside;list-style-type:square;padding:10px;">
			<li>No instales ningún programa. Ni añadas ningún complemento.</li>
			<li>No des ningún dato (nombre, número de teléfono, etc).</li>
			<li>No pagues dinero. Si es demasiado bueno para ser cierto, no es cierto.</li>
			<li>Si estás en el ordenador y no puedes cerrar la página de publicidad, apreta a la vez las teclas <b>ALT</b> y <b>F4</b>.</li>
		</ul>
		
		<a target="_blank" class="bookmarklet" style="margin:25px;display:inline-block;" href="https://www.megdexchange.com/jump/next.php?r=2213175">Soporta Descargavideos clicando aquí</a><br/>
		
		Esto es un experimento para financiar Descargavideos. Si surge algún problema, por favor contáctame usando el <a href="/contacta#contenido">formulario de contacto</a>.
	</div>
	-->
	
	<?php /* Publi añadida 8/dic/2020 */ ?>
	<?php if (!isset($_GET['ajax'])) { ?>
		<?php if (ADS) { ?>
		<div>
			<center>
			</center>
		</div>
		<?php } ?>
	<?php } ?>
	
	<?php
	if(!defined('IGNORA_AVISO_RAPIDO')) include 'plantillas/extras/aviso_rapido_js.php'
	?>
</div>

<script>
	aC(D.g("cabecera"), "conresultado");
	
	ga('send', 'event', "Descargas Realizadas","<?php echo $R['CANAL'];?>");
	ga('send', 'event', "Descargas URL",<?=json_encode($web)?>);
</script>
