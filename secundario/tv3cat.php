<?php
function tv3cat(){
global $web,$web_descargada;
//$retfull=CargaWebCurl($web);

$obtenido=array(
	'enlaces' => array()
);

//http://www.tv3.cat/videos/188877281/Els-ajudants-del-pare-Noel#

//videos/188877281/

//http://www.tv3.cat/pvideo/FLV_bbd_dadesItem.jsp?idint=

if(enString($web,'http://www.tv3.cat/pprogrames/hd/mhdSeccio.jsp')){
	setErrorWebIntera('Los vídeos en HD pueden descargarse desde TV3.');
	return;
}

$id='';
if(enString($web_descargada,'arrayVideos = [')){
	$id=entre1y2($web_descargada, 'arrayVideos = [', ',');
	dbug('video de formato admitido en js. id video='.$id);
}
elseif(enString($web_descargada,'.videoid')){
	preg_match('@\.videoid[^0-9^;]+([0-9]+?);@', $web_descargada, $match);
	dbug_r($match);
	$id=$match[1];
	dbug('video de formato admitido en js (.videoid). id video='.$id);
}
else{
	//la id esta en la url
	$p=strrposF($web,'/videos/');
	$f=strrpos($web,'/',$p);
	if(!$f)
		$f=strlen($web);
	$id=substr($web,$p,$f-$p);
	if(stringContains($id,array(' ','<','>','/','.'))||$id==''){
		//la id esta en la url, o deberia, pero no esta como siempre. encontrar.
		$sujeto=$web;
		//$patron = '/\/[0-9^\/]*\//';
		$patron='|/([0-9]+)/|';
		preg_match_all($patron,$sujeto,$coincidencias,PREG_OFFSET_CAPTURE);
		
		dbug_r($coincidencias);
		
		$id=$coincidencias[1][0][0];
	}
	dbug('video de formato admitido? (en url): id video='.$id);
}

$tresalacarta=0;
if(stringContains($id,array(' ','<','>','/','.'))||$id==''){
	//3alacarta
	if(enString($web,'3alacarta')){
		dbug('3alacarta');
		
		$p=strpos($web,'/#/')+2;
		$id=substr($web,$p);
		$tresalacarta=1;
	}
}




if(stringContains($id,array('<','>','/','.'))||$id==''){
	$p=strpos($web_descargada,'<object');
	$id=entre1y2_a($web_descargada,$p,"id='EVP","'");

	$letras=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$id=str_replace($letras,'',strtoupper($id));
}






if(!is_numeric($id)||$id==''){
	$retfull_no_espacios=str_replace(' ', '', $web_descargada);
	
	//la id esta en el html
	//VIDEO_ID = 4018251;

	$p=strrposF($retfull_no_espacios,'VIDEO_ID=');
	$f=strpos($retfull_no_espacios,';',$p);
	$id=substr($retfull_no_espacios,$p,$f-$p);

	
	if(!is_numeric($id)||$id==''){
		//la id esta en el html
		//VIDEO_ID = 4018251;

		$p=strrposF($retfull_no_espacios,'videoid=');
		$f=strpos($retfull_no_espacios,'&',$p);
		$id=substr($retfull_no_espacios,$p,$f-$p);
		
		if(!is_numeric($id)||$id==''){
			$p=strrposF($retfull_no_espacios,'videoid=');
			$f=strpos($retfull_no_espacios,';',$p);
			$id=substr($retfull_no_espacios,$p,$f-$p);

			//echo '.'.$retfull_no_espacios.'.';

			if(!is_numeric($id)||$id==''){
				//<span class="id_video">3260890</span>

				$id=entre1y2($retfull_no_espacios, '<spanclass="id_video">', '</span>');

				if(!is_numeric($id)||$id==''){
					//<span> </span>
					$sujeto=$retfull_no_espacios;
					//$patron = '/\/[0-9^\/]*\//';
					$patron='|<span>([0-9]+)</span>|';
					preg_match_all($patron,$sujeto,$coincidencias,PREG_OFFSET_CAPTURE);
					dbug_r($coincidencias);

					$id=$coincidencias[1][0][0];


					if(!is_numeric($id)||$id==''){
						//<span class="id">3260890</span>

						$id=entre1y2($retfull_no_espacios,'<spanclass="id">','</span>');

						if(!is_numeric($id)||$id==''){
							//embedEVPLight(2692490,601)

							$id=entre1y2($retfull_no_espacios, 'embedEVPLight(', ',');

							if(!is_numeric($id)||$id=='')
								dbug('fallo');
						}
						else
							dbug('span class="id"');
					}
					else
						dbug('span');
				}
				else
					dbug('span class="id_video"');
			}
			else
				dbug('encontrado con videoid = ');
		}
		else
			dbug('encontrado con VIDEO_ID = ');
	}
	else
		dbug('encontrado con VIDEOID=...&');
	
	
	dbug('video de formato admitido (en html): id video='.$id);
}
else
	dbug('id sacada con <object ... id="EVP..." -> id video='.$id);

if($id==''){
	//id no encontrada:
	//fallo url
	setErrorWebIntera('No se pudo encontrar la ID de ningún vídeo.');
	return;
}
/////////usa de estas dos dice que es un video de windows media player...
//playWMOVideoQualitat
//video-wmp

$modelo=0;
	
if(enString($web_descargada,'playWMOVideoQualitat')){
	$modelo=3;
	dbug('metodo 1');
	
	if($tresalacarta!=1){
		//titulo
		//<h1>Els ajudants del pare Noel</h1>
		$p=strrposF($web_descargada,'<h1>');
		$f=strrpos($web_descargada,'</h1>', $p);
		$titulo=substr($web_descargada, $p, $f-$p);
		$titulo=limpiaTitulo($titulo);
		dbug('titulo='.$titulo);
	}
	
	//http://www.tv3.cat/su/tvc/tvcConditionalAccess.jsp?ALTERNATE=YES&ID_BACKUP=&ID=188877281&QUALITY=A&FORMAT=WM
	
	$server2='http://www.tv3.cat/su/tvc/tvcConditionalAccess.jsp?ALTERNATE=YES&ID_BACKUP=&ID='.$id.'&QUALITY=A&FORMAT=WM';
	dbug('server2='.$server2);

	$ret=CargaWebCurl($server2);
	dbug('ahora='.$ret);


	///0/2/188877220.wmv
	$p=strrpos($ret,'!')+8;
	$f=strrpos($ret,'?',$p);
	$ret=substr($ret,$p,$f-$p);

	$p=strrposF($ret,'/');
	$ret=substr($ret,$p);


	dbug('final='.$ret);

	$f=strrpos($ret,'.',0);
	$ret2=substr($ret,0,$f);
	dbug('solonumeros='.$ret2);


	//http://flv-500.tv3.cat/g/tvcatalunya/0/2/188877220.wmv

	///$ret='http://flv-500.tv3.cat/g/tvcatalunya/'.$ret2[strlen($ret2)-1].'/'.$ret2[strlen($ret2)-2].'/'.$ret;

	// 4/09/2012 metodo rectificado
	$ret='http://podcast.tv3.cat/g/tvcatalunya/'.$ret2[strlen($ret2)-1].'/'.$ret2[strlen($ret2)-2].'/'.$ret;

	dbug('urlFinal='.$ret);
	
	$obtenido['enlaces'][] = array(
		'url'  => $ret,
		'tipo' => 'http'
	);
}


if(enString($web_descargada,'insertaEVP(')||$modelo==0){
	dbug('metodo 2');
	
	if($tresalacarta!=1){
		//titulo
		//<h1>Amb Fidel, passi el que passi</h1>
		$titulo=entre1y2($web_descargada, '<h1>', '</h1>');
		if(stringContains($titulo, array('<','>'))){
			$titulo=entre1y2($titulo, 'arrayTitol = ["', '"');
		} else {
			//imagen
			//'/multimedia/jpg/3/6/1336300867363.jpg'
			$p=strpos($web_descargada,"'/multimedia/")+1;
			$f=strpos($web_descargada,"'", $p);
			$imagen='http://www.tv3.cat'.substr($web_descargada, $p, $f-$p);
			dbug('imagen='.$imagen);
		}
		$titulo=limpiaTitulo($titulo);
		dbug('titulo='.$titulo);
	}
	
	//insertaEVP("flashcontent", flashvars, params, size );

	//http://www.tv3.cat/pvideo/FLV_bbd_media.jsp?ID=4048670&QUALITY=H&FORMAT=MP4

	$server2='http://www.tv3.cat/pvideo/FLV_bbd_dadesItem.jsp?idint='.$id;
	dbug('server2='.$server2);
	$ret=CargaWebCurl($server2);
	dbug('obtenido='.$ret);

	if(enString($ret,'<title>')){
		//rectificar titulo
		dbug('rectificar titulo');
		//<h1>Amb Fidel, passi el que passi</h1>
		$titulo=entre1y2($ret, '<title>', '</');
		$titulo=utf8_encode($titulo);
		$titulo=limpiaTitulo($titulo);

		dbug('nuevo titulo='.$titulo);
	}

	//<format>MP4GES</format>
	//PARA VIDEOS LIMITADOS
	//http://www.tv3.cat/pvideo/FLV_bbd_media.jsp?ID=3932951&QUALITY=H&FORMAT=MP4GES


	if(enString($ret,'<imgsrc>')&&!isset($imagen)){
		$p=strrposF($ret,'<imgsrc>');
		$f=strrpos($ret,'</imgsrc>',$p);
		$imagen=substr($ret,$p,$f-$p);
	}

	$formato='MP4';
	if(enString($ret,'<format>')){
		//ENCUENTRA EL PRIMERO EN LA LISTA; NO EL MEJOR
		dbug('formato encontrado');

		$p=strrposF($ret,'<format>');
		$f=strrpos($ret,'</format>',$p);
		$formato=substr($ret,$p,$f-$p);
	}

	$server3='http://www.tv3.cat/pvideo/FLV_bbd_media.jsp?'.'ID='.$id.'&QUALITY=H&FORMAT='.$formato;
	dbug('server3='.$server3);
	$server4='http://www.tv3.cat/pvideo/FLV_bbd_media.jsp?'.'ID='.$id.'&QUALITY=H&PROFILE=APPMOB&FORMAT='.$formato;
	dbug('server4='.$server4);

	$ret=CargaWebCurl($server4);
	dbug('obtenido=');
	dbug_($ret);

	if(enString($ret, 'err.service.expired')){
		setErrorWebIntera('El vídeo fue borrado de TV3');
		return;
	}
	elseif(enString($ret,'<media')){
		//a sacer el video. si falla la busqueda, entonces hay un error
		
		//<media videoname="La Costa Brava en caiac/Thalassa/13042012/BB_THALASS">
		//http://mp4-medium-dwn.media.tv3.cat/g/tvcatalunya/0/2/1394113435120.mp4
		//</media>
		$p=strrpos($ret,'<media');
		$ret=entre1y2_a($ret,$p,'>','<');
		if(enString($ret, 'mp4:') || enString($ret, 'http://')){
			dbug('urlFinal='.$ret);
			if(strpos($ret, 'rtmp://') === 0){
				$ret = preg_replace('@rtmp://.*?mp4:(.*?)$@', 'http://mp4-medium-dwn.media.tv3.cat/$1', $ret);
				dbug('urlFinal (mediante preg replace='.$ret);
			}
			
			$obtenido['enlaces'][] = array(
				'titulo'  => 'Calidad media',
				'url'  => $ret,
				'tipo' => 'http'
			);
		}
	}
	
	$ret=CargaWebCurl($server3);
	dbug('obtenido=');
	dbug_($ret);

	if(enString($ret,'<media')){
		//http://www.tv3.cat/feeds/videos/fitxaVideo.jsp?id=4874451&device=and-h&format=xml&version=1
		//a sacer el video. si falla la busqueda, entonces hay un error
		
		//<media videoname="La Costa Brava en caiac/Thalassa/13042012/BB_THALASS">
		//rtmp://mp4-500-str.tv3.cat/ondemand/mp4:g/tvcatalunya/2/2/1334322726322.mp4
		//</media>
		$p=strrpos($ret,'<media');
		$ret=entre1y2_a($ret,$p,'>','<');

		if(enString($ret, 'mp4:')){
			preg_match('@^(.*?/)(mp4:.*?)$@', $ret, $matches);
			dbug_r($matches);
			
			// 4/09/2012 metodo rectificado
			dbug('urlFinal='.$ret);
			
			$obtenido['enlaces'][] = array(
				'titulo'   => 'Calidad alta',
				'url'      => $ret,
				'rtmpdump' => '-r "'.$matches[1].'" -y "'.$matches[2].'" -o "'.generaNombreWindowsValido($titulo).'.mp4"',
				'tipo'     => 'rtmpConcreto',
				'extension'=>'mp4'
			);
		}
		else{
			// 2/06/2014
			dbug('urlFinal='.$ret);
			$ext = substr($ret,-3,3);
			
			$obtenido['enlaces'][] = array(
				'url'      => $ret,
				'rtmpdump' => '-r "'.$ret.'" -o "'.generaNombreWindowsValido($titulo).'.'.$ext.'"',
				'tipo'     => 'rtmpConcreto',
				'extension'=> '.'.$ext
			);
		}
	}
	
}

$tipo='http';
if(enString($ret,'rtmp'))
	$tipo='rtmp';

$obtenido['titulo'] = $titulo;
$obtenido['imagen'] = $imagen;


finalCadena($obtenido);
}
?>