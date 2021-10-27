<?php	
	/*********************************************************************************************
	 * 		Esta aplicación ha sido desarrollada para la prueba técnica para WAM. 
	 * 		Ha sido desarrollada completamente en PHP para la captura de datos y creación de
	 * 		un JSON con el que poder operar la tabla gracias al plug-in Datatables, al que le
	 * 		he añadido el plugin completo para el castellano. En la toma de datos para el plug-in
	 * 		he usado AJAX a modo de rellenar datos.
	 * 
	 * 		Para la parte del Front·End he usado HTML5 y Bootstrap 4, que me encuentro muy cómodo
	 * 		con él. Además el repositorio de Font-Awesome para los iconos.
	 * 
	 * 		Todo el repositorio se puede encontrar en:
	 * 			- GitHub (https://github.com/chusystico/WAM)
	 * 			- Hosting personal (https://test.chusystico.com)
	 * 			- ZIP
	 * 
	 * 		He dejado todo lo mejor comentado posible y en las partes que creo que pueden ser
	 * 		más confusas. Está todo comentado en PHP para que estos no aparezcan en la 
	 * 		depuración.
	 * 
	 * 		Por último, quería dejar todos los datos en una base de datos en MySQL sobre uno
	 * 		de mis servidores, pero la carga inicial tomaba un tiempo y como no sabía si esto
	 * 		iba a ser valorable lo he omitido para no entorpecerla. De todas formas he dejado 
	 * 		los archivos globales para su configuración y las funciones de Conexión/desconexión.
	 * 
	 * 		Un saludo,
	 * 
	 *													- Jesús Pineda -
	 * ******************************************************************************************/
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<?php /*	Inicio: Listado de cabeceras para agregar el Framework de Datatables, Bootstrap y FontAwesome 		*/ ?>
		<meta charset="utf-8">
		<meta name="description" content="Prueba Técnica WAM">
		<meta name="author" content="Jes&uacute;s Javier Pineda Moreno">
		<link rel="icon" href="http://test.chusystico.com/img/Favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<script  src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
		<script src="https://kit.fontawesome.com/3c79f9fdb2.js" crossorigin="anonymous"></script>
		<?php /*	Fin: Listado de cabeceras para agregar el Framework de Datatables, Bootstrap y FontAwesome 			*/ ?>
	</head>
	<body>
		<?php /*	Inicio: Creación del cuerpo del documento HTML y los FORM para toma de datos 			*/ ?>
		<div class="container-fluid">
			<div class="responsive">
				<div class="row">
					<div class="col-12">
						<form id="FormAdd" enctype="multipart/form-data" method="post"></form>
						<form id="FormMod" enctype="multipart/form-data" method="post"></form>
						<form id="FormSearch" enctype="multipart/form-data" method="post"></form>
						<div class="row py-3 px-5 bg-dark">					
							<div class="offset-1 col-9">
								<h3 class="text-white">WAM: Prueba t&eacute;cnica</h3>
								<h5 class="text-white">Backend We Are Marketing</h5>
								<title>WAM Test</title>
							</div>
							<div class="col-1 pt-3">
								<a class="btn btn-light btn-block" href="tmp/json" download>
									<i class="fas fa-file-download"></i> &nbsp <b> JSON</b>
								</a>
							</div>
						</div>	
						
					</div>	
		<?php /*	Fin: Creación del cuerpo del documento HTML y los FORM para toma de datos 			*/ 

	 /*	 Inicio: BACK END 		*/ 
	 
	// Inclusión de funciones y carga de datos
	require_once("gestion/json.php");
	$datos = Cargar_Datos();

	/*	 Fin: BACK END 			*/ 
	/*	 Inicio: FRONT END 		*/ 
?>	

					<script>
						$(document).ready(function () {
							$("#datos").DataTable({
								ajax:{
									url:"tmp/json",
									dataSrc:"",
								},
								columns: [
									{ "data": "Localizador" }, 
									{ "data": "Hu&eacute;sped" }, 
									{ "data": "Fecha de entrada" }, 
									{ "data": "Fecha de salida" }, 
									{ "data": "Hotel" }, 
									{ "data": "Precio" }, 
									{ "data": "Posibles Acciones" }],
								language:{
									url: "gestion/datatables_es.json"},
							});
						});
					</script>

					<div class="col-12 px-5 py-3">
						<div class="row">
							<div class="offset-md-1 col-md-10">
								<table id="datos" class="display w-100">
									<thead>
										<tr>
											<th>Localizador</th>
											<th>Hu&eacute;sped</th>
											<th>Fecha de entrada</th>
											<th>Fecha de salida</th>
											<th>Hotel</th>
											<th>Precio</th>
											<th>Posibles acciones</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Localizador</th>
											<th>Hu&eacute;sped</th>
											<th>Fecha de entrada</th>
											<th>Fecha de salida</th>
											<th>Hotel</th>
											<th>Precio</th>
											<th>Posibles acciones</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
<?php /*	 Fin: FRONT END 		*/ ?>
</html>	