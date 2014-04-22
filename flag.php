<?php

include_once 'funciones.php';

if(isset($_REQUEST['url'])){
	$db = new PDO('sqlite:cpanel/avisos.sqlite');

	$db->query('INSERT INTO avisos (url, ip) VALUES (\''.mysql_escape_mimic($_REQUEST['url']).'\', \''.$_SERVER['REMOTE_ADDR'].'\');');
}


echo ' ';
?>