<?php
function a3(){
	global $web,$web_descargada;
	
	//$retfull=$ret=CargaWebCurl($web);
	
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
	
	$obtenido=array();
	$obtenido['enlaces']=array();

	//http://www.antena3.com/chapterxml//5/5271378/2012/02/16/00005.xml
	//http://www.antena3.com/videoxml/2/1324/1003569/1003570/2012/02/15/00044.xml
	//http://www.antena3.com/.../....xml
	if(enString($web_descargada,"xml='")){
		dbug("xml=' encontrado");

		if(enString($web_descargada,'mod_galeria_videos')){
			dbug('varios vídeos: mod_galeria_videos');
			
			$titulo='Grupo de vídeos de Antena 3';
			$imagen='/canales/a3.png';
			
			$p=strpos($web_descargada,'mod_galeria_videos');
			$f=strpos($web_descargada,'Video Siguiente',$p);
			$extracto=substr($web_descargada,$p,$f-$p);

			$ult=0;
			while(enString($extracto,"xml='",$ult)){
				$p=strposF($extracto,"xml='",$ult);
				$ult=$f=strpos($extracto,"'",$p);
				$xml='http://www.antena3.com'.substr($extracto,$p,$f-$p);
				foreach(parseaXMLNormal($xml,'multi') as $individual)
					$obtenido['enlaces'][]=$individual;
			}
		}
		else{
			$p=strposF($web_descargada,"xml='");
			$f=strpos($web_descargada,"'",$p);
			$xml=substr($web_descargada,$p,$f-$p);
			$xml='http://www.antena3.com'.$xml;
			foreach(parseaXMLNormal($xml) as $individual)
				$obtenido['enlaces'][]=$individual;
		}
	}
	elseif(enString($web_descargada,'modulo_central')){
		dbug('módulo central');
		$p=strpos($web_descargada,'modulo_central');
		$p=strposF($web_descargada,"player_capitulo.xml='",$p); //devuelve sin /
		$f=strposF($web_descargada,'.xml',$p);
		$xml=substr($web_descargada,$p,$f-$p);
		$xml='http://www.antena3.com/'.$xml;
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
			$obtenido['enlaces'][]=parseaXMLNuevo($xml);
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
			$p=strposF($web_descargada,".xml='",$p); //devuelve sin /
			$f=strposF($web_descargada,'.xml',$p);
			$xml=substr($web_descargada,$p,$f-$p);
			$xml='http://www.antena3.com/'.$xml;
			foreach(parseaXMLNormal($xml) as $individual)
				$obtenido['enlaces'][]=$individual;
		}
		elseif(enString($web_descargada, 'name="videoDataUrl" value="')){
			dbug('modo 2');
			$xml=entre1y2($web_descargada, 'name="videoDataUrl" value="', '"');
			$obtenido['enlaces'][]=parseaXMLNuevo($xml);
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
		$p=strposF($web_descargada,'.addVariable("xml","');
		$f=strpos($web_descargada,'"',$p);
		$xml=substr($web_descargada,$p,$f-$p);
		$xml='http://www.antena3.com'.$xml;
		foreach(parseaXMLNormal($xml) as $individual){
			$obtenido['enlaces'][]=$individual;
		}
	}

	if(!isset($titulo)||!isset($imagen)){
		dbug('xml='.$xml);
		//$retfull=CargaWebCurl($xml);

		//titulo
		if(!isset($titulo)){
			$p=strposF($xml_ret,'<nombre><![CDATA[');
			$f=strpos($xml_ret,']',$p);
			$titulo=substr($xml_ret,$p,$f-$p);

			if(stringContains($titulo,array('<','>'))){
				//<title>CarreraBarhein1 </title>
				$p=strposF($xml_ret,'<title>');
				$f=strpos($xml_ret,'<',$p);
				$titulo=substr($xml_ret,$p,$f-$p);
			}

			$titulo=limpiaTitulo($titulo);
		}
		
		dbug('titulo='.$titulo);

		if(!isset($imagen)){
			//imagen
			//<archivoMultimediaMaxi><archivo>clipping/2012/02/08/00127/30.jpg</archivo><alt></alt></archivoMultimediaMaxi>
			$p=strpos($xml_ret,'archivoMultimediaMaxi');
			$p=strposF($xml_ret,'A[',$p);
			$f=strpos($xml_ret,']',$p);
			$imagen=substr($xml_ret,$p,$f-$p);

			if(!enString($imagen,'antena3.com'))
				$imagen='http://www.antena3.com/'.$imagen;
		}
		dbug('imagen='.$imagen);
	}


	$obtenido['titulo']=$titulo;
	$obtenido['imagen']=$imagen;


	finalCadena($obtenido);
}

//modo= normal o multi
function parseaXMLNormal($url,$modo='normal'){
	dbug('xml='.$url);
	$xml=CargaWebCurl($url);
	
	global $xml_ret;
	if($xml_ret==''){
		dbug('xml_ret (url)='.$url);
		$xml_ret=$xml;
	}

	$p=strposF($xml,'<urlHttpVideo><![CDATA[');
	$f=strpos($xml,']]',$p);
	$ret2=substr($xml,$p,$f-$p);

	//fix para evitar geobloqueo.
	$ret2=strtr($ret2, array('geodesprogresiva'=>'desprogresiva'));

	$p=strpos($xml,'<archivoMultimedia>');
	$p=strposF($xml,'<archivo><![CDATA[',$p);
	$f=strpos($xml,']]',$p);
	$ret=substr($xml,$p,$f-$p);

	//$ret contiene el primer enlace. usandolo podemos saber si hay mas enlaces.
	//sacamos la extension de $ret y suponiendo que todas las partes tienen la misma extension
	//buscamos la existencia del mismo principio y aseguramos con el mismo final
	$p=strposF($ret,'.');
	$f=strlen($ret);
	$extension=substr($ret,$p,$f-$p);
	dbug('extensión: '.$extension);

	$lastpos=$f=strrpos($ret,'/',0)+1;
	$baselimpia=substr($ret,0,$f);


	$lastpos=$total=0;
	$i=1;
	$obtenidoT=array();
	while($total==0){
		$p=strpos($xml,'<archivoMultimedia>',$lastpos)+3;
		$lastpos=$f=strpos($xml,'archivoMultimedia',$p);
		$rettemp=substr($xml,$p,$f-$p);
		
		$p=strposF($rettemp,'<archivo><![CDATA[');
		$f=strpos($rettemp,']]',$p);
		$temp=$ret2.substr($rettemp,$p,$f-$p);
		if(enString($temp,$extension)){
			if($modo=='multi'){
				$p=strposF($xml,'<nombre><![CDATA[');
				$f=strpos($xml,']',$p);
				$urltxt=substr($xml,$p,$f-$p);
				if(stringContains($urltxt,array('<','>'))){
					//<title>CarreraBarhein1 </title>
					$p=strposF($xml,'<title>');
					$f=strpos($xml,'<',$p);
					$urltxt=substr($xml,$p,$f-$p);
				}
				$urltxt=limpiaTitulo($urltxt);
			}
			else
				$urltxt='parte '.$i;
			dbug('url encontrada: '.$temp);
			if($extension=='f4v')
				$obtenidoT[]=array(
					'titulo' => 'El siguiente enlace no podrá reproducirse después de descargarlo porque está protegido con DRM.'
				);
			$obtenidoT[]=array(
				'url'     => $temp,
				'tipo'    => 'http',
				'url_txt' => $urltxt
			);
			
		}else
			$total=$i;

		$i++;
	}

	$retornar=array();

	if(count($obtenidoT)>1 && $extension!='f4v'){
		$retornar[]=array(
			'titulo' => 'En partes:'
		);
		foreach($obtenidoT as $individual)
			$retornar[]=$individual;

		//añadir la versión del vídeo completa. Gracias a doriape@gmail.com, creador de www.elbarco.tk y www.elbarcoxml.tk
		if($extension=='f4v')
			array_push($obtenidoT,array(
				'titulo' => 'El siguiente enlace no podrá reproducirse después de descargarlo porque está protegido con DRM.'
			));
		$retornar[]=array(
			'titulo' => 'Completo:',
			'url'    => 'rtmp://antena3tvfs.fplive.net/antena3mediateca/'.$baselimpia.'000.'.$extension,
			'tipo'   => 'rtmp',
		);
	}else{
		if($modo=='normal')
			unset($obtenidoT[0]['url_txt']);
		foreach($obtenidoT as $elem)
			$retornar[]=$elem;
	}
	return $retornar;
}

function parseaXMLNuevo(&$entrada){
	global $imagen;
	$ret_full = CargaWebCurl($entrada);
	dbug($ret_full);
	if($imagen == ''){
		$imagen = entre1y2($ret_full, '<background><![CDATA[',']]');
	}
	return array(
		'url'     => entre1y2($ret_full, '<videoSource><![CDATA[',']]'),
		'tipo'    => 'http',
		'url_txt' => entre1y2($ret_full, '<name><![CDATA[',']]')
	);
}

?>