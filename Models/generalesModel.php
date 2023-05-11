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
}
?>