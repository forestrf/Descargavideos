<?php
$busqueda_comillas = strtr($R['busqueda'], '"', '\\"');
?>

<style>
	.gsc-selected-option-container {
		min-width: 70px !important;
	}
	.gsc-control-cse, .gsc-control-cse .gsc-table-result {
		width: auto;
	}
	
	.g-boton-DV:hover {
		background-color: #fff;
		background-position: center -15px;
		color: #ed8d2d !important;
	}
	.g-boton-DV {
		background: url("/img/flecha.png") no-repeat scroll center 45px #ed8d2d;
		border-radius: 15px;
		color: #fff !important;
		display: inline-block;
		float: left;
		height: 70px;
		margin-right: 10px;
		padding: 10px 0 0;
		text-align: center;
		transition: all 0.3s ease 0s;
		width: 130px;
	}
	
	.busqueda {
		display: table;
		width: 100%;
		vertical-align: top;
		background-color: #fff;
	}
	.resultados_busqueda {
		display: table-cell;
		vertical-align: top;
	}
	
	.publi_busqueda {
		vertical-align: top;
		display: table-cell;
		height: 100%;
		width: 300px;
	}
</style>

<script>_gaq.push(["_trackEvent","Busqueda","Google","<?=$busqueda_comillas?>"]);</script>



<script>
	(function() {
		var cx = '008426668730285465985:ox6pywmjy6q';
		var gcse = document.createElement('script');
		gcse.type = 'text/javascript';
		gcse.async = true;
		gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        	'//www.google.com/cse/cse.js?cx=' + cx;
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(gcse, s);
	})();
</script>
<div class="busqueda">
	<div class="resultados_busqueda">
		<gcse:search safeSearch="true" newWindow="true" enableAutoComplete="true"></gcse:search>
	</div>

<div class="publi_busqueda">
	<?php echo getPubli('rascacielos');?>
</div>
</div>



<script>
	(function() {
		// esperar a que el buscador aparezca
		
		var div, input_text, button_search;
		
		function seteaVariablesBuscador() {
			div = document.getElementsByClassName('gsc-control-cse')[0].parentElement;
			input_text = div.getElementsByClassName('gsc-input').search;
			button_search = div.getElementsByClassName('gsc-search-button')[1];
			start();
		}
		
		function start() {
			input_text.click();
			input_text.value = "<?=$busqueda_comillas?>";
			button_search.click();
			
			// buscando, esperar resultados
			
			setInterval(reacondicionaResultados, 500);
		}
		
		function reacondicionaResultados() {
			var enlaces = document.getElementsByClassName('gsc-thumbnail-inside');
			if (!enlaces) return;
			
			for(var i = 0; i < enlaces.length; i++) {
				var a = enlaces[i].getElementsByTagName('a')[0];
				if (a.getAttribute("data-ctorig")) {
					// Es un enlace resultado
					
					var b = a.parentNode.parentNode;
					
					if (!a.reacondicionado) {
						b.parentNode.insertBefore(
							crel2('a', [
								'href', '/web/s/?web=' + encodeURIComponent(a.getAttribute("data-ctorig")),
								'class', 'g-boton-DV'
							], "Descargar con Descargavideos"),
							b
						);
						a.reacondicionado = true;
					}
				}
			}
		}
		
		
		
		function espera(condicion, callback, tiempo) {
			if (condicion()) {
				callback();
			} else {
				setTimeout(function(){espera(condicion, callback, tiempo)}, tiempo);
			}
		}
		
		
		espera(function(){
			return document.getElementsByClassName('gsc-control-cse').length > 0
		}, seteaVariablesBuscador, 500);
		
	})();
</script>