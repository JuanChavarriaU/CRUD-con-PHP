
<?php 



if (isset($_GET["id"])) {
 	
 	$item = "id";

 	$valor = $_GET["id"];

	$usuario = Controladorformularios::ctrSeleccionarRegistros($item, $valor);
	#echo '<pre>'; print_r($usuario); echo '</pre>';

 } 

 ?>

<div class="d-flex justify-content-center">
	
	<form class="p-4 bg-light" method="post">

	<div class="form-group">

	

		<div class="input-group mb-3 input-group-sm">

			<div class="input-group-prepend">

				<span class="input-group-text"><i class="fas fa-user"></i></span>

			</div>

			<input type="text" class="form-control" value="<?php echo $usuario["nombre_completo"]; ?>" placeholder="Escriba su nombre" id="nombre" name="actualizarNombre">

		</div>
	</div>


	<div class="form-group">

		
		<div class="input-group mb-3 input-group-sm">

			<div class="input-group-prepend">

				<span class="input-group-text"><i class="fas fa-envelope"></i></span>

			</div>

			<input type="text" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="Escriba su email" id="email" name="actualizarEmail">

		</div>
	</div>

	<div class="form-group">

		
		
		<div class="input-group mb-3 input-group-sm">

			<div class="input-group-prepend">

				<span class="input-group-text"><i class="fas fa-key"></i></span>

			</div>

			<input type="text" class="form-control" placeholder="Escriba su contraseña" id="pwd" name="actualizarPwd">

			<input type="hidden" name="pwdActual" value="<?php echo $usuario["password"]; ?>">

			<input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">
		</div>

	</div>
	<?php 



		$actualizar = new ControladorFormularios();


		$actualizar -> ctrActualizarRegistro();




	 ?>

	<button type="submit" class="btn btn-primary">Actualizar</button>
</form>


</div>
