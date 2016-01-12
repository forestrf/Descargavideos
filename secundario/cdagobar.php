<?php

class Cdagobar extends cadena{

function calcula(){

// <meta property="og:title" content="Historia de un Clan"/>
// <meta property="og:description" content="        La historia de Puccio. Historia de un clan se basa en los hechos reales de &quot;el clan&quot; Puccio, una familia tradicional de San Isidro que a comienzos de los '80 se dedicó al secuestro y as  [...]"/>
// <meta property="og:image" content="http://cda.gob.ar/content/photos/generated/7/35627_player.jpg"/>
// <meta property="og:video" content="https://admin.cda.gob.ar/interface/cda_v3/desktop/player/player5.swf?playlistfile=http://186.33.226.132/vod/smil:content/videos/clips/38088.smil/jwplayer.rss&amp;skin=https://admin.cda.gob.ar/interface/cda_v3/desktop/player/beelden.zip"/>
    
$obtenido=array('enlaces' => array());


$titulo = entre1y2($this->web_descargada, '"og:title" content="', '"');
$descripcion = entre1y2($this->web_descargada, '"og:description" content="', '"');
$imagen = entre1y2($this->web_descargada, '"og:image" content="', '"');
dbug('titulo = '.$titulo);
dbug('descripcion = '.$descripcion);
dbug('imagen = '.$imagen);

//http://cda.gob.ar/clip/ajax/6567
if (!preg_match('@\#\!/([0-9]+)@', $this->web, $matches)) {
	setErrorWebIntera('No se ha podido encotrar la id del vídeo.');
	return;
}
dbug_r($matches);

$idcap = $matches[1];
$jsonidcap = CargaWebCurl('http://cda.gob.ar/clip/ajax/'.$idcap);

$correcta_id = entre1y2($jsonidcap, 'video_id":"','"');

$url = entre1y2($this->web_descargada, 'https://admin.cda.gob.ar/interface/cda_v3/desktop/player/player5.swf?playlistfile=', '&');
dbug('url = '.$url);

preg_match('@/([0-9]+)\.smil@', $url, $matches);
dbug_r($matches);
$falsa_id = $matches[1];
$url = str_replace($falsa_id, $correcta_id, $url);

$urlRes = CargaWebCurl($url);

dbug_($urlRes);

/*
<jwplayer:streamer>rtmp://186.33.226.132/vod/smil:content</jwplayer:streamer>
<media:group>
	<media:content url="mp4:videos/clips/8/38088_700.mp4" bitrate="700"/>
	<media:content url="mp4:videos/clips/9/38089_200.mp4" bitrate="200"/>
	<media:content url="mp4:videos/clips/0/38090_2000.mp4" bitrate="2000"/>
	<media:content url="mp4:videos/clips/1/38091_1200.mp4" bitrate="1200"/>
</media:group>
*/

$rtmp_r = entre1y2($urlRes, '<jwplayer:streamer>', '<');

preg_match_all('@url="(mp4:.*?)" bitrate="(.*?)"@', $urlRes, $matches);
dbug_r($matches);

for ($i = 0, $i_l = count($matches[0]); $i < $i_l; $i++) {
	$obtenido['enlaces'][] = array(
		'url'      => '-',
		'tipo'     => 'rtmpConcreto',
		'titulo'   => 'bitrate: ' . $matches[2][$i],
		'rtmpdump' => '-r "' . $rtmp_r . '" -y "' . $matches[1][$i] . '" -o "' . generaNombreWindowsValido($titulo) . '.mp4"'
		//'nombre_archivo'  => para f4m y rtmp downloader
	);
}


$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;
$obtenido['descripcion']=$descripcion;

finalCadena($obtenido,false);
}

}
