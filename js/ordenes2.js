mueveMenu_m = 0;
mueveMenu_f = D.g('menu_scroll');
mueveMenu();
mueveSubir_m = 0;
mueveSubir_f = D.g('subir');
mueveSubir();

window.onscroll = function(e) {
	mueveMenu();
	mueveSubir();
};

D.g("subir").onclick = function() {
	scrollTo(0, 300);
};