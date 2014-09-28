<?php

require_once '../../funciones.php';

if(isset($_GET['web'])){
	echo CargaWebCurl($_GET['web']);
} else {
	?>
		<form method="GET" action="">
			<input type="text" name="web" placeholder="http://"/>
		</form>
	<?php
}
