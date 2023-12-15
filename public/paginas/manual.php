<?php
//seguridad de paginacion
session_start();
if(!isset($_SESSION['nombre'])){
  header('Refresh: 0; URL=iniciar_sesion.php');
}
include('../../app/conexiondb.php');
$conectar = conn();
$id=$_GET['id'];
$sql = "SELECT * FROM archivo where id_archivo=$id AND estado='ACTIVO'";
$resultado = mysqli_query($conectar, $sql);
if(!$row = mysqli_fetch_assoc($resultado)){
  header('Refresh: 0; URL=manuales.php');
}
if(empty($row['ubicacion_archivo'])){
  header('Refresh: 0; URL=manuales.php');
}
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
          <span>MANUAL</span>
          <h2>MANUAL</h2>
        </div>
      <div class="container">
      <div class="card">
          <div class="card-header" align="center">
            <h3><i class="bi bi-file-earmark-pdf-fill text-danger"></i> <?php echo $row['nombre']?></h3>            
          </div>
          <div class="card-body">
            <embed src="../manuales/<?php echo $row['ubicacion_archivo']?>" type="application/pdf" width="100%" height="600px" />            
          </div>
          <div align="center" class="card-footer">
            <a href="manuales.php"class="btn btn-danger"><i class="bi bi-arrow-left-square-fill"></i> REGRESAR</a>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include ("footer.php"); ?>
</body>
</html>