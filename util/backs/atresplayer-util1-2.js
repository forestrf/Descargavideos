//javascript:(function(){$.getScript("http://www.descargavideos.tv/util/atresplayer-util1.js")})() 

function getCookie(name) {
	var re = new RegExp('[; ]'+name+'=([^\\s;]*)');
	var sMatch = (' '+document.cookie).match(re);
	return sMatch[1];
}
function getHls_out() {
	return getCookie("hls_out");
}
function getApiTime() {
	return Math.ceil(new Date().getTime() / 1000);
}

episode = document.getElementById("capa_modulo_player").getAttribute("episode");
time = 3000+getApiTime();
to = episode+time;

resolver = "http://www.descargavideos.tv/util/atresplayer-util1.php?msg="+to;
//alert(resolver);

$.ajax({
	type: "GET",
	crossDomain: true,
	async: false,
	url: resolver
})
.done(function(data){
	if(data != null){
		//alert(data);
		hash = data;
	}
})

apiUrl = "http://servicios.atresplayer.com/api/urlVideo/"+episode+"/android_tablet/"+episode+"|"+time+"|"+hash;
//alert(apiUrl);

$.ajax({
	type: "GET",
	url: apiUrl,
	async: false,
	data: "blabla",
	dataType: "jsonp",
	success: function(data) {
		if(data != null){
			document.location = data['resultObject']['es'];
		}
	}
});


