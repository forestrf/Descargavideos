<div class="txt_centrado">
	<?php echo TXT_INDICAR_BOTON_DONAR?><br/><br/>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="TWBMG8NXCKZJN">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
	</form>

	<br/><br/>
	<hr width="300">
	<?php echo TXT_AVISO_COMISIONES?><br/><br/>

	<?php echo TXT_TABLA_INTRO?><br/><br/>
	<table class="comparativa">
		<tr>
			<td><?php echo TXT_TABLA_I_DONADO?></td>
			<td><?php echo TXT_TABLA_I_RECIBIDO?></td>
			<td><?php echo TXT_TABLA_I_PAYPAL?></td>
		</tr>
		<tr>
			<td>1€</td>
			<td>0.62€</td>
			<td>0.38€</td>
		</tr>
		<tr>
			<td>2€</td>
			<td>1.58€</td>
			<td>0.42€</td>
		</tr>
		<tr>
			<td>5€</td>
			<td>4.48€</td>
			<td>0.52€</td>
		</tr>
		<tr>
			<td>10€</td>
			<td>9.31€</td>
			<td>0.69€</td>
		</tr>
	</table>
</div>