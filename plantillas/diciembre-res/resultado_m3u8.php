<div>
	<form id="m3u8<?=$R2['random_id']?>f" method="POST" action="http://127.0.0.1:9666/flashgot" target="hidden" style="display:none">
		<!--<input type="hidden" name="source" value="http://www.descargavideos.tv">-->
		<input type="hidden" name="urls" id="urls<?=$R2['random_id']?>" value="<?=htmlentities($R2['dir_resultado'])?>">
		<?php if (strlen($R2['cookies']) > 0) { ?>
			<input type="hidden" name="cookies" id="cookies<?=$R2['random_id']?>" value="<?=htmlentities($R2['cookies'])?>">
		<?php } ?>
		<span class="Descarga" onclick="D.g('m3u8<?php echo $R2['random_id'];?>f').submit();">Descargar con JDownloader</span>
	</form>
	
	<?php if (strlen($R2['cookies']) > 0) { ?>
		<a id="m3u8<?=$R2['random_id']?>a" class="Descarga">Es necesario tener JDownloader abierto</a>
	<?php } else { ?>
		<a id="m3u8<?=$R2['random_id']?>a" class="Descarga" target="blank" href="http://127.0.0.1:25430/?url=<?php echo urlencode($R2['dir_resultado'])?>&pass=<?php echo urlencode($R2['pass_m3u8']);?>">Descargar con M3U8-Downloader</a>
	<?php } ?>
	<a class="TV" target="_blank" href="/player/?img=<?php echo $R['url_img_res'];?>&ext=<?php echo $R2['extension_res'];?>&video=<?php echo $R2['dir_resultado_reproductor'];?>"></a>
</div>
<div class="aviso_m3u8" id="m3u8<?=$R2['random_id']?>info">Este enlace require del programa JDownloader (<a href="http://jdownloader.org/download/index">Descargar</a>)
	<?php if (strlen($R2['cookies']) == 0) { ?>
		, o del programa M3U8-Downloader (<a href="/lab#lab_m3u8-downloader">Descargar</a>, <a href="http://www.youtube.com/watch?v=bqBBWumxp4c">tutorial en youtube</a>)
	<?php } ?>.
	<br/>Si usas JDownloader, ábrelo antes de intentar descargar el vídeo con Descargavídeos.<br/>
<?php if (strlen($R2['cookies']) == 0) { ?>
	Enlace M3U8 original: <a style="display: inherit; word-break: break-all" href="<?=htmlentities($R2['dir_resultado'])?>"><?=htmlentities($R2['dir_resultado'])?></a>
<?php } ?>
</div>
<script>
	getScript('http://127.0.0.1:9666/jdcheck.js', function(){
		if(jdownloader){
			var rid = "m3u8<?=$R2['random_id']?>";
			D.g(rid+'f').style.display = "inline";
			D.g(rid+'a').style.display = "none";
			D.g(rid+'info').style.display = "none";
			
			var elems = D.g("m3u8<?=$R2['random_id']?>f").getElementsByTagName("input");
			var arr = [];
			for(var i = 0; i < elems.length; i++) arr.push(elems[i]);
			
			D.g("m3u8<?=$R2['random_id']?>f").submit = m3u8_JD_callback(arr);
		}
	});
</script>