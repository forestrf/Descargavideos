<?php
include_once '../../definiciones.php';
include_once '../../funciones.php';

define('DEBUG', true);

foreach ($cargawebcurl_proxyarray as $url) {
	?><a href="<?=$url?>"><?=$url?></a><br/><?php
}

?>

<form method="post" action="">
	WEB: <input type="text" name="web" size="50" value="<?php echo isset($_POST['web']) ? $_POST['web'] : 'http://...'?>"><br/>
	PAIS: <input type="text" name="pais" size="10" value="<?php echo isset($_POST['pais']) ? $_POST['pais'] : 'ESP'?>"><br/>
	<input type="submit" value="enviar">
</form />

<?php

if (isset($_REQUEST['web'])) {
	echo '<pre>';
	dbug(htmlentities(CargaWebCurlProxy($_REQUEST['web'], $_REQUEST['pais'])));
}
	