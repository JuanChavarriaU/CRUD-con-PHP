<?php

class ControladorFormularios{


static public function ctrRegistro(){
		if (isset($_POST["registroNombre"])){
			
			$tabla = "registros";

			$datos = array( "nombre" => $_POST["registroNombre"],
							"email" => $_POST["registroEmail"],
							"password" => $_POST["registroPwd"] );


			$respuesta = ModelosFormularios::mdlRegistro($tabla, $datos);

			return $respuesta;
		
		}
	}


static public function ctrSeleccionarRegistros($item, $valor){

	$tabla = "registros";

	$respuesta = ModelosFormularios::mdlSeleccionarRegistros($tabla,$item, $valor);

	return $respuesta;
}




public function ctrIngreso(){

if (isset($_POST["ingresoEmail"])) {

	$tabla = "registros";
	$item = "email";
	$valor = $_POST["ingresoEmail"];

	$respuesta = ModelosFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
	
	if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPwd"]) {
		
		$_SESSION["validarIngreso"] = "ok"; #variable de sesion
		


		echo '<script>
			if (window.history.replaceState){

				window.history.replaceState(null, null, window.location.href);
			}
			window.location = "index.php?ruta=inicio";

		</script>';
	}else{
		echo '<script>
			if (window.history.replaceState){

				window.history.replaceState(null, null, window.location.href);
			}

		</script>';

		echo '<div class="alert alert-danger">Error al ingresar al sistema, el Email o la contraseña no coinciden. </div>';
	}




}

}



public function ctrActualizarRegistro(){

if (isset($_POST["actualizarNombre"])){

		if ($_POST["actualizarPwd"] != "") {
			
			$password = $_POST["actualizarPwd"];

		}else{

			$password = $_POST["pwdActual"];

		}
			
			$tabla = "registros";

			$datos = array(	"id" => $_POST["idUsuario"],
							"nombre" => $_POST["actualizarNombre"],
							"email" => $_POST["actualizarEmail"],
							"password" => $password);


			$respuesta = ModelosFormularios::mdlActualizarRegistro($tabla, $datos);

			if ($respuesta == "ok") {
				echo '<script>
			if (window.history.replaceState){

				window.history.replaceState(null, null, window.location.href);
			}

		</script>';

		echo '<div class="alert alert-success">Los datos han sido actualizados.</div>

			<script>

			setTimeout(function(){

					window.location = "index.php?ruta=inicio";

				},3000);


			</script>';
			}

			return $respuesta;
		
		}

}


public function ctrEliminarRegistros(){

	if (isset($_POST["eliminarRegistro"])) {

		$tabla = "registros";
		$valor = $_POST["eliminarRegistro"];
		#echo '<pre>'; print_r($valor); echo '</pre>';
		$respuesta = ModelosFormularios::mdlEliminarRegistros($tabla, $valor);
		
		if ($respuesta =="ok") {
			echo '<script>
			if (window.history.replaceState){

				window.history.replaceState(null, null, window.location.href);
			}
				window.location = "index.php?ruta=inicio";
		</script>';

		}

	}
}






}



?>