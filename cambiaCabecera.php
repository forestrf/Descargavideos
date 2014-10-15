<?php

include_once 'definiciones.php';

//necesario la variable modo y que haya referer
if(!isset($_GET['modo'])||!isset($_SERVER['HTTP_REFERER']))
	exit;

//necesario que el referer sea descargavideos o descargavid.blogspot
$ref=&$_SERVER['HTTP_REFERER'];
if(
	strpos($ref,'http://'.DOMINIO)!=0&&
	strpos($ref,'http://www.'.DOMINIO)!=0&&
	strpos($ref,'http://descargavid.blogspot.com')!=0&&
	strpos($ref,'http://www.descargavid.blogspot.com')!=0
)
	exit;

if($_GET['modo']>=1 && $_GET['modo']<=10){
	setcookie('Estilo_modo', $_GET['modo'], time() + (60 * 60 * 24 * 30 * 12));
}

header('Location: /');


?>