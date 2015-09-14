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
		<li><a href="/Compu-Soft/Movimientos/movimiento_compu.php">Ver Movimientos</a></li>
		<li><a href="/Compu-Soft/Borrar/borrar_movimiento.php">Borrar Movimientos</a></li>
		<li><a href="/Compu-Soft/Buscar/buscar_art.php">Buscar Articulos</a></li>
		<li><a href="/Compu-Soft/Borrar/borrar_art.php">Borrar Articulos</a></li>
        </ul>
    </li>
	<li><a href="#">Ventas Y Servicios</a> 
      <ul>
        <li><a href="/Compu-Soft/Registros/mov.php">Ventas Y Servicios</a></li>
		<li><a href="/Compu-Soft/Registros/abono.php">Abonos</a></li>
		<li><a href="/Compu-Soft/Movimientos/movimiento_abono.php">Ver Abonos</a></li>
		<li><a href="/Compu-Soft/Borrar/borrar_vs.php">Borrar Movimientos</a></li>
		<li><a href="/Compu-Soft/Registros/act_valor.php">Actualizar Precio Base</a></li>
       </ul>
    </li>
	<li><a href="#">Kardex</a> 
      <ul>
	    <li><a href="/Compu-Soft/Kardex/kardex.php">Kardex Diario</a></li>
        <li><a href="/Compu-Soft/Kardex/kardex_semanal.php">Kardex Semanal</a></li>
		<li><a href="/Compu-Soft/Kardex/kardex_quince.php">Kardex Quincenal</a></li>
		<li><a href="/Compu-Soft/Kardex/kardex_mensual.php">Kardex Mensual</a></li>
		<li><a href="/Compu-Soft/Kardex/kardex_tipo.php">Kardex Movimiento</a></li>
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
<center>
	<form method="post" action="mov2.php" name="formulario" id="formulario">
	<fieldset>
		<legend>Ventas Y Servicios</legend>
<?php	

$horas_diferencia=0;
$tiempo=time() + ($horas_diferencia * 60 *60);
$fecha = date('Y-m-d H:i:s',$tiempo); 

    // INICIO construccion de los campos para ingresar los datos de los clientes.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Tipo De Movimiento:</b><select name="tipo"><option value="Venta De Computadores">Venta De Computadores</option><option value="Venta De Accesorios">Venta De Accesorios</option><option value="Venta De Software">Venta De Software</option><option value="Mantenimiento">Mantenimiento</option><option value="Pagos">Pagos</option></select></label>';
	//descripcion articulo
	echo '<label><b>Modelo:</b> <select name="modelo[]">'.$options_prd.'</select></label>';
	//descripcion articulo
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Cliente:</b> <input type="text" name="cli[]" size="30" maxlength="30" onkeypress="return permite(event, \'num\')" /></label>';
	// campo para ingresar tipo de movimiento.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Telefono:</b> <input type="text" name="tel[]" size="30" maxlength="20" onkeypress="return permite(event, \'num\')" /></label>';
	// campo para ingresar tipo de movimiento.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Cantidad:</b> <input type="text" name="qty[]" size="30" maxlength="10" onkeypress="return permite(event, \'num\')" /></label>';
	// campo para ingresar tipo de movimiento.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Serial:</b> <input type="text" name="serial[]" size="30" maxlength="30" onkeypress="return permite(event, \'num\')" /></label>';
	// campo para ingresar tipo de movimiento.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Precio Publico:</b> <input type="text" name="publico[]" size="30" maxlength="30" onkeypress="return permite(event, \'num\')" /></label>';
	// campo para ingresar tipo de movimiento.
	//echo '<label>&nbsp;&nbsp;&nbsp;<b>Abono:</b> <input type="text" name="abono[]" size="10" maxlength="30" onkeypress="return permite(event, \'num\')" /></label>';
	// campo de text para ingresar el Valor Abono.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Pagos:</b> <input type="text" name="pago[]" size="30" maxlength="30" onkeypress="return permite(event, \'num\')" /></label>';
	// campo de text para ingresar el Interes Por Mora.
	echo '<label>&nbsp;&nbsp;&nbsp;<b>Fecha De Movimiento: </b><input value=" '.$fecha.' " name="fecha[]" type="text" /></label>';
	// salto de linea ;-P
	echo '<br />';
	
 ?>
<!--// FIN construccion de los campos para ingresar los datos de los clientes.-->

        	
	<br>
		<label for="ingreso"></label>
        <input type="submit" name="aceptar" id="aceptar" value="Enviar" class="uno"/>
		<input type="reset" name="borrar" id="borrar" value="Borrar Formulario" class="uno"/>
        <label for="borrar"></label>
        </fieldset>
    </form>
</center>
</body>
</html>



