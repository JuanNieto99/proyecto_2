<?php 
	include 'principales/includes.php';
	header('Content-Type: application/json; charset=utf-8');
	 
	class Modelcategoria  
	{
		
		 public function registrar($nombre, $descripcion,$padre )
		 {
		 	 $sql="INSERT INTO `categorias`(  `nombre`, `id_categoria`, `descripcion` ) VALUES  ('".$nombre."','".$padre."','".$descripcion."') ";
		 	// var_dump( $sql);
		 	 $conexiondb = conexion();
		 	 	  $retorno = $conexiondb->query($sql);
		 	 $conexiondb->close();
		 	 return $retorno;
		 }
		 public function lista()
		 {
		 	$conexiondb = conexion();
          
	   		 $vista = 'vista_lista_categoria';
	    

	   		 if(!validar_existencia_vista($vista)){
	   			 $conexiondb->query("CREATE VIEW vista_lista_categoria AS  SELECT c.`id`, c.`nombre`, (SELECT `nombre` FROM categorias WHERE id=c.id_categoria ) as categoria, c.`descripcion`,`estado`  FROM `categorias` c      GROUP BY c.`id` DESC");
	   		 }

	          $sql = "SELECT `id`, `nombre`, `categoria`,descripcion  FROM vista_lista_categoria  WHERE `estado`='1'";
	          $retorno = $conexiondb->query($sql);
	         	 $td="";
	         	 
	          while ($r = $retorno->fetch_assoc()) {
	          	$opciones = '<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  '.dashboard_27.'
				  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					    <a class="dropdown-item editar"   href="#" data-control="'.Encryptar::encrypt_($r["id"]).'">'.dashboard_30.'</a>
					    <a class="dropdown-item eliminar"  href="#" data-control="'.Encryptar::encrypt_($r["id"]).'">'.dashboard_31.'</a> 
					  </div>
					</div>
				</td>'; 
	          	 $data["data"][] = array_map('utf8_encode',  array('nombre' =>$r["nombre"] ,'descripcion' =>$r["descripcion"],'categoria_padre' =>empty($r["categoria"])?dashboard_71:$r["categoria"] ,'opcion' =>$opciones) ); 
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
		 	$sql = "UPDATE `categorias` SET  `estado`='0'  WHERE `id`=".$id;
		 	$conexiondb = conexion();
 			 $retorno = $conexiondb->query($sql);
		 	 $conexiondb->close();
		 	 return $retorno; 
		 }

		 public function editar($id){
		 	 $sql = " SELECT `id`, `nombre`, `id_categoria`, `descripcion`  FROM `categorias` WHERE `estado`='1' and id=".$id;
		 	 $conexiondb = conexion();
 			 $retorno = $conexiondb->query($sql);
 			  $form ='';
 			  while ($consulta = $retorno->fetch_assoc()) {
 			 $form = '<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text">'.dashboard_66.'</span>
					  </div>
				  	
				  	  <input type="text" aria-label="nombre" name="nombre" class="form-control" value="'.$consulta["nombre"].'" required>
				  </div>  
			</div>
		
			<br>	 
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text" for="categoria"> '.dashboard_68.' </span>
					  </div>
				  	
				  	  <select  aria-label="categoria" name="categoria" class="form-control" required>
				  	  	<option value="0" ><?=dashboard_74?></option>'.
				  	  	cargar_categorias($consulta["id_categoria"]).'
				  	  </select>
				  </div>
			</div> 
	 		<br>	
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"> '.dashboard_67.' </span>
					  </div>
				  	
				  	  <textarea name="descripcion" class="form-control">'.$consulta["descripcion"].'</textarea>
				  </div>  
			</div>
			<input value="modificar_categoria" type="hidden"  name="case">
			<input value="'.Encryptar::encrypt_($consulta["id"]).'" type="hidden"  name="id">
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<br>
			<div style="text-align: center;	">	
			<button type="submit"  class="btn btn-primary btn-lg " >'.dashboard_73.'</button>
			</div>';
			
 			
 
 			  	
 			 }
		 	 $conexiondb->close();
		 	 return  $form; 
		 }

		public function modificar($id,$nombre,$cantidad,$stock,$precio,$palabra_clave,$id_categoria,$descripcion,$visible,$lml){
		 	$sql = "UPDATE `productos` SET  `nombre`='".$nombre."',`cantidad`='".$cantidad."',`stock`='".$stock."',`precio`='".$precio."',`palabra_clave`='".$palabra_clave."',`id_categoria`='".$id_categoria."',`descripcion`='".$descripcion."', `visible`='".$visible."', `link_mercado_libre`='".$lml."' WHERE `id`='".$id."'";
		  
		 	$conexiondb = conexion();
 			 $retorno = $conexiondb->query($sql);
		 	 $conexiondb->close();
		 	 return $retorno; 
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