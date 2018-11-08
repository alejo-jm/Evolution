<?php
	class Tareas{
		private $id;
		private $nombre;
		private $prioridad;
		private $fecha_vencimiento;
		private $usuario;
		
 
		function __construct(){}
 
 		public function getId(){
			return $this->id;
		}
 
		public function setId($id){
			$this->id = $id;
		}

		public function getNombre(){
		return $this->nombre;
		}
 
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getPrioridad(){
		return $this->prioridad;
		}
 
		public function setPrioridad($prioridad){
			$this->prioridad = $prioridad;
		}

		public function getFechavencimiento(){
			return $this->fecha_vencimiento;
		}
 
		public function setFechavencimiento($fecha_vencimiento){
			$this->fecha_vencimiento = $fecha_vencimiento;
		}

		public function getUsuario(){
		return $this->usuario;
		}
 
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
 
	}
?>