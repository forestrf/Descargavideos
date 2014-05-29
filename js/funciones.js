var ReferrerKiller = (function() {
	PUB = {};
	function escapeDoubleQuotes(str) {
		return str.split('"').join('\\"');
	}

	function escapeSimpleQuotes(str) {
		return str.split("'").join("\\'");
	}

	function htmlToNode(html) {
		var container = document.createElement('div');
		container.innerHTML = html;
		return container.firstChild;
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

function ready(f) {
	/in/.test(document.readyState) ? setTimeout(function() {
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
	var h = document.documentElement;
	if (h.scrollTop === 0) {
		var t = h.scrollTop; ++h.scrollTop;
		h = t + 1 === h.scrollTop-- ? h : document.body;
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

function getScript(url, callback) {
	if ( typeof callback === "undefined")
		callback = function() {
		};
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = url;
	script.onload = callback;
	script.onreadystatechange = function() {
		if (this.readyState == 'complete') {
			callback();
		}
	};
	document.getElementsByTagName('head')[0].appendChild(script);
}

function getFlashMovie(m) {
	var isIE = navigator.appName.indexOf("Microsoft") != -1;
	return (isIE) ? window[m] : document[m];
}

function lcs(a) {
	document.getElementById('css2').href = "/css/modos/" + a + ".css";
}

function mueveMenu() {
	if ((document.body.scrollTop || document.documentElement.scrollTop) > document.getElementById('contenido').offsetTop) {
		if (!mueveMenu_m) {
			aC(mueveMenu_f, "menu_fixed");
			mueveMenu_m = 1;
		}
	} else if (mueveMenu_m) {
		qC(mueveMenu_f, "menu_fixed");
		mueveMenu_m = 0;
	}
}
