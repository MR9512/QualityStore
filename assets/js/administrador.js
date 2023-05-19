$(document).ready(function(){
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

$(".buscarPrecio").on("change",function(){
   alert("HOLA");
   /*var id_rol = $(this).val();
   var obj = {};
   obj.url = "getUsuarios";
   obj.data = {id_rol:id_rol};
   obj.type = "POST";
   obj.accion = "getUsuarios";
   peticionAjax(obj); */
 });

 $('.precio_vendido').change(function(){
   var ganancia;
   ganancia = parseFloat($('.precio_actual').val())-parseFloat($('.precio_vendido').val());
   $('.ganancia').val(ganancia);
 });
 

});
function getprecio(){
   var id_producto = $('.buscarPrecio').val();
   var obj = {};
   obj.url = "getPrecio";
   obj.type = "POST";
   obj.data = {id_producto:id_producto};
   obj.accion = "getPrecio";
   peticionAjax(obj);
  }

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
           html+= '<select class="form-select" name="editarCategoria" aria-label="Default select example">';
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
            html+= '<select class="form-select buscarPrecio" name="" onchange="getprecio();" aria-label="Default select example">';
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
       }
    },
    error: function(xhr, status){
    
    }
   });
}