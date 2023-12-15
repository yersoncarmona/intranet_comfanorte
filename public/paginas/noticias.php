<?php
//seguridad de paginacion
session_start();
if(!isset($_SESSION['nombre'])){
  header('Refresh: 0; URL=iniciar_sesion.php');
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
  <?php include ("menu.php"); ?>
  <main id="main">
  <section id="why-us" class="why-us">
    <div class="section-title">
          <span>Noticias</span>
          <h2>Noticias</h2>
        </div>
        <div class="container">
      <?php
                  $sql = "SELECT * FROM anuncio where id_tipo_anuncio=1 AND estado='ACTIVO' order by fecha DESC";
                  $resultado = mysqli_query($conectar, $sql);
                  while ($row = mysqli_fetch_assoc($resultado)) {
                  ?>
                    <div class="">
                      
                      <div class=" content" data-aos="fade-right">
                        <p class="text-danger"><i class="bi bi-calendar-event"></i> <?php echo $row['fecha']?></p>
                        <h3><?php echo $row['nombre']?></h3>
                        <div class="" data-aos="fade-left">
                        <img data-aos="fade-left" src="../img/noticias/<?php echo $row['ubicacion_imagen']?>" class="img-fluid" style="width: 50%; height: 50%;float:left;margin-right: 15px;" alt="">
                        </div>
                        <br>
                        <p class="fst-italic " style="text-align: justify"><?php echo $row['descripcion']?>
                        </p>
                      </div>
                    </div>
                    <hr>
                  <?php
                  }
                  ?>
      </div>
    </section>
  </main>
  <?php include ("footer.php"); ?>
</body>
</html>