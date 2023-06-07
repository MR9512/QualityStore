<form method="post" id="save_producto_vendedor">
  <div class="row">
    <div class="col-3">
    <label for="exampleInputPassword1"  class="addId_producto">Producto</label>
        <select class="select-search buscarPrecio" name="id_producto_vendido" onchange="getprecio();" style="width:100%">
        <option>Seleccione:</option>
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
    <div class="col-3">
        <label for="exampleInputPassword1" class="form-label">Vendedor</label>
        <select class="select-search buscarId_usuario" name="id_usuario" onchange="getId_usuario();" style="width:100%">
        <option>Seleccione:</option>
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
    <div class="col-2">
        <label for="exampleInputPassword1" class="form-label">Intermediario</label>
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
        <label for="exampleInputPassword1" class="form-label">Nombre Intermediario</label>
        <select class="select-search id_intermediario" name="id_intermediario_select" style="width:100%">
            <option ></option>
            <?php
            $usuarios = $respuesta['usuarios'];
            foreach ($usuarios['id_usuario'] as $i => $usuario){
                ?>
                <option value="<?= $usuario ?>"><?= $usuarios['nombre_usuario'][$i] ?></option>
                <?php
            }
            ?>
        </select>
    </div>

  </div>
  <div class="row">
    <div class="col">
        <br>
        <label for="exampleInputPassword1" class="form-label">precio</label>
        <br>
        <input type="text" name="precio" class="precio_actual deshabilitar">
    </div>
      <div class="col">
          <br>
          <label for="exampleInputPassword1" class="form-label">precio vendido</label>

          <input type="text" name="precio_vendido" class="precio_vendido">
      </div>
      <div class="col">
          <br>
          <label for="exampleInputPassword1" class="form-label">ganancia del producto</label>

          <input type="text" name="gananciaProducto" class="gananciaProducto deshabilitar">
      </div>
      <div class="col">
          <br>
          <label for="exampleInputPassword1" class="form-label">ganancia del vendedor</label>
          <input type="text" name="gananciaVendedor" class="gananciaVendedor deshabilitar">
      </div>
      <div class="col">
          <label for="exampleInputPassword1" class="form-label">No. de producto <br>vendido de este vendedor</label>
          <br>
          <input type="text" name="numeroProducto" class="numeroProducto deshabilitar">
      </div>
  </div>
    <div class="row showhide-ganancias" style="display: none">
        <div class="col">
            <label for="exampleInputPassword1" class="form-label">Ganancias Roles</label>
        </div>
    </div>
    <div class="row showhide-ganancias" style="display: none">
        <div class="col">
            <label for="exampleInputPassword1" class="form-label nombreAdministrador"></label>
            <input type="hidden" name="id_administrador" class="id_administrador" /><br>
            <input type="text" name="gananciaAdminsitrador" class="gananciaAdministrador deshabilitar">
        </div>
        <div class="col">
            <label for="exampleInputPassword1" class="form-label gerente1"></label>
            <input type="hidden" name="id_gerente1" class="id_gerente1" /><br>
            <input type="text" name="gananciaGerente1" class="gananciaGerente1">
        </div>
        <div class="col">
            <label for="exampleInputPassword1" class="form-label gerente2"></label>
            <input type="hidden" name="id_gerente2" class="id_gerente2" /><br>
            <input type="text" name="gananciaGerente2" class="gananciaGerente2" />
        </div>
        <div class="col showhide-intermediario" style="display: none">
            <label for="exampleInputPassword1" class="form-label nombreIntermediario"></label><br>
            <input type="hidden" name="id_intermediario" class="" >
            <input type="text" name="gananciaIntermediario" class="gananciaIntermediario deshabilitar">
        </div>
        <div class="col showhide-intermediario" style="display: none">
        </div>
    </div>
    <br />
    <br />
  <input type="submit" value="GUARDAR">
</form>
<br />
<br />
<br />
<!--
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
-->
    <table class="table tablePaginator">
      <thead style="font-size: 15px; text-align: center">
        <th scope="col"><?= $respuesta['titulos']['titulo_producto'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['titulo_pre_com'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['titulo_pre_vend'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['ganancia'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['vendedor'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['ganancia_vend'] ?></th>
        <th scope="col"><?= $respuesta['titulos']['nombre_admin'] ?></th>
        <!--<th scope="col"><?= $respuesta['titulos']['ganancia_admin'] ?></th>-->
        <th scope="col"><?= $respuesta['titulos']['nombre_geren1'] ?></th>
        <!--<th scope="col"><?= $respuesta['titulos']['ganancia_geren1'] ?></th>-->
        <th scope="col"><?= $respuesta['titulos']['nombre_geren2'] ?></th>
        <!--<th scope="col"><?= $respuesta['titulos']['ganancia_geren2'] ?></th>-->
        <th scope="col"><?= $respuesta['titulos']['fecha'] ?></th>

      </thead>
    <tbody id="table_pagination" >
        <?php
        $proVend = $respuesta['datos'];
        foreach ($proVend['producto'] as $i => $productoVendido){ ?>
            <tr>
                <td><?= $productoVendido ?></td>
                <td style="text-align: center"><?= $proVend['precio_comprado'][$i] ?></td>
                <td style="text-align: center"><?= $proVend['precio_vendido'][$i] ?></td>
                <td style="text-align: center"><?= $proVend['ganancia'][$i] ?></td>
                <td ><?= $proVend['vendedor'][$i] ?></td>
                <td style="text-align: center"><?= $proVend['ganancia_vendedor'][$i] ?></td>
                <td style="text-align: center"><?= $proVend['ganancia_admin'][$i] ?></td>
                <td style="text-align: center"><?= $proVend['ganancia_geren1'][$i] ?></td>
                <td style="text-align: center"><?= $proVend['ganancia_geren2'][$i] ?></td>
                <td style="text-align: center"><?= $proVend['fecha'][$i] ?></td>
            </tr>
    <?php } ?>
    </tbody>
    </table>

<br><br><br>
<div class="col producto-pasado">
    <label for="exampleInputPassword1" class="form-label">Nombre del Vendedor</label>
    <select class="select-search id_usuario_ventas" name="id_usuario_ventas" style="width:100%">
        <option ></option>
        <?php
        $usuarios = $respuesta['usuarios'];
        foreach ($usuarios['id_usuario'] as $i => $usuario){
            ?>
            <option value="<?= $usuario ?>"><?= $usuarios['nombre_usuario'][$i] ?></option>
            <?php
        }
        ?>
    </select>
</div>
<br><br><br>
<table class="table tablePaginator">
    <thead style="font-size: 15px; text-align: center">
    <th scope="col"><?= $respuesta['titulos']['titulo_producto'] ?></th>
    <th scope="col"><?= $respuesta['titulos']['titulo_pre_com'] ?></th>
    <th scope="col"><?= $respuesta['titulos']['titulo_pre_vend'] ?></th>
    <th scope="col"><?= $respuesta['titulos']['ganancia'] ?></th>
    <th scope="col"><?= $respuesta['titulos']['vendedor'] ?></th>
    <th scope="col"><?= $respuesta['titulos']['ganancia_vend'] ?></th>
    <th scope="col"><?= $respuesta['titulos']['nombre_admin'] ?></th>
    <!--<th scope="col"><?= $respuesta['titulos']['ganancia_admin'] ?></th>-->
    <th scope="col"><?= $respuesta['titulos']['nombre_geren1'] ?></th>
    <!--<th scope="col"><?= $respuesta['titulos']['ganancia_geren1'] ?></th>-->
    <th scope="col"><?= $respuesta['titulos']['nombre_geren2'] ?></th>
    <!--<th scope="col"><?= $respuesta['titulos']['ganancia_geren2'] ?></th>-->
    <th scope="col"><?= $respuesta['titulos']['fecha'] ?></th>

    </thead>
    <tbody id="table_pagination_vendedor" >
    </tbody>
</table>
