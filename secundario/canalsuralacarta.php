<?php

class Canalsuralacarta extends cadena{

function calcula(){
$obtenido=array('enlaces' => array());

//http://www.canalsuralacarta.es/television/video/presenta-enrique-romero/7718/44

//video no admitido
if(enString($this->web_descargada,"_url_xml_datos")){
	dbug("_url_xml_datos encontrado");

	//<param name="flashVars" value="_width=630&_height=354&_url_xml_datos=http://www.canalsuralacarta.es/webservice/video/7718" />
	//flashVars="_width=630&_height=354&_url_xml_datos="

	$p=strrposF($this->web_descargada,'_url_xml_datos=');
	$f=strpos($this->web_descargada,'"',$p);
	$xml=substr($this->web_descargada,$p,$f-$p);

	dbug("xml=".$xml);
	//http://www.canalsuralacarta.es/webservice/video/7718



	$titulo=entre1y2($this->web_descargada,'<title>','<');
	if (enString($titulo, ' ::')) {
		$titulo=substr($titulo, 0, strpos($titulo, ' ::'));
	}
	//$titulo=utf8_encode($titulo);
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);

	$ret=CargaWebCurl($xml);

	//imagen
	//<archivoMultimediaMaxi><archivo>clipping/2012/02/08/00127/30.jpg</archivo><alt></alt></archivoMultimediaMaxi>
	$imagen=entre1y2($ret,'<picture>','</');
	dbug('imagen='.$imagen);
	if(enString($imagen, '1pxtrans.gif')){
		$imagen = 'http://'.DOMINIO.'/canales/canalsur.png';
	}

	//<video type="content">
	//</video>
	$p=strpos($ret,'<video type="content">');
	$ret=substr($ret,$p);
	
	preg_match_all('#<url>([^\[]*?)</url>#', $ret, $matches);
	dbug_r($matches[1]);

	dbug('total videos='.count($matches[1]));
	
	switch (count($matches[1])) {
		case 0:
			setErrorWebIntera("No se encuentra ningún vídeo");
			return;
			break;
		case 1:
			$obtenido['enlaces'][] = array(
				'url'     => $matches[1][0],
				'tipo'    => 'http',
				'url_txt' => 'Descargar'
			);
			break;
		default:
			for ($i = 0, $i_t = count($matches[1]); $i < $i_t; $i++) {
				$obtenido['enlaces'][] = array(
					'url'     => $matches[1][$i],
					'tipo'    => 'http',
					'url_txt' => 'parte '.($i+1)
				);
			}
			break;
	}
	
	//<url>http://ondemand.rtva.ondemand.flumotion.com/rtva/ondemand/flash8/programas/toros-para-todos/20110921122144-7-toros-para-todos-245--domingo.flv</url>
	//http://ondemand.rtva.ondemand.flumotion.com/rtva/ondemand/mp4-web/programas/andalucia-directo/54134_1_6110.mp4
}
elseif(enString($this->web_descargada,"var elementos = [];")){
	dbug('var elementos = [];');
	
	$ret = utf8_encode($this->web_descargada);
	$ret = strtr($ret,array('\\"'=>"'"));

	$videos=substr_count($ret,'elementos.push');
	dbug('total videos='.$videos);
	
	$last=strpos($ret,"elementos.push");
	
	$imagen="http://www.canalsur.es/".entre1y2_a($ret,$last,'"urlPrevia": "','"');
	if($videos>1){
		$titulo="Canal Sur";
		for($i=0;$i<$videos;$i++){
			$obtenido['enlaces'][$i]=array(
				'url'     => entre1y2_a($ret,$last,'"url": "','"'),
				'tipo'    => 'http',
				'url_txt' => entre1y2_a($ret,$last,'"pie": "','"')
			);
			$last = strpos($ret, "});", $last)+1;
		}
	}
	else{
		$titulo=entre1y2_a($ret,$last,'"pie": "','",');
		$obtenido['enlaces'][$i]=array(
			'url'     => entre1y2_a($ret,$last,'"url": "','"'),
			'tipo'    => 'http'
		);
	}
}
elseif(enString($this->web_descargada, '{content:{id:')) {
	// https://www.canalsurmas.es/videos/35265-11112021
	dbug("Alacarta nuevo");
	$id = entre1y2($this->web_descargada, '{content:{id:', ',');
	$titulo = entre1y2($this->web_descargada,'{content:{id:'.$id.',name:"', '"');
	dbug_($id);
	// https://api-rtva.interactvty.com/api/2.0/contents/content_resources/35265/?optional_fields=type,videotype,media_url,is_initial,assets,drm_token,test,plain,url_app_web,thumbnail_track_url
	$whereToGetJSON = "https://api-rtva.interactvty.com/api/2.0/contents/content_resources/$id/?optional_fields=type,videotype,media_url,is_initial,assets,drm_token,test,plain,url_app_web,thumbnail_track_url";
	dbug_($whereToGetJSON);
	$token = "dG9rZW4gM2U1MzkxZDMxODFhYzU2NmJiNWE2YWM5ZGZmNDEyN2M3NGE0NzU3NA=="; // This works, but may not in the future
	$token = base64_decode($token);
	// Headers: Authorization: jwtok eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNzM5MDA5NzUyLCJpYXQiOjE3Mzg5NTU3NTIsImp0aSI6ImRhMjk0MzVkZjFkMzQzMGU4N2UwZWZhODUyM2QyNzYzIiwidXNlcl9pZCI6MzMwMCwiY2xpZW50X2lkIjoiY2FuYWxzdXIiLCJpc19kZW1vIjp0cnVlfQ.CQdZUgGQmt-T_5mQek4asarCyXGi2lo5RvcJ0CRzgwg
	// access:                      "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiZXhwIjoxNzM5MDA5NzUyLCJpYXQiOjE3Mzg5NTU3NTIsImp0aSI6ImRhMjk0MzVkZjFkMzQzMGU4N2UwZWZhODUyM2QyNzYzIiwidXNlcl9pZCI6MzMwMCwiY2xpZW50X2lkIjoiY2FuYWxzdXIiLCJpc19kZW1vIjp0cnVlfQ.CQdZUgGQmt-T_5mQek4asarCyXGi2lo5RvcJ0CRzgwg"
	// refresh:                     "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0b2tlbl90eXBlIjoicmVmcmVzaCIsImV4cCI6MTc1NDUwNzc1MiwiaWF0IjoxNzM4OTU1NzUyLCJqdGkiOiJiZjI4NjM0MTdjMDU0OGU2OTY2ZTM2NjE1NTliNmUyYyIsInVzZXJfaWQiOjMzMDAsImNsaWVudF9pZCI6ImNhbmFsc3VyIiwiaXNfZGVtbyI6dHJ1ZX0.IsfzXs_2cIJLsnyXwMIHziss0N9AmM_vhBVDPiJhw0s"
	
	$ret = CargaWebCurl($whereToGetJSON, '', 0, '', array('Authorization: '.$token));
	dbug_($ret);
	$ret = json_decode($ret, true);
	dbug_r($ret);
	// Response: {"count":2,"next":null,"previous":null,"results":[{"id":42048,"name":"compromiso canal sur  15/11/2021","type":"VID","videotype":"URL","media_url":"https://cdn.rtva.interactvty.com/ingesta_ott/compromiso_canal_sur/0000121995/0000121995_1080p.mp4","is_initial":false,"assets":null,"drm_token":"","test":null,"plain":null,"url_app_web":"","thumbnail_track_url":""},{"id":42046,"name":"compromiso canal sur  15/11/2021","type":"VID","videotype":"DIR","media_url":"https://cdn.rtva.interactvty.com/ingesta_ott/compromiso_canal_sur/0000121995/0000121995_3R.m3u8","is_initial":true,"assets":null,"drm_token":"","test":null,"plain":null,"url_app_web":"","thumbnail_track_url":""}]}
	
	// https://cdn.rtva.interactvty.com/ingesta_ott/compromiso_canal_sur/0000121995/0000121995_1080p.mp4
	// https://cdn.rtva.interactvty.com/ingesta_ott/compromiso_canal_sur/0000121995/0000121995_3R.m3u8
	
	$found = false;
	for ($i = 0; $i < count($ret['results']); $i++) {
		if (enString($ret['results'][$i]['media_url'], ".mp4")) {
			$obtenido['enlaces'][]=array(
				'url'     => $ret['results'][$i]['media_url'],
				'tipo'    => 'http',
				'url_txt' => 'Descargar'
			);
			$found = true;
			break;
		}
	}
	
	if (!$found) {
		$obtenido['enlaces'][]=array(
			'url'     => $ret['results'][0]['media_url'],
			'tipo'    => 'http',
			'url_txt' => 'Descargar'
		);
	}		
}
elseif(preg_match('#videos/([0-9]+)-#', $this->web, $matches) == 1) {
	dbug("Alacarta nuevo 2");
	dbug_r($matches);
	// https://www.canalsurmas.es/videos/35265-11112021
	$id = $matches[1];
	$titulo = "Canalsur alacarta";
	dbug_($id);
	$whereToGetJSON = "https://api-rtva.interactvty.com/api/2.0/contents/content_resources/$id/?optional_fields=type,videotype,media_url,is_initial,assets,drm_token,test,plain,url_app_web,thumbnail_track_url";
	dbug_($whereToGetJSON);
	$token = "dG9rZW4gM2U1MzkxZDMxODFhYzU2NmJiNWE2YWM5ZGZmNDEyN2M3NGE0NzU3NA=="; // This works, but may not in the future
	$token = base64_decode($token);
	$ret = CargaWebCurl($whereToGetJSON, '', 0, '', array('Authorization: '.$token));
	dbug_($ret);
	$ret = json_decode($ret, true);
	dbug_r($ret);
	
	
	for ($i = 0; $i < count($ret['results']); $i++) {
		if (enString($ret['results'][$i]['media_url'], ".mp4")) {
			$obtenido['enlaces'][]=array(
				'url'     => $ret['results'][$i]['media_url'],
				'tipo'    => 'http',
				'url_txt' => 'Descargar'
			);
			$found = true;
			break;
		}
	}
	
}
else{
	dbug('último case ifelse');
	
	$titulo = entre1y2($this->web_descargada,'<title>','<');
	
	if(enString($this->web_descargada,"og:image")){
		$p=strpos($this->web_descargada,"og:image");
		$imagen=entre1y2_a($this->web_descargada, $p, 'content="', '"');
	}
	else
		$imagen='http://'.DOMINIO.'/canales/canalsur.png';
	
	if (preg_match('@direct_url:("http.*?")@', $this->web_descargada, $matches)) {
		//direct_url:"https:\u002F\u002Fcdn.rtva.interactvty.com\u002Fasrun_ott\u002Fnoticias_fin_de_semana\u002F0000124880\u002F0000124880_1080p.mp4"
		dbug_r($matches);
		
		$titulo=entre1y2($this->web_descargada,'title>','<');
		$obtenido['enlaces'][]=array(
			'url'     => json_decode($matches[1], true),
			'tipo'    => 'http',
			'url_txt' => 'Descargar'
		);
	}
	elseif (preg_match("@https?://[^ ]+?\.(?:mp4|mp3|flv)@i", $this->web_descargada, $matches)) {
		dbug_r($matches);
		
		$url=$matches[0];
		$obtenido['enlaces'][]=array(
			'url'     => $url,
			'tipo'    => 'http'
		);
	}
	elseif (preg_match("@\"https?:[^ ]+?\.(?:mp4|mp3|flv)\"@i", $this->web_descargada, $matches)) {
		//"https:\u002F\u002Fcdn.rtva.interactvty.com\u002Farchivo_ott\u002Farrayan\u002FPTT_20010227_ARRY_013_m2317_M\u002FPTT_20010227_ARRY_013_m2317_M_576p.mp4"
		dbug_r($matches);
		
		$url=json_decode($matches[0]);
		$obtenido['enlaces'][]=array(
			'url'     => $url,
			'tipo'    => 'http'
		);
	}
}

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,0);
}

}
