<?php 

 class usuariosModel{

    public function __construct(){
        require_once("DB/Conect.php");
        $con = new Conect();
        $this->con = $con->conexion();
        $fecha = getdate();
        $this->fecha = $fecha['year'] . "-" . $fecha['mon'] . "-" . $fecha['mday'];
    }

    public function getUsuarios($condicion = null, $rol = null){
        $query = "SELECT *, IF(usuarios.status = 1,'Activo','Inactivo') as nombreStatus, IF(usuarios.status = 1,'bg-success','bg-warning') as colorStatus FROM usuarios INNER JOIN roles on usuarios.id_rol = roles.id_rol";
        if($condicion != null || $rol != null){
           $query.= " WHERE"; 
        }
        if($condicion == 1){
            $query.=" status = 1";
        }
        if($rol != null){
           if($condicion == 1){
             $query.= " AND";
           }
           $query.= " roles.id_rol = $rol";
        }
        $res = mysqli_query($this->con, $query);
        if(mysqli_num_rows($res) > 0){
            $i = 0;
           while($row = mysqli_fetch_assoc($res)){
               $data["rol"][$i] = $row["rol"];
               $data["id_usuario"][$i] = $row["id_usuario"];
               $data["nombre"][$i] = $row["nombre"];
               $data["apellidos"][$i] = $row["apellidos"];
               $data["correo"][$i] = $row["correo"];
               $data["password"][$i] = $row["password"];
               $data["telefono"][$i] = $row["telefono"];
               $data["status"][$i] = $row["status"];
               $data["fecha_altaUsuario"][$i] = $row["fecha_altaUsuario"];
               $data['nombreStatus'][$i] = $row['nombreStatus'];
               $data['colorStatus'][$i] = $row['colorStatus'];
               $i++;
           }
               $data["valor"] = 1;
        } else {
            $data["error"] = "No se encontraron registros";
            $data["valor"] = 0;
        }
        return $data;
    }

    public function getUsuario($id){
       $query = "SELECT * , IF(usuarios.status = 1,'Activo','Inactivo') as estatus, usuarios.nombre as nombreAdministrador,
       roles.rol as rolNombre 
       FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol
       WHERE id_usuario = $id";
       $res = mysqli_query($this->con, $query);
       if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            $data["rol"] = $row["rol"];
            $data["id_usuario"] = $row["id_usuario"];
            $data["nombre"] = $row["nombre"];
            $data["apellidos"] = $row["apellidos"];
            $data["correo"] = $row["correo"];
            $data["password"] = $row["password"];
            $data["telefono"] = $row["telefono"];
            $data["status"] = $row["status"];
            $data['id_rol'] = $row['id_rol'];
            $data["fecha_altaUsuario"] = $row["fecha_altaUsuario"];
    }
       }else{
         $data["error"] = "No se encontraron registros";
       }
       return $data;
    }

    public function saveUsuario($datos)
    {
        $query = "INSERT INTO usuarios(nombre,apellidos,correo,password,telefono,status,fecha_altaUsuario, id_rol) VALUES ('" . $datos['nombreUsuario'] . "','" . $datos['apellidosUsuario'] . "','" . $datos['correoUsuario'] . "','" . $datos['passwordUsuario'] . "','" . $datos['telefonoUsuario'] . "',1,'" . $this->fecha . "','" . $datos['id_rol']. "')";
        mysqli_query($this->con, $query);
        return true;
    }
    
    public function updateUsuario($datos){
        $query = "UPDATE usuarios SET nombre = '".$datos["editarNombreUsuario"]."', apellidos = '".$datos["editarApellidosUsuario"]."', correo = '".$datos["editarCorreoUsuario"]."',password = '".$datos["editarContrasenaUsuario"]."',telefono = '".$datos["editarTelefonoUsuario"]."',status = '".$datos["editarStatusUsuario"]."', fecha_altaUsuario = '".$this->fecha."', id_rol = '".$datos["editarRolUsuario"]."' WHERE id_usuario =".$datos["id_usuario"];
        mysqli_query($this->con, $query);
        return true;
    }

    public function deleteUsuario($id_usuario){
        $query = "UPDATE usuarios SET status = 0 WHERE id_usuario = $id_usuario";
        mysqli_query($this->con, $query);
        return true;
    }

    public function buscarUsuarios($usuario){
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



