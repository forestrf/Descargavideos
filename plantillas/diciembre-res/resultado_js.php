<div>
	<span id="id<?php echo $R2['random_id'];?>" class="Descarga2"></span>
	<?=TVButton($R2['random_id'], "", "mp4", $R['url_img_res'])?>
</div>
<script>
	<?php
		echo preg_replace_callback('@{{([a-zA-Z0-9_-]*?)}}@', function($entrada){global $R2;return $R2[$entrada[1]];}, $R2['dir_resultado']);
	?>

	function finalizar<?php echo $R2['random_id'];?>(linkfinal, txtfinal, extension){
		if(!extension)
			extension = "mp4";
		D.g('id<?=$R2['random_id']?>TVURL').value = linkfinal;
		D.g('id<?=$R2['random_id']?>TVEXT').value = extension;
		
		D.g('id<?=$R2['random_id']?>').innerHTML = "";
		D.g('id<?php echo $R2['random_id'];?>').appendChild(ReferrerKiller.linkHtml(
			linkfinal,
			txtfinal,
			{target:'_blank'},
			{verticalAlign:'bottom'},
			ReferrerKiller.css
		));
	}
	finalizar = finalizar<?php echo $R2['random_id'];?>;
</script>