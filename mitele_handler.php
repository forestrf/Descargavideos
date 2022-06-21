<?php
include_once 'definiciones.php';
include_once 'funciones.php';

echo "nope";
exit;

header("HTTP/1.1 302 Moved Temporarily");
header('Location: http://adf.ly/3649838/'.urlencode('http://www.descargavideos.tv'.$_SERVER['REQUEST_URI']));
