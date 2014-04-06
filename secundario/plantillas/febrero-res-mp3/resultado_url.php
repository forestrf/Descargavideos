<div class="enlace">
	<a class="Descarga" href="<?php echo $R2['dir_resultado'];?>"><?php echo $R2['dir_resultado_txt'];?></a>
</div>
<div class="info">

<span id="repr_<?php echo $R2['num'];?>"></span>
<script>
AudioPlayer.embed("repr_<?php echo $R2['num'];?>",{titles:"<?php echo $R2['dir_resultado_txt'];?>",animation:"no",loader:"0x5B92C6",soundFile:"<?php echo $R2['dir_resultado'];?>"});
</script>
	<?php echo $R2['otros_datos_mp3'];?>
</div>