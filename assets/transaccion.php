<?php

    class Transaccion{

        public $id;
        public $monto;
        public $fecha;
        public $hora;
        public $descripcion;

        public function __construct(){

        }

        public function set($data){
            foreach ($data as $key => $value) $this->{$key} = $value;
        }

        public function initializeData($id, $monto, $fecha, $hora, $descripcion){
            
            $this->id = $id;
            $this->monto = $monto;
            $this->fecha = $fecha;
            $this->hora = $hora;
            $this->descripcion = $descripcion;

        }

    }


?>