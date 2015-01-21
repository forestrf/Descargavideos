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
		<LookAndFeel nonprofit="true">
			<Colors url="#FF6600" background="#000000" border="#FF00FF" title="#FF3300" text="#EEEEEE" visited="#663399" light="#FF0077"/>
		</LookAndFeel>
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