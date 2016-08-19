<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<title>Descargar vídeos de YouTube, RTVE y más! - DescargaVideos.TV<?php echo $seccion==""?"":" - ".$seccion?></title>

<meta property="fb:app_id" content="235486993147003"/>
<meta property="fb:admins" content="1133185967"/>

<meta name="RATING" content="GENERAL"/>

<!--<meta name="advertising" content="ask"/>-->

<meta name="keywords" content="<?php echo $palabras_clave?>"/>
<meta name="description" content="<?php echo $descripcion?>"/>

<meta name="viewport" content="width=device-width, user-scalable=no">

<link href="/favicon.ico" rel="icon" type="image/x-icon"/>
<link rel="stylesheet" href="/css/reset.min.css"/>
<link rel="stylesheet" href="/css/allMovil.min.css?2"/>
<script type="text/javascript" src="/js/funciones.min.js?3"></script>
<link href="/css/font/fuentes.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript">
var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-29252510-1"]);_gaq.push(["_trackPageview"]);(function(){var ga=document.createElement("script");ga.type="text/javascript";ga.async=true;ga.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga,s);})();

var rtmpdownloader = false;
var EasyRtmpdump = false;
var jdownloader = false;
</script>





</head>
<body>

<!--fb (si no se pone aquí mueve todo)-->
<div id="fb-root"></div>
<script type="text/javascript">(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/es_ES/all.js#xfbml=1&appId=235486993147003";fjs.parentNode.insertBefore(js, fjs);}(document,'script','facebook-jssdk'));</script>


<script type="text/javascript">var adblock=true;</script>
<script type="text/javascript" src="/advertisement.js"></script>
<script type="text/javascript">_gaq.push(["_trackEvent","Adblock","Estado",adblock?"Con Adblock":"Sin Adblock"]);</script>



<a href="/" title="Ir al inicio"><h1>DescargaVideos <span class="tv">.TV</span></h1></a>
<h2>Descarga videos de todos los canales nacionales</h2>


<form action="/" method="get" name="formCalculador" id="formCalculador">
	<input type="text" name="web" id="web" class="entrada" placeholder="Pega aquí la URL del vídeo..." value="<?php if($web!="")echo htmlentities2($web)?>" title="URL a obtener">
	<!--
	<div class="formRadio"><input type="radio" name="modo" id="radio1" value="1" onclick="setModoPic(1)" <?php echo $modo==1?"checked":"" ?>><label for="radio1">Convertir enlace</label></div>
	<div class="formRadio"><input type="radio" name="modo" id="radio2" value="2" onclick="setModoPic(2)" <?php echo $modo==2?"checked":"" ?>><label for="radio2">Buscar canción</label></div>
	-->
	
	<input type="submit" id="submit" value="Calcular" class="boton">
	<br/>

	</form>



<?php if(defined('HAY_RESULTADO')){ ?>
	<div id="resultado" class="hx100">
		<?php include_once 'plantillaResultado.php';?>
		<script>scrollTo(D.g("resultado"),20);</script>
	</div>
<?php }else{ ?>
	<div id="resultado"></div>
<?php } ?>



<!--
<div class="menu">
	<a href="/" class="inicio">Inicio</a><br/>
	<a href="/faq#contenido" class="preguntas_frecuentes">Preguntas frecuentes</a><br/>
	<a target="_blank" href="http://descargavid.blogspot.com.es/" class="blog">Blog</a><br/>
	<a href="/lab#contenido" class="lab">Lab</a><br/>
	<a href="/changelog#contenido" class="changelog">Changelog</a><br/>
	<a href="/agradecimientos#contenido" class="agradecimientos">Agradecimientos</a><br/>
	<a href="/contacta#contenido" class="contacta">Contacta</a><br/>
</div>
-->
<br/>
<br/>
<br/>
<br/>
<div class="txt_centrado">
<a href="/versionEscritorioMovil.php?modo=escritorio">Usar la versión de escritorio</a>
</div>

<br/>
<br/>


<div id="pie">
	Descargavideos.tk Descargavideos.tv | 
	Code by <b><a target="_blank" href="http://andresleone.uni.me/">Forest</a></b>
	<div class="derecha">
		<a href="/aviso_legal">aviso legal</a>
	</div>
</div>



</body>
</html>