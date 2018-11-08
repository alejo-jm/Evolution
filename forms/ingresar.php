<?php
// Permite Ingresar Nuevos Usuarios al sistema

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="../js/validaciones.js"></script>
<title>Ingresar Usuario</title>
<style type="text/css">
  form { width:26em; padding:1em; margin:auto; border:double 7px black; }
  h3 { font-size:1.4em; color:blue; text-align:center; }
</style>
</head>


<form action='administrar_usuario.php' method='post'>
 <h3>Ingresar los datos del Usuario</h3>


	<table>
		<tr>
			<td nowrap="">Usuario:</td>
			<td> <input type='text' name='usuario'></td>
		</tr>
		<tr>
			<td nowrap="">Nombre:</td>
			<td><input type='text' name='nombre' ></td>
		</tr>
		<tr>
			<td nowrap="">Contraseña:</td>
			<td><input type='password' name='contrasena' ></td>
		</tr>
		<tr>
			<td nowrap="">Repite Contraseña:</td>
			<td><input type='password' name='contrasena1' ></td>
		</tr>
		<tr>
			<td>correo:</td>
			<td><input type='text' name='correo' onblur="validarEmail(this value)" ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="../index.php">Volver</a>
</form>
 
</html>