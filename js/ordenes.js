mueveMenu_m = 0;
mueveMenu_f = D.getElementById('menu_scroll');
mueveMenu();

D.getElementById('radio1').onclick = function(e) {
	setModoPic(1);
	var a=D.createAttribute("checked");a.value=true;
	this.setAttributeNode(a);
	D.getElementById('radio2').removeAttribute('checked');
};
D.getElementById('radio2').onclick = function(e) {
	setModoPic(2);
	D.getElementById('radio1').removeAttribute('checked');
	var a=D.createAttribute("checked");a.value=true;
	this.setAttributeNode(a);
};
webI = D.getElementById('web');
function webF(e) {
	var a = D.getElementById('ayuda1');
	var b = D.getElementById('ayuda2');
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

D.getElementById("formCalculador").onsubmit = function(e) {
	aC(D.getElementById('resultado'), "hx100");
	D.getElementById('resultado').innerHTML = '<div class="cargando"></div>';
	scrollTo(D.getElementById('resultado'), 500);
};
window.onscroll = function(e) {
	mueveMenu();
};
