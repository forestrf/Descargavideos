<div>
	<span id="id<?php echo $R2['random_id'];?>" class="Descarga2"></span>
	<a class="TV" id="id<?php echo $R2['random_id'];?>2" target="_blank" href="/player/?img=<?php echo $R['url_img_res'];?>"></a>
</div>
<script>
	<?php echo $R2['dir_resultado'];?>

	
	function finalizar(linkfinal, txtfinal, extension, extraHead){
		if(!extension)
			extension = "mp4";
		document.getElementById('id<?php echo $R2['random_id'];?>').innerHTML=ReferrerKiller.linkHtml(
			linkfinal,
			txtfinal,
			{target:'_blank'},
			{verticalAlign:'bottom'},
			'.link{\
				background:url("http://www.descargavideos.tv/img/flecha.png") no-repeat scroll 5px 5px #ED8D2D;\
				border-radius:10px;\
				font-family:Tahoma,Helvetica;\
				font-size:16px;\
				text-decoration:none;\
				line-height:30px;\
				word-wrap:break-word;\
				text-align:center;\
				display:block;\
				transition:all 0.3s ease 0s;\
				min-height:30px;\
				padding:5px 5px 5px 50px;\
				color:#F8F8F8;\
			}\
			.link:hover{\
				background-color:#F8F8F8;\
				background-position:5px -55px;\
				color:#ED8D2D;\
			}',
			extraHead
		);
	}
</script>