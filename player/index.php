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

	<script type="text/javascript" src="extra/flowplayer-3.2.12.min.js"></script>
	<link rel="stylesheet" href="/css/reset.css" />
	<link rel="stylesheet" href="/css/player.css" />
</head>
<body>
<div id="page">
	<a href="#" id="player"></a>

	<script>
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
	</script>
</div>
</body>
</html>