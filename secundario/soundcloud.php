<?php
/*FALLA CON URLS RTMP
ejemplos:
	1 cancion
		http:
			https://soundcloud.com/aleksander-vinter/document-one-clap-savant-remix
		rtmp:
			https://soundcloud.com/skrillex/avicii-levels-skrillex-remix
	varias canciones:
		https://soundcloud.com/non-stop-8

arreglado por ahora:
1 cancion http
1 cancion rtmp
falta:
varias canciones rtmp
*/

class Soundcloud extends cadena{

function calcula(){
//soundcloud va a base de https, por lo que si alguna url http consigue llegar, toca pasarla a https
$this->web=strtr($this->web,array("http://"=>"https://"));
$retfull=CargaWebCurl($this->web);

$obtenido=array('enlaces' => array());

//<img class="waveform" src="http://w1.sndcdn.com/9y15N1tRAubf_m.png" unselectable="on" />

//detectar si hay varios enlaces o solo uno
$canciones=substr_count($retfull,'<img class="waveform"');
//dbug('total canciones='.$canciones);

$imagen='http://www.'.DOMINIO.'/canales/soundcloud.png';

//no sabemos cuantas queremos, pero es del modo nuevo y posiblemente varias.
if(enString($retfull,"Next SoundCloud")||true){
dbug('Next SoundCloud');
$client_id='b45b1aa10f1ac2941910a7f0d10f8e28';
/*
Lista de ids de clientes:
Plug.dj => bd7fb07288b526f6f190bfd02b31b25e
*/

$carga=CargaWebCurl('https://api.sndcdn.com/resolve?url='.$this->web.'&_status_code_map[302]=200&_status_format=json&client_id='.$client_id,
					'',0,'',array(),false);

dbug_($carga);

if(enString($carga,'tracks/')){
	//una cancion
	dbug('Una canción');

	//Descargar la web para comprobar título y si tiene descarga gratis
	$carga=CargaWebCurl(entre1y2($carga,'"location":"','"'));
	
	//comprobar si es stremeable. Si no lo es, fin del programa
	if(enString($carga,'<streamable type="boolean">false')){
		setErrorWebIntera('La descarga de esta canción está bloqueada.');
		return;
	}
	
	$p=strposF($carga,'<uri>');
	$p=strposF($carga,'tracks/',$p);
	$f=strpos($carga,'</',$p);
	$uri=substr($carga,$p,$f-$p);
	$url='http://api.soundcloud.com/tracks/'.$uri.'/stream?client_id='.$client_id;

	//titulo
	$titulo=entre1y2($carga,'<title>','</');

	if(enString($carga,"<artwork-url>"))
		$imagen=entre1y2($carga,'<artwork-url>','</');


	if(enString($carga,'<downloadable type="boolean">true'))
		$url='http://api.soundcloud.com/tracks/'.$uri.'/download?client_id='.$client_id;

	array_push($obtenido['enlaces'],array(
		'url'		=>	$url,
		'tipo'		=>	'http',
		'extension' =>	'mp3'
	));
	dbug($titulo.' - '.$url);
}
else{
	//varias canciones
	dbug('Varias canciones');
	//titulo generico
	$titulo="SoundCloud";

	//recortar web para sacar solo la id del user
	$f=strpos($this->web,'/',8);
	$f2=strpos($this->web,'/',$f+1);
	if($f2>0)
		$webMod=substr($this->web,0,$f2);
	else
		$webMod=$this->web;

	//https://api.sndcdn.com/resolve?url=https%3A//soundcloud.com/forestrf&_status_code_map[302]=200&_status_format=json&client_id=b45b1aa10f1ac2941910a7f0d10f8e28
	$id=CargaWebCurl('https://api.sndcdn.com/resolve?url='.$webMod.'&_status_code_map[200]=200&_status_format=json&client_id='.$client_id);
	dbug('user info='.$id);
	$p=strpos($id,'<id');
	$p=strposF($id,'>',$p);
	$f=strpos($id,'<',$p);
	$id=substr($id,$p,$f-$p);
	dbug('id='.$id);

	$stack=50;
	$maxResTotal=500;


	//likes
	//favorites
	//sounds
	//sets
	//playlists
	

	if(enString($this->web,'sets')||enString($this->web,'playlists')){
		$id=CargaWebCurl('https://api.soundcloud.com/resolve?url='.$this->web.'&_status_code_map[200]=200&_status_format=json&client_id='.$client_id,
		"",0,"",array(),false);
		$p=strposF($id,'playlists/');
		$f=strpos($id,'?',$p);
		$id=substr($id,$p,$f-$p);
		$tipoUrl=2;
	}elseif(enString($this->web,'likes')||enString($this->web,'favorites'))
		$tipoUrl=0;
	else
		$tipoUrl=1;

	$mult=0;
	$acabado=false;
	while(!$acabado&&$stack*$mult<=$maxResTotal){
		$resResD=$stack*$mult;

		if($tipoUrl==0)
			$carga=CargaWebCurl('http://api.soundcloud.com/users/'.$id.'/favorites.json?limit='.$stack.'&offset='.$resResD.'&client_id='.$client_id);
		elseif($tipoUrl==1)
			$carga=CargaWebCurl('http://api.soundcloud.com/users/'.$id.'/tracks.json?limit='.$stack.'&offset='.$resResD.'&client_id='.$client_id);
		elseif($tipoUrl==2)
			$carga=CargaWebCurl('http://api.soundcloud.com/playlists/'.$id.'.json?limit='.$stack.'&offset='.$resResD.'&client_id='.$client_id);


		if(enString($carga,'[{')){
			dbug('mult => '.$mult);
			$ronda=$ult=0;
			$carga=entre1y2($carga,'[{','}]');

			while(strpos($carga,'kind":"track"',$ult)>0&&$ronda<$stack){
				$ult=strpos($carga,'kind":"track"',$ult);


				if(entre1y2_a($carga,$ult,'"downloadable":',',')=="true")
					$modoUrl="download";
				else
					$modoUrl="stream";
				
				$tit=jsonRemoveUnicodeSequences(entre1y2_a($carga,$ult,'"title":"','"'));


				$p=strpos($carga,'"uri":"',$ult);
				$p=strposF($carga,'tracks/',$p);
				$f=strpos($carga,'"',$p);
				$f2=strpos($carga,'/',$p);
				if($f>$f2)$f=$f2;
				
				$url='http://api.soundcloud.com/tracks/'.substr($carga,$p,$f-$p).'/'.$modoUrl.'?client_id='.$client_id;

				dbug($tit.' - '.$url);
				//dbug($ult);
				array_push($obtenido['enlaces'],array(
					'url'   	=>	$url,
					'tipo'   	=>	'http',
					'extension' =>	'mp3',
					'url_txt'	=>	$tit
				));
				$ronda++;
				$ult++;
			}
			if($ronda==$stack)
				$mult++;
			else
				$acabado=true;
		}else
			$acabado=true;
	}
}

}

$obtenido['titulo']=$titulo;
$obtenido['imagen']=$imagen;

finalCadena($obtenido,false);
}

}
