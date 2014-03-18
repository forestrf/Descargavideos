<?php
//2 segundos
//10 resultados
//ordenado por relevancia
//+ preview
//+ peso
//- bitrate
//- duración


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

function emp3world(){
global $web;
$res=CargaWebCurl('http://www.emp3world.com/r.php?submit=Search&phrase='.urlencode($web));

//recortar a solo los enlaces
$p=strposF($res,'<div id="results_box">');
$f=strpos($res,'id="right_box"',$p);
$res=substr($res,$p,$f-$p);

$resultados=array(
	'buscador'=>'emp3world.com',
	'enlaces'=>array()
);

$p1=0;
for($i=0;$i<10 && $p1=strpos($res,'class="song_item"',$p1);$i++){
	$p1++;
	
	//título
	$p=strposF($res,'<span id="song_title">',$p1);
	$f=strpos($res,'</span',$p);
	$tit=trim(strtr(substr($res,$p,$f-$p)."@@",array("mp3@@"=>"")));
	
	//url
	$p=strposF($res,'class="play_link"',$p1);
	$f=strpos($res,"</div",$p);
	$url=substr($res,$p,$f-$p);
	$p=strrposF($url,'<a href="');
	$f=strpos($url,'"',$p);
	$url=substr($url,$p,$f-$p);

	//peso
	$p=strposF($res,'class="song_size">',$p1);
	$f=strpos($res,"</div",$p);
	$peso=substr($res,$p,$f-$p);
	$peso=trim(strtr($peso,array("MB"=>"")));

	$r=array(
		'url'=>$url,
		'titulo'=>$tit,
		'peso'=>$peso,
		'preview'=>1
	);
	$resultados['enlaces'][]=$r;
}

dbug_r($resultados);

return $resultados;
}
?>