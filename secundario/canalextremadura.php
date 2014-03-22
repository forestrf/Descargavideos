<?php
function canalextremadura(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

$obtenido=array('enlaces' => array());

//raido o tv
if(enString($retfull,"#radio")){
	$p=strpos($retfull,'http://podcastdl.');
	$f=strpos($retfull,'"',$p);
	$ret=substr($retfull,$p,$f-$p);
	dbug('url='.$ret);

	array_push($obtenido['enlaces'],array(
		'url'  => $ret,
		'tipo' => 'http'
	));

	$p=strpos($retfull,'<div class="imagen"><img src="')+30;
	$f=strpos($retfull,'"',$p);	
	$imagen=substr($retfull,$p,$f-$p);
	dbug('imagen='.$imagen);
}

if(enString($retfull,"#tv")){
	$p=strpos($retfull,'rtmp://');
	$f=strpos($retfull,'"',$p);
	$rtmp=substr($retfull,$p,$f-$p);

	if(enString($rtmp,"#")){
		$p=0;
		$f=strpos($rtmp,'#');
		if(enString($rtmp,"#tv"))
			$f=strpos($rtmp,'#',$f+1);
		$rtmp=substr($rtmp,$p,$f-$p);
	}
	$sustituir=array("#"=>"");
	$rtmp=strtr($rtmp,$sustituir);

	dbug('rtmp='.$rtmp);

	//if(isiPad)
	$p=strpos($retfull,'if(isiPad)');
	$f=strpos($retfull,'</script>',$p);
	$http=substr($retfull,$p,$f-$p);

	//poster="/sites/default/files/extremaduranoticas_nuevo2.jpg"
	$p=strpos($http,'poster="')+8;
	$f=strpos($http,'"', $p);	
	$imagen="http://www.canalextremadura.es".substr($http, $p, $f-$p);
	dbug('imagen='.$imagen);

	$p=strpos($http,'src="')+5;
	$f=strpos($http,'"', $p);
	$http=substr($http, $p, $f-$p);


	dbug('http='.$http);
	array_push($obtenido['enlaces'],array(
		'titulo'  => 'Calidad Baja',
		'url'     => $http,
		'tipo'    => 'http'
	));
	
	array_push($obtenido['enlaces'],array(
		'titulo'  => 'Calidad Alta',
		'url'     => $rtmp,
		'tipo'    => 'rtmp'
	));
}

if(enString($retfull,".mp4#")){
	$rtmp='rtmp://'.entre1y2($retfull,'rtmp://','.mp4').'.mp4';

	dbug('rtmp='.$rtmp);

	//if(isiPad)
	$http=entre1y2($retfull,'data-iosUrl="','"');

	//poster="/sites/default/files/extremaduranoticas_nuevo2.jpg"
	$imagen="http://www.canalextremadura.es/".entre1y2($http, '#/',"jpg")."jpg";
	dbug('imagen='.$imagen);
	
	//if(isiPad)
	$http="http://".entre1y2($http,'http://','#');



	dbug('http='.$http);
	array_push($obtenido['enlaces'],array(
		'titulo'  => 'Calidad Baja',
		'url'     => $http,
		'tipo'    => 'http'
	));
	
	array_push($obtenido['enlaces'],array(
		'titulo'  => 'Calidad Alta',
		'url'     => $rtmp,
		'tipo'    => 'rtmp'
	));
}

//<h1 class="title">Extremadura 2 (17/05/12)</h1>
$p=strpos($retfull,'<h1 class="title">')+18;
$f=strpos($retfull,'</h1>',$p);
$titulo=substr($retfull,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido);
}
?>