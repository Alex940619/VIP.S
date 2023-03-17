<?php 
function validaRequerido($valor)
{
  if (trim($valor)=='')
  {
     return false; 	
  }
  else
  {
     return true;
  }	
}

function validaNumero($valor)
{
   if (is_numeric($valor))
   {
   	  return true;
   }
   else
   {
   	  return false;
   }	
}

function promedio($n1,$n2,$n3)
{
   $suma=($n1+$n2+$n3)/3;
   return $suma;
}


function ValidaEmail($email)
{
	if (strpos($email, '@') === false) 
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
 $Administradores[0]="Steven_Ayala";
 $Administradores[1]="Alex_Ramos";
 $Administradores[2]="Diego_Beltran";
 $Contraseñas=array();
 $Contraseñas[0]="123456789";
 $Contraseñas[1]="Pandemo";
 $Contraseñas[2]="1905891"; 
 $Bienvenido=true;
 if ($Usu==$Administradores[0] or $Usu==$Administradores[1] or $Usu==$Administradores[2] ) 
     return $Bienvenido;
 }
?>