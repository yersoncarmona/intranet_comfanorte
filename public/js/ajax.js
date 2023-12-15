function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();
function from(id,ide,url){
		var mi_aleatorio=parseInt(Math.random()*99999999);
		var vinculo=url+"?id="+id+"&rand="+mi_aleatorio;
		miPeticion.open("GET",vinculo,true);
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
                       if (miPeticion.status==200)
                       {
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;
                       }
               }
       }
       miPeticion.send(null);
}

function consultarEmpleados() {
  var proceso=document.getElementById('proceso').value;
  var vinculo="../../app/control/consultarEmpleados.php?proceso="+proceso;
  miPeticion.open("GET",vinculo,true);
  miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
    if (miPeticion.readyState==4)
    {
      if (miPeticion.status==200)
      {
        var http=miPeticion.responseText;
        document.getElementById('div-empleados').innerHTML= http;
      }
    }
  }
  miPeticion.send(null);
}
