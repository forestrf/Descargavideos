<div>
	<form id="m3u8<?=$R2['random_id']?>f" method="POST" action="http://127.0.0.1:9666/flash/add" target="hidden" style="display:none">
		<input type="hidden" name="source" value="http://www.descargavideos.tv">
		<input type="hidden" id="rtmp<?php echo $R2['random_id'];?>furls" name="urls" value="<?=urlencode($R2['dir_resultado'])?>">
		<span class="Descarga" onclick="D.g('m3u8<?php echo $R2['random_id'];?>f').submit();">Descargar con JDownloader</span>
	</form>
	
	<a id="m3u8<?=$R2['random_id']?>a" class="Descarga" target="blank" href="http://127.0.0.1:25430/?url=<?php echo urlencode($R2['dir_resultado'])?>&pass=<?php echo urlencode($R2['pass_m3u8']);?>">Descargar con M3U8-Downloader</a>
	
	<a class="TV" target="_blank" href="/player/?img=<?php echo $R['url_img_res'];?>&ext=<?php echo $R2['extension_res'];?>&video=<?php echo $R2['dir_resultado_reproductor'];?>"></a>
</div>
<div class="aviso_m3u8" id="m3u8<?=$R2['random_id']?>info">Este enlace require del programa JDownloader (<a href="http://jdownloader.org/download/index">Descargar</a>), o del programa M3U8-Downloader (<a href="/lab#lab_m3u8-downloader">Descargar</a>, <a href="http://www.youtube.com/watch?v=bqBBWumxp4c">tutorial en youtube</a>).<br/>Si usas JDownloader, ábrelo antes de intentar descargar el vídeo con Descargavídeos.<br/></div>
<script>
	getScript('http://127.0.0.1:9666/jdcheck.js', function(){
		if(jdownloader){
			var rid = "m3u8<?=$R2['random_id']?>";
			D.g(rid+'f').style.display = "inline";
			D.g(rid+'a').style.display = "none";
			D.g(rid+'info').style.display = "none";
		}
	});
</script>