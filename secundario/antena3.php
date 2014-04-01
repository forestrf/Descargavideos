<?php
function a3(){
global $web,$web_descargada;

//$retfull=$ret=CargaWebCurl($web);

global $xml_ret;
$xml_ret="";

//video premium
if(enString($web_descargada,'<div class="premium">')){
	setErrorWebIntera("premium");
	return;
}

//varios vídeos a la vez
if(enString($web_descargada,'<div class="grid_12 carruContentDoble">')){
	setErrorWebIntera("full");
	return;
}

$obtenido=array();
$obtenido['enlaces']=array();

$formula1=false;
//formula 1
if(enString($web_descargada,"a3_gp_visor_player")){
	dbug('formula 1');
	$formula1=true;
	//titulo
	$p=strpos($web_descargada,"a3_gp_visor_title");
	$titulo="<a".entre1y2_a($web_descargada,$p,"<a","</a");
	$titulo=strip_tags($titulo);
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);
	
	$caps = entre1y2($web_descargada, "a3_gp_visor_menu", "</ul");
	for($i=0, $d=0; $visor=entre1y2_a($caps,$d,"href=","</li"), !enString($visor,"<li>"); $i++){
		//dbug($visor);
		
		$preUrl="http://www.antena3.com".entre1y2($visor,'"','"');
		dbug($preUrl);
		
		$nombreVisor=entre1y2($visor,">","<");
		dbug($nombreVisor);
		
		$preXML=CargaWebCurl($preUrl);
		$xmlID=entre1y2($preXML,"id_list=","&");
		
		$xml='http://www.antena3.com/gestorf1/xml_visor/'.$xmlID.'_playlist.xml';
		$xml_ret=CargaWebCurl($xml);
		
		$obtenido['enlaces'][] = array('titulo' => $nombreVisor);
		foreach(parseaXMLF1($xml_ret) as $a)$obtenido['enlaces'][]=$a;
		
		$d=strpos($caps, $visor)+1;
	}

	//No volvemos a descargar otra vez este xml gracias al cache de páginas cargadas
	$xmlN=intval(entre1y2($web_descargada,"id_list=","&"));
	$xml1='http://www.antena3.com/gestorf1/xml_visor/'.$xmlN.'_playlist.xml';
	$xml_ret1=CargaWebCurl($xml1);
	
	//Imagen
	$imagen=entre1y2($xml_ret1,"<picture>","<");
	dbug('imagen='.$imagen);

	$obtenido['titulo']=$titulo;
	$obtenido['imagen']=$imagen;

	
	dbug_r($obtenido);
}
//Resto de antena 3
else{
	//http://www.antena3.com/chapterxml//5/5271378/2012/02/16/00005.xml
	//http://www.antena3.com/videoxml/2/1324/1003569/1003570/2012/02/15/00044.xml
	//http://www.antena3.com/.../....xml
	if(enString($web_descargada,"xml='")){
		dbug("xml=' encontrado");

		if(enString($web_descargada,"mod_galeria_videos")){
			dbug("varios vídeos: mod_galeria_videos");
			
			$titulo="Grupo de vídeos de Antena 3";
			$imagen="/canales/a3.png";
			
			$p=strpos($web_descargada,"mod_galeria_videos");
			$f=strpos($web_descargada,"Video Siguiente",$p);
			$extracto=substr($web_descargada,$p,$f-$p);

			$ult=0;
			while(enString($extracto,"xml='",$ult)){
				$p=strpos($extracto,"xml='",$ult)+5;
				$ult=$f=strpos($extracto,"'",$p);
				$xml='http://www.antena3.com'.substr($extracto,$p,$f-$p);
				foreach(parseaXMLNormal($xml,"multi") as $individual)
					$obtenido['enlaces'][]=$individual;
			}
		}
		else{
			$p=strpos($web_descargada,"xml='")+5;
			$f=strpos($web_descargada,"'",$p);
			$xml=substr($web_descargada,$p,$f-$p);
			$xml='http://www.antena3.com'.$xml;
			foreach(parseaXMLNormal($xml) as $individual)
				$obtenido['enlaces'][]=$individual;
		}
	}
	elseif(enString($web_descargada,"modulo_central")){
		dbug('módulo central');
		$p=strpos($web_descargada,"modulo_central");
		$p=strpos($web_descargada,"player_capitulo.xml='",$p)+21; //devuelve sin /
		$f=strpos($web_descargada,'.xml',$p)+4;
		$xml=substr($web_descargada,$p,$f-$p);
		$xml='http://www.antena3.com/'.$xml;
		foreach(parseaXMLNormal($xml) as $individual)
			$obtenido['enlaces'][]=$individual;
	}elseif(enString($web_descargada,"playContainer")){
		dbug('playContainer');
		$p=strpos($web_descargada,"playContainer");
		$p=strpos($web_descargada,".xml='",$p)+6; //devuelve sin /
		$f=strpos($web_descargada,'.xml',$p)+4;
		$xml=substr($web_descargada,$p,$f-$p);
		$xml='http://www.antena3.com/'.$xml;
		foreach(parseaXMLNormal($xml) as $individual)
			$obtenido['enlaces'][]=$individual;
	}
	//.addVariable("xml"
	elseif(enString($web_descargada,'.addVariable("xml"')){
		dbug('.addVariable("xml"');
		$p=strpos($web_descargada,'.addVariable("xml","')+20;
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
			$p=strpos($xml_ret,"<nombre><![CDATA[")+17;
			$f=strpos($xml_ret,']',$p);
			$titulo=substr($xml_ret,$p,$f-$p);

			if(stringContains($titulo,array("<",">"))){
				//<title>CarreraBarhein1 </title>
				$p=strpos($xml_ret,"<title>")+7;
				$f=strpos($xml_ret,'<',$p);
				$titulo=substr($xml_ret,$p,$f-$p);
			}

			$titulo=limpiaTitulo($titulo);
		}
		
		dbug('titulo='.$titulo);

		if(!isset($imagen)){
			//imagen
			//<archivoMultimediaMaxi><archivo>clipping/2012/02/08/00127/30.jpg</archivo><alt></alt></archivoMultimediaMaxi>
			$p=strpos($xml_ret,"archivoMultimediaMaxi");
			$p=strpos($xml_ret,"A[",$p)+2;
			$f=strpos($xml_ret,']',$p);
			$imagen=substr($xml_ret,$p,$f-$p);

			if(!enString($imagen,"antena3.com"))
				$imagen='http://www.antena3.com/'.$imagen;
		}
		dbug('imagen='.$imagen);
	}


	$obtenido['titulo']=$titulo;
	$obtenido['imagen']=$imagen;
}

finalCadena($obtenido);
}

//!$formula1
//modo= normal o multi
function parseaXMLNormal($url,$modo="normal"){
	dbug('xml='.$url);
	$xml=CargaWebCurl($url);
	
	global $xml_ret;
	if($xml_ret==""){
		dbug("xml_ret (url)=".$url);
		$xml_ret=$xml;
	}

	$p=strpos($xml,'<urlHttpVideo><![CDATA[')+23;
	$f=strpos($xml,']]',$p);
	$ret2=substr($xml,$p,$f-$p);

	//fix para evitar geobloqueo.
	$ret2=strtr($ret2, array("geodesprogresiva"=>"desprogresiva"));

	$p=strpos($xml,"<archivoMultimedia>")+3;
	$p=strpos($xml,"<archivo><![CDATA[",$p)+18;
	$f=strpos($xml,']]',$p);
	$ret=substr($xml,$p,$f-$p);

	//$ret contiene el primer enlace. usandolo podemos saber si hay mas enlaces.
	//sacamos la extension de $ret y suponiendo que todas las partes tienen la misma extension
	//buscamos la existencia del mismo principio y aseguramos con el mismo final
	$p=strposF($ret,".");
	$f=strlen($ret);
	$extension=substr($ret,$p,$f-$p);
	dbug('extensión: '.$extension);

	$lastpos=$f=strrpos($ret,'/',0)+1;
	$baselimpia=substr($ret,0,$f);


	$lastpos=$total=0;
	$i=1;
	$obtenidoT=array();
	while($total==0){
		$p=strpos($xml,"<archivoMultimedia>",$lastpos)+3;
		$lastpos=$f=strpos($xml,'archivoMultimedia',$p);
		$rettemp=substr($xml,$p,$f-$p);
		
		$p=strpos($rettemp,"<archivo><![CDATA[")+18;
		$f=strpos($rettemp,']]',$p);
		$temp=$ret2.substr($rettemp,$p,$f-$p);
		if(enString($temp,$extension)){
			if($modo=="multi"){
				$p=strpos($xml,"<nombre><![CDATA[")+17;
				$f=strpos($xml,']',$p);
				$urltxt=substr($xml,$p,$f-$p);
				if(stringContains($urltxt,array("<",">"))){
					//<title>CarreraBarhein1 </title>
					$p=strpos($xml,"<title>")+7;
					$f=strpos($xml,'<',$p);
					$urltxt=substr($xml,$p,$f-$p);
				}
				$urltxt=limpiaTitulo($urltxt);
			}
			else
				$urltxt='parte '.$i;
			dbug('url encontrada: '.$temp);
			if($extension=="f4v")
				$obtenidoT[]=array(
					'titulo' => "El siguiente enlace no podrá reproducirse después de descargarlo porque está protegido con DRM."
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

	if(count($obtenidoT)>1 && $extension!="f4v"){
		$retornar[]=array(
			'titulo' => 'En partes:'
		);
		foreach($obtenidoT as $individual)
			$retornar[]=$individual;

		//añadir la versión del vídeo completa. Gracias a doriape@gmail.com, creador de www.elbarco.tk y www.elbarcoxml.tk
		if($extension=="f4v")
			array_push($obtenidoT,array(
				'titulo' => "El siguiente enlace no podrá reproducirse después de descargarlo porque está protegido con DRM."
			));
		$retornar[]=array(
			'titulo' => 'Completo:',
			'url'    => 'rtmp://antena3tvfs.fplive.net/antena3mediateca/'.$baselimpia.'000.'.$extension,
			'tipo'   => 'rtmp',
		);
	}else{
		if($modo=="normal")
			unset($obtenidoT[0]['url_txt']);
		foreach($obtenidoT as $elem)
			$retornar[]=$elem;
	}
	return $retornar;
}

function parseaXMLF1(&$entrada){
	$arrayR=array();
	$total=$lastpos=0;
	$i=1;
	while($total==0){
		$p=strpos($entrada,"<url>",$lastpos)+5;
		$lastpos=$f=strpos($entrada,'<',$p);
		$t=substr($entrada,$p,$f-$p);
		dbug('comprobar rtmp: '.$t);

		if(enString($t,'rtmp')){
			if(enString($t,'antena3video/'))
				$p=strpos($t,"antena3video/")+13;

			if(enString($t,'antena3mediateca/'))
				$p=strpos($t,'antena3mediateca/')+17;

			$f=strlen($t);
			//$t='http://desprogresiva.antena3.com/'.substr($t,$p,$f-$p);
			$t='http://deslasexta.antena3.com/'.substr($t,$p,$f-$p);
			$arrayR[]=array(
				'url'     => $t,
				'tipo'    => 'http',
				'url_txt' => 'parte '.$i
			);
			$i++;
		}
		else
			$total=$i;
	}
	return $arrayR;
}
?>