<div>
	<span id="id<?php echo $R2['random_id'];?>" class="Descarga2"></span>
	<?=TVButton($R2['random_id'], $R2['dir_resultado'], $R2['extension_res'], $R['url_img_res'])?>
</div>
<script>
	D.g('id<?=$R2['random_id']?>').innerHTML = "";
	D.g('id<?=$R2['random_id']?>').appendChild(ReferrerKiller.linkHtml(
		'<?=$R2['dir_resultado']?>',
		'<?=$R2['dir_resultado_txt']?>',
		{target:'_blank'},
		{verticalAlign:'bottom'},
		ReferrerKiller.css
	));
</script>