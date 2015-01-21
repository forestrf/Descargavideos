<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';

header ("Content-Type:text/xml");

require_once 'secundario/cadenas.php';

?>
<Annotations>
	<?php
		foreach($cadenas as $cadena) {
			foreach($cadena[0] as $dominio) {
				?>
				<Annotation about="*.<?=$dominio?>/*">
					<Label name="_cse_ox6pywmjy6q"/>
				</Annotation>
				<?php
			}
		}
	?>
</Annotations>
