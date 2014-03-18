//cargar y quitar CSS y JS
function lcs(filename){
	$("head").append('<link rel="stylesheet" type="text/css" href="'+filename+'"></link>')
}
function rcs(filename){
	$("link").each(function(){
		if($(this)&&$(this).attr("href")!=null&&$(this).attr("href").indexOf(filename)!=-1)
		$(this).remove()
	});
}

function lcss(number, actual){
	if(number!=actual){
		lcs("/css/modos/"+number+".css")
		if(actual!=-1)
			rcss(actual,-1)
	}
}
function rcss(number, actual){
	if(number!=actual){
		rcs("/css/modos/"+number+".css")
		if(actual!=-1)
			lcss(actual,-1)
	}
}