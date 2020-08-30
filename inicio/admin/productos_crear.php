<?php include '../../includ/principales/includes.php'  ?>
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
		<div class="col-lg-3">
	<?php include '../menu/menu_final.php'  ?>

		</div>
	 	<div class="col-lg">
	 		
			<div class="row">
			<div class="col-lg-6"> <h3><?=dashboard_28?></h3> </div> <div class="col-lg-6"  > <button type="button" class="btn btn-info" style="margin-left: 0%" data-toggle="modal" data-target="#exampleModal"><?=dashboard_17?></button></div>
			</div>
			<table  class="table table-striped table-bordered" style="width:100%"  id="table_producto" >
			    <thead>
			        <tr>
			            <th><?=dashboard_18?></th>
			            <th><?=dashboard_19?></th>
			            <th><?=dashboard_20?></th>
			            <th><?=dashboard_29?></th>
			            <th><?=dashboard_23?></th>
			            <th data-class-name="priority"> <?=dashboard_24?> </th>
			            <th data-class-name="priority"> <?=dashboard_25?> </th>
			            <th data-class-name="priority"> <?=dashboard_21?> </th>
			            <th class="all"> <?=dashboard_27?> </th>
			        </tr> 
			    </thead>
			</table>
		</div>  
	 
		</div>
	
 
	</div>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=dashboard_17?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form name="registrar_producto" enctype="multipart/form-data"  >

			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_18?></span>
					  </div>
				  	
				  	  <input type="text" aria-label="nombre" name="nombre" class="form-control" required>
				  </div>  
			</div>
			<br>	
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_19?></span>
					  </div>
				  	
				  	  <input type="number" aria-label="cantidad" name="cantidad" class="form-control"  >
				  </div>  
			</div>
			<br>	
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_20?></span>
					  </div>
				  	
				  	  <input type="number" aria-label="precio" name="precio" class="form-control" required>
				  </div>  
			</div>
			<br>
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_22?></span>
					  </div>
				  	
				  	  <input type="text" aria-label="palabra_clave" name="palabra_clave" class="form-control"  >

				  	  
				  </div>
			</div>
			<br>
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text" for="categoria"><?=dashboard_23?></span>
					  </div>
				  	
				  	  <select  aria-label="categoria" name="categoria" class="form-control" required>
				  	  	<?=cargar_categorias()?>
				  	  </select>
				  </div>
			</div>
			<br>
		 
			<div class="col-lg-12">
				<label>  <?=dashboard_21?></label>
				<div class="input-group"> 
				  	  <textarea name="descripcion" class="form-control"></textarea> 
				</div>  
			</div>
			
			
			<br>
			<div class="row">
			<div class="col-lg-3" ></div>
			<div class="col-lg-3">
				<label>  <?=dashboard_24?></label>
				<div class="input-group"> 
				   
					<input type="checkbox" checked="checked" name="visible" class="flipswitch"   /> 
				</div>  
			</div>
			<div class="col-lg-3">
				<label>  <?=dashboard_25?></label>
				<div class="input-group"> 
				   
					<input type="checkbox" checked="checked" name="stock" class="flipswitch"   /> 
				</div>  
			</div>
			</div>
			<input value="registrar_producto" type="hidden"  name="case">
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<br>
			<div style="text-align: center;	">	
			<button type="submit"  class="btn btn-primary btn-lg " ><?=dashboard_26?></button>
			</div>
  		 </form>
      </div>
      <div class="modal-footer">
   
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