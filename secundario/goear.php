<?php

class Goear extends cadena{

function calcula(){
$obtenido=array('enlaces' => array());

$imagen='http://www.'.DOMINIO.'/canales/goear.png';

//varias canciones (de un usuario)
if(enString($this->web_descargada,'<h3>Audios</h3>')){
	//titulo generico
	$titulo="Goear";

	$canciones=substr_count($this->web_descargada,'id="sound_');
	dbug('canciones='.$canciones);

	$last=0;
	for($i=0;$i<$canciones;$i++){
		$last=strpos($this->web_descargada,'id="sound_',$last);
		$id=entre1y2_a($this->web_descargada,$last,'id="sound_','"');
		dbug('id '.$i.'='.$id);

		$p=strpos($this->web_descargada,'<a',$last);
		$tit=entre1y2_a($this->web_descargada,$p,'>','</a');
		$tit=strip_tags($tit);
		dbug('tit='.$tit);

		$mp3=$this->buscaMP3($id);
		dbug('mp3='.$mp3);

		array_push($obtenido['enlaces'],array(
			'url'     => $mp3,
			'tipo'    => 'http',
			'url_txt' => $tit
		));
		$last++;
	}
}

//varias canciones, de una lista de reproducción
elseif(enString($this->web_descargada,"playlistid = '")){
	$titulo=entre1y2($this->web_descargada,'title>','<');
	$titulo=limpiaTitulo($titulo);
	dbug('título='.$titulo);

	$id=entre1y2($this->web_descargada,"playlistid = '","'");

	$xml=CargaWebCurl('http://www.goear.com/elplaylist.php?f='.$id);

	$canciones=substr_count($xml,'title=');
	dbug('canciones='.$canciones);

	$last=0;
	for($i=0;$i<$canciones;$i++){
		$p=strposF($xml,'path="',$last);
		$f=strpos($xml,'"',$p);
		$last=$f+2;
		$id=substr($xml,$p,$f-$p);
		dbug('id '.$i.'='.$id);

		$tit=entre1y2_a($xml,$last,'title="','"');
		$tit=html_entity_decode($tit);
		dbug('tit='.$tit);

		$mp3=$this->buscaMP3($id);
		dbug('mp3='.$mp3);

		array_push($obtenido['enlaces'],array(
			'url'     => $mp3,
			'tipo'    => 'http',
			'url_txt' => $tit
		));
	}
}

//una cancion
elseif(enString($this->web_descargada,"soundid = '")){
	$titulo=entre1y2($this->web_descargada,'title>','<');
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);

	$id=entre1y2($this->web_descargada,"soundid = '","'");
	dbug('id='.$id);

	$mp3=$this->buscaMP3($id);
	array_push($obtenido['enlaces'],array(
		'url'  => $mp3,
		'url_txt' => 'Descargar',
		'tipo' => 'http'
	));
}

else{
	setErrorWebIntera('No se ha encontrado ninguna canción');
	return;
}

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

//no comprobar los enlaces
finalCadena($obtenido,false);
}

function buscaMP3($id){
	return 'http://www.goear.com/action/sound/get/'.$id;
}

}
