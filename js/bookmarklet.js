// Hacer asíncrono por si acaso necesitamos hacer xhr

console.log("Cargando Descargavideos");

function bookmarklet_xhr(){
	lanzaDVxhr(document.location, document.body.innerHTML);
}
function bookmarklet_form(){
	lanzaDVform(document.location, document.body.innerHTML);
}



bookmarklet_xhr();


// -----------------------------------------------------------------------------------------------



// Funciones extra
// callback takes one argument
// http://stackoverflow.com/questions/8567114/how-to-make-an-ajax-call-without-jquery
function xhr(url, data, callbackOK, callbackFAIL) {
	var x, postMode = data !== '' && data !== null && data !== undefined;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		x = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		x = new ActiveXObject("Microsoft.XMLHTTP");
	}
	x.open(postMode ? 'POST' : 'GET', url, true);
	x.timeout = 30000; // 30 segundos
	x.onreadystatechange = x.ontimeout = function () {
		if (x.readyState == 4) {
			if (x.status == 200) {
				callbackOK(x.responseText);
			} else {
				callbackFAIL();
			}
		}
	};

	if (postMode) {
		x.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		x.send(data);
	} else x.send();
}

function lanzaDVxhr(web, contenidoWeb) {
	xhr(
		'//www.descargavideos.tv/bm2.php',
		"bookmarklet=1&web=" + encodeURIComponent(web) + "&src=" + encodeURIComponent(contenidoWeb),
		function (data) {
			console.log(data);
			eval(data);
		},
		function () {
			alert("Descargavideos ha fallado");
		}
	);
}

function lanzaDVform(web, contenidoWeb) {
	var form = document.createElement("form");
	form.setAttribute("method", "post");
	form.setAttribute("action", "//www.descargavideos.tv/web/bookmarklet/");

	var hiddenField = document.createElement("input");
	hiddenField.setAttribute("type", "hidden");
	hiddenField.setAttribute("name", "web");
	hiddenField.setAttribute("value", web);
	form.appendChild(hiddenField);

	hiddenField = document.createElement("input");
	hiddenField.setAttribute("type", "hidden");
	hiddenField.setAttribute("name", "src");
	hiddenField.setAttribute("value", contenidoWeb);
	form.appendChild(hiddenField);
	
	hiddenField = document.createElement("input");
	hiddenField.setAttribute("type", "hidden");
	hiddenField.setAttribute("name", "bmgenerated");
	hiddenField.setAttribute("value", "true");
	form.appendChild(hiddenField);

	document.body.appendChild(form);
	form.submit();
}
