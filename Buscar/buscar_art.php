<?php require '../conectar.php'; ?>
<?php
	//DATOS DEL PROGRAMA==================================
	$CLIENTE= "INCES" ;
	$SISTEMA = "- Sistema De Inventario - " ;
	$VERSION = "Version 1.0" ;
	//$NICK = "Por @ArturoGnuxdar" ;
	//========================================================
?>
<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../conectar.php'; ?>
<?php //require '../menu.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php echo "$CLIENTE $SISTEMA $VERSION"; ?></title>

	<link rel="stylesheet" type="text/css" href="../DataTables-1.10.5/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../DataTables-1.10.5/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../DataTables-1.10.5/examples/resources/demo.css">
	<link href="../menu.css" rel="stylesheet" type="text/css" />
	<link href="../form2.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" language="javascript" src="../DataTables-1.10.5/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables-1.10.5/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables-1.10.5/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables-1.10.5/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	/*$('#example').dataTable( {
		"order": [[ 3, "desc" ]]
		//$('table.display').dataTable();  //multi tablas
	} );*/
	/*
	var table = $('#example').DataTable( { 	//con scroll vertical
        "scrollY": "200px",
        "paging": false
    } );

    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();

        // Get the column API object
        var column = table.column( $(this).attr('data-column') );

        // Toggle the visibility
        column.visible( ! column.visible() );
    } );*/
	    $('#example').dataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );

	</script>
</head>

<body><!-- class="dt-example" -->

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
    <li><a href="../logout.php" onclick="if(confirm('&iquest;Esta seguro que desea cerrar la sesi&oacute;n?')) return true;  else return false;">Salir</a>
    </li>
    </ul>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>


	<div class="container">	<!-- contenedor de tabla de busqueda -->
		<section>

<?php
 //comenzamos la consulta
  $consulta = "SELECT * FROM equipos ORDER BY fecha DESC";
  //$consulta = "SELECT * FROM equipos ";
  $resultado = mysql_query($consulta) or die(mysql_error());

?>

<h2 align="center">Buscar Articulo</h2>
			<table id="example" class="display" cellspacing="0" width="100%">
			<br><br>
				<thead>
					<tr style="background:#FFD700;">
						<th>Descripcion</th>
						<th>Tipo</th>
						<!-- <th>Serial</th>-->
						<th>Proveedor</th>
						<!-- <th>Cliente</th> -->
						<!-- <th>Telefono</th> -->
						<th>Unidades</th>
						<!-- <th>Precio</th> -->
						<th>Fecha Ingreso</th>
					</tr>
				</thead>

				<tfoot>
					<tr style="background:#FFD700;">
						<th>Descripcion</th>
						<th>Tipo</th>
						<!-- <th>Serial</th> -->
						<th>Proveedor</th>
						<!-- <th>Cliente</th> -->
						<!-- <th>Telefono</th> -->
						<th>Unidades</th>
						<!-- <th>Precio</th> -->
						<th>Fecha Ingreso</th>
					</tr>
				</tfoot>

				<tbody>

						<?php
						  //mostramos los resultados
						     while($row = mysql_fetch_array($resultado)){
						     echo "<tr bgcolor='#FFFACD'>";
							 //echo " 		<td><a style=\"text-decoration:underline;cursor:pointer;\" onclick=\"pedirDatos('".$row['cli_id']."')\">".$row['cli_id']."</a></td>";
						     echo "<td>".stripslashes($row["marca"])."</td>";
							 	 echo "<td>".stripslashes($row["modelo"])."</td>";
						//	 echo " 		<td>".stripslashes($row["serial"])."</td>";
							   echo "<td>".stripslashes($row["proveedor"])."</td>";
						//	 echo " 		<td>".stripslashes($row["cliente"])."</td>";
						//	 echo " 		<td>".stripslashes($row["dir"])."</td>";
						//	 echo " 		<td>".stripslashes($row["tel"])."</td>";
						//	 echo " 		<td>".stripslashes($row["garantia"])."</td>";
							   echo "<td>".stripslashes($row["cantidad"])."</td>";
						//	 echo " 		<td>".stripslashes($row["publico"])."</td>";
							   echo "<td>".stripslashes($row["fecha"])."</td>";
						     echo "</tr>";
							 //echo "<br />";

						  }
						?>



				</tbody>
			</table>

			</div>
		</section>
	</div>

				</div>
			</div>
		</div>
	</section>
</body>
</html>
