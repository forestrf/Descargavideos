<?php

/*
Dominio(s)
PHP(s) a incluir
Class a crear
Función del objeto de la class a llamar en caso de llamar normal
Función del objeto de la class a llamar en caso de llamar por bookmarklet. Puede no tener
*/
$cadenas = array(
	array(
		array('rio2016.rtve.es'),
		array('rio2016.rtve.es.php'),
		'RtveRio2016',
		'Calcula'
	),
	array(
		array('rtve.es', 'tve.es'),
		array('rtve.php'),
		'Rtve',
		'calcula'
	)
	,array(
		array('canalriasbaixas.com', 'canalriasbaixas.tv'),
		array('canalriasbaixas.php'),
		'Canalriasbaixas',
		'calcula'
	)
	,array(
		array('univision.com'),
		array('univision.php'),
		'Univision',
		'calcula'
	)
	,array(
		array('uvideos.com'),
		array('univision.php'),
		'Univision',
		'calculaUVideos'
	)
	,array(
		array('univision.mobi'),
		array('univision.php'),
		'Univision',
		'calculaMovil'
	)
	,array(
		array('rtpa.es'),
		array('rtpa.php'),
		'Rtpa',
		'calcula'
	)
	,array(
		array('7rm.es','orm.es'),
		array('7rm.php'),
		'T7rm',
		'calcula'
	)
	,array(
		array('canalextremadura.es'),
		array('canalextremadura.php'),
		'Canalextremadura',
		'calcula'
	)
	,array(
		array('lasexta.com','antena3.com'),
		array('a3borrado.php'),
		'A3',
		'calcula'
	)
	,array(
		array('atresplayer.com'),
		array('a3borrado.php'),
		'Atresplayer',
		'calcula'
	)
	,array(
		array('cuatro.com','telecinco.es','divinity.es','mediaset.es','mitelekids.es'),
		array('miteleBorrado.php'),
		'Mitele',
		'mitele_directo'
	)
	,array(
		array('mitele.es'),
		array('miteleBorrado.php'),
		'Mitele',
		'calcula'
	)
	/*,array(
		array('gamespot.com'),
		array('gamespot.php'),
		'gamespot'
	)*/
	,array(
		array('soundcloud.com'),
		array('soundcloud.php'),
		'Soundcloud',
		'calcula'
	)
	,array(
		array('veoh.com'),
		array('veoh.php'),
		'Veoh',
		'calcula'
	)
	,array(
		array('tv3.cat','324.cat','esport3.cat','3xl.cat','super3.cat','ccma.cat','3cat.cat'),
		array('tv3cat.php'),
		'Tv3cat',
		'calcula'
	)
	,array(
		array('aragontelevision.es'),
		array('aragontv.php'),
		'Aragontv',
		'calcula'
	)
	,array(
		array('canalsuralacarta.es','canalsur.es','canalsurmas.es'),
		array('canalsuralacarta.php'),
		'Canalsuralacarta',
		'calcula'
	)
	,array(
		array('rtvcm.es'),
		array('rtvcm.php'),
		'Rtvcm',
		'calcula'
	)
	,array(
		array('rt.com'),
		array('rt.php'),
		'Rt',
		'calcula'
	)
	,array(
		array('vtelevision.es'),
		array('vtelevision.php'),
		'Vtelevision',
		'calcula'
	)
	,array(
		array('medici.tv'),
		array('medici.php'),
		'Medici',
		'calcula'
	)
	,array(
		array('goear.com'),
		array('goear.php'),
		'Goear',
		'calcula'
	)
	,array(
		array('canaldehistoria.es','canalhistoria.es'),
		array('canaldehistoria.php','adnstream.php','vimeo.php'),
		'Canaldehistoria',
		'calcula'
	)
	,array(
		array('adnstream.com'),
		array('adnstream.php'),
		'Adnstream',
		'calcula'
	)
	,array(
		array('crtvg.es'),
		array('crtvg.php'),
		'Crtvg',
		'calcula'
	)
	,array(
		array('xabarin.gal'),
		array('crtvg.php'),
		'Crtvg',
		'calculaXabarin'
	)
	,array(
		array('mtv.es'),
		array('mtves.php'),
		'Mtves',
		'calcula'
	)
	,array(
		array('eitb.com', 'eitb.eus'),
		array('eitb.php'),
		'Eitb',
		'calculacom'
	)
	,array(
		array('8tv.cat'),
		array('8tvcat.php'),
		'OchoTVcat',
		'calcula'
	)
	,array(
		array('eitb.tv'),
		array('eitb.php'),
		'Eitb',
		'calculatv'
	)
	/*
	,array(
		array('intereconomia.com','radiointereconomia.com'),
		array('intereconomia.php'),
		'Intereconomia',
		'calcula'
	)
	*/
	,array(
		array('vimeo.com'),
		array('vimeo.php'),
		'Vimeo',
		'calcula'
	)
	/*,array(
		array('grooveshark.com'),
		array('grooveshark.php'),
		'grooveshark'
	)*/
	,array(
		array('cope.es'),
		array('cope.php'),
		'Cope',
		'calcula'
	)
	,array(
		array('cadenaser.com'),
		array('cadenaser.php'),
		'Cadenaser',
		'calcula'
	)
	,array(
		array('televisa.com','esmas.com','lasestrellas.tv'),
		array('televisa.php'),
		'Televisa',
		'calcula'
	)
	,array(
		array('hogarutil.com', 'hogarmania.com'),
		array('hogarutil.php'),
		'Hogarutil',
		'calcula'
	)
	,array(
		array('telemadrid.es', 'telemadrid2020.es'),
		array('telemadrid.php'),
		'Telemadrid',
		'calcula'
	)
	,array(
		array('netd.com'),
		array('netdcom.php'),
		'Netdcom',
		'calcula'
	)
	,array(
		array('telefe.com'),
		array('telefe.php'),
		'Telefe',
		'calcula'
	)
	/*
	,array(
		array('toons.tv'),
		array('toonstv.php'),
		'Toonstv',
		'calcula'
	)
	*/
	,array(
		array('youtube.com'),
		array('youtube.php','youtubehelper.php'),
		'Youtubehelper',
		'calcula',
		'bookmarklet'
	)
	,array(
		array('youtu.be'),
		array('youtube.php','youtubehelper.php'),
		'Youtubehelper',
		'calcula_urlAcortada'
	)
	,array(
		array('tvmelilla.es'),
		array('tvmelilla.php', 'vimeo.php'),
		'Tvmelilla',
		'calcula'
	)
	,array(
		array('tune.pk'),
		array('tunepk.php'),
		'Tunepk',
		'calcula'
	)
	,array(
		array('ideal.es'),
		array('ideal.php'),
		'Ideal',
		'calcula'
	)
	/*
	,array(
		array('magnovideo.com'),
		array('magnovideo.php'),
		'magnovideo'
	)
	*/
	,array(
		array('vk.com'),
		array('vk.php'),
		'Vk',
		'calcula'
	)
	,array(
		array('played.to'),
		array('playedto.php'),
		'Playedto',
		'calcula'
	)
	,array(
		array('allmyvideos.net','allmyvideos.com'),
		array('allmyvideosnet.php'),
		'Allmyvideosnet',
		'calcula'
	)
	,array(
		array('dailymotion.com'),
		array('dailymotioncom.php'),
		'Dailymotioncom',
		'calcula',
		'bookmarklet'
	)
	,array(
		array('liveleak.com'),
		array('liveleak.php'),
		'Liveleak',
		'calcula'
	)
	,array(
		array('crunchyroll.com'),
		array('crunchyrollcom.php'),
		'Crunchyrollcom',
		'calcula',
		'bookmarklet'
	)
	,array(
		array('telemundo.com'),
		array('telemundocom.php'),
		'Telemundocom',
		'calcula'
	)
	,array(
		array('discoverymax.es','discoverymax.marca.com','dmax.marca.com'),
		array('discoverymaxes.php'),
		'Discoverymaxes',
		'calcula'
	)
	,array(
		array('13.cl'),
		array('13cl.php'),
		'T13cl',
		'calcula'
	)
	,array(
		array('disneychannel.es'),
		array('disneychannel.php'),
		'DisneyChannel',
		'calcula'
	)
	,array(
		array('twitch.tv'),
		array('twitchtv.php'),
		'Twitchtv',
		'calcula'
	)
	,array(
		array('canalplus.es'),
		array('canalpluses.php'),
		'Canalpluses',
		'calcula'
	)
	,array(
		array('arucitys.com'),
		array('arucityscom.php'),
		'Arucitys',
		'calcula'
	)
	,array(
		array('facebook.com'),
		array('facebookcom.php'),
		'Facebook',
		'calcula'
	)
	,array(
		array('ondaluz.tv'),
		array('ondaluztv.php'),
		'Ondaluztv',
		'calcula'
	)
	,array(
		array('mundofox.com', 'noticiasmundofox.com'),
		array('mundofoxcom.php'),
		'Mundofoxcom',
		'calcula'
	)
	,array(
		array('nbcuniverso.com', 'nbcuni.com'),
		array('nbcuniversocom.php'),
		'Nbcuniversocom',
		'calcula'
	)
	,array(
		array('cda.gob.ar'),
		array('cdagobar.php'),
		'Cdagobar',
		'calcula'
	)
	,array(
		array('bbc.com'),
		array('bbccom.php'),
		'Bbccom',
		'calcula'
	)
	,array(
		array('hamaika.eus'),
		array('hamaikaeus.php'),
		'HamaikaEUS',
		'calcula'
	)
	,array(
		array('viki.com'),
		array('viki.com.php'),
		'vikiCOM',
		'calcula'
	)
	,array(
		array('cmmedia.es'),
		array('cmmedia.es.php'),
		'CMMediaEs',
		'calcula'
	)
	,array(
		array('apuntmedia.es'),
		array('apuntmedia.es.php'),
		'APuntMediaEs',
		'calcula'
	)
	,array(
		array('players.brightcove.net'),
		array('players.brightcove.net.php'),
		'PlayersBrightcove',
		'calcula'
	)
);

include_once "cadenas2.php";
