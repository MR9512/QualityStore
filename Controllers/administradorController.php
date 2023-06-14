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
        $respuesta['titulos'] = $this->administradorModel->getTitulos();
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
        //var_dump($_POST);exit;
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
        $getAdminGeren = $this->administradorModel->getAdminGeren();
        if($_POST['intermediario'] == 1){
            $intermediario = $this->administradorModel->getInfoIntermediario2($_POST['id_intermediario']);

            if($intermediario['id_rolRecomendo'] == 1) {
                $ganancia['id_usuario'][] = $intermediario['id_usuario'];
                $ganancia['nombre_usuario'][] = $intermediario['nombre'];
                $ganancia['ganancia'][] = $_POST['ganancia'] * 0.20;
            }else{
                $ganancia['nombre_usuario'][] = $intermediario['nombre'];
                $ganancia['ganancia'][] = $_POST['ganancia'] * 0.20;
            }
                foreach ($getAdminGeren['id_usuarioAdminGeren'] AS $i => $id_usuario){
                    $id_rol = $getAdminGeren['id_rolUsuarioAdminGeren'][$i];
                    if($id_rol == 1 && $intermediario['id_rolRecomendo'] == $id_rol){
                        $ganancia['id_usuario'][] = $id_usuario;
                        $ganancia['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                        $ganancia['ganancia'][] = $_POST['ganancia'] * 0.60;
                    }else{
                        if($id_rol == 1){
                            $ganancia['id_usuario'][] = $id_usuario;
                            $ganancia['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                            $ganancia['ganancia'][] = $_POST['ganancia'] * 0.50;
                        }else{
                            if($id_rol == 2 && $intermediario['id_rolRecomendo'] == $id_rol && $intermediario['id_usuarioRecomendo'] == $getAdminGeren['id_usuarioAdminGeren'][$i]){
                                $ganancia['id_usuario'][] = $id_usuario;
                                $ganancia['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                $ganancia['ganancia'][] = $_POST['ganancia'] * 0.20;
                            }else{
                                if($id_rol == 2 ){
                                    $ganancia['id_usuario'][] = $id_usuario;
                                    $ganancia['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                    $ganancia['ganancia'][] = $_POST['ganancia'] * 0.10;
                                }
                            }
                        }
                    }
                }
                //var_dump($ganancia);
        }else{
            $infoUsuario = $this->administradorModel->getInfoUsuario($_POST['id_usuario']);

            if($infoUsuario['id_rol'] == 3){
                $ganancia['nombre_usuario'][] = $infoUsuario['nombre'];
                $ganancia['id_usuario'][] = $_POST['id_usuario'];
                $ganancia['ganancia'][] = $_POST['ganancia'] * 0.30;
            }
            if($infoUsuario['id_rol'] == 4){
                $ganancia['nombre_usuario'][] = $infoUsuario['nombre'];
                $ganancia['id_usuario'][] = $_POST['id_usuario'];
                $ganancia['ganancia'][] = $_POST['ganancia'] * 0.20;
            }
            foreach ($getAdminGeren['id_usuarioAdminGeren'] AS $i => $id_usuario){
                $id_rol = $getAdminGeren['id_rolUsuarioAdminGeren'][$i];
                if($id_rol == 1 && $infoUsuario['id_rol'] == $id_rol){
                    $ganancia['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                    $ganancia['id_usuario'][] = $id_usuario;
                    $ganancia['ganancia'][] = $_POST['ganancia'] * 0.60;
                }else{
                    if($id_rol == 1){
                        $ganancia['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                        $ganancia['id_usuario'][] = $id_usuario;
                        $ganancia['ganancia'][] = $_POST['ganancia'] * 0.60;
                    }else{
                        if($id_rol == 2 && $infoUsuario['id_rol'] == $id_rol && $infoUsuario['id_usuario'] == $getAdminGeren['id_usuarioAdminGeren'][$i]){
                            $ganancia['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                            $ganancia['id_usuario'][] = $id_usuario;
                            $ganancia['ganancia'][] = $_POST['ganancia'] * 0.30;
                        }else{
                            if($infoUsuario['id_rol'] == 1){
                                $ganancia['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                $ganancia['id_usuario'][] = $id_usuario;
                                $ganancia['ganancia'][] = $_POST['ganancia'] * 0.20;
                            }else{
                            if($id_rol == 2 ){
                                $ganancia['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                $ganancia['id_usuario'][] = $id_usuario;
                                $ganancia['ganancia'][] = $_POST['ganancia'] * 0.10;
                            }
                            }
                        }
                    }
                }
            }

        }
        $retorno = $ganancia;
































        /*var_dump($_POST);exit;
        if($_POST['intermediario'] == 1){
            $datosInter = $this->administradorModel->getInfoQuienVendio($_POST['id_intermediario']);
            //var_dump($datosInter);exit;
            $getAdminGeren = $this->administradorModel->getAdminGeren();
            if($datosInter['id_rolRecomendado'] == 4){
                $retorno['rol'][] = "intermediario";
                $retorno['id_usuario'][] = $datosInter['id_rolRecomendo'];
                $retorno['ganancia'][] = $_POST['ganancia']*0.20;
                $retorno['porcentaje'][] = 0.20;
                $retorno['nombre_usuario'][] = $datosInter['nombre_usuario'];
            }
            //var_dump($getAdminGeren);exit;
            $i = 0;
            foreach($getAdminGeren['id_usuarioAdminGeren'] as $i => $id_usuario){
                $id_rol = $getAdminGeren['id_rolUsuarioAdminGeren'][$i];
                $nombre = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                if(($datosInter['id_rolRecomendo'] == 1) && ($id_usuario == $datosInter['id_usuarioRecomendo'])){
                    $retorno['rol'][] = "administrador";
                    $retorno['id_usuario'][] = $id_usuario;
                    $retorno['ganancia'][] = $_POST['ganancia']*0.60;
                    $retorno['porcentaje'][] = 0.60;
                    $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                }else{
                    if($id_rol == 1){
                        $retorno['rol'][] = "administrador";
                        $retorno['id_usuario'][] = $id_usuario;
                        $retorno['porcentaje'][] = 0.50;
                        $retorno['ganancia'][] = $_POST['ganancia']*0.50;
                        $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                    }else{
                        if(($datosInter['id_rolRecomendo'] == 2) && ($id_usuario == $datosInter['id_usuarioRecomendo'])){
                            $retorno['rol'][] = "gerente";
                            $retorno['id_usuario'][] = $id_usuario;
                            $retorno['ganancia'][] = $_POST['ganancia']*0.20;
                            $retorno['porcentaje'][] = 0.20;
                            $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                        }else{
                            if($id_rol == 2){
                                $retorno['rol'][] = "gerente";
                                $retorno['id_usuario'][] = $id_usuario;
                                $retorno['ganancia'][] = $_POST['ganancia']*0.10;
                                $retorno['porcentaje'][] = 0.10;
                                $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                            }
                        }
                    }
                }
            }

        }else {
            $datosVendio = $this->administradorModel->getInfoQuienVendio($_POST['id_usuario']);
            $getAdminGeren = $this->administradorModel->getAdminGeren();
            if ($datosVendio['id_rolVendio'] == 3) {
                $retorno['rol'][] = "vendedor";
                $retorno['porcentaje'][] = 0.30;
                $retorno['ganancia'][] = $_POST['ganancia'] * 0.30;
                $retorno['id_usuario'][] = $datosVendio['id_usuarioVendio'];
                $datosRetorno['id_usuarioVendio'][] = $datosVendio['id_usuarioVendio'];
                $datosRetorno['id_rolVendio'][] = $datosVendio['id_rolVendio'];
                foreach ($getAdminGeren['id_usuarioAdminGeren'] as $i => $id_usuario) {
                    $id_rol = $getAdminGeren['id_rolUsuarioAdminGeren'][$i];
                    $nombre = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                    if ($id_rol == 1 && (isset($datosVendio['id_usuarioRecomendo']) && $id_usuario == $datosVendio['id_usuarioRecomendo'])) {
                        $retorno['rol'][] = "administrador";
                        $retorno['id_usuario'][] = $id_usuario;
                        $retorno['porcentaje'][] = 0.50;
                        $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                        $retorno['ganancia'][] = $_POST['ganancia'] * 0.50;
                    } else {
                        if ($id_rol == 1) {
                            $retorno['rol'][] = "administrador";
                            $retorno['id_usuario'][] = $id_usuario;
                            $retorno['porcentaje'][] = 0.50;
                            $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                            $retorno['ganancia'][] = $_POST['ganancia'] * 0.50;
                        } else {
                            if ($id_rol == 2 && (isset($datosVendio['id_usuarioRecomendo']) && $id_usuario == $datosVendio['id_usuarioRecomendo'])) {
                                $retorno['rol'][] = "gerente";
                                $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                $retorno['porcentaje'][] = 0.20;
                                $retorno['id_usuario'][] = $id_usuario;
                                $retorno['ganancia'][] = $_POST['ganancia'] * 0.20;
                            } else {
                                if ($id_rol == 2) {
                                    $retorno['rol'][] = "gerente";
                                    $retorno['id_usuario'][] = $id_usuario;
                                    $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                    $retorno['porcentaje'][] = 0.10;
                                    $retorno['ganancia'][] = $_POST['ganancia'] * 0.10;
                                }
                            }
                        }
                    }
                }
            } else {
                if ($datosVendio['id_rolVendio'] == 2) {
                    foreach ($getAdminGeren['id_usuarioAdminGeren'] as $i => $id_usuario) {
                        $id_rol = $getAdminGeren['id_rolUsuarioAdminGeren'][$i];
                        $nombre = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                        if ($datosVendio['id_rolVendio'] == 1 && $datosVendio['id_usuarioVendio'] == $id_usuario) {
                            $retorno['rol'][] = "administrdor";
                            $retorno['id_usuario'][] = $id_usuario;
                            $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                            $retorno['porcentaje'][] = 0.80;
                            $retorno['ganancia'][] = $_POST['ganancia'] * 0.80;
                        } else {
                            if ($id_rol == 1) {
                                $retorno['rol'][] = "administrador";
                                $retorno['id_usuario'][] = $id_usuario;
                                $retorno['porcentaje'][] = 0.60;
                                $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                $retorno['ganancia'][] = $_POST['ganancia'] * 0.60;
                            } else {
                                if ($datosVendio['id_rolVendio'] == 2 && $datosVendio['id_usuarioVendio'] == $id_usuario) {
                                    $retorno['rol'][] = "gerente";
                                    $retorno['id_usuario'][] = $id_usuario;
                                    $retorno['porcentaje'][] = 0.30;
                                    $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                    $retorno['ganancia'][] = $_POST['ganancia'] * 0.30;
                                } else {
                                    if ($id_rol == 2) {
                                        $retorno['porcentaje'][] = 0.10;
                                        $retorno['id_usuario'][] = $id_usuario;
                                        $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                        $retorno['ganancia'][] = $_POST['ganancia'] * 0.10;
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if ($datosVendio['id_rolVendio'] == 1) {
                        foreach ($getAdminGeren['id_usuarioAdminGeren'] as $i => $id_usuario) {
                            if ($datosVendio['id_rolVendio'] == 1 && $datosVendio['id_usuarioVendio'] == $id_usuario) {
                                $retorno['porcentaje'][] = 0.80;
                                $retorno['id_usuario'][] = $id_usuario;
                                $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                                $retorno['ganancia'][] = $_POST['ganancia'] * 0.60;
                            } else {
                                $retorno['porcentaje'][] = 0.10;
                                $retorno['id_usuario'][] = $id_usuario;
                                $retorno['ganancia'][] = $_POST['ganancia'] * 0.20;
                                $retorno['nombre_usuario'][] = $getAdminGeren['nombre_usuarioAdminGeren'][$i];
                            }
                        }
                    }
                }
            }
        }*/
        echo json_encode($retorno);
    }

    public function getUsuarioProductos(){
        $respuesta = $this->administradorModel->getProductosVendidos($_POST['id_usuario']);

        echo json_encode($respuesta);
    }

    public function updatePagarVendedor(){
        $respuesta = $this->administradorModel->updatePagarVendedor($_POST['id_usuario']);
        echo json_encode($respuesta);
    }


}

?>