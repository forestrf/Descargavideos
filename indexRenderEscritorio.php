<?php setcookie("modoEscritorio", "1")?>

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

<?php /*? y un número es para forzar la actualización del script y del css tras cambios*/ ?>

<link href="/favicon.ico" rel="icon" type="image/x-icon"/>
<link rel="stylesheet" href="/css/cssfull.min.css?18"/>
<link rel="stylesheet" href="/css/modos/<?php echo $css_modo?>.css" id="css2"/>
<script src="/js/funciones.min.js?11"></script>
<script src="/js/amf.min.js"></script>

<script>
var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-29252510-1"]);_gaq.push(["_trackPageview"]);(function(){var ga=document.createElement("script");ga.async=true;ga.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga,s);})();
</script>
<!--no se puede juntar por cloudflare-->
<script>
var css_user='<?php echo $css_modo?>';
</script>



</head>
<body>


<div class="todo">
	<div class="cabecera" id="cabecera">
		<a href="/" title="Ir al inicio"><h1>DescargaVideos<span class="tv">.TV</span></h1></a>
		<h2><?php echo TXT_SUBTITULO_CABECERA?></h2>

		<div id="esquina" class="esquina">
			<div class="interior_esquina"><div>
				<a href="/cambiaCabecera.php?modo=1" id="prevpic1" ><span class="m1 img"></span></a><a
				href="/cambiaCabecera.php?modo=2"    id="prevpic2" ><span class="m2 img"></span></a><a
				href="/cambiaCabecera.php?modo=3"    id="prevpic3" ><span class="m3 img"></span></a><a
				href="/cambiaCabecera.php?modo=4"    id="prevpic4" ><span class="m4 img"></span></a></div><div><a
				href="/cambiaCabecera.php?modo=5"    id="prevpic5" ><span class="m5 img"></span></a><a
				href="/cambiaCabecera.php?modo=6"    id="prevpic6" ><span class="m6 img"></span></a><a
				href="/cambiaCabecera.php?modo=7"    id="prevpic7" ><span class="m7 img"></span></a></div><div><a
				href="/cambiaCabecera.php?modo=8"    id="prevpic8" ><span class="m8 img"></span></a><a
				href="/cambiaCabecera.php?modo=9"    id="prevpic9" ><span class="m9 img"></span></a></div><div><a
				href="/cambiaCabecera.php?modo=10"   id="prevpic10"><span class="m10 img"></span></a>
			</div></div>
		</div>

		<div class="centro">
			<form action="/" method="get" name="formCalculador" id="formCalculador">
				<div class="fondo_input_web">
					<input type="text" name="web" id="web" class="entrada" placeholder="Pega la URL del vídeo..." value="<?php if(isset($web) && $web!="")echo htmlentities2($web)?>" title="URL a obtener">
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
		</div>

		<div class="publi_cabecera">
			<?php echo getPubli(0);?>
		</div>

		<div class="social">
			<div class="elem">
				<a target="_blank" class="tt" href="https://twitter.com/descargavids"></a>
			</div>

			<div class="elem">
				<a target="_blank" class="fb" href="https://www.facebook.com/descargavids"></a>
			</div>
			
			<div class="elem">
				<a target="_blank" class="gplus" href="https://plus.google.com/share?url=http://www.descargavideos.tv/"></a>
			</div>
		</div>
	</div>

	<div id="subir">Subir</div>

	<?php if(defined('HAY_RESULTADO')){ ?>
		<div id="resultado" class="hx100">
			<?php include_once 'plantillaResultado.php';?>
		</div>
	<?php }else{ ?>
		<div id="resultado"></div>
	<?php } ?>
	<div id="cargando" class="cargando displaynone"></div>

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



<script src="/js/ordenes.min.js?3"></script>



<script>
setModoPic('<?php echo $modo?>');
function setModoPic(d){if(d==1){D.g('web').placeholder="<?php echo TXT_PEGA_URL_VIDEO?>";D.g('ayuda1txt').innerHTML="<?php echo TXT_COPIA_URL_VIDEO?>";D.g('ayuda2txt').innerHTML="<?php echo TXT_BUSCA_URL_VIDEO?>";}else{D.g('web').placeholder="<?php echo TXT_BUSCAR_CANCION?>";D.g('ayuda1txt').innerHTML="<?php echo TXT_ESCRIBE_NOMBRE_CANCION?>";D.g('ayuda2txt').innerHTML="<?php echo TXT_BUSCA_CANCION?>";}}

setTimeout(function(){
	getScript("https://platform.twitter.com/widgets.js",null,"twitter-wjs");
},2000);

<?php if(defined('HAY_RESULTADO')){ ?>
	scrollTo(D.g("resultado"),20);
<?php } ?>

_gaq.push(["_trackEvent","Interfaz","En uso","<?php echo $css_modo_cookie;?>"]);
var adblock=true;
</script>
<script src="/advertisement.js"></script>
<script>_gaq.push(["_trackEvent","Adblock","Estado",adblock?"Con Adblock":"Sin Adblock"]);</script>



</body>
</html>