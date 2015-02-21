<?php
header('Content-Type: text/html; charset=UTF-8');

$db = new PDO('sqlite:avisos.sqlite');

$result = $db->query('SELECT * FROM avisos;');
if($result === false){
	$db->query('CREATE TABLE avisos (ID INTEGER PRIMARY KEY AUTOINCREMENT, url STRING, comentario STRING, ip STRING, referer STRING, useragent STRING, fecha DATETIME DEFAULT current_timestamp);');
	echo 'Recarga la página';
	exit;
}

if(isset($_GET['quitar'])){
	$db->query('DELETE FROM avisos WHERE ID = '.$_GET['quitar'].';');
	echo 'ID ',$_GET['quitar'],' quitado<br/>';
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
	echo '<a href="?debug_activar">Debug desactivado (Activar)</a><br/>';
}
else{
	echo '<a href="?debug_desactivar">Debug activado (Desactivar)</a><br/>';
}

?>

<a href="http://www.descargavideos.tv/cpanel" target="blank">CPanel DV</a><br/>
<a href="http://localhost/cpanel" target="blank">CPanel LH</a><br/>
<br/>
Util:<br/>
<a href="util/amf_base64.php" target="blank">amf_base64</a><br/>
<a href="util/prxy.php" target="blank">prxy</a><br/>
<a href="util/rtve_test.php" target="blank">rtve_test</a><br/>
<a href="util/mitele_test.php" target="blank">mitele_test</a><br/>
<a href="util/swf-resquests.php" target="blank">swf-resquests</a><br/>
<br/>
<table border="1">
	<tr>
		<?php
		include_once '../funciones.php';
		$proxyes = listado_proxys();
		foreach($proxyes as $proxy){
			echo '<td>'.$proxy['dominio'].'<br/><img style="background-color:#F00;width:30px;height:30px" src="http://'.$proxy['dominio'].'/favicon.ico"></td>';
		}
		?>
	</tr>
</table>
<br/>


<br/>
Avisos de fallos (rápido):<br/>
<table border="1">
	<tr>
		<th>
			Acciones
		</th>
		<th>
			URL
		</th>
		<th>
			Comentario
		</th>
		<th>
			IP
		</th>
		<th>
			Fecha
		</th>
		<th>
			Referer
		</th>
		<th>
			User-Agent
		</th>
	</tr>

<?php


$result = $db->query('SELECT * FROM avisos;');
foreach($result->fetchAll(PDO::FETCH_ASSOC) as &$elem){
	echo '<tr><td><a href="?quitar='.$elem['ID'].'">Quitar</a></td>',
		'<td><a target="blank" href="http://www.descargavideos.tv/?web='.urlencode($elem['url']).'">[DV]</a> <a target="blank" href="http://localhost/?web='.urlencode($elem['url']).'">[LH]</a> <a href="',$elem['url'],'">',$elem['url'],'</a></td>',
		'<td>',$elem['comentario'],'</td>',
		'<td>',$elem['ip'],'</td>',
		'<td>',$elem['fecha'],'</td>',
		'<td>',$elem['referer'],'</td>',
		'<td>',$elem['useragent'],'</td></tr>';
	//print_r($elem);
}
?>
</table>