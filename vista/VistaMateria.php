<?php
include("../Modelo/modelo_conexion.php");
require_once("../controlador/Controlador_Funciones.php");
require_once("../Modelo/Modelo_Materia.php");
//Validaciones del formulario de agregar usuario
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.
$Nombre_Mat = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;
$Cantidad_Maxima = isset($_POST['Cantidadmax']) ? $_POST['Cantidadmax'] : null;
$Cantidad_Minima = isset($_POST['Cantidadmin']) ? $_POST['Cantidadmin'] : null;
//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

     //Este es el bloque de validación de campos del formulario
    //Valida que el campo documento usuario, no esté vacío.
   if (!validaRequerido($Nombre_Mat)) {
      $errores[] = 'El campo nombre es requerido, no sea digitado. !INCORRECTO!.';
   }
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($Cantidad_Maxima))
   {
      $errores[] = 'El campo Cantidad maxima es requerido, no se a digitado. !INCORRECTO!.';
   }
   //Valida que el email usuario, no esté vacío.
   if (!validaRequerido($Cantidad_Maxima))
   {
      $errores[] = 'El campo cantidad minima es requerido, no se a digitado. !INCORRECTO!.';
   }
  

  
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    if(!$errores)
    {
        
         //Recordar:Error Hasta aqui se ejecuta dando else entonces o no esta setiando los atributos o no esta llegando al metodo insertar
        $Mat = new Materiap();
        $Mat->setNombre($Nombre_Mat);
        $Mat->setCantmax($Cantidad_Maxima);
        $Mat->setCantmin($Cantidad_Minima);

        
        if ($Mat->insertar("materiap",null))
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
	<title>VistaMateria Prima</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/Estilos.css">
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
			
		<?php if (isset($_SESSION['message'])){ ?>
		 	<div class="alert alert-success alert-dismissible fade show" role="alert">
  				<?=$_SESSION['message']?>
 				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
 				 </button>
				</div>
			<?php  session_unset();} ?>


			<div class="card card body">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">
				<div>
					<input name="Nombre" id="nombre" type="text" class="form-control" placeholder="Nombre del Producto" value="<?php if(isset($Nombre)) echo $doc_usuario?>"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="Cantidadmax" id="Cantmax" type="txt" class="form-control" placeholder="Cantidad_Maxima" value="<?php if(isset($Cantidad_Maxima)) echo $Cantidad_Maxima?>"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="Cantidadmin" id="Cantmin" type="txt" class="form-control" placeholder="Cantidad_Minima" value="<?php if(isset($Cantidad_Minima)) echo $Cantidad_Minima?>"> 
					<span class="help-block"></span>
				</div>
				
				<button class="btn btn-block bt-login btn-primary " type="submit" id="submit_btn" data-loading-text="Agregar....">Agregar usuario</button>
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
						<th>Id_Producto</th>
						<th>Nombre</th>
						<th>Cantidad_Maxima</th>
						<th>Cantidad_Minima</th>
						<th>Edit/Eliminar</th>
					</tr>
				</tread>
                <?php
   
    $us = new Materiap();
    if($resultado=$us->buscar ("materiap",null))
    { 
       //echo var_dump($resultado);
       foreach ($resultado as $valor)
       {   
?> <tr>   
              <td> <?php echo $valor['id_materiap'];?></td>
              <td> <?php echo $valor['nombre_producto'];?></td>
              <td> <?php echo $valor['cantmax'];?></td>
              <td> <?php echo $valor['cantmin'];?></td>
              <?php
               echo "<td><a href='vista_modificar_usuario.php?doc= ".$valor['id_materiap']."' class='btn btn-warning'>Actualizar</a></td>";
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






<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>