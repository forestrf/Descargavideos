<div class="rtmpdump" id="rtmp<?php echo $R2['random_id'];?>">rtmpdump -r "<?php echo $R2['dir_resultado_enc_rtmpdump'];?>" -o "<?php echo $R2['extension_res'];?>"</div>
<div class="aviso_m3u8" id="rtmp<?php echo $R2['random_id'];?>2">
<?php echo INTERIOR_AVISO_RTMP?>
</div>

<div class="fondo_negro" id="rtmp<?php echo $R2['random_id'];?>dfb" style="display:none"></div>
<div class="agregar_rtmp_downloader" id="rtmp<?php echo $R2['random_id'];?>df" style="display:none">
	Nombre del archivo:
	<form method="GET" action="http://127.0.0.1:25432/" id="rtmp<?php echo $R2['random_id'];?>f" target="_blank">
		<input type="text"   id="rtmp<?php echo $R2['random_id'];?>fnombre"  name="nombre" class="input" value="<?php echo $R2['extension_res'];?>" autocomplete="off"><br>
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>furl"     name="url" value='-r "<?php echo $R2['dir_resultado_enc_rtmpdump'];?>" -o "<?php echo $R2['extension_res'];?>"'>
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>fcommand" name="command" value='rtmpdump -r "<?php echo $R2['dir_resultado_enc_rtmpdump'];?>" -o "<?php echo $R2['extension_res'];?>"'>
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>fimg"     name="img" value="<?php echo $R['url_img_res'];?>">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>forig"    name="orig" value="<?php echo $R['WEB'];?>">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>faccion"  name="accion" value="descargar">
		<span class="boton" onclick="cierra<?php echo $R2['random_id'];?>()">Cancelar</span><span class="boton" onclick="D.g('rtmp<?php echo $R2['random_id'];?>f').submit();cierra<?php echo $R2['random_id'];?>()">Descargar</span>
	</form>
</div>
<script>
	getScript('http://127.0.0.1:25432/rtmpdownloader.js',f<?php echo $R2['random_id'];?>);
	getScript('http://127.0.0.1:25431/static/js/imrunning.js',f2<?php echo $R2['random_id'];?>);
	function f<?php echo $R2['random_id'];?>(){
		if(rtmpdownloader){
			D.g('rtmp<?php echo $R2['random_id'];?>').innerHTML="<a style=\"cursor:pointer\" onclick=\"muestra<?php echo $R2['random_id'];?>()\">Descargar usando RTMP-Downloader</a>";
			D.g('rtmp<?php echo $R2['random_id'];?>2').remove();
			
			D.g('rtmp<?php echo $R2['random_id'];?>fcommand').remove();
			D.g('rtmp<?php echo $R2['random_id'];?>forig').remove();
		}
	}
	function f2<?php echo $R2['random_id'];?>(){
		if(EasyRtmpdump){
			D.g('rtmp<?php echo $R2['random_id'];?>').innerHTML="<a style=\"cursor:pointer\" onclick=\"muestra<?php echo $R2['random_id'];?>()\">Descargar usando Easy-Rtmpdump</a>";
			D.g('rtmp<?php echo $R2['random_id'];?>2').remove();
			D.g('rtmp<?php echo $R2['random_id'];?>f').setAttribute('action','http://127.0.0.1:25431/easy-rtmpdump.html');
			
			D.g('rtmp<?php echo $R2['random_id'];?>fnombre').setAttribute('name','name');
			D.g('rtmp<?php echo $R2['random_id'];?>faccion').remove();
			D.g('rtmp<?php echo $R2['random_id'];?>furl').remove();
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
