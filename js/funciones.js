var D = document;
D.g = D.getElementById;
D.c = D.createElement;

/*
 // RefererKiller "original"
 var ReferrerKiller = (function() {
 PUB = {};
 function escapeDoubleQuotes(str) {
 return str.split('"').join('\\"');
 }

 function escapeSimpleQuotes(str) {
 return str.split("'").join("\\'");
 }

 function objectToHtmlAttributes(obj) {
 var attributes = [], value;
 for (var name in obj) {
 value = obj[name];
 attributes.push(name + '="' + escapeDoubleQuotes(value) + '"');
 }
 return attributes.join(' ');
 }

 function htmlString(html, iframeAttributes, headExtra) {
 var iframeAttributes = iframeAttributes || {}, defaultStyles = 'border:none;overflow:hidden;', id;
 if ('style' in iframeAttributes) {
 iframeAttributes.style = defaultStyles + iframeAttributes.style;
 } else {
 iframeAttributes.style = defaultStyles;
 }
 id = '__referrer_killer_' + (new Date).getTime() + Math.floor(Math.random() * 9999);
 return '<iframe style="border 1px solid #ff0000" scrolling="no" frameborder="no" allowtransparency="true" ' + objectToHtmlAttributes(iframeAttributes) + 'id="' + id + '" src="javascript:\'<!doctype html><html><head><meta charset=\\\'UTF-8\\\'><style>*{margin:0;padding:0;border:0;}</style>' + ( headExtra ? encodeURIComponent(escapeSimpleQuotes(headExtra)) : '') + '</head><script>function resizeWindow(){var elems=document.getElementsByTagName(\\\'*\\\'),width=0,' + 'height=0,first=document.body.firstChild,elem;if(first.offsetHeight&&first.offsetWidth){width=first.offsetWidth;height=first.offsetHeight;}else{for(var i in elems){elem=elems[i];if(!elem.offsetWidth){continue;}width=Math.max(elem.offsetWidth,width);height=Math.max(elem.offsetHeight,height);}}var ifr=parent.document.getElementById(\\\'' + id + '\\\');ifr.height=height;ifr.width=width;}</script><body onload=\\\'resizeWindow()\\\'>\'+decodeURIComponent(\'' + encodeURIComponent(html) + '\')+\'</body></html>\'"></iframe>';
 }

 function linkHtml(url, innerHTML, anchorParams, iframeAttributes, styleInnerIframe, headExtra) {
 var html;
 innerHTML = innerHTML || false;
 if (!innerHTML) {
 innerHTML = url;
 }
 anchorParams = anchorParams || {};
 if (!('target' in anchorParams) || '_self' === anchorParams.target) {
 anchorParams.target = '_top';
 }
 html = '<style>' + encodeURIComponent(styleInnerIframe) + '</style><a class="link" rel="noreferrer" href="' + escapeDoubleQuotes(encodeURIComponent(url)) + '" ' + objectToHtmlAttributes(anchorParams) + '>' + innerHTML + '</a>';
 return htmlString(html, iframeAttributes, headExtra);
 }

 PUB.linkHtml = linkHtml;
 return PUB;
 })();
 */

var ReferrerKiller = (function() {
	function A(a) {
		return a.split('"').join('\\"');
	}

	function B(a) {
		return a.split("'").join("\\'");
	}

	function C(a) {
		var b = [];
		for (var d in a) {
			b.push(d + '="' + A(a[d]) + '"');
		}
		return b.join(' ');
	}

	function D(a, b, c) {
		var b = b || {}, d = 'border:none;overflow:hidden;', e;
		b.style = 'style' in b ? d + b.style : d;
		e = '__referrer_killer_' + (new Date).getTime() + Math.floor(Math.random() * 9999);
		return '<iframe style="border 1px solid #ff0000" scrolling="no" frameborder="no" allowtransparency="true" ' + C(b) + 'id="' + e + '" src="javascript:\'<!doctype html><html><head><meta charset=\\\'UTF-8\\\'><style>*{margin:0;padding:0;border:0;}</style>' + ( c ? encodeURIComponent(B(c)) : '') + '</head><script>function resizeWindow(){var elems=document.getElementsByTagName(\\\'*\\\'),width=0,' + 'height=0,first=document.body.firstChild,elem;if(first.offsetHeight&&first.offsetWidth){width=first.offsetWidth;height=first.offsetHeight;}else{for(var i in elems){elem=elems[i];if(!elem.offsetWidth){continue;}width=Math.max(elem.offsetWidth,width);height=Math.max(elem.offsetHeight,height);}}var ifr=parent.document.getElementById(\\\'' + e + '\\\');ifr.height=height;ifr.width=width;}</script><body onload=\\\'resizeWindow()\\\'>\'+decodeURIComponent(\'' + encodeURIComponent(a) + '\')+\'</body></html>\'"></iframe>';
	}

	function E(a, b, c, d, e, f) {
		b = b || false;
		if (!b) {
			b = a;
		}
		c = c || {};
		if (!('target' in c) || '_self' === c.target) {
			c.target = '_top';
		}
		return D('<style>' + encodeURIComponent(e) + '</style><a class="link" rel="noreferrer" href="' + A(encodeURIComponent(a)) + '" ' + C(c) + '>' + b + '</a>', d, f);
	}

	var default_css_button = '.link{'+
		'background:url("http://www.descargavideos.tv/img/flecha.png") no-repeat scroll 5px 5px #ED8D2D;'+
		'border-radius:10px;'+
		'font-family:Tahoma,Helvetica;'+
		'font-size:16px;'+
		'text-decoration:none;'+
		'line-height:30px;'+
		'word-wrap:break-word;'+
		'text-align:center;'+
		'display:block;'+
		'transition:all 0.3s ease 0s;'+
		'min-height:30px;'+
		'padding:5px 5px 5px 50px;'+
		'color:#F8F8F8;'+
	'}'+
	'.link:hover{'+
		'background-color:#F8F8F8;'+
		'background-position:5px -55px;'+
		'color:#ED8D2D;'+
	'}';

	return {linkHtml:E,css:default_css_button};
})();

function ready(f) {
	/in/.test(D.readyState) ? setTimeout(function() {
		ready(f);
	}, 99) : f();
}

function qC(e, c) {
	e.className = e.className.split(c).join("");
}

function aC(e, c) {
	e.className += " " + c;
}

function scrollTo(e, d) {
	if (d < 0)
		return;
	var h = D.documentElement;
	if (h.scrollTop === 0) {
		var t = h.scrollTop; ++h.scrollTop;
		h = t + 1 === h.scrollTop-- ? h : D.body;
	}
	if ( typeof e === "object")
		e = e.offsetTop;
	setTimeout(function() {
		scrollToX(h, h.scrollTop, e, 0, 1 / d, 20);
	}, 0);
}

function scrollToX(e, a, b, t, v, s) {
	if (t < 0 || v <= 0)
		return;
	k = t > 1 ? 0 : t - 1;
	e.scrollTop = a - (a - b) * (k * k * k + 1);
	t += v * s;
	if (t <= 1)
		setTimeout(function() {
			scrollToX(e, a, b, t, v, s);
		}, s);
}

function getScript(url, callback, id) {
	if ( typeof callback === "undefined")
		callback = function() {
		};
	var script = D.createElement('script');
	script.type = 'text/javascript';
	script.src = url;
	if (callback)
		script.onload = callback;
	if (id)
		script.id = id;
	script.onreadystatechange = function() {
		if (this.readyState === 'complete' && callback) {
			callback();
		}
	};
	D.getElementsByTagName('head')[0].appendChild(script);
}

function getFlashMovie(m) {
	var isIE = navigator.appName.indexOf("Microsoft") != -1;
	return (isIE) ? window[m] : D[m];
}

function lcs(a) {
	D.g('css2').href = "/css/modos/" + a + ".css";
}

function mueveMenu() {
	if ((D.body.scrollTop || D.documentElement.scrollTop) > D.g('contenido').offsetTop) {
		if (!mueveMenu_m) {
			aC(mueveMenu_f, "menu_fixed");
			mueveMenu_m = 1;
		}
	} else if (mueveMenu_m) {
		qC(mueveMenu_f, "menu_fixed");
		mueveMenu_m = 0;
	}
}
function mueveSubir() {
	if ((D.body.scrollTop || D.documentElement.scrollTop) > 100) {
		if (!mueveSubir_m) {
			aC(mueveSubir_f, "visible");
			mueveSubir_m = 1;
		}
	} else if (mueveSubir_m) {
		qC(mueveSubir_f, "visible");
		mueveSubir_m = 0;
	}
}
// Internet Explorer
if(typeof window.attachEvent !== "undefined")
	window.attachEvent("onmessage",receiveMessage);

// Opera/Mozilla/Webkit
if(typeof window.addEventListener !== "undefined")
	window.addEventListener("message", receiveMessage, false);

function receiveMessage(event){
	if (/^\{"RESPUESTA_DV":"/.test(event.data)){
		var respuesta = JSON.parse(event.data);
		if(respuesta["RESPUESTA_DV"]){
			window[respuesta["RESPUESTA_DV"]](respuesta["CONTENIDO_DV"]);
		}
	}
}