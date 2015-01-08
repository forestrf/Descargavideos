<?php

/*
20130628-DISNEYCHAPTER-00001-false
http://replay.disneychannel.es/chapterxml/13/2013/06/28/00001.xml

assets2/2013/06/28/00001/video_720_900k_es.mp4

http://i3tv.dcres.edgesuite.net/assets2/2013/06/28/00001/video_720_900k_es.mp4



20141003-EPISODE-00005-false


<urlImg>http://replay.disneychannel.es/</urlImg>
<urlVideoFlv>rtmp://antena3fs.fplive.net/videos/swf/</urlVideoFlv>
<urlVideoMp4>http://i3tvdcresns-vh.akamaihd.net/z/</urlVideoMp4>
<urlHttpVideo>http://replay.disneychannel.es/antena3tv/</urlHttpVideo>
<urlSmil>http://www.antena3.com/player/</urlSmil>
<NetStorage>http://i3tv.dcres.edgesuite.net/</NetStorage>

<urlImg>http://www.antena3.com/</urlImg>
<urlVideoFlv>rtmp://antena3fs.fplive.net/videos/swf/</urlVideoFlv>
<urlVideoMp4>rtmp://antena3videofs.fplive.net/antena3video/</urlVideoMp4>
<urlHttpVideo>http://desprogresiva.antena3.com/</urlHttpVideo>
<urlSmil>http://www.antena3.com/player/</urlSmil>
*/


class A3 extends cadena{

function calcula(){
	$xml_ret='';
	
	$domain = entre1y2($this->web, 0, strpos($this->web, '/', 7));
	
	//video premium
	if(enString($this->web_descargada,'<div class="premium">')){
		setErrorWebIntera('premium');
		return;
	}
	
	//varios vídeos a la vez
	if(enString($this->web_descargada,'<div class="grid_12 carruContentDoble">')){
		setErrorWebIntera('full');
		return;
	}
	
	$imagen = '';
	$descripcion = '';
	
	$obtenido=array(
		'enlaces' => array()
	);

	//http://www.antena3.com/chapterxml//5/5271378/2012/02/16/00005.xml
	//http://www.antena3.com/videoxml/2/1324/1003569/1003570/2012/02/15/00044.xml
	//http://www.antena3.com/.../....xml
	if(enString($this->web_descargada,"xml='")){
		dbug("xml=' encontrado");

		if(enString($this->web_descargada,'mod_galeria_videos')){
			dbug('varios vídeos: mod_galeria_videos');
			
			$titulo='Grupo de vídeos de Antena 3';
			$imagen='http://www.'.DOMINIO.'/canales/a3.png';
			
			$extracto=entre1y2($this->web_descargada, 'mod_galeria_videos', 'Video Siguiente');

			$ult=0;
			while(enString($extracto,"xml='",$ult)){
				$p=strposF($extracto,"xml='",$ult);
				$ult=strpos($extracto,"'",$p);
				$xml=$domain.substr($extracto,$p,$ult-$p);
				exit;
				foreach($this->parseaXMLNormal($xml, $xml_ret, 'multi') as $individual)
					$obtenido['enlaces'][]=$individual;
			}
		}
		else{
			$xml=$domain.entre1y2($this->web_descargada,"xml='","'");
			foreach($this->parseaXMLNormal($xml, $xml_ret) as $individual)
				$obtenido['enlaces'][]=$individual;
		}
	}
	elseif(enString($this->web_descargada,'modulo_central')){
		dbug('módulo central');
		$p=strpos($this->web_descargada,'modulo_central');
		$xml=$domain.'/'.entre1y2_a($this->web_descargada, $p, "player_capitulo.xml='", '.xml'); //devuelve sin /
		foreach($this->parseaXMLNormal($xml, $xml_ret) as $individual)
			$obtenido['enlaces'][]=$individual;
	}
	elseif(enString($this->web_descargada, 'http://www.antena3.com/videosnuevosxml')){
		preg_match_all('@http://www.antena3.com/videosnuevosxml[^ ^" ^\']*@', $this->web_descargada, $matches);

		$videos = $matches[0];
		$videos_cargados = array();
		foreach($videos as $xml){
			if(in_array($xml, $videos_cargados)){
				continue;	
			}
			//$xml = strtr($xml, array('videosnuevosxml' => 'videoxml'));
			$obtenido['enlaces'][]=$this->parseaXMLNuevo($xml, $imagen, $descripcion);
			$videos_cargados[] = $xml;
		}
		$titulo = entre1y2($this->web_descargada, '<title>','<');
		if(!isset($imagen) || !enString($imagen, '.jpg')){
			$imagen = $domain.'/clipping/'.entre1y2($this->web_descargada, '/clipping/', '.jpg').'.jpg';
			$imagen = substr($imagen, 0, strrposF($imagen, '/')).'45.jpg';
		}
	}
	elseif(enString($this->web_descargada,'playContainer')){
		dbug('playContainer');
		if(enString($this->web_descargada, '.xml=')){
			dbug('modo 1');
			$p=strpos($this->web_descargada,'playContainer');
			$xml=$domain.'/'.entre1y2_a($this->web_descargada, $p, ".xml='", '.xml'); //devuelve sin /
			foreach($this->parseaXMLNormal($xml, $xml_ret) as $individual)
				$obtenido['enlaces'][]=$individual;
		}
		elseif(enString($this->web_descargada, 'name="videoDataUrl" value="')){
			dbug('modo 2');
			$xml=entre1y2($this->web_descargada, 'name="videoDataUrl" value="', '"');
			$obtenido['enlaces'][]=$this->parseaXMLNuevo($xml, $imagen, $descripcion);
			$titulo = entre1y2($this->web_descargada, '<title>','<');
			if(!isset($imagen) || !enString($imagen, '.jpg')){
				$imagen = $domain.'/clipping/'.entre1y2($this->web_descargada, '/clipping/', '.jpg').'.jpg';
				$imagen = substr($imagen, 0, strrposF($imagen, '/')).'45.jpg';
			}
		}
		
	}
	//.addVariable("xml"
	elseif(enString($this->web_descargada,'.addVariable("xml"')){
		dbug('.addVariable("xml"');
		$xml=$domain.entre1y2($this->web_descargada, '.addVariable("xml","', '"');
		foreach($this->parseaXMLNormal($xml, $xml_ret) as $individual){
			$obtenido['enlaces'][]=$individual;
		}
	}

	if(!isset($titulo)||!isset($imagen)){
		dbug('xml='.$xml);
		//$retfull=CargaWebCurl($xml);

		//titulo
		if(!isset($titulo)){
			if(enString($xml_ret, '<nombre><![CDATA[')){
				$titulo=entre1y2($xml_ret,'<nombre><![CDATA[',']');
			} else {
				$titulo=entre1y2($xml_ret,'<title>','<');
			}
			$titulo=limpiaTitulo($titulo);
		}
		dbug('titulo='.$titulo);

		if(!isset($imagen) || !isset($imagen[0])){
			dbug('buscar imagen.');
			//imagen
			//<archivoMultimediaMaxi><archivo>clipping/2012/02/08/00127/30.jpg</archivo><alt></alt></archivoMultimediaMaxi>
			$p=strpos($xml_ret,'archivoMultimediaMaxi');
			$imagen=entre1y2_a($xml_ret, $p, 'A[', ']');

			if(strpos($imagen,'http') !== 0)
				$imagen=$domain.'/'.$imagen;
		}
		dbug('imagen='.$imagen);
	}

	if($descripcion !== '')
		$obtenido['descripcion']=$descripcion;

	$titulo = strtr($titulo, array(' - ANTENA 3 TV' => '', 'ANTENA 3 TV.' => ''));
	$titulo = limpiaTitulo($titulo);

	$obtenido['titulo']=$titulo;
	$obtenido['imagen']=$imagen;


	finalCadena($obtenido);
}

//modo= normal o multi
function parseaXMLNormal($url, &$xml_ret, $modo = 'normal') {
	dbug('parseaXMLNormal');
	dbug('xml='.$url);
	$xml=CargaWebCurl($url);
	
	if($xml_ret === ''){
		dbug('xml_ret (url)='.$url);
		$xml_ret=$xml;
	}

	$netStorage = false;
	if (enString($xml, '<NetStorage><![CDATA[')) {
		$ret2=entre1y2($xml, '<NetStorage><![CDATA[', ']');
		$netStorage = true;
	} else {
		$ret2=entre1y2($xml, '<urlHttpVideo><![CDATA[', ']');
	}

	//fix para evitar geobloqueo.
	$ret2=strtr($ret2, array('geodesprogresiva'=>'desprogresiva'));

	$p=strpos($xml,'<archivoMultimedia>');
	$ret=entre1y2_a($xml,$p,'<archivo><![CDATA[',']');

	//$ret contiene el primer enlace. usandolo podemos saber si hay mas enlaces.
	//sacamos la extension de $ret y suponiendo que todas las partes tienen la misma extension
	//buscamos la existencia del mismo principio y aseguramos con el mismo final
	$extension=substr($ret, strposF($ret,'.'));
	dbug('extensión: '.$extension);
	if($extension === 'f4v'){
		dbug('Tiene DRM (ext === f4v). No usar resultado.');
		return array();
	}

	$f=strrposF($ret,'/',0);
	$baselimpia=substr($ret,0,$f);

	$lastpos=$total=0;
	$i=1;
	$obtenidoT=array();
	while($total==0){
		$p=strpos($xml,'<archivoMultimedia>',$lastpos)+3;
		$lastpos=$f=strpos($xml,'archivoMultimedia',$p);
		$rettemp=substr($xml,$p,$f-$p);
		
		if($netStorage) {
			$temp=$ret2.entre1y2($rettemp,'<archivoNetStorage><![CDATA[',']');
		} else {
			$temp=$ret2.entre1y2($rettemp,'<archivo><![CDATA[',']');
		}
		
		if(enString($temp,$extension)){
			if($modo=='multi'){
				$urltxt=entre1y2($xml,'<nombre><![CDATA[',']');
				if(stringContains($urltxt,array('<','>'))){
					//<title>CarreraBarhein1 </title>
					$urltxt=entre1y2($xml,'<title>','<');
				}
				$urltxt=limpiaTitulo($urltxt);
			}
			else
				$urltxt='parte '.$i;
			dbug('url encontrada: '.$temp);
			
			$obtenidoT[] = array(
				'url'     => $temp,
				'tipo'    => 'http',
				'url_txt' => $urltxt
			);
		}else
			$total=$i;

		$i++;
	}

	$retornar=array();

	if(count($obtenidoT)>1){
		$retornar[]=array(
			'titulo' => 'En partes:'
		);
		foreach($obtenidoT as $individual)
			$retornar[]=$individual;

		//añadir la versión del vídeo completa. Gracias a doriape@gmail.com, creador de www.elbarco.tk y www.elbarcoxml.tk
		$retornar[] = array(
			'titulo' => 'Completo:',
			'url'    => 'rtmp://antena3tvfs.fplive.net/antena3mediateca/'.$baselimpia.'000.'.$extension,
			'tipo'   => 'rtmp'
		);
	}else{
		if($modo === 'normal')
			unset($obtenidoT[0]['url_txt']);
		foreach($obtenidoT as $elem)
			$retornar[]=$elem;
	}
	
	return $retornar;
}

function parseaXMLNuevo(&$entrada, &$imagen, &$descripcion){
	dbug('parseaXMLNuevo');
	$ret_full = CargaWebCurl($entrada);
	dbug_($ret_full);
	if($imagen === ''){
		$imagen = entre1y2($ret_full, '<background><![CDATA[',']');
	}
	if($descripcion === ''){
		$descripcion = entre1y2($ret_full, '<description><![CDATA[',']');
	}
	return array(
		'url'     => strtr(entre1y2($ret_full, '<videoSource><![CDATA[',']'), array('geodesprogresiva'=>'desprogresiva')),
		'tipo'    => 'http',
		'url_txt' => entre1y2($ret_full, '<name><![CDATA[',']')
	);
}

}
