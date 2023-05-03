<input type="hide" value="<?= URLSYS ?>" class="urlSys"/>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" novalidate id="formulario">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control nombre" id="inputCity" required>
    <div class="error_nombre" style="display:none;color:red">
      Favor de ingresar un nombre
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Precio</label>
    <input type="text" name="precio" class="form-control precio" id="inputCity">
    <div class="error_precio" style="display:none;color:red">
      Favor de ingresar un precio
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Descripción Larga</label>
    <input type="text" name="descripcionLarga" class="form-control descL" id="inputCity">
    <div class="error_descL" style="display:none;color:red">
    Favor de ingresar una descripción larga
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Descripción Corta</label>
    <input type="text" name="descripcionCorta" class="form-control descC" id="inputCity">
    <div class="error_descC" style="display:none;color:red">
    Favor de ingresar una descripción corta
    </div>
  </div>
  <div class="col-md-6">
  <label for="formFile" class="form-label">Cargar imagen</label>
  <input class="form-control" name="cargarImg" class="form-control imagen" type="file" id="image">
  <div class="error_imagen" style="display:none;color:red">
   Favor de cargar una imagen
  </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">URL de MercadoLibre</label>
    <input type="text" name="urlML"class="form-control urlML" id="inputCity">
    <div class="error_urlML" style="display:none;color:red">
   Favor de ingresar la URL de MercadoLibre
  </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">URL de Sams</label>
    <input type="text" name="urlSMS"class="form-control urlSMS" id="inputCity">
    <div class="error_urlSMS" style="display:none;color:red">
   Favor de ingresar la URL de Sams
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
      <th scope="col">Precio</th>
      <th scope="col">Categoria</th>
      <th scope="col">Descripcion Corta</th>
      <th scope="col">Imagen</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
   <?php
     foreach($respuesta["id_producto"] as $i=>$id_producto){
    ?>  
    <tr>
       <td><?= $respuesta["nombre"][$i]?></td>
       <td><?= $respuesta["precio"][$i]?></td>
       <td><?= $respuesta["categoria"][$i] ?></td>
       <td><?= $respuesta["desc_corta"][$i]?></td>
       <td >
        <img src="<?= URLSYS.$respuesta["url_imagen"][$i] ?>" width="20%"></td>
       <td>  
       <i class="bi bi-eye ver ver_<?= $id_producto ?>" data-producto="<?= $id_producto ?>"></i>&nbsp;&nbsp; 
       <i class="bi bi-pencil editar editar_<?= $id_producto ?>" data-producto="<?= $id_producto ?>"></i>&nbsp;&nbsp; 
       <i class="bi bi-cloud-check guardar guardar_<?= $id_producto ?>" data-producto="<?= $id_producto ?>" style="display:none"></i>&nbsp;&nbsp;  
       <i class="bi bi-file-excel cancelar cancelar_<?= $id_producto ?>" data-producto="<?= $id_producto ?>" style="display:none"></i>&nbsp;&nbsp;  
       <i class="bi bi-trash eliminar eliminar_<?= $id_producto ?>" data-producto="<?= $id_producto ?>" style="display:none"></i>
       
        
       
       </td>
    </tr> 
     <?php } ?>
  </tbody>
</table>

<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" novalidate id="formulario">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Nombre</label>
    <input type="text" name="editarNombre" class="form-control editarNombre" id="inputCity" required>
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
    <label for="inputCity" class="form-label">Descripción Larga</label>
    <input type="text" name="editarDescL" class="form-control editarDescL" id="inputCity">
    <div class="error_descL" style="display:none;color:red">
    Favor de ingresar una descripción larga
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Descripción Corta</label>
    <input type="text" name="descripcionCoreditarDescCta" class="form-control editarDescC" id="inputCity">
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
    <a class="form-control editarUrlML" target="_blank">Ir a Mercado Libre</a>
    <div class="error_urlML" style="display:none;color:red">
   Favor de ingresar la URL de MercadoLibre
  </div>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">URL de Sams</label>
    <a class="form-control editarUrlSams" target="_blank">Ir a Sams</a>
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
    <input type="text" name="editarStatus" class="form-control editarStatus" id="inputCity">
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
    <input type="text" name="editarCategoria"class="form-control editarCategoria" id="inputCity">
    <div class="error_urlSMS" style="display:none;color:red">
     Favor de ingresar la categoria
     </div>
     </div>
     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>