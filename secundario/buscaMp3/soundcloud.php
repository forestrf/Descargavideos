<?php
//1-2 segundos
//10 resultados.
//ordenado por relevancia.
//+ preview
//+ peso (falla)
//+ duración
//- bitrate


/*
Formato de las respuestas:
array(
	'buscador' 	=>	nombre del buscador,
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

function soundcloud(){
global $web;

$client_id="b45b1aa10f1ac2941910a7f0d10f8e28";

$res=CargaWebCurl('https://api.sndcdn.com/search/sounds?facet=genre&limit=10&offset=0&linked_partitioning=1&client_id='.$client_id.'&q='.urlencode($web));

$resultados=array(
	'buscador'=>'soundcloud.com',
	'enlaces'=>array()
);

$p1=0;
for($i=0;$i<10&&$p1=strpos($res,'"kind":"track"',$p1);$i++){
	//streamable?
	$p=strposF($res,'"streamable":',$p1);
	$f=strpos($res,',',$p);
	$streamable=substr($res,$p,$f-$p);

	if($streamable=="true"){
		//url
		$p=strposF($res,'"id":',$p1);
		$f=strpos($res,",",$p);
		$modoUrl="stream";
		$url='http://api.soundcloud.com/tracks/'.substr($res,$p,$f-$p).'/'.$modoUrl.'?client_id='.$client_id;

		//título
		$p=strposF($res,'"title":"',$p1);
		$f=strpos($res,'"',$p);
		$tit=utf8_encode(jsonRemoveUnicodeSequences(substr($res,$p,$f-$p)));

		//duración
		$p=strposF($res,'"duration":',$p1);
		$f=strpos($res,',',$p);
		$duracion=(float)substr($res,$p,$f-$p)/1000;
		$min=(int)($duracion/60);
		$seg=$duracion-($min*60);
		$seg=substr($seg,0,2);
		while(enString($seg,"."))$seg="0".substr($seg,0,1);
		$duracion=$min.":".$seg;

		//peso
		/*$p=strposF($res,'"original_content_size":',$p1);
		$f=strpos($res,",",$p);
		$tam=substr($res,$p,$f-$p);
		$tam=((float)$tam)/1048576;
		$tam=substr($tam,0,strpos($tam,".")+2);*/

		$r=array(
			'url'		=>	$url,
			'titulo'	=>	$tit,
			//'peso'	=>	$tam,
			'duracion'	=>	$duracion,
			'preview'	=>	1
		);
		$resultados['enlaces'][]=$r;
	}
	$p1++;
}

dbug_r($resultados);

return $resultados;
}
?>