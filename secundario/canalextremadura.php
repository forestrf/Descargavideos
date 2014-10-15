<?php

class Canalextremadura extends cadena{

function calcular(){
$obtenido=array('enlaces' => array());

//raido o tv
if(enString($this->web_descargada,"#radio")){
	$p=strpos($this->web_descargada,'http://podcastdl.');
	$f=strpos($this->web_descargada,'"',$p);
	$ret=substr($this->web_descargada,$p,$f-$p);
	dbug('url='.$ret);

	array_push($obtenido['enlaces'],array(
		'url'  => $ret,
		'tipo' => 'http'
	));

	$imagen=entre1y2($this->web_descargada,'<div class="imagen"><img src="','"');
	dbug('imagen='.$imagen);
}

if(enString($this->web_descargada,"#tv")){
	$rtmp='rtmp://'.entre1y2($this->web_descargada,'rtmp://','"');

	if(enString($rtmp,"#")){
		$f=strpos($rtmp,'#');
		if(enString($rtmp,"#tv"))
			$f=strpos($rtmp,'#',$f+1);
		$rtmp=substr($rtmp,0,$f);
	}
	$rtmp=strtr($rtmp,array("#"=>""));

	dbug('rtmp='.$rtmp);

	//if(isiPad)
	$http=entre1y2($this->web_descargada,'if(isiPad)','</script>');

	//poster="/sites/default/files/extremaduranoticas_nuevo2.jpg"
	$imagen="http://www.canalextremadura.es".entre1y2($http, 'poster="', '"');
	dbug('imagen='.$imagen);

	$http=entre1y2($http, 'src="', '"');

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

if(enString($this->web_descargada,".mp4#")){
	$rtmp='rtmp://'.entre1y2($this->web_descargada,'rtmp://','.mp4').'.mp4';

	dbug('rtmp='.$rtmp);

	//if(isiPad)
	$http=entre1y2($this->web_descargada,'data-iosUrl="','"');

	//poster="/sites/default/files/extremaduranoticas_nuevo2.jpg"
	$imagen="http://www.canalextremadura.es/".entre1y2($http, '#/',"#");
	dbug('imagen='.$imagen);
	
	//if(isiPad)
	$http="http://".entre1y2($http,'http://','#');

	array_push($obtenido['enlaces'],array(
		'titulo'  => 'Calidad Baja',
		'url'     => $http,
		'url_txt' => 'Descargar',
		'tipo'    => 'http'
	));
	
	array_push($obtenido['enlaces'],array(
		'titulo'  => 'Calidad Alta',
		'url'     => $rtmp,
		'tipo'    => 'rtmp'
	));
}

//<h1 class="title">Extremadura 2 (17/05/12)</h1>
if(enString($this->web_descargada, '<h1 class="title">')) {
	$titulo = entre1y2($this->web_descargada,'<h1 class="title">','</h1>');
} else {
	$p = strpos($this->web_descargada,'.mp4');
	$p = strpos($this->web_descargada, '<a', $p);
	$titulo = entre1y2_a($this->web_descargada,$p,'>','</');
}
$titulo = limpiaTitulo($titulo);
dbug('titulo='.$titulo);

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido);
}

}
