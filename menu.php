<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require 'conectar.php'; ?>
<?php require 'info.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INCES</title>

<link href="menu.css" rel="stylesheet" type="text/css" />
<link href="form2.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="principal">

  <div id="cabecera"> 
    <div id="titulo"> 
      <div id="logout">
        <?php 
        echo "Bienvenido <b>".$_SESSION['s_username']."</b> "; 
        ?>
      </div>
    </div>
  </div>
  
<div id="menu">
<ul>
   <li><a href="/Compu-Soft/index.php">Inicio</a> 
    </li>
    <li><a href="#">Articulos</a> 
      <ul>
        <li><a href="/Compu-Soft/Registros/r_articulos.php">Nuevo Articulo</a></li>
		<li><a href="/Compu-Soft/Registros/nuevo_ingreso.php">Ingreso De Articulos</a></li>
		<li><a href="/Compu-Soft/Registros/nueva_salida.php">Salida De Articulos</a></li>
		<li><a href="/Compu-Soft/Borrar/borrar_art.php">Borrar Articulos</a></li>
        </ul>
    </li>
	<li><a href="#">Reportes</a> 
      <ul>
          <li><a href="/Compu-Soft/Movimientos/movimiento_compu.php">Ver Movimientos</a></li>
          <li><a href="/Compu-Soft/Borrar/borrar_movimiento.php">Borrar Movimientos</a></li>
          <li><a href="/Compu-Soft/Movimientos/movimiento_compu2.php">Inventario General</a></li>
  
       </ul>
    </li>
	<li><a href="#">Copia De Seguridad</a> 
      <ul>
        <li><a href="/Compu-Soft/Backup/backup.php">Realizar Copia</a></li>
        </ul>
    </li>
	<li><a href="/Compu-Soft/creditos.php">Acerca De</a> 
    </li>

    </li>
    <li><a href="../logout.php" onclick="if(confirm('&iquest;Esta seguro que desea cerrar la sesi&oacute;n?')) return true;  else return false;" >Salir</a> 
    </li>
    </ul>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
