<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../conectar.php'; ?>
<?php require '../info.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INCES</title>

<link href="../menu.css" rel="stylesheet" type="text/css" />
<link href="../form.css" rel="stylesheet" type="text/css" />
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
    
    <li><a href="/Compu-Soft/Buscar/buscar_art.php">Buscar Articulos</a></li>
    <li><a href="/Compu-Soft/Borrar/borrar_art.php">Borrar Articulos</a></li>
        </ul>
    </li>
  <li><a href="#">Reportes</a> 
      <ul>
        <li><a href="/Compu-Soft/Movimientos/movimiento_compu.php">Ver Movimientos</a></li>
        <li><a href="/Compu-Soft/Borrar/borrar_movimiento.php">Borrar Movimientos</a></li>
        <li><a href="/Compu-Soft/Movimientos/movimiento_compu2.php">Inventario General</a></li>
        <li><a href="/Compu-Soft/Movimientos/movimiento_entrada.php">Entrada</a></li>
        <li><a href="/Compu-Soft/Movimientos/movimiento_salida.php">Salida</a></li>
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
    <li><a href="../logout.php">Salir</a> 
    </li>
    </ul>
</div><!--fin menu-->
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php

// declarando las variables provenientes desde nuevo_ingreso.php
$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$qty = $_POST['qty'];
$fecha = $_POST['fecha'];
$prov = $_POST['prov'];
$des = $_POST['des'];
$serial = $_POST['serial'];
$garantia = $_POST['garantia'];

// $ini es un contador, iniciado en cero, inserta los datos ingresados en mov_ingreso.php hasta que sea igual al numero de cantidades.
$ini = 0 ;

    //$tipo = $tipo[$ini];
	$marca = $marca[$ini];
	$modelo = $modelo[$ini];
	$qty = $qty[$ini];
	$fecha = $fecha[$ini];
	$prov = ucwords($prov[$ini]);//Primera Letra de cada palabra en Mayusculas
	$des = ucwords($des[$ini]);//Primera Letra de cada palabra en Mayusculas
	$serial = $serial[$ini];
	$garantia = ucwords($garantia[$ini]);//Primera Letra de cada palabra en Mayusculas
	//$detalle = strtoupper($detalle[$ini]);
	
$sql_insert = "INSERT INTO mov_compu (compu_tipo,  compu_modelo, compu_qty, compu_fecha, compu_prov, compu_garantia, compu_serial, compu_des) VALUES ( '$tipo', '$modelo', '$qty', '$fecha', '$prov', '$garantia', '$serial', '$des')";
$sql_qty = "UPDATE equipos SET cantidad = cantidad + '$qty' WHERE modelo = '$modelo' ";
	
	
	mysql_query($sql_insert) or die(mysql_error(). " Query: " . $sql_insert);
	mysql_query($sql_qty) or die(mysql_error(). " Query: " . $sql_qty);

	$ini++ ;

	//echo '<div align="center">Lo operacion ha resultado satisfactoria</div>';
  //echo '<script>alert ("La operacion ha resultado satisfactoria");</script>';
   print "<script>alert('La operacion ha resultado satisfactoria');</script>";
  print('<meta http-equiv="refresh" content="0; URL=/Compu-Soft/Registros/nuevo_ingreso.php">');

?>
</body>
</html>