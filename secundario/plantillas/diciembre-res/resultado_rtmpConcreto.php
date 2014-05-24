<b><i><div class="rtmpdump" id="rtmp<?php echo $R2['random_id'];?>">rtmpdump <?php echo $R2['dir_resultado_rtmpdump_manual'];?></div></i></b>
<div class="aviso_m3u8" id="rtmp<?php echo $R2['random_id'];?>2">
Windows: El programa RTMP-Downloader te permitirá descargar este vídeo facilmente. <a href="/lab#lab_rtmp-downloader">Descárgalo aquí</a>.<br>
<a href="http://www.youtube.com/watch?v=Jb0mt2qRXGw">video-tutorial en youtube</a>.<p>
Mac OS X y GNU/Linux: El programa Easy-Rtmpdump de PyDownTV te permitirá descargar este vídeo fácilmente. <a href="http://www.pydowntv.com/ayuda#DescargarRtmpEasy">Descárgalo aquí</a>.<br>
<a href="https://www.youtube.com/watch?v=Z-hsPc_Bb7A">video-tutorial en youtube</a>.
</div>

<div class="fondo_negro" id="rtmp<?php echo $R2['random_id'];?>dfb" style="display:none"></div>
<div class="agregar_rtmp_downloader" id="rtmp<?php echo $R2['random_id'];?>df" style="display:none">
	Nombre del archivo:
	<form method="GET" action="http://127.0.0.1:25432/" id="rtmp<?php echo $R2['random_id'];?>f" target="_blank">
		<input type="text"   name="nombre" class="input" value="<?php echo $R2['nombre_resultado_rtmpdump_manual'];?>" autocomplete="off"><br>
		<input type="hidden" name="url" value="<?php echo $R2['dir_resultado_rtmpdump_manual_esc_doblecoma'];?>">
		<input type="hidden" name="command" value="rtmpdump <?php echo $R2['dir_resultado_rtmpdump_manual_esc_doblecoma'];?>">
		<input type="hidden" name="img" value="<?php echo $R['url_img_res'];?>">
		<input type="hidden" name="orig" value="<?php echo $R['WEB'];?>">
		<input type="hidden" name="accion" value="descargar">
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
			
			$('#rtmp<?php echo $R2['random_id'];?>f [name=command]').remove();
			$('#rtmp<?php echo $R2['random_id'];?>f [name=name]').remove();
			$('#rtmp<?php echo $R2['random_id'];?>f [name=orig]').remove();
		}
	}
	function f2<?php echo $R2['random_id'];?>(){
		if(EasyRtmpdump){
			document.getElementById('rtmp<?php echo $R2['random_id'];?>').innerHTML="<a style=\"cursor:pointer\" onclick=\"muestra<?php echo $R2['random_id'];?>()\">Descargar usando Easy-Rtmpdump</a>";
			document.getElementById('rtmp<?php echo $R2['random_id'];?>2').remove();
			$('#rtmp<?php echo $R2['random_id'];?>f').attr('action','http://127.0.0.1:25431/easy-rtmpdump.html');
			
			$('#rtmp<?php echo $R2['random_id'];?>f [name=nombre]').attr('name','name');
			$('#rtmp<?php echo $R2['random_id'];?>f [name=accion]').remove();
			$('#rtmp<?php echo $R2['random_id'];?>f [name=url]').remove();
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

