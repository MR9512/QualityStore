<input type="hidden" value="<?= URLSYS ?>" class="urlSys"/>
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
      <option>Seleccione:</option>
                <?php foreach($resp['id_rol'] as $i=>$id_rol){ ?>
			<option value="<?= $id_rol ?>"><?= $resp['nombreRol'][$i] ?></option>
            <?php } ?>
		     </select>
  <div class="error_rolUsuario" style="display:none;color:red">
   Favor de ingresar un rol
  </div>
  </div>
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" id="guardar" value="Guardar">
      </div>
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
      <th scope="col">Rol</th>
      <th scope="col">Estatus</th>
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
       <td><?= $respuesta["rol"][$i]?></td>
      <td class="<?= $respuesta['colorStatus'][$i] ?>"><?= $respuesta['nombreStatus'][$i] ?></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Ver usuario</h5>
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
    <label for="inputCity" class="form-label">Fecha de Subida</label>
    <input type="text" name="verFechaUsuario"class="form-control verFecha" id="inputCity" disabled>
    </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form class="row g-3 needs-validation" novalidate id="actualizarFormulario">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Nombre</label>
    <input type="text" name="editarNombreUsuario" class="form-control editarNombreUsuario" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Apellidos</label>
    <input type="text" name="editarApellidosUsuario" class="form-control editarApellidosUsuario" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Correo</label>
    <input type="text" name="editarCorreoUsuario" class="form-control editarCorreoUsuario" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Contraseña</label>
    <input type="text" name="editarContrasenaUsuario" class="form-control editarContrasenaUsuario" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Telefono</label>
    <input type="text" name="editarTelefonoUsuario" class="form-control editarTelefonoUsuario" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Rol</label>
    <div class="editarRol"></div>
     </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Status</label>
    <div class="editarStatusUsuario"></div>
    <input type="hidden" class="editarId_usuario" name="id_usuario">
     </div>
    <div class="col-md-6">
    <label for="inputCity" class="form-label">Fecha de Subida</label>
    <input type="date" name="editarFechaUsuario"class="form-control editarFechaUsuario" id="inputCity">
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary updateUsuario">Actualizar</button>
      </div>
    </div>
     </form>
      </div>
      
    </div>
  </div>
</div>

