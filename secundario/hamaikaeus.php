<?php

class HamaikaEUS extends cadena{

function calcula(){

/*
http://hamaika.eus/tb/bideo/80371
http://www.bideometa.net/node/80371/browser_bideoa
<div id="div_flowplayer_80371" style="width: 100%; height: 100%;background-image: url('http://www.bideometa.net/wcontent/hbi/HBI_00080371.jpg?901582');background-size: 100% 100%" class="flowplayer play-button is-splash" data-fullscreen="true" data-analytics="UA-303844-19" title="80371" data-rtmp="rtmp://212.142.237.206:1935/hbi/" ><video preload="none"><source type="video/flash" src="flv:HBI_00080371.flv" ></video></div><h1 id="bideometa_h1_80371" style="margin:-3em 0 0 0;min-height:45px; padding:0.2em 0.5em 0.5em; background-color: white; opacity: 0.8;color: black;font-size: 20px;line-height: 28px;width:640px;">Ertzak | Non bukatzen da burla bullyingari paso emateko?</h1>
http://www.bideometa.net/wcontent/hbi/HBI_00080371.jpg?901582
data-rtmp="rtmp://212.142.237.206:1935/hbi/"
src="flv:HBI_00080371.flv"
>Ertzak | Non bukatzen da burla bullyingari paso emateko?</h1>
*/

if (!preg_match('@/([0-9]+)/browser_bideoa@', $this->web_descargada, $matches)) {
	setErrorWebIntera("No se encontró ningún vídeo");
	return;
}

dbug_r($matches);

$iframe = CargaWebCurl('http://www.bideometa.net/node/' . $matches[1] . '/browser_bideoa');
dbug_($iframe);


preg_match('@background-image *?: *?url *?\( *?[\'"](.+?)[\'"]@i', $iframe, $matches);
dbug_r($matches);

$imagen = $matches[1];


preg_match('@([^>]+)</h1@i', $iframe, $matches);
dbug_r($matches);

$titulo = $matches[1];


$rtmp = entre1y2($iframe, 'data-rtmp="', '"');
$video = 'flv:' . entre1y2($iframe, 'src="flv:', '"');
$obtenido = array('enlaces' => array(
	array(
		'url'       => $rtmp.$video,
		'rtmpdump'  => '-r "'.$rtmp.'" -y "'.$video.'" -o "'.generaNombreWindowsValido($titulo).'.flv"',
		'tipo'      => 'rtmpConcreto',
		'extension' => 'flv'
	)
));

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido, false);
}

}
