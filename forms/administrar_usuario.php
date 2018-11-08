<?php
// Permite validar datos del usuario y ejecutar acciones
session_start();
//incluye la clase Libro y CrudLibro
require_once('crud_usuario.php');
require_once('../clases/usuarios.php');
 
$crud= new CrudUsuario();
$datos_usuario= new Usuarios();
 
	// si el elemento insertar no viene nulo llama al crud e inserta un libro
	if (isset($_POST['entrar'])) {
		$datos_usuario->setUsuario($_POST['user']);
		$datos_usuario->setContrasena($_POST['pass']);
		$datos_usuario->setNombre($_POST['nombre']);
		//llama a la función insertar definida en el crud
		$resultado=$crud->consultar($_POST['user'],$_POST['pass']);
		if ($resultado) {
			$resultado=$crud->consultar($_POST['user'],$_POST['pass']);
			$usu=$_POST['user'];
			$dat_usu=$resultado[0];
			$nombre_usu=$dat_usu->getNombre('nombre');
            echo "<script>window.location='mostrar.php?usu=$usu&nom_usu=$nombre_usu'; </script>";										

		}else{
			
			echo "<script>alert ('Usuario o Contraseña Incorrecta');</script>";
            echo "<script>window.location='../index.php'; </script>";										
		}	
    }elseif (isset($_POST['registrar'])) {
            echo "<script>window.location='ingresar.php'; </script>";										
			
	// si el elemento insertar no viene nulo llama al crud e inserta un usuario
    }elseif (isset($_POST['insertar'])) {
    	
    	if ($_POST['usuario']==""){
			echo "<script>alert ('Debe Ingresar el Usuario');</script>";
           	echo "<script>window.location='ingresar.php'; </script>";													
		}elseif ($_POST['contrasena'] <> $_POST['contrasena1']) {
			echo "<script>alert ('Contrasenas no son iguales');</script>";
            echo "<script>window.location='ingresar.php'; </script>";	
	    }elseif(!(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL))) {
			echo "<script>alert ('Correo Invalido');</script>";
           	echo "<script>window.location='ingresar.php'; </script>";													
		}else {
			$datos_usuario->setUsuario($_POST['usuario']);
			$datos_usuario->setNombre($_POST['nombre']);
			$datos_usuario->setContrasena($_POST['contrasena']);
			$datos_usuario->setCorreo($_POST['correo']);

			//llama a la función insertar definida en el crud
			$resultado= $crud->insertar($datos_usuario);
			if ($resultado) {
				echo "<script>alert ('Usuario Ya Existe');</script>";
            	echo "<script>window.location='../index.php'; </script>";										
			}else {
				echo "<script>alert ('Usuario Creado con Exito');</script>";
            	echo "<script>window.location='../index.php'; </script>";										
			}		
			
		}
    	
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el usuario
	}elseif(isset($_POST['actualizar'])){
		$usuario->setId($_POST['id']);
		$usuario->setUsuario($_POST['usuario']);
		$usuario->setNombre($_POST['nombre']);
		$usuario->setContrasena($_POST['contrasena']);
		$usuario->setCorreo($_POST['correo']);
		$crud->actualizar($usuario);
		header('Location: ../index.php');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un usuario
	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id']);
		header('Location: ../index.php');		
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='a'){
		header('Location: actualizar.php');
	}
		
?>
