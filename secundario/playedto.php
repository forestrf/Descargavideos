<?php

/*

Por GET y luego por POST

http://played.to/49qyhpnfhgip

http://89.238.150.210:8777/i/01/00655/p769fztivvp3.jpg

http://89.238.150.210:8777/repynsknbsie2cbd4oq3tex3lnwvammyu6aslyky4y7n7sflz2plxumqga/v.mp4.flv?start=0




BLOQUEADO POR IP.

Usan un flash que cargue el html por POST ya que el flash podría cargarlo gracias al crossdomain
http://played.to/crossdomain.xml

Flash hecho, solo falta implementarlo



*/


function playedto(){
	global $web,$web_descargada;
	
	if(!enString($web_descargada, '<Form method="POST" action=\'\'>')){
		setErrorWebIntera('No se encuentra ningún vídeo');
		return;
	}
	
	$imagen = '';
	
	$titulo = entre1y2($web_descargada, '<h1 class="pagename">', '<');

	// FALLA EN EL CALLBACK DEL SWF. EDITAR EL SWF
	
	$urlJS = 
	'function lanzaPlayedTo(){'.
		'if(typeof DESCARGADOR_ARCHIVOS_SWF === "undefined"){'.
			'setTimeout(lanzaPlayedTo, 200)'.
		'}'.
		'else if(DESCARGADOR_ARCHIVOS_SWF === true){'.
			'getFlashMovie("descargador_archivos").CargaWeb({'.
				'"url":"'.$web.'",'.
				'"metodo":"GET"'.
			'}, "procesaPlayedTo1");'.
		'}'.
	'}'.
	
	'function procesaPlayedTo1(txt){'.
			
		'var regex = /<input.*?name="(.*?)".*?value="(.*?)".*?>/ig;'.
		
		'var post = {};'.
		'var res = [];'.
		'while((res = regex.exec(txt)) != null){'.
			'post[res[1]] = res[2];'.
		'}'.
		
		'getFlashMovie("descargador_archivos").CargaWeb({'.
			'"url":"'.$web.'",'.
			'"metodo":"POST",'.
			'"post":post'.
		'}, "procesaPlayedTo2");'.
	'}
	'.
			
			
	'function procesaPlayedTo2(txt){'.
		'AAAAAAAAAA = txt;'.
		//'console.log(txt);'.
		
		'var url = txt.split("file: \"")[1].split("\"")[0];'.
		//'console.log(url);'.
		'mostrarResultado(url);'.
	'}'.
	
	'function mostrarResultado(entrada){'.
		'finalizar(entrada,"Descargar");'.
	'}'.
	
	'function mostrarFallo(){'.
		'finalizar("","Necesitas iniciar sesión en ATresPlayer para descargar este vídeo o bien el vídeo no existe");'.
	'}'.
	
	'function getFlashMovie(movieName){var isIE=navigator.appName.indexOf("Microsoft")!=-1;return(isIE)?window[movieName]:document[movieName];}'.
	
	'var descargadorArchivosEmbed = document.createElement("embed");'.
	'descargadorArchivosEmbed.setAttribute("src","/util/fla/descargador_archivos.swf");'.
	'descargadorArchivosEmbed.setAttribute("name","descargador_archivos");'.
	'descargadorArchivosEmbed.setAttribute("width","0");'.
	'descargadorArchivosEmbed.setAttribute("height","0");'.
	//'descargadorArchivosEmbed.setAttribute("allowScriptAccess","sameDomain");'.
	'document.body.appendChild(descargadorArchivosEmbed);'.
	
	'lanzaPlayedTo();';
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array(
			array(
				'url'  => $urlJS,
				'tipo' => 'js'
			)
		)
	);
	
	finalCadena($obtenido);
}
?>