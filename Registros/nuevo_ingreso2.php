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
    <li><a href="#">Registro</a> 
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
        <li><a href="/Compu-Soft/Movimientos/movimiento_compu2.php">Inventario General</a></li>
        <li><a href="/Compu-Soft/Movimientos/movimiento_entrada.php">Entrada</a></li>
        <li><a href="/Compu-Soft/Movimientos/movimiento_salida.php">Salida</a></li>
       </ul>
    </li>
  <li><a href="#">Configuracion</a> 
      <ul>
        <li><a href="/Compu-Soft/Registros/r_articulos.php">Nuevo Articulo</a></li> 
        <li><a href="/Compu-Soft/Registros/tipo.php">Nuevo Tipo</a></li>
        <li><a href="/Compu-Soft/Borrar/borrar_tipo.php">Borrar Tipo</a></li>
        <li><a href="/Compu-Soft/Borrar/borrar_movimiento.php">Borrar Movimientos</a></li>
        <li><a href="/Compu-Soft/Backup/backup.php">Copia de Seguridad</a></li>
        </ul>
    </li>
  <li><a href="/Compu-Soft/creditos.php">Acerca De</a> 
    </li>

    </li>
    <li><a href="/Compu-Soft/logout.php" onclick="if(confirm('&iquest;Esta seguro que desea cerrar la sesi&oacute;n?')) return true;  else return false;" >Salir</a>  
    </li>
    </ul>
</div><!--fin menu-->
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php

// declarando las variables y capturando los valores provenientes desde nuevo_ingreso.php
$tipo_m = $_POST['tipo_m'];
$tipo = $_POST['nombre_tipo'];
$descripcion = $_POST['descripcion'];
//$tipo = $_POST['tipo'];
$unidades = $_POST['unidades'];
$fecha = $_POST['fecha'];
$obser = $_POST['obser'];
$des = $_POST['des'];
$serial = $_POST['serial'];

// $ini es un contador, iniciado en cero, inserta los datos ingresados en mov_ingreso.php hasta que sea igual al numero de cantidades.
$ini = 0 ;
  $tipo_m = $tipo_m;
	$descripcion = $descripcion[$ini];
	$tipo = $tipo[$ini];
	$unidades = $unidades[$ini];
	//$fecha = $fecha[$ini];
	$obser = ucwords($obser[$ini]);//Primera Letra de cada palabra en Mayusculas
	$des = ucwords($des[$ini]);//Primera Letra de cada palabra en Mayusculas
	$serial = $serial[$ini];
	//$detalle = strtoupper($detalle[$ini]);
	$serial=uniqid();
  //$sql_insert = "INSERT INTO reporte (tipo_m, tipo, compu_tipo, compu_unidades, compu_fecha, compu_prov, compu_des) VALUES ( '$tipo_m','$tipo', '$unidades', '$fecha', '$prov', '$des')";
  $sql_insert2 = "INSERT INTO registro (tipo, descripcion, obser, unidades, fecha, serial) VALUES ( '$tipo', '$des', '$obser', '$unidades', '$fecha', '$serial')";
  //$sql_unidades = "UPDATE registro SET unidades = unidades + '$unidades' WHERE tipo = '$tipo' ";
	//echo "$sql_insert2";
	
	//mysql_query($sql_insert) or die(mysql_error(). " Query: " . $sql_insert);
  mysql_query($sql_insert2) or die(mysql_error(). " Query: " . $sql_insert2);
	//mysql_query($sql_unidades) or die(mysql_error(). " Query: " . $sql_unidades);

	$ini++ ;

   print "<script>alert('La operacion ha resultado satisfactoria');</script>";
  print('<meta http-equiv="refresh" content="0; URL=/Compu-Soft/Registros/nuevo_ingreso.php">');

?>
</body>
</html>