mueveMenu_m = 0;
mueveMenu_f = document.getElementById('menu_scroll');
mueveMenu();

document.getElementById('radio1').onclick = function(e) {
	setModoPic(1);
	var a=document.createAttribute("checked");a.value=true;
	this.setAttributeNode(a);
	document.getElementById('radio2').removeAttribute('checked');
};
document.getElementById('radio2').onclick = function(e) {
	setModoPic(2);
	document.getElementById('radio1').removeAttribute('checked');
	var a=document.createAttribute("checked");a.value=true;
	this.setAttributeNode(a);
};
webI = document.getElementById('web');
function webF(e) {
	var a = document.getElementById('ayuda1');
	var b = document.getElementById('ayuda2');
	if (webI.value.length > 0 || e == 1) {
		qC(b, "invisible");
		aC(a, "invisible");
	} else {
		aC(b, "invisible");
		qC(a, "invisible");
	}
}
webI.onblur = webF;
webF();
webI.onfocus = function() {
	webF(1);
};

document.getElementById("formCalculador").onsubmit = function(e) {
	aC(document.getElementById('resultado'), "hx100");
	document.getElementById('resultado').innerHTML = '<div class="cargando"></div>';
	scrollTo(document.getElementById('resultado'), 500);
};
window.onscroll = function(e) {
	mueveMenu();
};
