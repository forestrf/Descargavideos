<?php

class CMMediaEs extends cadena{

/*
http://www.cmmedia.es/programas/tv/castilla-la-mancha-fin-de-semana/informativos-completos/1906
http://play.rtvcm.webtv.flumotion.com/play/player?pod=1906&player=8&explicit_campaign_id=3
Necesita referer

http://api.rtvcm.webtv.flumotion.com/config?r=1484525986672
r se puede ignorar, es un timestamp con 3 números más de precisión
{"timestamp": 1484525987, "version": "bellucci", "key": "bUxnVQrutS3eKugh"}

http://api.rtvcm.webtv.flumotion.com/pods/1906?extended=true
{
  "campaign": null,
  "total_rates": 0,
  "duration": 886,
  "thumbnail_url_static": "http://media0.ntt.webtv.flumotion.com/cust/rtvcm//outgoingimg/Sabado3.mp4/Sabado3.mp4-04.png",
  "video_image_url_static": "http://media0.ntt.webtv.flumotion.com/cust/rtvcm//outgoingimg/Sabado3.mp4/Sabado3.mp4-poster-04.png",
  "captions": [],
  "id": 1906,
  "title": "Sabado3.mp4",
  "tags": [],
  "highlighted": false,
  "unpublishDate": null,
  "description": "",
  "embeddable": true,
  "public_url": "",
  "publishDate": "2017-01-14 19:34:22",
  "credits": "",
  "onAirDate": null,
  "creationDate": "2014-11-02 15:45:26",
  "average_rate": 0.0,
  "name": "Sabado3.mp4",
  "ads_blocked": false,
  "uri": "sabado3mp4",
  "thumbnail_url": "http://api.rtvcm.webtv.flumotion.com/videos/1906/thumbnail.jpg?w=743074f7",
  "vtt_url": "http://media0.ntt.webtv.flumotion.com/cust/rtvcm//outgoingimg/Sabado3.mp4/Sabado3.mp4-seeking-description.vtt",
  "livestream": false,
  "video_image_url": "http://api.rtvcm.webtv.flumotion.com/videos/1906/poster.jpg?w=87f7f30e"
}


function(a, b, c, d, e) {
    var f = this,
        g = "9n1IzQrHUwy1uWha7haiuH4vhai1FUiuHY2w7qk4vK1FUO",
        h = "7haiuH4vhai1FUqk9nY2wOuH4v1IzQWK",
        i = "7haiuH4vhai1FU",

http://media0.ntt.webtv.flumotion.com/cust/rtvcm//static/angular-fmt/fmt-tpls.min.js?r=2.77.10
 var a = {
    api_key: f.config.apiKey,
    api_nonce: Math.floor(1e7 + 9e7 * Math.random()),
    api_referrer: f.config.apiReferrer,
    api_timestamp: Math.round((new Date).getTime() / 1e3) + f.config.timedelta
},
b = d.encodeQueryData(a) + g.replace(i, "") + h.replace(h, "");
return _.extend(a, {
    api_signature: CryptoJS.SHA1(b).toString()
})

api_signature = SHA1("api_key=bUxnVQrutS3eKugh&api_nonce=36270378&api_referrer=play.rtvcm.webtv.flumotion.com&api_timestamp=1484527150"."9n1IzQrHUwy1uWhaiuHY2w7qk4vK1FUO")




http://api.rtvcm.webtv.flumotion.com/pods/1906/streams?
	api_key=bUxnVQrutS3eKugh&
	api_nonce=74490166&
	api_referrer=play.rtvcm.webtv.flumotion.com&
	api_timestamp=1484525987&
	api_signature=f98927c020778c57c025f2b3aefbf2cc4b12797d
[
  {
    "mimetype": "video/mp4",
    "format": "mp4",
    "url": "http://lw.ondemand.rtvcm.flumotion.com/video/mp4/med/Sabado3.mp4",
    "bitrate": 750,
    "seekparam": "start",
    "expire": 886,
    "quality": "med"
  },
  {
    "mimetype": "video/mp4",
    "format": "mp4",
    "url": "http://lw.ondemand.rtvcm.flumotion.com/video/mp4/mobile/Sabado3.mp4",
    "bitrate": 350,
    "seekparam": "start",
    "expire": 886,
    "quality": "mobile"
  },
  {
    "mimetype": "video/mp4",
    "format": "mp4",
    "url": "http://lw.ondemand.rtvcm.flumotion.com/video/mp4/mini/Sabado3.mp4",
    "bitrate": 100,
    "seekparam": "start",
    "expire": 886,
    "quality": "mini"
  }
]
 */

function calcula(){
	//titulo
	$titulo = entre1y2($this->web_descargada, '<title>', '<');
	dbug('titulo='.$titulo);
	
	//imagen
	$imagen = entre1y2($this->web_descargada, 'property="og:image" content="', '"');
	dbug('imagen='.$imagen);
	
	//if (preg_match('@(https?://play\.rtvcm\.webtv\.flumotion\.com/play/player\?pod=([0-9]+).+?)"@', $this->web_descargada, $matches)) {
	if (preg_match('@(https?://cdnapi\.kaltura\.com/p/[0-9]+/sp/[0-9]+/embedIframeJs/uiconf_id/[0-9]+/partner_id/[0-9]+.+?)"@', $this->web_descargada, $matches)) {
		dbug_r($matches);
		$url1 = $matches[1];
		$ret1 = CargaWebCurl($url1, '', false, '', array('Referer: ' . $this->web));
		//dbug_($ret1);
		
		/*
		{
		    "playerConfig": {
		        "uiConfId": "39784151",
		        "widgetId": "_2288691",
		        "entryId": "0_hqo3hkzo",
		        "plugins": {
		            "topBarContainer": {
		                "plugin": true
		            },
		            "controlBarContainer": {
		                "plugin": true,
		                "hover": true
		            },
		            "scrubber": {
		                "plugin": true
		            },
		            "largePlayBtn": {
		                "plugin": true
		            },
		            "playHead": {
		                "plugin": true
		            },
		            "playPauseBtn": {
		                "plugin": true
		            },
		            "volumeControl": {
		                "showSlider": true,
		                "layout": "horizontal",
		                "pinVolumeBar": false,
		                "accessibleControls": false,
		                "accessibleVolumeChange": 0.1,
		                "plugin": true
		            },
		            "durationLabel": {
		                "plugin": true
		            },
		            "currentTimeLabel": {
		                "plugin": true
		            },
		            "keyboardShortcuts": {
		                "volumePercentChange": "0.1",
		                "shortSeekTime": "5",
		                "longSeekTime": "10",
		                "volumeUpKey": "38",
		                "volumeDownKey": "40",
		                "togglePlaybackKey": "32",
		                "shortSeekBackKey": "37",
		                "shortSeekForwardKey": "39",
		                "openFullscreenKey": "70",
		                "closeFullscreenkey": "27",
		                "gotoBeginingKey": "36",
		                "gotoEndKey": "35",
		                "longSeekForwardKey": "ctrl+39",
		                "longSeekBackKey": "ctrl+37",
		                "percentageSeekKeys": "49,50,51,52,53,54,55,56,57",
		                "plugin": true
		            },
		            "liveCore": {
		                "plugin": true
		            },
		            "liveStatus": {
		                "plugin": true
		            },
		            "liveBackBtn": {
		                "plugin": true
		            },
		            "fullScreenBtn": {
		                "plugin": true
		            },
		            "theme": {
		                "applyToLargePlayButton": true,
		                "buttonsSize": "12",
		                "buttonsColor": "rgba(138, 138, 138, 0.84)",
		                "buttonsIconColor": "rgb(255, 255, 255)",
		                "sliderColor": "rgb(79, 79, 79)",
		                "scrubberColor": "rgb(184, 53, 112)",
		                "controlsBkgColor": "rgb(135, 136, 138)",
		                "watchedSliderColor": "rgb(184, 53, 112)",
		                "bufferedSliderColor": "rgb(0, 0, 0)",
		                "timeLabelColor": "rgb(255, 255, 255)",
		                "buttonsIconColorDropShadow": false,
		                "plugin": true
		            },
		            "strings": {
		                "plugin": true,
		                "keyValuePairs": ""
		            },
		            "statistics": {
		                "plugin": true
		            },
		            "skipBtn": {
		                "label": "Saltar anuncio",
		                "skipOffset": "3",
		                "plugin": true
		            },
		            "doubleClick": {
		                "pauseAdOnClick": true,
		                "leadWithFlash": false,
		                "disableCompanionAds": false,
		                "htmlCompanions": "Comp_300x250:300:250;Comp_728x90:728:90",
		                "companionSizeCriteria": "SELECT_EXACT_MATCH",
		                "adsManagerLoadedTimeout": 5000,
		                "timeout": 5,
		                "plugin": true,
		                "prerollUrl": "http:\/\/es-sunicontent.videoplaza.tv\/proxy\/distributor\/v2?s=RTVCM&tt=p&rt=vast_2.0&rnd={random}&pf=fl_11",
		                "trackCuePoints": false
		            },
		            "qualitySettings": [],
		            "morePlugins": [],
		            "id3Tag": [],
		            "reportError": [],
		            "sideBarContainer": [],
		            "liveAnalytics": [],
		            "kAnalony": [],
		            "hlsjs": [],
		            "unMuteOverlayButton": [],
		            "kgitGuard": []
		        },
		        "uiVars": [{
		            "key": "autoPlay",
		            "value": true,
		            "overrideFlashvar": false
		        }, {
		            "key": "autoMute",
		            "value": false,
		            "overrideFlashvar": false
		        }, {
		            "key": "enableTooltips",
		            "value": true,
		            "overrideFlashvar": false
		        }, {
		            "key": "adsOnReplay",
		            "value": false,
		            "overrideFlashvar": false
		        }, {
		            "key": "EmbedPlayer.EnableMobileSkin",
		            "value": false,
		            "overrideFlashvar": false
		        }, {
		            "key": "localizationCode",
		            "value": "es",
		            "overrideFlashvar": false
		        }, {
		            "key": "disableEntryRedirect",
		            "value": true,
		            "overrideFlashvar": false
		        }],
		        "layout": {
		            "skin": "kdark"
		        },
		        "vars": {
		            "streamerType": "auto",
		            "autoPlay": true,
		            "autoMute": false,
		            "enableTooltips": true,
		            "adsOnReplay": false,
		            "EmbedPlayer.EnableMobileSkin": false,
		            "localizationCode": "es",
		            "disableEntryRedirect": true
		        }
		    },
		    "enviornmentConfig": {
		        "streamerType": "auto",
		        "autoPlay": true,
		        "autoMute": false,
		        "enableTooltips": true,
		        "adsOnReplay": false,
		        "EmbedPlayer.EnableMobileSkin": false,
		        "localizationCode": "es",
		        "disableEntryRedirect": true
		    },
		    "playerId": "kaltura_player_1496914486",
		    "skinResources": [{
		        "type": "css",
		        "src": "http:\/\/cdnapi.kaltura.com\/html5\/html5lib\/v2.62\/skins\/kdark\/css\/layout.css"
		    }, {
		        "type": "css",
		        "src": "http:\/\/cdnapi.kaltura.com\/html5\/html5lib\/v2.62\/skins\/kdark\/css\/icons.css"
		    }],
		    "apiFeatures": {
		        "entryRedirect": "1"
		    },
		    "entryResult": {
		        "meta": {
		            "mediaType": 1,
		            "conversionQuality": 8738071,
		            "sourceType": "1",
		            "searchProviderType": null,
		            "searchProviderId": null,
		            "creditUserName": null,
		            "creditUrl": null,
		            "mediaDate": null,
		            "dataUrl": "http:\/\/cdnapi.kaltura.com\/p\/2288691\/sp\/228869100\/playManifest\/entryId\/0_hqo3hkzo\/format\/url\/protocol\/http",
		            "flavorParamsIds": "0,487051,487061",
		            "plays": 6423,
		            "views": 12158,
		            "lastPlayedAt": 1509858009,
		            "width": 640,
		            "height": 360,
		            "duration": 2527,
		            "msDuration": 2527000,
		            "durationType": null,
		            "id": "0_hqo3hkzo",
		            "name": "Sabado2",
		            "description": null,
		            "partnerId": 2288691,
		            "userId": "batchUser",
		            "creatorId": "batchUser",
		            "tags": "limpio, 1505817870786",
		            "adminTags": null,
		            "categories": "Diarios>TV,Diarios",
		            "categoriesIds": "80617191,80617181",
		            "status": 2,
		            "moderationStatus": 6,
		            "moderationCount": 0,
		            "type": 1,
		            "createdAt": 1498722325,
		            "updatedAt": 1509805625,
		            "rank": 0,
		            "totalRank": 0,
		            "votes": 0,
		            "groupId": null,
		            "partnerData": null,
		            "downloadUrl": "http:\/\/cdnapi.kaltura.com\/p\/2288691\/sp\/228869100\/playManifest\/entryId\/0_hqo3hkzo\/format\/download\/protocol\/http\/flavorParamIds\/0",
		            "searchText": "_PAR_ONLY_ _2288691_ _MEDIA_TYPE_1|  Sabado2 limpio, 1505817870786 ",
		            "licenseType": -1,
		            "version": 0,
		            "thumbnailUrl": "http:\/\/cfvod.kaltura.com\/p\/2288691\/sp\/228869100\/thumbnail\/entry_id\/0_hqo3hkzo\/version\/100191",
		            "accessControlId": 2324701,
		            "startDate": null,
		            "endDate": null,
		            "referenceId": "Sabado2",
		            "replacingEntryId": null,
		            "replacedEntryId": null,
		            "replacementStatus": 0,
		            "partnerSortValue": 0,
		            "conversionProfileId": 8738071,
		            "redirectEntryId": null,
		            "rootEntryId": "0_hqo3hkzo",
		            "operationAttributes": [],
		            "entitledUsersEdit": "",
		            "entitledUsersPublish": "",
		            "entitledUsersView": "",
		            "capabilities": "",
		            "displayInSearch": 1
		        },
		        "contextData": {
		            "isSiteRestricted": false,
		            "isCountryRestricted": false,
		            "isSessionRestricted": false,
		            "isIpAddressRestricted": false,
		            "isUserAgentRestricted": false,
		            "previewLength": -1,
		            "isScheduledNow": true,
		            "isAdmin": false,
		            "streamerType": "hdnetworkmanifest",
		            "mediaProtocol": "http",
		            "storageProfilesXML": null,
		            "accessControlMessages": [],
		            "accessControlActions": [],
		            "flavorAssets": [{
		                "flavorParamsId": 487051,
		                "width": 640,
		                "height": 360,
		                "bitrate": 664,
		                "frameRate": 25,
		                "isOriginal": false,
		                "isWeb": true,
		                "containerFormat": "isom",
		                "videoCodecId": "avc1",
		                "status": 2,
		                "id": "1_dcsx9gia",
		                "entryId": "0_hqo3hkzo",
		                "partnerId": 2288691,
		                "version": "71",
		                "size": 204800,
		                "tags": "mobile,web,mbr,iphone,iphonenew",
		                "fileExt": "mp4",
		                "createdAt": 1506173047,
		                "updatedAt": 1509805624,
		                "deletedAt": null,
		                "description": "",
		                "partnerData": null,
		                "partnerDescription": null,
		                "actualSourceAssetParamsIds": null,
		                "language": "Undefined"
		            }, {
		                "flavorParamsId": 487061,
		                "width": 640,
		                "height": 360,
		                "bitrate": 964,
		                "frameRate": 25,
		                "isOriginal": false,
		                "isWeb": true,
		                "containerFormat": "isom",
		                "videoCodecId": "avc1",
		                "status": 2,
		                "id": "0_pwrino6w",
		                "entryId": "0_hqo3hkzo",
		                "partnerId": 2288691,
		                "version": "191",
		                "size": 287744,
		                "tags": "mobile,web,mbr,ipad,ipadnew,dash",
		                "fileExt": "mp4",
		                "createdAt": 1498722350,
		                "updatedAt": 1509805623,
		                "deletedAt": null,
		                "description": "audio warnings: 2106,#Redundant bitrate.\n",
		                "partnerData": null,
		                "partnerDescription": null,
		                "actualSourceAssetParamsIds": null,
		                "language": "Undefined"
		            }, {
		                "flavorParamsId": 0,
		                "width": 640,
		                "height": 360,
		                "bitrate": 1273,
		                "frameRate": 25,
		                "isOriginal": true,
		                "isWeb": true,
		                "containerFormat": "isom",
		                "videoCodecId": "avc1",
		                "status": 2,
		                "id": "1_ve33jp7s",
		                "entryId": "0_hqo3hkzo",
		                "partnerId": 2288691,
		                "version": "71",
		                "size": 392192,
		                "tags": "source,web",
		                "fileExt": "mp4",
		                "createdAt": 1506173047,
		                "updatedAt": 1509805623,
		                "deletedAt": null,
		                "description": "",
		                "partnerData": null,
		                "partnerDescription": null,
		                "actualSourceAssetParamsIds": null,
		                "language": "Undefined"
		            }],
		            "messages": [],
		            "actions": [],
		            "msDuration": 2527000,
		            "pluginData": []
		        },
		        "entryMeta": {
		            "objects": [],
		            "totalCount": 0
		        },
		        "entryCuePoints": {
		            "objects": [],
		            "totalCount": 0
		        }
		    }
		}
		*/
		
		
		/*
		// http://cdnapi.kaltura.com/p/2288691/sp/228869100/playManifest/entryId/0_hqo3hkzo/flavorIds/0_pwrino6w/format/applehttp/protocol/http/a.m3u8?referrer=aHR0cDovL2NkbmFwaS5rYWx0dXJhLmNvbQ==&playSessionId=3bfefc05-8794-f4bf-eae3-96761a9d9b62&clientTag=html5:v2.62&uiConfId=39784151&responseFormat=jsonp&callback=jQuery111105848176324626408_1509887956906&_=1509887956907
		// jQuery111105848176324626408_1509887956906({"entryId":"0_hqo3hkzo","duration":2527,"baseUrl":"","flavors":[{"url":"http:\/\/cfvod.kaltura.com\/scf\/hls\/p\/2288691\/sp\/228869100\/serveFlavor\/entryId\/0_hqo3hkzo\/v\/191\/flavorId\/0_pwrino6w\/name\/a.mp4\/index.m3u8?Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cDovL2Nmdm9kLmthbHR1cmEuY29tL3NjZi9obHMvcC8yMjg4NjkxL3NwLzIyODg2OTEwMC9zZXJ2ZUZsYXZvci9lbnRyeUlkLzBfaHFvM2hrem8vdi8xOTEvZmxhdm9ySWQvMF9wd3Jpbm82dy9uYW1lL2EubXA0LyoiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjE1MDk5NzQzNjV9fX1dfQ__&Signature=WTn95PnMnalsjzJneLWVBd3eDrR8DHPAk9Nf0wir~POpkj6y5~tYg3n7HW7-ERBIuo2CWIItVdi~RjtLB1mV0uFoA7tUUH-k6mKULg2ugqDCbxsLb-6xvbK20ubQ80-aNNEgY1tq8JlHUkcnM0YFXmkSRq9mB4O4ajep0DCZJnI8AyzTUIKJlWK8ZnA0841rAEmkSb9o5xeivo5RKs69DUzjXaQ9yKU4BwfPceOkZ0rFox9hmoeQzAEUJfxTOrAgHlwFCnfZ0cMbdcaxoZk32XmYcGGijXkXO84MoBuFWv8TcsWXrbBVTn0ly9HdIli8R6biRd823zbvfbwXoBjgjQ__&Key-Pair-Id=APKAJT6QIWSKVYK3V34A","ext":"mp4","bitrate":964,"width":640,"height":360,"audioLanguage":null,"audioLanguageName":null,"audioLabel":null,"audioCodec":null}]})
		
		
		// "dataUrl":"http:\/\/cdnapi.kaltura.com\/p\/2288691\/sp\/228869100\/playManifest\/entryId\/0_hqo3hkzo\/format\/url\/protocol\/http"
		$dataUrl = entre1y2($ret1, '"dataUrl":"', '"');
		// http:\/\/cdnapi.kaltura.com\/p\/2288691\/sp\/228869100\/playManifest\/entryId\/0_hqo3hkzo\/format\/url\/protocol\/http
		dbug_($dataUrl);
		$dataUrl = json_decode('"' . $dataUrl . '"');
		// http://cdnapi.kaltura.com/p/2288691/sp/228869100/playManifest/entryId/0_hqo3hkzo/format/url/protocol/http
		dbug_($dataUrl);
		*/
		
		$downloadURL = desde1a2($ret1, '{"playerConfig"', "};").'}';
		dbug_($downloadURL);
		$downloadURL = json_decode($downloadURL, true);
		dbug_r($downloadURL);
		
		$obtenido = array(
			'titulo' => $titulo,
			'imagen' => $downloadURL['entryResult']['meta']['thumbnailUrl'],
			'enlaces' => array(
				array (
					'url_txt' => 'Descargar',
					'url'  => $downloadURL['entryResult']['meta']['downloadUrl'],
					'tipo' => 'http'
				)
			)
		);
		
		finalCadena($obtenido);
	}
	else if (preg_match("@thumbnail\\\/entry_id\\\/(.*?)\\\/version@", $this->web_descargada, $matches)) {
		dbug_r($matches);
		$id = $matches[1];
		// https://cdnapisec.kaltura.com/p/2288691/sp/228869100/playManifest/entryId/1_gskixgjv/protocol/https/format/applehttp/flavorIds/1_o88f5ln0,1_phrtw7lo/a.m3u8?uiConfId=51754702&playSessionId=aaede945-d17d-fc8f-1f8a-1ce588947167:e89a4864-dfa4-ef7e-9f2c-223dc7738288&referrer=aHR0cHM6Ly93d3cuY21tZWRpYS5lcy9wbGF5L3R2L2VuLWNvbXBhbmlhL2NvbXBhbmlhLTA2LTA3LTIwMjMuaHRtbA==&clientTag=html5:v7.66
		// https://cdnapisec.kaltura.com/p/2288691/sp/2288691/playManifest/entryId/1_gskixgjv/flavorIds/1_o88f5ln0,1_phrtw7lo/deliveryProfileId/5642/protocol/https/format/url/name/a.mp4
		// http://cdnapi.kaltura.com/p/2288691/sp/2288691/playManifest/entryId/1_gskixgjv/flavorIds/1_o88f5ln0,1_phrtw7lo/deliveryProfileId/72/protocol/http/format/url/name/a.mp4
		// https://cdnapisec.kaltura.com/p/2288691/sp/2288691/playManifest/entryId/1_gskixgjv/flavorIds/1_o88f5ln0,1_phrtw7lo/deliveryProfileId/92/protocol/https/format/url/name/a.mp4
		// https://cdnapisec.kaltura.com/p/2288691/sp/2288691/playManifest/entryId/1_gskixgjv/flavorIds/1_o88f5ln0,1_phrtw7lo/deliveryProfileId/5552/protocol/https/format/url/name/a.mp4
		
		// La siguiente URL tiene los enlaces que quiero:
		// POST https://cdnapisec.kaltura.com/api_v3/service/multirequest
		// POST DATA: {"1":{"service":"session","action":"startWidgetSession","widgetId":"_2288691"},"2":{"service":"baseEntry","action":"list","ks":"{1:result:ks}","filter":{"redirectFromEntryId":"1_gskixgjv"},"responseProfile":{"type":1,"fields":"id,referenceId,name,description,thumbnailUrl,dataUrl,duration,msDuration,flavorParamsIds,mediaType,type,tags,dvrStatus,externalSourceType,status,createdAt,endDate"}},"3":{"service":"baseEntry","action":"getPlaybackContext","entryId":"{2:result:objects:0:id}","ks":"{1:result:ks}","contextDataParams":{"objectType":"KalturaContextDataParams","flavorTags":"all"}},"4":{"service":"metadata_metadata","action":"list","filter":{"objectType":"KalturaMetadataFilter","objectIdEqual":"{2:result:objects:0:id}","metadataObjectTypeEqual":"1"},"ks":"{1:result:ks}"},"apiVersion":"3.3.0","format":1,"ks":"","clientTag":"html5:v3.14.6","partnerId":"2288691"}

		// http://cfvod.kaltura.com/p/2288691/p\/228869100/thumbnail/entry_id/1_gskixgjv/version/100041
		
		
		// https://www.cmmedia.es/kaltura/config.json
		// {"partner_id":"2288691","video_ui_id":"51789822","audio_ui_id":"51754702","ads_config":{"adTagUrl":"https:\/\/pubads.g.doubleclick.net\/gampad\/ads?iu=\/22526134856\/cmmedia.es\/video\u0026description_url=https%3A%2F%2Fcmmedia.es\u0026sz=300x250%7C400x300%7C640x480\u0026ciu_szs=300x250\u0026gdfp_req=1\u0026ad_rule=1\u0026output=vmap\u0026unviewed_position_start=1\u0026env=vp\u0026impl=s\u0026cmsid=496\u0026vid=short_onecue\u0026correlator=\u0026cust_params="},"ads_config_live":{"adTagUrl":"https:\/\/pubads.g.doubleclick.net\/gampad\/live\/ads?iu=\/22526134856\/cmmedia.es\/video\u0026description_url=https%3A%2F%2Fcmmedia.es\u0026sz=300x250%7C400x300%7C640x480\u0026cust_params=tipo-duracion%3Ddirecto\u0026ciu_szs=300x250\u0026gdfp_req=1\u0026ad_rule=1\u0026output=vmap\u0026unviewed_position_start=1\u0026env=vp\u0026impl=s\u0026cmsid=496\u0026vid=short_onecue\u0026correlator="}}
		$ret = CargaWebCurl(
			'https://cdnapisec.kaltura.com/api_v3/service/multirequest',
			'{"1":{"service":"session","action":"startWidgetSession","widgetId":"_2288691"},"2":{"service":"baseEntry","action":"list","ks":"{1:result:ks}","filter":{"redirectFromEntryId":"'.$id.'"},"responseProfile":{"type":1,"fields":"id,referenceId,name,description,thumbnailUrl,dataUrl,duration,msDuration,flavorParamsIds,mediaType,type,tags,dvrStatus,externalSourceType,status,createdAt,endDate"}},"3":{"service":"baseEntry","action":"getPlaybackContext","entryId":"{2:result:objects:0:id}","ks":"{1:result:ks}","contextDataParams":{"objectType":"KalturaContextDataParams","flavorTags":"all"}},"4":{"service":"metadata_metadata","action":"list","filter":{"objectType":"KalturaMetadataFilter","objectIdEqual":"{2:result:objects:0:id}","metadataObjectTypeEqual":"1"},"ks":"{1:result:ks}"},"apiVersion":"3.3.0","format":1,"ks":"","clientTag":"html5:v3.14.6","partnerId":"2288691"}',
			false, '', array(
				'TE: trailers',
				'Origin: https://www.cmmedia.es',
				'Referer: https://www.cmmedia.es/',
				'Sec-Fetch-Dest: empty',
				'Sec-Fetch-Mode: cors',
				'Sec-Fetch-Site: cross-site',
				'Content-Type: application/json'
			));
		dbug_($ret);
		// [{"partnerId":2288691,"ks":"djJ8MjI4ODY5MXzvEuvA3HoeHj1NKbx3B_i8SQIFOJSpZgM1obLAI6yE4i4i1RlmgzWy1cj3q5rx743xqFnVSk6sr7XpIt-X-An8TlcLKUG_qrcr7gm39SIGSg==","userId":0,"objectType":"KalturaStartWidgetSessionResponse"},{"objects":[{"mediaType":1,"dataUrl":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/228869100\/playManifest\/entryId\/1_gskixgjv\/format\/url\/protocol\/https","flavorParamsIds":"0,487061,487071","duration":7586,"msDuration":7585588,"id":"1_gskixgjv","name":"E06723EB_EN COMPA\u00d1IA_060723","description":"","tags":"","status":2,"type":1,"createdAt":1688664631,"thumbnailUrl":"https:\/\/cfvod.kaltura.com\/p\/2288691\/sp\/228869100\/thumbnail\/entry_id\/1_gskixgjv\/version\/100041","referenceId":"E06723EB","objectType":"KalturaMediaEntry"}],"totalCount":1,"objectType":"KalturaBaseEntryListResponse"},{"sources":[{"deliveryProfileId":5642,"format":"url","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/5642\/protocol\/https\/format\/url\/name\/a.mp4","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":3382,"format":"hdnetworkmanifest","protocols":"https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/3382\/protocol\/https\/format\/hdnetworkmanifest\/manifest.f4m","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":4662,"format":"mpegdash","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/4662\/protocol\/https\/format\/mpegdash\/manifest.mpd","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":72,"format":"url","protocols":"http","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"http:\/\/cdnapi.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/72\/protocol\/http\/format\/url\/name\/a.mp4","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":92,"format":"url","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/92\/protocol\/https\/format\/url\/name\/a.mp4","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":102,"format":"hdnetwork","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/102\/protocol\/https\/format\/hdnetwork\/manifest.f4m","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":13942,"format":"applehttp","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/13942\/protocol\/https\/format\/applehttp\/a.m3u8","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":122,"format":"rtsp","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/122\/protocol\/https\/format\/rtsp\/name\/a.3gp","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":13952,"format":"applehttp","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/13952\/protocol\/https\/format\/applehttp\/a.m3u8","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":21633,"format":"applehttp","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/21633\/protocol\/https\/format\/applehttp\/a.m3u8","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":132,"format":"hdnetworkmanifest","protocols":"http","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"http:\/\/cdnapi.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/132\/protocol\/http\/format\/hdnetworkmanifest\/manifest.f4m","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":152,"format":"rtmp","protocols":"rtmp,rtmpe,rtmpt,rtmpte","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"http:\/\/cdnapi.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/152\/protocol\/http\/format\/rtmp\/a.f4m","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":162,"format":"rtmp","protocols":"rtmp,rtmpe,rtmpt,rtmpte","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"http:\/\/cdnapi.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/162\/protocol\/http\/format\/rtmp\/a.f4m","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":12972,"format":"mpegdash","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/12972\/protocol\/https\/format\/mpegdash\/manifest.mpd","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":5552,"format":"url","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/5552\/protocol\/https\/format\/url\/name\/a.mp4","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":5612,"format":"hdnetworkmanifest","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/5612\/protocol\/https\/format\/hdnetworkmanifest\/manifest.f4m","drm":[],"objectType":"KalturaPlaybackSource"},{"deliveryProfileId":5622,"format":"hdnetworkmanifest","protocols":"http,https","flavorIds":"1_o88f5ln0,1_phrtw7lo","url":"https:\/\/cdnapisec.kaltura.com\/p\/2288691\/sp\/2288691\/playManifest\/entryId\/1_gskixgjv\/flavorIds\/1_o88f5ln0,1_phrtw7lo\/deliveryProfileId\/5622\/protocol\/https\/format\/hdnetworkmanifest\/manifest.f4m","drm":[],"objectType":"KalturaPlaybackSource"}],"playbackCaptions":[],"flavorAssets":[{"flavorParamsId":487061,"width":960,"height":540,"bitrate":918,"frameRate":25,"isOriginal":false,"isWeb":true,"containerFormat":"isom","videoCodecId":"avc1","status":2,"language":"Undefined","isDefault":false,"id":"1_o88f5ln0","entryId":"1_gskixgjv","partnerId":2288691,"version":"1","size":850512,"tags":"mobile,web,mbr,ipad,ipadnew,iphone,iphonenew,dash","fileExt":"mp4","createdAt":1688664816,"updatedAt":1688666790,"description":"","sizeInBytes":"870924522","objectType":"KalturaFlavorAsset"},{"flavorParamsId":487071,"width":1280,"height":720,"bitrate":1486,"frameRate":25,"isOriginal":false,"isWeb":true,"containerFormat":"isom","videoCodecId":"avc1","status":2,"language":"Undefined","isDefault":false,"id":"1_phrtw7lo","entryId":"1_gskixgjv","partnerId":2288691,"version":"1","size":1376065,"tags":"mobile,web,mbr,ipad,ipadnew,iphone,iphonenew,dash","fileExt":"mp4","createdAt":1688664816,"updatedAt":1688667535,"description":"","sizeInBytes":"1409091185","objectType":"KalturaFlavorAsset"}],"actions":[],"messages":[],"bumperData":[],"objectType":"KalturaPlaybackContext"},{"objects":[],"totalCount":0,"objectType":"KalturaMetadataListResponse"}]<br/>

		$json = json_decode($ret, true);
		
		dbug_r($json);
		
		
		$obtenido = array(
			'titulo' => $titulo,
			'imagen' => $imagen,
			'enlaces' => array()
		);
		
		$sources = $json[2]['sources'];
		$j = 1;
		for ($i = 0, $i_l = count($sources); $i < $i_l; $i++) {
			$url = $sources[$i]['url'];
		
			if (endsWith($url, '.mp4')) {
				$obtenido['enlaces'][] = array(
					'url_txt' => 'Descargar (Opción '.$j++.')',
					'url'  => $url,
					'tipo' => 'http'
				);
			}
		}
		
		finalCadena($obtenido);
	}
	else {
		setErrorWebIntera('No se ha encontrado ningún vídeo');
		return;
	}
}

function getBaseFlavorUrl($partnerId, $url) {
	if (mw.getConfig('Kaltura.UseManifestUrls')) {
		return "http://www.kaltura.com" + '/p/' + $partnerId + '/sp/' + $partnerId + '00/playManifest';
	} else {
		return "http://cdnakmi.kaltura.com" + '/p/' + $partnerId + '/sp/' + $partnerId + '00/flvclipper';
    }
}

}
