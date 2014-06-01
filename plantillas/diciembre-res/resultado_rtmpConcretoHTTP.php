<div class="rtmpdump" id="rtmp<?php echo $R2['random_id'];?>">Necesita el programa RTMP-Downloader o Easy-Rtmpdump para poder descargar el vídeo</div>
<div class="aviso_m3u8" id="rtmp<?php echo $R2['random_id'];?>2">
<?php echo INTERIOR_AVISO_RTMP?>
</div>

<div class="fondo_negro" id="rtmp<?php echo $R2['random_id'];?>dfb" style="display:none"></div>
<div class="agregar_rtmp_downloader" id="rtmp<?php echo $R2['random_id'];?>df" style="display:none">
	Nombre del archivo:
	<form method="GET" action="http://127.0.0.1:25432/" id="rtmp<?php echo $R2['random_id'];?>f" target="_blank">
		<input type="text"   id="rtmp<?php echo $R2['random_id'];?>fnombre"  name="nombre" class="input" value="<?php echo $R2['nombre_resultado_rtmpdump_manual'];?>" autocomplete="off"><br>
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>furlhttp" name="urlhttp" value="<?php echo $R2['dir_resultado_rtmpdumpHTTP_esc_doblecoma'];?>">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>fcommand" name="command" value="">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>fimg"     name="img" value="<?php echo $R['url_img_res'];?>">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>forig"    name="orig" value="<?php echo $R['WEB'];?>">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>faccion"  name="accion" value="descargar">
		<span class="boton" onclick="cierra<?php echo $R2['random_id'];?>()">Cancelar</span><span class="boton" onclick="document.getElementById('rtmp<?php echo $R2['random_id'];?>f').submit();cierra<?php echo $R2['random_id'];?>()">Descargar</span>
	</form>
</div>
<script>
	getScript('http://127.0.0.1:25432/rtmpdownloader.js',f<?php echo $R2['random_id'];?>);
	getScript('http://127.0.0.1:25431/static/js/imrunning.js',f2<?php echo $R2['random_id'];?>);
	function f<?php echo $R2['random_id'];?>(){
		if(rtmpdownloader){
			document.getElementById('rtmp<?php echo $R2['random_id'];?>').innerHTML="<a style=\"cursor:pointer\" onclick=\"muestra<?php echo $R2['random_id'];?>()\">Descargar usando RTMP-Downloader</a>";
			document.getElementById('rtmp<?php echo $R2['random_id'];?>2').remove();
			
			document.getElementById('rtmp<?php echo $R2['random_id'];?>fcommand').remove();
			document.getElementById('rtmp<?php echo $R2['random_id'];?>fnombre').remove();
			document.getElementById('rtmp<?php echo $R2['random_id'];?>forig').remove();
		}
	}
	function f2<?php echo $R2['random_id'];?>(){
		if(EasyRtmpdump){
			document.getElementById('rtmp<?php echo $R2['random_id'];?>').innerHTML="<a style=\"cursor:pointer\" onclick=\"muestra<?php echo $R2['random_id'];?>()\">Descargar usando Easy-Rtmpdump</a>";
			document.getElementById('rtmp<?php echo $R2['random_id'];?>2').remove();
			document.getElementById('rtmp<?php echo $R2['random_id'];?>f').setAttribute('action','http://127.0.0.1:25431/easy-rtmpdump.html');
			
			document.getElementById('rtmp<?php echo $R2['random_id'];?>fnombre').setAttribute('name','name');
			document.getElementById('rtmp<?php echo $R2['random_id'];?>faccion').remove();
			document.getElementById('rtmp<?php echo $R2['random_id'];?>furl').remove();
		}
	}
	function muestra<?php echo $R2['random_id'];?>(){
		document.getElementById('rtmp<?php echo $R2['random_id'];?>df').setAttribute('style','display:block');
		document.getElementById('rtmp<?php echo $R2['random_id'];?>dfb').setAttribute('style','display:block');
	}
	function cierra<?php echo $R2['random_id'];?>(){
		document.getElementById('rtmp<?php echo $R2['random_id'];?>df').setAttribute('style','display:none');
		document.getElementById('rtmp<?php echo $R2['random_id'];?>dfb').setAttribute('style','display:none');
	}
</script>