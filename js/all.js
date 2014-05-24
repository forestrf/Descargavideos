function ready(f){/in/.test(document.readyState)?setTimeout(ready,99,f):f();}

function qC(e,c){e.className=e.className.split(c).join("");}function aC(e,c){e.className+=" "+c;}

function scrollTo(e,d){if(d<0)return;var h=document.documentElement;if(h.scrollTop===0){var t=h.scrollTop;++h.scrollTop;h=t+1===h.scrollTop--?h:document.body;}if(typeof e==="object")e=e.offsetTop;scrollToX(h,h.scrollTop,e,0,1/d,20);}
function scrollToX(e,a,b,t,v,s){if(t<0||v<=0)return;k=t>1?0:t-1;e.scrollTop=a-(a-b)*(k*k*k+1);t+=v*s;if(t<=1)setTimeout(function(){scrollToX(e,a,b,t,v,s);},s);}

function getScript(url,callback){var script=document.createElement('script');script.type='text/javascript';script.src=url;script.onload=callback;script.onreadystatechange=function(){if(this.readyState=='complete'){callback();}};document.getElementsByTagName('head')[0].appendChild(script);}

function getFlashMovie(movieName){var isIE=navigator.appName.indexOf("Microsoft")!=-1;return(isIE)?window[movieName]:document[movieName];}

function lcs(a){if(document.createStyleSheet)document.createStyleSheet(a);else document.head.innerHTML+='<link rel="stylesheet" type="text/css" href="'+a+'" />';}
function rcs(a){var l=document.querySelectorAll('link');for(var i=0;i<l.length;++i)if(l[i].attributes['href'] != null && l[i].attributes['href'].textContent.indexOf(a)!=-1)l[i].remove();}
function lcss(n,a){if(n!=a){lcs("/css/modos/"+n+".css");if(a!=-1)rcss(a,-1);}}
function rcss(n,a){if(n!=a){rcs("/css/modos/"+n+".css");if(a!=-1)lcss(a,-1);}}

function mueveMenu(){if((document.body.scrollTop||document.documentElement.scrollTop)>document.getElementById('contenido').offsetTop){if(!mueveMenu.m){aC(mueveMenu.f,"menu_fixed");mueveMenu.m=1;}}else if(mueveMenu.m){qC(mueveMenu.f,"menu_fixed");mueveMenu.m=0;}}


ready(function(){
	mueveMenu.m=0;mueveMenu.f=document.getElementById('menu_scroll');mueveMenu();
	
	document.getElementById('radio1').onclick=function(){setModoPic(1);};document.getElementById('radio2').onclick=function(){setModoPic(2);};webI=document.getElementById('web');function f(e){var a=document.getElementById('ayuda1');var b=document.getElementById('ayuda2');if(webI.value.length>0||e==1){qC(b,"invisible");aC(a,"invisible");}else{aC(b,"invisible");qC(a,"invisible");}}webI.onblur=f;f();webI.onfocus=function(){f(1);};
	
	document.getElementById("formCalculador").onsubmit=function(e){if(e.target['web'].value=="")return false;aC(document.getElementById('resultado'),"hx100");document.getElementById('resultado').innerHTML='<div class="cargando"></div>';scrollTo(document.getElementById('resultado'),500);};
	window.addEventListener('scroll',function(e){mueveMenu();},false);
});
