<?php 
	include 'model/modelcategoria.php';
	empty($_POST["case"])?$case=NULL:$case=$_POST["case"];
	if ($case==NULL) {
		empty($_GET["case"])?$case=NULL:$case=$_GET["case"];
	}
	$retorno = array();
	switch ($case) {
			case 'lista_categoria':
 
			$lista = Modelcategoria::lista();
	 
			 
			break;
			case 'registrar_categoria':
			 $nombre = $_POST["nombre"];
			 $categoria = Encryptar::decrypt_($_POST["categoria"]);
			 $descripcion = $_POST["descripcion"];
			 $mensaje = array('texto' =>dashboard_75 ,"titulo"=>dashboard_14,'tipo'=>'error' );
			 if (Modelcategoria::registrar($nombre, $descripcion,$categoria)) {
			 	 $mensaje = array('texto' =>dashboard_74 ,"titulo"=>dashboard_15,'tipo'=>'success' );
			 }
			  $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
			break;
			case 'eliminar_categoria':
				 $mensaje = array('texto' =>dashboard_77 ,"titulo"=>dashboard_14,'tipo'=>'error' );
				$id = Encryptar::decrypt_($_POST["id"]);
				if(Modelcategoria::eliminar($id)){ 
					$mensaje = array('texto' =>dashboard_76 ,"titulo"=>dashboard_15,'tipo'=>'success' );
				}
  				$data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
				break;
			case 'editar_categoria':
				 $id = Encryptar::decrypt_($_POST["id"]);
				 $datos= Modelcategoria::editar ($id);
				 $data = array('retorno' =>$datos , 'mensaje'  =>array() ,'continuar' =>true );
				break;
		}

 	if ($case!='lista_categoria') {
 		$retorno["iniciar"]=$data["continuar"] ;$retorno["mensaje"]=$data["mensaje"];$retorno["adjunto"]=$data["retorno"];

		echo json_encode( $retorno);
 	}else{
 		echo json_encode( $lista);
 	}


?>