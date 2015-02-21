<?php
include_once '../../definiciones.php';
include_once '../../funciones.php';
include_once '../../secundario/cadena.class.php';
include_once '../../secundario/mitele.php';

define('DEBUG', true);

?>


<form method="post" action="">
	<textarea name="id" cols="50" rows="5"><?php echo isset($_POST["id"]) ? $_POST["id"] : ''?></textarea>
	<input type="submit" value="Encriptar y enviar">
</form />

<?php

$mitele = new Mitele();

if (isset($_POST['id'])) {
	dbug($mitele->mitele2($_POST['id']));
	dbug($mitele->mitele8($_POST['id']));
}
	