<?php 
	include 'model/modelproducto.php';
	empty($_POST["case"])?$case=NULL:$case=$_POST["case"];
	if ($case==NULL) {
		empty($_GET["case"])?$case=NULL:$case=$_GET["case"];
	}
	$retorno = array();
	switch ($case) {
			case 'lista_productos':
 
			$lista = Modelproducto::lista();
	 
			 
			break;
			case 'registrar_producto':
	 
				$nombre = $_POST["nombre"];
				$cantidad = $_POST["cantidad"];
				$precio = $_POST["precio"];
				$palabra_clave = $_POST["palabra_clave"];
				$id_categoria =  Encryptar::decrypt_($_POST["categoria"]);
				$descripcion = $_POST["descripcion"];
				$visible = empty($_POST["visible"])?$visible=0:$visible=1;
				$stock = empty( $_POST["stock"])?$stock=0:$stock=1;
 

				$mensaje = array('texto' =>dashboard_33 ,"titulo"=>dashboard_14,'tipo'=>'error' );
				if(Modelproducto::registrar($nombre,$cantidad,$stock,$precio,$palabra_clave,$id_categoria,$descripcion,$visible ))
				{
					$mensaje = array('texto' =>dashboard_32 ,"titulo"=>dashboard_15,'tipo'=>'success' );
				}
				 
				$data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
			break;
			case 'eliminar':
				 $id =Encryptar::decrypt_($_POST["id"]);
				 $mensaje = array('texto' =>dashboard_39 ,"titulo"=>dashboard_14,'tipo'=>'error' );
				if(Modelproducto::eliminar($id))
				{
					$mensaje = array('texto' =>dashboard_38 ,"titulo"=>dashboard_15,'tipo'=>'success' );
				}
				$data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
			break;
			case 'modificar_producto':
				$id =Encryptar::decrypt_($_POST["id"]);
				$nombre = $_POST["nombre"];
				$cantidad = $_POST["cantidad"];
				$precio = $_POST["precio"];
				$palabra_clave = $_POST["palabra_clave"];
				$id_categoria =  Encryptar::decrypt_($_POST["categoria"]);
				$descripcion = $_POST["descripcion"];
				$visible = empty($_POST["visible"])?$visible=0:$visible=1;
				$stock = empty( $_POST["stock"])?$stock=0:$stock=1;
				$link_mercadolibre = $_POST["link_mercadolibre"];
				
				 $mensaje = array('texto' =>dashboard_49 ,"titulo"=>dashboard_14,'tipo'=>'error' );
				if(Modelproducto::modificar($id,$nombre,$cantidad,$stock,$precio,$palabra_clave,$id_categoria,$descripcion,$visible,$link_mercadolibre))
				{
					$mensaje = array('texto' =>dashboard_48 ,"titulo"=>dashboard_15,'tipo'=>'success' );
				}
				$data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
				break;
				case 'subir_imagen':
					$id = $_POST["id"];
					$imagen = $_FILES["imagen"];
					$mensaje = array('texto' =>dashboard_56 ,"titulo"=>dashboard_55,'tipo'=>'warning' );
					if (!empty($imagen)) {
					 
						// print_r($imagen);
						$cantidad= count($_FILES["imagen"]["tmp_name"]);
						for ($i=0; $i < $cantidad ; $i++) { 
							if($_FILES["imagen"]['type'][$i]=='image/jpg' || $_FILES["imagen"] ['type'][$i]=='image/jpeg'  || $_FILES["imagen"] ['type'][$i]=='image/png')
							{
								//Encryptar::encrypt_md5(
								$name = $_FILES["imagen"]["name"][$i] ;
							 	$nameE =  Encryptar::encrypt_md5($name); 
							 	if(Modelproducto::validar_imagen_repetida($nameE)){ 

									$ruta = 'assets/imagenes/'.$nameE.'.jpg' ; 
									move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $ruta);
									$mensaje = array('texto' =>dashboard_54 ,"titulo"=>dashboard_14,'tipo'=>'error' );
									if(Modelproducto::guardar_foto($nameE, Encryptar::decrypt_($id)))
									{
										$mensaje = array('texto' =>dashboard_53 ,"titulo"=>dashboard_15,'tipo'=>'success' );
									}
								}else{
									$mensaje = array('texto' =>dashboard_57 ,"titulo"=>dashboard_55,'tipo'=>'warning' );
									
								}

							}
						}
					} 
					 $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
					break;
					case 'eliminar_foto':
						 $id = Encryptar::decrypt_($_POST["id"]);
 						$data = array('retorno' =>'' , 'mensaje'  =>array() ,'continuar' =>false );
						 if(Modelproducto::eliminar_foto($id ))
						 {
 						$data = array('retorno' =>'' , 'mensaje'  =>array() ,'continuar' =>true );
						 }

						break;
					
			default:
				 $data = array('retorno' =>'' , 'mensaje'  =>'' ,'continuar' =>false );
			break;
	}
 	if ($case!='lista_productos') {
 		$retorno["iniciar"]=$data["continuar"] ;$retorno["mensaje"]=$data["mensaje"];$retorno["adjunto"]=$data["retorno"];

		echo json_encode( $retorno);
 	}else{
 		echo json_encode( $lista);
 	}
	
	 
 ?>