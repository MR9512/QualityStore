<?php
class administradorModel{
    public function __construct(){
        require_once("DB/Conect.php");
        $con = new Conect();
        $this->con = $con -> Conexion();
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
        $i = 0;
       while($row = mysqli_fetch_assoc($res)){
       $data["precioProducto"][$i] = $row["precio"];
       $i++;
   }
      }else{
        $data["error"] = "No se encontraron registros";
      }
      return $data;
    }

}
?>