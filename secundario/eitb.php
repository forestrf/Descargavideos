<?php

class Eitb extends cadena{

function calculacom(){
//titulo
//<meta property="og:title" content="Alaska y Mario Episodio Extra - Pierrot"/>
if (enString($this->web_descargada, 'og:title')) {
	$p=strpos($this->web_descargada,'og:title');
	$titulo=entre1y2_a($this->web_descargada,$p,'content="','"');
	$titulo=limpiaTitulo($titulo);
} else {
	$titulo=entre1y2($this->web_descargada, '<title>', '<');
}
dbug('titulo='.$titulo);

//imagen
//<meta property="og:image" content="http://....jpg?height=106&amp;quality=0.91"/>
$p=strpos($this->web_descargada,'og:image');
$imagen=entre1y2_a($this->web_descargada,$p,'content="','?');
if(enString($imagen,'mtvnimages.com'))
	$imagen=$imagen.'?height=180&quality=1';
else
	$imagen=substr($imagen,0,strpos($imagen,'"'));
dbug('imagen='.$imagen);


//en la página
/*
http://www.eitb.com/es/videos/detalle/1258848/video-meteorito-rusia--mas-100-heridos-al-caer-meteorito/
detalle_video_1258848
http://www.eitb.com/es/get/multimedia/video/id/1258848/size/grande/
<media:content url="http://hdstreameitb-f.akamaihd.net/z/multimediahd/videos/2013/02/15/1045086/20130215_15532024_0005703037_001_001____T1_METEOR.mp4/manifest.f4m" type="video/x-flv"/>
http://www.eitb.com/multimediahd/videos/2013/02/15/1045086/20130215_15532024_0005703037_001_001____T1_METEOR.mp4
http://www.eitb.com/multimedia/videos/2011/10/24/558362/PIRINEOS_ES_20111024_101408.flv
*/

$idMode = true;
$done = false;

if(!$done && preg_match('@"contentUrl":.*?(".*?")@i', $this->web_descargada, $matches)) {
	dbug("contentUrl mode");
	dbug_r($matches);
	$url=json_decode($matches[1], true);
	if (!enString($url, '.m3u8')) {
		$idMode = false;
		$obtenido=array(
			'titulo'  => $titulo,
			'imagen'  => $imagen,
			'enlaces' => array(
				array(
					'url'  => $url,
					'url_txt' => 'Descargar',
					'tipo' => 'http',
					'extension' => substr($url,-3,3)
				)
			)
		);
		$done = true;
	}
}
if(!$done && preg_match('/<div.+?class="player">/', $this->web_descargada)){
	if(!enString($this->web_descargada, 'detalle_video_')){
		setErrorWebIntera('No se puede encontrar ningún vídeo.');
		return;
	}
	dbug('1');
	$p=strpos($this->web_descargada,'<div class="player">');
	$id=entre1y2_a($this->web_descargada,$p,'detalle_video_','"');
	dbug('id='.$id);
	$done = true;
}
if(!$done && enString($this->web_descargada, 'insertar_player_video(')){
	dbug('2');
	$id=entre1y2($this->web_descargada,'insertar_player_video(',',');
	if ($id[0] === "'" || $id[0] === '"') {
		$id = substr($id, 1, strlen($id) - 2);
	}
	dbug('id='.$id);
	$done = true;
}
if(!$done && preg_match('@/([0-9]+)(?:/?(?:#.*?)?)$@', $this->web, $matches)){
	dbug('3, desde url');
	$id=$matches[1];
	dbug('id='.$id);
	$done = true;
}

if ($idMode) {
	if (enString($this->web, 'eitb.com/')) {
		dbug('old mode, but I\'m scared of removing this');
		$ret=CargaWebCurl('http://www.eitb.com/es/get/multimedia/video/id/'.$id.'/size/grande/');
		
		$imagen=entre1y2($ret,'thumbnail url="','"');

		if(enString($ret, 'manifest.f4m')){
			$p=strpos($ret,'<media:content url="');
			//$p=strpos($ret,'url="',$p);
			$url='http://www.eitb.com/'.entre1y2_a($ret,$p,'z/','/manifest.f4m');
			
			$obtenido=array(
				'titulo'  => $titulo,
				'imagen'  => $imagen,
				'enlaces' => array(
					array(
						'url'  => $url,
						'url_txt' => 'Descargar',
						'tipo' => 'http'
					)
				)
			);
		}
		elseif(enString($ret, '.mp4') || enString($ret, '.flv')){
			$url='http://www.eitb.com/'.entre1y2($ret,'<media:content url="','"');
			
			$obtenido=array(
				'titulo'  => $titulo,
				'imagen'  => $imagen,
				'enlaces' => array(
					array(
						'url'  => $url,
						'url_txt' => 'Descargar',
						'tipo' => 'http',
						'extension' => substr($url,-3,3)
					)
				)
			);
		}
	}
	else {
		if(preg_match('@[^0-9]/([0-9]+)(?:/?(?:#.*?)?)$@', $this->web, $matches)){
			dbug("Lista de reproduccion");
			/*
			$ret = CargaWebCurl('https://mam.eitb.eus/mam/REST/ServiceMultiweb/Grouplist/ByGroup/MULTIWEBTV/8/'.$id.'/');
			$ret = CargaWebCurl('https://mam.eitb.eus/mam/REST/ServiceMultiweb/Playlist2/MULTIWEBTV/'.$id.'/');
			dbug($ret);
			$ret = json_decode($ret, true);
			dbug_r($ret);
			
			$id = $ret['web_media'][0]['ID_WEB_MEDIA'];
			*/
					
			setErrorWebIntera('Listas de vídeos no soportadas. En vez de clicar en "Ver ahora", clica en uno de los vídeos disponibles.');
			return;
		}
		else {
			dbug("Vídeo individual");
		}
		
		//$imagen = $ret['web_media'][0]['THUMBNAIL_URL'];
		
		$ret = CargaWebCurl('https://mam.eitb.eus/mam/REST/ServiceMultiweb/Promo/NAHIERAN/EU/MULTIWEBTV/'.$id.'/');
		dbug($ret);
		$ret = json_decode($ret, true);
		dbug_r($ret);
		
		$url = $ret['web_media'][0]['RENDITIONS'][0]['PMD_URL']; // Add all options?

		$obtenido=array(
			'titulo'  => $titulo,
			'imagen'  => $imagen,
			'enlaces' => array(
				array(
					'url'  => $url,
					'url_txt' => 'Descargar',
					'tipo' => 'http',
					'extension' => substr($url,-3,3)
				)
			)
		);
	}
}


/*
http://www.eitb.tv/es/#/video/2142574288001
http://www.eitb.tv/es/get/videoplaylist/2142574288001/
*/

/*
http://www.eitb.com/es/get/multimedia/video/id/6156/size/grande/
http://www.eitb.eus/es/get/multimedia/video/id/6156/size/grande/

<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:jwplayer="http://developer.longtailvideo.com/trac/wiki/FlashFormats">
  <channel>
    <title></title>
    <link>http://www.eitb.eus</link>
    <description></description>
    <bcid>dfsdf</bcid>
    <item>
      <id></id>
      <title></title>
      <link>http://www.eitb.eus</link>
      <description></description>
      <media:content url="http://hdstreameitb-f.akamaihd.net/z//manifest.f4m" type="video/x-flv"/>
      <media:thumbnail url=""/>
      <pubdate></pubdate>
      <category></category>
      <jwplayer:provider>rtmp</jwplayer:provider>
      <jwplayer:streamer>rtmp://flashvod.eitb.com/ondemand/</jwplayer:streamer>
    </item>
  </channel>
</rss>
*/

/*
https://www.eitb.eus/es/nahieran/programas/vascos-por-el-mundo/napoles/detalle/6156/198386/
https://mam.eitb.eus/mam/REST/ServiceMultiweb/Video2/MULTIWEBTV/198386/

"contentUrl":"https:\/\/euskalspmd-vh.akamaihd.net\/vod\/geozone0\/2022\/03\/03\/0014295066\/0014295066_1280x720_2560000_12fb589eFiqA0lCh7r6z.mp4"
http://euskalspmd-vh.akamaihd.net/vod/geozone0/2022/03/03/0014295066/0014295066_1280x720_2560000_12fb589eFiqA0lCh7r6z.mp4

https://mam.eitb.eus/mam/REST/ServiceMultiweb/DomainRestrictedSecurity/TokenAuth/
	{"token":"exp=1648368045~acl=\/i\/*~hmac=a307fb135d8a8517d1e482503b432fd06b994cf48272771af418b14fad4d33a4","inicio_validez":"2022-03-27 07:00:45","fin_validez":"2022-03-27 10:00:45"}
	
https://euskalspmd-vh.akamaihd.net/vod/geozone0/2022/03/03/0014295066/1646921237_0014295066_3_1.vtt
https://euskalsvod-vh.akamaihd.net/i/2022/03/03/0014295066/0014295066_,1280x720_2560000_12fb589eFiqA0lCh7r6z,320x180_256000_183ae7bcZpkq9wI7bJCu,480x270_512000_bbef9ce6cF27lsY0bGmv,480x270_768000_cd1b8067KF4VAu7JSXYR,.mp4.csmil/master.m3u8?hdnts=exp=1648368045~acl=/i/*~hmac=a307fb135d8a8517d1e482503b432fd06b994cf48272771af418b14fad4d33a4
*/

/*
Esta url es el listado de capítulos.
https://www.eitb.eus/es/nahieran/programas/falsos-mitos/5248/

Este es un capítulo concreto.
https://www.eitb.eus/es/nahieran/programas/falsos-mitos/2/detalle/8088/202374/

https://mam.eitb.eus/mam/REST/ServiceMultiweb/Grouplist/ByGroup/MULTIWEBTV/8/5248/

https://mam.eitb.eus/mam/REST/ServiceMultiweb/Playlist2/MULTIWEBTV/8088/

https://mam.eitb.eus/mam/REST/ServiceMultiweb/Video2/MULTIWEBTV/202374/
{"timestamp":"2022-04-08 02:23:10","id_web_playlist":"8088","id":"8088","name":"Falsos mitos","name_playlist":"Falsos mitos","desc_playlist":"","id_web_group":"5248","name_group":"Falsos mitos","desc_group":"Iñaki Andradas, Toscana Viar y Eli Pinedo tratarán de arrojar luz sobre las dudas existentes en torno a la alimentación, nutrición y ejercicio físico.","audio_lang_id":"3","idioma":"ES","clasificacion":"PROGRAMAS","tags":["DESTACADOS_ANDROID_ES","PROGRAMAS"],"num":1,"web_media":[{"ID_WEB_MEDIA":"202374","ID":"202374","START_DATE":"2022-04-07 23:20:00","END_DATE":null,"STILL_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_23332.jpg","THUMBNAIL_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_23332.jpg","LENGTH":3110960,"ASSET_ID":"13831709","AUDIO_LANG_ID":"3","IDIOMA":"ES","PRODUCT_CODE":"216259","ITEM_STATE":"1","NAME_EU":"Falsos mitos (2)","NAME_ES":"Falsos mitos (2)","NAME_EN":"Falsos mitos (2)","NAME_FR":"Falsos mitos (2)","PARENTAL_RATING":"APTA","CHAPTER_EU":"2","CHAPTER_ES":"2","CHAPTER_EN":"2","CHAPTER_FR":"2","SHORT_DESC_EU":"","SHORT_DESC_ES":"","IS_ARCHIVE":"","ID_GEO_TYPE":"1","CLASIF_AGE_ID":"3","PUB_DATE":"2022-04-07 23:20:26","TAGS":["DESTACADOS_ANDROID_ES","PROGRAMAS"],"BROADCST_DATE":"2021-12-24 04:20:09","BROADCST_CHANNEL":"ETB4","LAST_BROADCST_DATE":"2022-04-08 02:11:34","LAST_BROADCST_CHANNEL":"CV","STR_HLS_URL":null,"STR_DASH_URL":null,"STR_DSH_URL":null,"STR_DSH_AST":0,"STR_DVR":0,"STR_START":null,"STR_END":null,"STR_MOD":null,"RELIABLE_START":null,"RELIABLE_END":null,"STR_DELAY":0,"STR_START_DSH":0,"UNDEFINED_END":0,"CHAPTER":"2","ID_WEB_PLAYLIST":"8088","HLS_SURL":"https:\/\/euskalsvod-vh.akamaihd.net\/i\/2022\/03\/01\/0013831709\/0013831709_,1280x720_2560000_4c4f3778muja0kgeXoRT,320x180_256000_be59ac4ecT6ZNOalfiBG,480x270_512000_b6ffd856GPFg67ajUisI,480x270_768000_61e1e1c9in31dw7EK0Y8,.mp4.csmil\/master.m3u8","HDS_SURL":"https:\/\/euskalsvod-vh.akamaihd.net\/z\/2022\/03\/01\/0013831709\/0013831709_,1280x720_2560000_4c4f3778muja0kgeXoRT,320x180_256000_be59ac4ecT6ZNOalfiBG,480x270_512000_b6ffd856GPFg67ajUisI,480x270_768000_61e1e1c9in31dw7EK0Y8,.mp4.csmil\/manifest.f4m","RENDITIONS":[{"FRAME_WIDTH":"1280","FRAME_HEIGHT":"720","ENCODING_RATE":"2560000","PMD_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_1280x720_2560000_4c4f3778muja0kgeXoRT.mp4"},{"FRAME_WIDTH":"480","FRAME_HEIGHT":"270","ENCODING_RATE":"768000","PMD_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_480x270_768000_61e1e1c9in31dw7EK0Y8.mp4"},{"FRAME_WIDTH":"480","FRAME_HEIGHT":"270","ENCODING_RATE":"512000","PMD_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_480x270_512000_b6ffd856GPFg67ajUisI.mp4"},{"FRAME_WIDTH":"320","FRAME_HEIGHT":"180","ENCODING_RATE":"256000","PMD_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_320x180_256000_be59ac4ecT6ZNOalfiBG.mp4"}],"SUBTITLES":[{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/1646175324_0013831709_3_1.vtt","AUDIO_LANG_ID":3,"DVB_LANG":"spa","ID_WEB_SUBTITLE_TYPE":1}],"BALIOAK":[],"IMAGES":[{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_0.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":0,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_3889.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":3889,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_7777.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":7777,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_11666.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":11666,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_15555.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":15555,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_19444.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":19444,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_23332.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":23332,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_27221.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":27221,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_31110.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":31110,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_34998.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":34998,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_38887.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":38887,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_42776.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":42776,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_46664.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":46664,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_50553.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":50553,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_54442.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":54442,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_58331.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":58331,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_62219.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":62219,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_66108.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":66108,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_69997.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":69997,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_st_640x360_73885.jpg","WIDTH":640,"HEIGHT":360,"TIME_CODE":73885,"ID_WEB_IMAGE_TYPE":3},{"URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/03\/01\/0013831709\/0013831709_th_160x90_38887.jpg","WIDTH":160,"HEIGHT":90,"TIME_CODE":38887,"ID_WEB_IMAGE_TYPE":4}]}]}

https://mam.eitb.eus/mam/REST/ServiceMultiweb/DomainRestrictedSecurity/TokenAuth/
{"token":"exp=1649427516~acl=\/i\/*~hmac=f1c3f72c43f079487c28c4e81d558054536ff2b9d82507aa1703400ab6fd8dd6","inicio_validez":"2022-04-08 13:18:36","fin_validez":"2022-04-08 16:18:36"}

https://euskalsvod-vh.akamaihd.net/i/2022/03/01/0013831709/0013831709_,1280x720_2560000_4c4f3778muja0kgeXoRT,320x180_256000_be59ac4ecT6ZNOalfiBG,480x270_512000_b6ffd856GPFg67ajUisI,480x270_768000_61e1e1c9in31dw7EK0Y8,.mp4.csmil/master.m3u8?hdnts=exp=1649427516~acl=/i/*~hmac=f1c3f72c43f079487c28c4e81d558054536ff2b9d82507aa1703400ab6fd8dd6

https://euskalsvod-vh.akamaihd.net/i/2022/03/01/0013831709/0013831709_,1280x720_2560000_4c4f3778muja0kgeXoRT,320x180_256000_be59ac4ecT6ZNOalfiBG,480x270_512000_b6ffd856GPFg67ajUisI,480x270_768000_61e1e1c9in31dw7EK0Y8,.mp4.csmil/index_0_av.m3u8?null=0

https://mam.eitb.eus/mam/REST/ServiceMultiweb/Promo/NAHIERAN/EU/MULTIWEBTV/202374/
{"timestamp":"2022-04-08 13:08:06","promo_num":1,"promo_pos":1,"promo_n_consec":7,"promo_jump":0,"promo_min_duration":2400,"num":1,"web_media":[{"ID_WEB_MEDIA":"202973","ID":"202973","START_DATE":"2022-04-06 00:00:00","END_DATE":"2022-04-09 00:00:00","LENGTH":10000,"ASSET_ID":"14655591","ITEM_STATE_CALCULATED":"1","HDS_SURL":"https:\/\/euskalsvod-vh.akamaihd.net\/z\/2022\/04\/06\/0014655591\/0014655591_,1280x720_2560000_a5719f83ugEJISxBVodA,320x180_256000_e7fe323aRcSN07sB3b8m,480x270_512000_9f17b4c1Q30Af2Y7yiBP,480x270_768000_b5c9ad51GhmPYAjzaUOW,.mp4.csmil\/manifest.f4m","HLS_SURL":"https:\/\/euskalsvod-vh.akamaihd.net\/i\/2022\/04\/06\/0014655591\/0014655591_,1280x720_2560000_a5719f83ugEJISxBVodA,320x180_256000_e7fe323aRcSN07sB3b8m,480x270_512000_9f17b4c1Q30Af2Y7yiBP,480x270_768000_b5c9ad51GhmPYAjzaUOW,.mp4.csmil\/master.m3u8","RENDITIONS":[{"FRAME_WIDTH":"1280","FRAME_HEIGHT":"720","ENCODING_RATE":"2560000","PMD_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/04\/06\/0014655591\/0014655591_1280x720_2560000_a5719f83ugEJISxBVodA.mp4"},{"FRAME_WIDTH":"480","FRAME_HEIGHT":"270","ENCODING_RATE":"768000","PMD_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/04\/06\/0014655591\/0014655591_480x270_768000_b5c9ad51GhmPYAjzaUOW.mp4"},{"FRAME_WIDTH":"480","FRAME_HEIGHT":"270","ENCODING_RATE":"512000","PMD_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/04\/06\/0014655591\/0014655591_480x270_512000_9f17b4c1Q30Af2Y7yiBP.mp4"},{"FRAME_WIDTH":"320","FRAME_HEIGHT":"180","ENCODING_RATE":"256000","PMD_URL":"https:\/\/euskalpmd.akamaized.net\/vod\/geozone0\/2022\/04\/06\/0014655591\/0014655591_320x180_256000_e7fe323aRcSN07sB3b8m.mp4"}]}]}

*/

/*
https://euskalpmd-vh.akamaihd.net/vod/geozone0/bc/0/0/0/0/9/4/9/0000949903/0000949903_STILL.jpg
https://euskalspmd-vh.akamaihd.net/vod/geozone0/bc/0/0/0/0/9/4/9/0000949903/0000949903_384x288_455982.mp4
*/

finalCadena($obtenido);
}






function calculatv(){
$obtenido=array('enlaces' => array());

// loadVideoID('', '4104702668001', '', 105961, 'cine', false, 'es');
// http://mam.eitb.eus/mam/REST/ServiceMultiweb/Video/MULTIWEBTV/105961/
if(preg_match("@loadVideoID.*?\('?.*?'?, ?'?([0-9]*?)'?, ?'?.*?'?, '?([0-9]*)'?@", $this->web_descargada, $matches)) {
	dbug_r($matches);
	
	$url = 'http://mam.eitb.eus/mam/REST/ServiceMultiweb/Video/MULTIWEBTV/' . $matches[2] . '/';
	$urlRes = CargaWebCurl($url);
	dbug_($urlRes);
	$json = json_decode($urlRes, true);
	dbug_r($json);
	
	$titulo = $json['web_media'][0]['NAME_EU'];
	$imagen = $json['web_media'][0]['STILL_URL'];
	dbug('titulo = '.$titulo);
	dbug('imagen = '.$imagen);

	$renditions = &$json['web_media'][0]['RENDITIONS'];
	for ($i = 0, $i_l = count($renditions); $i < $i_l; $i++) {
		$obtenido['enlaces'][] = array(
			'url_txt' => 'Tamaño: ' . $renditions[$i]['FRAME_WIDTH'] . ' x ' . $renditions[$i]['FRAME_HEIGHT'],
			'url'    => $renditions[$i]['PMD_URL']
		);
	}
	
} else {
		
	//http://c.brightcove.com/services/messagebroker/amf?playerKey=AQ~~,AAAAEUA28vk~,ZZqXLYtFw-ADB2SpeHfBR3cyrCkvIrAe
	if(enString($this->web_descargada,'<param name="playerKey"'))
		$playerKey=entre1y2($this->web_descargada,'<param name="playerKey" value="','"');
	if(!isset($playerKey)){
		setErrorWebIntera('No se ha encontrado ningún vídeo.');
		return;
	}
	dbug('playerKey -> '.$playerKey);
	$messagebroker='http://c.brightcove.com/services/messagebroker/amf?playerKey='.$playerKey;


	if(enString($this->web_descargada,'<param name="playerID"'))
		$experienceID=entre1y2($this->web_descargada,'<param name="playerID" value="','"');
	if(!isset($experienceID)){
		setErrorWebIntera('No se ha encontrado ningún vídeo.');
		return;
	}
	dbug('experienceID -> '.$experienceID);


	include 'brightcove-funciones.php';

	$a_encodear = array
	(
		'target'	=> 'com.brightcove.experience.ExperienceRuntimeFacade.getDataForExperience',
		'response'	=> '/1',
		'data'		=> array
		(
			'0' => 'a8cdc396a50ca2415ddd0e33cca179431347adc5',
			'1' => new SabreAMF_AMF3_Wrapper
			(
				new SabreAMF_TypedObject
				(
					'com.brightcove.experience.ViewerExperienceRequest',
					array
					(
						'TTLToken' => null,
						'deliveryType' => NAN,
						'URL' => $this->web, //Innecesario
						'experienceId' => $experienceID,
						'playerKey' => $playerKey,
						'contentOverrides' => null
					)
				)
			)
		)
	);

	$post = brightcove_encode($a_encodear);



	dbug('a descargar: '.$messagebroker);
	$t=brightcove_curl_web($messagebroker,$post);

	$res_decoded=brightcove_decode($t);
	dbug('PRIMERA RESPUESTA BRIGHTCOVE:');
	dbug_r($res_decoded);


	$publisherId1=$res_decoded['data']->getAMFData();
	$publisherId=$publisherId1['publisherId'];
	dbug('publisherId -> '.$publisherId);

	preg_match_all('@/([0-9]+)/([0-9]+)/@i', $this->web, $match); 
	$elem1=$match[1][0];
	$elem2=$match[2][0];


	$a_encodear_2 = array
	(
		'target'	=> 'com.brightcove.player.runtime.PlayerMediaFacade.findMediaById',
		'response'	=> '/1',
		'data'		=> array
		(
			'0' => '1667452d348dee57623638675cb12b6418e7ccc3',
			'1' => $experienceID,
			'2' => $elem2,
			'3' => $publisherId
		)
	);

	$post = brightcove_encode($a_encodear_2);

	$t=brightcove_curl_web($messagebroker,$post);

	$res_decoded=brightcove_decode($t);
	dbug('SEGUNDA RESPUESTA BRIGHTCOVE (enlaces de vídeos aquí):');
	dbug_r($res_decoded);

	if($res_decoded['data'] === null){
		// Seguro que el vídeo no funciona en la página oficial.
		setErrorWebIntera('No se puede reproducir el vídeo desde el enlace que ha indicado.');
		return;
	}

	$base=$res_decoded['data']->getAMFData();
	$titulo=$base['displayName'];
	$imagen=$base['videoStillURL'];
	dbug('titulo = '.$titulo);
	dbug('imagen = '.$imagen);


	$obtenido['enlaces'] = brightcove_genera_obtenido($this, $base, array(
		'IOSRenditions' => 'm3u8',
		'renditions' => 'rtmpConcreto'
	), $titulo, array(
		'videoId' => $base['id'],
		'pubId' => $publisherId,
		'playerId' => $experienceID
	));
}

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);

}

function URLSDelArrayBrightCove($r, $tipo, &$obtenido_enlaces, $titulo, $extraParams){
	if($r['audioOnly']!='1'){
		if ($r['encodingRate'] > 0) {
			$arrayTemp=array(
				'calidad_ordenar' => $r['encodingRate'],
				'titulo'          => 'Calidad: '.floor($r['encodingRate']/1000).' Kbps',
				'url'             => $r['defaultURL'],
				'tipo'            => $tipo
			);
		} else {
			$arrayTemp=array(
				'calidad_ordenar' => 0,
				'url'             => $r['defaultURL'],
				'tipo'            => $tipo
			);
		}
		
		//rtmpdump --rtmp "rtmp://brightcove.fcod.llnwd.net/a500/e1/uds/rtmp/ondemand/&mp4:102076681001/102076681001_1194607581001_40628-20111001-193913.mp4&1396378800000&8ea0d55b8390f639ceb5d6cb0012f5a1" --app="a500/e1/uds/rtmp/ondemand?videoId=1194575820001&lineUpId=&pubId=102076681001&playerId=2202962695001" --swfUrl="http://admin.brightcove.com/viewer/us20121218.1107/federatedVideoUI/BrightcovePlayer.swf?uid=1355158765470" --playpath="mp4:102076681001/102076681001_1194607581001_40628-20111001-193913.mp4?videoId=1194575820001&lineUpId=&pubId=102076681001&playerId=2202962695001" --pageUrl="http://www.eitb.tv/es/video/escepticos/1162371025001/1194575820001/-todo-esta-escrito-/" -C "B:0" -C "S:mp4:102076681001/102076681001_1194607581001_40628-20111001-193913.mp4&1396378800000&8ea0d55b8390f639ceb5d6cb0012f5a1" -o "Escepticos_-3-.mp4"
		
		if(enString($r['defaultURL'], 'brightcove') &&
				preg_match('@://.*?/(.*?)[\?&].*?mp4:(.*?)$@', $r['defaultURL'], $matches)){
			$a = $matches[1] ? $matches[1] : '';
			$CS = $matches[2] ? $matches[2] : '';
			$extra = '-a "'.$a.'" -C "B:0" -C "S:'.$CS.'" ';
		}
		else{ //else edgefcs
			$extra = '';
		}
		
		//print_r($matches);
		
		// http://euskalvod-vh.akamaihd.net/z/2015/05/21/0007623468/0007623468_,768x432_12288,320x180_2560,480x270_5120,480x270_7680,00.mp4.csmil/manifest.f4m?videoId=4248876567001&lineUpId=&pubId=4053905864001&playerId=4191633842001&affiliateId=&g=PXFLHTJPFASF&hdcore=3.4.0
		// http://euskalvod-vh.akamaihd.net/z/2015/05/21/0007623468/0007623468_,768x432_12288,320x180_2560,480x270_5120,480x270_7680,00.mp4.csmil/manifest.f4m?videoId=4248876567001&pubId=4053905864001&playerId=4191633842001&hdcore=3.4.0
		
		if ($tipo === 'rtmpConcreto') {
			if (enString($r['defaultURL'], 'mp4:')) {
				preg_match_all('@(mp4:.*?\.mp4)@i', $r['defaultURL'], $match);
				$y = $match[0][0];
				if ($r['encodingRate'] > 0) {
					$filename = generaNombreWindowsValido($titulo.' - '.floor($r['encodingRate']/1000).' Kbps'.'.mp4');
				} else {
					$filename = generaNombreWindowsValido($titulo.'.mp4');
				}
				$arrayTemp['rtmpdump'] = '-r "'.strtr($r['defaultURL'],array('&'.$y=>'')).'" -y "'.$y.'" '.$extra.' -o "'.$filename.'"';
				$arrayTemp['nombre_archivo'] = $filename;
			} elseif (enString($r['defaultURL'], 'manifest.f4m')){
				$arrayTemp['tipo'] = 'f4m';
				$arrayTemp['nombre_archivo'] = generaNombreWindowsValido($titulo.'.mp4');
				$arrayTemp['url'] .= '?videoId=' . $extraParams['videoId'] . '&pubId=' . $extraParams['pubId'] . '&playerId=' . $extraParams['playerId'] . '&hdcore=3.4.0';
			} else {
				$arrayTemp['tipo'] = 'http';
				$arrayTemp['url_txt'] = 'Descargar';
			}
		}
		
		$obtenido_enlaces[] = $arrayTemp;
	}
}

}
