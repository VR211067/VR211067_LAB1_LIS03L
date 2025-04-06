<?php

require_once 'Controller.php';
require_once 'Models/AutoresModel.php';
require_once 'Utils/validaciones.php';

class AutoresController extends Controller {
    private $model;

    function __construct() {
        $this->model = new AutoresModel();
    }

    public function index() {
        $viewBag = [];
        $viewBag['autores'] = $this->model->get();
        $this->render("index.php", $viewBag);
    }

    public function create() {
        $this->render("new.php");
    }

   public function insert() {
                if (isset($_POST)) {
                    $errores = [];
                    $autor['codigo_autor'] = $_POST['codigo_autor'];
                    $autor['nombre_autor'] = $_POST['nombre_autor'];
                    $autor['nacionalidad'] = $_POST['nacionalidad'];

                    if(!isCodigoAutor($autor['codigo_autor'])){
                        array_push($errores, "El codigo debe seguir el formato AUTxxx");
                        
                    }
                    if (empty($autor['nombre_autor'])) {
                        array_push($errores, "Debes ingresar el nombre del autor.");
                    }

                    if (empty($autor['nacionalidad'])) {
                        array_push($errores, "Debes ingresar la nacionalidad del autor.");
                    }

                    if (count($errores) == 0) {
                        if ($this->model->insert($autor) != 0) {
                            header('Location: ' . PATH . '/Autores');
                        } else {
                            array_push($errores, "Ya existe un autor con este código.");
                            $viewBag['errores'] = $errores;
                            $viewBag['autor'] = $autor;
                            $this->render('new.php', $viewBag);
                        }
                    } else {
                        $viewBag['errores'] = $errores;
                        $viewBag['autor'] = $autor;
                        $this->render('new.php', $viewBag);
                    }
                }
            }


    public function delete($params) {
        $codigo = $params[0];
        $this->model->delete($codigo);
        header('Location: ' . PATH . '/Autores');
    }

    public function edit($params) {
        $codigo = $params[0];
        $autor = $this->model->get($codigo);

        if (empty($autor)) {
            die("Error: No se encontró el autor con código " . $codigo);
        }

        $viewBag['autor'] = $autor[0];
        $this->render("edit.php", $viewBag);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errores = [];
            $autor['codigo_autor'] = $_POST['codigo_autor'];
            $autor['nombre_autor'] = $_POST['nombre_autor'];
            $autor['nacionalidad'] = $_POST['nacionalidad'];

            if (empty($autor['nombre_autor'])) {
                array_push($errores, "Debes ingresar el nombre del autor.");
            }

            if (empty($autor['nacionalidad'])) {
                array_push($errores, "Debes ingresar la nacionalidad del autor.");
            }

            if (count($errores) == 0) {
                if ($this->model->update($autor) != 0) {
                    header('Location: ' . PATH . '/Autores');
                } else {
                    array_push($errores, "Error al actualizar el autor.");
                    $viewBag['errores'] = $errores;
                    $viewBag['autor'] = $autor;
                    $this->render('edit.php', $viewBag);
                }
            } else {
                $viewBag['errores'] = $errores;
                $viewBag['autor'] = $autor;
                $this->render('edit.php', $viewBag);
            }
        }
    }
}

?>
