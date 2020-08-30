<?php 
	include 'model/modellogin.php';
	empty($_POST["case"])?$case=NULL:$case=$_POST["case"];
	$retorno = array();
	switch ($case) {
		case 'login':
			 	//print($_POST["usuario"]);
				$usuario = $_POST["usuario"];
				$clave  = $_POST["clave"];
				$mensaje = array('texto' =>dashboard_13 ,"titulo"=>dashboard_14,'tipo'=>'danger' );
				$dato = Modellogin::Login($usuario ,$clave);
				if($dato["entro"])
				{
					 
					$_SESSION['nombre'] = $dato["nombre"];
					$_SESSION['apellido'] = $dato["apellido"];
					$_SESSION['usuario'] = $dato["usuario"];
					$_SESSION['id'] = $dato["id"];
					$mensaje = array('texto' =>dashboard_16 ,"titulo"=>dashboard_15,'tipo'=>'success' );
				}
				
			 	$data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
			break;
		
			default:
				$data = array('retorno' =>'' , 'mensaje'  =>'' ,'continuar' =>false );
			break;
	}
	$retorno["iniciar"]=$data["continuar"] ;$retorno["mensaje"]=$data["mensaje"];$retorno["adjunto"]=$data["retorno"];
	echo json_encode( $retorno);
 ?>