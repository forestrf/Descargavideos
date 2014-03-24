<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>

<title><?php echo TXT_TITLE?> - DescargaVideos.TV<?php echo $seccion==""?"":" - ".$seccion?></title>

<meta property="fb:app_id" content="235486993147003"/>
<meta property="fb:admins" content="1133185967"/>

<meta name="RATING" content="GENERAL"/>

<meta name="advertising" content="ask"/>

<meta name="keywords" content="<?php echo $palabras_clave?>"/>
<meta name="description" content="<?php echo $descripcion?>"/>


<link href="/favicon.ico" rel="icon" type="image/x-icon"/>
<link rel="stylesheet" href="/css/cssfull.css"/>
<link rel="stylesheet" href="/css/modos/<?php echo $css_modo?>.css"/>


<script type="text/javascript">
var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-29252510-1"]);_gaq.push(["_trackPageview"]);(function(){var ga=document.createElement("script");ga.type="text/javascript";ga.async=true;ga.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga,s);})();
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/all.js"></script>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript">
{lang: 'es'}
</script>

<script type="text/javascript">
var css_user='<?php echo $css_modo?>';
</script>



</head>
<body>

<!--fb (si no se pone aquí mueve todo)-->
<div id="fb-root"></div>
<script type="text/javascript">(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/es_ES/all.js#xfbml=1&appId=235486993147003";fjs.parentNode.insertBefore(js, fjs);}(document,'script','facebook-jssdk'));</script>


<div class="todo">
	<div class="cabecera" id="cabecera">
		<a href="/" title="Ir al inicio"><h1>DescargaVideos<span class="tv">.TV</span></h1></a>
		<h2><?php echo TXT_SUBTITULO_CABECERA?></h2>

		<div id="esquina" class="esquina">
			<div class="interior_esquina"><div>
				<a href="/cambiaCabecera.php?modo=1" onmouseover="lcss(1,css_user)" onmouseout="rcss(1,css_user)"><span class="m1 img"></span></a>
				<a href="/cambiaCabecera.php?modo=2" onmouseover="lcss(2,css_user)" onmouseout="rcss(2,css_user)"><span class="m2 img"></span></a>
				<a href="/cambiaCabecera.php?modo=3" onmouseover="lcss(3,css_user)" onmouseout="rcss(3,css_user)"><span class="m3 img"></span></a>
				<a href="/cambiaCabecera.php?modo=4" onmouseover="lcss(4,css_user)" onmouseout="rcss(4,css_user)"><span class="m4 img"></span></a></div><div>
				<a href="/cambiaCabecera.php?modo=5" onmouseover="lcss(5,css_user)" onmouseout="rcss(5,css_user)"><span class="m5 img"></span></a>
				<a href="/cambiaCabecera.php?modo=6" onmouseover="lcss(6,css_user)" onmouseout="rcss(6,css_user)"><span class="m6 img"></span></a>
				<a href="/cambiaCabecera.php?modo=7" onmouseover="lcss(7,css_user)" onmouseout="rcss(7,css_user)"><span class="m7 img"></span></a></div><div>
				<a href="/cambiaCabecera.php?modo=8" onmouseover="lcss(8,css_user)" onmouseout="rcss(8,css_user)"><span class="m8 img"></span></a>
				<a href="/cambiaCabecera.php?modo=9" onmouseover="lcss(9,css_user)" onmouseout="rcss(9,css_user)"><span class="m9 img"></span></a></div><div>
				<a href="/cambiaCabecera.php?modo=10" onmouseover="lcss(10,css_user)" onmouseout="rcss(10,css_user)"><span class="m10 img"></span></a>
			</div></div>
		</div>

		<div class="centro">
			<form action="/" method="get" name="formCalculador" id="formCalculador">
				<div class="fondo_input_web">
					<input type="text" name="web" id="web" class="entrada" placeholder="Pega la URL del vídeo..." value="<?php if($web!="")echo htmlentities($web)?>" title="URL a obtener">
				</div>
				<input type="submit" id="submit" value=" " class="boton">
				
				<div class="formRadio"><input type="radio" name="modo" id="radio1" value="1" <?php echo $modo==1?"checked":"" ?>><label for="radio1"><?php echo TXT_CONVERTIR_ENLACE_RADIO?></label></div>
				<div class="formRadio"><input type="radio" name="modo" id="radio2" value="2" <?php echo $modo==2?"checked":"" ?>><label for="radio2"><?php echo TXT_BUSCAR_CANCION_RADIO?></label></div>


				<div id="ayuda1" class="letra_ayuda">
					<div class="flechaIzq"></div>
					<span id="ayuda1txt"><?php echo TXT_COPIA_URL_VIDEO?></span>
				</div>

				<div id="ayuda2" class="letra_ayuda invisible">
					<div class="flechaDer"></div>
					<span id="ayuda2txt"><?php echo TXT_BUSCA_URL_VIDEO?></span>
				</div>
			</form>

			<div id="scroll_cadenas"><div id="scroll_cadenas_render"></div></div>
		</div>

		<div class="publi_cabecera">
			<?php echo getPubli(0);?>
		</div>

		<div class="stats">
			<script type="text/javascript" src="http://s10.histats.com/js15.js"></script>
			<a href="http://www.histats.com" target="_blank" title="contador flash">
				<script type="text/javascript">
				try {Histats.start(1,2419951,4,111,175,25,"00000001");
				Histats.track_hits();}catch(err){};
				</script>
			</a>
			<noscript>
				<a href="http://www.histats.com" target="_blank">
					<img src="http://sstatic1.histats.com/0.gif?2419951%26101" alt="contador flash" style="border:0">
				</a>
			</noscript>
		</div>
		<div class="social">
			<!--tw, fb, +1-->
			<div class="elem">
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.descargavideos.tv" data-text="Descarga vídeos de RTVE, Antena3, Mitele, TV3 y muchas más." data-via="descargavids" data-lang="es" data-count="vertical">Tweet</a>
				<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>

			<script type="text/javascript">(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/es_ES/all.js#xfbml=1&appId=235486993147003";fjs.parentNode.insertBefore(js,fjs);}(document,'script','facebook-jssdk'));</script>
			<div class="elem">
				<div class="fb-like" data-href="https://www.facebook.com/descargavids" data-width="450" data-layout="box_count" data-show-faces="false" data-send="false"></div>
			</div>

			<div class="elem">
				<div class="g-plusone" data-size="tall" data-href="http://www.descargavideos.tv"></div>
			</div>
		</div>
	</div>

	<?php if(defined('HAY_RESULTADO')){ ?>
		<div id="resultado" class="hx100"><script type="text/javascript">$.scrollTo("#resultado",500);</script>
            <?php include_once 'plantillaResultado.php';?>
        </div>
	<?php }else{ ?>
		<div id="resultado"></div>
	<?php } ?>

	<div id="contenido">
		<div class="menu_hueco">
			<div class="menu" id="menu_scroll">
				<a href="/" class="inicio"><?php echo TXT_MENU_INICIO?></a><a
				href="/faq#contenido" class="preguntas_frecuentes"><?php echo TXT_MENU_FAQ?></a><a
				target="_blank" href="http://descargavid.blogspot.com.es/" class="blog"><?php echo TXT_MENU_BLOG?></a><a
				href="/lab#contenido" class="lab"><?php echo TXT_MENU_LAB?></a><a
				href="/changelog#contenido" class="changelog"><?php echo TXT_MENU_CHANGELOG?></a><a
				href="/agradecimientos#contenido" class="agradecimientos"><?php echo TXT_MENU_AGRADECIMIENTOS?></a><a
				href="/contacta#contenido" class="contacta"><?php echo TXT_MENU_CONTACTA?></a>
			</div>
		</div>
		<div class="wrapp">
			<div class="interior">
				<?php imprimePagina($pag)?>
			</div>
		</div>
	</div>


	<div class="hueco_pie"></div>

	<div id="pie">
		Descargavideos.tk Descargavideos.tv | 
		Code by <a target="_blank" href="http://andresleone.uni.me/"><b>Forest</b></a> - Design by <a target="_blank" href="http://www.fsdesign.es/"><b>FSdesign</b></a>
		<div class="derecha">
			<a href="/aviso_legal#contenido"><?php echo TXT_AVISO_LEGAL?></a>
		</div>
	</div>
</div>



<div id="preloader"></div>



<script>
setModoPic(<?php echo $modo?>);
function setModoPic(d){if(d==1){document.getElementById('web').placeholder="<?php echo TXT_PEGA_URL_VIDEO?>";document.getElementById('ayuda1txt').innerHTML="<?php echo TXT_COPIA_URL_VIDEO?>";document.getElementById('ayuda2txt').innerHTML="<?php echo TXT_BUSCA_URL_VIDEO?>";}else{document.getElementById('web').placeholder="<?php echo TXT_BUSCAR_CANCION?>";document.getElementById('ayuda1txt').innerHTML="<?php echo TXT_ESCRIBE_NOMBRE_CANCION?>";document.getElementById('ayuda2txt').innerHTML="<?php echo TXT_BUSCA_CANCION?>";}}
</script>





<script type="text/javascript">_gaq.push(["_trackEvent","Interfaz","En uso","<?php echo $css_modo_cookie;?>"]);</script>

<script type="text/javascript">var adblock=true;</script>
<script type="text/javascript" src="/advertisement.js"></script>
<script type="text/javascript">_gaq.push(["_trackEvent","Adblock","Estado",adblock?"Con Adblock":"Sin Adblock"]);</script>









</body>
</html>