$("#formCalculador").submit(function(event){
	if(web!=""){
		$("#resultado").addClass("hx100");
		$("#resultado").html('<div class="cargando"></div>');
		$.scrollTo('#resultado',800);
	}
});