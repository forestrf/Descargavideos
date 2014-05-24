<?php

$url = isset($_GET['video'])?limpiar($_GET['video']):"";
$img = isset($_GET['img'])?limpiar($_GET['img']):"";
$ext = isset($_GET['ext'])?limpiar($_GET['ext']):"";

function limpiar($que){
	return strtr($que, array(
		'<'=>'',
		'>'=>'',
		'"'=>'',
		"'"=>'',
		"\\"=>''
	));
}

?>
<!doctype html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<script src="extra/flowplayer-3.2.12.min.js"></script>
	<link rel="stylesheet" href="/css/reset.css" />
	<link rel="stylesheet" href="/css/player.css" />
	
	<link href="http://vjs.zencdn.net/4.5/video-js.css" rel="stylesheet">
	<script src="http://vjs.zencdn.net/4.5/video.js"></script>
	<style type="text/css">
	  	.vjs-default-skin { color: #ffffff; }
	  	.vjs-default-skin .vjs-play-progress,
	  	.vjs-default-skin .vjs-volume-level { background-color: #004e78 }
	  	.vjs-default-skin .vjs-control-bar { background: #000000 }
	  	.vjs-default-skin .vjs-big-play-button {
	  		background: rgba(0, 0, 0, 0.51);
	  		border: 0.1em solid #DCDCDC;
			box-shadow: 0 0 1em rgba(255, 255, 255, 0.63);
			left: 50%;
			margin-left: -2em;
			margin-top: -1.3em;
			top: 50%;
			width: 4em;
  		}
	  	.vjs-default-skin .vjs-slider { background: rgba(0,7,21,0.2333333333333333) }
  		.vjs-default-skin .vjs-control-bar { font-size: 95% }
	</style>
	
	<script>
		function detectflash(){
			if (navigator.plugins != null && navigator.plugins.length > 0){
				return navigator.plugins["Shockwave Flash"] && true;
			}
			if(~navigator.userAgent.toLowerCase().indexOf("webtv")){
				return true;
			}
			if(~navigator.appVersion.indexOf("MSIE") && !~navigator.userAgent.indexOf("Opera")){
				try{
					return new ActiveXObject("ShockwaveFlash.ShockwaveFlash") && true;
				} catch(e){}
			}
			return false;
		}
	</script>
</head>
<body>
	<script>
		if(detectflash()){
			dibujarReproductorFlash();
		} else{
			dibujarReproductorHTML5();
		}
		
		function dibujarReproductorHTML5(){
			document.body.innerHTML = '\
			<video id="player" class="video-js vjs-default-skin" controls preload="auto" poster=\'<?php echo $img?>\'\
			 	data-setup="{}">\
			 	<source src=\'<?php echo $url?>\' type=\'video/<?php echo $ext?>\'>\
			</video>';
		}
		
		function dibujarReproductorFlash(){
			document.body.innerHTML = '<a href="#" id="player"><img src=\'<?php echo $img?>\' style="width:100%; height:100%"/><div class="overlay"></div><div class="boton_play"></div></a>';
			
			flowplayer("player", "http://releases.flowplayer.org/swf/flowplayer-3.2.16.swf", {
				clip: {
					url: '<?php echo $url?>',
					coverImage: '<?php echo $img?>',
					<?php if($ext) echo "type: '$ext',"?>
					scaling: "fit",
					autoPlay: false
				},
				plugins: {
					controls: {
						url: "http://releases.flowplayer.org/swf/flowplayer.controls-3.2.15.swf",
						 
						backgroundColor: "transparent",
						backgroundGradient: "none",
						sliderColor: '#FFFFFF',
						sliderBorder: '1.5px solid rgba(160,160,160,0.7)',
						volumeSliderColor: '#FFFFFF',
						volumeBorder: '1.5px solid rgba(160,160,160,0.7)',
	
						timeColor: '#ffffff',
						durationColor: '#535353',
	
						tooltipColor: 'rgba(255, 255, 255, 0.7)',
						tooltipTextColor: '#000000'
					}
				},
				canvas: {
					backgroundColor:'#000000',
					backgroundGradient: [0, 0]
				}
			});
		}
	</script>
	
</body>
</html>