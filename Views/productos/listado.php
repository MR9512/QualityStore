<input type="hidden" value="<?= URLSYSIMG ?>" class="urlSys"/>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar nuevo producto
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
      <form class="row g-3 needs-validation formulario" novalidate id="formulario">
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
    <label for="inputCity" class="form-label">Precio Anterior</label>
    <input type="text" name="precio_anterior" class="form-control precioAnterior" id="inputCity">
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
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Categoria</label>
          <select name="id_categoria" class="form-control id_categoria" placeholder="Categoria:">
            <option>Seleccione:</option>
            <?php
            $categoria = $this->categorias;
            foreach($categoria['id_categoria'] as $i=> $id_cat){ ?>
              <option value="<?= $id_cat ?>"><?= $categoria['nombre'][$i] ?></option>
            <?php } ?>
          </select>
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
  <tbody class="tableProductos">
   <?php
     foreach($respuesta["id_producto"] as $i=>$id_producto){
    ?>  
    <tr class="producto_<?= $id_producto ?>">
       <td><?= $respuesta["nombre"][$i]?></td>
       <td><?= $respuesta["precio"][$i]?></td>
       <td><?= $respuesta["categoria"][$i] ?></td>
       <td><?= $respuesta["desc_corta"][$i]?></td>
       <td >
        <img src="<?= URLSYSIMG.$respuesta["url_imagen"][$i] ?>" width="20%" class="verImagen" data-producto="<?= $id_producto ?>"></td>
       <td width="8%">  
       <i class="bi bi-eye ver ver_<?= $id_producto ?>" data-producto="<?= $id_producto ?>"></i>&nbsp;&nbsp; 
       <i class="bi bi-pencil editar editar_<?= $id_producto ?>" data-producto="<?= $id_producto ?>"></i>&nbsp;&nbsp; 
       <i class="bi bi-trash eliminar eliminar_<?= $id_producto ?>" data-producto="<?= $id_producto ?>"></i>
       
       </td>
    </tr> 
     <?php } ?>

  </tbody>
</table>

<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ver producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" novalidate id="formulario">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Nombre</label>
    <input type="text" name="verNombre" class="form-control verNombre" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Precio</label>
    <input type="text" name="verPrecio" class="form-control verPrecio" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Precio Anterior</label>
    <input type="text" name="verPrecioAnterior" class="form-control verPrecioAnterior" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Ahorro</label>
    <input type="text" name="verAhorro" class="form-control verAhorro" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Descripción Larga</label>
    <input type="text" name="verDescL" class="form-control verDescL" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Descripción Corta</label>
    <input type="text" name="verDescC" class="form-control verDescC" id="inputCity" disabled>
  </div>
  <div class="col-md-6">
  <label for="formFile" class="form-label">Ver imagen</label>
  <img width="20%" class="form-control verImagenModal">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">URL de MercadoLibre</label>
    <a class="form-control verUrlML" target="_blank">Ir a Mercado Libre</a>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">URL de Sams</label>
    <a class="form-control verUrlSams" target="_blank">Ir a Sams</a>
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Status</label>
    <input type="text" name="verStatus" class="form-control verStatus" id="inputCity" disabled>
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Fecha de Subida</label>
    <input type="text" name="verFecha"class="form-control verFecha" id="inputCity" disabled>
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Categoria</label>
    <input type="text" name="verCategoria"class="form-control verCategoria" id="inputCity" disabled>
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-3 needs-validation" novalidate id="actualizarFormulario">
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Nombre</label>
    <input type="text" name="editarNombre" class="form-control editarNombre" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Precio</label>
    <input type="text" name="editarPrecio" class="form-control editarPrecio" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Precio Anterior</label>
    <input type="text" name="editarPrecioAnterior" class="form-control editarPrecioAnterior" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Ahorro</label>
    <input type="text" name="editarAhorro" class="form-control editarAhorro" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Descripción Larga</label>
    <input type="text" name="editarDescL" class="form-control editarDescL" id="inputCity">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Descripción Corta</label>
    <input type="text" name="editarDescC" class="form-control editarDescC" id="inputCity">
  </div>
  <div class="col-md-6">
  <label for="formFile" class="form-label">Cargar imagen</label>
  <img width="20%" class="form-control editarImagen" name="editarImagen" type="file" id="image">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">URL de MercadoLibre</label>
    <input name="editarUrlML" class="form-control editarUrlML">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">URL de Sams</label>
    <input name="editarUrlSams" class="form-control editarUrlSams">
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Status</label>
    <div class="editarStatus"></div>
    <input type="hidden" class="editarId_producto" name="id_producto">
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Fecha de Subida</label>
    <input type="text" name="editarFecha"class="form-control editarFecha" id="inputCity">
     </div>
     <div class="col-md-6">
    <label for="inputCity" class="form-label">Categoria</label>
    <div class="editarCategoria"></div>
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
        <h5 class="modal-title" id="exampleModalLabel">QualityStore</h5>
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