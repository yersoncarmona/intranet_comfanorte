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
    <section id="team" class="team">
      <div class="container">
        <div class="section-title">
          <span>Directorio Empleados</span>
          <h2>Directorio Empleados</h2>
        </div>
        <div class=" alert alert-danger row g-3">
            <div class="col-auto">
                <label>Seleccione el Proceso para mostrar el listado de trabajadores.</label>
            </div>
            <div class="col-6">
                <select class="form-select " aria-label="Default select example" id="proceso">
                    <option selected disabled>Seleccione un Proceso</option>
                    <?php
                  //Se consulta tipos de proceso
                  $sql = "SELECT * FROM proceso where estado='ACTIVO' order by nombre ASC";
                  $resultado = mysqli_query($conectar, $sql);
                  while ($row = mysqli_fetch_assoc($resultado)) {
                  ?>
                    <option value="<?php echo $row['id_proceso']; ?>"><?php echo $row['nombre']; ?></option>
                  <?php
                  }
                  ?>
                </select>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-danger mb-3" onclick="consultarEmpleados()"><i class="bi bi-person-lines-fill"></i> Mostrar</button>
            </div>
        </div>
        <div class="row" id="div-empleados">          
        </div>
      </div>
    </section>
  </main>
  <?php include ("footer.php"); ?>
  <script src="../js/ajax.js"></script>
</body>
</html>