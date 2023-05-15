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

 function peticionAjax(obj){
    $.ajax({
     url: obj.url,
     type: obj.type,
     data: obj.data,
     dataType: "json",
     success: function(res){
        switch(obj.accion){
           case "getProducto":
             var html = "";
             html+= '<select class="form-select" name="editarCategoria" aria-label="Default select example">';
             html+='<option>Seleccione:</option>';
             if(res.valor == 1){
             $.each(res.id_producto,function(key,dato){
            

               html+='<option value="'+dato+'">'+res.nombre[key]+'</option>';
             });
            
            }
            html+= '</select>';
            $(".productos").html(html);
             break;
            case "":
          
             break;
             case "":
           
               break;
        }
     },
     error: function(xhr, status){
     
     }
    });
 }
});