<?php

class Canalpluses extends cadena{

function calcula(){
	
	/*
	http://www.canalplus.es/mas-deportes/videos-rally/
	
	
	<param name="FlashVars" value="skin=canalplus&amp;referrer=&amp;xref=20141118plucandep_7.Ves&amp;playlist=&amp;conf=/multimedia/videoAS3/skins/confVideoDinamico.html?tipo=conf_big_white&amp;id=cp_54adb822bfba4&amp;logo=%2Frecorte%2F%3Fid%3D20141118plucandep_11.Ies%26r%3DREC500%26t%3Dse%26v%3D&amp;titulo=De Rally (17/11/2014): Gran Bretaña" />
	<video poster="/recorte/?id=20141118plucandep_11.Ies&amp;r=REC500&amp;t=se&amp;v=" width="600" height="379" controls>
	<source src="http://vdmedia_1.plus.es/topdigitalplus/201411/18/7765d8d533d029339c1eea6e89a47afa_696.mp4" type="video/mp4"/>
	<source src="http://vdmedia_1.plus.es/topdigitalplus/201411/18/7765d8d533d029339c1eea6e89a47afa_2096.mp4" type="video/mp4"/>
	<source src="http://vdmedia_1.plus.es/topdigitalplus/201411/18/7765d8d533d029339c1eea6e89a47afa_696.mp4" type="video/mp4"/>
	<source src="http://vdmedia_1.plus.es/topdigitalplus/201411/18/7765d8d533d029339c1eea6e89a47afa_2096.mp4" type="video/mp4"/>
	
	http://www.canalplus.es/servicios/player/mm_se_top.html?xref=20141118plucandep%5F7%2EVes&account=digitalplus&view=playlist
	*/
	
	$enlaces = array();
	
	preg_match_all('#<source src="(.+?)"#', $this->web_descargada, $matches);
	dbug_r($matches[1]);
	$videos = array_unique($matches[1]);
	dbug_r($videos);
	$order = array();
	foreach ($videos as $video) {
		preg_match('#_([0-9]{3,})\.(?:mp4|webm|flv|wmv|mov|mpg|mpeg)#i', $video, $matches);
		$order[] = $matches[1];
		
		$enlaces[] = array(
			'url'     => htmlspecialchars_decode(utf8_encode($video)),
			'url_txt' => 'Calidad: ' . $matches[1],
			'tipo'    => 'http'
		);
		
	}
	dbug_r($order);
	
	array_multisort($enlaces, $order);
	
	
	$xref = entre1y2($this->web_descargada, 'xref=','&');
	$datos = CargaWebCurl('http://www.canalplus.es/servicios/player/mm_se_top.html?xref=' . $xref);
	
	$titulo = utf8_encode(entre1y2($datos, 'name="titulo" value="','"'));
	//$descripcion = utf8_encode(entre1y2($datos, 'name="descripcion" value="','"'));
	$imagen = 'http://www.canalplus.es' . utf8_encode(htmlspecialchars_decode(entre1y2($this->web_descargada, 'poster="', '"')));
	
	
	
	
	$obtenido=array(
		'titulo'  => $titulo,
		//'descripcion' => $descripcion,
		'imagen'  => $imagen,
		'enlaces' => $enlaces
	);
	
	finalCadena($obtenido);
}

}
