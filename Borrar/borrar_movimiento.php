<?   
session_start();   
$usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../info.php'; ?>
<?php  require '../conectar.php'; ?>

<?php
//inicio paginador
$registros = 20; 

$pagina = $_GET["pagina"];

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
$inicio = ($pagina - 1) * $registros;
} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
//inicio borrado de registros
$nbrow = 0; //numero de registros
$cont = 0; //Para el checkbox

print "<form action ='borrar_movimiento.php' method='post'>";

//$result = mysql_query("SELECT * FROM clientes ORDER BY cli_nombre ASC");

//inicio consulta 
$resultados = mysql_query("SELECT * FROM mov_compu WHERE 'visible' = 0");
$total_registros = mysql_num_rows($resultados) or die ( "<center>No Existen Registros!!! <br><a href=\"javascript:history.back()\">Regresar</a></center>"); //or die ( "Error en query: $sql, el error  es: " . mysql_error());
$resultados = mysql_query("SELECT * FROM mov_compu WHERE 'visible' = 0 ORDER BY mov_id DESC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros); 
//fin consulta 
?>

<center>
<h2>Borrar Movimientos</h2>
<table style="border:1px #FF0000; color:#000000; width:990px; text-align:center;">
<tr style="background:#FFD700;">
<?php
echo "<td>Seleccionar</td><td>Item</td><td>Modelo</td><td>Tipo De Movimiento</td><td>Cantidad</td><td>Proveedor</td><td>Observacion</td><td>Fecha De Movimiento</td> \n"; 
?>
</tr>

<?php
while($row=mysql_fetch_array($resultados))
{
$nbrow++;
$cont++;

$mov_id =$row["mov_id"];
$compu_modelo =$row["compu_modelo"];
//$compu_marca =$row["compu_marca"];
$compu_tipo = $row["compu_tipo"];
$compu_qty =$row["compu_qty"];
$compu_prov =$row["compu_prov"];
//$compu_garantia =$row["compu_garantia"];
//$compu_serial =$row["compu_serial"];
$compu_des =$row["compu_des"];
$compu_fecha =$row["compu_fecha"];
print "<tr bgcolor='#FFFACD'> "; //color de fondo de la fila
print "<td>
        <div align=\"center\">
          <font color=\"#000000\">
            <font face=\"Verdana\">
              <input type=\"checkbox\" name=\"delete[]\" value=\"".$mov_id."\">
            </font>
          </font>
        </div>
      </td>";
                                  //color de fondo de las letras
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$mov_id</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$compu_modelo</font></font></div></td>";
//print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$compu_marca</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$compu_tipo</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$compu_qty</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$compu_prov</font></font></div></td>";
//print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$compu_garantia</font></font></div></td>";
//print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$compu_serial</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$compu_des</font></font></div></td>";
print "<td> <div align=\"center\"><font color=\"#000000\"><font size=\"3\"><font face=\"Verdana\">$compu_fecha</font></font></div></td>";
print "</tr>";


}
print "</form> \n";
echo "</table> \n <p><p>";
print "<div align=\"center\"><input type='submit' name='borrar' value='Borrar'></div>";

if (count($_POST['delete']))
{
foreach ($_POST['delete'] as $v)
{
$sql="DELETE FROM mov_compu WHERE mov_id = '$v'";
$res = mysql_query($sql);
}
}
//fin borrado de registros

//paginador
if(($pagina - 1) > 0) {
echo "<a href='../borrar_movimiento.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='borrar_movimiento.php?pagina=$i'>$i</a> ";
} }

if(($pagina + 1)<=$total_paginas) {
echo " <a href='borrar_movimiento.php?pagina=".($pagina+1)."'>Siguiente ></a>";
} 
//fin paginador
?> 
</center>
</table><br />
</body>
</html>
<?php mysql_free_result($resultados); ?>