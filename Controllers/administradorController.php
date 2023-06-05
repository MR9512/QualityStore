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
        $getAdminGeren = $this->administradorModel->getAdminGeren();
        if($datosVendio['id_rolVendio'] == 3){
            $retorno['rol'][] = "vendedor";
            $retorno['porcentaje'][] = 0.30;
            $retorno['ganancia'][] = $_POST['ganancia']*0.30;
            $datosRetorno['id_usuarioVendio'][] = $datosVendio['id_usuarioVendio'];
            $datosRetorno['id_rolVendio'][] = $datosVendio['id_rolVendio'];
            foreach ($getAdminGeren['id_usuarioAdminGeren'] as $i => $id_usuario){
                $id_rol = $getAdminGeren['id_rolUsuarioAdminGeren'][$i];
                $nombre = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                if($id_rol == 1 && (isset($datosVendio['id_usuarioRecomendo']) && $id_usuario == $datosVendio['id_usuarioRecomendo'])){
                    $retorno['rol'][] = "administrador";
                    $retorno['porcentaje'][] = 0.50;
                    $retorno['ganancia'][] = $_POST['ganancia']*0.50;
                }else{
                    if($id_rol == 1){
                        $retorno['rol'][] = "administrador";
                        $retorno['porcentaje'][] = 0.50;
                        $retorno['ganancia'][] = $_POST['ganancia']*0.50;
                    }else{
                        if($id_rol == 2 && (isset($datosVendio['id_usuarioRecomendo']) && $id_usuario == $datosVendio['id_usuarioRecomendo'])){
                            $retorno['rol'][] = "gerente";
                            $retorno['porcentaje'][] = 0.20;
                            $retorno['ganancia'][] = $_POST['ganancia']*0.20;
                        }else{
                            if($id_rol == 2) {
                                $retorno['rol'][] = "gerente";
                                $retorno['porcentaje'][] = 0.10;
                                $retorno['ganancia'][] = $_POST['ganancia'] * 0.10;
                            }
                        }
                    }
                }
            }
        }else{
            if($datosVendio['id_rolVendio'] == 2){
                foreach ($getAdminGeren['id_usuarioAdminGeren'] as $i => $id_usuario){
                    $id_rol = $getAdminGeren['id_rolUsuarioAdminGeren'][$i];
                    $nombre = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                    if($datosVendio['id_rolVendio'] == 1 && $datosVendio['id_usuarioVendio'] == $id_usuario){
                        $retorno['rol'][] = "administrdor";
                        $retorno['porcentaje'][] = 0.80;
                        $retorno['ganancia'][] = $_POST['ganancia']*0.80;
                    }else{
                        if($id_rol == 1){
                            $retorno['rol'][] = "administrador";
                            $retorno['porcentaje'][] = 0.60;
                            $retorno['ganancia'][] = $_POST['ganancia']*0.60;
                        }else{
                            if($datosVendio['id_rolVendio'] == 2 && $datosVendio['id_usuarioVendio'] == $id_usuario){
                                $retorno['rol'][] = "gerente";
                                $retorno['porcentaje'][] = 0.30;
                                $retorno['ganancia'][] = $_POST['ganancia']*0.30;
                            }else{
                                if($id_rol == 2){
                                    $retorno['porcentaje'][] = 0.10;
                                    $retorno['ganancia'][] = $_POST['ganancia']*0.10;
                                }
                            }
                        }
                    }
                }
            }else{
                if($datosVendio['id_rolVendio'] == 1){
                    foreach ($getAdminGeren['id_usuarioAdminGeren'] as $i => $id_usuario){
                            if($datosVendio['id_rolVendio'] == 1 && $datosVendio['id_usuarioVendio'] == $id_usuario){
                                $retorno['porcentaje'][] = 0.80;
                                $retorno['ganancia'][] = $_POST['ganancia']*0.60;
                            }else{
                                $retorno['porcentaje'][] = 0.10;
                                $retorno['ganancia'][] = $_POST['ganancia']*0.20;
                            }
                        }
                    }
            }
        }

        var_dump($retorno);exit;
        if($_POST['intermediario'] == 1){
            $recomendo = $this->administradorModel->getUsuarioRecomendo($_POST['id_intermediario']);
        }else{
            $usuariosGanancias = $this->administradorModel->getRolUsuarioVendio($_POST['id_intermediario'],true);
        }
    }


}

?>