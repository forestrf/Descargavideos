<?php
function aragontv(){
global $web,$web_descargada;

//cargar la URL
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

/*
"clip":{"url":"mp4:/_archivos/videos/web/4334/4334.mp4"}
"netConnectionUrl":"rtmp://alacarta.aragontelevision.es/vod"
"playlist":[{"url":"mp4:/_archivos/videos/web/4334/4334.mp4"}]

http://alacarta.aragontelevision.es/_archivos/videos/web/4334/4334.mp4
*/

$imagen='/canales/aragontv.png';

$obtenido=array('enlaces' => array());

//un solo video
if(enString($retfull,"flowplayer(")){
	dbug('simple');
	$titulo=entre1y2($retfull,'<div class="apartado"><h2>','</h2>');
	$titulo=limpiaTitulo($titulo);
	
	if(enString($titulo, '</')){
		dbug('titulo fallido, usando <title>');
		$titulo=entre1y2($retfull,'<title>','</');
		$titulo=limpiaTitulo($titulo);
	}
	dbug('titulo='.$titulo);
	
	array_push($obtenido['enlaces'],SacarVideo($retfull, $titulo));
}

//muchos videos
elseif(enString($retfull,"list-not-even")){
	dbug('multi');

	$p=strpos($retfull,'<div class="apartado">');
	$p=strpos($retfull,'<h2>',$p)+4;
	$f=strpos($retfull,"</h2>",$p);
	$titulo=substr($retfull,$p,$f-$p);
	
	//en la pagina principal y otras el titulo estará mal, por lo que poner uno genérico
	if(enString($titulo,"<"))
		$titulo='Aragon TV';
	
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);


	$videos=substr_count($retfull,'<span>Ver video</span>');
	dbug('total videos='.$videos);

	$last=0;
	for($i=0;$i<$videos;$i++){
		$p=strpos($retfull,'<div id="idv',$last);
		$p=strpos($retfull,'_',$p)+1;
		$f=strpos($retfull,'"',$p);
		$last=$f;
		$url=substr($retfull,$p,$f-$p);
		$url='http://alacarta.aragontelevision.es/ajax/ajax.php?id='.$url;

		//encontrar ya el titulo del vídeo
		$f=strpos($retfull,'fecha',$p);
		$parte=substr($retfull,$p,$f-$p);
		$p=strrpos($parte,'<a');
		$p=strpos($parte,'title="',$p)+7;
		$f=strpos($parte,'"',$p);
		$subtituto=substr($parte,$p,$f-$p);

		$extracto=CargaWebCurl($url);

		array_push($obtenido['enlaces'],SacarVideoPorId($extracto,$subtituto));
	}
}

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido, false);
}


function SacarVideo($retfull, $titulo){
	//url:'mp4%3A%2Fweb%2F4311%2F4311.mp4',

	$url = entre1y2($retfull,"url:'","'");

	//urldecode(
	$url=urldecode($url);
	dbug($url);

	/*if(enString($url,'_archivos/videos/'))
		$url='http://alacarta.aragontelevision.es/'.$url;
	else
		$url='http://alacarta.aragontelevision.es/_archivos/videos'.$url;
	*/

	$videos=array(
		'url'=> 'rtmp://aragontvvodfs.fplive.net/aragontvvod'.$url,
		'rtmpdump'=> '-r "rtmp://aragontvvodfs.fplive.net/aragontvvod" -y "'.$url.'" -o "'.generaNombreWindowsValido($titulo).'.mp4"',
		'tipo'    => 'rtmpConcreto',
		'extension'=>'mp4'
	);

	return $videos;
}


function SacarVideoPorId($retfull,$subtitulo=''){
//titulo
if($subtitulo==''){
	//<div class="apartado"><h2>ARAGÓN NOTICIAS 1 - 05/05/2012 14:00</h2></div> 
	$p=strpos($retfull,'<h1>')+4;
	$f=strpos($retfull,"<",$p);
	$nombre=substr($retfull,$p,$f-$p);
	dbug('nombre. Obtenido en la web ID='.$nombre);
}else{
	$nombre=$subtitulo;
	dbug('nombre. Obtenido en la web padre='.$nombre);
}

//url:'mp4%3A%2Fweb%2F4311%2F4311.mp4',

$p=strrpos($retfull,"playlist:");
$p=strrpos($retfull,"url: 'mp4",$p)+6;
$f=strpos($retfull,"'",$p);
$url=substr($retfull,$p,$f-$p);

//urldecode(
$url=urldecode($url);
dbug($url);

$p=strrpos($url,"mp4:")+4;
$f=strlen($url);
$url=substr($url,$p,$f-$p);

/*
if(enString($url,'_archivos/videos/'))
	$url='http://alacarta.aragontelevision.es/'.$url;
else
	$url='http://alacarta.aragontelevision.es/_archivos/videos'.$url;
*/


$videos=array(
	'url'=> 'rtmp://aragontvvodfs.fplive.net/aragontvvod'.$url,
	'rtmpdump'=> '-r "rtmp://aragontvvodfs.fplive.net/aragontvvod'.$url.'" -o "'.generaNombreWindowsValido($nombre).'.mp4"',
	'tipo'    => 'rtmpConcreto',
	'titulo' => $nombre,
	'extension'=>'mp4'
);

return $videos;
}
?>