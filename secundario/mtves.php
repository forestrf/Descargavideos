<?php

class Mtves extends cadena{

function calcula(){
$retfull=CargaWebCurlProxy($this->web,'ESP');


//titulo
//<meta property="og:title" content="Alaska y Mario Episodio Extra - Pierrot"/>
$p=strpos($retfull,'og:title');
$titulo=entre1y2_a($retfull,$p,'content="','"');
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//imagen
//<meta property="og:image" content="http://....jpg?height=106&amp;quality=0.91"/>
$p=strpos($retfull,'og:image');
$imagen=entre1y2_a($retfull,$p,'content="','?');
if(enString($imagen,'mtvnimages.com')){
	$imagen = $imagen.'?height=180&quality=1';
} else {
	$imagen = substr($imagen,0,strpos($imagen,'"'));
}

if($imagen == '' || enString($imagen,'<')){
	$imagen = entre1y2($retfull, 'rel="image_src" href="', '"');
}

dbug('imagen='.$imagen);

//vid:"786779",
$id=entre1y2($retfull,'vid:"','"');
dbug('id='.$id);

//http://intl.esperanto.mtvi.com/www/xml/media/mediaGen.jhtml?uri=mgid:uma:video:mtv.es:747606

$url='http://intl.esperanto.mtvi.com/www/xml/media/mediaGen.jhtml?uri=mgid:uma:video:mtv.es:'.$id;
dbug('url='.$url);

$ret=CargaWebCurlProxy($url,'ESP');
dbug($ret);

//Por situación geográfica del servidor (supongo) da error. Usar pydowntv :(
if(!enString($ret,'copyright_error.flv')){
	$extracto=entre1y2($ret,'<rendition','<beacons>');
	dbug('extracto='.$extracto);

	$p=strrposF($extracto,'<src>');
	$f=strpos($extracto,'<',$p);
	$url=substr($extracto,$p,$f-$p);
}
else{
	dbug('Usando pydowntv');
	$ret=CargaWebCurl('http://www.pydowntv.com/api?url='.$this->web);
	dbug($ret);
	$url=entre1y2($ret,'"url_video": ["','"');
}

$obtenido = array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $url,
			'rtmpdump' => '-r "'.$url.'" -o "'.generaNombreWindowsValido($titulo).'.'.(enString($url,'.mp4')?'mp4':'flv').'"',
			'tipo' => 'rtmpConcreto'
		)
	)
);

finalCadena($obtenido);
}

}
