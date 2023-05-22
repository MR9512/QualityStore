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
      $query = "INSER INTO productos_vendidos(id_producto,id_usuario,precio_vendido,fecha) VALUES(".$datos['id_producto']."',".$datos['id_usuario'].",'".$datos['precio_vendido']."','".$this->fecha."')";
      mysqli_query($this->con,$query);
      $query_select = "SELECT *, p.nombre as productoNombre FROM productos_vendidos pv INNER JOIN productos p ON p.id_producto = pv.id_producto 
      INNER JOIN categoria c ON c.id_categoria = p.id_categoria INNER JOIN usuarios u ON u.id_usuario = pv.id_usuario
      ORDER BY pv.id_producto_vendido DESC";
      $respuesta = mysqli_query($this->con,$query_select);    
      $i = 0;
      while($row = mysqli_fetch_assoc($respuesta)){
        $data['rol'][$i] = $row['rol'];
        $data['usuario'][$i] = $row['nombre'].' '.$row['apellidos'];
        $data['categoria'][$i] = $row['nombrecategoria'];
        $data['producto'][$i] = $row['productoNombre'];
        $data['precio'][$i] = $row['precio'];
        $i++;
      }
      return $data;
    }

}
?>