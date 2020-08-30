<?php 
	include 'principales/includes.php';
	header('Content-Type: application/json; charset=utf-8');
	 
	class Modelproducto  
	{
		
		 public function registrar($nombre,$cantidad,$stock,$precio,$palabra_clave,$id_categoria,$descripcion,$visible )
		 {
		 	 $sql="INSERT INTO `productos`( `nombre`, `cantidad`, `stock`, `precio`, `palabra_clave`, `id_categoria`, `descripcion`,   `visible`) VALUES ('".$nombre."','".$cantidad."','".$stock."','".$precio."','".$palabra_clave."','".$id_categoria."','".$descripcion."','".$visible."' ) ";
		 	// var_dump( $sql);
		 	 $conexiondb = conexion();
		 	 	  $retorno = $conexiondb->query($sql);
		 	 $conexiondb->close();
		 	 return $retorno;
		 }
		 public function lista()
		 {
		 	$conexiondb = conexion();
          
	   		 $vista = 'vista_lista_productos';
	    

	   		 if(!validar_existencia_vista($vista)){
	   			 $conexiondb->query("CREATE VIEW vista_lista_productos AS SELECT p.`id`, p.`nombre`, p.`cantidad`, p.`stock`, p.`precio`, p.`palabra_clave`, (SELECT nombre FROM categorias WHERE id =p.id_categoria) as categoria,p.id_categoria, p.`descripcion`, p.`estado`, p.`visible`,  (SELECT id_producto FROM imagenes WHERE id_producto=p.`id` GROUP by id_producto) as foto ,p.link_mercado_libre FROM `productos` p  GROUP BY p.`id` DESC");
	   		 }

	          $sql = "SELECT `id`, `nombre`, `cantidad`, `stock`, `precio`,`categoria`,`visible`, `foto`,descripcion,`estado`,palabra_clave,link_mercado_libre,id_categoria FROM vista_lista_productos  WHERE `estado`='1'";
	          $retorno = $conexiondb->query($sql);
	         	 $td="";
	         	 
	          while ($r = $retorno->fetch_assoc()) {
	          	$opciones = '<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  '.dashboard_27.'
				  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					    <a class="dropdown-item"  href="editar-producto-'.Encryptar::encrypt_($r["id"]).'">'.dashboard_30.'</a>
					    <a class="dropdown-item eliminar"  href="#" data-control="'.Encryptar::encrypt_($r["id"]).'">'.dashboard_31.'</a> 
					  </div>
					</div>
				</td>';
	          	 empty($r["visible"]) ?$visible = '<span class="badge badge-danger">'.dashboard_35.'</span>':$visible = '<span class="badge badge-success">'.dashboard_34.'</span>';
	          	 empty($r["stock"]) ?$stock = '<span class="badge badge-danger">'.dashboard_37.'</span>':$stock = '<span class="badge badge-success">'.dashboard_36.'</span>';
	          	empty($r["foto"])?$foto = '<span class="badge badge-danger">'.dashboard_64.'</span>':$foto = '<span class="badge badge-success">'.dashboard_63.'</span>';
	          	 $data["data"][] = array_map('utf8_encode',  array('nombre' =>$r["nombre"] ,'cantidad' =>$r["cantidad"],'precio' =>$r["precio"],'foto' =>$foto,'categoria' =>$r["categoria"],'visible' =>$visible,'stock' =>$stock ,'descripcion' =>$r["descripcion"],'opcion' =>$opciones) ); 
	          	/* $td=$td."<tr> ";
	             $td=$td.'<td>'.$r["nombre"].'</td>' ;
	             $td=$td.'<td>'.$r["cantidad"].'</td>' ;
	             $td=$td.'<td>'.$r["precio"].'</td>' ;
	             $td=$td.'<td>'.$r["foto"].'</td>' ;
	             $td=$td.'<td>'.$r["categoria"].'</td>' ;
	             $td=$td.'<td>'.$visible .'</td>' ;
	             $td=$td.'<td>'.$stock.'</td>' ;
	             $td=$td.'<td>'.$r["descripcion"].'</td>' ;
	             $td=$td.'<td>  ;
				$td=$td."</tr> ";*/
	          }
	          
	   		 $conexiondb->close();
	    
	   	  
	         return   $data;
 
		 }

		 public function eliminar($id){
		 	$sql = "UPDATE `productos` SET  `estado`='0'  WHERE `id`=".$id;
		 	$conexiondb = conexion();
 			 $retorno = $conexiondb->query($sql);
		 	 $conexiondb->close();
		 	 return $retorno; 
		 }

		public function modificar($id,$nombre,$cantidad,$stock,$precio,$palabra_clave,$id_categoria,$descripcion,$visible,$lml){
		 	$sql = "UPDATE `productos` SET  `nombre`='".$nombre."',`cantidad`='".$cantidad."',`stock`='".$stock."',`precio`='".$precio."',`palabra_clave`='".$palabra_clave."',`id_categoria`='".$id_categoria."',`descripcion`='".$descripcion."', `visible`='".$visible."', `link_mercado_libre`='".$lml."' WHERE `id`='".$id."'";
		  
		 	$conexiondb = conexion();
 			 $retorno = $conexiondb->query($sql);
		 	 $conexiondb->close();
		 	 return $retorno; 
		 }

		 public function guardar_foto($nombre,$id_producto)
		 {
		 	$sql="INSERT INTO `imagenes`( `nombre`, `id_producto`) VALUES ('".$nombre."','".$id_producto."') ";
		 	$conexiondb = conexion();
		 	$r = $conexiondb->query($sql);
		 	$conexiondb->close();

		 	return $r;
		 }

		 public function validar_imagen_repetida($nombre)
		 {
		 	$conexion = conexion();
		 	$sql = "SELECT id FROM imagenes WHERE nombre='".$nombre."'";
		 	$r = $conexion->query($sql);
		 	$re=true;
		  	if($r->num_rows>0)
		  	{
		  		$re = false;
		  		
		  	}
		 	$conexion->close();

		 	return $re;
		 }

		 public function eliminar_foto($id)
		 {
		 	if (is_numeric($id)) {
		 	
		 	$conexion = conexion();
		 	$sql = "UPDATE `imagenes` SET  `estado`='0' WHERE `id`= ".$id;
		 	$re = $conexion->query($sql);
		  
		 	$conexion->close();

		 	return $re;

		 	}
		 }


	}
	/* 	$data["data"][] =array(  
		          	 array('db' =>$r["nombre"],'dt'=>0),
		          	 array('db' =>$r["cantidad"],'dt'=>1),
		          	 array('db' =>$r["precio"],'dt'=>2),
		          	 array('db' =>$r["foto"],'dt'=>3),
		          	 array('db' =>$r["categoria"],'dt'=>4),
		          	 array('db' =>$r["visible"],'dt'=>5),
		          	 array('db' =>$r["stock"],'dt'=>6),
		          	 array('db' =>$r["descripcion"],'dt'=>7),
		          	 array('db' =>$r["nombre"],'dt'=>8)
		          	);
	          	 */
 ?>