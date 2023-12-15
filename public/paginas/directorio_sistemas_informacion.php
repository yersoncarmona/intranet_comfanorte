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
  <section id="services" class="services">
      <div class="container">
        <div class="section-title">
          <span>Directorio de Sistemas de Información</span>
          <h2>Directorio de Sistemas de Información</h2>
        </div>
        <div class="row">
        <?php
                  $sql = "SELECT a.*, t.nombre AS tipo FROM aplicacion a 
                        INNER JOIN tipo_aplicacion t ON a.id_tipo_aplicacion=t.id_tipo_aplicacion
                        WHERE a.estado='ACTIVO' order by a.nombre ASC";
                  $resultado = mysqli_query($conectar, $sql);
                  while ($row = mysqli_fetch_assoc($resultado)) {
                  ?>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                      <div class=" h-100 d-flex" data-aos="fade-up">
                        <div class="icon-box">
                          <div ><img src="../img/<?php echo $row['ubicacion_imagen']?>" alt="logo" style="max-width: 250px;"></div>
                          <h4><a href=""><?php echo $row['nombre']?></a></h4>
                          <p><?php echo $row['descripcion']?></p>
                          <br>
                          <div align="left">
                            <p><strong>TIPO:</strong> <?php echo $row['tipo']?></p>
                            <p><strong>FORMA DE ACCESO:</strong> <?php echo $row['forma_acceso']?></p>
                            <?php if(!empty($row['url'])){ ?>
                              <p><strong>URL:</strong> <a class="text-black" href="<?php echo $row['url']?>" target="_blank">Clic aquí</a></p>                        
                              <?php } ?>   
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