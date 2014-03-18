<?php
function goear(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

$obtenido=array('enlaces' => array());

$imagen='canales/goear.png';

//varias canciones (de un usuario)
if(enString($retfull,'<h3>Audios</h3>')){
	//titulo generico
	$titulo="Goear";

	$canciones=substr_count($retfull,'id="sound_');
	dbug('canciones='.$canciones);

	$last=0;
	for($i=0;$i<$canciones;$i++){
		$last=strpos($retfull,'id="sound_',$last);
		$p=strposF($retfull,'id="sound_',$last);
		$f=strpos($retfull,'"',$p);
		$id=substr($retfull,$p,$f-$p);
		dbug('id '.$i.'='.$id);

		$p=strpos($retfull,'<a',$last);
		$p=strposF($retfull,'>',$p);
		$f=strpos($retfull,'</a',$p);
		$tit=substr($retfull,$p,$f-$p);
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
elseif(enString($retfull,"playlistid = '")){
	//playlist_title">...<
	$p=strpos($retfull,'playlist_title');
	$p=strpos($retfull,'>',$p)+1;
	$f=strpos($retfull,'<',$p);
	$titulo=substr($retfull,$p,$f-$p);
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);

	$id=entre1y2($retfull,"playlistid = '","'");

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
elseif(enString($retfull,"soundid = '")){
	$titulo=entre1y2($retfull,'class="song_title">','<');
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);

	$id=entre1y2($retfull,"soundid = '","'");
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