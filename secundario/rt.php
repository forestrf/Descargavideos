<?php
function rt(){
global $web,$web_descargada;
$web_descargada;
//$urlfull=CargaWebCurl($web);

$obtenido=array('enlaces' => array());

//titulo
//<meta property="og:title" content="..."
$p=strpos($web_descargada,'og:title');
$p=strpos($web_descargada,'content="',$p)+9;
$f=strpos($web_descargada,'"',$p);
$titulo=substr($web_descargada,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//imagen
//<meta property="og:image" content="....png" />
$p=strpos($web_descargada,'og:image');
$p=strpos($web_descargada,'content="',$p)+9;
$f=strpos($web_descargada,'"',$p);
$imagen=substr($web_descargada,$p,$f-$p);
dbug('imagen='.$imagen);

$posibilidades=array("mp4_hd","ogv_hd","mp4_high","ogv_high","mp4_med","ogv_med","mp4_low","ogv_low");

$baseLimpia=agregaSubDominio("");

$url="";

for($i=0;$i<8;$i++){//8 videos
	//url:'mp4%3A%2Fweb%2F4311%2F4311.mp4',
	$p=strpos($web_descargada,'id="'.$posibilidades[$i].'"');
	$f=strpos($web_descargada,">",$p);
	$url=substr($web_descargada,$p,$f-$p);

	$p=strpos($url,'src="')+5;
	$f=strpos($url,'"',$p);
	$url=$baseLimpia.substr($url,$p,$f-$p);
	dbug('url='.$url);

	if(esVideoAudioAnon($url)){
		array_push($obtenido['enlaces'],array(
			'titulo' => $posibilidades[$i],
			'url'    => $url,
			'tipo'   => 'http'
		));
	}
	else{ //ya no hay mas videos. fin
		$i=8;
		
	}
}


if(duda($obtenido,$url)){
	dbug('intento 0');
	$titulo=entre1y2($web_descargada,'<meta property="og:title" content="','"');
	
	if(enString($web_descargada, 'og:video')){
		$url=entre1y2($web_descargada,'<meta property="og:video" content="','"');
	}
}

if(duda($obtenido,$url)){
	dbug('intento 1');
	$titulo="rt.com";

	//video = "..."
	$p=strpos($web_descargada,'video = "')+9;
	$f=strpos($web_descargada,'"',$p);
	$url2=$baseLimpia.substr($web_descargada,$p,$f-$p);

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if(duda($obtenido,$url)){
	dbug('intento 2');
	$titulo="rt.com";

	//file=http://actualidad.rt.com/images/programas/123/programas_1636.flv&
	$p=strpos($web_descargada,'file=')+5;
	$f=strpos($web_descargada,'&',$p);
	$url2=$baseLimpia.substr($urlfull, $p, $f-$p);

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if(duda($obtenido,$url)){
	dbug('intento 3');
	$titulo="rt.com";

	//'file': 'http://actualidad.rt.com/images/programas/123/programas_1636.flv'&
	$p=strpos($web_descargada,"'file': '")+9;
	$f=strpos($web_descargada,"'",$p);
	$url2=$baseLimpia.substr($web_descargada, $p, $f-$p);

	if(esVideoAudioAnon($url2))
		$url=$url2;
}


if(duda($obtenido,$url)){
	dbug('intento 4');
	$titulo="rt.com";

	//source src="http://actualidad.rt.com/images/programas/123/programas_1636.flv"
	$p=strpos($web_descargada,'<source src="')+13;
	$f=strpos($web_descargada,'"',$p);
	$url2=$baseLimpia.substr($web_descargada, $p, $f-$p);

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if(duda($obtenido,$url)){
	dbug('intento 5');
	$titulo="rt.com";

	//video:'/files/news/syria-rebel-massacre-aleppo-627/ie7d56fbec8d0673a34b31e08adb343fe_aleppo-mass-shooting.flv'
	$p=strpos($web_descargada,"video:'")+7;
	$f=strpos($web_descargada,"'",$p);
	$url2=$baseLimpia.substr($web_descargada, $p, $f-$p);

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

array_push($obtenido['enlaces'],array(
	'url'  => $url,
	'tipo' => 'http'
));

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
global $web;
$p=strpos($web,'http://')+7;
$f=strpos($web,".rt.com",$p);
if($f<0)
	return 'http://'.substr($web,$p,$f-$p).'.rt.com'.$a;
else
	return 'http://rt.com'.$a;
}
?>