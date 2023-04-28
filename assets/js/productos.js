$(document).ready(function(){

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
  var formData = new formData();
  var file = $(".imagen")[0].file[0];
  formData.append("file",file);
  var formulario = $("#formulario").serialize();
  var obj = {};
  obj.url = "insertarProducto";
  obj.type = "POST";
  obj.data = new formData();

  peticionAjax(obj);
});

}); 

function peticionAjax(obj){
   $.ajax({
    url: obj.url,
    type: obj.type,
    data: obj.data,
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    sucess: function(res){

    },
    error: function(xhr, status){
    
    }
   });
}