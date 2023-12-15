<?php
session_start();
require_once '../../public/google-api-php-client--PHP8.0/vendor/autoload.php';
$clientID = '901365812428-99615igs89jjh08dkkm9j1nrl0frm6uq.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/intranet/app/control/login_google.php';
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $_SESSION['email'] =  $google_account_info->email;
  $email = $google_account_info->email;
  $_SESSION['nombre'] =  $google_account_info->name;

  include('../conexiondb.php');
  $conectar = conn();
  $consulta="SELECT * FROM usuario
                        WHERE email='$email'";
    if (!$resultado = $conectar->query($consulta)) {
      echo($consulta);
    }
    else{
      if ($resultado->num_rows == 0) {
        $_SESSION['perfil_usuario']='VISITANTE';
      }
      else{
        $usuario = $resultado->fetch_assoc();
        if($usuario['estado']=='INACTIVO'){
          $_SESSION['mensajeError']="Acceso Denegado: Usuario INACTIVO.";
          $_SESSION['email'] =  null;
          $_SESSION['nombre'] =  null;
        }
        else{
          $_SESSION['id_usuario']=$usuario['id_usuario'];
          $_SESSION['email']=$usuario['email'];
          $_SESSION['nombre']=$usuario['nombre'];
          $_SESSION['perfil_usuario']=$usuario['perfil'];
        }        
      }
    }
  header('Refresh: 0; URL=../../index.php');
} else {
  $authUrl = $client->createAuthUrl();
  header("Refresh: 0; URL=$authUrl");
}
?>