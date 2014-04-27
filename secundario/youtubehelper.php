<?php
function youtubehelper(){
	global $web,$web_descargada;
	
	$encontrado = false;
	$intentos = 5;
	
	$tube=new youtube();
	$links=$tube->parse($web_descargada);
	dbug_r($links);
	
	while(($links === false || count($links) == 0) && $intentos > 0){
		dbug("ERROR: ".$tube->error);
		dbug('reintentando en 1s');
		sleep(1);
		
		$tube=new youtube();
		$links=$tube->parse(CargaWebCurl($web,"",0,"",array(),true,true));
		dbug_r($links);
		--$intentos;
	}
	
	$obtenido=array('enlaces' => array());

	if($links){
		//id
		parse_str(parse_url($web, PHP_URL_QUERY),$vars);
		//$id=$vars['v']

		dbug_r($vars);

		//imagen
		//https://i1.ytimg.com/vi/8GLNKyfdnQg/0.jpg
		$imagen='https://i1.ytimg.com/vi/'.$vars['v'].'/0.jpg';
		dbug($imagen);

		$p=strpos($web_descargada,'<meta name="title" content="')+28;
		$f=strpos($web_descargada,'"',$p);
		$titulo=substr($web_descargada,$p,$f-$p);
		$titulo=limpiaTitulo($titulo);

		foreach($links as $link){
			//'ext','p','axb','2D-3D','audio','url'
			array_push($obtenido['enlaces'],
				array(
					'url'     => $link['url']."&title=".$titulo,
					'tipo'    => 'http',
					'url_txt' => $link['p'].' '.$link['ext'].($link['2D-3D']==='3D'?': 3D':'')
				)
			);
		}
		/*$ch=curl_init();
			curl_setopt($ch,CURLOPT_URL,$obtenido['enlaces'][0]['url']);
			curl_setopt($ch,CURLOPT_RANGE,'0-500');
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_HEADER,1);
			$result=curl_exec($ch);
			curl_close($ch);
			dbug('resultado = '.$result);*/


		$obtenido['titulo']=$titulo;
		$obtenido['imagen']=$imagen;
		
		finalCadena($obtenido,false);
	}
	else{
		setErrorWebIntera($tube->error);
		return;
	}
}

function youtubehelper_urlAcortada(){
	global $web,$web_descargada_headers;
	foreach($web_descargada_headers as $header){
		if(strpos($header, 'Location: ') === 0){
			$web = substr($header, strposF($header, 'Location: '));
			dbug('Location encontrado = '.$web);
			$web_descargada = CargaWebCurl($web);
			youtubehelper();
			continue;
		}
	}
	//$web = 
}
?>