<?php
function cadenaser(){
global $web,$web_descargada;
$retfull=$web_descargada;
//$retfull=CargaWebCurl($web);

$obtenido=array('enlaces' => array());

if(enString($retfull,'href="/escucha2/"')&&enString($retfull,'href="/lo-mas/">m'))
	$retfull=ReemplazaDeAPor($retfull,'href="/escucha2/"',0,'href="/lo-mas/">m',"");
	


//http://www.cadenaser.com/espana/articulo/rajoy-comparece-congreso-agosto/csrcsrpor/20130723csrcsrnac_4/Tes
if(enString($retfull,"playerConfig")){
	dbug("En la web oficial");
	$ret=entre1y2($retfull,"playerConfig","};");
	$ret=strtr($ret,array(" "=>"",'"'=>"'"));

	if(enString($ret,"srcHTML5:'"))
		$url=entre1y2($ret,"srcHTML5:'","'");
	else
		$url=entre1y2($ret,"src:'","'");

	//imagen
	$obtenido['imagen']='http://www.'.DOMINIO.'/canales/cadenaser.jpg';
	if(enString($ret, "poster:'")){
		dbug("imagen del vídeo");
		$imagenTemp = entre1y2($ret,"poster:'","'");
		if($imagenTemp != "")
			$obtenido['imagen']=$imagenTemp;
	}

	//titulo
	$obtenido['titulo']=utf8_encode(entre1y2($retfull,"<title>","<"));
	
		
	
	$obtenido['enlaces'][]=array(
			'url_txt' => "Descargar",
			'url'     => $url,
			'tipo'    => 'http'
		);
}

//http://www.cadenaser.com/espana/audios/antonio-alberca-ha-existido-parte-jaume-matas-delito-tipo/csrcsrpor/20130723csrcsrnac_24/Aes/
if(enString($retfull,"makePlayer")){
	dbug("Insertado");
		
	if(enString($retfull,'<li class="audios estirar">')){
		$li='<li class="audios estirar">';
		$ret='<li class="audios'.entre1y2($retfull,'<li class="audios',strrpos($retfull,"llévatelo</a></li>"));
		if(enString($ret,'<div id="lateral">'))
			$ret=entre1y2($ret,0,'<div id="lateral');
	}
	else{
		$li="<li>";
		$ret=entre1y2($retfull,'class="audios',strrpos($retfull,"llévatelo</a></li>"));
	}

	$players=substr_count($ret,"makePlayer");
	dbug("nº de makePlayers: ".$players);

	//titulo
	if(!isset($obtenido['titulo']))
		$obtenido['titulo']=utf8_encode(entre1y2($retfull,"<title>","<"));
	
	$ini=count($obtenido['enlaces']);
	for($i=0,$p=0;$i<$players;$i++){
		$resTemp=resuelvePlayer(entre1y2_a($ret,$p,$li,"</li>"));
		$obtenido['enlaces'][$ini+($players*2)-($i*2)-2]=$resTemp[0];
		$obtenido['enlaces'][$ini+($players*2)-($i*2)-1]=$resTemp[1];
		$p=strposF($ret,$li,$p);
	}

	//imagen
	if(!isset($obtenido['imagen']))
		$obtenido['imagen']="";
}



finalCadena($obtenido);
}

function resuelvePlayer($ret){//return -> agregar a obtenido>enlaces
	if(enString($ret,"urlHTML5:'http://"))
		$url=entre1y2($ret,"urlHTML5:'","'");
	else
		$url=entre1y2($ret,"href:'","'");
	
	//titulo
	$p=strposF($ret,"<a");
	$titulo=utf8_encode(strip_tags(entre1y2_a($ret,$p,">","</a")));
	return array(
		array(
			'titulo' => $titulo
		),
		array(
			'url_txt' => "Descargar",
			'url'     => $url,
			'tipo'    => 'http'
		)
	);
}
?>