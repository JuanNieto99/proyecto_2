var categoria =
{
	inicio:function()
	{
		categoria.lista_categoria();
		categoria.registrar_categoria();
	},lista_categoria:function(){
		 	var table =  $('#table_categoria').DataTable({
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
					    	"url":"includ/ajax_categorias.php?case=lista_categoria"
					   		 
					   	},  
				        "scrollCollapse": true,
				        "info":           true,
				        "paging":         true,
				         "pageLength": 25,
				        order: [[ 1, "desc" ]],
				         "columns":[
			                {"data": "nombre"},
			                {"data": "descripcion"},
			                {"data": "categoria_padre"}, 
			                {"data": "opcion"}
			            ]  
			    });     
			  
				table.on('draw', function(){
					 
					$(".eliminar").on('click', function(){
						 
				      	var id = $(this).attr('data-control');
				       categoria.editar(id)
				   	})
				   	$(".eliminar").on('click', function(){
						 
				      	var id = $(this).attr('data-control');
				       categoria.eliminar(id,table)
				   	})
				})
	},registrar_categoria:function(){
		$('form[name="registrar_categoria"]').submit(function(){
			// alert("as")
			 $.ajax({
			 	url:'includ/ajax_categorias.php',
			 	type :'POST',
			 	data : $('form[name="registrar_categoria"]').serialize(),
			 	success:function(data)
			 	{
			 		 
			 		 data = JSON.parse(JSON.stringify(data)); 

			 		 var table = $("#table_categoria").DataTable()
   					 table.ajax.reload();
			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
			 	 
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })

			 return false;
		})
		
	},eliminar:function(id,table){
		swal({
		  title: "¿Estas seguro de eliminar esta categoria?",
		  text: "No lo podras recuperar",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
			 	url:'includ/ajax_categorias.php',
			 	type :'POST',
			 	data :{'case':'eliminar_categoria','id':id},
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
	},editar:function(id){
				$.ajax({
			 	url:'includ/ajax_categorias.php',
			 	type :'POST',
			 	data :{'case':'editar_categoria','id':id},
			 	success:function(data)
			 	{
			 		 $('#exampleModal').modal('show');
			 		 data = JSON.parse(JSON.stringify(data));  
   					 /*table.ajax.reload();
			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);*/
			 	 
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })
	}
}