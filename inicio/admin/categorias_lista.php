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
		<div class="col-lg-6">
			<h3><?=dashboard_70?></h3>
			<br>
			<table   class="table table-striped table-bordered" style="width:100%"  id="table_categoria" >
		    <thead>
		        <tr>
		            <th><?=dashboard_66?></th>
		            <th><?=dashboard_67?></th>
		            <th><?=dashboard_68?></th>
		 
		            <th class="all"> <?=dashboard_69?> </th>
		        </tr>
		      	
		    </thead>
		     
		</table>
		</div>
	
		<div class="col-lg-3">
			<h3><?=dashboard_72?></h3>
			<br>
			<form name="registrar_categoria" enctype="multipart/form-data"  >

			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_66?></span>
					  </div>
				  	
				  	  <input type="text" aria-label="nombre" name="nombre" class="form-control" required>
				  </div>  
			</div>
		
			<br>	 
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text" for="categoria"><?=dashboard_68?></span>
					  </div>
				  	
				  	  <select  aria-label="categoria" name="categoria" class="form-control" required>
				  	  	<option value="0" ><?=dashboard_74?></option>
				  	  	<?=cargar_categorias()?>
				  	  </select>
				  </div>
			</div> 
	 		<br>	
			<div class="col-lg-12">
				<div class="input-group">
					
					  <div class="input-group-prepend">
					    <span class="input-group-text"><?=dashboard_67?></span>
					  </div>
				  	
				  	  <textarea name="descripcion" class="form-control"></textarea>
				  </div>  
			</div>
			<input value="registrar_categoria" type="hidden"  name="case">
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<br>
			<div style="text-align: center;	">	
			<button type="submit"  class="btn btn-primary btn-lg " ><?=dashboard_73?></button>
			</div>
  		 </form>
		</div>
		</div>
	
 
	</div>
 
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"><?=dashboard_78?></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form>
		      <div class="modal-body">
		     	<div id="conenedor_c"></div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=dashboard_80?></button>
		        <button type="button" class="btn btn-primary"><?=dashboard_79?></button>
		      </div>
	      </form>
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
	
	<script type="text/javascript" src="includ/assets/js/categoria.js"></script>
	<script type="text/javascript" src="includ/assets/libreria/datatables/datatables.min.js"></script>  
 	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript">

			$(document).ready(function() {
				categoria.inicio();
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