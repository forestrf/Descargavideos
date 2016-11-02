webI = D.g('web');
function webF(e) {
	var i = "invisible";
	var a = D.g('ayuda1');
	var b = D.g('ayuda2');
	if (webI.value.length > 0 || e == 1) {
		qC(b, i);
		aC(a, i);
	} else {
		aC(b, i);
		qC(a, i);
	}
}
webI.onblur = webF;
webF();
webI.onfocus = function() {
	webF(1);
};

D.g("formCalculador").onsubmit = function(e) {
	var a = D.g('resultado');
	a.innerHTML = "";
	qC(a, "displaynone");
	aC(a, "cargando");
	xhr("/?ajax=1", "web=" + encodeURIComponent(D.g("web").value), muestraResultadoAjax, muestraFalloAjax);
	return false;
};
function muestraResultadoAjax(data) {
	var a = D.g('resultado');
	
	qC(a, "cargando");
	
	scrollTo(D.g('formCalculador'), 300);
	
	a.innerHTML = data;
	
	var arr = a.getElementsByTagName('script');
	for (var n = 0; n < arr.length; n++)
		eval.call(window, arr[n].innerHTML);//run script inside div with global scope
}
function muestraFalloAjax(data) {
	/*
	var a = D.g('resultado');
	qC(a, "cargando");
	a.innerHTML = "<div class='alerta_especifica problema_xhr'>Ha habido un problema.</div>";
	scrollTo(D.g('formCalculador'), 300);
	*/
	D.g("formCalculador").submit();
}
