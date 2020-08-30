<?php include '../../includ/principales/includes.php' 
// Developer : Juan Nieto 
// Descripcion : Desarrollo de la pagina inicial donde se mostraran las promociones y productos 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title><?=dashboard_1?></title>
	<link rel="stylesheet" type="text/css" href="includ/assets/css/inicio.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="barra_inicial" ></div>
	
   		<div class="jumbotron jumbotron-fluid">
   			<div class="row">
   				<div class="col-lg-10">
   					
   				</div>
   				<div class="col-lg-2" style="padding-right: 5%">
   					<a href="login"><button type="button" class="btn btn-outline-info float-right "  ><?=dashboard_7?></button>	</a>
   				</div>
   			 
   			</div>
   			<br>
		  <div class="container">

		  	<div class="shadow-lg p-3 mb-5 bg-white rounded bajar_barra">
			  <div class="row">
			  	
				<div class="col-lg-11 "> 
			     	<input class="form-control mr-sm-3" type="search" placeholder=" <?=dashboard_4?>" aria-label="Search">
				</div>
				<div  class="col-lg-1 ">
					<button class="btn btn-outline-info  " type="submit"> <?=dashboard_3?></button>
				</div>
			  </div>	 
   			</div>
	 
		  </div>
		</div>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="includ/assets/imagenes/imagen2.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="includ/assets/imagenes/imagen2.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="includ/assets/imagenes/imagen2.jpg" class="d-block w-100" alt="...">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only"> <?=dashboard_5?></span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only"> <?=dashboard_6?></span>
		  </a>
		</div>
	</div>
	
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>