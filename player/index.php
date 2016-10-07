<?php
require_once('../funciones.php');
$url = isset($_POST['video'])?$_POST['video']:"";
$img = isset($_POST['img'])?$_POST['img']:"";
$ext = isset($_POST['ext'])?$_POST['ext']:"";

?>
<!doctype html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

	<script src="extra/flowplayer-3.2.12.min.js"></script>
	<link rel="stylesheet" href="/css/reset.min.css" />
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
</head>
<body>
	<input type="button" onclick="dibujarReproductorFlash()" value="Reproductor Flash">
	<input type="button" onclick="dibujarReproductorHTML5()" value="Reproductor HTML5">
	<div id="playerContainer"></div>
	<script>
		var img = <?=json_encode($img)?>;
		var ext = <?=json_encode($ext)?>;

		dibujarReproductorHTML5();

		function dibujarReproductorHTML5(){
			playerContainer.innerHTML = '\
			<video id="player" class="video-js vjs-default-skin" controls preload="auto" poster="<?=htmlentities2($img)?>"\
			 	data-setup="{}">\
			 	<source src="<?=htmlentities2($url)?>" type="video/<?=htmlentities2($ext)?>">\
			</video>';
		}

		function dibujarReproductorFlash(){
			playerContainer.innerHTML = '<a href="#" id="player"><img src="<?=htmlentities2($img)?>" style="width:100%; height:100%"/><div class="overlay"></div><div class="boton_play"></div></a>';
			
			flowplayer("player", "http://releases.flowplayer.org/swf/flowplayer-3.2.16.swf", {
				clip: {
					url: <?=json_encode($url)?>,
					coverImage: img,
					<?php if($ext) echo "type: '".htmlentities2($ext)."',"?>
					scaling: "fit",
					autoPlay: false
				},
				plugins: {
					controls: {
						url: "http://releases.flowplayer.org/swf/flowplayer.controls-3.2.15.swf",

						backgroundColor: "transparent",
						backgroundGradient: "none",
						sliderColor: '#FFF',
						sliderBorder: '1.5px solid rgba(160,160,160,0.7)',
						volumeSliderColor: '#FFFFFF',
						volumeBorder: '1.5px solid rgba(160,160,160,0.7)',

						timeColor: '#fff',
						durationColor: '#535353',

						tooltipColor: 'rgba(255, 255, 255, 0.7)',
						tooltipTextColor: '#000'
					}
				},
				canvas: {
					backgroundColor:'#000',
					backgroundGradient: [0, 0]
				}
			});
		}
	</script>
</body>
</html>