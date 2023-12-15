  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:gestion.tecnologica@comfanorte.com.co">gestion.tecnologica@comfanorte.com.co</a>
        <i class="bi bi-phone-fill phone-icon"></i> 5823455 EXT 474
      </div>
      <div class="social-links d-none d-md-block">
        <a href="https://servicios.comfanorte.com.co:8686/MesadeServicio/" target="_blank"><i class="bi bi-question-circle-fill"></i></a>
      </div>
    </div>
  </section>
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="../../index.php" class="logo"><img src="../assets/img/logo_blanco.png" alt="" class="img-fluid"></a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="../../index.php">Inicio</a></li>
          <li class="dropdown"><a href="#"><span>Directorio</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="directorio_empleados.php">Trabajadores</a></li>
              <li><a href="directorio_sistemas_informacion.php">Sistemas de Información</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Calendario</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="eventos.php">Eventos</a></li>
              <li><a href="capacitaciones.php">Capacitaciones</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Biblioteca</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="manuales.php">Manuales</a></li>
              <li><a href="formatos.php">Formatos</a></li>
              <li><a href="documentos.php">Documentos</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Cartelera</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="noticias.php">Noticias</a></li>
              <li><a href="comunicados.php">Comunicados</a></li>
            </ul>
          </li>
          <?php if(!isset($_SESSION['nombre'])) {?>
          <li><a class="nav-link scrollto" href="iniciar_sesion.php">Iniciar Sesión</a></li>
          <?php } else{ if($_SESSION['perfil_usuario']=='ADMINISTRADOR'){?>
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
              <li><a class="nav-link scrollto" href="../../app/control/cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
          </li>
          
          <?php }?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>