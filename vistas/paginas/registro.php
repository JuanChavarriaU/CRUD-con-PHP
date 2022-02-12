<div class="d-flex justify-content-center">
	
	<form class="p-4 bg-light" method="post">

	<div class="form-group">

	<label for="nombre">Nombre:</label>

		<div class="input-group mb-3 input-group-sm">

			<div class="input-group-prepend">

				<span class="input-group-text"><i class="fas fa-user"></i></span>

			</div>

			<input type="text" class="form-control" id="nombre" name="registroNombre">

		</div>
	</div>


	<div class="form-group">
		<label for="email">Correo electrónico: </label>
		
		<div class="input-group mb-3 input-group-sm">

			<div class="input-group-prepend">

				<span class="input-group-text"><i class="fas fa-envelope"></i></span>

			</div>

			<input type="text" class="form-control" id="email" name="registroEmail">

		</div>
	</div>

	<div class="form-group">

		<label for="pwd">Contraseña: </label>
		
		<div class="input-group mb-3 input-group-sm">

			<div class="input-group-prepend">

				<span class="input-group-text"><i class="fas fa-key"></i></span>

			</div>

			<input type="text" class="form-control" id="pwd" name="registroPwd">

		</div>

	</div>

<?php 
# asi se instancia la clase de un metodo no estatico
/*$registro = new ControladorFormularios();
$registro -> ctrRegistro();
*/

#forma de instanciar la clase de un metodo estatico
$registro = ControladorFormularios::ctrRegistro();
	
	if ($registro=="ok") {
			#limpio el storage del navegador y asi no vuelve a reenviar la misma informacion a la base de datos. 
		echo '<script>
			if (window.history.replaceState){

				window.history.replaceState(null, null, window.location.href);
			}

		</script>';

		echo '<div class="alert alert-success">El usuario ha sido registrado satisfactoriamente.</div>';
	}

?>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
