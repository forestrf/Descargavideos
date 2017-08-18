<?php

include_once 'funciones.php';

if(isset($_POST['url'])){
	if(isset($_POST['comentario']) && $_POST['comentario'] !== 'Insertar comentario (indique su correo si es posible)...')
		$comentario = &$_POST['comentario'];
	else
		$comentario = '';
	
	$db = new PDO('sqlite:cpanel/avisos.sqlite');

	$db->query('INSERT INTO avisos (url, comentario, ip, referer, useragent) VALUES (\''.mysql_escape_mimic($_POST['url']).'\', \''.mysql_escape_mimic($comentario).'\', \''.$_SERVER['REMOTE_ADDR'].'\', \''.mysql_escape_mimic($_SERVER['HTTP_REFERER']).'\', \''.mysql_escape_mimic($_SERVER['HTTP_USER_AGENT']).'\');');
}
?> 