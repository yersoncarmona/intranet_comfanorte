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
          <span>Formatos</span>
          <h2>Formatos</h2>
        </div>
      <div class="container">
        <div class="row">
        <?php
                  $sql = "SELECT * FROM archivo where id_tipo_archivo=3 AND estado='ACTIVO' order by nombre ASC";
                  $resultado = mysqli_query($conectar, $sql);
                  while ($row = mysqli_fetch_assoc($resultado)) {
                  ?>
                  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                  <div class="h-100 d-flex">
                    <div class="box">
                      <h4 align="center"><i class="bi bi-file-earmark-text"></i> <?php echo $row['nombre']?></h4>
                      <div align="left">
                          <p style="text-align:justify"><strong>DESCRIPCIÓN:</strong> <?php echo $row['descripcion']?></p>
                          <br>
                          <?php if(!empty($row['ubicacion_archivo'])){?>
                          <div align="center">
                            <a href="manual.php?id=<?php echo $row['id_archivo']?>" class="btn btn-danger "><i class="bi bi-file-earmark-pdf-fill"></i> VER</a>
                          </div>   
                          <?php } if(!empty($row['url'])){?>
                          <div align="center">
                            <a href="<?php echo $row['url']?>" class="btn btn-danger " target="_blank"><i class="bi bi-file-earmark-text"></i> IR</a>
                          </div>   
                          <?php }?>               
                        </div>
                    </div>
                  </div>            
                </div>
                  <?php
                  }
                  ?>
          
        </div>
      </div>
    </section>
  </main>
  <?php include ("footer.php"); ?>
</body>
</html>