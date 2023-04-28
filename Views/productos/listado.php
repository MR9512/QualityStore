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
  <input class="form-control" name="cargarImg" class="form-control imagen" type="file" id="formFile">
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