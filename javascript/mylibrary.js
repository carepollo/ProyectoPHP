//Libreria de funciones front/back-end javascript

// cambiar imagen de HTML
function changeAttr(target, atribt){
	var subject = document.getElementById(target);
	subject.removeAttribute('src');
	subject.setAttribute('src', atribt);
}

//capturar elemento clickeado (preventiva)
function obtenerClick(e){
	if (e.srcElement){
		tag = e.srcElement.id;
	}
	else if (e.target){
		tag = e.target.id;
	}
	return tag;
}

// pulir una id, quitarle nombres y dejar unicamente su categoria o perteneciente (uso interno)
function obtenerID(id){
	var separador = id.indexOf('-') + 1;
	tag = id.slice(separador);
	tag = tag.replace(/_/g, ' ');
	return tag;
}

//ajax
function ajaxAdd(elemento, direccion, destino){
	var ajax = new XMLHttpRequest();
	var datos = document.getElementById(elemento);
	var destino = document.getElementById(destino);
	datos.addEventListener('submit', (e) => {
		e.preventDefault();
		var formu = new FormData(datos);
		ajax.open('POST', direccion, true);
		ajax.onload = () => {
			if(ajax.status == 200){
				destino.innerHTML = ajax.responseText;
				console.warn('si->' + ajax.readyState);
				alertify.success('Acción Exitosa');
			}
			else if(ajax.responseText == 'error'){
				alertify.error('Ocurrió un Error');
			}
			else{
				console.error('error de conexion-> estatus: ' + ajax.status + ', ready estatus: ' + ajax.readyState);
				alertify.error('Ocurrió un Error');
			}	
		}
		ajax.send(formu);
	});
}
function ajaxValue(destino, contenido){
    var ajax = new XMLHttpRequest(),
    destinos = document.getElementsByClassName(destino),
    url = "php/accionesCatalogo.php?",
    i = 0;
    while (i < destinos.length) {
        if (destinos[i + 1] == undefined) {
            url += destinos[i].name + "=" + contenido[i];
        }
        else {
            url += destinos[i].name + "=" + contenido[i] + '&';
        }
        i++;
    }
    i = 0;
	ajax.open("GET", url, true);
	ajax.onload = () => {
	  if (ajax.status == 200) {
          while (i < destinos.length){
              console.log("se recibe: " + ajax.responseText);
              destinos[i].setAttribute('value', ajax.responseText);
              i++;
          }
	  }
	  else{
		console.log("no: " + ajax.status);
	  }
	};
	ajax.send();
}
function ajaxDelete(limite, direccion){
	var ajax = new XMLHttpRequest();
	document.addEventListener('click', (e) => {
		var destino = document.getElementById(direccion);
		if (e.srcElement){
			tag = e.srcElement.id;
		}
		else if (e.target){
			tag = e.target.id;
		}
		if (!tag.indexOf(limite)){
			ajax.open("GET", 'php/accionesCatalogo.php?' + limite + '=' + obtenerID(tag), true);
			ajax.onload = () => {
	  			if (ajax.status == 200 && ajax.responseText != 'error') {
					destino.innerHTML = ajax.responseText;
					alertify.success('Acción Exitosa');
					console.warn('si: ajax elimino: ' + ajax.responseText);
				}
				else{
					console.error('error de ajax')
		  		}
			};
			ajax.send();
		}
		else{
			console.log('operacion cancelada: ' + tag);
			return null;
		}
	});
}

function ajaxAdd_A(elemento, direccion, destino){
	var ajax = new XMLHttpRequest();
	var datos = document.getElementById(elemento);
	datos.addEventListener('submit', (e) => {
		e.preventDefault();
		var formu = new FormData(datos);
		ajax.open('POST', direccion, true);
		ajax.onload = () => {
			console.warn(ajax.responseText);
			if(ajax.status == 200 && ajax.responseText != 'error'){
				var complemento = JSON.parse(ajax.responseText);
				var target = document.getElementById(destino + '-' + complemento[0]);
				target.innerHTML = complemento[1];
				console.log('Success ADD_DATA' + ajax.readyState);
				alertify.success('Acción Exitosa');
			}
			else{
				console.error('error ADD_DATA ' + ajax.status + ', ready estatus: ' + ajax.readyState);
				alertify.error('Ocurrió un Error');
			}	
		}
		ajax.send(formu);
	});
}
function ajaxValue_A(destino, contenido){
	// ajax alterno trabajando con json
    var ajax = new XMLHttpRequest(),
    destinos = document.getElementsByClassName(destino),
    url = "php/accionesCatalogo.php?";
    for (var i = 0 ; i < destinos.length; i++) {
        if (destinos[i + 1] == undefined) {
            url += destinos[i].name + "=" + contenido[i];
        }
        else {
            url += destinos[i].name + "=" + contenido[i] + '&';
        }
    }
    i = 0;
	ajax.open("GET", url, true);
	ajax.onload = () => {
		if (ajax.status == 200) {
        	while (i < destinos.length){
				console.log(ajax.responseText);
				var respuesta = JSON.parse(ajax.responseText)[i];
	            destinos[i].setAttribute('value', respuesta);
            	i++;
          	}
	  	}
	  	else{
			console.log("no: " + ajax.status);
	  	}
	};
	ajax.send();
}
function ajaxDelete_A(limite, target){
	var ajax = new XMLHttpRequest();
	document.addEventListener('click', (e) => {
		if (e.srcElement){
			tag = e.srcElement.id;
			from = e.srcElement.getAttribute('name');
		}
		else if (e.target){
			tag = e.target.id;
			from = e.target.getAttribute('name');
		}
		if (!tag.indexOf(limite)){
			var url = 'php/accionesCatalogo.php?' + limite + '=' + obtenerID(tag) + "&categoria=" + obtenerID(from);
			console.warn(url);
			ajax.open("GET", url, true);
			ajax.onload = () => {
	  			if (ajax.status == 200 && ajax.responseText != 'error') {
					console.warn(ajax.responseText);
					var respuesta = JSON.parse(ajax.responseText);
					var destino = document.getElementById(target + '-' + respuesta[0]);
					destino.innerHTML = respuesta[1];
					alertify.success('Acción Exitosa');
					console.log('Success DELETE_DATA ' + ajax.responseText);
				}
				else{
					console.error('error DELETE_DATA')
		  		}
			};
			ajax.send();
		}
		else{
			console.log('operacion cancelada: ' + tag);
			return null;
		}
	});
}

// websockets

