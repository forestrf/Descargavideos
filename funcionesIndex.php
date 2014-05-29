<?php
//Indicamos el idioma. Es la carpeta a usar dentro de idiomas.
// define('IDIOMA', 'castellano');
function seteaIdioma(){
	define('IDIOMA', 'castellano');
}

function imprimePagina($cual='pag_principal'){
	global $seccion;
	if($cual == '')
		$cual = 'pag_principal';
	elseif($cual != 'pag_principal')
		echo '<div class="seccion">'.$seccion.'</div>';
	else{}
	
	switch($cual){
		case 'changelog':
			require_once 'cambios.php';
			echo cambios();
		break;
		case 'pag_principal':
		case 'lab':
		case 'contacta':
		case 'faq':
		case 'agradecimientos':
		case 'legal':
		case 'donar':
			require_once 'paginas/'.$cual.'.php';
		break;
	}
}

function preparaPagina($cual='pag_principal'){
	global $palabras_clave,$descripcion,$seccion;

	if($cual == '')
		$cual = 'pag_principal';
	
	include_once 'idiomas/'.IDIOMA.'/'.$cual.'.php';
	
	switch($cual){
		case 'pag_principal':
			$palabras_clave='Descargar, vídeos, mitele, rtve, antena3, telecinco, DescargaVideos, online, nacional, 2013, download';
			$descripcion='Descarga tus series favoritas. Simplemente copia y pega la dirección web URL del vídeo que quieres bajar. Ahora puedes descargar vídeos online sin instalar nada, completamente gratis.';
		break;
		case 'lab':
			$seccion=SECCION_LAB;
			$palabras_clave='Gestor, DescargaVideos, forocoches, mitele, programa, pruebas';
			$descripcion='Pruebas relacionadas con la web. En esta sección está el programa bookmarklet de DescargaVideos, programas como M3U8-Downloader y RTMP-Downloader y una utilidad para forocoches entre otras.';
		break;
		case 'changelog':
			$seccion=SECCION_CHANGELOG;
			$palabras_clave='Changelog, historial, cambios, modificaciones, listado';
			$descripcion='Historial de cambios de la página donde se indica desde las incorporaciones de canales o supresiones de los mismos hasta cambios menores como pequeños fallos';
		break;
		case 'contacta':
			$seccion=SECCION_CONTACTA;
			$palabras_clave='Formulario, contactar, DescargaVideos, problemas, ayuda';
			$descripcion='Acceso al formulario contacta donde fácilmente se puede contactar con el creador de la web para informarle de errores, problemas, aconsejarle, recomendarle... Incluso si quieres contarle un chiste puedes hacerlo por aquí.';
		break;
		case 'faq':
			$seccion=SECCION_FAQ;
			$palabras_clave='faq, preguntas frecuentes, ayuda, como, descargar, videos';
			$descripcion='Listado de preguntas frecuentes que pueden surgir para usar la herramienta.';
		break;
		case 'agradecimientos':
			$seccion=SECCION_AGRADECIMIENTOS;
			$palabras_clave='Agradecimientos, enlaces';
			$descripcion='Todos aquellos que de una u otra forma han hecho posible esta web gracias a código, pseudocódigo, explicaciones, ideas o consejos.';
		break;
		case 'legal':
			$seccion=SECCION_LEGAL;
			$palabras_clave='Agradecimientos, enlaces';
			$descripcion='Todos aquellos que de una u otra forma han hecho posible esta web gracias a código, pseudocódigo, explicaciones, ideas o consejos.';
		break;
		case 'donar':
			$seccion=SECCION_DONACION;
			$palabras_clave='donar';
			$descripcion='¿Quieres donar? Toda la información que necesitas saber antes.';
		break;
	}
}
?>