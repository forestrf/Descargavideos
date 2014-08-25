<?php
function a3(){
	global $web_descargada;
	
	global $xml_ret;
	$xml_ret='';
	
	//video premium
	if(enString($web_descargada,'<div class="premium">')){
		setErrorWebIntera('premium');
		return;
	}
	
	//varios vídeos a la vez
	if(enString($web_descargada,'<div class="grid_12 carruContentDoble">')){
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
	if(enString($web_descargada,"xml='")){
		dbug("xml=' encontrado");

		if(enString($web_descargada,'mod_galeria_videos')){
			dbug('varios vídeos: mod_galeria_videos');
			
			$titulo='Grupo de vídeos de Antena 3';
			$imagen='/canales/a3.png';
			
			$extracto=entre1y2($web_descargada, 'mod_galeria_videos', 'Video Siguiente');

			$ult=0;
			while(enString($extracto,"xml='",$ult)){
				$p=strposF($extracto,"xml='",$ult);
				$ult=strpos($extracto,"'",$p);
				$xml='http://www.antena3.com'.substr($extracto,$p,$ult-$p);
				foreach(parseaXMLNormal($xml,'multi') as $individual)
					$obtenido['enlaces'][]=$individual;
			}
		}
		else{
			$xml='http://www.antena3.com'.entre1y2($web_descargada,"xml='","'");
			foreach(parseaXMLNormal($xml) as $individual)
				$obtenido['enlaces'][]=$individual;
		}
	}
	elseif(enString($web_descargada,'modulo_central')){
		dbug('módulo central');
		$p=strpos($web_descargada,'modulo_central');
		$xml='http://www.antena3.com/'.entre1y2_a($web_descargada, $p, "player_capitulo.xml='", '.xml'); //devuelve sin /
		foreach(parseaXMLNormal($xml) as $individual)
			$obtenido['enlaces'][]=$individual;
	}
	elseif(enString($web_descargada, 'http://www.antena3.com/videosnuevosxml')){
		preg_match_all('@http://www.antena3.com/videosnuevosxml[^ ^" ^\']*@', $web_descargada, $matches);

		$videos = $matches[0];
		$videos_cargados = array();
		foreach($videos as $xml){
			if(in_array($xml, $videos_cargados)){
				continue;	
			}
			//$xml = strtr($xml, array('videosnuevosxml' => 'videoxml'));
			$obtenido['enlaces'][]=parseaXMLNuevo($xml, $imagen, $descripcion);
			$videos_cargados[] = $xml;
		}
		$titulo = entre1y2($web_descargada, '<title>','<');
		if(!isset($imagen) || !enString($imagen, '.jpg')){
			$imagen = 'http://www.antena3.com/clipping/'.entre1y2($web_descargada, '/clipping/', '.jpg').'.jpg';
			$imagen = substr($imagen, 0, strrposF($imagen, '/')).'45.jpg';
		}
	}
	elseif(enString($web_descargada,'playContainer')){
		dbug('playContainer');
		if(enString($web_descargada, '.xml=')){
			dbug('modo 1');
			$p=strpos($web_descargada,'playContainer');
			$xml='http://www.antena3.com/'.entre1y2_a($web_descargada, $p, ".xml='", '.xml'); //devuelve sin /
			foreach(parseaXMLNormal($xml) as $individual)
				$obtenido['enlaces'][]=$individual;
		}
		elseif(enString($web_descargada, 'name="videoDataUrl" value="')){
			dbug('modo 2');
			$xml=entre1y2($web_descargada, 'name="videoDataUrl" value="', '"');
			$obtenido['enlaces'][]=parseaXMLNuevo($xml, $imagen, $descripcion);
			$titulo = entre1y2($web_descargada, '<title>','<');
			if(!isset($imagen) || !enString($imagen, '.jpg')){
				$imagen = 'http://www.antena3.com/clipping/'.entre1y2($web_descargada, '/clipping/', '.jpg').'.jpg';
				$imagen = substr($imagen, 0, strrposF($imagen, '/')).'45.jpg';
			}
		}
		
	}
	//.addVariable("xml"
	elseif(enString($web_descargada,'.addVariable("xml"')){
		dbug('.addVariable("xml"');
		$xml='http://www.antena3.com'.entre1y2($web_descargada, '.addVariable("xml","', '"');
		foreach(parseaXMLNormal($xml) as $individual){
			$obtenido['enlaces'][]=$individual;
		}
	}

	if(!isset($titulo)||!isset($imagen)){
		dbug('xml='.$xml);
		//$retfull=CargaWebCurl($xml);

		//titulo
		if(!isset($titulo)){
			if(enString($titulo, '<nombre><![CDATA[')){
				$titulo=entre1y2($xml_ret,'<nombre><![CDATA[',']');
			} else {
				$titulo=entre1y2($xml_ret,'<title>','<');
			}
			$titulo=limpiaTitulo($titulo);
		}
		dbug('titulo='.$titulo);

		if(!isset($imagen)){
			//imagen
			//<archivoMultimediaMaxi><archivo>clipping/2012/02/08/00127/30.jpg</archivo><alt></alt></archivoMultimediaMaxi>
			$p=strpos($xml_ret,'archivoMultimediaMaxi');
			$imagen=entre1y2_a($xml_ret, $p, 'A[', ']');

			if(strpos($imagen,'http') !== 0)
				$imagen='http://www.antena3.com/'.$imagen;
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
function parseaXMLNormal($url,$modo='normal'){
	dbug('parseaXMLNormal');
	dbug('xml='.$url);
	$xml=CargaWebCurl($url);
	
	global $xml_ret;
	if($xml_ret==''){
		dbug('xml_ret (url)='.$url);
		$xml_ret=$xml;
	}

	$ret2=entre1y2($xml, '<urlHttpVideo><![CDATA[', ']');

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
		
		$temp=$ret2.entre1y2($rettemp,'<archivo><![CDATA[',']');
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

?>