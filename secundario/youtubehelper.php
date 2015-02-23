<?php

class Youtubehelper extends cadena{

function calcula(){
	if(enString($this->web, '.com/v/')){
		$this->web = 'https://www.youtube.com/watch?v='.substr($this->web,strposF($this->web,'.com/v/'));
	}
	$this->web = strtr($this->web, array('//m.' => '//www.'));
	
	//id
	parse_str(parse_url($this->web, PHP_URL_QUERY),$vars);
	//$id=$vars['v']

	dbug_r($vars);
		
	$encontrado = false;
	$intentos = 3;
	
	$tube=new youtube();
	$links=$tube->parse($this->web_descargada);
	dbug_r($links);
	
	$web2 = $this->web;
	while(($links === false || count($links) == 0) && $intentos > 0){
		dbug("ERROR: ".$tube->error);
		dbug('reintentando en 0.1s');
		usleep(100000);
		
		$tube=new youtube();
		$links=$tube->parse(CargaWebCurl($web2,'',0,'',array(),true,true));
		dbug_r($links);
		--$intentos;
	}
	
	$obtenido=array('enlaces' => array());
	
	if($links){
		//imagen
		//https://i1.ytimg.com/vi/8GLNKyfdnQg/0.jpg
		$imagen='https://i1.ytimg.com/vi/'.$vars['v'].'/0.jpg';

		$titulo=entre1y2($this->web_descargada,'<meta name="title" content="','"');
		$titulo=limpiaTitulo($titulo);

		foreach($links as &$link){
			//'ext','p','axb','2D-3D','audio','url'
			$obtenido['enlaces'][] = array(
				'url'     => $link['url']."&title=".urlencode(decode_entities($titulo)),
				'tipo'    => 'http',
				'url_txt' => $link['p'].' '.$link['ext'].($link['2D-3D']==='3D'?': 3D':'')
			);
		}


		$obtenido['titulo']=$titulo;
		$obtenido['imagen']=$imagen;
		
		finalCadena($obtenido,false);
	}
	else{
		setErrorWebIntera($tube->error);
		return;
	}
}

function calcula_urlAcortada(){
	foreach($this->web_descargada_headers as $header){
		if(strpos($header, 'Location: ') === 0){
			$this->web = substr($header, strposF($header, 'Location: '));
			dbug('Location encontrado = '.$this->web);
			$this->web_descargada = CargaWebCurl($this->web);
			$this->calcula();
			continue;
		}
	}
}

function bookmarklet() {
	return 'bookmarklet_form();';
}

}
