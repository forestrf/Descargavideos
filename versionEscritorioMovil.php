<?php

include_once 'definiciones.php';

//necesario la variable modo y que haya referer
if(!isset($_GET['modo'])||!isset($_SERVER['HTTP_REFERER']))
	fin();


//necesario que el referer sea descargavideos o descargavid.blogspot
$ref=$_SERVER['HTTP_REFERER'];
$pag="";
if(
	strpos($ref,'http://'.DOMINIO)==0||
	strpos($ref,'http://www.'.DOMINIO)==0
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

//Cookie de sesion
if($modo == "escritorio"){
	setcookie("modoEscritorio", "1");
} else if($modo == "movil"){
	setcookie("modoEscritorio", "0");
}


if($pag==='descargavideos')
	fin($ref);
else
	fin();

function fin($url="asdf"){
	if($url=="asdf")
		$url = 'http://www.'.DOMINIO.'/';
	header('Location: '.$url);
	exit;
}
?>