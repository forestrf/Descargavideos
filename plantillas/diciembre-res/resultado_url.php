<?php $INLINE = true; /*Referrer Killer no es compatible con lectores de pantalla en Chrome, pero tampoco es ya necesario, rel="noreferrer" ahora sí funciona. */ ?>
<div>
	<span id="id<?php echo $R2['random_id'];?>" class="Descarga2">
	<?php if ($INLINE) { ?>
		<style>
			.link{
				background:url("http://www.descargavideos.tv/img/flecha.png") no-repeat scroll 5px 5px #ED8D2D;
				border-radius:10px;
				font-family:Tahoma,Helvetica;
				font-size:16px;
				text-decoration:none;
				line-height:30px;
				word-wrap:break-word;
				text-align:center;
				display:block;
				transition:all 0.3s ease 0s;
				min-height:30px;
				padding:5px 5px 5px 50px;
				color:#F8F8F8
			}
			.link:hover{
				background-color:#F8F8F8;
				background-position:5px -55px;
				color:#ED8D2D
			}
		</style>
		<a class="link" id="link" rel="noreferrer" href="<?=$R2['dir_resultado']?>" target="_blank"><?=$R2['dir_resultado_txt']?></a>
	<?php } ?>
	</span>
	<?=TVButton($R2['random_id'], $R2['dir_resultado'], $R2['extension_res'], $R['url_img_res'])?>
</div>
<?php if (!$INLINE) { ?>
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
<?php } ?>
