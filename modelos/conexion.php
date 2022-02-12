<?php 

class Conexion{


	static public function conectar(){

		#parametros del pdo PDO("nombre del servidor; nombre de la base de datos", "usuario", "contraseña")
		$link = new PDO("mysql:host=localhost;dbname=bd-formulario","root","");

		$link->exec("set names utf8");

		return $link;	

	}


}


?>