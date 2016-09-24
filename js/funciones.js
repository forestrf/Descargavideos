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
		return '<iframe style="border 1px solid #ff0000" height="40" scrolling="no" frameborder="no" allowtransparency="true" ' + C(b) + 'id="' + e + '" src="javascript:\'<!doctype html><html><head><meta charset=\\\'UTF-8\\\'><style>*{margin:0;padding:0;border:0;}</style>' + ( c ? encodeURIComponent(B(c)) : '') + '</head><script>function resizeWindow(){var elems=document.getElementsByTagName(\\\'*\\\'),width=0,' + 'height=0,first=document.body.firstChild,elem;if(first.offsetHeight&&first.offsetWidth){width=first.offsetWidth;height=first.offsetHeight;}else{for(var i in elems){elem=elems[i];if(!elem.offsetWidth){continue;}width=Math.max(elem.offsetWidth,width);height=Math.max(elem.offsetHeight,height);}}var ifr=parent.document.getElementById(\\\'' + e + '\\\');ifr.height=height;ifr.width=width;}</script><body onload=\\\'resizeWindow()\\\'>\'+decodeURIComponent(\'' + encodeURIComponent(a) + '\')+\'</body></html>\'"></iframe>';
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

// http://stackoverflow.com/questions/8917921/cross-browser-javascript-not-jquery-scroll-to-top-animation/23844067#23844067
// c = element to scroll to or top position in pixels
// e = duration of the scroll in ms, time scrolling
// d = (optative) ease function. Default easeOutCuaic
function scrollTo(c,e,d){d||(d=easeOutCuaic);var a=document.documentElement;if(0===a.scrollTop){var b=a.scrollTop;++a.scrollTop;a=b+1===a.scrollTop--?a:document.body;}b=a.scrollTop;0>=e||("object"===typeof b&&(b=b.offsetTop),"object"===typeof c&&(c=c.offsetTop),function(a,b,c,f,d,e,h){function g(){0>f||1<f||0>=d?a.scrollTop=c:(a.scrollTop=b-(b-c)*h(f),f+=d*e,setTimeout(g,e));}g();}(a,b,c,0,1/e,20,d));};
function easeOutCuaic(t){
	t--;
	return t*t*t+1;
}

function getScript(url, callback, id) {
	if ( typeof callback === "undefined")
		callback = function() {
		};
	var script = D.createElement('script');
	script.type = 'text/javascript';
	script.src = url;
	script.async = true;
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

function activartmp(random_id){
	var boton = D.g('rtmp'+random_id);
	if(boton.className.indexOf("infopersistent") !== -1){
		boton.className = boton.className.replace(/infopersistent/g, '');
	}
	D.g('rtmptxt'+random_id).style = '';
	var c = D.g('rtmpcontenido'+random_id);
	if(c)c.style.display = 'none';
	
	boton.onclick=function(){muestrartmp(random_id);};
	boton.rtmpactived = true;
}
function muestrartmp(random_id){
	D.g('rtmp'+random_id+'df').setAttribute('style','display:block');
	D.g('rtmp'+random_id+'dfb').setAttribute('style','display:block');
}
function cierrartmp(random_id){
	D.g('rtmp'+random_id+'df').setAttribute('style','display:none');
	D.g('rtmp'+random_id+'dfb').setAttribute('style','display:none');
}
function changeToInfo(random_id){
	var boton =  D.g('rtmp'+random_id);
	if(!boton.rtmpactived && boton.className.indexOf("infopersistent") === -1){
		boton.className += " infopersistent";
		
		D.g('rtmptxt'+random_id).style = 'display:none';
		var c = D.g('rtmpcontenido'+random_id);
		if(c)c.style.display = '';
	}
}

var Base64Binary={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",decodeArrayBuffer:function(a){var d=new ArrayBuffer(a.length/4*3);this.decode(a,d);return d},decode:function(a,d){var c=this._keyStr.indexOf(a.charAt(a.length-1)),e=this._keyStr.indexOf(a.charAt(a.length-2)),g=a.length/4*3;64==c&&g--;64==e&&g--;var h,f,m,l,b=0,k=0,c=d?new Uint8Array(d):new Uint8Array(g);a=a.replace(/[^A-Za-z0-9\+\/\=]/g,"");for(b=0;b<g;b+=3)h=this._keyStr.indexOf(a.charAt(k++)),f=this._keyStr.indexOf(a.charAt(k++)), e=this._keyStr.indexOf(a.charAt(k++)),l=this._keyStr.indexOf(a.charAt(k++)),h=h<<2|f>>4,f=(f&15)<<4|e>>2,m=(e&3)<<6|l,c[b]=h,64!=e&&(c[b+1]=f),64!=l&&(c[b+2]=m);return c}};

// crel2 min
crel2=function(){var b=arguments,c=b[0],d=b.length;c=typeof c==='string'?document.createElement(c):c;if(d===1)return c;var e=b[1],f=2;if(e instanceof Array){var s=e.length,g;while(s)switch(typeof(g=e[--s])){case "string":case "number":c.setAttribute(e[--s],g);break;default:c[e[--s]]=g}}else--f;while(d>f){e=b[f++];if(typeof e!=='object')e=document.createTextNode(e);c.appendChild(e)}return c};

// amf min
function decodeAMF(a){a=new a3d.ByteArray(a,a3d.Endian.BIG);var b=a.readUnsignedShort();a.objectEncoding=a3d.ObjectEncoding.AMF0;for(var c=new a3d.AMFPacket,d=a.readUnsignedShort(),e=0;e<d;e++){var g=a.readUTF(),h=a.readBoolean();a.readInt();if(b==a3d.ObjectEncoding.AMF3){var f=a.readByte();f==a3d.Amf0Types.kAvmPlusObjectType?a.objectEncoding=a3d.ObjectEncoding.AMF3:a.pos-=1}f=a.readObject();f=new a3d.AMFHeader(g,h,f);c.headers.push(f);a.objectEncoding=a3d.ObjectEncoding.AMF0}d=a.readUnsignedShort(); for(e=0;e<d;e++)g=a.readUTF(),h=a.readUTF(),a.readInt(),b==a3d.ObjectEncoding.AMF3&&(f=a.readByte(),f==a3d.Amf0Types.kAvmPlusObjectType?a.objectEncoding=a3d.ObjectEncoding.AMF3:a.pos-=1),f=a.readObject(),f=new a3d.AMFMessage(g,h,f),c.messages.push(f),a.objectEncoding=a3d.ObjectEncoding.AMF0;return c}function dumpHex(a){for(var b="",c=0,d=[];c<a.length;)0==c%16&&0!=c&&(b+=writeChunk(d,16)+"\n",d=[]),d.push(a.readUnsignedByte()),c++;b+=writeChunk(d,16);a.pos=0;return b} function writeChunk(a,b){for(var c="",d=0;d<a.length;d++){0==d%4&&0!=d&&(c+=" ");var e=a[d],e=e.toString(16)+" ";2==e.length&&(e="0"+e);c+=e}for(d=0;d<b-a.length;d++)c+=" ";e=Math.floor((b-a.length)/4);for(d=0;d<e;d++)c+=" ";c+=" ";for(d=0;d<a.length;d++)e=a[d],126>=e&&32<e?(e=String.fromCharCode(e),c+=e):c+=".";return c}"undefined"==typeof a3d&&(a3d={}); (function(){var a=!1,b=/xyz/.test(function(){xyz})?/\b_super\b/:/.*/;this.Class=function(){};Class.extend=function(c){function d(){!a&&this.init&&this.init.apply(this,arguments)}var e=this.prototype;a=!0;var g=new this;a=!1;for(var h in c)g[h]="function"==typeof c[h]&&"function"==typeof e[h]&&b.test(c[h])?function(a,b){return function(){var c=this._super;this._super=e[a];var d=b.apply(this,arguments);this._super=c;return d}}(h,c[h]):c[h];d.prototype=g;d.constructor=d;d.extend=arguments.callee;return d}})(); a3d.Endian={BIG:0,LITTLE:1};a3d.ObjectEncoding={AMF0:0,AMF3:3};a3d.Amf0Types={kNumberType:0,kBooleanType:1,kStringType:2,kObjectType:3,kMovieClipType:4,kNullType:5,kUndefinedType:6,kReferenceType:7,kECMAArrayType:8,kObjectEndType:9,kStrictArrayType:10,kDateType:11,kLongStringType:12,kUnsupportedType:13,kRecordsetType:14,kXMLObjectType:15,kTypedObjectType:16,kAvmPlusObjectType:17}; a3d.Amf3Types={kUndefinedType:0,kNullType:1,kFalseType:2,kTrueType:3,kIntegerType:4,kDoubleType:5,kStringType:6,kXMLType:7,kDateType:8,kArrayType:9,kObjectType:10,kAvmPlusXmlType:11,kByteArrayType:12};a3d.AMFMessage=Class.extend({targetURL:"",responseURI:"",body:{},init:function(a,b,c){this.targetURL=a;this.responseURI=b;this.body=c}});a3d.AMFPacket=Class.extend({version:0,headers:[],messages:[],init:function(a){this.version=void 0!==a?a:0;this.headers=[];this.messages=[]}}); a3d.AMFHeader=Class.extend({name:"",mustUnderstand:!1,data:{},init:function(a,b,c){this.name=a;this.mustUnderstand=void 0!=b?b:!1;this.data=c}}); a3d.ByteArray=Class.extend({data:"",barr:[],length:0,pos:0,pow:Math.pow,endian:a3d.Endian.BIG,TWOeN23:Math.pow(2,-23),TWOeN52:Math.pow(2,-52),objectEncoding:a3d.ObjectEncoding.AMF0,stringTable:[],objectTable:[],traitTable:[],init:function(a,b){this.data=void 0!==a?a:"";void 0!==b&&(this.endian=b);this.length=a.length;this.stringTable=[];this.objectTable=[];this.traitTable=[];var c=b==a3d.Endian.BIG?"BE":"LE",d="readInt32 readInt16 readUInt30 readUInt32 readUInt16 readFloat32 readFloat64".split(" "), e;for(e in d)this[d[e]]=this[d[e]+c];c={readUnsignedByte:"readByte",readUnsignedInt:"readUInt32",readFloat:"readFloat32",readDouble:"readFloat64",readShort:"readInt16",readUnsignedShort:"readUInt16",readBoolean:"readBool",readInt:"readInt32"};for(e in c)this[e]=this[c[e]];this.barr=a},readByte:function(){return this.barr[this.pos++]},writeByte:function(a){this.data+=a},readBool:function(){return this.readByte()&255?!0:!1},readUInt30BE:function(){var a=readByte(),b=readByte(),c=readByte(),d=readByte(); return 64<=a?void 0:d|c<<8|b<<16|a<<24},readUInt32BE:function(){return(this.readByte()&255)<<24|(this.readByte()&255)<<16|(this.readByte()&255)<<8|this.readByte()&255},readInt32BE:function(){var a=(this.readByte()&255)<<24|(this.readByte()&255)<<16|(this.readByte()&255)<<8|this.readByte()&255;return 2147483648<=a?a-4294967296:a},readUInt16BE:function(){return(this.readByte()&255)<<8|this.readByte()&255},readInt16BE:function(){var a=(this.readByte()&255)<<8|this.readByte()&255;return 32768<=a?a-65536: a},readFloat32BE:function(){var a=this.readByte()&255,b=this.readByte()&255,c=this.readByte()&255,d=this.readByte()&255,e=(a<<1&255|b>>7)-127,b=(b&127)<<16|c<<8|d;return 0==b&&-127==e?0:(1-(a>>7<<1))*(1+this.TWOeN23*b)*this.pow(2,e)},readFloat64BE:function(){var a=this.readByte(),b=this.readByte(),c=this.readByte(),d=this.readByte(),e=this.readByte(),g=this.readByte(),h=this.readByte(),f=this.readByte(),k=1-(f>>7<<1),f=(f<<4&2047|h>>4)-1023,a=((h&15)<<16|g<<8|e).toString(2)+(d>>7?"1":"0")+((d&127)<< 24|c<<16|b<<8|a).toString(2),a=parseInt(a,2);return 0==a&&-1023==f?0:k*(1+this.TWOeN52*a)*this.pow(2,f)},readUInt29:function(){var a,b=this.readByte()&255;if(128>b)return b;a=(b&127)<<7;b=this.readByte()&255;if(128>b)return a|b;a=(a|b&127)<<7;b=this.readByte()&255;if(128>b)return a|b;a=(a|b&127)<<8;b=this.readByte()&255;return a|b},readUInt30LE:function(){var a=readByte(),b=readByte(),c=readByte(),d=readByte();return 64<=d?void 0:a|b<<8|c<<16|d<<24},readUInt32LE:function(){var a=this.pos+=4;return(this.barr[--a]& 255)<<24|(this.barr[--a]&255)<<16|(this.barr[--a]&255)<<8|this.barr[--a]&255},readInt32LE:function(){var a=this.pos+=4,a=(this.barr[--a]&255)<<24|(this.barr[--a]&255)<<16|(this.barr[--a]&255)<<8|this.barr[--a]&255;return 2147483648<=a?a-4294967296:a},readUInt16LE:function(){var a=this.pos+=2;return(this.barr[--a]&255)<<8|this.barr[--a]&255},readInt16LE:function(){var a=this.pos+=2,a=(this.barr[--a]&255)<<8|this.barr[--a]&255;return 32768<=a?a-65536:a},readFloat32LE:function(){var a=this.pos+=4,b= this.barr[--a]&255,c=this.barr[--a]&255,d=this.barr[--a]&255,e=this.barr[--a]&255,a=(b<<1&255|c>>7)-127,c=(c&127)<<16|d<<8|e;return 0==c&&-127==a?0:(1-(b>>7<<1))*(1+this.TWOeN23*c)*this.pow(2,a)},readFloat64LE:function(){var a=this.readByte()&255,b=this.readByte()&255,c=this.readByte()&255,d=this.readByte()&255,e=this.readByte()&255,g=this.readByte()&255,h=this.readByte()&255,f=this.readByte()&255,k=1-(a>>7<<1),a=(a<<4&2047|b>>4)-1023,b=((b&15)<<16|c<<8|d).toString(2)+(e>>7?"1":"0")+((e&127)<<24| g<<16|h<<8|f).toString(2),b=parseInt(b,2);return 0==b&&-1023==a?0:k*(1+this.TWOeN52*b)*this.pow(2,a)},readDate:function(){var a=this.readDouble(),b=this.readUInt16();return new Date(a+6E4*b)},readString:function(a){for(var b="";0<a;)b+=String.fromCharCode(this.readByte()),a--;return b},readUTF:function(){return this.readString(this.readUnsignedShort())},readLongUTF:function(){return this.readString(this.readUInt30())},stringToXML:function(a){window.DOMParser?a=(new DOMParser).parseFromString(a,"text/xml"): (a=new ActiveXObject("Microsoft.XMLDOM"),a.async=!1,a.loadXML(stc));return a},readXML:function(){var a=this.readLongUTF();return this.stringToXML(a)},readStringAMF3:function(){var a=this.readUInt29();if(0==(a&1))return this.stringTable[a>>1];a>>=1;if(0==a)return"";a=this.readString(a);this.stringTable.push(a);return a},readTraits:function(a){var b={properties:[]};if(1==(a&3))return this.traitTable[a>>2];b.externalizable=4==(a&4);b.dynamic=8==(a&8);b.count=a>>4;b.className=this.readStringAMF3();this.traitTable.push(b); for(a=0;a<b.count;a++){var c=this.readStringAMF3();b.properties.push(c)}return b},readExternalizable:function(a){return this.readObject()},readObject:function(){if(this.objectEncoding==a3d.ObjectEncoding.AMF0)return this.readAMF0Object();if(this.objectEncoding==a3d.ObjectEncoding.AMF3)return this.readAMF3Object()},readAMF0Object:function(){var a=this.readByte();if(a==a3d.Amf0Types.kNumberType)return this.readDouble();if(a==a3d.Amf0Types.kBooleanType)return this.readBoolean();if(a==a3d.Amf0Types.kStringType)return this.readUTF(); if(a==a3d.Amf0Types.kObjectType||a==a3d.Amf0Types.kECMAArrayType){var b={},c=null;for(8==a&&this.readUInt30();;){c=this.readByte();a=this.readByte();c=this.readString(c<<8|a);if(9==this.readByte())break;this.pos--;b[c]=readObject()}return b}if(a==a3d.Amf0Types.kStrictArrayType){c=this.readInt();b=[];for(a=0;a<c;++a)b.push(this.readObject());return b}if(a==a3d.Amf0Types.kTypedObjectType){b={};this.readUTF();c=this.readUTF();for(a=this.readByte();a!=kObjectEndType;)a=this.readObject(),b[c]=a,c=this.readUTF(), a=this.readByte();return b}if(a==a3d.Amf0Types.kAvmPlusObjectType)return this.readAMF3Object();if(a==a3d.Amf0Types.kNullType)return null;if(a!=a3d.Amf0Types.kUndefinedType){if(a==a3d.Amf0Types.kReferenceType)return b=this.readUnsignedShort(),a=this.objectTable[b];if(a==a3d.Amf0Types.kDateType)return this.readDate();if(a==a3d.Amf0Types.kLongStringType)return this.readLongUTF();if(a==a3d.Amf0Types.kXMLObjectType)return this.readXML()}},readAMF3Object:function(){var a=this.readByte();if(a!=a3d.Amf3Types.kUndefinedType){if(a== a3d.Amf3Types.kNullType)return null;if(a==a3d.Amf3Types.kFalseType)return!1;if(a==a3d.Amf3Types.kTrueType)return!0;if(a==a3d.Amf3Types.kIntegerType){var b=this.readUInt29();return b}if(a==a3d.Amf3Types.kDoubleType)return this.readDouble();if(a==a3d.Amf3Types.kStringType)return this.readStringAMF3();if(a==a3d.Amf3Types.kXMLType)return this.readXML();if(a==a3d.Amf3Types.kDateType){a=this.readUInt29();if(0==(a&1))return this.objectTable[a>>1];var a=this.readDouble(),c=new Date(a);this.objectTable.push(c); return c}if(a==a3d.Amf3Types.kArrayType){a=this.readUInt29();if(0==(a&1))return this.objectTable[a>>1];a>>=1;b=this.readStringAMF3();if(""==b){for(var d=[],b=0;b<a;b++)c=this.readObject(),d.push(c);return d}for(d={};""!=b;)d[b]=this.readObject(),b=this.readStringAMF3();for(b=0;b<a;b++)d[b]=this.readObject();return d}if(a==a3d.Amf3Types.kObjectType){var e={},a=this.readUInt29();if(0==(a&1))return this.objectTable[a>>1];var g=this.readTraits(a),a=g.className;if(g.externalizable)e=this.readExternalizable(a); else{a=g.properties.length;for(b=0;b<a;b++)d=g.properties[b],c=this.readObject(),e[d]=c;if(g.dynamic)for(;;){a=this.readString();if(null==a||0==a.length)break;c=this.readObject();e[d]=c}}this.objectTable.push(e);return e}if(a==a3d.Amf3Types.kAvmPlusXmlType){a=this.readUInt29();if(0==(a&1))return this.stringToXML(this.objectTable[a>>1]);a>>=1;if(0==a)return null;a=this.readString(a);a=this.stringToXML(a);this.objectTable.push(a);return a}if(a==a3d.Amf3Types.kByteArrayType){a=this.readUInt29();if(0== (a&1))return this.objectTable[a>>1];a>>=1;d=new a3d.ByteArray;for(b=0;b<a;b++)d.writeByte(this.readByte());this.objectTable.push(d);return d}}}});




function launchRTMPDownload(rid) {
	var t = D.g('rtmp'+rid+'frtmpdump').value;
	var temp = t;
	
	
	
	t = t.substr(0, t.indexOf('-o '));
	if(D.g('rtmp'+rid+'fv').checked) t += '-v ';
	switch (rtmp_programa) {
		case 'easy-rtmp':
			t = 'rtmpdump ' + t.replace(/"/g,'');
			t += '-o ' + D.g('rtmp'+rid+'fnombre').value.replace(/ /g,'_');
		break;
		default:
		case 'rtmp-downloader':
			t += '-o "' + D.g('rtmp'+rid+'fnombre').value + '"';
		break;
	}
	D.g('rtmp'+rid+'frtmpdump').value = t;
	
	
	
	D.g('rtmp'+rid+'f').submit();
	cierrartmp(rid);
	
	D.g('rtmp'+rid+'frtmpdump').value = temp;
}





function prepareRTMP(rid) {
	getScript('http://localhost:25432/rtmpdownloader.js',function (){
		if(rtmpdownloader){
			activartmp(rid);
			D.g('rtmp'+rid).innerHTML="Descargar usando RTMP-Downloader";
			
			rtmp_programa = 'rtmp-downloader';
		}
	});
	getScript('http://localhost:25431/static/js/imrunning.js',function (){
		if(EasyRtmpdump){
			activartmp(rid);
			D.g('rtmp'+rid).innerHTML="Descargar usando Easy-Rtmpdump";
			D.g('rtmp'+rid+'f').setAttribute('action','http://localhost:25431/easy-rtmpdump.html');
			
			D.g('rtmp'+rid+'frtmpdump').setAttribute('name', 'command');
			
			rtmp_programa = 'easy-rtmp';
		}
	});
}



function m3u8_JD_callback(form_inputs) {
	return function() {
		var data = [];
		form_inputs.map(function(e){ data.push(e.getAttribute("name") + '=' + encodeURIComponent(e.value)); });
		
		xhr("http://127.0.0.1:9666/flashgot", data.join("&"), function(data){
			alert(data);
		}, function(){alert('Imposible conectar con JDownloader\n¿Está JDownloader ejecutándose?');});
		
		return false;
	};
}



// callback takes one argument
// http://stackoverflow.com/questions/8567114/how-to-make-an-ajax-call-without-jquery
// data = null or undefined para usar GET
function xhr(url, data, callbackOK, callbackFAIL) {
	if (callbackFAIL === undefined) callbackFAIL = function(){};
	if (callbackOK === undefined) callbackOK = function(){};
	var isPost = data !== undefined && data !== null;
	var x;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		x = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		x = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (isPost) x.open('POST', url, true);
	else        x.open('GET', url, true);
	x.timeout = 30000;
	x.onreadystatechange = x.ontimeout = function () {
		if (x.readyState == 4) {
			if (x.status == 200) {
				callbackOK(x.responseText);
			} else {
				callbackFAIL();
			}
		}
	};
	
	if (isPost) {
		if (typeof data === "string") {
			x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		} else {
			// http://stackoverflow.com/questions/2198470/javascript-uploading-a-file-without-a-file
			// data is an array of: isFile (boolean), name (string), filename (string), mimetype (string), data (variable to send / binary blob)
			var boundary = "---------------------------36861392015894";
			body = "";
			
			for (var i = 0; i < data.length; i++) {
				body += '--' + boundary + '\r\n';
				if (data[i].isFile !== undefined && data[i].isFile === true) {
					body += 'Content-Disposition: form-data; name="files[]"; filename="' + encodeURIComponent(data[i].filename) + '"\r\n'
					      + 'Content-type: ' + data[i].mimetype;
				} else {
					body += 'Content-Disposition: form-data; name="' + data[i].name + '"';
				}
				body += '\r\n\r\n' + data[i].data + '\r\n';
			}
			
			body += '--' + boundary + '--';
			
			data = body;
			console.log(data);
		
			x.setRequestHeader("Content-Type", "multipart/form-data; boundary=" + boundary);
		}
		
		x.send(data);
	} else x.send();
}

