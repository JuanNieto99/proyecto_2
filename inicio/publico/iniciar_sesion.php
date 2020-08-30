<?php include '../../includ/principales/includes.php' 
// Developer : Juan Nieto 
// Descripcion : Desarrollo de la pagina para poder loguiarse
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?=dashboard_1?></title>
	<link rel="stylesheet" type="text/css" href="includ/assets/css/inicio.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body  class="gris_d">
    <!--div class="container-fluid">
	    <div class="barra_inicial" ></div>
	    <div  >
			<div class="jumbotron jumbotron-fluid"  >
		 		<div class="container" style="width: 30%" > 
		 			<h2><?=dashboard_11?></h2>
		 			<br>
		   		 	<form name="iniciar_sesion" method="POST">
		   		 		<div class="row">
		   		 			<div class="col-lg-12">
				   		 	  <div class="form-group">
							    <label for="usuario"> <?=dashboard_8?></label>
							    <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="usuario" required>
				 
							  </div>
							</div>
						 	<input type="hidden" name="case" value="login">
							<div class="col-lg-12">
							  <div class="form-group">
							    <label for="clave"> <?=dashboard_9?></label>
							    <input type="password" class="form-control" id="clave" name="clave" required>
							     <br>
							    <div id="alerta" ></div>
							    <br>
							    <button type="submit" class="btn btn-primary "  ><?=dashboard_12?></button>
							  </div> 
					   	  	</div> 
		   		 		</div>
					  
					</form>
					
		   		</div>
		   </div>
	   </div>
  	</div-->
 	
  		<div class="negro_d" >
  			 <img src="includ/assets/raya_negra.svg" style="position: absolute;">
  			 <img src="includ/assets/flechasA.svg"  style="position: absolute;">
  			 <!--div style="position: relative;margin-top: 22%">
  			 	<h3 style="background-color: #fff;"><?=dashboard_81?> </h3>
  			 </div-->
  			 
  		</div>
 		
 


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script type="text/javascript" src="includ/assets/js/iniciar_sesion.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			 iniciar_sesion.inicio() 
		})
	</script>
</body>
</html>