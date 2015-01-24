<?php
	$rtmpdump = $R2['dir_resultado_rtmpdump_manual'];
	if(!enString($R2['dir_resultado_rtmpdump_manual'], ' -o '))
		$rtmpdump .= ' -o "'.($R2['nombre_resultado_manual']? $R2['nombre_resultado_manual'] : 'video.mp4');
?>

<div id="rtmp<?=$R2['random_id']?>" class="Descarga" onmouseover="changeToInfo(<?=$R2['random_id']?>)">
	<div id="rtmptxt<?=$R2['random_id']?>">
		Descargar (Necesita programa)
	</div>
	<div class="interiorboton" id="rtmpcontenido<?=$R2['random_id']?>" style="display:none">
		<span id="rtmpinfo<?=$R2['random_id']?>">
			<?=INTERIOR_AVISO_RTMP?>
		</span><br/>
		<div class="rtmpdump" id="rtmpcode<?=$R2['random_id']?>">
			rtmpdump <?=$rtmpdump?>
		</div>
	</div>
</div>

<div class="fondo_negro" id="rtmp<?=$R2['random_id']?>dfb" style="display:none"></div>
<div class="agregar_rtmp_downloader" id="rtmp<?=$R2['random_id']?>df" style="display:none">
	Nombre del archivo:
	<form method="GET" action="http://localhost:25432/" id="rtmp<?=$R2['random_id']?>f" target="_blank">
		<input type="text"     id="rtmp<?=$R2['random_id']?>fnombre"   name="nombre" class="input" value="<?=$R2['nombre_resultado_manual']?>" autocomplete="off"><br/>
		<input type="checkbox" id="rtmp<?=$R2['random_id']?>fv"><span class="modo_live_rtmp">Usar modo live, -v (marcar en caso de problemas)</span><br/>
		
		<input type="hidden"   id="rtmp<?=$R2['random_id']?>frtmpdump" name="url"    value="<?=htmlentities($rtmpdump)?>">
		<input type="hidden"   id="rtmp<?=$R2['random_id']?>fimg"      name="img"    value="<?=$R['url_img_res']?>">
		<input type="hidden"   id="rtmp<?=$R2['random_id']?>forig"     name="orig"   value="<?=$R['WEB']?>">
		<input type="hidden"   id="rtmp<?=$R2['random_id']?>faccion"   name="accion" value="descargar">
		<span class="boton" onclick="cierrartmp('<?=$R2['random_id']?>')">Cancelar</span><span class="boton" onclick="launchRTMPDownload('<?=$R2['random_id']?>')">Descargar</span>
	</form>
</div>
<script>
	prepareRTMP('<?=$R2['random_id']?>');
</script>

