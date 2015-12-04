<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../conectar.php'; ?>
<?php require '../info.php'; ?>
<?php require '../select.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INCES</title>

<link href="../menu.css" rel="stylesheet" type="text/css" />
<link href="../form.css" rel="stylesheet" type="text/css" />
<!-- scritp para el calendario -->
<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>
<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
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
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>

<center>
	<form method="POST" action="movimiento_entrada.php" id="formulario" >
	<!-- INICIO SECCION MOVIMIENTO DE CLIENTE!-->
<fieldset><legend><b>Reporte de Entradas</b></legend>

   <table class="" width="89%" cellspacing=0 cellpadding=3 border=0>          
            <tr>
              <br><br>
              <td>Fecha de inicio</td>
              <td><input id="fechainicio" type="text" class="cajaPequena" name="fechainicio" maxlength="10" value="<? echo $fechainicio?>" readonly placeholder="Haga click aqui" required autofocus="on">
        <script type="text/javascript">
          Calendar.setup(
            {
          inputField : "fechainicio",
          ifFormat   : "%Y/%m/%d",
          //button     : "Image1"
            }
          );
    </script> </td>
              <!-- <td><img src="../img/calendario.png" name="Image1" id="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario"></td> -->
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>Fecha de fin</td>
              <td><input id="fechafin" type="text" class="cajaPequena" name="fechafin" maxlength="10" value="<? echo $fechafin?>" readonly placeholder="Haga click aqui" required>
        <script type="text/javascript">
          Calendar.setup(
            {
          inputField : "fechafin",
          ifFormat   : "%Y/%m/%d",
          //button     : "Image1"
            }
          );
    </script></td>
              <!-- <td><img src="../img/calendario.png" name="Image1" id="Image1" width="16" height="16" border="0" id="Image1" onMouseOver="this.style.cursor='pointer'" title="Calendario"></td> -->
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
  <br>
  <input type="submit" name="consulta" value="Ver Movimiento" class="dos"/>
  </form>


</fieldset>
<!-- FIN SECCION MOVIMIENTO  DE CLIENTE !-->


<?php
 //iniciamos buscador 
/*trim($fechainicio); //Evitar espacios en blanco en la busqueda

if (!$fechainicio)
  {
   //  echo "No se ha ingresado ningun valor a buscar";
     exit;
  }
*/
  $fechainicio = addslashes($fechainicio); //Marca una cadena con barras
  $fechafin = addslashes($fechafin); //Marca una cadena con barras

  
  //comenzamos la consulta 
  //$consulta = "SELECT * FROM registro WHERE marca like '%".$busqueda."%' ORDER BY marca ASC";
  $consulta = "SELECT * FROM reporte WHERE compu_fecha >= '$fechainicio' AND compu_fecha <= '$fechafin' AND tipo_m = 'Ingreso' ORDER BY compu_fecha DESC"; //este

  //no funciona
  $resultado = mysql_query($consulta) or die(mysql_error());
  if ($resultado < 1){
       print "<script>alert('No hay registro en esa fecha');</script>";

  }

?>

<table id="example" class="display" style="border:1px #FF0000; color:#000000; width:990px; text-align:center;" border="0">
<tr style="background:#FFD700;">
   <!--  <td>Descripcion</td> -->
  <td>Tipo</td>
<!--   <td>Serial</td>
 -->  <td>Proveedor</td>
<!--   <td>Cliente</td>-->  
<!-- <td>Direccion</td> -->
<!--   <td>Telefono</td> -->
<!--  <td>Garantia</td>-->  
  <td>Unidades</td>
  <td>Observacion</td>
  <td>Fecha Ingreso</td>
  </tr> 

<?php  

//echo "$fechainicio";
echo "<br>";
  //mostramos los resultados
     while($row = mysql_fetch_array($resultado)){
  //while ('$fechainicio' >= '$fechafin'){ // infinito
     echo "<tr bgcolor='#FFFACD'>";
   //echo "     <td><a style=\"text-decoration:underline;cursor:pointer;\" onclick=\"pedirDatos('".$row['cli_id']."')\">".$row['cli_id']."</a></td>";
     //echo "     <td>".stripslashes($row["compu_marca"])."</td>";
   echo "     <td>".stripslashes($row["compu_tipo"])."</td>";
   //echo "     <td>".stripslashes($row["serial"])."</td>";
   echo "     <td>".stripslashes($row["compu_prov"])."</td>";
   //echo "     <td>".stripslashes($row["cliente"])."</td>";
    //echo "     <td>".stripslashes($row["dir"])."</td>";
   //echo "     <td>".stripslashes($row["tel"])."</td>";
  //echo "     <td>".stripslashes($row["garantia"])."</td>";
   echo "     <td>".stripslashes($row["compu_unidades"])."</td>";
   echo "     <td>".stripslashes($row["compu_des"])."</td>";
   echo "     <td>".stripslashes($row["compu_fecha"])."</td>";
     echo "</tr>";
   //echo "<br />";
   
  }
?>


	
</center>
</body>
</html>
