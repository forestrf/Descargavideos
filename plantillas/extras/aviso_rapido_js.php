<?php
	$web_escapado = strtr($R['WEB'], array('script'=>'','"'=>'\\"','\\'=>'\\\\'));
?>
<span id="informaFalloRapido" class="informaFalloRapido">Informar de resultado incorrecto</span>
<script>
	D.g('informaFalloRapido').onclick = function(){
		procesaPromptAvisoRapido(
			prompt("Está a punto de informar que hay un problema con el resultado para el siguiente enlace:\n<?php echo $web_escapado?>\n\nSe recomienda usar el formulario de contacto.\n\nDebe incluir un comentario junto al aviso (Si indica su correo electrónico podré contactarle de ser necesario):\n", "Insertar comentario...")
		);
	};
	
	function procesaPromptAvisoRapido(prmpt) {
		if(prmpt !== null) {
			if (prmpt != "Insertar comentario..." && prmpt != ""){
				xhr("/flag.php", 'url='+encodeURIComponent("<?php echo $web_escapado;?>")+'&comentario='+encodeURIComponent(prmpt),
					function() {
						alert('¡Gracias por el aviso!\nSu aviso ha sido agregado a la cola de errores exitosamente');
					},
					function() {
						procesaPromptAvisoRapido(
							prompt("No se pudo enviar el aviso pero puede reintentarlo si lo desea.\nA continuación puede editar el comentario y tratar de reenviarlo:\n", prmpt)
						);
					}
				);
			} else {
				alert('Aviso no enviado. Debe incluir un mensaje.');
			}
		}
	}
</script>