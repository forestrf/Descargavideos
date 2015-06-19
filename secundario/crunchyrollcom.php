<?php

/*

Subtitulos
<subtitles><media_id>649575</media_id><subtitle id='107513' link='http://www.crunchyroll.com/xml/?req=RpcApiSubtitle_GetXml&amp;subtitle_script_id=107513' title='[English (US)] English (US)' user='aniplex' default='0' delay='0'/><subtitle id='107529' link='http://www.crunchyroll.com/xml/?req=RpcApiSubtitle_GetXml&amp;subtitle_script_id=107529' title='[Español] Español' user='mugenko' default='0' delay='0'/><subtitle id='107521' link='http://www.crunchyroll.com/xml/?req=RpcApiSubtitle_GetXml&amp;subtitle_script_id=107521' title='[Português (Brasil)] Português (Brasil)' user='Stipervetz' default='0' delay='0'/></subtitles>
http://www.crunchyroll.com/xml/?req=RpcApiSubtitle_GetXml&subtitle_script_id=107513

m3u8 => video_format=103 
rtmp => video_format=106 (Parece que cualquier videoformat vale

360p => video_quality=60
480p => video_quality=61

*/

class Crunchyrollcom extends cadena{

function calcula(){
	//$url = "http://www.crunchyroll.com/xml/?req=RpcApiVideoPlayer_GetStandardConfig&media_id={$id}&video_format={$format}&video_quality={$quality}&auto_play=1&aff=crunchyroll-website&show_pop_out_controls=1&pop_out_disable_message=Only+All-Access+Members+and+Anime+Members+can+pop+out+this+video.+Get+your+membership+today%21";
	
	if (POST_BM) {
		$ret = $this->web_descargada;
	} else {
		if (!enString($this->web_descargada, '"config_url":"')) {
			define('IGNORA_AVISO_RAPIDO', true);
			setErrorWebIntera(USE_BOOKMARKLET_2);
			return;	
		}
		
		$url = entre1y2($this->web_descargada, '"config_url":"', '"');
		$url = urldecode($url);
		
		/*
		$url = "http://www.crunchyroll.com/xml/?req=RpcApiVideoPlayer_GetStandardConfig&media_id=649575&video_format=106&video_quality=60&auto_play=1&aff=crunchyroll-website&show_pop_out_controls=1&pop_out_disable_message=Only+All-Access+Members+and+Anime+Members+can+pop+out+this+video.+Get+your+membership+today%21";
		$post = "current%5Fpage=http%3A%2F%2Fwww%2Ecrunchyroll%2Ecom%2Fkill%2Dla%2Dkill%2Fepisode%2D24%2Dpast%2Dthe%2Dinfinite%2Ddarkness%2D649575%3Fp480%3D1";
		$ret = CargaWebCurl($url, $post, 0, '', array('Content-type: application/x-www-form-urlencoded'));
		dbug_($ret);
		*/
		
		$post = "current%5Fpage=".urlencode($this->web);
		$ret = CargaWebCurl($url, $post, 0, '', array('Content-type: application/x-www-form-urlencoded'));
	}
	dbug_($ret);
	
	$titulo = entre1y2($ret, '<series_title>', '</').' - '.entre1y2($ret, '<episode_title>', '</');
	
	$obtenido = array(
		'titulo'  => $titulo,
		'imagen'  => entre1y2($ret, '<episode_image_url>', '</'),
		'enlaces' => array(
			array(
				'url'            => '-',
				'rtmpdump'       => '-r "'.entre1y2($ret, '<host>','</').'" '.
									'-y "'.entre1y2($ret, '<file>','</').'"',
				'nombre_archivo' => generaNombreWindowsValido($titulo).'.mp4',
				'tipo'           => 'rtmpConcreto',
				'extension'      => 'mp4'
			)
		)
	);
	
	finalCadena($obtenido);
}

function bookmarklet() {
	
	$url = entre1y2($this->web_descargada, '"config_url":"', '"');
	$url = urldecode($url);
	
	/*
	$url = "http://www.crunchyroll.com/xml/?req=RpcApiVideoPlayer_GetStandardConfig&media_id=649575&video_format=106&video_quality=60&auto_play=1&aff=crunchyroll-website&show_pop_out_controls=1&pop_out_disable_message=Only+All-Access+Members+and+Anime+Members+can+pop+out+this+video.+Get+your+membership+today%21";
	$post = "current%5Fpage=http%3A%2F%2Fwww%2Ecrunchyroll%2Ecom%2Fkill%2Dla%2Dkill%2Fepisode%2D24%2Dpast%2Dthe%2Dinfinite%2Ddarkness%2D649575%3Fp480%3D1";
	$ret = CargaWebCurl($url, $post, 0, '', array('Content-type: application/x-www-form-urlencoded'));
	dbug_($ret);
	*/
	
	$post = "current%5Fpage=".urlencode($this->web);
	
	return 'xhr("' . bm_scape($url) . '", "' . bm_scape($post) . '", function(data){lanzaDVform("' . bm_scape($this->web) . '", data);});';
}

}
