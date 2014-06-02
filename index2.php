<?php
error_reporting(-1);
include_once 'funciones.php';
header('Content-Type: text/html; charset=UTF-8');



$resultado_en_misma_pagina=true;
$resultado_incrustado=false;//no va con true









//datos para cuando se monte la web
$palabras_clave='';
$descripcion='';
$seccion='';
//inicio.css
///lab.css
///changelog.css
///contacta.css
///faq.css
///thanks.css
$css_extra='';




if(isset($_REQUEST["pag"]))
	$pag=$_REQUEST["pag"];
elseif(($temp = esPagina($_SERVER["REQUEST_URI"])) != "")
	$pag=$temp;
elseif(!isset($pag)){
	header("Location: /");
	exit;
}



//$a = $_SERVER["REQUEST_URI"]
//$_SERVER["REQUEST_URI"] => "/changelog#contenido"
function esPagina($a){
	$paginas = array('telecinco','antena-3','rtve','mitele','univision','cuatro','la-sexta');
	$pag = "";
	for($i = 0; $i<$i_t=count($paginas); $i++){
		if(strpos($a, $paginas[$i]) === 1){
			$pag = $paginas[$i];
			break; //No seguir buscando más coincidencias
		}
	}
	return $pag;
}


//páginas cadenas
pagina($pag);


function pagina($cual){
	global $palabras_clave,$descripcion,$seccion,$img,$titulo,$bg;
	switch($cual){
		case 'telecinco':
			$titulo="Descargar videos de Telecinco TV online - ".date("Y");
			$descripcion='Descargar videos de la web de Telecinco. La mejor página para bajar videos gratis de Telecinco - Descargavideos.TV';
			$img='telecinco.png';
			$bg="#005066";
		break;
		case 'antena-3':
			$titulo="Descargar videos de Antena 3 TV online - ".date("Y");
			$descripcion='Descargar videos de la web de Antena 3. La mejor página para bajar videos gratis de Antena 3 - Descargavideos.TV';
			$img='antena3.png';
			$bg="#6F5800";
		break;
		case 'rtve':
			$titulo="Descargar videos de RTVE TV online - ".date("Y");
			$descripcion='Descargar videos de la web de RTVE. La mejor página para bajar videos gratis de RTVE - Descargavideos.TV';
			$img='rtve.png';
			$bg="#006181";
		break;
		case 'mitele':
			$titulo="Descargar videos de Mitele TV online - ".date("Y");
			$descripcion='Descargar videos de la web de Mitele. La mejor página para bajar videos gratis de Mitele - Descargavideos.TV';
			$img='mitele.png';
			$bg="#666";
		break;
		case 'univision':
			$titulo="Descargar videos de Univision TV online - ".date("Y");
			$descripcion='Descargar videos de la web de Univision. La mejor página para bajar videos gratis de Univision - Descargavideos.TV';
			$img='univision.png';
			$bg="#346F77";
		break;
		case 'cuatro':
			$titulo="Descargar videos de Cuatro TV online - ".date("Y");
			$descripcion='Descargar videos de la web de Cuatro. La mejor página para bajar videos gratis de Cuatro - Descargavideos.TV';
			$img='cuatro.png';
			$bg="#812200";
		break;
		case 'la-sexta':
			$titulo="Descargar videos de La Sexta TV online - ".date("Y");
			$descripcion='Descargar videos de la web de La Sexta. La mejor página para bajar videos gratis de La Sexta - Descargavideos.TV';
			$img='lasexta.png';
			$bg="#417327";
		break;
		case 'youtube':
			$titulo="Descargar videos de YouTube online - ".date("Y");
			$descripcion='Descargar videos de la web YouTube. La mejor página para bajar videos gratis de YouTube - Descargavideos.TV';
			$img='youtube.png';
			$bg="#c62222";
		break;
	}
	$palabras_clave='bajar videos, canal tv, television, series online, tv nacional, video download';
}

function template($cual){
	return corrige(file_get_contents("paginas/".$cual));
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>

<title><?php echo $titulo;?></title>


<meta name="RATING" content="GENERAL"/>

<!--<meta name="advertising" content="ask"/>-->

<meta name="keywords" content="<?php echo $palabras_clave?>"/>
<meta name="description" content="<?php echo $descripcion?>"/>


<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


<link href="/favicon.ico" rel="icon" type="image/x-icon"/>
<link rel="stylesheet" href="/css/reset.min.css"/>
<link rel="stylesheet" href="/css/all.min.css"/>
<link rel="stylesheet" href="/css/<?php echo $css_extra?>"/>
<link href="/css/font/fuentes.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="/js/funciones.min.js"></script>


<script>
var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-29252510-1"]);_gaq.push(["_trackPageview"]);(function(){var ga=document.createElement("script");ga.type="text/javascript";ga.async=true;ga.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ga,s);})();
</script>


<script src="https://apis.google.com/js/plusone.js"></script>
<script>
{lang: 'es'}
</script>

<style>

html{
	background: #000; /* Old browsers */
	background-image:url(/img/pag_cadenas/<?php echo $img;?>); /* Old browsers */
	
	background-image: url(/img/pag_cadenas/<?php echo $img;?>), -moz-linear-gradient(-45deg, <?php echo $bg?> 0%, #000 100%); /* FF3.6+ */
	background-image: url(/img/pag_cadenas/<?php echo $img;?>), -webkit-gradient(linear, left top, right bottom, color-stop(0%,<?php echo $bg?>), color-stop(100%,#000)); /* Chrome,Safari4+ */ 
	background-image: url(/img/pag_cadenas/<?php echo $img;?>), -webkit-linear-gradient(-45deg, <?php echo $bg?> 0%,#000 100%); /* Chrome10+,Safari5.1+ */
	background-image: url(/img/pag_cadenas/<?php echo $img;?>), -o-linear-gradient(-45deg, <?php echo $bg?> 0%,#000 100%); /* Opera 11.10+ */
	background-image: url(/img/pag_cadenas/<?php echo $img;?>), -ms-linear-gradient(-45deg, <?php echo $bg?> 0%,#000 100%); /* IE10+ */
	background-image: url(/img/pag_cadenas/<?php echo $img;?>), linear-gradient(135deg, <?php echo $bg?> 0%,#000 100%); /* W3C */ 
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $bg?>', endColorstr='#000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
	background-attachment: fixed;

	background-repeat:no-repeat;
	background-position:110% 110%;
}

a{
	color:#0064FF;
	text-shadow:1px 1px 0 #FFF;
}

a:hover{
	text-shadow:1px 1px 0 #000;
}
</style>

</head>
<body>

<script>var adblock=true;</script>
<script src="/advertisement.js"></script>
<script>_gaq.push(["_trackEvent","Adblock","Estado",adblock?"Con Adblock":"Sin Adblock"]);</script>


<div class="todo">
	<div class="cabecera" id="cabecera">
		<a href="/" title="Ir al inicio"><h1>DescargaVideos<span class="tv">.TV</span></h1></a>
		<h2>descarga videos de todos los canales nacionales</h2>

		<div class="centro">
			<form action="/" method="get" name="formCalculador" id="formCalculador">
				<div class="fondo_input_web">
					<input type="text" name="web" id="web" class="entrada" placeholder="Pega la URL del vídeo..." value="<?php if(isset($_REQUEST["web"]))echo $_REQUEST["web"]?>" title="URL a obtener">
				</div>
				<input type="submit" id="submit" value=" " class="boton">


				<div id="ayuda1" class="letra_ayuda">
					<div class="flechaIzq"></div>
					Copia la url donde está el vídeo
				</div>

				<div id="ayuda2" class="letra_ayuda invisible">
					<div class="flechaDer"></div>
					Busca el enlace del vídeo
				</div>
			</form>
		</div>

		<div class="stats">
			<div id="histats_counter"></div>
			<script type="text/javascript">var _Hasync= _Hasync|| [];
			_Hasync.push(['Histats.startgif', '1,2419951,4,10045,"div#histatsC {position: absolute;top:0;left:0;}body>div#histatsC {position: fixed;}"']);
			_Hasync.push(['Histats.fasi', '1']);
			_Hasync.push(['Histats.track_hits', '']);
			(function() {
			var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
			hs.src = ('http://s10.histats.com/js15_gif_as.js');
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
			})();</script>
			<noscript><a href="http://www.histats.com" alt="contadores" target="_blank" ><div id="histatsC"><img border="0" src="http://s4is.histats.com/stats/i/2419951.gif?2419951&103"></div></a>
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
</div>

<script>
	webI = D.g('web');
	function webF(e) {
		var a = D.g('ayuda1');
		var b = D.g('ayuda2');
		if (webI.value.length > 0 || e == 1) {
			qC(b, "invisible");
			aC(a, "invisible");
		} else {
			aC(b, "invisible");
			qC(a, "invisible");
		}
	}
	webI.onblur = webF;
	webF();
	webI.onfocus = function() {
		webF(1);
	};
</script>

</body>
</html>