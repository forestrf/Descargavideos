<div id="rtmp<?php echo $R2['random_id'];?>" class="Descarga" onmouseover="changeToInfo(<?php echo $R2['random_id'];?>)">
	<div id="rtmptxt<?php echo $R2['random_id'];?>">
		Descargar (Necesita programa)
	</div>
	<div class="interiorboton" id="rtmpcontenido<?php echo $R2['random_id'];?>" style="display:none">
		<?php echo INTERIOR_AVISO_F4M?><br>
		<div class="rtmpdump" id="rtmpcode<?php echo $R2['random_id'];?>">
			--manifest "<?php echo $R2['dir_resultado'];?>" --outfile "<?php echo $R2['nombre_resultado_manual'];?>"
		</div>
	</div>
</div>


<div class="fondo_negro" id="rtmp<?php echo $R2['random_id'];?>dfb" style="display:none"></div>
<div class="agregar_rtmp_downloader" id="rtmp<?php echo $R2['random_id'];?>df" style="display:none">
	Nombre del archivo:
	<form method="GET" action="http://127.0.0.1:25435/" id="rtmp<?php echo $R2['random_id'];?>f" target="_blank">
		<input type="text"   id="rtmp<?php echo $R2['random_id'];?>fnombre"  name="nombre" class="input" value="<?php echo $R2['nombre_resultado_manual'];?>" autocomplete="off"><br>
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>furl"     name="url" value='--manifest "<?php echo $R2['dir_resultado'];?>" --outfile "<?php echo $R2['nombre_resultado_manual'];?>"'>
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>faccion"  name="accion" value="descargar">
		<span class="boton" onclick="cierrartmp('<?php echo $R2['random_id'];?>')">Cancelar</span><span class="boton" onclick="D.g('rtmp<?php echo $R2['random_id'];?>f').submit();cierrartmp('<?php echo $R2['random_id'];?>')">Descargar</span>
	</form>
</div>
<script>
	function f<?php echo $R2['random_id'];?>(){
		if(f4mdownloader){
			activartmp('<?php echo $R2['random_id'];?>');
			D.g('rtmp<?php echo $R2['random_id'];?>').innerHTML="Descargar usando F4M-Downloader";
		}
	}
	
	<?php
		echo preg_replace_callback('@{{([a-zA-Z0-9_-]*?)}}@', function($entrada){global $R2;return $R2[$entrada[1]];}, $R2['script']);
	?>
	
	getScript('http://127.0.0.1:25435/f4mdownloader.js',f<?php echo $R2['random_id'];?>);
</script>
