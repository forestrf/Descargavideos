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


ES NECESARIO CAMBIAR EL SWF A UN IFRAME QUE NO ENVIE REFERER, COMO CON LOS BOTONES


CON PONER EN EL REFERER http://played.to/ ya funciona.



iframe.src = 'javascript:\'<embed src="/util/fla/f/http://played.to/1234" name="descargador_archivos"></embed><script>function lanzaPlayedTo(){	if(typeof DESCARGADOR_ARCHIVOS_SWF === "undefined"){	    var d = setTimeout(lanzaPlayedTo, 200);}else if(DESCARGADOR_ARCHIVOS_SWF === true){        descargador_archivos.CargaWeb(            {"url":"http://played.to/49qyhpnfhgip",            "metodo":"GET"},            "procesaPlayedTo1");     }}function procesaPlayedTo1(txt){var regex = /<input.*?name="(.*?)".*?value="(.*?)".*?>/ig;var postA = [];var res = [];while((res = regex.exec(txt)) != null){    if(res[1] === "referer")res[2] = "";    postA.push(res[1] + "=" + res[2].split(" ").join("+"));}console.log(postA);var post = postA.join("&");	console.log(post);	descargador_archivos.CargaWeb({		"url":"http://played.to/49qyhpnfhgip",		"metodo":"POST",		"post":post	}, "procesaPlayedTo2");}function procesaPlayedTo2(txt){    console.log(txt);}        lanzaPlayedTo();</script>\'';


*/


function allmyvideosnet(){
	global $web,$web_descargada;
	
	if(!enString($web_descargada, '<Form name="F1" method="POST" action=\'\'>')){
		setErrorWebIntera('No se encuentra ningún vídeo');
		return;
	}
	
	$id = substr($web, strposF($web, 'allmyvideos.net/'));
	dbug('id = '.$id);
	
	$web_embedPlayedTo = 'http://allmyvideos.net/embed-'.$id.'.html';
	
	// 
	$retfull = CargaWebCurl($web_embedPlayedTo,'',array('referer'=>'http://web.com'));
	$imagen = entre1y2($retfull, '"image" : "', '"');
	
	$titulo = 'AllMyVideos ID: '.$id;

	// FALLA EN EL CALLBACK DEL SWF. EDITAR EL SWF
	
	$urlJS = 
	/*
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
		
		'var post = "";'.
		'var res = [];'.
		'while((res = regex.exec(txt)) != null){'.
			'if(res[1] === "referer")res[2] = "";'.
			'post += res[1] + "=" + res[2] +"&";'.
		'}'.
		
		'getFlashMovie("descargador_archivos").CargaWeb({'.
			'"url":"'.$web.'",'.
			'"metodo":"POST",'.
			'"post":post'.
		'}, "procesaPlayedTo2");'.
	'}
	'.
	*/
	
	'function lanzaAllMyVideosNet(){'.
		'if(typeof DESCARGADOR_ARCHIVOS_SWF === "undefined"){'.
			'setTimeout(lanzaAllMyVideosNet, 200)'.
		'}'.
		'else if(DESCARGADOR_ARCHIVOS_SWF === true){'.
			'getFlashMovie("descargador_archivos").CargaWeb({'.
				'"url":"'.$web_embedPlayedTo.'",'.
				'"metodo":"GET"'.
			'}, "lanzaAllMyVideosNet2");'.
		'}'.
	'}'.
	
	'function lanzaAllMyVideosNet2(txt){'.
		//'console.log(txt);'.
		
		'var urls = txt.split("\"sources\" : ")[1].split("]")[0]+"]";'.
		
		'var urls = JSON.parse(urls);'.
		
		'urls.sort(function(a,b){return parseInt(a["label"])<parseInt(b["label"])});'.
		
		'url = urls[0]["file"];'.
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
	// Hack para poner en el referer la palabra http://played.to ya que hace que funcione todo
	'descargadorArchivosEmbed.setAttribute("src","/util/fla/f/http://played.to/");'.
	'descargadorArchivosEmbed.setAttribute("name","descargador_archivos");'.
	'descargadorArchivosEmbed.setAttribute("width","0");'.
	'descargadorArchivosEmbed.setAttribute("height","0");'.
	//'descargadorArchivosEmbed.setAttribute("allowScriptAccess","sameDomain");'.
	'document.body.appendChild(descargadorArchivosEmbed);'.
	
	'lanzaAllMyVideosNet();';
	
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