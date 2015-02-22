<?php
header('Content-Type: text/html; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Origin: *');

include_once 'definiciones.php';
include_once 'funciones.php';
chdir('secundario');
include_once 'secundario/index.php';

dbug_r($R);
echo $R['BM2_JS'];
