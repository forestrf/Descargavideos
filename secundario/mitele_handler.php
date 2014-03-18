<?php
include_once 'mitele.php';


if(isset($_GET['debug'])){
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	define("DEBUG",true);
}
else{
	error_reporting(0);
}

dbug('lanzando handler');
//if(enString($_SERVER["HTTP_REFERER"],"descargavideos"))


if(isset($_GET['fullinfo'])){
	$fullinfo = base64_decode($_GET['fullinfo']);
	$fullinfo = json_decode($fullinfo,true);
	//print_r($fullinfo);
	
	foreach($fullinfo as $key=>$value){
		$_GET[$key] = $value;
	}
}



if(isset($_GET['t5'])){
	if(isset($_GET['id'])&&isset($_GET['id2']))
		$res=mitele3($_GET['id'],$_GET['id2']);//telecinco/cuatro/divinity
	elseif(isset($_GET['id']))
		$res=mitele3($_GET['id'],'1.jpg');//telecinco/cuatro/divinity
	else
		$res='';
}
elseif(isset($_GET['kd'])){
	if(isset($_GET['id'])&&isset($_GET['id2']))
		$res=mitele4($_GET['id'],$_GET['id2']);//mitelekids
	elseif(isset($_GET['id']))
		$res=mitele4($_GET['id'],"");//mitelekids // no id2
	else
		$res='';
}
//Este imprime la url (rtmpdump comando) y sale.
elseif(isset($_GET['rtmp'])){
	if(isset($_GET['id'])){
		$res=mitele2($_GET['id'],"");//mitele para rtmp
		echo $res;
		exit;
	}
	else
		$res='';
}
else{
	if(isset($_GET['id']))
		$res=mitele8($_GET['id']);//mitele
	else
		$res='';
}
if(!defined("DEBUG")){
	if($res!=''){
		header('Content-Type: video/mp4');
		header('Location: '.$res);
	}
	else
		header('Location: http://www.'.Dominio.'/');
}
else
	dbug('redireccion: <a href="'.$res.'">'.$res.'</a>');
?>