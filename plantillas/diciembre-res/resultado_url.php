<div>
	<span id="id<?php echo $R2['random_id'];?>" class="Descarga2"></span>
	<a class="TV" target="_blank" href="/player/?img=<?php echo $R['url_img_res'];?>&ext=<?php echo $R2['extension_res'];?>&video=<?php echo $R2['dir_resultado_reproductor'];?>"></a>
</div>
<script>
	D.g('id<?php echo $R2['random_id'];?>').innerHTML=ReferrerKiller.linkHtml(
		'<?php echo $R2['dir_resultado'];?>',
		'<?php echo $R2['dir_resultado_txt_esc_simplecoma'];?>',
		{target:'_blank'},
		{verticalAlign:'bottom'},
		'.link{'+
			'background:url("http://www.descargavideos.tv/img/flecha.png") no-repeat scroll 5px 5px #ED8D2D;'+
			'border-radius:10px;'+
			'font-family:Tahoma,Helvetica;'+
			'font-size:16px;'+
			'text-decoration:none;'+
			'line-height:30px;'+
			'word-wrap:break-word;'+
			'text-align:center;'+
			'display:block;'+
			'transition:all 0.3s ease 0s;'+
			'min-height:30px;'+
			'padding:5px 5px 5px 50px;'+
			'color:#F8F8F8;'+
		'}'+
		'.link:hover{'+
			'background-color:#F8F8F8;'+
			'background-position:5px -55px;'+
			'color:#ED8D2D;'+
		'}'
	);
</script>