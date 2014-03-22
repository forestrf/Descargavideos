<?php

include_once 'definiciones.php';

//necesario la variable modo y que haya referer
if(!isset($_GET['modo'])||!isset($_SERVER['HTTP_REFERER']))
	fin();


//necesario que el referer sea descargavideos o descargavid.blogspot
$ref=$_SERVER['HTTP_REFERER'];
$pag="";
if(
	strpos($ref,'http://'.Dominio)==0||
	strpos($ref,'http://www.'.Dominio)==0
)
$pag='descargavideos';

if(
	strpos($ref,'http://descargavid.blogspot.com')==0||
	strpos($ref,'http://www.descargavid.blogspot.com')==0
)
$pag='blog_descargavideos';

if($pag=="")
	fin();

$modo=$_GET['modo'];

if($modo>=1 && $modo<=10){
	$expira=time() + (60 * 60 * 24 * 30 * 12);
	setcookie("Estilo_modo", $modo, $expira);
}

if($pag==='descargavideos')
	fin($ref);
else
	fin();

function fin($url="asdf"){
	if($url=="asdf")
		$url = 'http://www.'.Dominio.'/';
	header('Location: '.$url);
	exit;
}
?>