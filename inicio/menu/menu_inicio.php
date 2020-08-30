 
 <div style="height: 100px;">

	<header  class="header-color" >
		<span id="button-menu" class="fa fa-bars"></span>

		<nav class="navegacion" >
			<ul class="menu"  >
				<!-- TITULAR -->

				<li class="title-menu"><?=$_SESSION['nombre'] ." ".$_SESSION['apellido'] ?></li>
				<!-- TITULAR -->

				<li><a href="#"><span class="fa fa-home icon-menu"></span><?=dashboard_41?></a></li>

				<li class="item-submenu" menu="1">
					<a href="#"><span class="fa fa-archive icon-menu"></span><?=dashboard_42?></a>
					<ul class="submenu">
						<li class="title-menu"><span class="fa fa-archive icon-menu"></span><?=dashboard_41?></li>
						<li class="go-back"><?=dashboard_44?></li>

						<li><a href="#"><?=dashboard_43?></a></li>
						<li><a href="#"><?=dashboard_65?></a></li> 
					</ul>
				 </li>

				<!--li class="item-submenu" menu="2">
					<a href="#"><span class="fa fa-shopping-bag icon-menu"></span>Tienda</a>
					<ul class="submenu">
						<li class="title-menu"><span class="fa fa-shopping-bag icon-menu"></span>Tienda</li>
						<li class="go-back">Atras</li>

						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smarphones</a></li>
						<li><a href="#">Consolas de viejuegos</a></li>
					</ul>
				</li>

				<li><a href="#"><span class="fa fa-envelope icon-menu"></span>Contacto</a></li>
				<li><a href="#"><span class="fa fa-tag icon-menu"></span>Blog</a></li-->
			</ul>
		</nav>
	</header>
 </div>