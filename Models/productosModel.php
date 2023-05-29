<?php 

 class productosModel{

    public function __construct(){
        require_once("DB/Conect.php");
        $con = new Conect();
        $this->con = $con->conexion();
        $fecha = getdate();
        $this->fecha = $fecha['year'] . "-" . $fecha['mon'] . "-" . $fecha['mday'];
    }

    public function getProductos($condicion = null, $categoria = null){
        $query = "SELECT * FROM productos INNER JOIN categoria on productos.id_categoria = categoria.id_categoria";
        if($condicion != null || $categoria != null){
           $query.= " WHERE"; 
        }
        if($condicion == 1){
            $query.=" status = 1";
        }
        if($categoria != null){
           if($condicion == 1){
             $query.= " AND";
           }
           $query.= " categoria.id_categoria = $categoria";
        }

        $res = mysqli_query($this->con, $query);
        if(mysqli_num_rows($res) > 0){
            $i = 0;
           while($row = mysqli_fetch_assoc($res)){
               $data["categoria"][$i] = $row["nombreCategoria"];
               $data["id_producto"][$i] = $row["id_producto"];
               $data["nombre"][$i] = $row["nombre"];
               $data["precio"][$i] = $row["precio"];
               $data["precio_anterior"][$i] = $row["precio_anterior"];
               $data["desc_large"][$i] = $row["desc_large"];
               $data["desc_corta"][$i] = $row["desc_corta"];
               $data["url_imagen"][$i] = $row["url_imagen"];
               $data["url_mercado"][$i] = $row["url_mercado"];
               $data["url_sams"][$i] = $row["url_sams"];
               $data["id_usuario"][$i] = $row["id_usuario"];
               $data["status"][$i] = $row["status"];
               $data["fecha_subida"][$i] = $row["fecha_subida"];
               $i++;
           }
               $data["valor"] = 1;
        } else {
            $data["error"] = "No se encontraron registros";
            $data["valor"] = 0;
        }
        return $data;
    }

    public function getProducto($id){
       $query = "SELECT * , IF(productos.status = 1,'Activo','Inactivo') as estatus, usuarios.nombre as nombreAdministrador,
       productos.nombre as productoNombre 
       FROM productos INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria
       INNER JOIN usuarios on usuarios.id_usuario = productos.id_usuario WHERE id_producto = $id";
       $res = mysqli_query($this->con, $query);
       if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
        $data["id_producto"] = $row["id_producto"];
        $data["nombre"] = $row["productoNombre"];
        $data["precio"] = $row["precio"];
        $data["desc_large"] = $row["desc_large"];
        $data["desc_corta"] = $row["desc_corta"];
        $data["url_imagen"] = $row["url_imagen"];
        $data["url_mercado"] = $row["url_mercado"];
        $data["url_sams"] = $row["url_sams"];
        $data["id_usuario"] = $row["id_usuario"];
        $data["status"] = $row["estatus"];
        $data["fecha_subida"]= $row["fecha_subida"];
        $data["categoria"]= $row["nombreCategoria"];
        $data["nombreAdministrador"]= $row["nombreAdministrador"];
        $data["id_categoria"] = $row["id_categoria"];
        $data["precio_anterior"] = $row["precio_anterior"];
    }
       }else{
         $data["error"] = "No se encontraron registros";
       }
       return $data;
    }

    public function saveProducto($datos)
    {
        $query = "INSERT INTO productos(nombre,precio,precio_anterior,desc_large,desc_corta,url_imagen,url_mercado,url_sams,status,fecha_subida) VALUES ('" . $datos['nombre'] . "','" . $datos['precio'] . "','" . $datos['precio_anterior'] . "','" . $datos['descripcionLarga'] . "','" . $datos['descripcionCorta'] . "','','" . $datos['urlML'] . "','" . $datos['urlSMS'] . "',1,'" . $this->fecha . "')";
        mysqli_query($this->con, $query);
        $id = mysqli_insert_id($this->con);
        $queryUpdate = "UPDATE productos SET url_imagen = '".mysqli_insert_id($this->con).'.'.$datos["extensionImagen"]."' WHERE id_producto =".mysqli_insert_id($this->con);
        mysqli_query($this->con, $queryUpdate);
        return $id;
    }
    
    public function updateProducto($datos){
        $query = "UPDATE productos SET nombre = '".$datos["editarNombre"]."', precio = '".$datos["editarPrecio"]."', precio_anterior = '".$datos["editarPrecioAnterior"]."',desc_large = '".$datos["editarDescL"]."',desc_corta = '".$datos["editarDescC"]."',url_mercado = '".$datos["editarUrlML"]."',url_sams = '".$datos["editarUrlSams"]."',status = '".$datos["editarStatus"]."', fecha_subida = '".$this->fecha."', id_categoria = '".$datos["editarCategoria"]."' WHERE id_producto =".$datos["id_producto"];
        mysqli_query($this->con, $query);
        return true;
    }

    public function deleteProducto($id_producto){
        $query = "DELETE FROM productos WHERE id_producto = $id_producto";
        mysqli_query($this->con, $query);
        return true;
    }

    public function buscarProductos($producto){
        $query = "SELECT * FROM productos INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria WHERE productos.nombre LIKE '%$producto%' OR productos.desc_large LIKE '%$producto%' OR categoria.nombreCategoria LIKE '%$producto%'";
        $resp = mysqli_query($this->con, $query);
        if(mysqli_num_rows($resp) > 0){
            $i = 0;
            while($row = mysqli_fetch_assoc($resp)){
                $data["categoria"][$i] = $row["nombreCategoria"];
                $data["id_producto"][$i] = $row["id_producto"];
                $data["nombre"][$i] = $row["nombre"];
                $data["precio"][$i] = $row["precio"];
                $data["precio_anterior"][$i] = $row["precio_anterior"];
                $data["desc_large"][$i] = $row["desc_large"];
                $data["desc_corta"][$i] = $row["desc_corta"];
                $data["url_imagen"][$i] = $row["url_imagen"];
                $data["url_mercado"][$i] = $row["url_mercado"];
                $data["url_sams"][$i] = $row["url_sams"];
                $data["id_usuario"][$i] = $row["id_usuario"];
                $data["status"][$i] = $row["status"];
                $data["fecha_subida"][$i] = $row["fecha_subida"];
                $i++;
            }

        } else {
            $data["mensajeProducto"] = "No se encontraron productos con tu búsqueda";
        }
          return $data;
    }
 }

?>