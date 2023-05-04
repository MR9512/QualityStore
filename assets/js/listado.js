$(document).ready(function(){
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

 if($(".nombre").val() == null || $(".precio").val() == null || $(".descL").val() == null || $(".descC").val() == null || $(".urlML").val() == null || $(".urlSMS").val() == null){
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

  if($(".editarNombre").val() == "" || $(".editarPrecio").val() == "" || $(".editarDescL").val() == "" || $(".editarDescC").val() == "" || $(".editarUrlML").val() == "" || $(".editarUrlSMS").val() == ""){
    
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
            $(".editarId_producto").val(res.id_producto);
            $(".editarNombre").val(res.nombre);
            $(".editarPrecio").val(res.precio);
            $(".editarDescL").val(res.desc_large);
            $(".editarDescC").val(res.desc_corta);
            $(".editarImagen").attr("src",$(".urlSys").val()+res.url_imagen);
            $(".editarUrlML").val(res.url_mercado);
            $(".editarUrlSams").val(res.url_sams);
            $(".editarUsuario").val(res.nombreAdministrador);
            $(".editarStatus").val(res.status);
            $(".editarFecha").val(res.fecha_subida);
            $(".editarCategoria").val(res.categoria);
            break;
       }
    },
    error: function(xhr, status){
    
    }
   });
}