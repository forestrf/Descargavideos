<?php

require_once 'SabreAMF/Message.php';

function brightcove_encode($string){
	$stream = new SabreAMF_OutputStream();
	$message = new SabreAMF_Message();
	$message->addBody($string);
	//$message->setEncoding(SabreAMF_Const::AMF3);
	$message->setEncoding(SabreAMF_Const::MIMETYPE);
	$message->serialize($stream);

	$data = $stream->getRawData();
	//strtr concierte de amf0 a amf3
	//return $data;
	
	//Arreglo para Google App Engine
	$data = strtr($data, array("\x7F"=>"\xFF"));
	
	
	return strtr($data,array("\x00\x00\x00\x00\x00\x01\x00"=>"\x00\x03\x00\x00\x00\x01\x00"));
}


function brightcove_decode($string){
	$stream = new SabreAMF_InputStream($string);
	$message = new SabreAMF_Message();
	$message->deserialize($stream);

	$t=$message->getBodies();
	
	return $t[0];
}

function brightcove_curl_web($url,$post){
	$r=array(
		"Connection: close",
		"Content-type: application/x-amf"
	);
	return CargaWebCurl($url,$post,0,"",$r);
}

?>