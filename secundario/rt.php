<?php

class Rt extends cadena{

function calcula(){
$obtenido=array('enlaces' => array());

//titulo
//<meta property="og:title" content="..."
$p=strpos($this->web_descargada,'og:title');
$titulo=entre1y2_a($this->web_descargada,$p,'content="','"');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//imagen
//<meta property="og:image" content="....png" />
$p=strpos($this->web_descargada,'og:image');
$imagen=entre1y2_a($this->web_descargada,$p,'content="','"');
dbug('imagen='.$imagen);

$posibilidades=array("mp4_hd","ogv_hd","mp4_high","ogv_high","mp4_med","ogv_med","mp4_low","ogv_low");

$baseLimpia=$this->agregaSubDominio("");

$url="";

for($i=0;$i<8;$i++){//8 videos
	//url:'mp4%3A%2Fweb%2F4311%2F4311.mp4',
	$p=strpos($this->web_descargada,'id="'.$posibilidades[$i].'"');
	$f=strpos($this->web_descargada,">",$p);
	$url=substr($this->web_descargada,$p,$f-$p);

	$url=$baseLimpia.entre1y2($url,'src="','"');
	dbug('url='.$url);

	if(esVideoAudioAnon($url)){
		$obtenido['enlaces'][] = array(
			'titulo' => $posibilidades[$i],
			'url'    => $url,
			'tipo'   => 'http'
		);
	}
	else{ //ya no hay mas videos. fin
		$i=8;
		
	}
}


if($this->duda($obtenido,$url)){
	dbug('intento 0');
	$titulo=entre1y2($this->web_descargada,'<meta property="og:title" content="','"');
	
	if(enString($this->web_descargada, 'og:video')){
		$url=entre1y2($this->web_descargada,'<meta property="og:video" content="','"');
	}
}

if($this->duda($obtenido,$url)){
	dbug('intento 1');
	$titulo="rt.com";

	//video = "..."
	$url2=$baseLimpia.entre1y2($this->web_descargada,'video = "','"');

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if($this->duda($obtenido,$url)){
	dbug('intento 2');
	$titulo="rt.com";

	//file=http://actualidad.rt.com/images/programas/123/programas_1636.flv&
	$url2=$baseLimpia.entre1y2($this->web_descargada,'file=','&');

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if($this->duda($obtenido,$url)){
	dbug('intento 3');
	$titulo="rt.com";

	//'file': 'http://actualidad.rt.com/images/programas/123/programas_1636.flv'&
	$url2=$baseLimpia.entre1y2($this->web_descargada,"'file': '","'");

	if(esVideoAudioAnon($url2))
		$url=$url2;
}


if($this->duda($obtenido,$url)){
	dbug('intento 4');
	$titulo="rt.com";

	//source src="http://actualidad.rt.com/images/programas/123/programas_1636.flv"
	$url2=$baseLimpia.entre1y2($this->web_descargada,'<source src="','"');

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if($this->duda($obtenido,$url)){
	dbug('intento 5');
	$titulo="rt.com";

	//video:'/files/news/syria-rebel-massacre-aleppo-627/ie7d56fbec8d0673a34b31e08adb343fe_aleppo-mass-shooting.flv'
	$url2=$baseLimpia.entre1y2($this->web_descargada,"video:'","'");

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if($this->duda($obtenido,$url)){
	dbug('intento 6');
	$titulo="rt.com";

	//video:'/files/news/syria-rebel-massacre-aleppo-627/ie7d56fbec8d0673a34b31e08adb343fe_aleppo-mass-shooting.flv'
	preg_match('@http://.*?\.mp4@', $this->web_descargada, $matches);
	dbug_r($matches);
	$url2=$matches[0];

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

$obtenido['enlaces'][] = array(
	'url'  => $url,
	'tipo' => 'http'
);

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido);
}

function duda($a,$b){
	if(!isset($a['enlaces'][0])&&($b==""||!esVideoAudioAnon($b)))
		return true;
	else return false;
}

function agregaSubDominio($a){
$p=strposF($this->web,'http://');
$f=strpos($this->web,".rt.com",$p);
if($f<0)
	return 'http://'.substr($this->web,$p,$f-$p).'.rt.com'.$a;
else
	return 'http://rt.com'.$a;
}

}
