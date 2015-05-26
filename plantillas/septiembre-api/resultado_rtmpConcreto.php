<?php
	$rtmpdump = $R2['dir_resultado_rtmpdump_manual'];
	if(!enString($R2['dir_resultado_rtmpdump_manual'], ' -o '))
		$rtmpdump .= ' -o "'.($R2['nombre_resultado_manual']? $R2['nombre_resultado_manual'] : 'video.mp4');
?>url: "<?=$rtmpdump?>";
