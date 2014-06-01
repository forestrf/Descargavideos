<?php

include_once 'funciones.php';

if(isset($_REQUEST['url'])){
	if(isset($_REQUEST['comentario']) && $_REQUEST['comentario'] !== 'Insertar comentario...')
		$comentario = &$_REQUEST['comentario'];
	else
		$comentario = '';
	
	$db = new PDO('sqlite:cpanel/avisos.sqlite');

	$db->query('INSERT INTO avisos (url, comentario, ip) VALUES (\''.mysql_escape_mimic($_REQUEST['url']).'\', \''.mysql_escape_mimic($comentario).'\', \''.$_SERVER['REMOTE_ADDR'].'\');');
}
?> 