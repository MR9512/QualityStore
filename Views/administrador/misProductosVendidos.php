<table class="table">
  <thead>
    <tr>
      <th scope="col">Rol</th>
      <th scope="col">Usuario</th>
      <th scope="col">Categoria</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Precio vendido</th>
      <th scope="col">Ganancia del producto</th>
      <th scope="col">Comisión</th>
      <th scope="col">Ganancia del vendedor</th>
      <th scope="col">N° de producto</th>
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
    <input type="hidden" name="id_usuario" class="addId_usuario">
    <td>
    <select class="form-select buscarProductos" name="categoria" aria-label="Default select example">
    <option selected>Selecciona una categoria:</option>
    <?php foreach($respuesta['categorias']['id_categoria'] as $i=>$id_categoria){ ?>
    <option value="<?= $id_categoria ?>"><?=$respuesta['categorias']['nombre'][$i]?></option>
    <?php } ?>
     </select>
    </td>
    <td class="productos"></td>
    <input type="hidden" name="id_producto" class="addId_producto">
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
    <select class="form-select comision" name="comision" aria-label="Default select example">
    <option selected>Seleccione:</option>
    <option value=".10">10%</option> 
    <option value=".20">20%</option>  
    <option value=".30">30%</option> 
    <option value=".40">40%</option>  
    <option value=".50">50%</option> 
    <option value=".60">60%</option>  
    <option value=".70">70%</option> 
    <option value=".80">80%</option>  
    <option value=".90">90%</option> 
    <option value=".100">100%</option>  
     </select>
    </td>
    <td>
    <input type="text" name="total" class="total"></input>
    </td>
    <td>
      <input type="text" name="numeroProducto" class="numeroProducto">
    </td>
    <td>
    <button type="submit">
    <i class="bi bi-shield-fill-check save_producto_vendedor" type="submit"></i>
    </td>
   </tr>
    </tr>
   <div class="elementos_agregados">
    </div>
    </form>
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
      <th scope="col">Precio vendido</th>
      <th scope="col">Ganancia del producto</th>
      <th scope="col">Comisión</th>
      <th scope="col">Ganancia del vendedor</th>
      <th scope="col">N° de producto</th>
    </tr>
  </thead>
    <tbody id="table_pagination">
    </body>
</table>