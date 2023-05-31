$(document).ready(function(){
    $('.deshabilitar').prop('readonly', true);
    $('.select-search').select2();
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

    $('.check-producto').click(function() {
        if ($(this).is(':checked') && $(this).val() == 1) {
            $('.check-producto').removeAttr('name');
            $('.check-producto').prop('checked', false);
            $(this).prop('checked', true);
            $('.producto-pasado').show();
            $(this).attr('name','value_intermediario');
        } else {
            $('.check-producto').removeAttr('name');
            $('.check-producto').prop('checked', false);
            $(this).prop('checked', true);
            $('.producto-pasado').hide();
            $(this).attr('name','value_intermediario');
        }
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
   var gananciaProducto;
     gananciaProducto = parseFloat($('.precio_vendido').val()) - parseFloat($('.precio_actual').val());
     $('.gananciaProducto').val(gananciaProducto);
   id_usuario = $('.buscarId_usuario').val();
   ganancia = gananciaProducto;
   intermediario = $('input[name="value_intermediario"]').val();
   if(intermediario == 1){
       id_intermediario = $('.id_intermediario').val()
   }else{
       id_intermediario = 0;
   }

   var obj = {};
   obj.intermediario = id_intermediario;
   obj.vendedor = id_usuario;
     obj.url = "getGananciasUsuarios";
     obj.type = "POST";
     obj.data = {id_usuario:id_usuario,ganancia:ganancia,intermediario:intermediario,id_intermediario:id_intermediario};
     obj.accion = "getGananciasUsuarios";
     peticionAjax(obj);

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
   var gananciaProducto = $(".gananciaProducto").val();
   var total = parseFloat(comision) * parseFloat(gananciaProducto);
   $(".gananciaVendedor").val("$"+total);
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
                  html+='<td>';
                  html+=res.precio_vendido[key];
                  html+='</td>';
                  html+='<td>';
                  html+=res.gananciaProducto[key];
                  html+='</td>';
                  html+='<td>';
                  html+=res.comision[key];
                  html+='</td>';
                  html+='<td>';
                  html+=res.gananciaVendedor[key];
                  html+='</td>';
                  html+='<td>';
                  html+=res.numeroProducto[key];
                  html+='</td>';
                  html+='</tr>';
                });
                $("#table_pagination").html(html);
                //$("#save_producto_vendedor")[0].reset();
            break;
            case 'getProdVend':
               $(".numeroProducto").val(res.numeroProducto);
            break;
           case 'getGananciasUsuarios':
               console.log(res.nombre_usuario);
                $('.nombreAdministrador').html(res.nombre_usuario[0]);
                $('.id_administrador').val(res.id_usuario[0]);
                $('.gananciaAdministrador').val(res.ganancia[0]);
               $('.gerente1').html(res.nombre_usuario[1]);
               $('.id_gerente1').val(res.id_usuario[1]);
               $('.gananciaGerente1').val(res.ganancia[1]);
               $('.gerente2').html(res.nombre_usuario[2]);
               $('.id_gerente2').val(res.id_usuario[2]);
               $('.gananciaGerente2').val(res.ganancia[2]);
               if(obj.vendedor == res.id_usuario[0]){
                   $('.gananciaVendedor').val(res.ganancia[0]);
               }
               if(obj.vendedor == res.id_usuario[1]){
                   $('.gananciaVendedor').val(res.ganancia[1]);
               }
               if(obj.vendedor == res.id_usuario[2]){
                   $('.gananciaVendedor').val(res.ganancia[2]);
               }
               if(obj.intermediario > 0){
                   $('.nombreIntermediario').html(res.nombre_usuario[3]);
                   $('.gananciaIntermediario').val(res.ganancia[3]);
                   $('.showhide-intermediario').show();
               }
               $('.showhide-ganancias').show();
           break;
       }
    },
    error: function(xhr, status){
    
    }
   });
}