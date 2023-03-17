<!-- AQUI SE LLEVA ACABO LA CONSULTA PARA INGRESAR DATOS-->
<?php

 if (isset($_REQUEST['btn_guardar'])) 
 {
	 require_once ("../modelo/modelo_conexion.php");

 	$fecha=$_POST['fecha'];
 	$id=$_POST['id'];
 	$nombre=$_POST['nombre'];
 	$cantidad=$_POST['cantidad'];

 $mysql_query=("INSERT INTO produccion(fecha_produccion, id_materiap_produccion, nom_produccion, cantidad_produccion) VALUES('$_POST[fecha]', '$_POST[id]', '$_POST[nombre]', '$_POST[cantidad]'");

if ( $mysql_query ) 

	{
	header("location:Produccion2.php");

	}
} 

?>