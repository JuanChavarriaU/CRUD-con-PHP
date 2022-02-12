<?php 

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD con PHP y MySQL</title>

	<!-- plugins de CSS-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- plugins de JavaScript-->
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

</head>
<body>
	<!-- logotipo -->
<div class="container-fluid">

	<h3 class="text-center py-3"> Create, Read, Update, Delete </h3>

</div>	

<!-- Botones llamado por variable GET-->

<div class="container-fluid bg-light">

	<div class="container">

		<ul class="nav nav-justified py-2 nav-pills">
			
				<?php if (isset($_GET["ruta"])): ?>

					<?php if ($_GET["ruta"] == "registro"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?ruta=registro">Registro</a>
					</li>

					<?php else: ?>

					<li class="nav-item">
						<a class="nav-link " href="index.php?ruta=registro">Registro</a>
					</li>

					<?php endif ?>	

					<?php if ($_GET["ruta"] == "ingreso"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?ruta=ingreso">Ingreso</a>
					</li>

					<?php else: ?>

					<li class="nav-item">
						<a class="nav-link " href="index.php?ruta=ingreso">Ingreso</a>
					</li>

					<?php endif ?>	

					<?php if ($_GET["ruta"] == "inicio"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?ruta=inicio">Inicio</a>
					</li>

					<?php else: ?>

					<li class="nav-item">
						<a class="nav-link " href="index.php?ruta=inicio">Inicio</a>
					</li>

					<?php endif ?>	
					
					<?php if ($_GET["ruta"] == "salir"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?ruta=salir">Salir</a>
					</li>

					<?php else: ?>

					<li class="nav-item">
						<a class="nav-link " href="index.php?ruta=salir">Salir</a>
					</li>

					<?php endif ?>	

					
					<?php else: ?>
						
			<li class="nav-item">
				<a class="nav-link active" href="index.php?ruta=registro">Registro</a>
			</li>

			<li class="nav-item">
				<a class="nav-link " href="index.php?ruta=ingreso">Ingreso</a>
			</li>

			<li class="nav-item">
				<a class="nav-link " href="index.php?ruta=inicio">Inicio</a>
			</li>

			<li class="nav-item">
				<a class="nav-link " href="index.php?ruta=salir">Salir</a>
			</li>


				<?php endif ?>	

			

		</ul>

	</div>

</div>

<!-- llamado de variables GET -->
<div class="container-fluid ">

	<div class="container py-5">
	<!-- lista blanca de URL's, aqui se permite que pasa por la url para que llame a las paginas internas. si introduce una palabra que no forma parte de las que estan ahi, la persona probablemente quiere realizar un ataque de inyeccion sql por url-->
		<?php
			#isset() determina si la variable está definida o es null.

		if (isset($_GET["ruta"])) {
			
			if($_GET["ruta"] == "registro" || 
				$_GET["ruta"] == "ingreso" ||
				$_GET["ruta"] == "inicio" ||
				$_GET["ruta"] == "editar" ||
				$_GET["ruta"] == "salir"  )

			include "paginas/".$_GET["ruta"].".php";

			else {

				include "paginas/error404.php";
			}
		}else {

		include "paginas/registro.php";
		}

		
		
		?>


	</div>
</div>	  



</body>
</html>