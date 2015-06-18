<div class="error_res"><?php echo $R['error_texto'];?></div>

<?php
if($R['WEB'] !== '' && !defined('IGNORA_AVISO_RAPIDO')) include 'plantillas/extras/aviso_rapido_js.php'
?>

<script>_gaq.push(["_trackEvent","Descargas","Fallidas","Versión sin info extra"]);</script>