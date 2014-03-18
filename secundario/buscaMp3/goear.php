<?php
//1-3 segundos
//10 resultados
//ordenado por relevancia
//+ preview
//+ bitrate
//+ duración
//- peso

/*
Formato de las respuestas:
array(
	'buscador'	=>	nombre del buscador,
	'enlaces'	=>	array(
		n => array(
			'titulo'	=>	nombre de la canción,
			'url'		=>	direccion de la descarga,
			'duracion'	=>	tiempo en h:m:ss,
			'peso'		=>	en MB,
			'bitrate'	=>	en kbps,
			'preview'	=>	1=si, 0=no
		)
	)
);

*/

function goear(){
global $web;
$res=CargaWebCurl('http://www.goear.com/search/'.urlencode($web).'/');

//recortar a solo los enlaces
$p=strposF($res,'id="search_results"');
$f=strpos($res,'</ol',$p);
$res=substr($res,$p,$f-$p);

$resultados=array(
	'buscador'=>'goear.com',
	'enlaces'=>array()
);

$p1=0;
for($i=0;$i<10 && $p1=strpos($res,'<li>',$p1);$i++){
	$p1++;
	
	//título
	$p=strpos($res,'<a',$p1);
	$p=strposF($res,'>',$p);
	$f=strpos($res,'</a',$p);
	$tit=substr($res,$p,$f-$p);
	$tit=strip_tags($tit);
	
	//url
	$p=strposF($res,"http://www.goear.com/listen/",$p1);
	$f=strpos($res,"/",$p+1);
	$id=substr($res,$p,$f-$p);
	$url=buscaMP3($id);
	
	//bitrate
	$p=strpos($res,'<li class="kbps',$p1);
	$p=strposF($res,'>',$p);
	$f=strpos($res,"<",$p);
	$bitrate=substr($res,$p,$f-$p);
	
	//duración
	$p=strpos($res,'<li class="length',$p1);
	$p=strposF($res,'>',$p);
	$f=strpos($res,"</li",$p);
	$duracion=substr($res,$p,$f-$p);
	$duracion=trim($duracion);

	$r=array(
		'url'=>$url,
		'titulo'=>$tit,
		'bitrate'=>$bitrate,
		'duracion'=>$duracion,
		'preview'=>1
	);
	$resultados['enlaces'][]=$r;
}

dbug_r($resultados);

return $resultados;
}

function buscaMP3($id){
	return 'http://www.goear.com/plimiter.php?f='.$id;
}
?>