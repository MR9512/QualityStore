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
        if ($_POST['intermediario'] == 1) {
            $usuariosGanancias = $this->administradorModel->getRolUsuarioVendio($_POST['id_intermediario'],true);

        }else{
            $usuariosGanancias = $this->administradorModel->getRolUsuarioVendio($_POST['id_usuario'],0);
        }
        foreach ($usuariosGanancias['id_usuario'] as $i => $id_usuario) {
            $data['id_usuario'][$i] = $id_usuario;
            $data['nombre_usuario'][$i] = $usuariosGanancias['nombre'][$i];
            if (isset($_POST['id_intermediario']) && $_POST['intermediario'] > 0 ) {
                if ($usuariosGanancias['rol'][$i] == 1) {
                    $data['rol'][$i] = "administrador";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.50;
                }
                if ($usuariosGanancias['rol'][$i] == 2) {
                    $data['rol'][$i] = "gerente";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.20;
                }
                if ($usuariosGanancias['rol'][$i] == 3) {
                    $data['rol'][$i] = "vendedor";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.10;
                }
            }else{
                if ($usuariosGanancias['rol'][$i] == 1 && $id_usuario == $_POST['id_usuario']) {
                    $data['rol'][$i] = "administrador";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.80;
                }else{
                    if ($usuariosGanancias['rol'][$i] == 1) {
                        $data['rol'][$i] = "administrador";
                        $data['ganancia'][$i] = $_POST['ganancia'] * 0.60;
                    }
                }
                if ($usuariosGanancias['rol'][$i] == 2 && $id_usuario == $_POST['id_usuario']) {
                    $data['rol'][$i] = "gerente";
                    $data['ganancia'][$i] = $_POST['ganancia'] * 0.30;
                }else{
                    if ($usuariosGanancias['rol'][$i] == 2) {
                        $data['rol'][$i] = "gerente";
                        $data['ganancia'][$i] = $_POST['ganancia'] * 0.10;
                    }
                }
            }
        }
        echo json_encode($data);
    }


}

?>