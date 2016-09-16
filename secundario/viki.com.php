<?php

/*
http://content.viki.com/1094955v/hlshd_900/index_1601210517.m3u8 -> 480p
http://content.viki.com/1094955v/hlshd_2000/index_1601210517.m3u8 -> 720p

"1080p","720p","480p","360p","270p","240p"


 public function streamType(param1:Object) : Array
{
 var _loc3_:* = null;
 var _loc2_:Array = new Array();
 for(_loc3_ in param1)
 {
	if(["rtmp","http","flv","youtube"].indexOf(_loc3_) > -1)
	{
	   _loc2_.push(_loc3_);
	}
 }
 return _loc2_;
}

dailymotionStream

BuiltInConfig
public class BuiltInConfig
{
public static const appVersion:String = "2.2.5.1470652168";
public static const appId:String = "65535a";
public static const appSecret:String = "-$iJ}@p7!G@SyU/je1bEyWg}upLu-6V6-Lg9VD(]siH,r.,m-r|ulZ,U4LC/SeR)";
}





protected static const httpUrl:String = "http://api.viki.io";
protected static const basePath:String = "/v4/";

buildGetUrl(param1.subPath, param1.options, param1.dataFormat);
private static function buildGetUrl(param1:String, param2:Object, param3:String) : String
{
 var _loc4_:String = buildPath(param1,param2,param3);
 return (!!isDev?devUrl:httpUrl) + _loc4_ + "&sig=" + buildGetSignature(_loc4_);
}

private static function buildGetSignature(param1:String) : String
{
 return HMAC.hash(appSecret,param1,SHA1);
}

private static function buildPath(param1:String, param2:Object, param3:String = "") : String
{
 var _loc4_:String = basePath + param1;
 if(param3 != "")
	_loc4_ += "." + param3;
 
 _loc4_ += "?app=" + appId + "&t=" + adjustedTimestamp().toString();
 if(param2 == null)
	param2 = {};
 
 if(site != null && site != "")
	param2.site = site;
 
 if(userToken != null && userToken != "")
	param2.token = userToken;
 
 for(var elem in param2)
	_loc4_ += "&" + elem + "=" + escape(param2[elem]);
 
 return _loc4_;
}





// http://api.viki.io/v4/videos/1094955v/streams.json?app=65535a&t=1473989927&site=www.viki.com&sig=4821512545515baab6b47a08a4a610144188ef58
// _lo4_ => /v4/videos/1094955v/streams.json?app=65535a&t=1473989927&site=www.viki.com

$data = '/v4/videos/'.$id.'/streams.json?app='.$appId.'&t='.time().'&site=www.viki.com';

$hmac = hash_hmac('sha1', $data, $appSecret);
dbug_($data);
dbug_($hmac);
*/

class vikiCOM extends cadena{

function calcula(){
	$appId = "65535a";
	$appSecret = '-$iJ}@p7!G@SyU/je1bEyWg}upLu-6V6-Lg9VD(]siH,r.,m-r|ulZ,U4LC/SeR)';
	
	
	
	$titulo = decode_entities(entre1y2($this->web_descargada, '<meta property="og:title" content="', '"'));
	$imagen = decode_entities(entre1y2($this->web_descargada, '<meta property="og:image" content="', '"'));
	dbug('titulo='.$titulo);
	dbug('imagen='.$imagen);
	
	$obtenido=array(
		'titulo'  => $titulo,
		'imagen'  => $imagen,
		'enlaces' => array()
	);
	
	if (preg_match('@/([0-9]+v)_([0-9]+)_@', $imagen, $matches)) {
		dbug_r($matches);
		$id = $matches[1];
		$extra = $matches[2];
		
		$options = array(
			// falta 1080p
			'hlshd_2000' => '720p',
			'hlshd_900' => '480p',
			'hls_640' => '360p'
		);
		
		foreach ($options as $option=>$quality) {
			$obtenido['enlaces'][] = array(
				'titulo'  => $quality,
				'url'     => 'http://content.viki.com/'.$id.'/'.$option.'/index_'.$extra.'.m3u8',
				'nombre_archivo' => generaNombreWindowsValido($titulo) . '.mp4',
				'tipo'    => 'm3u8'
			);
		}
		
		
		finalCadena($obtenido, false);
	}
}

}

?>