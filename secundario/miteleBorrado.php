<?php

class Mitele extends cadena{

function mitele_directo(){
	$this->calcula();
}

function calcula(){
	header("HTTP/1.1 302 Found");
	header("Location: http://descargavid.blogspot.com.es/2015/03/telecinco-c-d.html");
	exit;
}

}
