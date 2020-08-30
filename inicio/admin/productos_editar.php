<?php 
	 include '../../includ/principales/includes.php' ; 
	$id =  Encryptar::decrypt_($_GET["id"]);
	$datos = editar_producto($id); 
	$imagenes_realicionadas =imagenes_realicionadas($id);
	$configuraciones = buscar_configuraciones(0);
	$ruta = ' includ/assets/imagenes/';
   ?>
<!DOCTYPE html>
<html>
<head>
	<title><?=dashboard_1?></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="includ/assets/css/inicio.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  	    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="includ/assets/libreria/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="includ/assets/libreria/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="includ/assets/css/font-awesome.css">  
	<link rel="stylesheet" href="includ/assets/css/estilos.css">
	<script src="includ/assets/js/jquery-3.2.1.js"></script>
	<script src="includ/assets/js/main.js"></script>
</head>
<body>
	<?php include '../menu/menu_inicio.php'  ?>
	<div class="container-fluid"> 
		<div class="row" >
		<div class="col-lg-2">
	<?php include '../menu/menu_final.php'  ?>
		</div>	
 
		<div class="col-lg-1">	</div>
		<div class="col-lg-3">
			<h3><?=dashboard_46	?></h3>
			<br>
			<form name="editar_producto" enctype="multipart/form-data"  >

			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_18?></span>
					  </div>
				  	
				  	  <input type="text" aria-label="nombre" name="nombre" class="form-control" value="<?=$datos['nombre']?>" required>
				  </div>  
			</div>
			<br>	
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_19?></span>
					  </div>
				  	
				  	  <input type="number" aria-label="cantidad" name="cantidad" class="form-control" value="<?=$datos['cantidad']?>" >
				  </div>  
			</div>
			<br>	
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_20?></span>
					  </div>
				  	
				  	  <input type="number" aria-label="precio" name="precio" class="form-control"  value="<?=$datos['precio']?>" required>
				  </div>  
			</div>
			<br>
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_22?></span>
					  </div>
				  	
				  	  <input type="text" aria-label="palabra_clave" name="palabra_clave" value="<?=$datos['palabra_clave']?>"	 class="form-control"  >

				  	  
				  </div>
			</div>
			<br>
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_47?></span>
					  </div>
				  	
				  	  <input type="text" aria-label="link_mercadolibre" name="link_mercadolibre" value="<?=$datos['link_mercado_libre']?>" class="form-control"  >

				  	  
				  </div>
			</div>
			<br>
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text" for="categoria"><?=dashboard_23?></span>
					  </div>
				  	
				  	  <select  aria-label="categoria" name="categoria" class="form-control" required>
				  	  	<?=cargar_categorias($datos['id_categoria'])?>
				  	  </select>
				  </div>
			</div>
			<br>
		 
			<div class="col-lg-12">
				<label>  <?=dashboard_21?></label>
				<div class="input-group"> 
				  	  <textarea name="descripcion" class="form-control"><?= $datos['descripcion']?></textarea> 
				</div>  
			</div>
			
			
			<br>
			<div class="row">
			<div class="col-lg-3" ></div>
			<div class="col-lg-3">
				<label>  <?=dashboard_24?></label>
				<div class="input-group"> 
				   
					<input type="checkbox"   name="visible" class="flipswitch" <?= $datos['visible']=='0'?'':'checked' ?>  /> 
				</div>  
			</div>
			<div class="col-lg-3">
				<label>  <?=dashboard_25?></label>
				<div class="input-group"> 
				   
					<input type="checkbox"  name="stock" class="flipswitch" <?=  $datos['stock']=='0'?'':'checked' ?>  /> 
				</div>  
			</div>
			</div>
			<input   value="modificar_producto" type="hidden"  name="case">
			<input   value="<?=   $datos['id']   ?>" type="hidden"  name="id">
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<br>
			<div style="	text-align: center;	">	
			<button type="submit"  class="btn btn-primary btn-lg " ><?=dashboard_26?></button>
			</div>
  		 </form>
		</div>
		<div class="col-lg-6">
			<h3><?=dashboard_50?></h3>
			 
			<div class="input-group mb-3">
			 	<form name="subir_imagen" id="subir_imagen" method="POST" enctype="multipart/form-data" >
			 	 <input   value="subir_imagen" type="hidden"  name="case">
				<input   value="<?=$datos['id']?>" type="hidden"  name="id">
				  <div class="custom-file">
				    <input type="file" class="custom-file-input" id="imagen" name="imagen[]" aria-describedby="imagen" multiple>
				    <label class="custom-file-label" for="imagen"><?=dashboard_51?></label>
				  </div>
				  <br><br>
				   <div class="input-group-prepend">
					 <button class="input-group-text" type="button" onclick="productos.subir_imagen()" ><i class="fa fa-upload" aria-hidden="true"></i><?=  dashboard_52 ?></button>  
				  </div>

			  </form>


  
			</div>
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2" id="mostrar_imagenes"> <?=dashboard_58?></button>
			<br><br>
			<div class="row"> 

			  <div class="col">
			    <div class="collapse multi-collapse" id="multiCollapseExample2">
			      <div class="card card-body">
			   	 	<h3><?=  empty($imagenes_realicionadas)?dashboard_59:dashboard_60 
			   	 
			   	 	 ?></h3>

			   	 <?php 
			   	 	if ($configuraciones=='0') { 
					   	 if (!empty($imagenes_realicionadas)) {
					   	 	 for ($i=0; $i <count($imagenes_realicionadas) ; $i++) { 
					   	 	 	$imagen = $ruta.$imagenes_realicionadas[$i]['nombre'] .'.jpg';
					   	 	 	 ?>
					   	 	 	 <br>
					   	 	 	 <img src="<?= $imagen  ?>" class="img-fluid" alt="Responsive image">

					   	 	 	 <?php
					   	 	 }
					   	 }
					   }else{
					   	?>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
					   	<?php
					  	 	$active='active';
					   		 for ($i=0; $i <count($imagenes_realicionadas) ; $i++) { 
					   	 	 	$imagen = $ruta.$imagenes_realicionadas[$i]['nombre'] .'.jpg';
					   	 	 	if($i>0)
					   	 	 	{
									$active='';
					   	 	 	}

					   	 	 	?>
	
							    <div class="carousel-item <?=$active?>">
							      <img src="<?=$imagen?>" class="d-block w-100" alt="...">
							       <div class="carousel-caption d-none d-md-block">
							       <button class="btn btn-danger" onclick="productos.eliminar_foto('<?=$imagenes_realicionadas[$i]['id']?>')" type="button" ><i class="fa fa-trash-o" aria-hidden="true" ></i></button>
						      </div>
							    </div>
						  
			
					   	 	 	<?php 
					   			}
					   			?> 

  			</div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only"><?=dashboard_61?></span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only"><?=dashboard_62?></span>
			  </a>
			</div>
					   		<?php
					   }
			   	  ?>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	 
		</div>
	
 
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script type="text/javascript" src="includ/assets/js/iniciar_sesion.js"></script>
	<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script-->
	
	<script type="text/javascript" src="includ/assets/js/producto.js"></script>
	<script type="text/javascript" src="includ/assets/libreria/datatables/datatables.min.js"></script>  
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript">

			$(document).ready(function() {
				productos.inicio();
				$('#mostrar_imagenes').click();
			})
			
		 

			$(function() {
			  var f = function() {
			    $(this).next().text($(this).is(':checked') ? ':checked' : ':not(:checked)');
			  };
			 // $('input').change(f).trigger('change');
			});

		</script>
</body>
</html>