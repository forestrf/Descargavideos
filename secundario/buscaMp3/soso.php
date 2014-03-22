<?php
//2-3 segundos
//0-20 resultados. Algunos resultados de una página hiperlenta y encima problemáticos relacionada con soso.com. Quitarlos (lo cual puede dajar los resultados a 0)
//ordenado por relevancia. Los primeros resultados guay, pero luego desvirtua a resultados chinos, japos...
//+ preview
//+ peso
//- bitrate
//- duración


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

function soso(){
global $web;
$res=CargaWebCurl('http://cgi.music.soso.com/fcgi-bin/m.q?p=1&source=1&t=1&w='.urlencode($web));

//recortar a solo los enlaces
$p=strposF($res,'<div id="results_box">');
$f=strpos($res,'id="right_box"',$p);
$res=substr($res,$p,$f-$p);

$resultados=array(
	'buscador'=>'soso.com',
	'enlaces'=>array()
);

$p1=0;
for($i=0;$i<20 && $p1=strpos($res,'onmouseover="soso.ie6hover(this,1)"',$p1);$i++){
	$p1++;
	
	//url
	$p=strposF($res,'<td class="data">',$p1);
	$p=strposF($res,'FI',$p);
	$f=strpos($res,";",$p);
	$url=substr($res,$p,$f-$p);
	if(!enString($url,"qqmusic.qq.com")){
		
		//título
		$p=strposF($res,'class="s_name">',$p1);
		$f=strpos($res,'</a>',$p);
		$tit=strip_tags(substr($res,$p,$f-$p));
		
		//peso
		$p=strposF($res,'<td class="size">',$p1);
		$f=strpos($res,"</",$p);
		$peso=substr($res,$p,$f-$p);
		$peso=trim(strtr($peso,array("M"=>"")));
		
		$r=array(
			'url'=>$url,
			'titulo'=>$tit,
			'peso'=>$peso,
			'preview'=>1
		);
		$resultados['enlaces'][]=$r;
	}
}

dbug_r($resultados);

return $resultados;
}
?>