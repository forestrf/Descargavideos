<?php include 'plantillas/extras/aviso_rapido_js.php'?>

<script>_gaq.push(["_trackEvent","Descargas","Realizadas","<?php echo $R['CANAL'];?>"]);</script>

<img class="img bloque"  id="imagen_res" src="<?php echo $R['url_img_res'];?>">

<div class="titulo_res bloque">
	<span id="titulo_res"><?php echo $R['titulo_res'];?></span><br/>
	<div class="descripcion_res" id="descripcion_res"><?php echo $R['descripcion_res'];?></div>
</div>
<?php if(isset($R['alerta_especifica'])){ ?>
	<div class="alerta_especifica bloque"><?php echo $R['alerta_especifica'];?></div>
<?php } ?>
<div id="enlaces" class="bloque">

<?php

// Aquí va la selección de qué tipo de resultado(s) van para luego completarlos

generaInnerResultado();

?>

</div>

<div class="bloque publi_res" id="contendor_publi_res">
<?php echo getPubli('cuadrado grande') ?>
</div>

<div class="instrucciones_descarga bloque">
	<b>Como descargar un enlace:</b><br/>
	<ul>
		<li>- Firefox: Clic derecho sobre el enlace, clic sobre "Guardar enlace Como...".</li>
		<li>- Chrome: Clic derecho sobre el enlace, clic sobre "Guardar enlace Como...".</li>
		<li>- Opera: Clic derecho sobre el enlace, clic sobre "Guardar contenido Como...".</li>
		<li>- Internet Explorer: Clic derecho sobre el enlace, clic sobre "Guardar destino Como...".</li>
	</ul>
	<a href="http://www.youtube.com/watch?v=7-Xvmz-jNrg">Ver en YouTube como descargar un enlace.</a>
	<br/><br/>
	Para descargar un enlace m3u8: <a href="/lab#lab_m3u8-downloader" id="enl">Programa necesario</a>. <a href="http://www.youtube.com/watch?v=bqBBWumxp4c" id="enl">Tutorial en YouTube</a>.
	</p>
</div>