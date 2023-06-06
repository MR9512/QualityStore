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
      //var_dump($datos['id_usuario_ganancia'][0]);exit;
      $query = "INSERT INTO productos_vendidos(id_producto,id_usuario,precio,precio_vendido,gananciaProducto,comision,gananciaVendedor,numeroProducto,fecha,id_administrador,admin_ganancia,id_gerente1,gerente1_ganancia,id_gerente2,ganancia2_gerente,id_vendedor1,ven_ganancia1,id_vendedor2,ven_ganancia2,id_vendedor3,ven_ganancia3) VALUES(".$datos['id_producto'].",".$datos['id_usuario'].",'".$datos['precio']."','".$datos['precio_vendido']."','".$datos['gananciaProducto']."','".$datos['comision']."','".$datos['gananciaVendedor']."','".$datos['numeroProducto']."','".$this->fecha."',".$datos['id_usuario_ganancia'][0].",'".$datos['ganancia_total'][0]."',".$datos['id_usuario_ganancia'][1].",'".$datos['ganancia_total'][1]."',".$datos['id_usuario_ganancia'][2].",'".$datos['ganancia_total'][2]."',".$datos['id_usuario_ganancia'][3].",'".$datos['ganancia_total'][3]."',".$datos['id_usuario_ganancia'][4].",'".$datos['ganancia_total'][4]."'
      ,".$datos['id_usuario_ganancia'][5].",'".$datos['ganancia_total'][5]."')";
      //echo $query;exit;
      mysqli_query($this->con,$query);
      $query_select = "SELECT *, p.nombre as productoNombre, c.nombreCategoria as nombrecategoria FROM productos_vendidos pv INNER JOIN productos p ON p.id_producto = pv.id_producto 
      INNER JOIN categoria c ON c.id_categoria = p.id_categoria INNER JOIN usuarios u ON u.id_usuario = pv.id_usuario INNER JOIN roles r ON r.id_rol = u.id_rol
      ORDER BY pv.id_producto_vendido DESC";
      $respuesta = mysqli_query($this->con,$query_select);    
      $i = 0;
      while($row = mysqli_fetch_assoc($respuesta)){
        $data['rol'][$i] = $row['rol'];
        $data['usuario'][$i] = $row['nombre'].' '.$row['apellidos'];
        $data['categoria'][$i] = $row['nombrecategoria'];
        $data['producto'][$i] = $row['productoNombre'];
        $data['precio'][$i] = $row['precio'];
        $data['precio_vendido'][$i] = $row['precio_vendido'];
        $data['gananciaProducto'][$i] = $row['gananciaProducto'];
        $data['comision'][$i] = $row['comision'];
        $data['gananciaVendedor'][$i] = $row['gananciaVendedor'];
        $data['numeroProducto'][$i] = $row['numeroProducto'];
        $i++;
      }
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

    public function getProductosVendidos(){
      $query_select = "SELECT *, p.nombre as productoNombre, c.nombreCategoria as nombrecategoria FROM productos_vendidos pv INNER JOIN productos p ON p.id_producto = pv.id_producto 
      INNER JOIN categoria c ON c.id_categoria = p.id_categoria INNER JOIN usuarios u ON u.id_usuario = pv.id_usuario INNER JOIN roles r ON r.id_rol = u.id_rol
      ORDER BY pv.id_producto_vendido DESC";
      $respuesta = mysqli_query($this->con,$query_select);    
      $i = 0;
      while($row = mysqli_fetch_assoc($respuesta)){
        $data['rol'][$i] = $row['rol'];
        $data['usuario'][$i] = $row['nombre'].' '.$row['apellidos'];
        $data['categoria'][$i] = $row['nombrecategoria'];
        $data['producto'][$i] = $row['productoNombre'];
        $data['precio'][$i] = $row['precio'];
        $data['precio_vendido'][$i] = $row['precio_vendido'];
        $data['gananciaProducto'][$i] = $row['gananciaProducto'];
        $data['comision'][$i] = $row['comision'];
        $data['gananciaVendedor'][$i] = $row['gananciaVendedor'];
        $data['numeroProducto'][$i] = $row['numeroProducto'];
        $i++;
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
      $query = "SELECT ganancias.*,  
      admon.nombre AS admonNombre, 
      admon.apellidos AS admonApellidos,
      gerente1.nombre AS gerenteNombre1,
      gerente1.apellidos AS gerenteApellidos1, 
      gerente2.nombre AS gerenteNombre2,
      gerente2.apellidos AS gerenteApellidos2, 
      vendedor1.nombre AS vendedorNombre1, 
      vendedor1.apellidos AS vendedorApellidos1,
      vendedor2.nombre AS vendedorNombre2,
      vendedor2.apellidos AS vendedorApellidos2,
      vendedor3.nombre AS vendedorNombre3,
      vendedor3.apellidos AS vendedorApellidos3
      FROM tabla_titulos_ganancias_usuario ganancias 
      INNER JOIN usuarios admon ON admon.id_usuario = ganancias.id_usuario_admin
      INNER JOIN usuarios gerente1 ON gerente1.id_usuario = ganancias.id_usuario_gerent1
      INNER JOIN usuarios gerente2 ON gerente2.id_usuario = ganancias.id_usuario_gerent2
      INNER JOIN usuarios vendedor1 ON vendedor1.id_usuario = ganancias.id_vend1
      INNER JOIN usuarios vendedor2 ON vendedor2.id_usuario = ganancias.id_vend2
      INNER JOIN usuarios vendedor3 ON vendedor3.id_usuario = ganancias.id_vend3
      WHERE ganancias.status = 1";
      //echo $query;exit;
      $respuesta = mysqli_query($this->con,$query);
      while($row = mysqli_fetch_assoc($respuesta)){
        $data['titulo_producto'] = $row['titulo_producto'];
        $data['titulo_precio'] = $row['titulo_precio'];
        $data['admonNombre'] = $row['admonNombre'];
        $data['admonApellidos'] = $row['admonApellidos'];
        $data['gerenteNombre1'] = $row['gerenteNombre1'];
        $data['gerenteApellidos1'] = $row['gerenteApellidos1'];
        $data['gerenteNombre1'] = $row['gerenteNombre1'];
        $data['gerenteApellidos2'] = $row['gerenteApellidos2'];
        $data['vendedorNombre1'] = $row['vendedorNombre1'];
        $data['vendedorApellidos1'] = $row['vendedorApellidos1'];
        $data['vendedorNombre2'] = $row['vendedorNombre2'];
        $data['vendedorApellidos2'] = $row['vendedorApellidos2'];
        $data['vendedorNombre3'] = $row['vendedorNombre3'];
        $data['vendedorApellidos'] = $row['vendedorApellidos'];
        
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
}
?>