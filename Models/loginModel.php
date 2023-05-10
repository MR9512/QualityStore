<?php
class loginModel
{
    public function __construct()
    {
        require_once("DB/Conect.php");
        $con = new Conect();
        $this->con = $con->conexion();
        $fecha = getdate();
        $this->fecha = $fecha['year']."-".$fecha['mon']."-".$fecha['mday'];
        
    }

    public function saveUser($datos){
       $query = "INSERT INTO usuarios(nombre,apellidos,correo,password,telefono,status, id_rol) VALUES ('".$datos['nombre']."','".$datos['apellidos']."','".$datos['correo']."','".$datos['password']."','".$datos['telefono']."','1','".$datos['id_rol']."')";
       mysqli_query($this->con,$query);
       return true;
    }
    public function validar($datos)
    {
        $query = 'SELECT * FROM usuarios WHERE correo = "' . $datos['usuario'] . '" AND password = "' . $datos['contrasena'] . '" AND status = 1';

        $respuesta = mysqli_query($this->con, $query);

        if (mysqli_num_rows($respuesta) > 0) {
            while ($row = mysqli_fetch_assoc($respuesta)) {
                $data['id_usuario'] = $row['id_usuario'];
                $data['nombre_usuario'] = $row['nombre'];
            }
        } else {
            $data['error_usuario'] = "El usuario no existe";
        }
        return $data;
    }
    public function getRoles(){
        $query = 'SELECT * FROM roles';
        $respuesta = mysqli_query($this->con, $query);
        $i = 0;
        while($row = mysqli_fetch_assoc($respuesta)){
            $data['id_rol'][$i] = $row['id_rol'];
            $data['rol'][$i] = $row['rol'];
            $i++;
        }
        return $data;
    }
}
