<?php

class T13cl extends cadena{

function calcula(){
$url=entre1y2($this->web_descargada,'articuloVideo = "','"');

//image=http://mediateca.regmurcia.com/MediatecaCRM/ServletLink?METHOD=MEDIATECA%26accion=imagen%26id=10107
$imagen=entre1y2($this->web_descargada,'articuloImagen = "','"');

//&title=Metros cuadrados&
$titulo=entre1y2($this->web_descargada,'articuloTitulo = "','"');
$titulo=limpiaTitulo($titulo);


$obtenido=array(
	'titulo'      => $titulo,
	'imagen'      => $imagen,
	'enlaces' => array(
		array(
			'url'     => $url,
			'tipo'    => 'http',
			'url_txt' => 'Descargar'
		)
	)
);

finalCadena($obtenido,true);
}

}
