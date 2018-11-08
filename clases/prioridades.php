<?php
	class Prioridades{
		private $id;
		private $cod_prioridad;
		private $nombre_prioridad;
		
 
		function __construct(){}
 
 		public function getId(){
			return $this->id;
		}
 
		public function setId($id){
			$this->id = $id;
		}

		public function getCodprioridad(){
		return $this->cod_prioridad;
		}
 
		public function setCodprioridad($cod_prioridad){
			$this->cod_prioridad = $cod_prioridad;
		}

		public function getNomprioridad(){
		return $this->nombre_prioridad;
		}
 
		public function setNomprioridad($nombre_prioridad){
			$this->nombre_prioridad = $nombre_prioridad;
		}

 
	}
?>