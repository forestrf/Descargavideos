<?php

class Cope extends cadena{

function calcula(){

//http://www.cope.es/player/id=2013072310430001&activo=6
if(enString($this->web_descargada,"_url_xml_datos:")){
	dbug("audio o video por xml");
	//_url_xml_datos:'/proyecto/fragmentosJSP/playerxml.jsp?id=2013072310430001,1,33,13,,1411',
	//http://www.cope.es/proyecto/fragmentosJSP/playerxml.jsp?id=2013072310430001,1,33,13,,1411
	$url="http://www.cope.es".entre1y2($this->web_descargada,"_url_xml_datos:'","'");
	
	//http://www.cope.es/proyecto/fragmentosJSP/playerxml.jsp?id=2013072310430001,1,33,13,,1411
	$ret=CargaWebCurl($url);
	//mp3 y mp4: mp4->id=2013051613420001,1,30,,,1411
	
	$p=strposF($ret,'type="content"');
	//$f=strposF($this->web_descargada,"'",$p);
	//http://www.cope.es/proyecto/fragmentosJSP/playerxml.jsp?id=2013072310430001,1,33,13,,1411
	$url=entre1y2_a($ret,$p,"<url>","</url>");
	//http://vod.cope.es/audio/2013/07/23/audio_13745695177069462491.mp3
	
	//imagen
	$imagen="http://www.cope.es/".entre1y2($ret,"<img>","</img>");
}
elseif(enString($this->web_descargada,"addCustomPlayer(")){
	//addCustomPlayer('1iynycahpn4lw1ppzh0l6r5z1a', '15wugu5n3ruow1j9kwr3ma3tqz', '177dxsxbyqz8h18z4sldn5awz2', 686, 466, 'perf1iynycahpn4lw1ppzh0l6r5z1a-177dxsxbyqz8h18z4sldn5awz2', 'eplayer17', {age:1354724063000});
	//xml.eplayer.performgroup.com/eplayer/mrss/1iynycahpn4lw1ppzh0l6r5z1a/15wugu5n3ruow1j9kwr3ma3tqz//7-12
	//xml.eplayer.performgroup.com/eplayer/mrss/1iynycahpn4lw1ppzh0l6r5z1a/15wugu5n3ruow1j9kwr3ma3tqz
	preg_match("@addCustomPlayer\('(.*?)',.*?'(.*?)'@", $this->web_descargada, $matches);
	$aCargar = 'http://xml.eplayer.performgroup.com/eplayer/mrss/'.$matches[1].'/'.$matches[2];
	$xml = CargaWebCurl($aCargar);
	//dbug($xml);
	
	preg_match_all("@<item>[\s\S]*?</item>@", $xml, $matches);
	dbug_r($matches);
	
	
	
	foreach($matches[0] as $item){
		$urlTXT = entre1y2($item, '<title>', '</title>');

		$p=strrpos($item,'url=');
		$url=entre1y2_a($item,$p,'"','"');
		
		$obtenido['enlaces'][]=array(
			'titulo'  => $urlTXT,
			'url'  => $url,
			'tipo' => 'rtmp'
		);
	}
	
	$obtenido['titulo']='Vídeos';
	$obtenido['imagen']='http://'.DOMINIO.'/canales/cope.png';
	
	
	finalCadena($obtenido);
	return;
}
elseif(enString($this->web_descargada, '/proyecto/fragmentosJSP/playerxml.jsp')){
	$ret = CargaWebCurl('http://www.cope.es'.desde1a2($this->web_descargada, '/proyecto/fragmentosJSP/playerxml.jsp', '"'));
	dbug_($ret);
	
	$url = entre1y2($ret, '<urlHtml>','</');
		
	$obtenido = array(
		'titulo'=>'Cope',
		'imagen'=>'http://'.DOMINIO.'/canales/cope.png',
		'enlaces' => array(
			array(
				'url'  => $url,
				'url_txt' => 'Descargar',
				'tipo' => 'http'
			)
		)
	);
	
	finalCadena($obtenido);
	return;
}
else{
	setErrorWebIntera('No se ha encontrado nada.');
	return;
}


//titulo
$titulo=entre1y2($this->web_descargada,"<title>","|");


$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $url,
			'tipo' => 'http'
		)
	)
);

finalCadena($obtenido);
}

}
