<?php include_once '../secundario/rtve.php'; $c=true?>

<table border=1><tr><td />
	<form method="post" action="">
	Texto plano:<br/><textarea name="a" cols="50" rows="5"><?php echo isset($_REQUEST["a"]) ? $_REQUEST["a"] : ''?></textarea>
	<br/><br/>
	Encriptado:<br/><textarea name="b" cols="50" rows="5"><?php echo encripta(isset($_REQUEST["a"]) ? $_REQUEST["a"] : '')?></textarea>
	<br/>
	<input type="submit" value="Encriptar">
	</form />
</td><td />

	<form method="post" action="">
	Encriptado:<br/><textarea name="c" cols="50" rows="5"><?php echo isset($_REQUEST["c"]) ? $_REQUEST["c"] : ''?></textarea>
	<br/><br/>
	Texto plano:<br/><textarea name="d" cols="50" rows="5"><?php echo desencripta(isset($_REQUEST["c"]) ? $_REQUEST["c"] : '')?></textarea>
	<br/>
	<input type="submit" value="Desencriptar">
	</form />
</td></tr></table /><br/>
</html />
