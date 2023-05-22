<table class="table">
  <thead>
    <tr>
      <th scope="col">Rol</th>
      <th scope="col">Usuario</th>
      <th scope="col">Categoria</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">precio vendido</th>
      <th scope="col">Ganancia</th>
      <th scope="col">Total</th>
      <th scope="col">Acciones</th>
      
    </tr>
  </thead>
  <tbody>
    <form method="post" id="save_producto_vendedor">
   <tr>
   <td>
    <select class="form-select buscarUsuarios" name="rol" aria-label="Default select example">
    <option selected>Selecciona un Rol:</option>
    <?php foreach($respuesta['roles']['id_rol'] as $i=>$id_rol){ ?>
    <option value="<?= $id_rol ?>"><?=$respuesta['roles']['nombreRol'][$i]?></option>
    <?php } ?>
     </select>
    </td>
    <td class="usuarios"></td>
    <td>
    <select class="form-select buscarProductos" name="categoria" aria-label="Default select example">
    <option selected>Selecciona una categoria:</option>
    <?php foreach($respuesta['categorias']['id_categoria'] as $i=>$id_categoria){ ?>
    <option value="<?= $id_categoria ?>"><?=$respuesta['categorias']['nombre'][$i]?></option>
    <?php } ?>
     </select>
    </td>
    <td class="productos"></td>
    <td>
      <input type="text" name="precio" class="precio_actual"></input>
    </td>
    <td>
    <input type="text" name="precio_vendido" class="precio_vendido"></input>
    </td>
    <td>
    <input type="text" name="ganancia" class="ganancia"></input>
    </td>
    <td>
    <input type="text" name="total" class="total"></input>
    </td>
    <td>
    <i class="bi bi-shield-fill-check save_producto_vendedor" type="submit"></i>
    </td>
   </tr>
    </tr>
   <div class="elementos_agregados">
    </div>
  </tbody>
</table>

<br />
<br />
<br />
<table class="table">
  <thead>
    <tr>
      <th scope="col">Rol</th>
      <th scope="col">Usuario</th>
      <th scope="col">Categoria</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">precio vendido</th>
      <th scope="col">Ganancia</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
    <tbody id="table_pagination">
    </body>
</table>