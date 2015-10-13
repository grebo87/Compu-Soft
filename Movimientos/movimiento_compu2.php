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
<link href="../form2.css" rel="stylesheet" type="text/css" />
<!-- <link href="../bootstrap.css" rel="stylesheet" type="text/css" /> -->

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
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>
</html>

<?php
/*$criterio = $_POST['criterio'];*/
$query_movimiento = ("SELECT * FROM equipos ORDER BY fecha DESC");/*WHERE  modelo = '".$criterio."' */
// $movimiento = mysql_query($query_movimiento) or die ( "Error en query: $sql, el error  es: " . mysql_error() );//(mysql_error());
// $row_movimiento = mysql_fetch_assoc($movimiento);
$des = mysql_query($query_movimiento) or die ( "Error en query: $sql, el error  es: " . mysql_error() );//(mysql_error());
$row_des = mysql_fetch_assoc($des);
$totalRows_movimiento = mysql_num_rows($des);

/*$query_des = ("SELECT * FROM mov_compu WHERE compu_modelo = '".$criterio."' ORDER BY compu_fecha ASC" );
$des = mysql_query($query_des) or die ( "Error en query: $sql, el error  es: " . mysql_error() );//(mysql_error());
$row_des = mysql_fetch_assoc($des);*/
?>


<center>
<h2>Inventario General</h2>
<table style="border:1px #FF0000; color:#000000; width:990px; text-align:center;">
<tr style="background:#FFD700;">
	<td>Descripcion</td>
	<td>Tipo</td>
	<!-- <td>Serial</td> -->
	<td>Proveedor</td>
	<td>Unidades</td>
<!-- 	<td>Garantia</td> -->
<!-- 	<td>Direccion</td> -->
	<td>Fecha</td>
	<td>Accion</td>


</tr>
    <?php do { ?>
	<tr bgcolor='#FFFACD'>
	  <td><?php echo $row_des['marca']; ?></td>
	  <td><?php echo $row_des['modelo']; ?></td>
<!-- 	  <td><?php echo $row_des['serial']; ?></td> -->
	  <td><?php echo $row_des['proveedor']; ?></td>
	  <td><?php echo $row_des['cantidad']; ?></td>
<!-- 	  <td><?php echo $row_des['garantia']; ?></td> -->
<!-- 	  <td><?php echo $row_des['dir']; ?></td> -->
	  <td><?php echo $row_des['fecha']; ?></td>
	  <td><a class="btn btn-primary" href="update.php?serial=<?php echo $row_des['serial']; ?>">Modificar</a> </td>


	</tr>

	<?php } while ($row_des= mysql_fetch_assoc($des)); ?>
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>

<!-- 	    <td bgcolor='#FFD700'><label><b>Cantidad Actual:</b></label></td>
		<td style="background:#FFFACD;"><b><?php /*echo $totalRows_movimiento['cantidad']; */?></b></td>
 -->	</tr>

</table>
</center>

<?php mysql_free_result($des); ?>
