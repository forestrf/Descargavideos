<?php

class APuntMediaEs extends cadena{

function calcula(){
	
$obtenido=array('enlaces' => array());

/*
if (preg_match('@"thumbnailUrl":(".*?")@', $this->web_descargada, $matches)) {
	dbug_r($matches);
	$obtenido['imagen'] = json_decode($matches[1]);
	dbug_r($obtenido['imagen']);
}
*/

if (preg_match('@multimedia-account="(.*?)"@', $this->web_descargada, $matches)) {
	dbug_r($matches);
	$account = $matches[1];
	dbug($account);

	if (preg_match('@&quot;bcId&quot;:&quot;(.*?)&quot;@', $this->web_descargada, $matches)) {
		//https://players.brightcove.net/6057955885001/default_default/index.min.js
		//options:{accountId:"6057955885001",policyKey:"BCpkADawqM0Et6iJ6TzbOAFWiDVmDBDFeZ10KCVWV4GSUKh5caWVascWjsmvjslN1xqmHkh-2AduC3UhfM0aiKCidcxUxY69-Dct5DgPWOMT_QwlH4b_x-VI6ZAFLC1IyiMO4j-kROfziyu0"}
		
		dbug_r($matches);
		$video_id = $matches[1];
		
		
		$js = CargaWebCurl('https://players.brightcove.net/'.$account.'/default_default/index.min.js');
		$pk = entre1y2($js, 'policyKey:"', '"');
		dbug('pk='.$pk);
		
		$ret = CargaWebCurl('https://edge.api.brightcove.com/playback/v1/accounts/'.$account.'/videos/'.$video_id, '', false, '', array(
			'Referer: '.$this->web,
			'Origin: https://www.apuntmedia.es',
			'Accept: application/json;pk='.$pk
		));
		dbug_r($ret);

		$json = json_decode($ret, true);
		dbug_r($json);
		$obtenido['titulo'] = $json['custom_fields']['b_originaldalettitle'];
		$obtenido['imagen'] = $json['thumbnail'];

		foreach ($json['sources'] as $source) {
			if (isset($source['app_name'])) continue;
			if (isset($source['type'])) continue;
			dbug_r($source);
			$obtenido['enlaces'][] = array(
				'url'     => $source['src'],
				'url_txt' => 'Descargar',
				'titulo'  => 'Calidad: ' . $source['width'] . 'x' . $source['height'],
				'width'   => $source['width']
			);
		}
	}
}

finalCadena($obtenido);
}


/*
https://www.apuntmedia.es/noticies/cultura/prego-infantil-magdalena-vitol-posen-hui-colofo-nou-dies-festa-sota-pluja_1_1501558.html
"thumbnailUrl":"https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_1600w_0.jpg"
https://static.apuntmedia.es/clip/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_1600w_0.jpg
https://static.apuntmedia.es/clip/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_default_0.jpg

Brightcove

<ap-multimedia-opening multimedia-account="6057955885001"
:multimedia-card="{&quot;player&quot;:{&quot;id&quot;:1501665,&quot;title&quot;:&quot;Milers de xiquets i xiquetes gaudeixen del Preg\u00f3 infantil de la Magdalena&quot;,&quot;duration&quot;:0,&quot;poster&quot;:{&quot;id&quot;:0,&quot;sources&quot;:[{&quot;src&quot;:&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_default_0.jpg&quot;,&quot;mimeType&quot;:&quot;image\/jpeg&quot;,&quot;widthRatio&quot;:16,&quot;heightRatio&quot;:9,&quot;srcset&quot;:&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_96w_0.jpg 96w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_160w_0.jpg 160w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_360w_0.jpg 360w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_416w_0.jpg 416w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_640w_0.jpg 640w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_856w_0.jpg 856w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_1600w_0.jpg 1600w &quot;,&quot;svgPlaceholder&quot;:&quot;data:image\/svg+xml,%3Csvg xmlns=\&quot;http:\/\/www.w3.org\/2000\/svg\&quot; viewBox=\&quot;0 0 16 9\&quot;%3E%3C\/svg%3E&quot;,&quot;placeholder&quot;:&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_default_0.jpg&amp;w=16&quot;,&quot;type&quot;:&quot;imageSourceBcubeClipper&quot;,&quot;sizesUrls&quot;:[&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_96w_0.jpg 96w &quot;,&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_160w_0.jpg 160w &quot;,&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_360w_0.jpg 360w &quot;,&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_416w_0.jpg 416w &quot;,&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_640w_0.jpg 640w &quot;,&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_856w_0.jpg 856w &quot;,&quot;https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_1600w_0.jpg 1600w &quot;]}],&quot;alt&quot;:&quot;Milers de xiquets i xiquetes gaudeixen del Preg\u00f3 infantil de la Magdalena&quot;,&quot;title&quot;:&quot;Milers de xiquets i xiquetes gaudeixen del Preg\u00f3 infantil de la Magdalena&quot;},&quot;bcId&quot;:&quot;1728450060362939597&quot;,&quot;bcPlayer&quot;:&quot;default&quot;,&quot;bcEmbed&quot;:&quot;default&quot;,&quot;width&quot;:null,&quot;height&quot;:null},&quot;type&quot;:&quot;video&quot;,&quot;video360&quot;:false,&quot;title&quot;:&quot;Milers de xiquets i xiquetes gaudeixen del Preg\u00f3 infantil de la Magdalena&quot;,&quot;link&quot;:null,&quot;id&quot;:2119337,&quot;signature&quot;:&quot;\u00c0 Punt NTC&quot;,&quot;uploadDate&quot;:{&quot;date&quot;:&quot;2022-03-27 10:53:49.000000&quot;,&quot;timezone_type&quot;:1,&quot;timezone&quot;:&quot;+00:00&quot;}}"
:playlist-section="null"
:playlist-multimedias="null">


{"player":{"id":1501665,"title":"Milers de xiquets i xiquetes gaudeixen del Preg\u00f3 infantil de la Magdalena","duration":0,"poster":{"id":0,"sources":[{"src":"https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_default_0.jpg","mimeType":"image\/jpeg","widthRatio":16,"heightRatio":9,"srcset":"https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_96w_0.jpg 96w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_160w_0.jpg 160w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_360w_0.jpg 360w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_416w_0.jpg 416w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_640w_0.jpg 640w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_856w_0.jpg 856w , https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_1600w_0.jpg 1600w ","svgPlaceholder":"data:image\/svg+xml,%3Csvg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" viewBox=\"0 0 16 9\"%3E%3C\/svg%3E","placeholder":"https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_default_0.jpg&w=16","type":"imageSourceBcubeClipper","sizesUrls":["https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_96w_0.jpg 96w ","https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_160w_0.jpg 160w ","https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_360w_0.jpg 360w ","https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_416w_0.jpg 416w ","https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_640w_0.jpg 640w ","https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_856w_0.jpg 856w ","https:\/\/static.apuntmedia.es\/clip\/9b510d57-88e7-42e9-849c-1d34c46f7ced_16-9-aspect-ratio_1600w_0.jpg 1600w "]}],"alt":"Milers de xiquets i xiquetes gaudeixen del Preg\u00f3 infantil de la Magdalena","title":"Milers de xiquets i xiquetes gaudeixen del Preg\u00f3 infantil de la Magdalena"},"bcId":"1728450060362939597","bcPlayer":"default","bcEmbed":"default","width":null,"height":null},"type":"video","video360":false,"title":"Milers de xiquets i xiquetes gaudeixen del Preg\u00f3 infantil de la Magdalena","link":null,"id":2119337,"signature":"\u00c0 Punt NTC","uploadDate":{"date":"2022-03-27 10:53:49.000000","timezone_type":1,"timezone":"+00:00"}}

https://edge.api.brightcove.com/playback/v1/accounts/6057955885001/videos/1728450060362939597
	{"poster":"https://cf-images.eu-west-1.prod.boltdns.net/v1/static/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/ca6e79ce-e9b5-4933-97cc-c2b88902aa82/1280x720/match/image.jpg","thumbnail":"https://cf-images.eu-west-1.prod.boltdns.net/v1/static/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/2f5526b4-348a-4454-a464-a4df46ee7881/160x90/match/image.jpg","poster_sources":[{"src":"https://cf-images.eu-west-1.prod.boltdns.net/v1/static/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/ca6e79ce-e9b5-4933-97cc-c2b88902aa82/1280x720/match/image.jpg"}],"thumbnail_sources":[{"src":"https://cf-images.eu-west-1.prod.boltdns.net/v1/static/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/2f5526b4-348a-4454-a464-a4df46ee7881/160x90/match/image.jpg"}],"description":null,"tags":[],"cue_points":[],"custom_fields":{"b_apuntid":"DA_6736461","b_channel":"À Punt Web","b_completeepisode":"0","b_contenttype":"VIF","b_daletid":"44713503","b_downloadallowed":"false","b_genres":"gen-noticies","b_originaldalettitle":"Milers de xiquets i xiquetes gaudeixen del Pregó infantil de la Magdalena","b_premieredate":"27-03-2022","b_purgetype":"Sense purga","b_sections":"tem-magdalena","b_signinrequired":"false","fechapublicacion":"2022-03-27T10:52:17Z","itemcode":"DA_6736461","label":"tem-magdalena"},"account_id":"6057955885001","sources":[{"codecs":"avc1,mp4a","ext_x_version":"4","src":"http://manifest.prod.boltdns.net/manifest/v1/hls/v4/aes128/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/10s/master.m3u8?fastly_token=NjI2ODBmZTVfODQwZGFjYWEzNDQxODJhM2EyNjE4MDQ4ZjlmZWVlZDFkODIwMzZmMDUzMTIxN2Y0NWZlY2JkMDRhYjI2MDZlMw%3D%3D","type":"application/x-mpegURL"},{"codecs":"avc1,mp4a","ext_x_version":"4","src":"https://manifest.prod.boltdns.net/manifest/v1/hls/v4/aes128/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/10s/master.m3u8?fastly_token=NjI2ODBmZTVfODQwZGFjYWEzNDQxODJhM2EyNjE4MDQ4ZjlmZWVlZDFkODIwMzZmMDUzMTIxN2Y0NWZlY2JkMDRhYjI2MDZlMw%3D%3D","type":"application/x-mpegURL"},{"codecs":"avc1,mp4a","profiles":"urn:mpeg:dash:profile:isoff-live:2011","src":"http://manifest.prod.boltdns.net/manifest/v1/dash/live-baseurl/clear/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/6s/manifest.mpd?fastly_token=NjI2ODBmZTVfNjQzZTE0NTMwZTRiNGZmOTEyYjEzNGQxNGQzZTczMGVlNzU4ODMxYzFlNTUyMjEyY2EwZjYxZWRlY2FjMDRhZQ%3D%3D","type":"application/dash+xml"},{"codecs":"avc1,mp4a","profiles":"urn:mpeg:dash:profile:isoff-live:2011","src":"https://manifest.prod.boltdns.net/manifest/v1/dash/live-baseurl/clear/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/6s/manifest.mpd?fastly_token=NjI2ODBmZTVfNjQzZTE0NTMwZTRiNGZmOTEyYjEzNGQxNGQzZTczMGVlNzU4ODMxYzFlNTUyMjEyY2EwZjYxZWRlY2FjMDRhZQ%3D%3D","type":"application/dash+xml"},{"avg_bitrate":2725000,"codec":"H264","container":"MP4","duration":149258,"height":720,"size":50906328,"src":"http://bcboltbde696aa-a.akamaihd.net/media/v1/pmp4/static/clear/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/0028aba0-c1e4-4d82-8624-b0e685a084cc/main.mp4?akamai_token=exp=1650986981~acl=/media/v1/pmp4/static/clear/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/0028aba0-c1e4-4d82-8624-b0e685a084cc/main.mp4*~hmac=f2fbb202278100d184e3f66a4fc1013fe48387c32f5f5ca965f7197a883de83c","width":1280},{"avg_bitrate":2725000,"codec":"H264","container":"MP4","duration":149258,"height":720,"size":50906328,"src":"https://bcboltbde696aa-a.akamaihd.net/media/v1/pmp4/static/clear/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/0028aba0-c1e4-4d82-8624-b0e685a084cc/main.mp4?akamai_token=exp=1650986981~acl=/media/v1/pmp4/static/clear/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/0028aba0-c1e4-4d82-8624-b0e685a084cc/main.mp4*~hmac=f2fbb202278100d184e3f66a4fc1013fe48387c32f5f5ca965f7197a883de83c","width":1280}],"name":"Milers de xiquets i xiquetes gaudeixen del Pregó infantil de la Magdalena","reference_id":"DA_6736461","long_description":null,"duration":149312,"economics":"AD_SUPPORTED","text_tracks":[{"id":null,"account_id":"6057955885001","src":"http://manifest.prod.boltdns.net/thumbnail/v1/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/ab3a3a84-1c15-4106-9b9b-c3440ad71517/thumbnail.webvtt?fastly_token=NjI2ODBmZTVfMDQ5ZjU4MDkwOGNjZjYwYWVhNTQ3ODRhZTI4MWUwMWUzYmNmZmJmYWY4Y2IyYzFmYWMzNDQyZGJjMzMxM2Q3Yw%3D%3D","srclang":null,"label":"thumbnails","kind":"metadata","mime_type":"text/webvtt","asset_id":null,"sources":null,"default":false,"width":320,"height":180,"bandwidth":300},{"id":null,"account_id":"6057955885001","src":"https://manifest.prod.boltdns.net/thumbnail/v1/6057955885001/7c8b3b86-acc9-4749-ab18-2e1b1aacf4db/ab3a3a84-1c15-4106-9b9b-c3440ad71517/thumbnail.webvtt?fastly_token=NjI2ODBmZTVfMDQ5ZjU4MDkwOGNjZjYwYWVhNTQ3ODRhZTI4MWUwMWUzYmNmZmJmYWY4Y2IyYzFmYWMzNDQyZGJjMzMxM2Q3Yw%3D%3D","srclang":null,"label":"thumbnails","kind":"metadata","mime_type":"text/webvtt","asset_id":null,"sources":null,"default":false,"width":320,"height":180,"bandwidth":300}],"published_at":"2022-03-27T10:53:49.755Z","created_at":"2022-03-27T10:53:49.760Z","updated_at":"2022-03-27T10:56:28.149Z","offline_enabled":false,"link":null,"id":"1728450060362939597","ad_keys":null}


*/

}
