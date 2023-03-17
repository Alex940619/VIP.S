<?php
 require_once("modelo_conexion.php");
 class Materiap extends conexion
 {
   //Definición de los atributos
   private $Id_Materia;
   private $Nombre_Mat;
   private $Cant_Max;
   private $Cant_Min;
   private $conec;     
     
   public function __construct()
   {
       $this->conec = new conexion();
       $this->conec = $this->conec->conectar();
   }
   //Los métodos set colocan datos en
   //los atributos de las clases     
   public function setId_Materia($Id)
   {
      $this->Id_Materia = $Id;  
   }
   //Los métodos get extraen datos de
   //los atributos de las clases
   public function getId_Materia()
   {
       return $this->Id_Materia;  
   }     
   public function setNombre($Nombre)
   {
      $this->Nombre_Mat = $Nombre;  
   }
   public function getNombre()
   {
       return $this->Nombre_Mat;  
   }
   public function setCantMax($Max)
   {
      $this->Cant_Max = $Max;  
   }
   public function getCantMax()
   {
       return $this->Cant_Max;  
   }
   public function setCantMin($Min)
   {
      $this->Cant_Min = $Min;  
   }
   public function getCantMin()
   {
       return $this->Cant_Min;  
   }     
    
   public function insertar($tabla,$datos)
   {
      //INSERT INTO usuario VALUES('1000522536','demo','buesquelo@hotmail.com','docente')
      //Especifico a que datos quiero afectar en la base de datos ya que el id es auto incremental y fecha se da auto maticamente pero no entra al codigo   
      $sql="INSERT INTO ".$tabla."(nombre_producto,cantmax,cantmin)  VALUES('".$this->getNombre()."','".$this->getCantMax()."','".$this->getCantMin()."";
      //echo $sql;
      $resultado=$this->conec->query($sql);
      if ($resultado)
      {
         return true;
      }
      else
      {
         return false;
      }
         
   }

   public function buscar($tabla,$condicion)
   {
       
      if ($condicion==null)
      {
         $sql="Select * from ".$tabla;
      }
      else
      {
         $sql="Select * from ".$tabla." where doc_usuario = ".$condicion; 
      }
       
      $resultado=$this->conec->query($sql);
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
    //Falta realizar la sentencia actualizar
      $sql="UPDATE  materiap set () where id_materiap = """;
      return true;   
   }
   public function borrar($tabla,$condicion)
   {
      $sql="DELETE FROM materiap where id_materiap = ´$condicion´";
      return true;      
   }     
   
 }  
?>