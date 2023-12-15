<?php
  session_start();
  $_SESSION['nombre']=null;
  $_SESSION['email']=null;
  header("Location:../../index.php");
 ?>
