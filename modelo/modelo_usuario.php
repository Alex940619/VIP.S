<?php
 require_once("modelo_conexion.php");
 class usuario extends conexion
 {
   //Definición de los atributos
   private $doc_usuario;
   private $clave_usuario;
   private $mail_usuario;
   private $Tipo_usuario;
   private $cnn;     
     
   public function __construct()
   {
       $this->cnn = new conexion();
       $this->cnn = $this->cnn->conectar();
   }
   //Los métodos set colocan datos en
   //los atributos de las clases     
   public function setDoc_usuario($usuario)
   {
      $this->doc_usuario = $documento;  
   }
   //Los métodos get extraen datos de
   //los atributos de las clases
   public function getDoc_usuario()
   {
       return $this->doc_usuario;  
   }     
   public function setClave_usuario($Clave)
   {
      $this->clave_usuario = $Clave;  
   }
   public function getClave_usuario()
   {
       return $this->clave_usuario;  
   }
   public function setMail_usuario($Mail)
   {
      $this->mail_usuario = $Mail;  
   }
   public function getMail_usuario()
   {
       return $this->mail_usuario;  
   }
   public function setTipo_usuario($Tipous)
   {
      $this->Tipo_usuario = $Tipous;  
   }
   public function getTipo_usuario()
   {
       return $this->Tipo_usuario;  
   }     
    
   public function insertar($tabla,$datos)
   {
      //INSERT INTO usuario VALUES('1000','123','has@hotmail.com','invitado');
      $sql="INSERT INTO ".$tabla." VALUES('".$this->getDoc_usuario()."','".$this->getClave_usuario()."','".$this->getMail_usuario()."','".$this->getTipo_usuario()."')";
      //echo $sql;
      $resultado=$this->cnn->query($sql);
      if ($resultado) 
      {
          return true;
      }else{
        return false;
      }
     
   }

   public function contar()
   {
        $sql = "select count(*) as usuario from usuario";
        $conteo=$this->cnn->query($sql);
        if($conteo)
      {
         return $conteo->fetch_all(MYSQLI_ASSOC);
      }
      else
      {
        return false;
      }
   }

   public function buscar($tabla,$condicion)
   {
      if($condicion == null)
      {
        $sql="Select * from ".$tabla;
      }else{
        $sql="Select * from ".$tabla." where ".$condicion;
      }
      $resultado=$this->cnn->query($sql);
      //Select * FROM usuario where doc_usuario = '79629312';
     // $sql="Select * from ".$tabla." where doc_usuario = ".$condicion;
      //$sql="Select * from ".$tabla;   
     // $resultado=$this->conec->query($sql);
      if($resultado)
      {
        return $resultado->fetch_all(MYSQLI_ASSOC);
      }
      else
      {     
        return false;
      }
   }     
   public function actualizar($tabla,$campos)
   {
      //UPDATE usuario SET clave_usuario = '455434' WHERE doc_usuario = '6767788';
      $sql="UPDATE ".$tabla." SET clave_usuario = '".$this->getClave_usuario()."', mail_usuario = '".$this->getMail_usuario()."', tipo_usuario = '".$this->getTipo_usuario()."' WHERE doc_usuario = '".$this->getDoc_usuario()."'";
      //echo $sql;
      $resultado=$this->cnn->query($sql);
       if($resultado)
      {
        return true;
      }
      else
      {     
        return false;
      }
   }
   public function borrar($tabla,$condicion)
   {
      $sql="delete from ".$tabla." where doc_usuario =".$condicion;
      $resultado=$this->cnn->query($sql);
      if ($resultado)
       {
           return true;
       }
       else 
       {
           return false;
       }   
   }     
   
 }  
?>