<?php 
	include 'principales/includes.php';

	 
	class Modellogin  
	{
		
		 public function Login($usuario,$clave)
		 {
		 	//iniciar sesion
		 	$clave_encriptada = Encryptar::encrypt_($clave);
		 
		 	$conexion = conexion();
		 	$sql ="SELECT id,clave,nombre,apellido FROM `usuarios` WHERE `usuario` LIKE '".$usuario."'";
		 	$clavedb = "";
		 	
		 //	$consulta = $conexion->mysql_query ($sql);
		 	$resultado = $conexion->query($sql) or die ( $conexion->error);
		 	 if ($resultado ->num_rows>0) {
		 	 	 while ($r = $resultado->fetch_assoc()) {
		 	 	 	$clavedb  = $r["clave"];
		 	 	 	$nombre   = $r["nombre"];
		 	 	 	$apellido = $r["apellido"];
		 	 	 	$id = Encryptar::encrypt_( $r["id"]);
		 	 	 }
		 	 }
		   
		     
		 
		 	$conexion->close(); 
		 	if($clavedb==$clave_encriptada)
		 	{
		 	  	return  array('clave'=>$clavedb ,'nombre'=>$nombre ,'apellido'=>$apellido,'entro'=>true ,'usuario'=>$usuario,'id'=>$id);
		 	}else{
		 		return  array('entro'=>false);
		 	}
		 }
	}
 ?>