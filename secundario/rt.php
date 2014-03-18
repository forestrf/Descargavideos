<?php
function rt(){
global $web,$web_descargada;
$urlfull=$web_descargada;
//$urlfull=CargaWebCurl($web);

$obtenido=array('enlaces' => array());

//titulo
//<meta property="og:title" content="..."
$p=strpos($urlfull,'og:title');
$p=strpos($urlfull,'content="',$p)+9;
$f=strpos($urlfull,'"',$p);
$titulo=substr($urlfull,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//imagen
//<meta property="og:image" content="....png" />
$p=strpos($urlfull,'og:image');
$p=strpos($urlfull,'content="',$p)+9;
$f=strpos($urlfull,'"',$p);
$imagen=substr($urlfull,$p,$f-$p);
dbug('imagen='.$imagen);

$posibilidades=array("mp4_hd","ogv_hd","mp4_high","ogv_high","mp4_med","ogv_med","mp4_low","ogv_low");

$baseLimpia=agregaSubDominio("");

$url="";

for($i=0;$i<8;$i++){//8 videos
	//url:'mp4%3A%2Fweb%2F4311%2F4311.mp4',
	$p=strpos($urlfull,'id="'.$posibilidades[$i].'"');
	$f=strpos($urlfull,">",$p);
	$url=substr($urlfull,$p,$f-$p);

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
	dbug('intento 1');
	$titulo="rt.com";

	//video = "..."
	$p=strpos($urlfull,'video = "')+9;
	$f=strpos($urlfull,'"',$p);
	$url2=$baseLimpia.substr($urlfull,$p,$f-$p);

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if(duda($obtenido,$url)){
	dbug('intento 2');
	$titulo="rt.com";

	//file=http://actualidad.rt.com/images/programas/123/programas_1636.flv&
	$p=strpos($urlfull,'file=')+5;
	$f=strpos($urlfull,'&',$p);
	$url2=$baseLimpia.substr($urlfull, $p, $f-$p);

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if(duda($obtenido,$url)){
	dbug('intento 3');
	$titulo="rt.com";

	//'file': 'http://actualidad.rt.com/images/programas/123/programas_1636.flv'&
	$p=strpos($urlfull,"'file': '")+9;
	$f=strpos($urlfull,"'",$p);
	$url2=$baseLimpia.substr($urlfull, $p, $f-$p);

	if(esVideoAudioAnon($url2))
		$url=$url2;
}


if(duda($obtenido,$url)){
	dbug('intento 4');
	$titulo="rt.com";

	//source src="http://actualidad.rt.com/images/programas/123/programas_1636.flv"
	$p=strpos($urlfull,'<source src="')+13;
	$f=strpos($urlfull,'"',$p);
	$url2=$baseLimpia.substr($urlfull, $p, $f-$p);

	if(esVideoAudioAnon($url2))
		$url=$url2;
}

if(duda($obtenido,$url)){
	dbug('intento 5');
	$titulo="rt.com";

	//video:'/files/news/syria-rebel-massacre-aleppo-627/ie7d56fbec8d0673a34b31e08adb343fe_aleppo-mass-shooting.flv'
	$p=strpos($urlfull,"video:'")+7;
	$f=strpos($urlfull,"'",$p);
	$url2=$baseLimpia.substr($urlfull, $p, $f-$p);

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