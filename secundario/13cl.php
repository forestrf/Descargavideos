<?php
function t13cl(){
global $web_descargada;


$url=entre1y2($web_descargada,'articuloVideo = "','"');

//image=http://mediateca.regmurcia.com/MediatecaCRM/ServletLink?METHOD=MEDIATECA%26accion=imagen%26id=10107
$imagen=entre1y2($web_descargada,'articuloImagen = "','"');

//&title=Metros cuadrados&
$titulo=entre1y2($web_descargada,'articuloTitulo = "','"');
$titulo=limpiaTitulo($titulo);


$obtenido=array(
	'titulo'      => $titulo,
	'imagen'      => $imagen,
	'enlaces' => array(
		array(
			'url'  => $url,
			'tipo' => 'http',
		)
	)
);

finalCadena($obtenido,true);
}
?>