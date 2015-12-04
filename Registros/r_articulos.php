<?php
session_start();
    $usuario = $_SESSION['s_username'];
    if(!isset($usuario)){
        header("Location: ../res.php");
    }
?>
<?php require '../conectar.php'; ?>
<?php require '../info.php'; ?>
<?php

$error = array(); //Validar Campos

// INICIO  construccion de la consulta con los CLIENTES-->
        $sql_celular = "SELECT tipo FROM registro"; 
	      $result_celular = mysql_query($sql_celular)or die(mysql_error()); 
	      $options_celular = ''; 
	    while ($row_celular = mysql_fetch_array($result_celular))
		{	$options_celular = $options_celular.'<option value="'.$row_celular['tipo'].'">'.'</option>'; } 
// FIN  construccion de la consulta con los CLIENTES-->

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "formulario")) {

$_POST['tipo']= trim($_POST['tipo']); //Trim, borrar espacios al inicio y final
$_POST['descripcion']= trim($_POST['descripcion']);
$_POST['proveedor']= trim($_POST['proveedor']);
$_POST['unidades']= trim($_POST['unidades']);
//$_POST['garantia']= trim($_POST['garantia']);
$_POST['des']= trim($_POST['des']);
//$_POST['base']= trim($_POST['base']);
$_POST['cliente']= trim($_POST['cliente']);
//$_POST['publico']= trim($_POST['publico']);
//$_POST['dir']= trim($_POST['dir']);
//$_POST['tel']= trim($_POST['tel']);
//$_POST['serial']= trim($_POST['serial']);//Trim, borrar espacios al inicio y final

$tipo = ucwords($_POST['tipo']);//Primera Letra de cada palabra en Mayusculas
$descripcion = ucwords($descripcion);
$proveedor = ucwords($proveedor);
//$garantia = ucwords($garantia);
$cliente = ucwords($cliente);
//$dir = ucwords($dir);
$des = ucwords($des);//Primera Letra de cada palabra en Mayusculas

if(empty($_POST['tipo'])){ //Validar Campos
$error['tipo']= 'El Campo Tipo No Se Puede Dejar Vacio';
}
if(empty($_POST['descripcion'])){
$error['descripcion']= 'El Campo Descripcion No Se Puede Dejar Vacio';
}
/*if(empty($_POST['base'])){
$error['base']= 'El Campo Precio Base No Se Puede Dejar Vacio';
}*/
if(empty($_POST['unidades'])){
$error['unidades']= 'El Campo Unidades No Se Puede Dejar Vacio';
}
/*if(empty($_POST['garantia'])){
$error['garantia']= 'El Campo Garantia No Se Puede Dejar Vacio';
}*///Validar Campos

if(!$error){ //Validar Campos
  $serial=uniqid(); 
  $SQL = "INSERT INTO registro (tipo, descripcion, proveedor, unidades, fecha, serial) VALUES ('$tipo', '$descripcion', '$proveedor', '$unidades', '$fecha','$serial')";
                 
   $Result = mysql_query($SQL) or die ( "<center>El Equipo $tipo Ya Existe!!! <br><<a href=\"r_articulos.php\">Regresar</a></center>");//or die(mysql_error());
echo "<script language='JavaScript'> alert('La operacion ha resultado satisfactoria'); </script>";
//print('<meta http-equiv="refresh" content="0; URL=../Registros/r_articulos.php">');

}
} //Validar Campos
?>


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

	<form method="POST" action="" name="formulario" id="formulario" autocomplete="off">
	<fieldset>
		<legend>Nuevo Articulo</legend>

		<label><b>Descripcion:</b>
		<input value="<?php echo $_POST['descripcion'] ?>" name="descripcion" type="text" autofocus placeholder="Ingrese..."/></label>
		<label><b>Tipo:</b>
		<input value="<?php echo $_POST['tipo'] ?>" name="tipo" type="text" placeholder="Ingrese..."/></label>
		<label><b>Unidades:</b>
		<input value="<?php echo $_POST['unidades'] ?>" name="unidades" type="number" placeholder="Ingrese..."/></label> 
    <label><b>Proveedor:</b>
    <input value="<?php echo $_POST['proveedor'] ?>" name="proveedor" type="text" placeholder="Ingrese..."/></label>        
   
    <input value="<?php echo date("Y-m-d h:i:s A"); ?>" name="fecha" type="hidden" /></label><br />
		<label for="enviar">
      <input type="submit" name="enviar" id="enviar" value="Grabar" class="uno"/>  
    </label>
        
        <label for="borrar">        
          <input type="reset" name="borrar" id="borrar" value="Borrar Formulario" class="uno"/>
      </label>
        </fieldset>
    <input type="hidden" name="MM_insert" value="formulario" />
</form>


 
<?php if ($error) { //validar campos
  echo "$descripcion";
?>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
foreach ($error as $alerta) {
    echo "<script language='JavaScript'> alert('$alerta'); </script>";
	}
} //validar campos

?>

</body>
</html>

