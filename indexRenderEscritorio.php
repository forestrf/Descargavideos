<?php setcookie("modoEscritorio", "1")?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0"/>
<meta http-equiv="expires" content="0"/>
<meta http-equiv="pragma" content="no-cache"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>

<title><?php echo TXT_TITLE?> - DescargaVideos.TV<?php echo $seccion==""?"":" - ".$seccion?></title>

<meta property="fb:app_id" content="235486993147003"/>
<meta property="fb:admins" content="1133185967"/>

<meta name="RATING" content="GENERAL"/>

<meta name="advertising" content="ask"/>

<meta name="keywords" content="<?php echo $palabras_clave?>"/>
<meta name="description" content="<?php echo $descripcion?>"/>

<script>
/*Disable console clearing*/
console.clear=()=>{console.log("Console.clear attempted.")};
</script>

<?php
if (defined('HAY_RESULTADO') && $R['MODO'] === 'BUSQUEDA') {
	echo '<meta name="robots" content="noindex">';
}

/*? y un número es para forzar la actualización del script y del css tras cambios*/ ?>

<link href="/favicon.ico" rel="icon" type="image/x-icon"/>
<link rel="stylesheet" href="/css/cssfull.min.css?37"/>
<link rel="stylesheet" href="/css/modos/<?php echo $css_modo?>.css?1" id="css2"/>
<script src="/js/funciones.min.js?21"></script>

<script>
<?php if (!defined('DEBUG') && !isset($_GET['webdebug'])) { ?>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	ga('create', 'UA-29252510-1', 'auto');  // Replace with your property ID.
	ga('send', 'pageview');
<?php } else {?>
	ga = function(){}
<?php } ?>
</script>

<!--no se puede juntar por cloudflare-->
<script>
var css_user='<?php echo $css_modo?>';
var rtmpdownloader = false;
var EasyRtmpdump = false;
var jdownloader = false;
</script>



</head>
<body>


<div class="todo">
	<div class="cabecera <?php if(defined('HAY_RESULTADO')) echo "conresultado";?>" id="cabecera">
		<div class="minHeight">
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
				<form action="/" method="post" name="formCalculador" id="formCalculador">
					<div class="fondo_input_web">
						<input type="text" name="web" id="web" class="entrada" placeholder="Pega la URL del vídeo..." value="<?php if(isset($web) && $web!="")echo htmlentities2($web)?>" title="URL a obtener">
					</div>
					<input type="submit" id="submitBtn" value=" " class="boton">
	
					<div id="ayuda1" class="letra_ayuda">
						<div class="flechaIzq"></div>
						<span id="ayuda1txt"><?php echo TXT_COPIA_URL_VIDEO?></span>
					</div>
	
					<div id="ayuda2" class="letra_ayuda invisible">
						<div class="flechaDer"></div>
						<span id="ayuda2txt"><?php echo TXT_BUSCA_URL_VIDEO?></span>
					</div>
					<!--<span style="background-color:#000;font-size:.8em">Aviso</span>-->
				</form>
				
				<div id="resultado">
					<?php include_once 'plantillaResultado.php';?>
				</div>
				
				<script src="/js/ordenes1.min.js?1"></script>
				
				<?php if (ADS/* && FALSE*//* && $R['MODO'] !== 'RESULTADO'*/) { ?>
				<div id="publi_cabecera">
					<style>
						.adv-container {
							position: unset !important;
							top: unset !important;
							left: unset !important;
							padding: unset !important;
						}
						#publi_cabecera .adv-spacer,
						.adv-close {
							display: none !important;
						}
						.adperepe {
							min-width: 450px;
							min-height: 360px;
						}
					</style>
					<?php
						$genokids = mt_rand(0, 100) > 100; // 0%
					?>
					<center style="background-color:transparent">
						<span class="adperepe" id="admidpagegoeshere" style="position:relative">
							<?php if ($genokids) { ?>
								<a class="actual_trailer ks" href="https://www.kickstarter.com/projects/nukefist/genokids-cooperative-hackandslash?ref=2ff7fy">
									<video loop="" muted="" autoplay="" poster="https://genokids.com/vid/trailer_ks_thumbnail.jpg" width="100%" height="100%">
										<source type="video/webm" src="https://genokids.com/vid/trailer_ks_preview.webm">
										<img src="https://genokids.com/vid/trailer_ks_thumbnail.jpg" title="Your browser does not support the <video> tag">
									</video>
								</a>
								<!--<script src="/genokids/genokids.js?v3"></script>-->
							<?php } else { ?>
										<script>
											console.clear=()=>{console.log("Console.clear attempted.")};
											atOptions = {
												"key" : "d6e58797066b3d9d9ff05a16756f9c52",
												"format" : "iframe",
												"height" : 250,
												"width" : 300,
												"params" : {}
											};
										</script>
										<script type="text/javascript" src="//www.gatetodisplaycontent.com/d6e58797066b3d9d9ff05a16756f9c52/invoke.js"></script>
								</script>
							<?php } ?>
						</span>
					</center>
				</div>
				<?php } ?>
			</div>
	
			<div class="social">
				<div class="elem">
					<a target="_blank" class="tt" href="https://twitter.com/descargavids"></a>
				</div>
	
				<div class="elem">
					<a target="_blank" class="fb" href="https://www.facebook.com/descargavids"></a>
				</div>
			</div>
		</div>
	</div>

	<div id="subir">Subir</div>

	<div id="contenido">
		<div class="menu_hueco">
			<div class="menu" id="menu_scroll">
				<a href="/" class="inicio"><?php echo TXT_MENU_INICIO?></a><a
				href="/faq#contenido" class="preguntas_frecuentes"><?php echo TXT_MENU_FAQ?></a><a
				target="_blank" href="http://descargavid.blogspot.com.es/" class="blog"><?php echo TXT_MENU_BLOG?></a><a
				href="/lab#contenido" class="lab"><?php echo TXT_MENU_LAB?></a><a
				href="/changelog#contenido" class="changelog"><?php echo TXT_MENU_CHANGELOG?></a><a
				href="/agradecimientos#contenido" class="agradecimientos"><?php echo TXT_MENU_AGRADECIMIENTOS?></a><a
				href="https://github.com/forestrf/Descargavideos" class="github">GitHub</a><a
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
		Descargavideos.tv | 
		Code by <b>Forest</b> - Design by <a target="_blank" href="http://www.fsdesign.es/"><b>FSdesign</b></a>
		
		<div class="derecha" style="right:100px">
			<div class="adv-consent-link-section" style="display:inline;">
				<a href="#" class="adv-consent-link">Review Consent</a> | 
			</div>
			<a href="/aviso_legal#contenido"><?php echo TXT_AVISO_LEGAL?></a>
			 | <a href="/privacidad#contenido"><?php echo TXT_POLITICA_PRIVACIDAD?></a>
			 | <a href="https://www.rarapercepcion.com">Rara Percepcion</a>
		</div>
	</div>
</div>



<div id="preloader"></div>



<script src="/js/ordenes2.min.js?1"></script>



<script>
setModoPic('<?php echo $modo?>');
function setModoPic(d){if(d==1){D.g('web').placeholder="<?php echo TXT_PEGA_URL_VIDEO?>";D.g('ayuda1txt').innerHTML="<?php echo TXT_COPIA_URL_VIDEO?>";D.g('ayuda2txt').innerHTML="<?php echo TXT_BUSCA_URL_VIDEO?>";}else{D.g('web').placeholder="<?php echo TXT_BUSCAR_CANCION?>";D.g('ayuda1txt').innerHTML="<?php echo TXT_ESCRIBE_NOMBRE_CANCION?>";D.g('ayuda2txt').innerHTML="<?php echo TXT_BUSCA_CANCION?>";}}

<?php if(defined('HAY_RESULTADO')){ ?>
	scrollTo(D.g('formCalculador'), 20);
<?php } ?>

ga('send', 'event', "Interfaz modo","<?php echo $css_modo_cookie;?>");
var adblock=true;
</script>
<script src="/advertisement.js"></script>
<script>ga('send', 'event', "Adblock escritorio", adblock?"Con Adblock":"Sin Adblock");</script>
<?php if (!$genokids) { ?>
	<script>if (adblock) getScript("/genokids/genokids.js?v3");</script>
<?php } ?>

<script>
/*Disable ajax*/
D.g("formCalculador").onsubmit = null;
</script>

<?php /*Adsterra Social bar intenta que instales extensiones en el navegador*/ ?>

</body>
</html>
