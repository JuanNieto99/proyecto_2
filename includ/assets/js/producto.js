var productos =
{
	inicio:function(){
		productos.lista_productos();
		productos.registrar_producto();
		productos.modificar_producto();
		//productos.subir_imagen();
		
	},lista_productos:function(){
		 
			 var table =  $('#table_producto').DataTable({
			    //para cambiar el lenguaje a español
			        "language": {
			                "lengthMenu": "Mostrar _MENU_ registros",
			                "zeroRecords": "No se encontraron resultados",
			                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
			                "sSearch": "Buscar:",
			                "oPaginate": {
			                    "sFirst": "Primero",
			                    "sLast":"Último",
			                    "sNext":"Siguiente",
			                    "sPrevious": "Anterior"
						     },
						     "sProcessing":"Procesando...",
			            }, 
					    "ajax": {
					    	"url":"includ/ajax_productos.php?case=lista_productos"
					   		 
					   	},  
				        "scrollCollapse": true,
				        "info":           true,
				        "paging":         true,
				         "pageLength": 25,
				        order: [[ 1, "desc" ]],
				         "columns":[
			                {"data": "nombre"},
			                {"data": "cantidad"},
			                {"data": "precio"},
			                {"data": "foto"},
			                {"data": "categoria"},
			                {"data": "visible"},
			                {"data": "stock"},
			                {"data": "descripcion"},
			                {"data": "opcion"}
			            ]  
			    });     
			  
					table.on('draw', function(){
					 
					$(".eliminar").on('click', function(){
						 
				      	var id = $(this).attr('data-control');
				       productos.eliminar(id,table)
				   	})
				})
		    

			  
	},registrar_producto:function()
	{
		$('form[name="registrar_producto"]').submit(function(){
			 
			 $.ajax({
			 	url:'includ/ajax_productos.php',
			 	type :'POST',
			 	data : $('form[name="registrar_producto"]').serialize(),
			 	success:function(data)
			 	{
			 		 
			 		 data = JSON.parse(JSON.stringify(data)); 

			 		 var table = $("#table_producto").DataTable()
   					 table.ajax.reload();
			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
			 	 
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })

			 return false;
		})
	},eliminar:function(id,table)
	{
		swal({
		  title: "¿Estas seguro de eliminar este producto?",
		  text: "No lo podras recuperar",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
			 	url:'includ/ajax_productos.php',
			 	type :'POST',
			 	data :{'case':'eliminar','id':id},
			 	success:function(data)
			 	{
			 		 
			 		 data = JSON.parse(JSON.stringify(data));  
   					 table.ajax.reload();
			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
			 	 
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })
			}
		 	
		});
	},modificar_producto:function()
	{
		$('form[name="editar_producto"]').submit(function(){
			 //alert('asd')
			 $.ajax({
			 	url:'includ/ajax_productos.php',
			 	type :'POST',
			 	data : $('form[name="editar_producto"]').serialize(),
			 	success:function(data)
			 	{
			 		 
			 		 data = JSON.parse(JSON.stringify(data)); 
			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
			 	 
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })

			 return false;
		})
	},subir_imagen:function()
	{
	//	$('form[name="subir_imagen"]').submit(function(){
			//alert("asd")
			 //alert('asd')
			 var form = document.getElementById("subir_imagen");
			 var parametros = new FormData(form);
			 $.ajax({
			 	url:'includ/ajax_productos.php',
			 	type :'POST',
			 	data : parametros,
			 	contentType:false,
			 	processData:false,
			 	success:function(data)
			 	{ 
			 	//alert(JSON.stringify(data));
			 		 data = JSON.parse(JSON.stringify(data)); 

			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
			 	 
			 	},error:function(data)
			 	{
			 		alert(JSON.stringify(data))
			 		alert('error')	
			 	} 

			 })

			// return false;
	//	})
		
	},eliminar_foto:function(id)
	{
		swal({
		  title: "¿Estas seguro de eliminar esta imagen?",
		  text: "No lo podras recuperar",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
			 $.ajax({
			 	url:'includ/ajax_productos.php',
			 	type :'POST',
			 	data : {'id':id,'case':'eliminar_foto'},
			 	success:function(data)
			 	{ 
			 	//alert(JSON.stringify(data));
			 		 data = JSON.parse(JSON.stringify(data)); 

			 		 if (data.iniciar) {
			 		 	location.reload();
			 		 	
			 		 }
			 	},error:function(data)
			 	{
			 		alert(JSON.stringify(data))
			 		alert('error')	
			 	} 

			 })
			}
		 	
		});

	
	}
}