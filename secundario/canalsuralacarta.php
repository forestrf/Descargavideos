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
else{
	dbug('último case ifelse');
	
	$titulo = entre1y2($this->web_descargada,'<title>','<');
	
	if(enString($this->web_descargada,"og:image")){
		$p=strpos($this->web_descargada,"og:image");
		$imagen=entre1y2_a($this->web_descargada, $p, 'content="', '"');
	}
	else
		$imagen='http://'.DOMINIO.'/canales/canalsur.png';
	
	if (preg_match('@direct_url:(".*?")@', $this->web_descargada, $matches)) {
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
		$url=$matches[0];
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
