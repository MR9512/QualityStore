$(document).ready(function(){
  $(".verImagen").click(function(){
    id_producto = $(this).data("producto");
    var obj = {};
    obj.url = "getProducto";
    obj.data = {id_producto:id_producto};
    obj.type = "POST";
    obj.accion = "verImagen";
    peticionAjax(obj);
  });
$(".ver").click(function(){
  id_producto = $(this).data("producto");
  var obj = {};
  obj.url = "getProducto";
  obj.data = {id_producto:id_producto};
  obj.type = "POST";
  obj.accion = "getProducto";
  peticionAjax(obj);
  $("#infoModal").modal("show");
});
$(".editar").click(function(){
 id_producto = $(this).data("producto");
 var obj = {};
 obj.url = "getProducto";
 obj.data = {id_producto:id_producto};
 obj.type = "POST";
 obj.accion = "updateProducto";
 peticionAjax(obj);
 $("#updateModal").modal("show");
});
$(".eliminar").click(function(){
  id_producto = $(this).data("producto");
  var obj = {};
  obj.id_producto = id_producto;
  obj.url = "deleteProducto";
  obj.data = {producto:id_producto};
  obj.type = "POST";
  obj.accion = "deleteProducto";
  peticionAjax(obj);
 });
$("#formulario").on("submit",function(){
  event.preventDefault();
  var formulario = $("#formulario").serialize();
  if($(".nombre").val() == ""){
    $(".error_nombre").show();
 }else{
   $(".error_nombre").hide();
 }

 if($(".precio").val() == ""){
   $(".error_precio").show();
 }else{
   $(".error_precio").hide();
 }

 if($(".precioAnterior").val() == ""){
  $(".error_precioAnterior").show();
}else{
  $(".error_precioAnterior").hide();
}

 if($(".descL").val() == ""){
   $(".error_descL").show();
 }else{
   $(".error_descL").hide();
 }

 if($(".descC").val() == ""){
   $(".error_descC").show();
 }else{
   $(".error_descC").hide();
 }

 if($(".urlML").val() == ""){
   $(".error_urlML").show();
 }else{
   $(".error_urlML").hide();
 }

 if($(".urlSMS").val() == ""){
   $(".error_urlSMS").show();
 }else{
   $(".error_urlSMS").hide();
 }

 if($(".nombre").val() == null || $(".precio").val() == null || $(".precioAnterior").val() == null || $(".descL").val() == null || $(".descC").val() == null || $(".urlML").val() == null || $(".urlSMS").val() == null){
   exit();
 }
  var formData = new FormData(this);
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        var datos = $('#formulario').serialize();
  $.ajax({
    url: 'insertarProducto',
    type: 'post',
    data: formData,datos,
    contentType: false,
    cache:false,
    processData: false,
    success: function(response) {
        
    }
});
});
$("#actualizarFormulario").on("submit",function(){
  event.preventDefault();
  var formulario = $("#actualizarFormulario").serialize();
   if($(".editarNombre").val() == ""){
     $(".error_nombre").show();
  }else{
    $(".error_nombre").hide();
  }

  if($(".editarPrecio").val() == ""){
    $(".error_precio").show();
  }else{
    $(".error_precio").hide();
  }

  if($(".editarPrecioAnterior").val() == ""){
    $(".error_precioAnterior").show();
  }else{
    $(".error_precioAnterior").hide();
  }

  if($(".editarDescL").val() == ""){
    $(".error_descL").show();
  }else{
    $(".error_descL").hide();
  }

  if($(".editarDescC").val() == ""){
    $(".error_descC").show();
  }else{
    $(".error_descC").hide();
  }

  if($(".editarUrlML").val() == ""){
    $(".error_urlML").show();
  }else{
    $(".error_urlML").hide();
  }

  if($(".editarUrlSMS").val() == ""){
    $(".error_urlSMS").show();
  }else{
    $(".error_urlSMS").hide();
  }

  if($(".editarNombre").val() == "" || $(".editarPrecio").val() == "" || $(".editarPrecioAnterior").val() == "" || $(".editarDescL").val() == "" || $(".editarDescC").val() == "" || $(".editarUrlML").val() == "" || $(".editarUrlSMS").val() == ""){
    
  }
  var formData = new FormData(this);
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        var datos = $('#formulario').serialize();
  $.ajax({
    url: 'updateProducto',
    type: 'post',
    data: formData,datos,
    contentType: false,
    cache:false,
    processData: false,
    success: function(response) {
        
    }
});
});
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
            $(".verNombre").val(res.nombre);
            $(".verPrecio").val(res.precio);
            $(".verPrecioAnterior").val(res.precio_anterior);
            $(".verAhorro").val(parseFloat(res.precio_anterior)-parseFloat(res.precio));
            $(".verDescL").val(res.desc_large);
            $(".verDescC").val(res.desc_corta);
            $(".verImagen").attr("src",$(".urlSys").val()+res.url_imagen);
            $(".verUrlML").attr("href",res.url_mercado);
            $(".verUrlSams").attr("href",res.url_sams);
            $(".verUsuario").val(res.nombreAdministrador);
            $(".verStatus").val(res.status);
            $(".verFecha").val(res.fecha_subida);
            $(".verCategoria").val(res.categoria);
            break;
           case "updateProducto":
           var statusActivo = '';
            var statusInactivo = '';
            if(res.status == 'Activo'){
              var statusActivo = 'selected';
            }
            if(res.status == 'Inactivo'){
              var statusInactivo = 'selected';
            }
            var selectStatus = "";
            selectStatus+= '<select class="form-select" name="editarStatus" aria-label="Default select example">';
            selectStatus+='<option value="1" '+statusActivo+'>Activo</option>';
            selectStatus+='<option value="0" '+statusInactivo+'>Inactivo</option>';
            selectStatus+= '</select>';
            var selectCategoria = "";
            selectCategoria+= '<select class="form-select" name="editarCategoria" aria-label="Default select example">';
            $.each(res.listaCategorias.id_categoria,function(key,dato){
              var selected = "";
              if(dato == res.id_categoria){
                 selected = 'selected';
              }
              selectCategoria+='<option value="'+dato+'" '+selected+'>'+res.listaCategorias.nombre[key]+'</option>';
            });
            selectCategoria+= '</select>';
            $(".editarId_producto").val(res.id_producto);
            $(".editarNombre").val(res.nombre);
            $(".editarPrecio").val(res.precio);
            $(".editarPrecioAnterior").val(res.precio_anterior);
            $(".editarAhorro").val(parseFloat($(".editarPrecioAnterior").val()) - parseFloat($(".editarPrecio").val()));
            $(".editarDescL").val(res.desc_large);
            $(".editarDescC").val(res.desc_corta);
            $(".editarImagen").attr("src",$(".urlSys").val()+res.url_imagen);
            $(".editarUrlML").val(res.url_mercado);
            $(".editarUrlSams").val(res.url_sams);
            $(".editarUsuario").val(res.nombreAdministrador);
            $(".editarStatus").html(selectStatus);
            $(".editarFecha").val(res.fecha_subida);
            $(".editarCategoria").html(selectCategoria);
            break;
            case "verImagen":
              $(".resumenImg").attr("src",$(".urlSys").val()+res.url_imagen);
              $(".resumenNombre").html(res.nombre);
              $(".resumenDescripcion").html(res.desc_corta);
              $(".resumenPrecioAnterior").html(res.precio_anterior);
              $(".resumenPrecioActual").html(res.precio);
              $(".resumenAhorro").html(parseFloat(res.precio_anterior)-parseFloat(res.precio));
              $("#imagenModal").modal("show");

              break;
              case "deleteProducto":
              $(".producto_"+obj.id_producto).hide();
              $("#mensajeSistema").modal("show");
              $(".contenidoSistema").html(res.respuesta);
              break;
       }
    },
    error: function(xhr, status){
    
    }
   });
}