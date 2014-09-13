<div id="rtmp<?php echo $R2['random_id'];?>" class="Descarga" onmouseover="changeToInfo(<?php echo $R2['random_id'];?>)">
	<div id="rtmptxt<?php echo $R2['random_id'];?>">
		Descargar (Necesita programa)
	</div>
	<div class="interiorboton" id="rtmpcontenido<?php echo $R2['random_id'];?>" style="display:none">
		<?php echo INTERIOR_AVISO_RTMP?>
	</div>
</div>

<div class="fondo_negro" id="rtmp<?php echo $R2['random_id'];?>dfb" style="display:none"></div>
<div class="agregar_rtmp_downloader" id="rtmp<?php echo $R2['random_id'];?>df" style="display:none">
	Nombre del archivo:
	<form method="GET" action="http://127.0.0.1:25432/" id="rtmp<?php echo $R2['random_id'];?>f" target="_blank">
		<input type="text"   id="rtmp<?php echo $R2['random_id'];?>fnombre"  name="nombre" class="input" value="<?php echo $R2['nombre_resultado_manual'];?>" autocomplete="off"><br/>
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>furlhttp" name="urlhttp" value="<?php echo $R2['dir_resultado_rtmpdumpHTTP_esc_doblecoma'];?>">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>fcommand" name="command" value="">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>fimg"     name="img" value="<?php echo $R['url_img_res'];?>">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>forig"    name="orig" value="<?php echo $R['WEB'];?>">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>faccion"  name="accion" value="descargar">
		<span class="boton" onclick="cierrartmp('<?php echo $R2['random_id'];?>')">Cancelar</span><span class="boton" onclick="D.g('rtmp<?php echo $R2['random_id'];?>f').submit();cierrartmp('<?php echo $R2['random_id'];?>')">Descargar</span>
	</form>
</div>
<script>
	getScript('http://127.0.0.1:25432/rtmpdownloader.js',f<?php echo $R2['random_id'];?>);
	getScript('http://127.0.0.1:25431/static/js/imrunning.js',f2<?php echo $R2['random_id'];?>);
	function f<?php echo $R2['random_id'];?>(){
		if(rtmpdownloader){
			activartmp('<?php echo $R2['random_id'];?>');
			D.g('rtmp<?php echo $R2['random_id'];?>').innerHTML="Descargar usando RTMP-Downloader";
			
			D.g('rtmp<?php echo $R2['random_id'];?>fcommand').remove();
			D.g('rtmp<?php echo $R2['random_id'];?>forig').remove();
		}
	}
	function f2<?php echo $R2['random_id'];?>(){
		if(EasyRtmpdump){
			activartmp('<?php echo $R2['random_id'];?>');
			D.g('rtmp<?php echo $R2['random_id'];?>').innerHTML="Descargar usando Easy-Rtmpdump";
			D.g('rtmp<?php echo $R2['random_id'];?>f').setAttribute('action','http://127.0.0.1:25431/easy-rtmpdump.html');
			
			D.g('rtmp<?php echo $R2['random_id'];?>fnombre').setAttribute('name','name');
			D.g('rtmp<?php echo $R2['random_id'];?>faccion').remove();
			D.g('rtmp<?php echo $R2['random_id'];?>furl').remove();
		}
	}
</script>