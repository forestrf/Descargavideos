<div>
	<span id="id<?php echo $R2['random_id'];?>" class="Descarga2"><span class="enespera">Se requiere Adobe Flash Player</span></span>
	<a class="TV" id="id<?php echo $R2['random_id'];?>-2" target="_blank" href="/player/?img=<?php echo $R['url_img_res'];?>"></a>
</div>
<script>
	<?php
		echo preg_replace_callback('@{{([a-zA-Z0-9_-]*?)}}@', function($entrada){global $R2;return $R2[$entrada[1]];}, $R2['dir_resultado']);
	?>

	function finalizar<?php echo $R2['random_id'];?>(linkfinal, txtfinal, extension){
		if(!extension)
			extension = "mp4";
		D.g('id<?php echo $R2['random_id'];?>-2').setAttribute('href', D.g('id<?php echo $R2['random_id'];?>-2').getAttribute('href') + '&ext='+extension+'&video='+encodeURIComponent(linkfinal));
		D.g('id<?php echo $R2['random_id'];?>').innerHTML=ReferrerKiller.linkHtml(
			linkfinal,
			txtfinal,
			{target:'_blank'},
			{verticalAlign:'bottom'},
			ReferrerKiller.css
		);
	}
	finalizar = finalizar<?php echo $R2['random_id'];?>;
</script>