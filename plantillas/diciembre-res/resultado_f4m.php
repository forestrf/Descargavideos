<div class="rtmpdump" id="rtmp<?php echo $R2['random_id'];?>">AdobeHDS --manifest "<?php echo $R2['dir_resultado'];?>" --outfile "<?php echo $R2['nombre_resultado_manual'];?>"</div>
<div class="aviso_m3u8" id="rtmp<?php echo $R2['random_id'];?>-2">
<?php echo INTERIOR_AVISO_RTMP?>
</div>

<div class="fondo_negro" id="rtmp<?php echo $R2['random_id'];?>dfb" style="display:none"></div>
<div class="agregar_rtmp_downloader" id="rtmp<?php echo $R2['random_id'];?>df" style="display:none">
	Nombre del archivo:
	<form method="GET" action="http://127.0.0.1:25435/" id="rtmp<?php echo $R2['random_id'];?>f" target="_blank">
		<input type="text"   id="rtmp<?php echo $R2['random_id'];?>fnombre"  name="nombre" class="input" value="<?php echo $R2['nombre_resultado_manual'];?>" autocomplete="off"><br>
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>furl"     name="url" value='--manifest "<?php echo $R2['dir_resultado'];?>" --outfile "<?php echo $R2['nombre_resultado_manual'];?>"'>
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>faccion"  name="accion" value="descargar">
		<span class="boton" onclick="cierra<?php echo $R2['random_id'];?>()">Cancelar</span><span class="boton" onclick="D.g('rtmp<?php echo $R2['random_id'];?>f').submit();cierra<?php echo $R2['random_id'];?>()">Descargar</span>
	</form>
</div>
<script>
	getScript('http://127.0.0.1:25435/f4mdownloader.js',f<?php echo $R2['random_id'];?>);
	function f<?php echo $R2['random_id'];?>(){
		if(f4mdownloader){
			D.g('rtmp<?php echo $R2['random_id'];?>').innerHTML="<a style=\"cursor:pointer\" onclick=\"muestra<?php echo $R2['random_id'];?>()\">Descargar usando F4M-Downloader</a>";
			D.g('rtmp<?php echo $R2['random_id'];?>-2').remove();
		}
	}
	function muestra<?php echo $R2['random_id'];?>(){
		D.g('rtmp<?php echo $R2['random_id'];?>df').setAttribute('style','display:block');
		D.g('rtmp<?php echo $R2['random_id'];?>dfb').setAttribute('style','display:block');
	}
	function cierra<?php echo $R2['random_id'];?>(){
		D.g('rtmp<?php echo $R2['random_id'];?>df').setAttribute('style','display:none');
		D.g('rtmp<?php echo $R2['random_id'];?>dfb').setAttribute('style','display:none');
	}
</script>
