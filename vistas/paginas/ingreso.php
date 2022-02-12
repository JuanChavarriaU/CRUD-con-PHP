<div class="d-flex justify-content-center">
	
	<form class="p-4 bg-light" method="post">

	<div class="form-group">
		<label for="email">Correo electrónico: </label>
		
		<div class="input-group mb-3 input-group-sm">

			<div class="input-group-prepend">

				<span class="input-group-text"><i class="fas fa-envelope"></i></span>

			</div>

			<input type="text" class="form-control" id="email" name="ingresoEmail">

		</div>
	</div>

	<div class="form-group">

		<label for="pwd">Contraseña: </label>
		
		<div class="input-group mb-3 input-group-sm">

			<div class="input-group-prepend">

				<span class="input-group-text"><i class="fas fa-key"></i></span>

			</div>

			<input type="text" class="form-control" id="pwd" name="ingresoPwd">

			<!-- name es la variable POST -->

		</div>

	</div>

<?php 
# asi se instancia la clase de un metodo no estatico
/*$registro = new ControladorFormularios();
$registro -> ctrRegistro();
*/

#forma de instanciar la clase de un metodo estatico
$ingreso = new ControladorFormularios();
$ingreso->ctrIngreso();
	

?>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
