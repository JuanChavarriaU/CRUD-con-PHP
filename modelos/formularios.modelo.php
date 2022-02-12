<?php
require_once "conexion.php";

$conexion = Conexion::conectar();

class ModelosFormularios{

	#registro
	static public function mdlRegistro($tabla, $datos){

		#stmt es statement o declaracion. 

		#prepare(): prepara una sentencia SQL para ser ejecutada por el metodo PDOStatement::execute(). la sentencia SQL puede contener cero o mas marcadores de parametros con nombre (:name) o signos de interrogacion (?) por lo cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parametros.
		$stmt = Conexion::conectar() ->prepare("INSERT INTO $tabla(nombre_completo, email, password) VALUES (:nombre, :email, :pwd)");

			#bindParam(): Vincula una variable de PHP a un parametro de sustitucion con nombre de signo de interrogacion correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":pwd", $datos["password"], PDO::PARAM_STR);

			if ($stmt->execute()) { #abre la conexion
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close(); #cierra la conexion

			$stmt = null;

	}



	static public function mdlSeleccionarRegistros($tabla, $item, $valor){

		if ($item == null && $valor == null) {
			
			$stmt = Conexion::conectar() ->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla");

			$stmt->execute();

			return $stmt -> fetchAll();
		#fetchAll devuelve todos los registros.
		
		}else{

	$stmt = Conexion::conectar() ->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item");
			
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();
			#fetch() solo devuelve un solo registro.
		}


		$stmt -> close(); #cierra la conexion

		$stmt = null;
	}


	static public function mdlActualizarRegistro($tabla, $datos){

		
		$stmt = Conexion::conectar() ->prepare("UPDATE $tabla SET nombre_completo=:nombre, email=:email, password=:pwd WHERE id=:id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":pwd", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		
	
			if ($stmt->execute() ) { #abre la conexion
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close(); #cierra la conexion

			$stmt = null;

	}

	static public function mdlEliminarRegistros($tabla, $valor){

		
		$stmt = Conexion::conectar() ->prepare("DELETE FROM $tabla WHERE id=:id");

		$stmt->bindParam(":id", $valor, PDO::PARAM_INT);
		
	
			if ($stmt->execute()) { #abre la conexion
				return "ok";
			}else{
				print_r(Conexion::conectar()->errorInfo());
			}
			$stmt -> close(); #cierra la conexion

			$stmt = null;

	}




}


?>