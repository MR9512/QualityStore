<input type="hide" value="<?= URLSYS ?>" class="urlSys"/>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar nuevo usuario
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" novalidate id="formulario">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Nombre</label>
    <input type="text" name="nombreUsuario" class="form-control nombreUsuario" id="inputCity" required>
    <div class="error_nombreUsuario" style="display:none;color:red">
      Favor de ingresar un nombre
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Apellidos</label>
    <input type="text" name="apellidosUsuario" class="form-control apellidosUsuario" id="inputCity">
    <div class="error_apellidosUsuario" style="display:none;color:red">
      Favor de ingresar los apellidos
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Correo</label>
    <input type="text" name="correoUsuario" class="form-control correoUsuario" id="inputCity">
    <div class="error_correoUsuario" style="display:none;color:red">
      Favor de ingresar un correo
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Contraseña</label>
    <input type="text" name="passwordUsuario" class="form-control passwordUsuario" id="inputCity">
    <div class="error_passwordUsuario" style="display:none;color:red">
    Favor de ingresar una contraseña
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Telefono</label>
    <input type="text" name="telefonoUsuario" class="form-control telefonoUsuario" id="inputCity">
    <div class="error_telefonoUsuario" style="display:none;color:red">
    Favor de ingresar un número telefonico
    </div>
  </div>
  <div class="col-md-6">
  <label for="formFile" class="form-label">Rol</label>
  <select name="id_rol" name="id_rol" class="form-control id_rol" placeholder="Rol:">
                <?php foreach($resp['id_rol'] as $i=>$id_rol){ ?>
			<option value="<?= $id_rol ?>"><?= $resp['nombreRol'][$i] ?></option>
            <?php } ?>
		     </select>
  <div class="error_rolUsuario" style="display:none;color:red">
   Favor de ingresar un rol
  </div>
  </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" id="guardar" value="Guardar">
      </div>
    </div>
    </form>
  </div>
</div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Telefono</th>
      <th scope="col">Rol</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
   <?php
     foreach($respuesta["id_usuario"] as $i=>$id_usuario){
    ?>  
    <tr class="usuario_<?= $id_usuario ?>">
       <td><?= $respuesta["nombre"][$i]?></td>
       <td><?= $respuesta["apellidos"][$i]?></td>
       <td><?= $respuesta["correo"][$i] ?></td>
       <td><?= $respuesta["password"][$i]?></td>
       <td><?= $respuesta["telefono"][$i]?></td>
       <td><?= $respuesta["rol"][$i]?></td>
       <td width="8%">  
       <i class="bi bi-eye ver ver_<?= $id_usuario ?>" data-usuario="<?= $id_usuario ?>"></i>&nbsp;&nbsp; 
       <i class="bi bi-pencil editar editar_<?= $id_usuario ?>" data-usuario="<?= $id_usuario ?>"></i>&nbsp;&nbsp; 
       <i class="bi bi-trash eliminar eliminar_<?= $id_usuario ?>" data-usuario="<?= $id_usuario ?>"></i>
       </td>
    </tr> 
     <?php } ?>
  </tbody>
</table>

<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" novalidate id="formulario">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Nombre</label>
    <input type="text" name="verNombreUsuario" class="form-control verNombreUsuario" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Apellidos</label>
    <input type="text" name="verApellidosUsuario" class="form-control verApellidosUsuario" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Correo</label>
    <input type="text" name="verCorreoUsuario" class="form-control verCorreoUsuario" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Contraseña</label>
    <input type="text" name="verContrasenaUsuario" class="form-control verContrasenaUsuario" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Telefono</label>
    <input type="text" name="verTelefonoUsuario" class="form-control verTelefonoUsuario" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Rol</label>
    <input type="text" name="verRolUsuario" class="form-control verRolUsuario" id="inputCity" disabled>
  </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Status</label>
    <input type="text" name="editarStatus" class="form-control verStatus" id="inputCity" disabled>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Fecha de Subida</label>
    <input type="text" name="editarFecha"class="form-control verFecha" id="inputCity" disabled>


     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" novalidate id="actualizarFormulario">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Nombre</label>
    <input type="text" name="editarNombre" class="form-control editarNombre" id="inputCity">
    <div class="error_nombre" style="display:none;color:red">
      Favor de ingresar un nombre
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Precio</label>
    <input type="text" name="editarPrecio" class="form-control editarPrecio" id="inputCity">
    <div class="error_precio" style="display:none;color:red">
      Favor de ingresar un precio
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Precio Anterior</label>
    <input type="text" name="editarPrecioAnterior" class="form-control editarPrecioAnterior" id="inputCity">
    <div class="error_precioAnterior" style="display:none;color:red">
      Favor de ingresar el precio anterior
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Ahorro</label>
    <input type="text" name="editarAhorro" class="form-control editarAhorro" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Descripción Larga</label>
    <input type="text" name="editarDescL" class="form-control editarDescL" id="inputCity">
    <div class="error_descL" style="display:none;color:red">
    Favor de ingresar una descripción larga
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Descripción Corta</label>
    <input type="text" name="editarDescC" class="form-control editarDescC" id="inputCity">
    <div class="error_descC" style="display:none;color:red">
    Favor de ingresar una descripción corta
    </div>
  </div>
  <div class="col-md-6">
  <label for="formFile" class="form-label">Cargar imagen</label>
  <img width="20%" class="form-control editarImagen">
  <div class="error_imagen" style="display:none;color:red">
   Favor de cargar una imagen
  </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">URL de MercadoLibre</label>
    <input name="editarUrlML" class="form-control editarUrlML">
    <div class="error_urlML" style="display:none;color:red">
   Favor de ingresar la URL de MercadoLibre
  </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">URL de Sams</label>
    <input name="editarUrlSams" class="form-control editarUrlSams">
    <div class="error_urlSMS" style="display:none;color:red">
   Favor de ingresar la URL de Sams
     </div>
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Nombre del Vendedor</label>
    <input type="text" name="editarUsuario"class="form-control editarUsuario" id="inputCity">
    <div class="error_urlSMS" style="display:none;color:red">
     Favor de ingresar el nombre del Vendedor
     </div>
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Status</label>
    <!--<input type="text" name="editarStatus" class="form-control editarStatus" id="inputCity">-->
    <div class="editarStatus"></div>
    <input type="hidden" class="editarId_producto" name="id_producto">
    <div class="error_urlSMS" style="display:none;color:red">
     Favor de ingresar el status
     </div>
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Fecha de Subida</label>
    <input type="text" name="editarFecha"class="form-control editarFecha" id="inputCity">
    <div class="error_urlSMS" style="display:none;color:red">
    Favor de ingresar la Fecha de Subida
     </div>
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Categoria</label>
    <div class="editarCategoria"></div>
    <div class="error_urlSMS" style="display:none;color:red">
     Favor de ingresar la categoria
     </div>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary updateProducto">Actualizar</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container text-center">
      <div class="row align-items-start">
     <div class="col-12">
     <img class="resumenImg" width="100%">
    </div>
    <div class="col" style="text-align:left;">
    <b class="resumenNombre"></b><br>
      <Marco class="resumenDescripcion"></Marco><br>
      <b>Precio Anterior: </b>$<Marco class="resumenPrecioAnterior"></Marco><br>
      <b>Precio Actual: </b>$<Marco class="resumenPrecioActual"></Marco><br>
      <b>Ahorro: </b>$<Marco class="resumenAhorro"></Marco><br>
    </div>
  </div>
</div>
    
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
      </div>
    </div>
  </div>
</div>