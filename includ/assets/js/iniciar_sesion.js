var iniciar_sesion =
{
	inicio:function()
	{
		iniciar_sesion.login();
		
	},login:function()
	{
		$('form[name="iniciar_sesion"]').submit(function(){
			 
			 $.ajax({
			 	url:'includ/ajax_iniciar_sesion.php',
			 	type :'POST',
			 	data : $('form[name="iniciar_sesion"]').serialize(),
			 	success:function(data)
			 	{
			 		 data = JSON.parse(data);
			 		 if (data.mensaje.tipo=='success') {

			 		 	location.href ='crear-productos';
			 		 }
			 		var alerta ='<div class="alert alert-'+data.mensaje.tipo+'" role="alert">'+data.mensaje.texto+'</div>';
			 		//alert(alerta)
			 		$('#alerta').html(alerta);
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })

			 return false;
		})
	}
}