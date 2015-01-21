<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';

header ("Content-Type:text/xml");

require_once 'secundario/cadenas.php';

?>
<GoogleCustomizations>
	<CustomSearchEngine>
		<Title>Buscador Descargavideos</Title>
		<Description>Buscar enlace desde Descargavideos</Description>
		<Context>
			<BackgroundLabels>
				<Label name="todaslascadenas" mode="FILTER" />
			</BackgroundLabels>
		</Context>
	</CustomSearchEngine>
	<Annotations>
		<?php
			foreach($cadenas as $cadena) {
				foreach($cadena[0] as $dominio) {
					?>
					<Annotation about="http://<?=$dominio?>/*">
						<Label name="todaslascadenas"/>
					</Annotation>
					<?php
				}
			}
		?>
	</Annotations>

</GoogleCustomizations>