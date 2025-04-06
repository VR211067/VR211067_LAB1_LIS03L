<?php

require_once 'Controller.php';
require_once 'Models/EditorialesModel.php';
require_once 'Utils/validaciones.php';

class EditorialesController extends Controller{
    private $model;

    function __construct(){
        $this->model= new EditorialesModel();
    }

    public function index(){
        $viewBag=[];
        $viewBag['editoriales']=$this ->model->get();
        $this->render("index.php",$viewBag);
    }

    public function create(){
        $this->render("new.php");
    }

    public function insert(){

        if(isset($_POST)){
                $errores=[];
                $editorial['codigo_editorial']=$_POST['codigo_editorial'];
                $editorial['nombre_editorial']=$_POST['nombre_editorial'];
                $editorial['contacto']=$_POST['contacto'];
                $editorial['telefono']=$_POST['telefono'];

                if(!isCodigoEditorial($editorial['codigo_editorial'])){
                    array_push($errores, "El codigo debe seguir el formato EDIxxx");
                    
                }
                if(empty($editorial['nombre_editorial'])){
                    array_push($errores,"Debes ingresar el nombre del editorial");
                
                }

                if(!isText($editorial['contacto'])){
                    array_push($errores, "Contacto Erroneo");
                }

                if(!isPhone($editorial['telefono'])){
                    array_push($errores, "El telefono ingresado no tiene el formato correcto");
                
                }

                if(count($errores)==0){

                    if($this->model->insert($editorial) !=0){
                        header('location:'.PATH.'/Editoriales');
                        

                    }
                    
                    else{
                        array_push($errores,"Ya existe un editorial con este còdigo");
                        $viewBag['errores']=$errores;
                        $viewBag['editorial']=$editorial;
                        $this->render('new.php',$viewBag);
                    }
                }
                else{
                    $viewBag['errores']=$errores;
                    $viewBag['editorial']=$editorial;
                    $this->render('new.php',$viewBag);
                }


            
            
        }
    }

    public function delete($params){
        $codigo=$params[0];
        $this->model->delete($codigo);
        header('location:'.PATH.'/Editoriales');
    }


    public function edit($params) {
        $codigo = $params[0];  // Obtener el código desde la URL
        $editorial = $this->model->get($codigo); // Obtener datos del editorial
    
        if (empty($editorial)) {
            die("Error: No se encontró la editorial con código " . $codigo);
        }
    
        $viewBag['editorial'] = $editorial[0]; // Asegurarse de obtener el primer resultado
        $this->render("edit.php", $viewBag);  // Cargar la vista de edición
    }
    
    
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errores = [];
            $editorial['codigo_editorial'] = $_POST['codigo_editorial'];
            $editorial['nombre_editorial'] = $_POST['nombre_editorial'];
            $editorial['contacto'] = $_POST['contacto'];
            $editorial['telefono'] = $_POST['telefono'];
    
            // No se valida el codigo, ya que es un campo hidden y se asume que es correcto.
            // if (!isCodigoEditorial($editorial['codigo_editorial'])) {
            //     array_push($errores, "El código debe seguir el formato EDIxxx");
            // }
    
            if (empty($editorial['nombre_editorial'])) {
                array_push($errores, "Debes ingresar el nombre del editorial");
            }
            if (!isText($editorial['contacto'])) {
                array_push($errores, "Contacto erróneo");
            }
            if (!isPhone($editorial['telefono'])) {
                array_push($errores, "El teléfono ingresado no tiene el formato correcto");
            }
    
            if (count($errores) == 0) {
                if ($this->model->update($editorial) != 0) {
                    header('Location: ' . PATH . '/Editoriales');
                } else {
                    array_push($errores, "Error al actualizar el editorial");
                    $viewBag['errores'] = $errores;
                    $viewBag['editorial'] = $editorial;
                    $this->render('edit.php', $viewBag);
                }
            } else {
                $viewBag['errores'] = $errores;
                $viewBag['editorial'] = $editorial;
                $this->render('edit.php', $viewBag);
            }
        }
    }
    
    
    
}
?>