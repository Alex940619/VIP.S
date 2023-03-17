<?php
class conexion{
     private $host="localhost";
     private $usuario="root";
     private $clave="";
     private $db="dbvips";
     private $cnn;
    
    

     public function __construct()
     {
        //Paso 1 debe generar una cadena de conexion hacia la BD
        $this->cnn= new mysqli($this->host,$this->usuario,$this->clave,$this->db) or die(mysql_error());
        $this->cnn->set_charset("utf8");   
         
         echo "hola";
     }
     public function conectar()
     {
       return $this->cnn;
        
     }
  }
?>