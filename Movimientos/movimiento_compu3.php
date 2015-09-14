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
$criterio = $_POST['criterio'];
$query_movimiento = ("SELECT * FROM equipos WHERE  modelo = '".$criterio."' ");
$movimiento = mysql_query($query_movimiento) or die ( "Error en query: $sql, el error  es: " . mysql_error() );//(mysql_error());
$row_movimiento = mysql_fetch_assoc($movimiento);
$totalRows_movimiento = mysql_num_rows($movimiento);

$query_des = ("SELECT * FROM mov_compu WHERE  compu_modelo = '".$criterio."' ORDER BY compu_fecha ASC" );
$des = mysql_query($query_des) or die ( "Error en query: $sql, el error  es: " . mysql_error() );//(mysql_error());
$row_des = mysql_fetch_assoc($des);
?>


<center>
<table style="border:1px #FF0000; color:#000000; width:990px; text-align:center;">
<tr style="background:#FFD700;">
	<td>Tipo</td>
<!-- 	<td>Descripcion</td> -->	
	<td>Unidades</td>
	<td>Tipo De Movimiento</td>
	<td>Proveedor</td>
	<!-- <td>Cliente</td> -->
	<td>Garantia</td>
	<td>Observacion</td>
	<td>Serial</td>
	<td>Fecha Movimiento</td>
		
	
</tr>
    <?php do { ?>
	<tr bgcolor='#FFFACD'>
	  <td><?php echo $row_des['compu_modelo']; ?></td>
	  <!-- <td><?php// echo $row_des['compu_marca']; ?></td> -->
	  <td><?php echo $row_des['compu_qty']; ?></td>
	  <td><?php echo $row_des['compu_tipo']; ?></td>
	  <td><?php echo $row_des['compu_prov']; ?></td>
	  <!-- <td><?php //echo $row_des['compu_cli']; ?></td> -->
	  <td><?php echo $row_des['compu_garantia']; ?></td>
	  <td><?php echo $row_des['compu_des']; ?></td>
	  <td><?php echo $row_des['compu_serial']; ?></td>
	  <td><?php echo $row_des['compu_fecha']; ?></td>
	  	  
	</tr>
	
	<?php } while ($row_des= mysql_fetch_assoc($des)); ?>
	<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<!-- <td></td> -->
	<!-- <td></td> -->
	    <td bgcolor='#FFD700'><label><b>Cantidad Actual:</b></label></td>
		<td style="background:#FFFACD;"><b><?php echo $row_movimiento['cantidad']; ?></b></td>
	</tr>

</table>
</center>

<?php mysql_free_result($des); ?>
