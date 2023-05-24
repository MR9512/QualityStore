$(document).ready(function(){
   
      $('.tablePaginator').DataTable({
        "language": {
          "decimal": "",
          "emptyTable": "No hay datos disponibles en la tabla",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
          "infoEmpty": "Mostrando 0 a 0 de 0 registros",
          "infoFiltered": "(filtrados de _MAX_ registros en total)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ registros",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "No se encontraron registros coincidentes",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          },
          "aria": {
            "sortAscending": ": Activar para ordenar la columna en orden ascendente",
            "sortDescending": ": Activar para ordenar la columna en orden descendente"
          }
        }
      });
    
 $(".buscarProductos").change(function(){
   var id_categoria = $(this).val();
   var obj = {};
   obj.url = "getProducto";
   obj.data = {id_categoria:id_categoria};
   obj.type = "POST";
   obj.accion = "getProducto";
   peticionAjax(obj);
 });

 $(".buscarUsuarios").change(function(){
  var id_rol = $(this).val();
  var obj = {};
  obj.url = "getUsuarios";
  obj.data = {id_rol:id_rol};
  obj.type = "POST";
  obj.accion = "getUsuarios";
  peticionAjax(obj);
});

$("#save_producto_vendedor").on("submit",function(){
   event.preventDefault();
   var datos = $(this).serialize();
   var obj = {};
   obj.url = "saveProductoVendedor";
   obj.type = "POST";
   obj.data = datos;
   obj.accion = "saveProductoVendedor";
   peticionAjax(obj);
   
});

 $('.precio_vendido').change(function(){
  alert("HOLA");
   var gananciaProducto;
   gananciaProducto = parseFloat($('.precio_vendido').val()) - parseFloat($('.precio_actual').val());
   $('.gananciaProducto').val(gananciaProducto);
 });
 

});
function getprecio(){
   var id_producto = $('.buscarPrecio').val();
   $(".addId_producto").val(id_producto);
   var obj = {};
   obj.url = "getPrecio";
   obj.type = "POST";
   obj.data = {id_producto:id_producto};
   obj.accion = "getPrecio";
   peticionAjax(obj);
  }

  function getId_usuario(){
   var id_usuario = $('.buscarId_usuario').val();
   $(".addId_usuario").val(id_usuario);
   var obj = {};
   obj.url = "getProdVend";
   obj.type = "POST";
   obj.data = {id_usuario:id_usuario};
   obj.accion = "getProdVend";
   peticionAjax(obj);
  }

  $(".comision").change(function(){
   var comision = $(this).val();
   var gananciaTotal = $(".ganancia").val();
   var total = parseFloat(comision) * parseFloat(gananciaTotal);
   $(".total").val("$"+total);
 });

  function peticionAjax(obj){
   $.ajax({
    url: obj.url,
    type: obj.type,
    data: obj.data,
    dataType: "json",
    success: function(res){
       switch(obj.accion){
          case "getUsuarios":
           var html = "";
           html+= '<select class="form-select buscarId_usuario" name="id_usuario" onchange="getId_usuario();" aria-label="Default select example">';
           html+='<option>Seleccione:</option>';
           //if(res.valor == 1){
           $.each(res.id_usuario,function(key,dato){
           html+='<option value="'+dato+'">'+res.nombre_usuario[key]+'</option>';
           });
          //}
          html+= '</select>';
          $(".usuarios").html(html);
           break;
          case "getProducto":
            var html = "";
            html+= '<select class="form-select buscarPrecio" name="id_producto" onchange="getprecio();" aria-label="Default select example">';
            html+='<option>Seleccione:</option>';
            if(res.valor == 1){
            $.each(res.id_producto,function(key,dato){
            html+='<option value="'+dato+'">'+res.nombre[key]+'</option>';
            });
           }
           html+= '</select>';
           $(".productos").html(html);
            break;
            case 'getPrecio':
               $('.precio_actual').val(res.precioProducto);
               break;
            case 'saveProductoVendedor':
               var html = '';
               $.each(res.rol,function(key,rol){
                  html+='<tr>';
                  html+='<td>';
                  html+=rol;
                  html+='</td>';
                  html+='<td>';
                  html+=res.usuario[key];
                  html+='</td>';
                  html+='<td>';
                  html+=res.categoria[key];
                  html+='</td>';
                  html+='<td>';
                  html+=res.producto[key];
                  html+='</td>';
                  html+='<td>';
                  html+=res.precio[key];
                  html+='</td>';
                  html+='</tr>';
                });
                $("#table_pagination").html(html);
            break;
            case 'getProdVend':
               $(".numeroProducto").val(res.numeroProducto);
            break;
       }
    },
    error: function(xhr, status){
    
    }
   });
}