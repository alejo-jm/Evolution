<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tareas</title>
<style type="text/css">
  form { width:26em; padding:1em; margin:auto; border:double 7px black; }
  h3 { font-size:1.4em; color:blue; text-align:center; }
</style>
</head>


<body>
<form method="post" action="forms/administrar_usuario.php">
 <h3>Ingresar al sistema de tareas</h3>
  Usuario: 
  <label>
  <input type="text" name="user" />
  </label>
  <p>Password: 
    <label>
    <input type="password" name="pass" />
    </label>
  </p>
  <p>
    <label>
    <input type="submit" value="Entrar" />
    <input type="hidden" name="entrar" value="entrar" />
    </label>

    <label>
	<a href="forms/ingresar.php">Registrar Usuario</a>
    
    </label>

</p>
</form>
</body>
</html>
