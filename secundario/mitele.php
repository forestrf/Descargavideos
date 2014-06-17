<?php
require 'crypto/aes.class.php';    // AES PHP implementation
require 'crypto/aesctr.class.php'; // AES Counter Mode implementation

function mitele_directo(){
	dbug('mitele_directo');
	global $web,$web_descargada;
	dbug('divinity, cuatro, telecinco o mitelekids');

	if(strlen($web_descargada) < 500){
		$retfull = CargaWebCurl($web);
	}
	else{
		$retfull = $web_descargada;
	}

	//titulo
	if(enString($web,"mitelekids")){
		$p=strposF($retfull,'chapter-title');
		$titulo=entre1y2_a($retfull,$p,">","</");
		$titulo=limpiaTitulo($titulo);
	}
	else{
		$p=strposF($retfull,'id="content');
		$p=strpos($retfull,'<h1',$p);
		$titulo=entre1y2_a($retfull,$p,'>','<');
		$titulo=limpiaTitulo($titulo);
	}
	$titulo = trim($titulo);
	if($titulo == ''){
		$titulo = entre1y2($retfull, '<title>', '<');
	}
	dbug('titulo='.$titulo);

	$preID=entre1y2($retfull,'class="videoEmbed"','Share');
	//dbug($preID);
	
	if(enString($retfull, 'MDS.embedObj(video, "')){
		$id=entre1y2($retfull,'MDS.embedObj(video, "','"');
		dbug('intento id 1: '.$id);
	}
	if(!isset($id)||stringContains($id,"<",">",";"," ")||!enString($id,'_')){
		$id=entre1y2($preID,"'videoId': '","'");
		dbug('intento id 2: '.$id);
	}
	if(stringContains($id,"<",">",";"," ")||!enString($id,'_')){
		$p=strpos($retfull,'MDSVID');
		$id=substr($retfull,$p,19);
		dbug('intento id 3: '.$id);
	}
	if(stringContains($id,"<",">",";"," ")||!enString($id,'_')){
		$p=strpos($preID,'MDSVID');
		$id=substr($preID,$p,19);
		dbug('intento id 4: '.$id);
	}
	
	dbug('id video='.$id);
	
	//imagen
	//Algo me dice que esto de la id de la imagen va muy a su bola, siendo necesario aleatoriamente por vídeo.
	$imagen=entre1y2($retfull,'<link rel="image_src" type="image/jpeg" href="','"');
	if(enString($retfull,"imageClippingId: '")){
		$iclip=entre1y2($retfull,"imageClippingId: '","'");
		dbug('id imagen='.$iclip);
	}
	else{
		$iclip="";
		dbug('no hay id imagen');
	}

	// Algunos vídeos son rtmp. Si se encuentra data video se puede mirar por adelantado si es rtmp y dar la respuesta conveniente.
	if(enString($retfull, 'data-video="')){
		$idCompleta = entre1y2($retfull, 'data-video="', '"');
		if(enString($idCompleta, 'rtmp')){
			// Es rtmp
			
			$obtenido=array(
				'titulo'  => $titulo,
				'imagen'  => $imagen,
				'enlaces' => array(
					finalCadenaMiteleRTMP($idCompleta, $titulo, 't5&')
				)
			);
			
			finalCadena($obtenido,0);
		}
	}
	else{
		//$xmlInfo = CargaWebCurl('http://www.telecinco.es/mdsvideo/config.xml?contentId='.$id.'&clippingId=1.jpg&clippingWidth=654&clippingHeight=371&clippingContentId='.$id.'&showTitle=0&showSummary=0&moduleId=&boardId=&boardVersionId=&hostname=www.telecinco.es');
		
		
		if(!enString($imagen, ".jpg") && !enString($imagen, ".png")){
			//Funciona con los dominios cuatro, mitelekids y telecinco.
			$imagen = 'http://telecincostatic-a.akamaihd.net/a_'.$id.'_1.png';
			//http://telecincostatic-a.akamaihd.net/a_MDSVID20140416_0177_9.png
		}
		
		$modo="t5=1";
		/*if(enString($web,"mitelekids"))
			$modo="kd=1";
		*/
		
		// $URLFINAL='/mitele_handler.php?t5=1&id='.$id.($iclip!=""?'&id2='.$iclip:"");
		$configs = array(
			"t5"=>"1",
			"id"=>$id
		);
		if($iclip!="")
			$configs["id2"] = $iclip;
		
		$URLFINAL = '/mitelehandler/'.urlencode(base64_encode(json_encode($configs))).'/'.urlencode(strtr($titulo,'/','-')).'.mp4';
		//$url='http://www.telecinco.es/mdsvideo/sources.json?contentId='.$id.'&clippingId='.$iclip.'&imageContentId='.$id;
		dbug($URLFINAL);
		$obtenido=array(
			'titulo'  => $titulo,
			'imagen'  => $imagen,
			'enlaces' => array(
				array(
					'url'  => $URLFINAL,
					'tipo' => 'http',
					'url_txt' => 'Descargar Vídeo'
				)
			)
		);
		
		finalCadena($obtenido,0);
	}
}

function mitele(){
	dbug('mitele');
	//web es la variable logal, no una de mitele().
	global $titulo,$imagen,$geoB,$web_descargada;

	// Comprobar si la página es una con portada del vídeo
	if(enString($web_descargada, 'class="Destacado-imagen"')){
		dbug('Web no final, con video en descatado. Usar ese vídeo.');
		$urlVideoEmbed = entre1y2_a($web_descargada, strpos($web_descargada, 'class="Destacado-imagen"'), 'href="', '"');
		if($urlVideoEmbed[0] === '/'){
			$urlVideoEmbed = 'http://www.mitele.es'.$urlVideoEmbed;
		}
		$web_descargada = CargaWebCurl($urlVideoEmbed);
	}

	//titulo
	$p=strpos($web_descargada,"<title>")+7;
	$f=strpos($web_descargada,'<',$p);
	$titulo=substr($web_descargada,$p,$f-$p);
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);


	//comprobar que no es premium
	if(enString($web_descargada,'<div class="videoEmbed">')){
		$p=strpos($web_descargada,'<div class="videoEmbed">');
		$f=strpos($web_descargada,'</div>',$p);
		$premium=substr($web_descargada,$p,$f-$p);
	
		//el video es premium. Dar error
		if(enString($premium,'<span class="premium">')){
			setErrorWebIntera('premium');
			return;
		}
	}

	$p=strpos($web_descargada,'class="videoEmbed"');
	$f=strpos($web_descargada,'>',$p);
	$resYa=substr($web_descargada,$p,$f-$p);
	if(enString($resYa,'data-video')){
		$preId = strtr(entre1y2($web_descargada, '"host":"','"'), array('\\'=>''));
		dbug('$preId = '.$preId);
		$preId = CargaWebCurl($preId);
		
		if(enString($preId, '<rtmp')){
			$id = entre1y2_a($preId,strpos($preId,'url',strpos($preId,'videoUrl')),'<![CDATA[',']]');
		}
		else{
			$id = entre1y2_a($preId,strpos($preId,'link',strpos($preId,'videoUrl')),'>','<');
		}
		dbug('$id = '.$id);
		
		//imagen
		$p=strpos($web_descargada,'class="videoEmbed"');
		$p=strpos($web_descargada,'<img src="',$p)+10;
		$f=strpos($web_descargada,'"',$p);
		$imagen=substr($web_descargada,$p,$f-$p);
		dbug('imagen='.$imagen);
		
		//$id=str_replace("/geo/","/nogeo/",$id);
		
		//comprobar si es rtmp
		$respuesta="";
		
		if(enString($id,'rtmp')){
			//$respuesta=mitele2($id);
			
			$obtenido=array(
				'titulo'  => $titulo,
				'imagen'  => $imagen,
				'enlaces' => array(
					finalCadenaMiteleRTMP($id, $titulo)
				)
			);
			
			finalCadena($obtenido,0);
		}
		else{
			$intentos = 10;
			while($respuesta=="" && $intentos-- > 0)
				$respuesta=mitele8($id);
				/*if($respuesta=="")
					if($geoB==-1){
						$id=str_replace("/nogeo/","/geo/",$id);
						$geoB=1;
					}*/
			
			//ESTO VA
			// $url='/mitele_handler.php?id='.$id;
			$configs = array(
				"id"=>$id
			);
			$url='/mitelehandler/'.urlencode(base64_encode(json_encode($configs))).'/'.urlencode(strtr($titulo,'/','-')).'.mp4';
			$obtenido=array(
				'titulo'  => $titulo,
				'imagen'  => $imagen,
				'enlaces' => array(
					array(
						'url'     => $url,
						'tipo'    => 'http',
						'url_txt' => 'Descargar Vídeo'
					)
				)
			);
			
			finalCadena($obtenido,0);
		}
	}
}

function mitele8($id){
	dbug('mitele8');
	$server3='http://token.mitele.es/';

	$ret=CargaWebCurlProxy($server3.'?id='.$id, "aleatorio");
	dbug('respuesta: '.$ret);
	
	$ret = strtr($ret, array('videoTokenizer(' => '', ');' => ''));
	
	dbug('respuesta: '.$ret);
	
	$ret = json_decode($ret, true);
	$ret = $ret['tokenizedUrl'];
	
	dbug('respuesta: '.$ret);
	
	if(enString($ret,"rtmpe://")){
		$modo=2;
	}
	else{
		$modo=1;
	}


	if($modo==1){
		//2011
		//aqui caen tmbn las respuestas fallidas
		dbug('lanzado modo 1');

		if(enString($ret,"http://")){
			//es correcta la respuesta
			dbug('respuesta correcta');
		}
		else $ret='';
	}

	if($modo==2){
		//2012
		dbug('lanzado modo 2');

		if(enString($ret,"decryption")||enString("Invalid request"))
			$ret='';
		else{
			$p=strrpos($ret,"mp4:");//+4;
			$f=strrpos($ret,"</file>");
			$p2=strrpos($ret,"rtmpe://")+8;
			$f2=strrpos($ret,"</stream>");
			$ret1=substr($ret,$p,$f-$p);
			$ret2=substr($ret,$p2,$f2-$p2);
			$ret='rtmpe://'.$ret2.'/'.$ret1;
			$ret=urldecode($ret);
		}
	}
	$ret=str_replace("amp;","",$ret);

	return $ret;
}

//0 si no se sabe si está geobloqueado. -1 si está bloqueado. 1 si está arreglado el bloqueo
$geoB=0;
function mitele2($id, $tokenN=1){
	dbug('mitele2');
	global $geoB;

	dbug($id);

	//$server3='http://servicios.telecinco.es/tokenizer/tk3.php?wget';
	//$server4='http://servicios.telecinco.es/tokenizer/tk4.php?wget';
	
	switch($tokenN){
		case 1:
		//default:
			$server2='http://token.mitele.es/clock.php';
			$server3='http://token.mitele.es/';
			$host='token.mitele.es';
		break;
		case 2:
			$server2='http://token.telecinco.es/clock.php';
			$server3='http://token.telecinco.es/';
			$host='token.telecinco.es';
		break;
	}
	//$server2= 'http://servicios.telecinco.es/tokenizer/clock.php';
	//el time del server es el mismo que el de clock de mitele.
	//Parece que ya no.
	// Pues creo que sí.
	$clock=time();
	//$clock=CargaWebCurl($server2);

	dbug('clock: '.$clock);

	$text=$clock.';'.$id.';0;0';
	$key='xo85kT+QHz3fRMcHMXp9cA';

	dbug('a encriptar: '.$text);
	$encriptado=AesCtr::encrypt($text,$key,256);
	$extra = 'hash='.urlencode($encriptado);
	
	$hders=array(
		'Host: '.$host,
		'Accept-Charset: ISO-8859-1,UTF-8;q=0.7,*;q=0.7',
		'Connection: close',
		'Accept-Language: de,en;q=0.7,en-us;q=0.3',
		'Content-type: application/x-www-form-urlencoded',
		'Referer: http://static1.tele-cinco.net/comun/swf/playerMitele.swf',
		'Content-length: '.strlen($extra)
	);
	
	$ret=CargaWebCurl($server3,$extra,0,'',$hders);
	dbug('respuesta: '.$ret);
	
	if(enString($ret,'rtmpe://'))
		$modo=2;
	else
		$modo=1;


	if($modo==1){
		//2011
		//aqui caen tmbn las respuestas fallidas
		dbug('lanzado modo 1');

		if(enString($ret,'http://')){
			//es correcta la respuesta
			dbug('respuesta correcta');
			
			$p=strpos($ret,'http://');
			$f=strpos($ret,'<',$p);
			$ret=substr($ret,$p,$f-$p);
			
			//arreglo para los videos que start= no tiene el 0
			if(enString($ret.'-','start=-')) $ret.='0';
			
			$ret=str_replace('amp;','',$ret);
		}
		else $ret='';
	}

	if($modo==2){
		//2012
		dbug('lanzado modo 2');

		$RTMPFile = 'mp4:'.entre1y2($ret,'>mp4:','</');
		$RTMPFile = htmlspecialchars_decode($RTMPFile);
		
		$RTMPStream = 'rtmpe://'.entre1y2($ret,'rtmpe://','</');
		
		$p=strposf($RTMPFile,'?');
		$f=strlen($RTMPFile);
		$RTMPAfterInterrogant=substr($RTMPFile,$p,$f-$p);
		
		
		dbug($RTMPFile);
		dbug($RTMPStream);
		dbug($RTMPAfterInterrogant);
		
		
		$ret = /*'rtmpdump*/' -r "'.$RTMPStream.'?'.$RTMPAfterInterrogant.'"'.
		' -y "'.$RTMPFile.'"'.
		' -o "test.mp4"';
		
		
		dbug("URL:\n\n".$ret."\n\n");
	}
	
	/*
	if($detalle=='perfect'){
		if($ret!=""){
			//comprobar $geoB=-1;
			if($geoB==0){
				dbug('url a comprobar: '.$ret);
				
				$context =
				array("http"=>
					array(
						"method" => "GET",
						"header" => "User-agent: Mozilla/5.0 (Windows NT 6.1; rv:11.0) Gecko/20100101 Firefox/11.0\r\n".
									"Connection: close\r\n".
									"Accept-Language: es-ES,es;en-US;en\r\n".
									"Accept-Encoding: deflate\r\n".
									"Accept: text/html,application/xhtml+xml,application/xml\r\n"
					)
				);
				$context = stream_context_create($context);
				
				$result = file_get_contents($ret, false, $context, 0, 500);

				dbug('resultado = '.$result);
				if(enString($result,'404')||enString($result,'401')){
					$geoB=-1;
					//está bloqueado
					$ret="";
				}
				else{
					$geoB=1;
				}
				$ret="";
			}
		}
	}
	*/
	return $ret;
}


//el mitele8 para cuatro, telecinco y otros, que también cambian pero no tan rápido.
function mitele3($id,$id2){
	dbug('mitele3');
	global $web;
	dbug('divinity, cuatro o telecinco en mitele 3');

	$url='http://www.telecinco.es/mdsvideo/sources.json?contentId='.$id.'&clippingId='.$id2.'&imageContentId='.$id;

	//$json=CargaWebCurl($url);
	$json=CargaWebCurl($url, 'ESP');
	dbug($json);
	$json=str_replace("\\","",$json);

	if(enString($json,".mp4?")){
		//retemos la url del video
		$p=strpos($json,"storage.telecinco.es");
		$f=strpos($json,'"',$p);
		$URLFINAL='http://'.substr($json,$p,$f-$p);
	}
	
	if(!isset($URLFINAL) || enString($URLFINAL,"({")){
		//retemos la url del video
		$p=strpos($json,"http");
		$f=strpos($json,'"',$p);
		$URLFINAL=substr($json,$p,$f-$p);
	}

	return $URLFINAL;
}

//el mitele8 para mitelekids. Usa mitele2
function mitele4($id){
	dbug('mitele4');
	global $web;
	dbug('mitelekids mitele 4');

	$url='http://www.mitelekids.es/mdsvideo/config.xml?hostname=www.mitelekids.es&contentId='.$id;

	$res=CargaWebCurl($url);
	$res=limpiaCDATAXML($res);

	if(enString($res,".mp4")){
		//retemos la id del vídeo
		$p=strpos($res,"videoUrl");
		$id=entre1y2_a($res,$p,"<link>","</link>");
		dbug($id);
		return mitele2($id);
	}
	return "";
}


function finalCadenaMiteleRTMP($id, $titulo, $extra=''){
	$url="http://".Dominio.'/mitele_handler.php?'.$extra.'rtmp&id='.$id;

	return array(
		'url'				=> ' ',
		'rtmpdumpHTTP'		=> $url,
		'tipo'				=> 'rtmpConcretoHTTP',
		'extension'			=> 'mp4',
		'nombre_archivo'	=> generaNombreWindowsValido($titulo).'.mp4'
	);
}
?>