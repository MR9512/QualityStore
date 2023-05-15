<?php
class administradorModel{
    public function __construct(){
        require_once("DB/Conect.php");
        $con = new Conect();
        $this->con = $con -> Conexion();
    }

    public function getVendedor(){
        $query = "SELECT * FROM usuarios WHERE id_rol = 3";
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