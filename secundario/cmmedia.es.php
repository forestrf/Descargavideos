<?php

class CMMediaEs extends cadena{

/*
http://www.cmmedia.es/programas/tv/castilla-la-mancha-fin-de-semana/informativos-completos/1906
http://play.rtvcm.webtv.flumotion.com/play/player?pod=1906&player=8&explicit_campaign_id=3

http://api.rtvcm.webtv.flumotion.com/config?r=1484525986672
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

api_signature = SHA1("api_key=bUxnVQrutS3eKugh&api_nonce=36270378&api_referrer=play.rtvcm.webtv.flumotion.com&api_timestamp=14845271509n1IzQrHUwy1uWhaiuHY2w7qk4vK1FUO")




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
	$titulo='LiveLeak';
	dbug('titulo='.$titulo);
	
	//imagen
	$imagen=entre1y2($this->web_descargada, 'image: "', '"');
	dbug('imagen='.$imagen);
	
	if (enString($this->web_descargada, 'config: "')) {
		$config=entre1y2($this->web_descargada, 'config: "', '"');
		dbug_($config);
		$config = explode('&', $config);
		dbug_r($config);
		
		$url = '';
		foreach($config as $elem){
			if(strpos($elem, 'hd_file_url') === 0){
				$url = urldecode(substr($elem, strposF($elem, '=')));
				break;
			}
			if(strpos($elem, 'file_url') === 0){
				$url = urldecode(substr($elem, strposF($elem, '=')));
			}
		}
	} else {
		preg_match('#file: "(http.*?\.mp4.*?)"#', $this->web_descargada, $matches);
		dbug_r($matches);
		$url = $matches[1];
	}
	
	
	dbug_r($url);
	
	
	$obtenido = array(
		'titulo' => $titulo,
		'imagen' => $imagen,
		'enlaces' => array(
			array(
				'url_txt' => 'Descargar',
				'url'  => $url,
				'tipo' => 'http'
			)
		)
	);
	
	finalCadena($obtenido);
}

}
