<?php
require 'crypto/aes.class.php';    // AES PHP implementation
require 'crypto/aesctr.class.php'; // AES Counter Mode implementation

function mitele_directo(){
	dbug('mitele_directo');
	global $web,$web_descargada;
	dbug('divinity, cuatro, telecinco o mitelekids');

	$retfull=$web_descargada;
	if(strlen($retfull)<500)
		$retfull=CargaWebCurl($web);

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
	dbug($preID);
	
	$id=entre1y2($retfull,'MDS.embedObj(video, "','"');
	if(stringContains($id,"<",">",";"," ")||!enString($id,'_'))
		$id=entre1y2($preID,"'videoId': '","'");
	if(stringContains($id,"<",">",";"," ")||!enString($id,'_')){
		$p=strpos($retfull,'MDSVID');
		$id=substr($retfull,$p,19);
	}
	if(stringContains($id,"<",">",";"," ")||!enString($id,'_')){
		$p=strpos($preID,'MDSVID');
		$id=substr($preID,$p,19);
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
	

	if(!enString($imagen, ".jpg") && !enString($imagen, ".png")){
		//Funciona con los dominios cuatro, mitelekids y telecinco.
		$imagen = 'http://www.telecinco.es///_'.$id.'_1.jpg';
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

function mitele(){
	dbug('mitele');
	//web es la variable logal, no una de mitele().
	global $titulo,$imagen,$geoB,$web_descargada;


	$retfull=$ret=$web_descargada;
	//$retfull=$ret=CargaWebCurl($web);

	//titulo
	$p=strpos($retfull,"<title>")+7;
	$f=strpos($retfull,'<',$p);
	$titulo=substr($retfull,$p,$f-$p);
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);


	//comprobar que no es premium
	$p=strpos($ret,'<div class="videoEmbed">');
	$f=strpos($ret,'</div>',$p);
	$premium=substr($ret,$p,$f-$p);

	//el video es premium. Dar error
	if(enString($premium,'<span class="premium">')){
		setErrorWebIntera('premium');
		return;
	}

	$p=strpos($ret,'class="videoEmbed"');
	$f=strpos($ret,'>',$p);
	$resYa=substr($ret,$p,$f-$p);
	if(enString($resYa,'data-video')){
		$p=strpos($resYa,'data-video="')+12;
		$f=strpos($resYa,'"',$p);
		$id=substr($resYa,$p,$f-$p);
		dbug($id);
		//imagen
		$p=strpos($ret,'class="videoEmbed"');
		$p=strpos($ret,'<img src="',$p)+10;
		$f=strpos($ret,'"',$p);
		$imagen=substr($ret,$p,$f-$p);
		dbug('imagen='.$imagen);
		
		//$id=str_replace("/geo/","/nogeo/",$id);
		
		//comprobar si es rtmp
		$respuesta="";
		
		if(enString($id,'rtmp')){
			//$respuesta=mitele2($id, "");
			
			$url="http://".Dominio.'/mitele_handler.php?rtmp&id='.$id;
			$obtenido=array(
				'titulo'  => $titulo,
				'imagen'  => $imagen,
				'enlaces' => array(
					array(
						'url'				=> ' ',
						'rtmpdumpHTTP'		=> $url,
						'tipo'				=> 'rtmpConcretoHTTP',
						'extension'			=> 'mp4',
						'nombre_archivo'	=> generaNombreWindowsValido($titulo).'.mp4'
					)
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
function mitele2($id,$detalle){
	dbug('mitele2');
	global $geoB;

	//$server3='http://servicios.telecinco.es/tokenizer/tk3.php?wget';
	//$server4='http://servicios.telecinco.es/tokenizer/tk4.php?wget';

	$server3='http://token.mitele.es/';
	//$server2= 'http://servicios.telecinco.es/tokenizer/clock.php';
	$server2='http://token.mitele.es/clock.php';
	//el time del server es el mismo que el de clock de mitele.
	//Parece que ya no.
	$clock=time();
	$clock=CargaWebCurl($server2);

	dbug('clock: '.$clock);

	$text="".$clock.";".$id.";0;0";
	$key='xo85kT+QHz3fRMcHMXp9cA';

	dbug('a encriptar: '.$text);
	$encriptado=AesCtr::encrypt($text,$key,256);
	$extra = "hash=".urlencode($encriptado);
	
	$ret=CargaWebCurlHeaders($server3, $extra);
	dbug('respuesta: '.$ret);
	
	if(enString($ret,"rtmpe://"))
		$modo=2;
	else
		$modo=1;


	if($modo==1){
		//2011
		//aqui caen tmbn las respuestas fallidas
		dbug('lanzado modo 1');

		if(enString($ret,"http://")){
			//es correcta la respuesta
			dbug('respuesta correcta');
			
			$p=strpos($ret,'http://');
			$f=strpos($ret,'<',$p);
			$ret=substr($ret,$p,$f-$p);
			
			//arreglo para los videos que start= no tiene el 0
			if(enString($ret.'-',"start=-")) $ret.="0";
			
			$ret=str_replace("amp;","",$ret);
		}
		else $ret='';
	}

	if($modo==2){
		//2012
		dbug('lanzado modo 2');

		$RTMPFile = "mp4:".entre1y2($ret,">mp4:","</");
		$RTMPFile = htmlspecialchars_decode($RTMPFile);
		
		$RTMPStream = "rtmpe://".entre1y2($ret,"rtmpe://","</");
		
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
	return $ret;
}


//el mitele8 para cuatro, telecinco y otros, que también cambian pero no tan rápido.
function mitele3($id,$id2){
	dbug('mitele3');
	global $web;
	dbug('divinity, cuatro o telecinco en mitele 3');

	$url='http://www.telecinco.es/mdsvideo/sources.json?contentId='.$id.'&clippingId='.$id2.'&imageContentId='.$id;

	$json=CargaWebCurl($url);
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
		return mitele2($id,'');
	}
	return "";
}


function CargaWebCurlHeaders($url,$extra=''){
	$hders=array(
		"Host: token.mitele.es",
		"Accept-Charset: ISO-8859-1,UTF-8;q=0.7,*;q=0.7",
		"Connection: close",
		"Accept-Language: de,en;q=0.7,en-us;q=0.3",
		"Content-type: application/x-www-form-urlencoded",
		"Referer: http://static1.tele-cinco.net/comun/swf/playerMitele.swf",
		"Content-length: ".strlen($extra),
	);
	return CargaWebCurl($url,$extra,0,"",$hders);
}
?>