<?php

if(!isset($_GET['msg']))
	exit;

$msg = $_GET['msg'];

$key = "puessepavuestramerced";

if(isset($_GET['hex']))
	$hex = $_GET['hex']==1?true:false;



$hmac = bin2hex(custom_hmac('md5', $msg, $key, true));

header('Access-Control-Allow-Origin: http://atresplayer.com, http://www.atresplayer.com');


if(isset($_GET['ie8']))
	$ie8 = $_GET['ie8']==1?true:false;

if($ie8)
	echo 'omgggggggg("'.$hmac.'")';
else
	echo $hmac;
exit;



/*



$resp = loguear();


echo '{"hmac": "'.$hmac.'",'.
	'"JSESSIONID": "'.$resp['JSESSIONID'].'",'.
	'"rememberme": "'.$resp['rememberme'].'"'.
'}';




function loguear(){
	//Es necesario estar logueado. Loguear y recargar URL
	
	//https://servicios.atresplayer.com/j_spring_security_check
	
	$username = 'a5548307@drdrb.com';
	$password = '123456';
	
	$post = 'spring-security-redirect='.urlencode('http://www.atresplayer.com/').
	'&_spring_security_remember_me=on'.
	'&j_username='.urlencode($username).
	'&j_password='.urlencode($password);
	
	$loginURL = 'https://servicios.atresplayer.com/j_spring_security_check';
	

	$loginContent = CargaWebCurl($loginURL, $post, '', 1);
	//echo ($loginContent);
	

	
	preg_match("@Set-Cookie:.*?JSESSIONID=(.*?)(;|\r\n)@i", $loginContent, $matches);
	$JSESSIONID = $matches[1];
	

	
	preg_match("@Set-Cookie:.*?rememberme=(.*?)(;|\r\n)@i", $loginContent, $matches);
	$rememberme = $matches[1];
	
	return array('JSESSIONID'=>$JSESSIONID, 'rememberme'=>$rememberme);
}

function CargaWebCurl($url,$post="",$cookie="",$cabecera=0,$cabeceras=array()){
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:11.0) Gecko/20100101 Firefox/11.0");
	if($cookie!="")
		curl_setopt($ch,CURLOPT_COOKIE,$cookie);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	
	curl_setopt($ch,CURLOPT_HEADER,1);
	if(count($cabeceras)>0)
		curl_setopt($ch,CURLOPT_HTTPHEADER,$cabeceras);
	if($post!=""){
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
	}
	$t=curl_exec($ch);
	if(curl_errno($ch))
		echo curl_error($ch);

	$f=strposF($t,"\r\n\r\n");
	$cab=substr($t,0,$f-0);
	
	if($cabecera==0)
		$t=ReemplazaDeAPor($t,"HTTP",0,"\r\n\r\n","");
	curl_close($ch);
	return $t;
}

function strposF($donde,$que,$desde=0){
	return strpos($donde,$que,$desde)+strlen($que);
}




*/




function custom_hmac($algo, $data, $key, $raw_output = false)
{
    $algo = strtolower($algo);
    $pack = 'H'.strlen($algo('test'));
    $size = 64;
    $opad = str_repeat(chr(0x5C), $size);
    $ipad = str_repeat(chr(0x36), $size);

    if (strlen($key) > $size) {
        $key = str_pad(pack($pack, $algo($key)), $size, chr(0x00));
    } else {
        $key = str_pad($key, $size, chr(0x00));
    }

    for ($i = 0; $i < strlen($key) - 1; $i++) {
        $opad[$i] = $opad[$i] ^ $key[$i];
        $ipad[$i] = $ipad[$i] ^ $key[$i];
    }

    $output = $algo($opad.pack($pack, $algo($ipad.$data)));

    return ($raw_output) ? pack($pack, $output) : $output;
}


?>