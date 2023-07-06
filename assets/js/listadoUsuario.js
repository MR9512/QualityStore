$(document).ready(function(){
  $(".ver").click(function(){
    id_usuario = $(this).data("usuario");
    var obj = {};
    obj.url = "getUsuario";
    obj.data = {id_usuario:id_usuario};
    obj.type = "POST";
    obj.accion = "getUsuario";
    peticionAjax(obj);
    $("#infoModal").modal("show");
  });
  $(".editar").click(function(){
   id_usuario = $(this).data("usuario");
   var obj = {};
   obj.url = "getUsuario";
   obj.data = {id_usuario:id_usuario};
   obj.type = "POST";
   obj.accion = "updateUsuario";
   peticionAjax(obj);
   $("#updateModal").modal("show");
  });
  $(".eliminar").click(function(){
    id_usuario = $(this).data("usuario");
    var obj = {};
    obj.id_usuario = id_usuario;
    obj.url = "deleteUsuario";
    obj.data = {id_usuario:id_usuario};
    obj.type = "POST";
    obj.accion = "deleteUsuario";
    peticionAjax(obj);
   });
  $("#formulario").on("submit",function(){
    event.preventDefault();
    var formulario = $("#formulario").serialize();
    if($(".nombreUsuario").val() == ""){
      $(".error_nombreUsuario").show();
   }else{
     $(".error_nombreUsuario").hide();
   }
  
   if($(".apellidosUsuario").val() == ""){
     $(".error_apellidosUsuario").show();
   }else{
     $(".error_apellidosUsuario").hide();
   }
  
   if($(".correoUsuario").val() == ""){
    $(".error_correoUsuario").show();
  }else{
    $(".error_correoUsuario").hide();
  }
  
   if($(".passwordUsuario").val() == ""){
     $(".error_passwordUsuario").show();
   }else{
     $(".error_passwordUsuario").hide();
   }
  
   if($(".telefonoUsuario").val() == ""){
     $(".error_telefonoUsuario").show();
   }else{
     $(".error_telefonoUsuario").hide();
   }
  
   if($(".id_rol").val() == ""){
     $(".error_rolUsuario").show();
   }else{
     $(".error_rolUsuario").hide();
   }
  
   if($(".nombreUsuario").val() == null || $(".apellidosUsuario").val() == null || $(".correoUsuario").val() == null || $(".passwordUsuario").val() == null || $(".telefonoUsuario").val() == null || $(".id_rol").val() == null){
    return false;
   }
    var formData = new FormData(this);
          var files = $('#image')[0].files[0];
          formData.append('file',files);
          var datos = $('#formulario').serialize();
    $.ajax({
      url: 'insertarUsuario',
      type: 'post',
      data: formData,datos,
      contentType: false,
      cache:false,
      processData: false,
      dataType: "json",
      success: function(response) {
        $('#exampleModal').modal('hide');
        $('.contenidoSistema').html(response.mensaje); 
        $('#mensajeSistema').modal('show'); 
      }
  });
  });
  $("#actualizarFormulario").on("submit",function(){
    event.preventDefault();
    var formulario = $("#actualizarFormulario").serialize();
      var obj = {};
      obj.url = "updateUsuario";
      obj.data = formulario;
      obj.type = "POST";
      obj.accion = "";
      peticionAjax(obj);  
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
            case "getUsuario":
              $(".verNombreUsuario").val(res.nombre);
              $(".verApellidosUsuario").val(res.apellidos);
              $(".verCorreoUsuario").val(res.correo);
              $(".verContrasenaUsuario").val(res.password);
              $(".verTelefonoUsuario").val(res.telefono);
              $(".verRolUsuario").val(res.rol);
              $(".verFechaUsuario").val(res.fecha_altaUsuario);
              break;
             case "updateUsuario":
             var statusActivo = '';
              var statusInactivo = '';
              if(res.status == 'Activo'){
                var statusActivo = 'selected';
              }
              if(res.status == 'Inactivo'){
                var statusInactivo = 'selected';
              }
              var selectStatus = "";
              selectStatus+= '<select class="form-select" name="editarStatusUsuario" aria-label="Default select example">';
              selectStatus+='<option value="1" '+statusActivo+'>Activo</option>';
              selectStatus+='<option value="0" '+statusInactivo+'>Inactivo</option>';
              selectStatus+= '</select>';
              var selectRol = "";
              selectRol+= '<select class="form-select" name="editarRolUsuario" aria-label="Default select example">';
              var crearRol = res.listaUsuarios;
              $.each(crearRol.id_rol,function(key,dato){
                var selected = "";
              selectRol+='<option value="'+dato+'" '+selected+'>'+res.listaUsuarios.nombreRol[key]+'</option>';
              });
              selectRol+= '</select>';
              $(".editarId_usuario").val(res.id_usuario);
              $(".editarNombreUsuario").val(res.nombre);
              $(".editarApellidosUsuario").val(res.apellidos);
              $(".editarCorreoUsuario").val(res.correo);
              $(".editarContrasenaUsuario").val(res.password);
              $(".editarTelefonoUsuario").val(res.telefono);
              $(".editarRol").html(selectRol);
              $(".editarStatusUsuario").html(selectStatus);
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

             case "deleteUsuario":
                 $(".usuario_"+obj.id_usuario).hide();
                 $("#mensajeSistema").modal("show");
                 $(".contenidoSistema").html(res.respuesta);
                 break;
         }
      },
      error: function(xhr, status){
      
      }
     });
  }