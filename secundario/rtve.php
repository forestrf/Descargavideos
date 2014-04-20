<?php
function rtve(){
global $web,$web_descargada;
dbug('empezando RTVE');

//si no se pone / al final de un enlace que lo necesita, se arma parda. aplicar la / en caso de que se necesite.
/*$p=strrpos($web,"/");
if($p!=strlen($web)-1){
	$f=strlen($web);
	$analisis=substr($web,$p,$f-$p);
	if(!enString($analisis,"."))
		$web.='/';
}*/
	
//modo audio
//modo infantil
//modo alacarta
if(enString($web,"/audios/")){
	dbug('modo audio');
	//$retfull=CargaWebCurl($web);
	$audio=1;
}
elseif(enString($web,"/infantil/")){
	dbug('modo infantil');
	$p=strrposF($web,"/",strrposF($web,"/")-2-strlen($web));
	$f=strpos($web,"/",$p);
	$asset=substr($web,$p,$f-$p);
	dbug('asset='.$asset);
	
	if(!is_numeric($asset)){
		$preIDURL=entre1y2($web_descargada,"/#/",'"');
		dbug('preIDURL='.$preIDURL);
		$p=strpos($preIDURL,"/",strlen($preIDURL)-12);
		$asset=entre1y2_a($preIDURL,$p,"/","/");
		dbug('asset='.$asset);
	}
	
}
else{
	dbug('modo normal');
	//$retfull=CargaWebCurl($web);
	
	//assetID=974036_
	$asset = encuentraAssetEnContenido($web_descargada);
}


//audio
if(isset($audio)){
	dbug('audio');

	//file:'/resources/TE_SENTREN/mp3/0/3/1329728190030.mp3'
	
	//obtener url (boton descargar en pagina)
	$p=strpos($web_descargada,'class="download"');
	$p=strpos($web_descargada,'href="',$p)+6;
	$f=strpos($web_descargada,'"',$p);
	$ret='http://www.rtve.es'.substr($web_descargada,$p,$f-$p);


	if(enString($ret,".mp3"))
		dbug('El mp3 estaba en la web');
	else{
		dbug('toca sacar el audio por metodo nuevo');

		//$ret=assetdataid
		$p=strposF($web_descargada,'data-assetID="');
		$f=strpos($web_descargada,'_',$p);
		$asset=substr($web_descargada,$p,$f-$p);
		$ret=convierteID($asset,array('audio','video'));
		if($ret === false)
			return;
	}

	dbug('ret='.$ret);
}
//video
else{
	$ret=convierteID($asset);
	if($ret === false)
		return;
	dbug('ret='.$ret);
}

if(isset($asset)){
	//titulo
	$opciones=array("videos","audios");
	$sigue=0;
	
	$opciones_length=count($opciones);
	for($i=0;$i<$opciones_length&&!$sigue;$i++){
		$urlmedia='http://www.rtve.es/api/'.$opciones[$i].'/'.$asset.'/config/mmedia.json';
		dbug('urlmedia='.$urlmedia);
		$retmedia=CargaWebCurl($urlmedia);
		if(!enString($retmedia,"no existir")&&!enString($retmedia,"Informe de Error")&&strlen($retmedia)>0)
			$sigue=1;
	}
	if($sigue){
		$sustituir=array('\\"'=>"'");
		$retmedia=strtr($retmedia, $sustituir);
		$p=strpos($retmedia,'"title":"')+9;
		$f=strpos($retmedia,'"',$p);
		$titulo=substr($retmedia,$p,$f-$p);
		$titulo=limpiaTitulo($titulo);

		//imagen
		if(enString($retmedia,'"image":null')){
			$imagen="/canales/rtve.png";
			dbug('imagen null');
		}
		else{
			$p=strpos($retmedia,'"image":"')+9;
			$f=strpos($retmedia,'"',$p);
			$imagen=substr($retmedia,$p,$f-$p);
		}
	}
	else{
		$titulo="RTVE";
		$imagen="/canales/rtve.png";
	}
}
else{
	//titulo
	$p=strpos($web_descargada,'class="header"');
	$p=strpos($web_descargada,'titu',$p);
	$p=strpos($web_descargada,'>',$p)+1;
	$f=strpos($web_descargada,'<',$p);
	$titulo=substr($web_descargada,$p,$f-$p);
	$titulo=limpiaTitulo($titulo);
	
	//imagen
	$p=strpos($web_descargada,'imgPrograma');
	$p=strpos($web_descargada,'src="',$p)+5;
	$f=strpos($web_descargada,'"',$p);
	$imagen=substr($web_descargada,$p,$f-$p);
}
dbug('titulo='.$titulo);
dbug('imagen='.$imagen);


$obtenido=array(
	'titulo'  => $titulo,
	'imagen'  => $imagen,
	'enlaces' => array(
		array(
			'url'  => $ret,
			'tipo' => 'http'
		)
	)
);

finalCadena($obtenido);
}

function convierteID($asset,$modo=array('video','audio')){
	$ret="";
	$modo_length=count($modo);
	for($i=0;$i<$modo_length&&$ret=='';$i++){
		$codificado=$asset.'_banebdyede_'.$modo[$i].'_es';
		$codificado=encripta($codificado);
		$server5='http://ztnr.rtve.es/ztnr/res/'.$codificado;

		dbug('idasset web='.$server5);

		$ret=CargaWebCurl($server5);
		$ret=desencripta($ret);
		
		dbug($ret);
		if(enString($ret,"code='state-not-valid'")){
			$ret='';
			dbug('vídeo posíblemente borrado. Marcar error');
			setErrorWebIntera('El vídeo ya no está disponible en RTVE. Lo sentimos.');
			return false;
		}
		elseif(enString($ret, 'video-id-not-valid')){
			setErrorWebIntera("No se ha podido encontrar ningún vídeo.");
			return false;
		}
		else
			$ret='http://'.entre1y2($ret,'http://','<');
	}
	return $ret;
}

function encuentraAssetEnContenido($web_descargada){
	global $web;
	$asset = "Por rellenar";
	if(enString($web_descargada, "assetID=")){
		$asset=entre1y2($web_descargada,'assetID=','_');
	}
	dbug('asset, prueba 1: '.$asset);
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		$asset=substr($asset,1);
		dbug('asset, prueba 2: '.$asset);
	}
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		if(enString($web_descargada,'lass="imgT"')&&enString($web_descargada,'href="')){
			$p=strpos($web_descargada,'lass="imgT"');
			$asset=entre1y2_a($web_descargada, $p, 'href="', '"');
			dbug('extraer asset de url: '.$asset);
			
			if(enString($asset, '.shtml')){
				$assetW = CargaWebCurl($asset);
				dbug('lanzando encuentraAssetEnContenido() con el contenido de '.$asset);
				$asset = encuentraAssetEnContenido($assetW);
			}
			else{
				preg_match_all('@/(\d+)/@', $asset, $matches);
				$asset=$matches[1][0];
			}
			dbug('asset, prueba 3: '.$asset);
		}
		else
			dbug('asset, prueba 3. No se realiza.');
	}
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		preg_match_all('@DC.identifier" ?content="(\d+)"@', $web_descargada, $matches);
		$asset=$matches[1][0];
		dbug('asset, prueba 4: '.$asset);
	}
	if(stringContains($asset,array('"','{','}','<','>',' '))){
		preg_match_all('@/(\d+)/@', $web, $matches);
		$asset=$matches[1][0];
		dbug('asset, prueba 3 (de la url): '.$asset);
	}
	
	dbug('asset='.$asset);
	return $asset;
}

function encripta($que){
	$key='hul#Lost';
	$iv='12345678';
	$cipher=mcrypt_module_open(MCRYPT_BLOWFISH,'','ecb','');
	
	$modulo = strlen($que)%8;
	$completar = (8 - $modulo);
	$k = "";
	for($j = 0;$j<$completar;$j++){
		$k = $k.chr(7);
	}
	
	mcrypt_generic_init($cipher,$key,$iv);
	$encrypted=mcrypt_generic($cipher,$que.$k);
	mcrypt_generic_deinit($cipher);
	
	$encrypted=base64_encode($encrypted);
	$encrypted=strtr($encrypted,array('+'=>'-','/'=>'_'));
	
	return $encrypted;
}

//http://www.rtve.es/ztnr/decrypt.jsp
function desencripta($que){
	$key='hul#Lost';
	$iv='12345678';
	$cipher=mcrypt_module_open(MCRYPT_BLOWFISH,'','ecb','');
	
	mcrypt_generic_init($cipher,$key,$iv);
	$decrypted=mdecrypt_generic($cipher,b64d($que));
	mcrypt_generic_deinit($cipher);
	return $decrypted;
}

function b64d($encoded){
	$decoded="";
	$base64=strtr($encoded,'-_','+/');
	for($i=0;$i<ceil(strlen($base64)/64);$i++)
	   $decoded.=base64_decode(substr($base64,$i*64,64));
	return $decoded;
}
?>