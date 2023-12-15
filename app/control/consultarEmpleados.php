<?php
  include("../conexiondb.php");
  $conectar = conn();
  $proceso=$_GET['proceso'];
  $consulta = "SELECT e.*,t.sigla AS tipo_documento FROM   empleado AS e INNER JOIN tipo_documento AS t ON e.id_tipo_documento=t.id_tipo_documento
                        WHERE  e.id_proceso=$proceso AND e.estado='ACTIVO' ORDER BY e.nombre";
  $result= mysqli_query($conectar,$consulta);
  if($result === false){
    echo "Falló la Conexión: Póngase en contacto con el administrador del sistema !"; 
  }
  $salida='';
  while($det= mysqli_fetch_array($result)){
    $salida.="<div class='col-lg-4 col-md-6 d-flex align-items-stretch' data-aos='zoom-in'>
            <div class='member'>
              <img src='../img/empleados/person.jpg' alt=''>
              <h4>".$det['nombre']."</h4>
              ".$det['tipo_documento']." ".$det['numero_documento']."
              <span>".$det['cargo']."</span>
              <div class='social'>
                <p>
                <i class='bi bi-phone'></i> <a href='https://wa.me/57".$det['celular']."' target='_BLANK'>".$det['celular']."</a><br>
                <i class='bx bx-envelope'></i><a href='mailto:".strtoupper($det['correo'])."'>".strtoupper($det['correo'])."</a>
                </p>
              </div>
            </div>
          </div>";
  }
  if(empty($salida)){
    $salida="<p>NO HAY RESULTADOS PARA MOSTRAR</p>";
  }
  echo($salida);
  ?>

