<?php
require_once(__DIR__ . "/../core/coreController.php");

class administradorController extends coreController
{
    public function __construct()
    {
        require_once("Models/administradorModel.php");
        require_once("Models/generalesModel.php");
        require_once("Models/productosModel.php");
        $this->administradorModel = new administradorModel();
        $this->generalesModel = new generalesModel();
        $this->productosModel = new productosModel();
        $this->js = "assets/js/administrador.js";
    }

    public function misProductosVendidos()
    {

        $respuesta['roles'] = $this->generalesModel->getRoles();
        $respuesta['categorias'] = $this->generalesModel->getCategoria();
        $respuesta['productos'] = $this->productosModel->getProductos();
        $respuesta['datos'] = $this->administradorModel->getProductosVendidos();
        $respuesta['usuarios'] = $this->generalesModel->getUsuarios();
        //$respuesta['titulos'] = $this->administradorModel->getTitulos();
        require_once("Views/templates/header.php");
        require_once("Views/templates/menu.php");
        require_once("Views/administrador/misProductosVendidos.php");
        require_once("Views/templates/footer.php");
    }

    public function getProducto()
    {
        $respuesta = $this->productosModel->getProductos(1, $_POST['id_categoria']);
        echo json_encode($respuesta);
    }

    public function getUsuarios()
    {
        $respuesta = $this->administradorModel->getUsuarios($_POST['id_rol']);
        echo json_encode($respuesta);
    }

    public function getprecio()
    {
        $respuesta = $this->administradorModel->getPrecio($_POST['id_producto']);
        echo json_encode($respuesta);
    }

    public function saveProductoVendedor()
    {
        $rol = $this->administradorModel->getRolUsuario($_POST['id_usuario']);
        foreach ($rol['id_usuario'] as $i => $id_usuarios_ganancias) {
            if ($_POST['id_usuario'] != $id_usuarios_ganancias) {
                $_POST['id_usuario_ganancia'][$i] = $id_usuarios_ganancias;
                if ($rol['id_rol'][$i] == 1) {
                    $decimal = 0.50;
                    $_POST['ganancia_total'][$i] = $_POST['gananciaProducto'] * $decimal;
                }
                if ($rol['id_rol'][$i] == 2) {
                    $decimal = 0.30;
                    $_POST['ganancia_total'][$i] = $_POST['gananciaProducto'] * $decimal;
                }
                if ($rol['id_rol'][$i] == 3) {
                    $decimal = 0.10;
                    $_POST['ganancia_total'][$i] = $_POST['gananciaProducto'] * $decimal;
                }
            } else {
                $_POST['id_usuario_ganancia'][$i] = 0;
                $_POST['ganancia_total'][$i] = 0;
            }

        }
        $respuesta = $this->administradorModel->saveProductoVendedor($_POST);
        echo json_encode($respuesta);
    }

    public function getProdVend()
    {
        $respuesta = $this->administradorModel->getProdVend($_POST['id_usuario']);
        echo json_encode($respuesta);
    }

    public function getGananciasUsuarios()
    {
        //var_dump($_POST);exit;
        $datosVendio = $this->administradorModel->getInfoQuienVendio($_POST['id_usuario']);
        if($_POST['intermediario'] == 1){
            $recomendo = $this->administradorModel->getUsuarioRecomendo($_POST['id_intermediario']);
        }else{
            $usuariosGanancias = $this->administradorModel->getRolUsuarioVendio($_POST['id_intermediario'],true);
        }
        //var_dump($datosVendio);exit;
        if($datosVendio['id_rolRecomendo'] == 1){
            $id_usuario_recomendo = $datosVendio['id_usuarioRecomendo'];
            $gananciaRecomendo = 0.50;
        }else{
            if($datosVendio['id_rolRecomendo'] == 2){
                $id_usuario_recomendo = $datosVendio['id_usuarioRecomendo'];
                $gananciaRecomendo = 0.20;
            }
        }
        foreach ($usuariosGanancias['id_usuario'] as $i => $id_usuario_ganancias){
            //echo $usuariosGanancias['rol'][$i]."<br>";
            if($usuariosGanancias['rol'][$i] == 1 && $id_usuario_ganancias == $id_usuario_recomendo){
                $data['ganancia'][$i] = $_POST['ganancia'] * $gananciaRecomendo;
                //$data['ganancia_rol_vendedor'] = $_POST['ganancia'] * .30;
            }else{
                if($usuariosGanancias['rol'][$i] == 1){
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.60;
                }else{
                    if($usuariosGanancias['rol'][$i] == 2 && $id_usuario_ganancias == $id_usuario_recomendo){
                        $data['ganancia'][$i] = $_POST['ganancia'] * $gananciaRecomendo;
                        //$data['ganancia_rol_vendedor'][$i + 1] = $_POST['ganancia'] * .20;
                    }else{
                        if($usuariosGanancias['rol'][$i] == 2){
                            $data['ganancia'][$i] = $_POST['ganancia'] * 0.10;
                        }else{
                            if($usuariosGanancias['rol'][$i] == 3){
                                $data['ganancia'][$i] = $_POST['ganancia'] * $gananciaRecomendo;
                            }
                        }
                    }
                }
            }
        }
        if($datosVendio['id_rolVendio'] == 3) {

        }
        var_dump($data);exit;
        /*if ($_POST['intermediario'] == 1) {
            $recomendo = $this->administradorModel->getUsuarioRecomendo($_POST['id_intermediario']);
            $id_recomendo = $recomendo['id_usuario'];
           // echo $id_recomendo." ----->recomendo<br>";
            $usuariosGanancias = $this->administradorModel->getRolUsuarioVendio($_POST['id_intermediario'],true);

        }else{
            $usuariosGanancias = $this->administradorModel->getRolUsuarioVendio($_POST['id_usuario'],0);
        }
        foreach ($usuariosGanancias['id_usuario'] as $i => $id_usuario) {
            //echo $id_usuario." --> ".$id_recomendo." --> rol -->".$usuariosGanancias['rol'][$i]."<br>";
            $data['id_usuario'][$i] = $id_usuario;
            $data['nombre_usuario'][$i] = $usuariosGanancias['nombre'][$i];
            if (isset($_POST['id_intermediario']) && $_POST['intermediario'] > 0 ) {
                //si el administrador recomendo al vendedor se lleva el 50 el recomendado el 10 y los gerentes 20
                if ($usuariosGanancias['rol'][$i] == 1 && $id_usuario == $id_recomendo) {
                    //echo $id_usuario." ----->administrador recomendo<br>";

                    $data['rol'][$i] = "administrador";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.60;
                }else{
                    if ($usuariosGanancias['rol'][$i] == 1) {
                      //  echo $id_usuario." ----->administrador no recomendo<br>";

                        $data['rol'][$i] = "administrador";
                        $data['ganancia'][$i] = $_POST['ganancia'] * 0.50;
                    }
                }
                if ($usuariosGanancias['rol'][$i] == 2 && $id_usuario == $id_recomendo) {
                    //echo $id_usuario." ----->gerente recomendo<br>";

                    $data['rol'][$i] = "gerente";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.20;
                }else{
                    if ($usuariosGanancias['rol'][$i] == 2) {
                        //echo $id_usuario." ----->gerente recomendo<br>";

                        $data['rol'][$i] = "gerente";
                        $data['ganancia'][$i] = $_POST['ganancia'] * 0.10;
                    }   
                }
                if ($usuariosGanancias['rol'][$i] == 3) {
                    $data['rol'][$i] = "vendedor";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.20;
                }
            }else{
                if ($usuariosGanancias['rol'][$i] == 1 && $id_usuario == $_POST['id_usuario']) {
                    $data['rol'][$i] = "administrador";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.60;
                }else{
                    if ($usuariosGanancias['rol'][$i] == 1) {
                        $data['rol'][$i] = "administrador";
                        $data['ganancia'][$i] = $_POST['ganancia'] * 0.60;
                    }
                }
                //echo "rol -->".$usuariosGanancias['rol'][$i]." --- vendedor -->".$_POST['id_usuario']."<br>";
                if ($usuariosGanancias['rol'][$i] == 2 && $id_usuario == $_POST['id_usuario']) {
                    //echo "gerente vendio";
                    $data['rol'][$i] = "gerente";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.30;
                }else{
                    if ($usuariosGanancias['rol'][$i] == 2 && $_POST['id_usuario'] == 1) {
                        $data['rol'][$i] = "gerente";
                        $data['ganancia'][$i] = $_POST['ganancia'] * 0.20;
                    }else{
                        if ($usuariosGanancias['rol'][$i] == 2) {
                            $data['rol'][$i] = "gerente";
                            $data['ganancia'][$i] = $_POST['ganancia'] * 0.10;
                        }
                    }
                }
                if ($usuariosGanancias['rol'][$i] == 3 && $id_usuario == $_POST['id_usuario']) {
                    $data['rol'][$i] = "vendedor";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.20;
                }
            }
        }
        echo json_encode($data);*/
    }


}

?>