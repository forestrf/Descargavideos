<?php
header('Content-Type: text/html; charset=UTF-8');

$db = new PDO('sqlite:avisos.sqlite');

$result = $db->query('SELECT * FROM avisos;');
if($result === false){
	$db->query('CREATE TABLE avisos (ID INTEGER PRIMARY KEY AUTOINCREMENT, url STRING, ip STRING, fecha DATETIME DEFAULT current_timestamp);');
	echo 'Recarga la página';
	exit;
}

if(isset($_GET['quitar'])){
	$db->query('DELETE FROM avisos WHERE ID = '.$_GET['quitar'].';');
	echo 'ID ',$_GET['quitar'],' quitado<br>';
}

if(isset($_GET['debug_activar'])){
	setcookie('debug', '1', time() + 86400, '/');
	header('Location: .');
	exit;
}

if(isset($_GET['debug_desactivar'])){
	setcookie('debug', '', time() - 3600, '/');
	header('Location: .');
	exit;
}

if(!isset($_COOKIE['debug'])){
	echo '<a href="?debug_activar">Debug desactivado (Activar)</a><br>';
}
else{
	echo '<a href="?debug_desactivar">Debug activado (Desactivar)</a><br>';
}

?>


<br>
Avisos de fallos (rápido):<br>
<table border="1">
	<tr>
		<th>
			Acciones
		</th>
		<th>
			URL
		</th>
		<th>
			IP
		</th>
		<th>
			Fecha
		</th>
	</tr>

<?php


$result = $db->query('SELECT * FROM avisos;');
foreach($result->fetchAll(PDO::FETCH_ASSOC) as &$elem){
	echo '<tr><td><a href="?quitar='.$elem['ID'].'">Quitar</a></td>',
		'<td><a target="blank" href="http://www.descargavideos.tv/?web='.urlencode($elem['url']).'">[DV]</a> <a target="blank" href="http://localhost/?web='.urlencode($elem['url']).'">[LH]</a> <a href="',$elem['url'],'">',$elem['url'],'</a></td>',
		'<td>',$elem['ip'],'</td>',
		'<td>',$elem['fecha'],'</td><tr>';
	//print_r($elem);
}
?>
</table>