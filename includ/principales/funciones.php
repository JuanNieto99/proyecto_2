<?php 

  		function cargar_categorias($id_e='')
		 {
		 	$sql="SELECT  id,`nombre`, `id_categoria`  FROM `categorias` WHERE `estado`='1' ";
 			$conexion = conexion();
 			$retorno = $conexion->query($sql);
 			$option = "";
 			while ($consulta = $retorno->fetch_assoc()) {
 				$id = Encryptar::encrypt_($consulta["id"]);
 				$select="";
 				if(Encryptar::encrypt_($id_e)==$id)
 				{
					$select="selected";
 				}
 				$option =$option. "<option value='".$id."' ".$select." >".$consulta["nombre"]."</option>"; 
 				$select="";
 			}
 			$conexion->close();

 			return $option;
		 }

		 function validar_existencia_vista($vista)
		 {
		 	$conexion = conexion();
		 	$retorno = false;
		 	if($conexion->query("DESCRIBE `".$vista."`")) {
			$retorno = true;
			}
			$conexion->close();

			return $retorno ;
		 }

		  function editar_producto($id)
		 {
		 	$conexion = conexion();
		 	$sql ="SELECT `id`, `nombre`, `cantidad`, `stock`, `precio`,`id_categoria`,`visible`, `foto`,descripcion,link_mercado_libre,palabra_clave,id_categoria FROM vista_lista_productos WHERE id =".$id;
		 	$retorno =	$conexion->query($sql);
		 	$array = array();
		 	while ($r = $retorno->fetch_assoc()) {
		 		 $array = array('id'=>Encryptar::encrypt_($r["id"]), 'nombre'=>$r["nombre"],'cantidad'=>$r["cantidad"],'stock'=>$r["stock"],'precio'=>$r["precio"],'id_categoria'=>$r["id_categoria"],'visible'=>$r["visible"],'foto'=>$r["foto"],'descripcion'=>$r["descripcion"],'palabra_clave'=>$r["palabra_clave"],'link_mercado_libre'=>$r["link_mercado_libre"]);
		 	}
		 	$conexion->close();

		 	return $array;
		 }

		 function imagenes_realicionadas($id)
		 {
		 	$imagenes  = array( );
		 	if (is_numeric($id)) { 
			 	$conexion = conexion();
			 	
			 	$sql ="SELECT `id`,`nombre` FROM `imagenes` WHERE `id_producto`='".$id."' and `estado`='1'  ORDER by id DESC ";
			 	$r  = $conexion->query($sql);
			 	while ($retorno =$r->fetch_assoc() ) {
			 	   	$im = array('id'=>Encryptar::encrypt_($retorno["id"]),'nombre'=>$retorno["nombre"]); 
			 	 	array_push($imagenes,$im );

			 	}
			 	$conexion->close();
		 	}

		 	return $imagenes;
		 }

		 function buscar_configuraciones($id)
		 {
		 	$valor = 0;
		 	if(is_numeric($id))
		 	{
		 		$sql = "SELECT   `valor` FROM `configuraciones` WHERE  `id` = ".$id;
		 		$conexion = conexion();
		 		$r  = $conexion->query($sql);
		 		
		 		while ($retorno =$r->fetch_assoc()) {
		 			 $valor =$retorno['valor'];
		 		}
		 		$conexion->close();
		 	}

		 	return $valor;
		 }

 ?>