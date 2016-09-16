<?php

class Canalextremadura extends cadena{

function calcula(){
$obtenido=array('enlaces' => array());

if (preg_match_all('/([0-9]+)player"\)\.html\(\'[^\']/', $this->web_descargada, $matches_ids)) {
	dbug_r($matches_ids);
	
	if (preg_match_all('@[0-9]+Label">(.+?)<@', $this->web_descargada, $matches_titulos)) {
		dbug_r($matches_titulos);

		/*
		if (preg_match_all('@rtmp://.+\.(?:mp4|flv)@', $this->web_descargada, $matches)) {
			dbug_r($matches);
			array_push($obtenido['enlaces'],array(
				'titulo'  => 'Calidad Alta',
				'url'     => $matches[0],
				'tipo'    => 'rtmp'
			));
		}
		*/

		if (preg_match_all('@https?://(?!descargas).+\.(?:mp4|flv|mp3)@', $this->web_descargada, $matches_urls)) {
			dbug_r($matches_urls);
			
			for ($i = 0, $l = count($matches_titulos[1]); $i < $l; $i++) {
				array_push($obtenido['enlaces'],array(
					'url_txt'  => $matches_titulos[1][$i],
					'url'     => $matches_urls[0][$i],
					'tipo'    => 'http'
				));
			}
		}
	}
}

//<h1 class="title">Extremadura 2 (17/05/12)</h1>
if(enString($this->web_descargada, '<h1 class="title">')) {
	$titulo = entre1y2($this->web_descargada,'<h1 class="title">','</h1>');
} else {
	$titulo = entre1y2($this->web_descargada,'<title>','</');
}
$titulo = limpiaTitulo($titulo);
dbug('titulo='.$titulo);
$imagen = 'http://www.canalextremadura.es' . entre1y2($this->web_descargada, 'image: "', '"');
dbug('imagen='.$imagen);

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido);
}

}
