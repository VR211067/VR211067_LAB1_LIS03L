<?php

require_once 'Controller.php';
require_once 'Models/EditorialesModel.php';

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
}
?>