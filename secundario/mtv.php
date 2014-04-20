<?php
function mtv(){
global $web;
$retfull=CargaWebCurlProxy($web,'ESP');


//titulo
//<meta property="og:title" content="Alaska y Mario Episodio Extra - Pierrot"/>
$p=strpos($retfull,'og:title');
$p=strpos($retfull,'content="',$p)+9;
$f=strpos($retfull,'"',$p);
$titulo=substr($retfull,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//imagen
//<meta property="og:image" content="http://....jpg?height=106&amp;quality=0.91"/>
$p=strpos($retfull,'og:image');
$p=strposF($retfull,'content="',$p);
$f=strpos($retfull,'?',$p);
$imagen=substr($retfull,$p,$f-$p);
if(enString($imagen,'mtvnimages.com')){
	$imagen = $imagen.'?height=180&quality=1';
}
else{
	$imagen = substr($imagen,0,strpos($imagen,'"'));
}

if($imagen == '' || enString($imagen,'<')){
	$imagen = entre1y2($retfull, 'rel="image_src" href="', '"');
}

dbug('imagen='.$imagen);

//vid:"786779",
$p=strpos($retfull,'vid:"')+5;
$f=strpos($retfull,'"',$p);
$id=substr($retfull,$p,$f-$p);
dbug('id='.$id);

//http://intl.esperanto.mtvi.com/www/xml/media/mediaGen.jhtml?uri=mgid:uma:video:mtv.es:747606

$url='http://intl.esperanto.mtvi.com/www/xml/media/mediaGen.jhtml?uri=mgid:uma:video:mtv.es:'.$id;
dbug('url='.$url);

$ret=CargaWebCurlProxy($url,'ESP');
dbug($ret);

//Por situación geográfica del servidor (supongo) da error. Usar pydowntv :(
if(!enString($ret,'copyright_error.flv')){
	$p=strpos($ret,'<rendition');
	$f=strpos($ret,'<beacons>',$p);
	$extracto=substr($ret,$p,$f-$p);
	dbug('extracto='.$extracto);

	$p=strrpos($extracto,'<src>')+5;
	$f=strpos($extracto,'<',$p);
	$url=substr($extracto,$p,$f-$p);
}
else{
	dbug('Usando pydowntv');
	$ret=CargaWebCurl('http://www.pydowntv.com/api?url='.$web);
	dbug($ret);
	$p=strposF($ret,'"url_video": ["');
	$f=strpos($ret,'"',$p);
	$url=substr($ret,$p,$f-$p);
}

$obtenido = array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $url,
			'rtmpdump' => '-r "'.$url.'" -o "'.$titulo.'"',
			'tipo' => 'rtmpConcreto'
		)
	)
);

finalCadena($obtenido);
}
?>