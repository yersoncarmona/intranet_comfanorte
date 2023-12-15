<?php
  session_start();
  include('../conexiondb.php');
  $conectar = conn();
  include "../util/funciones.php";
  if(!empty($_POST))
  {
    $email=strtoupper(EntradaSegura($_POST['correo']));
    $clave=md5(EntradaSegura($_POST['clave']));
    $consulta="SELECT * FROM usuario
                        WHERE email='$email' AND clave='$clave' AND estado='ACTIVO'";
    if (!$resultado = $conectar->query($consulta)) {
      echo($consulta);
    }
    else{
      if ($resultado->num_rows == 0) {
        $_SESSION['mensajeError']="Acceso Denegado: Correo o Clave incorrecta.";
        header("Location:../../public/paginas/iniciar_sesion.php");
      }
      else{
        $usuario = $resultado->fetch_assoc();
        $_SESSION['id_usuario']=$usuario['id_usuario'];
        $_SESSION['email']=$usuario['email'];
        $_SESSION['nombre']=$usuario['nombre'];
        $_SESSION['perfil_usuario']=$usuario['perfil'];
        $_SESSION['ip_usuario']=getRealIP();
        header("Location:../../index.php");
      }
    }
  }
 ?>