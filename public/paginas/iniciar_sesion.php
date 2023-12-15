<?php
//seguridad de paginacion
session_start();
if(isset($_SESSION['nombre'])){
  header('Refresh: 0; URL=../../index.php');
}
include('../../app/conexiondb.php');
$conectar = conn();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Intranet Comfanorte</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="container">
  <main id="main">
  <section id="why-us" class="why-us">
    <div class="section-title">
          <span>Iniciar Sesión</span>
          <h2>Iniciar Sesión</h2>
        </div>
        <div class="row justify-content-center">
        <div class="col-6">
        <?php
                if(isset($_SESSION['mensaje'])){
               ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-hand-thumbs-up-fill me-1" style="font-size:16px;color:#a3cfbb"></i>
                <?php
                  echo ($_SESSION['mensaje']);
                  $_SESSION['mensaje']=null;
                  ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php }
              if(isset($_SESSION['mensajeError'])){
             ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-hand-thumbs-down-fill me-1" style="font-size:16px;color:#f1aeb5"></i>
              <?php
                echo ($_SESSION['mensajeError']);
                $_SESSION['mensajeError']=null;
                ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php } ?>
          <br>
        </div>  
        </div>
      <div class="container" align="center">
      
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card mb-3">
                  <div class="card-body">
                    <img src="../img/logo_comfanorte.png" alt="" class="img-fluid">
                  <div class="pt-4 pb-2">
                    <p class="text-center">Digite su correo electrónico y contraseña</p>
                  </div>
                  <form class="row g-3 needs-validation" method="post" action="../../app/control/login.php">
                    <div class="col-12">
                      <label for="correo" class="form-label">Correo Electrónico</label>
                      <input type="email" name="correo" class="form-control" id="correo" required>
                      <div class="invalid-feedback">Debe ingresar un correo electrónico  válido</div>
                    </div>
                    <div class="col-12">
                      <label for="clave" class="form-label">Contraseña</label>
                      <input type="password" name="clave" class="form-control" id="clave" required>
                      <div class="invalid-feedback">Debe ingresar la contraseña</div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <button class="btn btn-danger w-100" type="submit">Ingresar</button>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                      <a class="btn btn-warning w-100" href="../../app/control/login_google.php">
                        <img src="../img/logo_google_simple.png" title="Clic para iniciar sesión con su cuenta de Google" alt="" style="width: 20px;" > Iniciar con Google</a>
                    </div>
                  </form>
                </div>
                  </div>                  
              </div>
      </div>
    </section>
  </main>
  </div>  
  <?php include ("footer.php"); ?>
</body>
</html>