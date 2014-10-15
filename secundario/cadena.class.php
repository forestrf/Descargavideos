<?php

class cadena {
	var $web;
	var $web_descargada;
	
	function init(&$web, &$web_descargada) {
		$this->web = $web;
		$this->web_descargada = &$web_descargada;
	}
}
