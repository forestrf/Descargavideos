<?php

class Medici extends cadena{

function calcula(){
//Hay videos geobloqueados. pocos pero hay. OJO porque no irán


/*
POST a:
es.medici.tv

con:
json=true&page=%2Fhenri-demarquette-charles-dutoit-royal-philharmonic-orchestra-annecy-classic-festival-2012&timezone_offset=-120
*/

//comprobar que la web es correcta o fallar
if(!enString($this->web,'#!'))
	return;

$obtenido=array('enlaces' => array());

//aparentemente se puede. enviemoslo.
$p=strposF($this->web,'#!');
$webFormateada=substr($this->web,$p);

$cabecera=array(
	"Host: es.medici.tv",
	"Content-type: application/x-www-form-urlencoded"
);
$post='json=true&page='.urlencode($webFormateada).'&timezone_offset=-120';

$ret = CargaWebCurl('http://es.medici.tv',$post);

$ret=jsonRemoveUnicodeSequences($ret);

dbug($ret);

//imagen:
//"main_image": "http:....jpg"
$p=strposF($ret,'"main_image"');
$p=strposF($ret,'"',$p);
$f=strpos($ret,'"',$p);
$imagen=substr($ret,$p,$f-$p);
dbug('imagen='.$imagen);

//titulo:
//"title": "..."
$p=strposF($ret,'"title"');
$p=strposF($ret,'"',$p);
$f=strpos($ret,'"',$p);
$titulo=substr($ret,$p,$f-$p);
$titulo=limpiaTitulo($titulo);
dbug('titulo='.$titulo);

//para las URL:
//"url_smil": {"1": "http://medias.medici.tv/site/smil/20120822_full_en_1965_def_v2_low.mp4.smil", "3": "http://medias.medici.tv/site/smil/20120822_full_en_1965_def_v2_high.mp4.smil", "2": "http://medias.medici.tv/site/smil/20120822_full_en_1965_def_v2_mid.mp4.smil"}

// Para url f4m válido agregar al final (&g=&hdcore=)

if(enString($ret, 'manifest.f4m')){
	$url_manifest = 'http://medicitvod'.entre1y2($ret, '"http://medicitvod','"').'&g=&hdcore=';
	dbug($url_manifest);
	
	$obtenido['enlaces'][] = array(
		'url'            => $url_manifest,
		'tipo'           => 'f4m',
		'nombre_archivo' => generaNombreWindowsValido($titulo)
	);
}
elseif(enString($ret, 'url_smil')){
	$p2=strpos($ret,'.mp4');
	$p1=$p=0;
	while($p2>$p1&&$p1>-1){
		$p1=strpos($ret,'{',$p1+1);
		if($p1<$p2)
			$p=$p1;
	}
	$f=strpos($ret,'}',$p);
	$URLs=substr($ret,$p,$f-$p);
	dbug($URLs);
	
	$videos=substr_count($URLs,'":');
	dbug('total videos='.$videos);
	
	$calidades=array(
		3=>'Calidad Alta',
		2=>'Calidad Media',
		1=>'Calidad Baja'
	);
	
	for($i=$videos;$i>0;$i--){
		//encontrar la url del archivo smil
		$p=strpos($URLs,'"'.$i.'"')+strlen('"'.$i.'"');
		$p=strposF($URLs,'"',$p);
		$f=strpos($URLs,'"',$p);
		$preURL_RTMP=substr($URLs,$p,$f-$p);
		dbug($URLs);
	
		//cambiar de rtmp a http
		$preURL_HTTP=substr($preURL_RTMP,0,-1)."0";
	
		
		$URL=$preURL_HTTP;
		$tipo='http';
		dbug($URL);
	
		if($tipo=='http')
			$obtenido['enlaces'][] = array(
				'url'     => $URL,
				'tipo'    => $tipo,
				'url_txt' => $calidades[$i]
			);
		else
			$obtenido['enlaces'][] = array(
				'titulo' => $calidades[$i],
				'url'    => $URL,
				'tipo'   => $tipo
			);
	}
}

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido);
}

}
