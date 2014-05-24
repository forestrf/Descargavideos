$("#formCalculador").submit(function(event){
	if(web!=""){
		document.getElementById("resultado").className += " hx100";
		document.getElementById("resultado").innerHTML = '<div class="cargando"></div>';
		scrollTo(document.getElementById('resultado'),800);
	}
});