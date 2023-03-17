<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>VIP.Software </title>
  <link rel="shortcut icon" href="img/favicon.ico" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/login.css" />
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
         <img src="img/empanada_disco.gif" alt="logo" class="logo"> Ventas Inventario Producción Software VIP.S</h2> 
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Iniciar sesión</h1>
            <!--controlador login -->
            <form action="controlador/controlador_login.php" METHOD = "POST">
              <div class="form-group">
                  <?php  
        if (empty($_GET['info']))
        {
           echo "";    
        }
        else
        {
            if ($_GET['info']==1)// si es devuelto 1: es porque el usuario o clave estan erroneas
            {
                echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4>  <i class='icon fa fa-times-circle'></i> Incorrecto!</h4>
                   documento o clave es incorrecta, vuelva a verificar documento de usuario y contraseña.
                  </div>";
            }
            else
            {
                if ($_GET['info']==2)// Si la alerta es 2: es porque se ha salido del dashboard
                {
                    echo "<div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4>  <i class='icon fa fa-check-circle'></i> Exito!!</h4>
                      Has salido con éxito.
                      </div>";
                }
                else
                {
                    if ($_GET['info']==3)// Si la alerta es 3: usuario y claves validas
                    {
                        echo "<div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4>  <i class='icon fa fa-check-circle'></i> Exito!!</h4>
                        Usuario valido.
                        </div>";   
                    }    
                }
            }
        }
      ?>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese Usuario"> <br>

               </div>
              <div class="form-group mb-4">
                <label for="clave"> Contraseña </label>
                <input type="password" name="clave" id="clave" class="form-control" placeholder="Ingrese Su Contraseña"> <br>


               </div>
              <input name="login" id="login" class="btn btn-block login-btn" href="../vista/inicio.php" type="Submit" value="Ingresar">
            </form>
            <a href="#!" class="forgot-password-link"> Se te olvidó tu contraseña? </a>
            <p class="login-wrapper-footer-text"> No tienes una cuenta? <a href="" class="text-reset">solicitar acceso</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="img/empanada.png" alt="login image" class="login-img">
        </div>
      </div>
    </div>
    </main>
     <script src="js/jquery-3.5.1.slim.min"></script>
     <script src="js/popper.min"></script>
     <script src="js/bootstrap.bundle.min"></script>
     <script type="text/javascript">

      