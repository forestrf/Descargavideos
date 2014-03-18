<?php
//4 segundos
//10 resultados
//ordenado por relevancia
//+ preview
//+ tamaño
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

function forshared(){
global $web;
$res=CargaWebCurl('http://search.4shared.com/q/CCQD/1/music/'.urlencode($web));

//recortar a solo los enlaces
$p=strposF($res,'"listView res_table"');
$f=strpos($res,'"writeDragMain"',$p);
$res=substr($res,$p,$f-$p);

$resultados=array(
	'buscador'=>'4shared.com',
	'enlaces'=>array()
);

$p1=0;
for($i=0;$i<10 && $p1=strpos($res,'<tr valign="top" >',$p1);$i++){
	$p1++;
	
	//tamaño
	$p=strposF($res,'<div class="fsize">',$p1);
	$f=strpos($res,'</div>',$p);
	$tam=substr($res,$p,$f-$p);
	$tam=trim(strtr($tam,array("\n"=>""," "=>"",","=>"","KB"=>"")));
	$tam=((float)$tam)/1024;
	$tam=substr($tam,0,strpos($tam,".")+2);
	
	//título
	$p=strpos($res,'mp3.png',$p1);
	$p=strposF($res,'title="',$p);
	$f=strpos($res,'"',$p);
	$tit=substr($res,$p,$f-$p);
	$tit=trim(strtr($tit,array("\n"=>"")));
	
	//url
	$p=strposF($res,"showMediaPreview(event, '",$p1);
	$f=strpos($res,"'",$p);
	$url=substr($res,$p,$f-$p);
	
	$r=array(
		'url'=>$url,
		'titulo'=>$tit,
		'peso'=>$tam
	);
	$resultados['enlaces'][]=$r;
}

dbug_r($resultados);

return $resultados;
}
?>