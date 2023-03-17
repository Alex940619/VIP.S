<?php
include("../Modelo/modelo_conexion.php");
require_once("../controlador/Controlador_Funciones.php");
require_once("../modelo/modelo_usuario.php");
//Validaciones del formulario de agregar usuario
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.
$doc_usuario = isset($_POST['doc_usuario']) ? $_POST['doc_usuario'] : null;
$clave_usuario = isset($_POST['clave_usuario']) ? $_POST['clave_usuario'] : null;
$email_usuario = isset($_POST['email_usuario']) ? $_POST['email_usuario'] : null;
$Tipo_usuario = isset($_POST['Tipo_usuario']) ? $_POST['Tipo_usuario'] : null;
//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Este es el bloque de validación de campos del formulario
    //Valida que el campo documento usuario, no esté vacío.
   if (!validaRequerido($doc_usuario)) {
      $errores[] = 'El documento del usuario es requerido, no sea digitado. !INCORRECTO!.';
   }
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($clave_usuario))
   {
      $errores[] = 'La clave del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   //Valida que el email usuario, no esté vacío.
   if (!validaRequerido($email_usuario))
   {
      $errores[] = 'El email del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   else
   {
      if (!ValidaEmail($email_usuario))
      {
         $errores[] = 'El email del usuario debe contener @ o .com o .net, !INCORRECTO!.';    
      }
   }

   if (!validaRequerido($Tipo_usuario))
   {
      $errores[] = 'El tipo del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }    
   //Valida que el campo documento sea numérico y no esté vacío.        
   if (!validaNumero($doc_usuario))
   {
      $errores[] = 'El documento del usuario es numérico, !INCORRECTO!.';
   }
    
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    
    if(!$errores)
    {
        //require_once("vista_usuario.php");
        $us=new usuario();
        $us->setDoc_usuario($doc_usuario);
        $us->setClave_usuario($clave_usuario);
        $us->setMail_usuario($email_usuario);
        $us->setTipo_usuario($Tipo_usuario);
        if ($us->insertar("usuario",null))
        {
          echo "Registro adicionado";  
        }
        else
        {
          echo "Registro, no se puede adicionar, porque ya existe un registro con el documento digitado";
        }
    }    
}

?>



<!---->
<!DOCTYPE html>
<html>
<head>
	<title>Vista Usuario</title>
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
					<input name="doc_usuario" id="documento" type="text" class="form-control" placeholder="Documento del usuario"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="clave_usuario" id="clave" type="password" class="form-control" placeholder="Contraseña"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="email_usuario" id="email" type="email" class="form-control" placeholder="Correo electrónico"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="Tipo_usuario" id="tipo_us" type="text" class="form-control" placeholder="Tipo de usuario"> 
					<span class="help-block"></span>
				</div>
				<button class="btn btn-block bt-login btn-warning " type="submit" id="submit_btn" data-loading-text="Agregar....">Agregar usuario</button>
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
						<th>Doc_Usuario</th>
						<th>Clave_Usuario</th>
						<th>Email-Usuario</th>
						<th>Tipo_Usuario</th>
						<th>Edit</th>
            <th>Eliminar</th>
					</tr>
				</tread>
                <?php
   
    $us = new usuario();
    if($resultado=$us->buscar ("usuario",null))
    { 
       //echo var_dump($resultado);
       foreach ($resultado as $valor)
       {   
?> <tr>   
              <td> <?php echo $valor['doc_usuario'];?></td>
              <td> <?php echo $valor['clave_usuario'];?></td>
              <td> <?php echo $valor['mail_usuario'];?></td>
              <td> <?php echo $valor['Tipo_usuario'];?></td>
              <?php
               echo "<td><a href='Vistamod/vista_modificar_usuario.php?doc= ".$valor['doc_usuario']."' class='btn btn-warning'>Actualizar</a></td>";
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
      foreach ($us->contar() as $conteo)
      {  
        ///Extrae la columna usuarios columna que trae el numero guardado  
        echo  "El número de usuarios en el sistema es: ".$conteo['usuarios'];
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