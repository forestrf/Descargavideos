function mueveMenu(){
	var aboveHeight=$('#contenido').offset().top;
	if($(window).scrollTop()>aboveHeight)
		$('#menu_scroll').addClass('menu_fixed');
	else
		$('#menu_scroll').removeClass('menu_fixed');
}
		
(function(){
	var cl="invisible";
	var b=jQuery('#ayuda2');
	var c=jQuery('#ayuda1');
	var a=jQuery('.entrada');
	var f=function f(){
		if(a.val().length>0){
			b.removeClass(cl);
			c.addClass(cl);
		}
		else{
			b.addClass(cl);
			c.removeClass(cl);
		}
	};
	a.blur(f);
	a.each(f);
	a.focus(function(){
		b.removeClass(cl);
		c.addClass(cl);
	});
}());

function setModoPic(id){
	switch(id){
		case 1:
			document.getElementsByName('web')[0].placeholder="Pega la URL del vídeo...";
			$("#ayuda1txt").html("Copia la url donde está el vídeo");
			$("#ayuda2txt").html("Busca el enlace del vídeo");
		break;
		case 2:
			document.getElementsByName('web')[0].placeholder="Buscar canción...";
			$("#ayuda1txt").html("Escribe el nombre de la canción");
			$("#ayuda2txt").html("Busca la canción");
		break;
	}
}