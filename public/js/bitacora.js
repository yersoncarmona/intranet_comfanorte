function mostrarPassword(opcion){
  if(opcion==1){
    var cambio = document.getElementById("clave");
		if(cambio.type == "password"){
			cambio.type = "text";
      document.getElementById('ojito').className = "ocultar-clave";
		}else{
			cambio.type = "password";
			document.getElementById('ojito').className = "mostrar-clave";
		}
  }
  else if(opcion==2){
    var cambio = document.getElementById("reClave");
		if(cambio.type == "password"){
			cambio.type = "text";
      document.getElementById('ojito2').className = "ocultar-clave";
		}else{
			cambio.type = "password";
			document.getElementById('ojito2').className = "mostrar-clave";
		}
  }
  }

  function validaConfirmacionClave(){
    var clave1= document.getElementById('clave').value;
    var clave2= document.getElementById('reClave').value;
    if(clave1==clave2){
      document.getElementById('reClave').classList.remove('is-invalid');
      document.getElementById('clave').classList.remove('is-invalid');
    }
    else{
      document.getElementById('reClave').classList.add('is-invalid');
    }
}

const $formulario = document.getElementById("formRegistro");
$formulario.onsubmit = evento => {
  evento.preventDefault();
  evento.stopPropagation();
  var valido=true;
  var clave1= document.getElementById('clave').value;
  var clave2= document.getElementById('reClave').value;
  if(clave1!=clave2){
    document.getElementById('reClave').classList.add('is-invalid');
    location.hash='#reClave';
    valido=false;
    return ;
  }
  if (clave1.length < 8) {
    document.getElementById('clave').classList.add('is-invalid');
    location.hash='#clave';
    valido=false;
    return;
  }

  if(!clave1.match(/[a-z]/)){
	  document.getElementById('clave').classList.add('is-invalid');
    location.hash='#clave';
    valido=false;
    return;
  }

  // Valida letra mayuscula
    if(!clave1.match(/[A-Z]/)){
      document.getElementById('clave').classList.add('is-invalid');
      location.hash='#clave';
      valido=false;
      return;
    }

// Valida número
    if(!clave1.match(/\d/)){
      document.getElementById('clave').classList.add('is-invalid');
      location.hash='#clave';
      valido=false;
      return;
    }
  document.getElementById('clave').classList.remove('is-invalid');
  if(valido){
    $formulario.submit();
  }
}
