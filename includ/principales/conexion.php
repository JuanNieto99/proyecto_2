<?php 
	function conexion ()
	{
		$user = "root";
		$pass = "";
		$server ="localhost";
		$basededatos ="bd_1";

		$con = new mysqli($server,$user,$pass,$basededatos) or die('Error al conectar a la base de dato');
		 

		return $con;
	}
	
?>