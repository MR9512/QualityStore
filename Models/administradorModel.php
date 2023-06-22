<?php
class administradorModel{
    public function __construct(){
        require_once("DB/Conect.php");
        $con = new Conect();
        $this->con = $con -> Conexion();
        $fecha = getdate();
        $this->fecha = $fecha['year']."-".$fecha['mon']."-".$fecha['mday'];
    }

    public function getUsuarios($id_rol)
    {
      $query = "SELECT * FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol WHERE roles.id_rol = $id_rol";
      $res = mysqli_query($this->con, $query);
      if(mysqli_num_rows($res) > 0){
        $i = 0;
       while($row = mysqli_fetch_assoc($res)){
       $data["id_usuario"][$i] = $row["id_usuario"];
       $data["nombre_usuario"][$i] = $row["nombre"]." ".$row["apellidos"];
       $i++;
   }
      }else{
        $data["error"] = "No se encontraron registros";
      }
      return $data;
    }

    public function getPrecio($id_producto)
    {
      $query = "SELECT * FROM productos WHERE id_producto = $id_producto";
      $res = mysqli_query($this->con, $query);
      if(mysqli_num_rows($res) > 0){
       while($row = mysqli_fetch_assoc($res)){
       $data["precioProducto"] = $row["precio"];
   }
      }else{
        $data["error"] = "No se encontraron registros";
      }
      return $data;
    }

    public function saveProductoVendedor($datos){
      $query = "INSERT INTO productos_vendidos (id_producto,id_usuario, value_intermediario, id_intermediario, precio, precio_vendido, gananciaProducto, gananciaVendedor, numeroProducto, id_administrador, gananciaAdministrador, id_gerente1, gananciaGerente1, id_gerente2, gananciaGerente2, gananciaIntermediario)
                VALUES ('{$datos['id_producto_vendido']}','{$datos['id_usuario']}', '{$datos['value_intermediario']}', '{$datos['id_intermediario_select']}', '{$datos['precio']}', '{$datos['precio_vendido']}', '{$datos['gananciaProducto']}', '{$datos['gananciaVendedor']}', '{$datos['numeroProducto']}', '{$datos['id_administrador']}', '{$datos['gananciaAdminsitrador']}', '{$datos['id_gerente1']}', '{$datos['gananciaGerente1']}', '{$datos['id_gerente2']}', '{$datos['gananciaGerente2']}', '{$datos['gananciaIntermediario']}')";
        mysqli_query($this->con,$query);
        $data = $this->getProductosVendidos();
      return $data;
    }

    public function getProdVend($id_usuario){
      $query = "SELECT * FROM productos_vendidos WHERE id_usuario = $id_usuario";
      $respuesta = mysqli_query($this->con, $query);
      if(mysqli_num_rows($respuesta) > 0){
        while($row = mysqli_fetch_assoc($respuesta)){
          if($row['numeroProducto'] == 5){
             $data['numeroProducto'] = 1;
          }else{
            $data['numeroProducto'] = $row['numeroProducto'] + 1;
          }
        }
      }else{
          $data['numeroProducto'] = 1;
      }
       return $data;
    }

    public function getProductosVendidos($id_usuario = NULL){
      $query_select = "SELECT pv.*, p.nombre AS nombreProducto, p.precio AS precioComprado, vendedor.nombre AS nombreVendedor, 
                        vendedor.apellidos AS apellidosVendedor 
                        FROM productos_vendidos pv 
                       LEFT JOIN productos p ON p.id_producto = pv.id_producto
                       LEFT JOIN usuarios vendedor ON vendedor.id_usuario = pv.id_usuario";
      if($id_usuario != NULL) {
          if (!empty($id_usuario)) {
              $query_select .= " WHERE pv.id_usuario = $id_usuario AND pagado_vend = 0 ORDER BY pv.id_producto_vendido DESC  limit 5";
          }
      }
      //echo $query_select;exit;
      $respuesta = mysqli_query($this->con,$query_select);    
      $i = 0;
      //echo $query_select;exit;
        if(mysqli_num_rows($respuesta) > 0) {
            while ($row = mysqli_fetch_assoc($respuesta)) {
                $data['producto'][$i] = $row['nombreProducto'];
                $data['precio_comprado'][$i] = $row['precioComprado'];
                $data['precio_vendido'][$i] = $row['precio_vendido'];
                $data['ganancia'][$i] = $row['gananciaProducto'];
                $data['vendedor'][$i] = $row['nombreVendedor'] . ' ' . $row['apellidosVendedor'];
                $data['ganancia_vendedor'][$i] = $row['gananciaVendedor'];
                $data['ganancia_admin'][$i] = $row['gananciaAdministrador'];
                $data['ganancia_geren1'][$i] = $row['gananciaGerente1'];
                $data['ganancia_geren2'][$i] = $row['gananciaGerente2'];
                $data['fecha'][$i] = $row['fecha'];
                $data['resultado'] = 1;
                $data['numeroProducto'][$i] = $row['numeroProducto'];
                if($row['numeroProducto'] == 5) {
                    $data['numProdTotal'] = $row['numeroProducto'];
                }
                $i++;
            }
            //echo $data['numProdTotal'];exit;
            if($data['numProdTotal'] == 5){
                //echo $data['numeroProducto'][0];exit;
                $total = $data['ganancia_vendedor'][0]+$data['ganancia_vendedor'][1]+$data['ganancia_vendedor'][2]+$data['ganancia_vendedor'][3]+$data['ganancia_vendedor'][4];
                $data['ganancia5prod'] = $total*0.50;
            }
        }else{
            $data['resultado'] = 0;
        }

      return $data;
    }

    public function getRolUsuario($id_usuario){
      $query = "SELECT * FROM usuarios where id_usuario = $id_usuario";
      $respuesta = mysqli_query($this->con,$query);
      while($row = mysqli_fetch_assoc($respuesta)){
        $query2 = "SELECT * FROM usuarios ";
        if($row['id_rol'] == 1){
          $query2.="WHERE id_rol = 1 OR id_rol = 2 OR id_rol =3";
        }
        if($row['id_rol'] == 2 || $row['id_rol'] == 3){
          $query2.="WHERE id_rol = 1 OR id_rol = 2 OR id_rol = 3";
        }
        $query2.=" ORDER BY id_rol ASC";
      }
      //echo $query2;
      //exit;
      $res = mysqli_query($this->con,$query2);
      $i = 0;
      while($row2 = mysqli_fetch_assoc($res)){
        $data['id_usuario'][$i] = $row2['id_usuario'];
        $data['id_rol'][$i] = $row2['id_rol'];
        $i++;
      }
      return $data;
    }

    public function getTitulos(){
      $query = "SELECT t.*, admin.nombre AS nombreAdmin, admin.apellidos AS apellidosAdmin,
                geren1.nombre AS nombreGerente1, geren1.apellidos AS apellidosGerente1,
                geren2.nombre AS nombreGerente2, geren2.apellidos AS apellidosGerente2
                FROM cat_titulos t
                INNER JOIN usuarios admin ON admin.id_usuario = t.id_admin
                INNER JOIN usuarios geren1 ON geren1.id_usuario = t.id_gerent1
                INNER JOIN usuarios geren2 ON geren2.id_usuario = t.id_gerent2";
      //echo $query;exit;
      $respuesta = mysqli_query($this->con,$query);
      while($row = mysqli_fetch_assoc($respuesta)){
            $data['titulo_producto'] = $row['producto'];
            $data['titulo_pre_com'] = $row['precio_comprado'];
            $data['titulo_pre_vend'] = $row['precio_vendido'];
            $data['nombre_admin'] = $row['nombreAdmin']." ".$row['apellidosAdmin'];
            $data['ganancia_admin'] = $row['ganancia_admin'];
            $data['nombre_geren1'] = $row['nombreGerente1']." ".$row['apellidosGerente1'];
            $data['ganancia_geren1'] = $row['ganancia_geren1'];
            $data['nombre_geren2'] = $row['nombreGerente2']." ".$row['apellidosGerente2'];
            $data['ganancia_geren2'] = $row['ganancia_geren2'];
            $data['ganancia'] = $row['ganancia_producto'];
            $data['vendedor'] = $row['Vendedor'];
            $data['ganancia_vend'] = $row['ganancia_vendedor'];
            $data['fecha'] = $row['fecha'];
      }
      return $data;
      
    }

    public function getInfoIntermediario($id_usuario){
        $query = "SELECT ur.id_rol AS id_rol_recomendo, urec.id_rol AS id_rol_recomendado 
                    FROM recomendaciones_vendedores recomendacion
                    INNER JOIN usuarios ur ON ur.id_usuario = recomendacion.id_usuarioRecomendo
                    INNER JOIN usuarios urec ON urec.id_usuario = recomendacion.id_usuarioRecomendado
                    WHERE recomendacion.id_usuarioRecomendado = $id_usuario";
        $respuesta = mysqli_query($this->con,$query);
        while($row = mysqli_fetch_assoc($respuesta)){
            $data['rol_recomendo'] = $row['id_rol_recomendo'];
            $data['rol_recomendado'] = $row['id_rol_recomendado'];
        }
        return $data;
    }

    public function getUsuariosGanancias(){
        $query = "SELECT * 
                    FROM usuarios limit 3";
        $respuesta = mysqli_query($this->con,$query);
        $i=0;
        while($row = mysqli_fetch_assoc($respuesta)){
            $data['nombre'][$i] = $row['nombre'].' '.$row['apellidos'];
            $data['rol'][$i] = $row['id_rol'];
            $i++;
        }
        return $data;
    }

    public function getRolUsuarioVendio($id_usuario, $intermediario){
        $query = "CALL getUsuariosGanancias($id_usuario,$intermediario)";
        $res = mysqli_query($this->con,$query);
        $i=0;
        while($row = mysqli_fetch_assoc($res)){
            $data['id_usuario'][$i] = $row['id_usuario'];
            $data['nombre'][$i] = $row['nombre'].' '.$row['apellidos'];
            $data['rol'][$i] = $row['id_rol'];
            $i++;
        }
        return $data;
    }

    public function getUsuarioRecomendo($id_usuario){
        $query="SELECT * FROM recomendacion_vendedores rv WHERE rv.id_usuarioRecomendado = $id_usuario";
        $res = mysqli_query($this->con,$query);
        while($row = mysqli_fetch_assoc($res)){
            $data['id_usuario'] = $row['id_usuarioRecomendo'];
        }
        return $data;
    }

    public function getRol($id_usuario){
        $query="SELECT * FROM usuarios u
                LEFT JOIN recomendacion_vendedores rv ON rv.id_usuarioRecomendado = u.id_usuario 
                WHERE id_usuario = $id_usuario";
        $res = mysqli_query($this->con,$query);
        while($row = mysqli_fetch_assoc($res)){
            $data['id_rol'] = $row['id_rol'];
            $data['id_recomendado'] = $row['id_usuarioRecomendado'];
            $data['id_recomendo'] = $row['id_usuarioRecomendo'];
         }
        return $data;
    }

    public function getInfoQuienVendio($id_usuario){
        $query="SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
        $res = mysqli_query($this->con,$query);
        while($row = mysqli_fetch_assoc($res)){
            if($row['id_rol'] == 4){
                $query2="SELECT u.id_rol AS rol_recomendo, u.id_usuario AS id_usuarioRecomendo, u.id_rol as id_rol 
                        FROM recomendacion_vendedores rv
                        INNER JOIN usuarios u ON rv.id_usuarioRecomendo = u.id_usuario
                        WHERE id_usuarioRecomendado = $id_usuario";
                $res2 = mysqli_query($this->con,$query2);
                while($row2 = mysqli_fetch_assoc($res2)){
                    $data['id_usuarioRecomendo'] = $row2['id_usuarioRecomendo'];
                    $data['id_rolRecomendo'] = $row2['id_rol'];
                    $data['id_usuarioVendio'] = $row['id_usuario'];
                    $data['id_rolVendio'] = $row['id_rol'];
                    $data['id_rolRecomendado'] = $row['id_rol'];
                    $data['nombre_usuario'] = $row['nombre'].' '.$row['apellidos'];

                }
            }else{
                $data['id_usuarioVendio'] = $row['id_usuario'];
                $data['id_rolVendio'] = $row['id_rol'];
            }
        }
        return $data;
    }

    public function getAdminGeren(){
        $query = "SELECT * FROM usuarios WHERE id_rol = 1 OR id_rol = 2";
        $res = mysqli_query($this->con,$query);
        $i = 0;
        while($row = mysqli_fetch_assoc($res)){
            $data['id_usuarioAdminGeren'][$i] = $row['id_usuario'];
            $data['id_rolUsuarioAdminGeren'][$i] = $row['id_rol'];
            $data['nombre_usuarioAdminGeren'][$i] = $row['nombre'].' '.$row['apellidos'];
        $i++;
        }
        return $data;
    }

    public function updatePagarVendedor($id_usuario){
        $query="UPDATE productos_vendidos SET pagado_vend = 1 WHERE id_usuario = $id_usuario";
        mysqli_query($this->con,$query);
        $data = $this->getProductosVendidos($id_usuario);
        return $data;
    }

    public function getIntermediario2($id_usuario){
        $query = "SELECT u.*,rv.*, recom.id_rol AS id_rolRecomendo FROM usuarios u 
                LEFT JOIN recomendacion_vendedores rv ON rv.id_usuarioRecomendado = u.id_usuario
                LEFT JOIN usuarios recom ON recom.id_usuario = rv.id_usuarioRecomendo
                WHERE u.id_usuario = $id_usuario";
        $res = mysqli_query($this->con,$query);
        while($row = mysqli_fetch_assoc($res)){
            $data['id_usuarioRecomendado'] = $row['id_usuario'];
            $data['id_usuarioRecomendo'] = (empty($row['id_usuarioRecomendo'])) ? "0":$row['id_usuarioRecomendo'];
            $data['id_rolRecomendado'] = $row['id_rol'];
            $data['id_rolRecomendo'] = (empty($row['id_rolRecomendo'])) ? "0":$row['id_rolRecomendo'];
        }
        return $data;
    }

    public function getInfoIntermediario2($id_usuario){
        $query="SELECT u.*,rv.*, recomendo.id_rol AS id_rolRecomendo FROM usuarios u 
        LEFT JOIN recomendacion_vendedores rv ON rv.id_usuarioRecomendado = u.id_usuario
        LEFT JOIN usuarios recomendo ON recomendo.id_usuario = rv.id_usuarioRecomendo
        WHERE u.id_usuario = $id_usuario";
        //echo $query;exit;
        $res = mysqli_query($this->con,$query);
        while($row = mysqli_fetch_assoc($res)){
            $data['id_usuarioRecomendado'] = $row['id_usuario'];
            $data['id_usuarioRecomendo'] = (empty($row['id_usuarioRecomendo'])) ? "0":$row['id_usuarioRecomendo'];
            $data['id_rolRecomendado'] = $row['id_rol'];
            $data['id_rolRecomendo'] = (empty($row['id_rolRecomendo'])) ? "0":$row['id_rolRecomendo'];
            $data['id_usuario_vendedor'] = $row['id_usuario'];
            $data['id_rol_vendedor'] = $row['id_rol'];
            $data['nombre'] = $row['nombre'].' '.$row['apellidos'];
            $data['id_usuario'] = $row['id_usuario'];
        }
        return $data;
    }

    public function getInfoUsuario($id_usuario){
        $query="SELECT * FROM usuarios u 
        WHERE u.id_usuario = $id_usuario";
        //echo $query;exit;
        $res = mysqli_query($this->con,$query);
        while($row = mysqli_fetch_assoc($res)){
            $data['id_rol'] = $row['id_rol'];
            $data['id_usuario'] = $row['id_usuario'];
            $data['nombre'] = $row['nombre'].' '.$row['apellidos'];
        }
        return $data;
    }
}
?>