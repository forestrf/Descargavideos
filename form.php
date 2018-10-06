<?php

header('Content-Type: text/html; charset=UTF-8');
include_once 'definiciones.php';
include_once 'funciones.php';

//guardar en un txt el referer para saber que dominios tienen alojado el buscador.
/*
if(isset($_SERVER['HTTP_REFERER'])){
	$ref=$_SERVER['HTTP_REFERER'];
	if(!enString($ref,'descargavid.blogspot')&&!enString($ref,DOMINIO)){
		$archivo="form_donde.txt";
		if(!file_exists($archivo)){
			$fp=fopen($archivo,"a+");
			fclose($fp);
			chmod($archivo,0777);
		}
		$fp=fopen($archivo,"a+");
		fwrite(
			$fp,"\n".$ref
		);
		fclose($fp);
	}
}
*/


$largo = 300;
if (isset($_GET['l'])) {
	$lg = intval($_GET['l']);
	if (my_is_integer($lg))
		if ($lg > 100 && $lg < 9999)
			$largo = $lg;
		else
			$largo = 100;
}

$tamano = 'f2';
if (isset($_GET['t'])) {
	$tm = $_GET['t'];
	if ($tm == 'f1' || $tm == 'f2' || $tm == 'f3')
		$tamano = $tm;
}

$color='blanco';
if (isset($_GET['c'])) {
	$cl = $_GET['c'];
	if($cl == 'blanco' || $cl == 'negro')
		$color = $cl;
}


//return 1 = es num
function my_is_integer($val) {
	$val = str_replace(' ', '', trim($val));
	return preg_match('@^-?([0-9])+$@i', $val);
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="//<?php echo DOMINIO?>/css/form.min.css" />
<link rel="stylesheet" href="//<?php echo DOMINIO?>/css/reset.min.css" />
</head>
<body>
<div id="form_dv" style="width:<?=$largo?>px" class="<?=$tamano?> <?=$color?>">
	<form action="//<?php echo DOMINIO?>/web/iframeform/" method="post" target="_blank" name="formCalculador" id="formCalculador">
		<div class="fondo_input_web"><input type="text" name="web" id="web" class="entrada e" placeholder="Pega la URL del vídeo..." value="" title="URL a obtener"></div>
		<input type="submit" id="submit" value=" " class="boton b">
	</form>
</div>
</body>
</html>