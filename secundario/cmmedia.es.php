<?php

class CMMediaEs extends cadena{

/*
http://www.cmmedia.es/programas/tv/castilla-la-mancha-fin-de-semana/informativos-completos/1906
http://play.rtvcm.webtv.flumotion.com/play/player?pod=1906&player=8&explicit_campaign_id=3
Necesita referer

http://api.rtvcm.webtv.flumotion.com/config?r=1484525986672
r se puede ignorar, es un timestamp con 3 números más de precisión
{"timestamp": 1484525987, "version": "bellucci", "key": "bUxnVQrutS3eKugh"}

http://api.rtvcm.webtv.flumotion.com/pods/1906?extended=true
{
  "campaign": null,
  "total_rates": 0,
  "duration": 886,
  "thumbnail_url_static": "http://media0.ntt.webtv.flumotion.com/cust/rtvcm//outgoingimg/Sabado3.mp4/Sabado3.mp4-04.png",
  "video_image_url_static": "http://media0.ntt.webtv.flumotion.com/cust/rtvcm//outgoingimg/Sabado3.mp4/Sabado3.mp4-poster-04.png",
  "captions": [],
  "id": 1906,
  "title": "Sabado3.mp4",
  "tags": [],
  "highlighted": false,
  "unpublishDate": null,
  "description": "",
  "embeddable": true,
  "public_url": "",
  "publishDate": "2017-01-14 19:34:22",
  "credits": "",
  "onAirDate": null,
  "creationDate": "2014-11-02 15:45:26",
  "average_rate": 0.0,
  "name": "Sabado3.mp4",
  "ads_blocked": false,
  "uri": "sabado3mp4",
  "thumbnail_url": "http://api.rtvcm.webtv.flumotion.com/videos/1906/thumbnail.jpg?w=743074f7",
  "vtt_url": "http://media0.ntt.webtv.flumotion.com/cust/rtvcm//outgoingimg/Sabado3.mp4/Sabado3.mp4-seeking-description.vtt",
  "livestream": false,
  "video_image_url": "http://api.rtvcm.webtv.flumotion.com/videos/1906/poster.jpg?w=87f7f30e"
}


function(a, b, c, d, e) {
    var f = this,
        g = "9n1IzQrHUwy1uWha7haiuH4vhai1FUiuHY2w7qk4vK1FUO",
        h = "7haiuH4vhai1FUqk9nY2wOuH4v1IzQWK",
        i = "7haiuH4vhai1FU",

http://media0.ntt.webtv.flumotion.com/cust/rtvcm//static/angular-fmt/fmt-tpls.min.js?r=2.77.10
 var a = {
    api_key: f.config.apiKey,
    api_nonce: Math.floor(1e7 + 9e7 * Math.random()),
    api_referrer: f.config.apiReferrer,
    api_timestamp: Math.round((new Date).getTime() / 1e3) + f.config.timedelta
},
b = d.encodeQueryData(a) + g.replace(i, "") + h.replace(h, "");
return _.extend(a, {
    api_signature: CryptoJS.SHA1(b).toString()
})

api_signature = SHA1("api_key=bUxnVQrutS3eKugh&api_nonce=36270378&api_referrer=play.rtvcm.webtv.flumotion.com&api_timestamp=1484527150"."9n1IzQrHUwy1uWhaiuHY2w7qk4vK1FUO")




http://api.rtvcm.webtv.flumotion.com/pods/1906/streams?
	api_key=bUxnVQrutS3eKugh&
	api_nonce=74490166&
	api_referrer=play.rtvcm.webtv.flumotion.com&
	api_timestamp=1484525987&
	api_signature=f98927c020778c57c025f2b3aefbf2cc4b12797d
[
  {
    "mimetype": "video/mp4",
    "format": "mp4",
    "url": "http://lw.ondemand.rtvcm.flumotion.com/video/mp4/med/Sabado3.mp4",
    "bitrate": 750,
    "seekparam": "start",
    "expire": 886,
    "quality": "med"
  },
  {
    "mimetype": "video/mp4",
    "format": "mp4",
    "url": "http://lw.ondemand.rtvcm.flumotion.com/video/mp4/mobile/Sabado3.mp4",
    "bitrate": 350,
    "seekparam": "start",
    "expire": 886,
    "quality": "mobile"
  },
  {
    "mimetype": "video/mp4",
    "format": "mp4",
    "url": "http://lw.ondemand.rtvcm.flumotion.com/video/mp4/mini/Sabado3.mp4",
    "bitrate": 100,
    "seekparam": "start",
    "expire": 886,
    "quality": "mini"
  }
]
 */

function calcula(){
	//titulo
	$titulo = entre1y2($this->web_descargada, '<title>', '<');
	dbug('titulo='.$titulo);
	
	//imagen
	$imagen = entre1y2($this->web_descargada, 'property="og:image" content="', '"');
	dbug('imagen='.$imagen);
	
	if (preg_match('@(https?://play\.rtvcm\.webtv\.flumotion\.com/play/player\?pod=([0-9]+).+?)"@', $this->web_descargada, $matches)) {
		dbug_r($matches);
		$url1 = $matches[1];
		$ret1 = CargaWebCurl($url1, '', false, '', array('Referer: ' . $this->web));
		dbug_($ret1);
		$url2 = 'http://api.rtvcm.webtv.flumotion.com/config?r='.time().mt_rand(0, 9).mt_rand(0, 9).mt_rand(0, 9);
		$ret2 = CargaWebCurl($url2);
		dbug_($ret2);
		$json2 = json_decode($ret2, true);
		dbug_r($json2);
		
		$extra = CargaWebCurl('http://api.rtvcm.webtv.flumotion.com/pods/'.$matches[2].'?extended=true');
		dbug_($extra);
		$jsonExtra = json_decode($extra, true);
		dbug_r($jsonExtra);
		$imagen = $jsonExtra['video_image_url'];
		
		$obtenido = array(
			'titulo' => $titulo,
			'imagen' => $imagen,
			'enlaces' => array()
		);
		
		$t = 'api_key='.$json2['key'].'&'.
			'api_nonce='.floor(1e7 + 9e7 * (mt_rand() / mt_getrandmax())).'&'.
			'api_referrer=www.cmmedia.es&'.
			'api_timestamp='.$json2['timestamp'];
		$api_signature = SHA1($t.'9n1IzQrHUwy1uWhaiuHY2w7qk4vK1FUO');
		
		$api = 'http://api.rtvcm.webtv.flumotion.com/pods/'.$matches[2].'/streams?'.$t.'&api_signature='.$api_signature;
		dbug_($api);
		$ret = CargaWebCurl($api);
		dbug_($ret);
		$json = json_decode($ret, true);
		dbug_r($json);
		
		foreach ($json as $entry) {
			$obtenido['enlaces'][] = array(
				'url_txt' => 'Descargar (Calidad '.$entry['bitrate'].')',
				'url'  => $entry['url'],
				'tipo' => 'http'
			);
		}
		
		if (isset($jsonExtra['vtt_url']) && trim($jsonExtra['vtt_url']) != '') {
			$obtenido['enlaces'][] = array(
				'url'     => $jsonExtra['vtt_url'],
				'tipo'    => 'srt',
				'url_txt' => 'Descargar subtítulos'
			);
		}
		
		finalCadena($obtenido);
	} else {
		setErrorWebIntera('No se ha encontrado ningún vídeo');
		return;
	}
}

}
