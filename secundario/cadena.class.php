<?php

class cadena {
	var $web;
	var $web_descargada;
	var $web_descargada_headers;
	
	var $normal_desde_bookmarklet = false;
	
	function init(&$web, &$web_descargada, &$web_descargada_headers = array()) {
		$this->web = $web;
		$this->web_descargada = &$web_descargada;
		$this->web_descargada_headers = $web_descargada_headers;
	}
	
	function set_normal_desde_bookmarklet() {
		$this->normal_desde_bookmarklet = true;
	}
}
