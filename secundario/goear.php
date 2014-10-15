<?php
function goear(){
global $web_descargada;

$obtenido=array('enlaces' => array());

$imagen='http://www.'.DOMINIO.'/canales/goear.png';

//varias canciones (de un usuario)
if(enString($web_descargada,'<h3>Audios</h3>')){
	//titulo generico
	$titulo="Goear";

	$canciones=substr_count($web_descargada,'id="sound_');
	dbug('canciones='.$canciones);

	$last=0;
	for($i=0;$i<$canciones;$i++){
		$last=strpos($web_descargada,'id="sound_',$last);
		$p=strposF($web_descargada,'id="sound_',$last);
		$f=strpos($web_descargada,'"',$p);
		$id=substr($web_descargada,$p,$f-$p);
		dbug('id '.$i.'='.$id);

		$p=strpos($web_descargada,'<a',$last);
		$p=strposF($web_descargada,'>',$p);
		$f=strpos($web_descargada,'</a',$p);
		$tit=substr($web_descargada,$p,$f-$p);
		$tit=strip_tags($tit);
		dbug('tit='.$tit);

		$mp3=buscaMP3($id);
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
elseif(enString($web_descargada,"playlistid = '")){
	//playlist_title">...<
	$p=strpos($web_descargada,'playlist_title');
	$p=strpos($web_descargada,'>',$p)+1;
	$f=strpos($web_descargada,'<',$p);
	$titulo=substr($web_descargada,$p,$f-$p);
	$titulo=limpiaTitulo($titulo);
	dbug('título='.$titulo);

	$id=entre1y2($web_descargada,"playlistid = '","'");

	$xml=CargaWebCurl('http://www.goear.com/elplaylist.php?f='.$id);

	$canciones=substr_count($xml,'title=');
	dbug('canciones='.$canciones);

	$last=0;
	for($i=0;$i<$canciones;$i++){
		$p=strpos($xml,'path="',$last)+6;
		$f=strpos($xml,'"',$p);
		$last=$f+2;
		$id=substr($xml,$p,$f-$p);
		dbug('id '.$i.'='.$id);

		$p=strpos($xml,'title="',$last)+7;
		$f=strpos($xml,'"',$p);
		$tit=substr($xml,$p,$f-$p);
		$tit=html_entity_decode($tit);
		dbug('tit='.$tit);

		$mp3=buscaMP3($id);
		dbug('mp3='.$mp3);

		array_push($obtenido['enlaces'],array(
			'url'     => $mp3,
			'tipo'    => 'http',
			'url_txt' => $tit
		));
	}
}

//una cancion
elseif(enString($web_descargada,"soundid = '")){
	$titulo=entre1y2($web_descargada,'title>','<');
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);

	$id=entre1y2($web_descargada,"soundid = '","'");
	dbug('id='.$id);

	$mp3=buscaMP3($id);
	array_push($obtenido['enlaces'],array(
		'url'  => $mp3,
		'tipo' => 'http'
	));
}

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

//no comprobar los enlaces
finalCadena($obtenido,false);
}

function buscaMP3($id){
	return 'http://www.goear.com/plimiter.php?f='.$id;
}
?>