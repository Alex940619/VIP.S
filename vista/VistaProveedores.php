<?php
include("../Modelo/modelo_conexion.php");
require_once("../controlador/Controlador_Funciones.php");
require_once("../Modelo/ModeloProveedores.php");
//Validaciones del formulario de agregar usuario
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.
$Nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$Direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
$Telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
$Email = isset($_POST['email']) ? $_POST['email'] : null;
//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

     //Este es el bloque de validación de campos del formulario
    //Valida que el campo documento usuario, no esté vacío.
   if (!validaRequerido($Nombre)) {
      $errores[] = 'El campo nombre es requerido, no sea digitado. !INCORRECTO!.';
   }
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($Direccion))
   {
      $errores[] = 'El campo direccion es requerido, no se a digitado. !INCORRECTO!.';
   }
   //Valida que el email usuario, no esté vacío.
   if (!validaRequerido($Telefono))
   {
      $errores[] = 'El email del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   else
   {
      if (!ValidaRequerido($Email))
      {
         $errores[] = 'El campo e-mail es requerido, !INCORRECTO!.';    
      }
   }

  
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    if(!$errores)
    {
        //Recordar:Error Hasta aqui se ejecuta dando else entonces o no esta setiando los atributos o no esta llegando al metodo insertar
        
        $Pro = new Proveedores();
        $Pro->set_Nombre($Nombre);
        $Pro->set_Direccion($Direccion);
        $Pro->set_Telefono($Telefono);
        $Pro->set_Email($Email);
        
        
        if ($Pro->insertar("proveedores",null))
        {
          echo "Registro adicionado";  
        }
        else {
          echo "No se puede registrar";
        }
     
    }    
}

?>



<!---->
<!DOCTYPE html>
<html>
<head>
	<title>Vista Proveedor</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
 <!--Esto trabaja el bootstrap en internet -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!--Trabajando iconos-->
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
	<!--Trabajar fuentes-->
	<link href="https://fonts.googleapis.com/css2?family=Muli:wght@300&display=swap" rel="stylesheet">
		<!--script iconos-->
	 <script src="https://kit.fontawesome.com/8c63fceb4c.js" crossorigin="anonymous"></script>
</head>
<body>


<div class="container p-4">
	<div class="row">

		<!--primera sesion-->
		<div class="col-md-4">


			<div class="card card body">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">


				<div>
					<input name="nombre" id="nombre1" type="text" class="form-control" placeholder="Nombre proveedor" value="<?php if(isset($Nombre)) echo $Nombre?>"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="direccion" id="direccion1" type="txt" class="form-control" placeholder="Direccion_proveedor" value="<?php if(isset($Direccion)) echo $Direccion?>"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="telefono" id="telefono1" type="text" class="form-control" placeholder="Telefono" value="<?php if(isset($Telefono)) echo $Telefono?>"> 
					<span class="help-block"></span>
				</div>
                
                <div>
					<input name="email" id="email" type="text" class="form-control" placeholder="E-mail del proovedor" value="<?php if(isset($Email)) echo $Email?>"> 
					<span class="help-block"></span>
				</div>    
				<button class="btn btn-block bt-login btn-warning " type="submit" id="submit_btn" data-loading-text="Agregar....">Agregar Proveedor</button>
                <?php
    
                 if ($errores)
                { 
                ?>
                       <ul style="color: #f00;">
                <?php 
                       foreach ($errores as $error):?>
                         <li> <?php echo $error ?> </li>
                <?php  endforeach; ?>
                       </ul>
                <?php 
                }
                ?>
				
			</form>
			</div>

		</div>
		<!----->

		<div class="col-md-8">
			
			<table class="table table-bordered table-block table-success	">
				<tread>
					<tr>
						<th>Id_Proveedor</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Telefono</th>
            <th>email</th>
            <th>Fecha</th>
						<th>Edit</th>
            <th>Eliminar</th>
					</tr>
				</tread>
                <?php
   
    $Pro = new Proveedores();
    if($resultado=$Pro->buscar ("Proveedores",null))
    { 
       //echo var_dump($resultado);
       foreach ($resultado as $valor)
       {   
?> <tr>   
              <td> <?php echo $valor['id_proveedor'];?></td>
              <td> <?php echo $valor['nombre_proveedor'];?></td>
              <td> <?php echo $valor['direccion'];?></td>
              <td> <?php echo $valor['telefono'];?></td>
               <td> <?php echo $valor['email'];?></td>
                <td> <?php echo $valor['fecha_ingreso'];?></td>
              <?php
               echo "<td><a href='vista_modificar_usuario.php?doc= ".$valor['id_proveedor']."' class='btn btn-warning'>Actualizar</a></td>";
               echo "<td><a href='borrar.php' class='btn btn-danger'>Eliminar</a></td>";
              ?>      
          </tr>
<?php
       }
    }
    else
    {  
        echo  "No hay registros";
    }
   
?>
				
			</table>

		</div>


	</div>	

</div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>