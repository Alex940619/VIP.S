<?php 
 function validaRequerido($valor)
 {
    if(trim($valor) == '')
    {
       return false;
    }
    else
    {
       return true;
    }
 }
 


function Ingresar_Cuenta($Usu,$clav_per){
 $Administradores=array();
 $Administradores[0]="AlexR";
 $Administradores[1]="DiegoB";
 $Administradores[2]="StevenA";
 $Contraseñas=array();
 $Contraseñas[0]="123456789";
 $Contraseñas[1]="Pandemo";
 $Contraseñas[2]="1905891"; 
 $Bienvenido=true;
 if ($Usu==$Administradores[0] or $Usu==$Administradores[1] or $Usu==$Administradores[2] ) 
     return $Bienvenido;
 }
 

?>

