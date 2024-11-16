<?php 
    class Conexion{
        private const USER = "root";
        private const PASSWORD = "";
        private const SERVER = "localhost";
        private const DATABASE = "suits";
        private $conexion;
        private function crear_conexion(){
            if(!$this->conexion){
                try {
                    $this->conexion = new PDO("mysql:host=".self::SERVER.";dbname=".self::DATABASE.";",self::USER,self::PASSWORD);
                    return $this->conexion;
                } catch (PDOException $e) {
                    return $e;
                }
            }else{
                return $this->conexion;
            }
        }

        public function obtener_conexion(){
            return $this->crear_conexion();
        }

        public function cerrar_conexion(){
            $this->conexion = null;
        }
    }
?>