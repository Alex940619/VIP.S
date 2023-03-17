<!DOCTYPE html>
<html>
<head>
	<title>Proyecto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<!--Archivo css-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../assets/css/Estilos.css">
	<!--Trabajando iconos-->
	<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
	<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
	<!--Trabajar fuentes-->
	<link href="https://fonts.googleapis.com/css2?family=Muli:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<!--"d-flex"= display flex-->
	<div class="d-flex">

		<!--Creando el contenedor del sidebar-->
		<div id="sidebar-container" class="bg-primary">

			<!--Creando el logo-->
			<div class="logo">
				<h4 class="text-dark font-weight-bold">VIP.Software</h4>
			</div>

			<!--Creando el menu-->
			<div class="menu">
				<a href="" class="d-block p-3 text-dark font-weight-bold" target="principal"><i class="icon ion-md-apps"></i>   Home</a><hr>

				<a href="../vista/VistaProduccion.php" class="d-block p-3 text-dark font-weight-bold" target="principal"><ion-icon name="clipboard"></ion-icon>  Inv.Produccion</a><hr>

				<a href="../vista/VistaMateria.php" class="d-block p-3 text-dark font-weight-bold" target="principal"><ion-icon name="clipboard"></ion-icon>   Inv.Materia Prima</a><hr>

				<a href="Tabla_Compras.php" class="d-block p-3 text-dark font-weight-bold" target="principal"><ion-icon name="logo-usd"></ion-icon>    Compras</a><hr>

				<a href="Tabla_Ventas.php" class="d-block p-3 text-dark font-weight-bold" target="principal"><ion-icon name="stats"></ion-icon>   Ventas</a><hr>

				<a href="../vista/VistaProveedores.php" class="d-block p-3 text-dark font-weight-bold" target="principal"><ion-icon name="clipboard"></ion-icon>   Proveedores</a><hr>

				<a href="../vista/VistaUsuario.php" class="d-block p-3 text-dark font-weight-bold" target="principal">   Usuarios</a><hr>

				<a href="" class="d-block p-3 text-dark font-weight-bold" target="principal"><ion-icon name="settings"></ion-icon>   Configuracion</a><hr>

			</div>


		</div>

		<!--Se crea el nav bar-->
		<div class="w-100">
			
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


   <form class="form-inline my-2 my-lg-0 ">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><ion-icon name="search"></ion-icon>  Buscar</button>
    </form>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bienvenido
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-danger" href="#">perfil</a>
          <a class="dropdown-item text-danger" href="#">Bandeja Entra</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="#">Cerrar sesion</a>
        </div>
      </li>
     
    </ul>
   
  </div>
</div>
</nav>

	<!--Segunda seccion-->
		<div class="content">
			<section>
				<div class="container">
					<div class="row">
						<div class="col-9 col-lg-9 text-dark">
							<h1 class="font-weight-bold text-dark pt-3">Bienvenido</h1>
							<p class="text-dark c">Revisa sobre la ultima informacion</p>
						</div>
						<div class="col-3 col-lg-3 d-flex">
							<button class="btn-primary w-100 h-50 text-dark align-self-center">Descargar reporte</button>
						</div>
					</div>
				</div>
			</section>

				<!--Tercera sesion-->
				<div class="container">
					<div class="card">
  						<div class="card-body h-100">
    					<!--Se ponen las ventas conmpras y demas-->
  						</div>
					</div>
				</div>

				<!--ultima sesion-->
			<div class="container ">
							
				<iframe name="principal" scrolling="Yes"></iframe>
		

				
				</div
>
			</div>
		


		</div>

		</div>












<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>