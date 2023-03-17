<?php
//Importamos el archivo con las funciones.
require_once("../controlador/Controlador_Funciones.php");
require_once("../modelo/modelo_usuario.php");
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
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGA: agregar usuarios</title>

    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
	<!-- libreria JS de jQuery, debe tener internet para que se accione -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- JavaScript compilado más reciente, del framework bootstrap versión 3.3.7 -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
	<div class="container">
		<?php //require_once 'templates/ads.php';?>
		<div class="login-form">
			<?php //require_once 'templates/message.php';?>
			
			
			<div class="form-header">
				<i class="fa fa-user"></i>
			</div>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">
				<div>
					<input name="doc_usuario" id="documento" type="text" class="form-control" placeholder="Documento del usuario" value="<?php if(isset($doc_usuario)) echo $doc_usuario?>"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="clave_usuario" id="clave" type="password" class="form-control" placeholder="Contraseña" value="<?php if(isset($clave_usuario)) echo $clave_usuario?>"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="email_usuario" id="email" type="email" class="form-control" placeholder="Correo electrónico" value="<?php if(isset($email_usuario)) echo $email_usuario?>"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="Tipo_usuario" id="tipo_us" type="text" class="form-control" placeholder="Tipo de usuario" value="<?php if(isset($Tipo_usuario)) echo $Tipo_usuario?>"> 
					<span class="help-block"></span>
				</div>
				<button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Agregar....">Agregar usuario</button>
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
			<div class="form-footer">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-check"></i>
						<a href="vista_usuario.php">Volver a módulo usuario</a>
					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>