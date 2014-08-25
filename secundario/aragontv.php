<?php
function aragontv(){
global $web_descargada;

/*
"clip":{"url":"mp4:/_archivos/videos/web/4334/4334.mp4"}
"netConnectionUrl":"rtmp://alacarta.aragontelevision.es/vod"
"playlist":[{"url":"mp4:/_archivos/videos/web/4334/4334.mp4"}]

http://alacarta.aragontelevision.es/_archivos/videos/web/4334/4334.mp4
*/

$imagen='/canales/aragontv.png';

$obtenido=array('enlaces' => array());

//un solo video
if(enString($web_descargada,'flowplayer(')){
	dbug('simple');
	$titulo=entre1y2($web_descargada,'<div class="apartado"><h2>','</h2>');
	$titulo=limpiaTitulo($titulo);
	
	if(enString($titulo, '</')){
		dbug('titulo fallido, usando <title>');
		$titulo=entre1y2($web_descargada,'<title>','</');
		$titulo=limpiaTitulo($titulo);
	}
	dbug('titulo='.$titulo);
	
	$obtenido['enlaces'][] = SacarVideo($web_descargada, $titulo);
}

//muchos videos
elseif(enString($web_descargada,'list-not-even')){
	dbug('multi');

	$p=strpos($web_descargada,'<div class="apartado">');
	$titulo=entre1y2_a($web_descargada,$p,'<h2>','</h2>');
	
	//en la pagina principal y otras el titulo estará mal, por lo que poner uno genérico
	if(enString($titulo,'<'))
		$titulo='Aragon TV';
	
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);


	$videos=substr_count($web_descargada,'<span>Ver video</span>');
	dbug('total videos='.$videos);

	$last=0;
	for($i=0;$i<$videos;$i++){
		$last=strposF($web_descargada,'<div id="idv',$last);
		$url='http://alacarta.aragontelevision.es/ajax/ajax.php?id='.entre1y2_a($web_descargada,$last,'_','"');

		//encontrar ya el titulo del vídeo
		$f=strpos($web_descargada,'fecha',$last);
		$parte=substr($web_descargada,$last,$f-$last);
		$p=strrpos($parte,'<a');
		$nombre=entre1y2_a($parte,$p,'title="','"');

		$extracto=CargaWebCurl($url);

		$obtenido['enlaces'][] = SacarVideoPorId($extracto,$nombre);
	}
}

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido, false);
}


function SacarVideo(&$entrada, $nombre){
	//url:'mp4%3A%2Fweb%2F4311%2F4311.mp4',

	$retfull = strtr($entrada,array(' '=>''));
	
	$url = entre1y2($retfull,"url:'","'");

	//urldecode(
	$url=urldecode($url);
	dbug($url);
	
	$rtmpbase = entre1y2($retfull,"netConnectionUrl:'","'");

	//urldecode(
	$rtmpbase=urldecode($rtmpbase);
	dbug_($rtmpbase);

	/*if(enString($url,'_archivos/videos/'))
		$url='http://alacarta.aragontelevision.es/'.$url;
	else
		$url='http://alacarta.aragontelevision.es/_archivos/videos'.$url;
	*/

	$videos=array(
		'url'      => 'rtmp://aragontvvodfs.fplive.net/aragontvvod'.$url,
		'rtmpdump' => '-r "'.$rtmpbase.'" -y "'.$url.'" -o "'.generaNombreWindowsValido($nombre).'.mp4"',
		'tipo'     => 'rtmpConcreto',
		'extension'=>'mp4'
	);

	return $videos;
}


function SacarVideoPorId(&$entrada,$nombre=''){
	//titulo
	if($nombre===''){
		//<div class="apartado"><h2>ARAGÓN NOTICIAS 1 - 05/05/2012 14:00</h2></div> 
		$nombre=entre1y2($entrada,'<h1>','<');
		dbug('nombre. Obtenido en la web ID='.$nombre);
	}else{
		dbug('nombre. Obtenido en la web padre='.$nombre);
	}
	
	$res = SacarVideo($entrada,$nombre);
	$res['titulo'] = $nombre;
	return $res;
}
?>