<?php
class generalesModel{
    public function __construct(){
        require_once("DB/Conect.php");
        $con = new Conect();
        $this->con = $con -> Conexion();
    }

    public function getCategoria(){
        $query = "SELECT * FROM categoria";
        $res = mysqli_query($this->con, $query);
        if(mysqli_num_rows($res) > 0){
          $i = 0;
          while($row = mysqli_fetch_assoc($res)){
            $data["id_categoria"][$i] = $row["id_categoria"];
            $data["nombre"][$i] = $row["nombreCategoria"];
            $i++;
          }
        }
        return $data;
    }

    public function getRoles(){
      $query = "SELECT * FROM roles";
      $res = mysqli_query($this->con, $query);
      if(mysqli_num_rows($res) > 0){
        $i = 0;
        while($row = mysqli_fetch_assoc($res)){
          $data["id_rol"][$i] = $row["id_rol"];
          $data["nombreRol"][$i] = $row["rol"];
          $i++;
        }
      }
      return $data;
    }

    public function getUsuarios(){
      $query = "SELECT * FROM usuarios";
      $res = mysqli_query($this->con, $query);
      if(mysqli_num_rows($res) > 0){
        $i = 0;
        while($row = mysqli_fetch_assoc($res)){
          $data["id_usuario"][$i] = $row["id_usuario"];
          $data["nombre_usuario"][$i] = $row["nombre"]." ".$row["apellidos"];
          $i++;
        }
      }
      return $data;
    }
}
?>