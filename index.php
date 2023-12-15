<?php
//seguridad de paginacion
session_start();
if(!isset($_SESSION['nombre'])){
  header('Refresh: 0; URL=public/paginas/iniciar_sesion.php');
}
include('app/conexiondb.php');
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
  <link href="public/assets/img/favicon.png" rel="icon">
  <link href="public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="public/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="public/assets/css/style.css" rel="stylesheet">
</head>
<body>
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">gestion.tecnologica@comfanorte.com.co</a>
        <i class="bi bi-phone-fill phone-icon"></i> 5823455 EXT 474
      </div>
      <div class="social-links d-none d-md-block">
        <a href="https://servicios.comfanorte.com.co:8686/MesadeServicio/" target="_blank"><i class="bi bi-question-circle-fill text-danger"></i></a>
      </div>
    </div>
  </section>
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo"><img src="public/assets/img/logo_blanco.png" alt="" class="img-fluid"></a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li class="dropdown"><a href="#"><span>Directorio</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="public/paginas/directorio_empleados.php">Trabajadores</a></li>
              <li><a href="public/paginas/directorio_sistemas_informacion.php">Sistemas de Información</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Calendario</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="public/paginas/eventos.php">Eventos</a></li>
              <li><a href="public/paginas/capacitaciones.php">Capacitaciones</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Biblioteca</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="public/paginas/manuales.php">Manuales</a></li>
              <li><a href="public/paginas/formatos.php">Formatos</a></li>
              <li><a href="public/paginas/documentos.php">Documentos</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Cartelera</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="public/paginas/noticias.php">Noticias</a></li>
              <li><a href="public/paginas/comunicados.php">Comunicados</a></li>
            </ul>
          </li>
          <?php if(!isset($_SESSION['nombre'])) {?>
          <li><a class="nav-link scrollto" href="public/paginas/iniciar_sesion.php">Iniciar Sesión</a></li>
          <?php } else{if($_SESSION['perfil_usuario']=='ADMINISTRADOR'){?>
            <li class="dropdown"><a href="#"><span>Administración</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Gestión Trabajadores</a></li>
              <li><a href="#">Gestión S.I</a></li>
              <li><a href="#">Gestión Calendario</a></li>
              <li><a href="#">Gestión Biblioteca</a></li>
              <li><a href="#">Gestión Cartelera</a></li>
              <li><a href="#">Gestión Usuarios</a></li>
            </ul>
          </li>
            <?php }if($_SESSION['perfil_usuario']=='CALENDARIO'){?>
            <li class="dropdown"><a href="#"><span>Administración</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Gestión Calendario</a></li>
            </ul>
          </li>
            <?php }if($_SESSION['perfil_usuario']=='CARTELERA'){?>
            <li class="dropdown"><a href="#"><span>Administración</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Gestión Cartelera</a></li>
            </ul>
          </li>
            <?php }?>
            <li class="dropdown"><a href="#"><i class="bi bi-person"></i> <span><?php echo $_SESSION['nombre'] ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Perfil de Usuario</a></li>
              <li><a class="nav-link scrollto" href="app/control/cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
          </li>
          
          <?php }?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>Bienvenido</h1>
      <h2>A la Intranet Comfanorte <br>Espacio exclusivo para trabajadores de Comfanorte</h2>
    </div>
  </section>
  <main id="main">
    <div class="row">
    <div class="col-md-3 col-lg-3">
    <section id="why-us" class="why-us">
      <div class="container">
        <div class="">
        <?php
                  $sql = "SELECT * FROM evento where estado='ACTIVO' order by fecha DESC LIMIT 3";
                  $resultado = mysqli_query($conectar, $sql);
                  while ($row = mysqli_fetch_assoc($resultado)) {
                  ?>
                    <div class="col" data-aos="fade-up">
                      <div class="h-100 d-flex">
                        <div class="box">
                          <span><i class="bi bi-calendar-event-fill"></i> EVENTO</span>
                          <h4><?php echo $row['nombre']?></h4>
                          <div align="left">
                              <p style="text-align:justify"><strong>DESCRIPCIÓN:</strong> <?php echo $row['descripcion']?></p>
                              <p><strong>MODALIDAD:</strong> <?php echo $row['modalidad']?></p>                              
                              <p><strong>FECHA:</strong> <?php echo $row['fecha']?></p>
                              <?php if(!empty($row['lugar'])){ ?>
                                <p><strong>LUGAR:</strong> <?php echo $row['lugar']?></p>
                              <?php } ?> 
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
    </div>
    <div class="col-md-9 col-lg-9">
    <section id="about" class="about">
    <div class="section-title">
          <span>Últimas Noticias</span>
          <h2>Últimas Noticias</h2>
        </div>
      <div class="container">
      <?php
                  $sql = "SELECT * FROM anuncio where estado='ACTIVO' order by fecha DESC LIMIT 2";
                  $resultado = mysqli_query($conectar, $sql);
                  while ($row = mysqli_fetch_assoc($resultado)) {
                  ?>
                    <div class="">
                      
                      <div class=" content" data-aos="fade-right">
                        <p class="text-danger"><i class="bi bi-calendar-event"></i> <?php echo $row['fecha']?></p>
                        <h3 data-aos="fade-right"><?php echo $row['nombre']?></h3>
                        <div class="" data-aos="fade-left">
                        <img align="center" src="public/img/noticias/<?php echo $row['ubicacion_imagen']?>" class="" style="width: 50%; height: 50%;float:left;margin-right: 15px;" alt="">
                        </div>
                        <br>
                        <p class="fst-italic " style="text-align: justify" data-aos="fade-right"><?php echo $row['descripcion']?>
                        </p>
                      </div>
                    </div>
                    <hr>
                  <?php
                  }
                  ?>
      </div>
    </section>
    </div> 
    </div>      
  </main>
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Comfanorte</span></strong>. Todos los derechos reservados
      </div>
      <div class="credits">
        Desarrollado por Yerson Carmona</a>
      </div>
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <script src="public/assets/vendor/aos/aos.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="public/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="public/assets/vendor/php-email-form/validate.js"></script>
  <script src="public/assets/js/main.js"></script>
</body>
</html>