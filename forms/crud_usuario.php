<?php
// Realiza las sentencias sql a la tabla usuarios
// incluye la clase Db
require_once('../clases/conexion.php');
require_once('../clases/usuarios.php');

	class CrudUsuario{
		// constructor de la clase
		public function __construct(){}

		// método para consultar, recibe como parámetro un objeto de tipo libro
		public function consultar($usu,$contrasena){
			$db=Db::conectar();
			$listaUsuarios=[];
			$select=$db->prepare('SELECT * FROM usuarios where usuario=:usu and contrasena=:contrasena');
			$select->bindValue('usu',$usu);
			$select->bindValue('contrasena',$contrasena);
			$select->execute();

			foreach($select->fetchAll() as $usuario){
				$myusuario= new Usuarios();
				$myusuario->setId($usuario['id']);
				$myusuario->setNombre($usuario['nombre']);
				$myusuario->setContrasena($usuario['contrasena']);
				$myusuario->setCorreo($usuario['correo']);
				$listaUsuarios[]=$myusuario;
			}
			return $listaUsuarios;
 
		}

 
		// método para insertar, recibe como parámetro un objeto de tipo usuario
		public function insertar($usuario){
			$db=Db::conectar();
			$usu= $usuario->getUsuario();
			$select=$db->prepare('SELECT * FROM usuarios where usuario=:usu ');
			$select->bindValue('usu',$usu);
			$select->execute();
			$num_rows=0;
			foreach($select->fetchAll() as $usuario){
                $num_rows++;
			}    
			if ($num_rows==0) {
				$insert=$db->prepare('INSERT INTO usuarios values(NULL,:usuario,:nombre,:contrasena,:correo)');
				$insert->bindValue('usuario',$usuario->getUsuario());
				$insert->bindValue('nombre',$usuario->getNombre());
				$insert->bindValue('contrasena',$usuario->getContrasena());
				$insert->bindValue('correo',$usuario->getCorreo());
				$insert->execute();
			}
			return $num_rows;

		}
 
		// método para mostrar todos los usuarios
		public function mostrar(){
			$db=Db::conectar();
			$listaUsuarios=[];
			$select=$db->query('SELECT * FROM usuarios');
 
			foreach($select->fetchAll() as $usuario){
				$myUsuario= new Usuarios();
				$myUsuario->setId($usuario['id']);
				$myUsuario->setNombre($usuario['nombre']);
				$myUsuario->setUsuario($usuario['usuario']);
				$myUsuario->setContrasena($usuario['contrasena']);
				$myUsuario->setCorreo($usuario['correo']);
				$listaUsuarios[]=$myUsuario;
			}
			return $listaUsuarios;
		}
 
		// método para eliminar un usuario, recibe como parámetro el id del usuario
		public function eliminar($id){
			$db=Db::conectar();
			$eliminar=$db->prepare('DELETE FROM usuarios WHERE ID=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}
 
		// método para buscar un usuario, recibe como parámetro el id del usuario
		public function obteneUsuario($id){
			$db=Db::conectar();
			$select=$db->prepare('SELECT * FROM usuarios WHERE ID=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$usuario=$select->fetch();
			$myUsuario= new Usuarios();
			$myUsuario->setId($usuario['id']);
			$myUsuario->setNombre($usuario['nombre']);
			$myUsuario->setUsuario($usuario['usuario']);
			$myUsuario->setContrasena($usuario['contrasena']);
			$myUsuario->setCorreo($usuario['correo']);
			return $myUsuario;
		}
 
		// método para actualizar un usuario, recibe como parámetro el usuario
		public function actualizar($usuario){
			$db=Db::conectar();
			$actualizar=$db->prepare('UPDATE usuarios SET nombre=:nombre, contrasena=:contrasena,correo=:correo  WHERE ID=:id');
			$actualizar->bindValue('id',$usuario->getId());
			$actualizar->bindValue('nombre',$usuario->getNombre());
			$actualizar->bindValue('contrasena',$usuario->getContrasena());
			$actualizar->bindValue('correo',$usuario->getCorreo());
			$actualizar->execute();
		}
	}
?>