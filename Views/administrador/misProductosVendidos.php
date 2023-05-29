
  <div class="row">
    <div class="col-2">
    <label for="exampleInputPassword1" class="form-label">Producto</label>
        <select class="select-search" style="width:100%">
            <?php
            $productos = $respuesta['productos'];
            //var_dump($productos['id_producto']);exit;
            foreach ($productos['id_producto'] as $i => $producto){
                ?>
                <option value="<?= $producto ?>"><?= $productos['nombre'][$i] ?></option>
                <?php
            }
            ?>
            </select>
    </div>
    <div class="col-2">
        <label for="exampleInputPassword1" class="form-label">Vendedor</label>
        <select class="select-search" style="width:100%">
            <?php
            $usuarios = $respuesta['usuarios'];
            //var_dump($productos['id_producto']);exit;
            foreach ($usuarios['id_usuario'] as $i => $usuario){
                ?>
                <option value="<?= $usuario ?>"><?= $usuarios['nombre_usuario'][$i] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="col">
        <label for="exampleInputPassword1" class="form-label">Este producto <br>fue pasado</label>
        <div class="form-check">
            <input class="form-check-input check-producto" type="checkbox" value="1">
            <label class="form-check-label" for="flexCheckDefault">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input check-producto" type="checkbox" value="0">
            <label class="form-check-label" for="flexCheckChecked">
                No
            </label>
        </div>
    </div>
    <div class="col producto-pasado" style="display: none">
        <label for="exampleInputPassword1" class="form-label">Quien paso <br>el producto</label>
        <select class="select-search" style="width:100%">
            <?php
            $usuarios = $respuesta['usuarios'];
            //var_dump($productos['id_producto']);exit;
            foreach ($usuarios['id_usuario'] as $i => $usuario){
                ?>
                <option value="<?= $usuario ?>"><?= $usuarios['nombre_usuario'][$i] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
      <div class="col">
          <label for="exampleInputPassword1" class="form-label">% de ganancia <br>al vendedor</label>
          <br>
          <select class="select-search">
              <option value=".10">10 porciento</option>
              <option value=".20">20% porciento</option>
              <option value=".30">30% porciento</option>
              <option value=".40">40% porciento</option>
          </select>
      </div>
      <div class="col producto-pasado" style="display: none">
          <label for="exampleInputPassword1" class="form-label">% a quien paso <br>el producto</label>
          <br>
          <select class="select-search">
              <option value=".10">10% porciento</option>
              <option value=".20">20% porciento</option>
              <option value=".30">30% porciento</option>
              <option value=".40">40% porciento</option>
          </select>
      </div>
  </div>
  <div class="row">
    <div class="col">
        <label for="exampleInputPassword1" class="form-label">precio</label>
        <input type="text">
    </div>
      <div class="col">
          <label for="exampleInputPassword1" class="form-label">precio vendido</label>
          <input type="text">
      </div>
      <div class="col">
          <label for="exampleInputPassword1" class="form-label">ganancia del producto</label>
          <input type="text">
      </div>
      <div class="col">
          <label for="exampleInputPassword1" class="form-label">No. de producto <br>vendido de este vendedor</label>
          <input type="text">
      </div>
  </div>
  <input type="submit" value="GUARDAR">









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
    <select class="form-select buscarUsuarios select-search" name="rol" aria-label="Default select example">
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
    <input type="text" name="gananciaProducto" class="gananciaProducto"></input>
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
    <input type="text" name="gananciaVendedor" class="gananciaVendedor"></input>
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
<table class="table tablePaginator">
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
    <?php foreach($respuesta['datos']['rol'] as $i=>$rol){ ?>
    <tr>
        <td>
            <?= $rol ?>
        </td>
        <td>
            <?= $respuesta['datos']['usuario'][$i]?>
        </td>
        <td>
            <?= $respuesta['datos']['categoria'][$i]?>
        </td>
        <td>
            <?= $respuesta['datos']['producto'][$i]?>
        </td>
        <td>
            <?= $respuesta['datos']['precio'][$i]?>
        </td>
        <td>
            <?= $respuesta['datos']['precio_vendido'][$i]?>
        </td>
        <td>
            <?= $respuesta['datos']['gananciaProducto'][$i]?>
        </td>
        <td>
            <?= $respuesta['datos']['comision'][$i]?>
        </td>
        <td>
            <?= $respuesta['datos']['gananciaVendedor'][$i]?>
        </td>
        <td>
            <?= $respuesta['datos']['numeroProducto'][$i]?>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<br />
<br />
<br />
<br />
    <table>
      <thead>
        <th scope="col"><?= $respuesta['titulos']['titulo_producto'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['titulo_precio'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['admonNombre'].' '.$respuesta['titulos']['admonApellidos'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['gerenteNombre1'].' '.$respuesta['titulos']['gerenteApellidos1'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['gerenteNombre2'].' '.$respuesta['titulos']['gerenteApellidos2'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['vendedorNombre1'].' '.$respuesta['titulos']['vendedorApellidos1'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['vendedorNombre2'].' '.$respuesta['titulos']['vendedorApellidos2'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['vendedorNombre3'].' '.$respuesta['titulos']['vendedorApellidos3'] ?></th>
    </thead>
    <tbody id="tabla_ganancias">

    </tbody>
    </table>

