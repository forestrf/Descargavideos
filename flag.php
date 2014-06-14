<?php

include_once 'funciones.php';

if(isset($_POST['url'])){
	if(isset($_REQUEST['comentario']) && $_POST['comentario'] !== 'Insertar comentario...')
		$comentario = &$_POST['comentario'];
	else
		$comentario = '';
	
	$db = new PDO('sqlite:cpanel/avisos.sqlite');

	$db->query('INSERT INTO avisos (url, comentario, ip, referer, useragent) VALUES (\''.mysql_escape_mimic($_POST['url']).'\', \''.mysql_escape_mimic($comentario).'\', \''.$_SERVER['REMOTE_ADDR'].'\', \''.$_SERVER['HTTP_REFERER'].'\', \''.$_SERVER['HTTP_USER_AGENT'].'\');');
}
?> 