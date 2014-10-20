<?php

class cadena {
	var $web;
	var $web_descargada;
	var $web_descargada_headers;
	
	function init(&$web, &$web_descargada, &$web_descargada_headers = array()) {
		$this->web = $web;
		$this->web_descargada = &$web_descargada;
		$this->web_descargada_headers = $web_descargada_headers;
	}
}
