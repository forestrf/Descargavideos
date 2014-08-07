<div>
	<span id="id<?php echo $R2['random_id'];?>" class="Descarga2"></span>
	<a class="TV" target="_blank" href="/player/?img=<?php echo $R['url_img_res'];?>&ext=<?php echo $R2['extension_res'];?>&video=<?php echo $R2['dir_resultado_reproductor'];?>"></a>
</div>
<script>
	D.g('id<?php echo $R2['random_id'];?>').innerHTML=ReferrerKiller.linkHtml(
		'<?php echo $R2['dir_resultado'];?>',
		'<?php echo $R2['dir_resultado_txt'];?>',
		{target:'_blank'},
		{verticalAlign:'bottom'},
		ReferrerKiller.css
	);
</script>