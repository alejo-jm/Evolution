
<?php
// Clase USUARIOS
	class Usuarios{
		private $id;
		private $usuario;
		private $nombre;
		private $contrasena;
		private $correo;
		
 
		function __construct(){}
 
 		public function getId(){
			return $this->id;
		}
 
		public function setId($id){
			$this->id = $id;
		}

		public function getUsuario(){
		return $this->usuario;
		}
 
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}

		public function getNombre(){
		return $this->nombre;
		}
 
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
 
		public function getContrasena(){
			return $this->contrasena;
		}
 
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}

		public function getCorreo(){
			return $this->correo;
		}
 
		public function setCorreo($correo){
			$this->correo = $correo;
		}
 
	}
?>