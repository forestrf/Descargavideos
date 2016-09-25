<?php
/*
"http://canaldehistoria.es/aula/union-europea/"

<iframe src="http://www.adnstream.com/embed3/dheWtoYpuJ" height="398" width="706" frameborder="0" scrolling="no">

dheWtoYpuJ

"http://www.adnstream.com/embed3/dheWtoYpuJ"

<meta property="og:image" content="http://46.4.33.243/static/thbs/d/dheWtoYpuJ_w320.jpg" />

"http://46.4.33.243/static/thbs/d/dheWtoYpuJ_w320.jpg"

"http://www.adnstream.com/get_playlist_embed.php?param=dheWtoYpuJ"

<title>25 años en Europa</title>

<jwplayer:file>http://82.165.193.211/video/4bba500c634b149cac372353b1913bb6/dheWtoYpuJ.H264-480p.mp4</jwplayer:file>

<jwplayer:hd.file>http://82.165.193.211/video/4bba500c634b149cac372353b1913bb6/dheWtoYpuJ.H264-720p.mp4</jwplayer:hd.file>
*/

class Canaldehistoria extends cadena{

function calcula(){
//mirar si hay video

$obtenido=array(
	'titulo'  => 'Canal de Historia',
	'enlaces' => array()
);

if(!enString($this->web_descargada,'<iframe'))
	return;

preg_match_all('@<iframe src="(.*?)"@', $this->web_descargada, $matches);

dbug_r($matches);
foreach($matches[1] as $url){
	dbug($url);
	if(enString($url, '//player.vimeo')){
		if(strpos($url, '//player.vimeo') === 0)
			$url = 'http:'.$url;
		
		$vimeo = new Vimeo();
		$url_descargada = CargaWebCurl($url);
		$vimeo->init($url, $url_descargada);
		$ret = $vimeo->calcula();
		dbug_r($ret);
	} else {
		$adnstream = new Adnstream();
		$url_descargada = CargaWebCurl($url);
		$adnstream->init($url, $url_descargada);
		$ret = $adnstream->calcula();
		dbug_r($ret);
	}
	
	$obtenido['enlaces'][] = array('titulo' => $ret['titulo']);
	foreach($ret['enlaces'] as $enlace){
		$obtenido['enlaces'][] = $enlace;
	}
	
	if(!isset($obtenido['imagen'])){
		$obtenido['imagen'] = $ret['imagen'];
	}
}

finalCadena($obtenido);
}

}
