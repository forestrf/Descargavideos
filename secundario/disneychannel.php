<?php

// https://www.youtube.com/watch?v=t2Gs_ugC0x8

/*
"dataUrl":"http://cdnapi.kaltura.com/p/1068292/sp/106829200/playManifest/entryId/1_d295eq7r/format/url/protocol/http"
http://cdnapi.kaltura.com/p/1068292/sp/106829200/playManifest/entryId/1_d295eq7r/format/applehttp/protocol/http?referer=aHR0cDovL2Rpc25leWNoYW5uZWwuZXM

#EXTM3U
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=464000,RESOLUTION=480x272,CODECS="avc1.66.30, mp4a.40.2"
https://kalturahd-vh.akamaihd.net/i/content/r71v1/entry/data/606/853/1_d295eq7r_1_,rza28i6o,vfv5sq6t,79rojm7u,k0b5snxa,_1.mp4.csmil/index_0_av.m3u8?null=&id=AgBUfjedXHq8d%2fOO9VcWlgwPdxSIN8AIeRdj+WXxXuieaw5iT0cUL+gMSJAPREeo+0NKruvXfrjNUA%3d%3d
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=664000,RESOLUTION=640x360,CODECS="avc1.66.30, mp4a.40.2"
https://kalturahd-vh.akamaihd.net/i/content/r71v1/entry/data/606/853/1_d295eq7r_1_,rza28i6o,vfv5sq6t,79rojm7u,k0b5snxa,_1.mp4.csmil/index_1_av.m3u8?null=&id=AgBUfjedXHq8d%2fOO9VcWlgwPdxSIN8AIeRdj+WXxXuieaw5iT0cUL+gMSJAPREeo+0NKruvXfrjNUA%3d%3d
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=962000,RESOLUTION=640x360,CODECS="avc1.77.30, mp4a.40.2"
https://kalturahd-vh.akamaihd.net/i/content/r71v1/entry/data/606/853/1_d295eq7r_1_,rza28i6o,vfv5sq6t,79rojm7u,k0b5snxa,_1.mp4.csmil/index_2_av.m3u8?null=&id=AgBUfjedXHq8d%2fOO9VcWlgwPdxSIN8AIeRdj+WXxXuieaw5iT0cUL+gMSJAPREeo+0NKruvXfrjNUA%3d%3d
#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=1613000,RESOLUTION=1024x576,CODECS="avc1.77.30, mp4a.40.2"
*/

class DisneyChannel extends cadena{

function calcula(){
	$imagen = entre1y2($this->web_descargada, 'og:image" content="', '"');
	$titulo = entre1y2($this->web_descargada, 'og:title" content="', '"');
	$titulo = limpiaTitulo($titulo);
	
	$referer = 'aHR0cDovL2Rpc25leWNoYW5uZWwuZXM';
	$url = entre1y2($this->web_descargada, '"dataUrl":"', '"') . '?referer=' . $referer;
	$url = str_replace('/url/', '/applehttp/', $url);
	dbug_($url);
	$redir = CargaWebCurl($url, '', true, '', array(), false);
	dbug_($redir);
	$url = entre1y2($redir, 'Location: ', "\r");

	$obtenido=array(
		'titulo' => $titulo,
		'imagen' => $imagen,
		'enlaces' => array(
			array(
				//'url_txt' => 'Descargar',
				'url' => $url,
				'tipo' => 'm3u8'
			)
		)
	);

	$obtenido['alerta_especifica'] = 'No funciona con JDownloader.';

	finalCadena($obtenido);
}

}
