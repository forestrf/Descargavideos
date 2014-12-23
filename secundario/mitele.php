<?php
require 'crypto/aes.class.php';    // AES PHP implementation
require 'crypto/aesctr.class.php'; // AES Counter Mode implementation

class Mitele extends cadena{

private $mitele_obtenido_alerta = 'Como norma general es necesario encontrarse en España para poder descargar de mitele. Si usted no se encuentra en España puede hacer uso del programa <a target="_blank" href="http://hola.org">hola.org</a> para simular que se encuentra en España.';

private function agregarAlertaMitele(&$obtenido) {
	if (comprobarPais() !== 'ES') {
		$obtenido['alerta_especifica'] = $this->mitele_obtenido_alerta;
	}
}

function mitele_directo(){
	dbug('mitele_directo');
	dbug('divinity, cuatro, telecinco o mitelekids');

	if(strlen($this->web_descargada) < 500){
		$retfull = CargaWebCurl($this->web);
	}
	else{
		$retfull = &$this->web_descargada;
	}

	//titulo
	if(enString($this->web,'mitelekids')){
		$p=strposF($retfull,'chapter-title');
		$titulo=entre1y2_a($retfull,$p,'>','</');
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
	if(!isset($id)||stringContains($id,'<','>',';',' ')||!enString($id,'_')){
		$id=entre1y2($preID,"'videoId': '","'");
		dbug('intento id 2: '.$id);
	}
	if(stringContains($id,'<','>',';',' ')||!enString($id,'_')){
		$p=strpos($retfull,'MDSVID');
		$id=substr($retfull,$p,19);
		dbug('intento id 3: '.$id);
	}
	if(stringContains($id,'<','>',';',' ')||!enString($id,'_')){
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
		$iclip='';
		dbug('no hay id imagen');
	}

	// Algunos vídeos son rtmp. Si se encuentra data video se puede mirar por adelantado si es rtmp y dar la respuesta conveniente.
	if(enString($retfull, 'data-video="')){
		$idCompleta = entre1y2($retfull, 'data-video="', '"');
	}
	if(isset($idCompleta) && enString($idCompleta, 'rtmp')){
		// Es rtmp
		
		$obtenido=array(
			'titulo'  => $titulo,
			'imagen'  => $imagen,
			'enlaces' => array(
				$this->finalCadenaMiteleRTMP($idCompleta, $titulo, 't5&')
			)
		);
		
		$this->agregarAlertaMitele($obtenido);
		
		finalCadena($obtenido,0);
	}
	else{
		//$xmlInfo = CargaWebCurl('http://www.telecinco.es/mdsvideo/config.xml?contentId='.$id.'&clippingId=1.jpg&clippingWidth=654&clippingHeight=371&clippingContentId='.$id.'&showTitle=0&showSummary=0&moduleId=&boardId=&boardVersionId=&hostname=www.telecinco.es');
		
		
		if(!enString($imagen, '.jpg') && !enString($imagen, '.png')){
			//Funciona con los dominios cuatro, mitelekids y telecinco.
			$imagen = 'http://telecincostatic-a.akamaihd.net/a_'.$id.'_1.png';
			//http://telecincostatic-a.akamaihd.net/a_MDSVID20140416_0177_9.png
		}
		
		$modo='t5=1';
		/*if(enString($this->web,'mitelekids'))
			$modo='kd=1';
		*/
		
		// $URLFINAL='/mitele_handler.php?t5=1&id='.$id.($iclip!=''?'&id2='.$iclip:'');
		$configs = array(
			't5'=>'1',
			'id'=>$id
		);
		if($iclip!='')
			$configs['id2'] = $iclip;
		
		$URLFINAL = 'http://www.'.DOMINIO.'/mitelehandler/'.urlencode(base64_encode(json_encode($configs))).'/'.urlencode(strtr($titulo,'/','-')).'.mp4';
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
		
		$this->agregarAlertaMitele($obtenido);
		
		finalCadena($obtenido,0);
	}
}

function calcula(){
	dbug('mitele');
	global $titulo,$imagen;

	// Comprobar si la página es una con portada del vídeo
	if(enString($this->web_descargada, 'class="Destacado-imagen"')){
		dbug('Web no final, con video en descatado. Usar ese vídeo.');
		$urlVideoEmbed = entre1y2_a($this->web_descargada, strpos($this->web_descargada, 'class="Destacado-imagen"'), 'href="', '"');
		if($urlVideoEmbed[0] === '/'){
			$urlVideoEmbed = 'http://www.mitele.es'.$urlVideoEmbed;
		}
		$this->web_descargada = CargaWebCurl($urlVideoEmbed);
	}

	//titulo
	$titulo=entre1y2($this->web_descargada,'<title>','<');
	$titulo=limpiaTitulo($titulo);
	dbug('titulo='.$titulo);


	//comprobar que no es premium
	if(enString($this->web_descargada,'<div class="videoEmbed">')){
		$premium=entre1y2($this->web_descargada,'<div class="videoEmbed">','</div>');
	
		//el video es premium. Dar error
		if(enString($premium,'<span class="premium">')){
			setErrorWebIntera('premium');
			return;
		}
	}
	
	$resYa=desde1a2($this->web_descargada,'class="videoEmbed"','>');
	if(enString($resYa,'data-video')){
		$preId = strtr(entre1y2($this->web_descargada, '"host":"','"'), array('\\'=>''));
		dbug('$preId = '.$preId);
		$preId = CargaWebCurl($preId);
		
		if (enString($preId, '<rtmp')) {
			$id = entre1y2_a($preId,strpos($preId,'url',strpos($preId,'videoUrl')),'<![CDATA[',']]');
		} else {
			$id = entre1y2_a($preId,strpos($preId,'link',strpos($preId,'videoUrl')),'>','<');
		}
		dbug('$id = '.$id);
		
		//imagen
		$p=strpos($this->web_descargada,'class="videoEmbed"');
		$imagen=entre1y2_a($this->web_descargada, $p, '<img src="', '"');
		dbug('imagen='.$imagen);
		
		//$id=str_replace('/geo/','/nogeo/',$id);
		
		//comprobar si es rtmp
		$respuesta='';
		
		if(enString($id,'rtmp')){
			//$respuesta=mitele2($id);
			
			$obtenido=array(
				'titulo'  => $titulo,
				'imagen'  => $imagen,
				'enlaces' => array(
					$this->finalCadenaMiteleRTMP($id, $titulo)
				)
			);
			
			$this->agregarAlertaMitele($obtenido);
			
			finalCadena($obtenido,0);
		}
		else{
			$intentos = 10;
			while($respuesta=='' && $intentos-- > 0)
				$respuesta=$this->mitele8($id);
				/*if($respuesta=='')
					if($geoB==-1){
						$id=str_replace('/nogeo/','/geo/',$id);
						$geoB=1;
					}*/
			
			//ESTO VA
			// $url='/mitele_handler.php?id='.$id;
			$configs = array(
				'id'=>$id
			);
			$url='http://www.'.DOMINIO.'/mitelehandler/'.urlencode(base64_encode(json_encode($configs))).'/'.urlencode(strtr($titulo,'/','-')).'.mp4';
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
			
			$this->agregarAlertaMitele($obtenido);
			
			finalCadena($obtenido,0);
		}
	}
}

function mitele8($id){
	dbug('mitele8');
	$server3='http://token.mitele.es/';

	$ret = CargaWebCurl($server3.'?id='.$id);
	dbug('respuesta: '.$ret);
	
	$ret = strtr($ret, array('videoTokenizer(' => '', ');' => ''));
	
	dbug('respuesta: '.$ret);
	
	$ret = json_decode($ret, true);
	$ret = $ret['tokenizedUrl'];
	
	dbug('respuesta: '.$ret);
	
	if (enString($ret,'rtmpe://')) {
		$modo = 2;
	} else {
		$modo = 1;
	}


	if ($modo === 1) {
		//2011
		//aqui caen tmbn las respuestas fallidas
		dbug('lanzado modo 1');

		if(enString($ret,'http://')){
			//es correcta la respuesta
			dbug('respuesta correcta');
		}
		else $ret='';
	} elseif ($modo === 2) {
		//2012
		dbug('lanzado modo 2');

		if(enString($ret,'decryption')||enString('Invalid request'))
			$ret='';
		else{
			$p=strrpos($ret,'mp4:');//+4;
			$f=strrpos($ret,'</file>');
			$p2=strrposF($ret,'rtmpe://');
			$f2=strrpos($ret,'</stream>');
			$ret1=substr($ret,$p,$f-$p);
			$ret2=substr($ret,$p2,$f2-$p2);
			$ret='rtmpe://'.$ret2.'/'.$ret1;
			$ret=urldecode($ret);
		}
	}
	$ret=str_replace('amp;','',$ret);

	return $ret;
}

//0 si no se sabe si está geobloqueado. -1 si está bloqueado. 1 si está arreglado el bloqueo
//$geoB=0;
function mitele2($id, $tokenN=1){
	dbug('mitele2');

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
	//$clock=time();
	$clock=CargaWebCurl($server2);

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
		'Referer: http://static1.tele-cinco.net/comun/swf/playerMitele.swf'/*,
		'Content-length: '.strlen($extra)*/
	);
	
	$ret=CargaWebCurl($server3,$extra,0,'',$hders);
	dbug('respuesta: '.$ret);
	
	if(enString($ret,'rtmpe://')) {
		//2012
		dbug('lanzado modo 2');

		$RTMPFile = 'mp4:'.entre1y2($ret,'>mp4:','</');
		$RTMPFile = htmlspecialchars_decode($RTMPFile);
		
		$RTMPStream = 'rtmpe://'.entre1y2($ret,'rtmpe://','</');
		
		$p=strposF($RTMPFile,'?');
		$RTMPAfterInterrogant=substr($RTMPFile,$p);
		
		
		dbug($RTMPFile);
		dbug($RTMPStream);
		dbug($RTMPAfterInterrogant);
		
		
		$ret = ' -r "'.$RTMPStream.'?'.$RTMPAfterInterrogant.'"'.
		' -y "'.$RTMPFile.'"'.
		' -o "test.mp4"';
		
		
		dbug("URL:\n\n".$ret."\n\n");
	} else {
		//2011
		//aqui caen tmbn las respuestas fallidas
		dbug('lanzado modo 1');

		if(enString($ret,'http://')){
			//es correcta la respuesta
			dbug('respuesta correcta');
			
			$ret=desde1a2($ret, 'http://', '<');
			
			//arreglo para los videos que start= no tiene el 0
			if(enString($ret.'-','start=-')) $ret.='0';
			
			$ret=str_replace('amp;','',$ret);
		}
		else $ret='';
	}
	
	return $ret;
}


//el mitele8 para cuatro, telecinco y otros, que también cambian pero no tan rápido.
function mitele3($id,$id2){
	dbug('mitele3');
	dbug('divinity, cuatro o telecinco en mitele 3');

	$url='http://www.telecinco.es/mdsvideo/sources.json?contentId='.$id.'&clippingId='.$id2.'&imageContentId='.$id;

	//$json=CargaWebCurl($url);
	$json=CargaWebCurlProxy($url, 'ESP');
	dbug_($json);
	$json=str_replace("\\",'',$json);

	if(enString($json,'.mp4?')){
		$URLFINAL='http://'.desde1a2($json,'storage.telecinco.es','"');
	}
	
	if(!isset($URLFINAL) || !enString($URLFINAL,'.mp4')){
		$URLFINAL=desde1a2($json,'http','"');
	}

	return $URLFINAL;
}

//el mitele8 para mitelekids. Usa mitele2
function mitele4($id){
	dbug('mitele4');
	dbug('mitelekids mitele 4');

	$url='http://www.mitelekids.es/mdsvideo/config.xml?hostname=www.mitelekids.es&contentId='.$id;

	$res=CargaWebCurl($url);
	$res=limpiaCDATAXML($res);

	if(enString($res,'.mp4')){
		//retemos la id del vídeo
		$p=strpos($res,'videoUrl');
		$id=entre1y2_a($res,$p,'<link>','</link>');
		dbug_($id);
		return $this->mitele2($id);
	}
	return '';
}


function finalCadenaMiteleRTMP($id, $titulo, $extra=''){
	$url='http://www.'.DOMINIO.'/mitele_handler.php?'.$extra.'rtmp&id='.$id;

	return array(
		'url'				=> ' ',
		'rtmpdumpHTTP'		=> $url,
		'tipo'				=> 'rtmpConcretoHTTP',
		'extension'			=> 'mp4',
		'nombre_archivo'	=> generaNombreWindowsValido($titulo).'.mp4'
	);
}

}
