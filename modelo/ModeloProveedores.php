<?php
 require_once("modelo_conexion.php");
 class Proveedores extends conexion
 {
   //Definición de los atributos
   private $Id_Proveedor;
   private $Nombre;
   private $Direccion;
   private $Telefono;
   private $Email;
   private $Fecha; 
   private $conec;     
     
   public function __construct()
   {
       $this->conec = new conexion();
       $this->conec = $this->conec->conectar();
   }
   //Los métodos set colocan datos en
   //los atributos de las clases     
   public function set_Id_Proveedor($documento)
   {
      $this->Id_Proveedor = $documento;  
   }
   //Los métodos get extraen datos de
   //los atributos de las clases
   public function get_Id_Proveedor()
   {
       return $this->Id_Proveedor;  
   }
     
   public function set_Nombre($nombre)
   {
      $this->Nombre = $nombre;  
   }
   public function get_Nombre()
   {
       return $this->Nombre;  
   }
     
   public function set_Direccion($direccion)
   {
      $this->Direccion = $direccion;  
   }
   public function get_Direccion()
   {
       return $this->Direccion;  
   }
   public function set_Telefono($telefono)
   {
      $this->Telefono = $telefono;  
   }
   public function get_Telefono()
   {
       return $this->Telefono;  
   }     
    
    public function set_Email($email)
   {
      $this->Email = $email;  
   }
   public function get_Email()
   {
       return $this->Email;  
   }     
    
     public function set__Fecha($fecha)
   {
      $this->Fecha = $fecha;  
   }
   public function get_Fecha()
   {
       return $this->Fecha;  
   }  
     
   public function insertar($tabla,$datos)
   {
      //Consulta de prueba:INSERT INTO proveedores(nombre_proveedor,direccion,telefono,email) VALUES('Super','Kra 8 #89a-67','9008752','plkut@gmail.com');
      //Especifico a que datos quiero afectar en la base de datos ya que el id es auto incremental y fecha se da auto maticamente pero no los coge ajajajaj 
      $sql="INSERT INTO ".$tabla."(nombre_proveedor,direccion,telefono,email) VALUES (".$this->get_Nombre()."','".$this->get_Direccion()."','".$this->get_Telefono()."','".$this->get_Email().")";
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
         $sql="Select * from ".$tabla." where id_proveedor = ".$condicion; 
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
      //Falta realizar el metodo actualizar
      $sql="UPDATE  proveedores set () where id_proveedor = ´aqui va el id seleccionado todavia no se ha desarrolado la vista´";
      return true;   
   }
   public function borrar($tabla,$condicion)
   {
      $sql="DELETE FROM proveedores where id_proveedor ='$condicion' ";
          
   }     
   
 }  
?>