<!-- AQUI SE CREA LA TABLA O EL FORMULARIO DONDE SE VAN A DIGITAR LOS DATOS-->
<?php
date_default_timezone_set('america/bogota');
$date = date('d/m/Y h:i:s a', time());

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<title>Produccion</title>
	<script src="../js/jquery-3.4.0.min"></script>
	<script src="../js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/materialize.min.css">


</head>
<body>

	<div class="row">

	<!-- formulario registro -->
		<div class="col l4" style="position:absolute; top: 15%;">
			<h5>  REGISTRO DE PRODUCTOS </h5><br>
	
			<form action="Produccion1.php" method="post" accept-charset="utf-8" name="form">

				<div class=" input-field col l5">
					<label class="d-block p-3 text-dark font-weight-bold" for="fecha">Fecha</label>
					<input type="text" name="fecha" value="<?php echo $date?>" placeholder="">
				</div>

				<div class="input-field col l12" >
					<label class="d-block p-3 text-dark font-weight-bold" for="id">Id</label>
					<input type="text" name="id" value="">
				</div>

				<div class=" input-field col l12">
					<label class="d-block p-3 text-dark font-weight-bold" for="nombre"> Nombre  </label>
					<input type="text" name="nombre" value="">
				</div>


				<div class=" input-field col l4">
					<label class="d-block p-3 text-dark font-weight-bold" for="cantidad">Cantidad</label>
					<input type="text" name="cantidad" value=""> 				
				</div>	

				<div class=" input-field col l4"><br>
					<button type="submit" class="d-block p-3 text-dark font-weight-bold" name="btn_guardar"> Guardar</button> 
				</div>	

			
			</form>
		</div>

		<!-- tabla -->
	<div class="col l7 offset-l5" style="position:absolute; top:15%">
	<table>
		<h5> LISTA </h5><br>
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Id</th>
				<th>Nombre</th>
				<th>Cantidad</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><a href="#" class="btn btn-small"> EDITAR </a> </td>
			</tr>
		</tbody>
	</table>	
	</div>	
 </body>
</html>