<?php

class Crtvg extends cadena{

function calcula(){
//title: "Matalobos quotAno 1 A familiaquot",
$titulo=entre1y2($this->web_descargada,'<title>','<');
if (enString($titulo, ' |')) {
	$titulo=entre1y2($titulo,0,' |');
}
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

if (enString($this->web_descargada, "id=$(this).attr('id').split('|');")) {
	
	preg_match("#url:.*?'(.*?)',#i", $this->web_descargada, $matches);
	dbug_r($matches);
	
	$url = $matches[1];
	if ($url[0] === '/') {
		$url = 'http://www.crtvg.es' . $url;
	} else if ($url[0] !== 'h') {
		$url = substr($this->web, 0, strrposF($this->web, '/')) . $url;
	}
	dbug_r($url);
	
	preg_match_all("#<div class='cap' id='([0-9]+?)\|([0-9]+?)'>#", $this->web_descargada, $matches);
	dbug_r($matches);
	
	$obtenido = array(
		'titulo'  => $titulo,
		'imagen'  => '/canales/tvg.jpg',
		'enlaces' => array()
	);
	
	for ($i = 0, $i_t = count($matches[0]); $i < $i_t; $i++) {
		$ret = CargaWebCurl($url, 'idSerie='.$matches[1][$i].'&idCapitulo='.$matches[2][$i]);
		//dbug_($ret);
		$tit = entre1y2($ret, '<div id="titulo">', '</div');
		$tit = strip_tags($tit);
		$this->parsefragment($obtenido['enlaces'], $ret, $tit, true);
	}
} else {
	//backgroundImage: "url(http://www.crtvg.es/files/web/000020120911000003.jpg)"
	$p=strpos($this->web_descargada,'backgroundImage:');
	$imagen=entre1y2_a($this->web_descargada,$p,'url(',')');
	dbug('imagen='.$imagen);
	
	$obtenido = array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array()
	);
	
	$this->parsefragment($obtenido['enlaces'], $this->web_descargada, $titulo);
}

finalCadena($obtenido);
}

function parsefragment(&$arr, $html, $titulo, $multiple = false) {
	//rtmp://media1.crtvg.es:80/vod
	$p=strpos($html,'clip:');
	$p=strpos($html,'url:',$p);
	$url=entre1y2_a($html,$p,'"','"');
	dbug('url='.$url);
	
	//netConnectionUrl: "rtmp://media1.crtvg.es:80/vod"
	$p=strpos($html,'netConnectionUrl:');
	$preurl=entre1y2_a($html,$p,'"','"');
	dbug('$preurl='.$preurl);
	
	
	
	//ipadUrl: "http:// m3u8"
	$p=strpos($html,'ipadUrl:');
	$ipadUrl=entre1y2_a($html,$p,'"','"');
	dbug('$ipadUrl='.$ipadUrl);
	
	if ($multiple) {
		$arr[] = array(
			'titulo' => $titulo
		);
	}
	
	$arr[] = array(
		'url'  => ' ',
		'rtmpdump' => '-r "'.$preurl.'" -y "'.$url.'" -o "'.generaNombreWindowsValido($titulo).'.mp4"',
		'tipo' => 'rtmpConcreto'
	);
	
	if(strlen($ipadUrl) > 10){
		$arr[] = array(
			'url'  => $ipadUrl,
			'tipo' => 'm3u8'
		);
	}
}

}
