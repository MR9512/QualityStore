<table class="table">
  <thead>
    <tr>
      <th scope="col">Rol</th>
      <th scope="col">Usuario</th>
      <th scope="col">Categoria</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio Vendido</th>
      <th scope="col">Ganancia del producto</th>
      <th scope="col">Ganancia</th>
      <th scope="col">Total</th>
      
    </tr>
  </thead>
  <tbody>
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
   </tr>
  </tbody>
</table>