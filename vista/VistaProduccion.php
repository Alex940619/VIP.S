<?php
include("../Modelo/modelo_conexion.php");
require_once("../controlador/Controlador_Funciones.php");
require_once("../modelo/ModeloProduccion.php");
//Validaciones del formulario de agregar usuario
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.
$Nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$Cantidad_minima = isset($_POST['Cantidadmin']) ? $_POST['Cantidadmin'] : null;
$Cantidad_maxima = isset($_POST['Cantidadmax']) ? $_POST['Cantidadmax'] : null;

//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Este es el bloque de validación de campos del formulario
    //Valida que el campo documento usuario, no esté vacío.
   if (!validaRequerido($Nombre)) {
      $errores[] = 'El Nombre del producto es requerido, no sea digitado. !INCORRECTO!.';
   }
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($Cantidad_minima))
   {
      $errores[] = 'La cantidad minima es requerido, no se a digitado. !INCORRECTO!.';
   }
    if (!validaRequerido($Cantidad_maxima))
   {
      $errores[] = 'La cantidad maxima es requerido, no se a digitado. !INCORRECTO!.';
   }
   
 
      
 
    
    //Error hasta aqui llega
    
    if(!$errores)
    {
       //Recordar:Error Hasta aqui se ejecuta dando else entonces o no esta setiando los atributos o no esta llegando al metodo insertar
        $Prod=new Produccion();
        $Prod->setNombre($Nombre);
        $Prod->setCantMax($Cantidad_maxima);
        $Prod->setCantMin($Cantidad_minima);
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
					<input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre de producto"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="Cantidadmin" id="Cantidadmin" type="txt" class="form-control" placeholder="Cantidad minima"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="Cantidadmax" id="Cantidadmax" type="txt" class="form-control" placeholder="Cantidad Maxima"> 
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
						<th>Id_producto</th>
						<th>Nombre_Producto</th>
						<th>Cantidad_Minima</th>
						<th>Cantidad_Maxima</th>
						<th>Edit</th>
            <th>Eliminar</th>
					</tr>
				</tread>
                <?php
   
    $Prod = new Produccion();
    if($resultado=$Prod->buscar ("produccion",null))
    { 
       //echo var_dump($resultado);
       foreach ($resultado as $valor)
       {   
?> <tr>   
              <td> <?php echo $valor['id_produccion'];?></td>
              <td> <?php echo $valor['nombre'];?></td>
              <td> <?php echo $valor['cantidad_minima'];?></td>
              <td> <?php echo $valor['cantidad_maxima'];?></td>
              <?php
               echo "<td><a href='vista_modificar_usuario.php?doc= ".$valor['id_produccion']."' class='btn btn-warning'>Actualizar</a></td>";
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