<table class="table">
  <thead>
    <tr>
      <th scope="col">Vendedor</th>
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
    <select class="form-select" name="vendedor" aria-label="Default select example">
    <option selected>Selecciona un vendedor:</option>
    <?php foreach($respuesta['vendedores']['id_usuario'] as $i=>$id_usuario){ ?>
    <option value="<?= $id_usuario ?>"><?=$respuesta['vendedores']['nombre_usuario'][$i]?></option>
    <?php } ?>
     </select>
    </td>
    <td>
    <select class="form-select buscarProductos" name="categoria" aria-label="Default select example">
    <option selected>Selecciona una categoria:</option>
    <?php foreach($respuesta['categorias']['id_categoria'] as $i=>$id_categoria){ ?>
    <option value="<?= $id_categoria ?>"><?=$respuesta['categorias']['nombre'][$i]?></option>
    <?php } ?>
     </select>
    </td>
    <td class="productos">
    
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
  </tbody>
</table>