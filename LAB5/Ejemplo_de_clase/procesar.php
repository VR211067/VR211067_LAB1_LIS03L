<?php
include 'validaciones.php';

session_start();

if(!empty($_POST)){
    $errores=[];
    extract($_POST);
    
    
    $nombres=$_POST['nombres']??'';

   if(empty(trim($nombres))){
    array_push($errores, "se debe ingresar el nombre");
   }
   else if(!isText(trim($nombres))){

    array_push($errores,"El nombre ingresado es incorrecto");
   }




   if(empty(trim($apellidos))){
    array_push($errores, "se debe ingresar los apellidos");
   }
   else if(!isText(trim($apellidos))){

    array_push($errores,"El apellido ingresado es incorrecto");
   }




   if(empty(trim($carnet))){
    array_push($errores, "se debe ingresar el carnet");
   }
   else if(!isCarnet(trim($carnet))){

    array_push($errores,"El carnet ingresado es incorrecto");
   }



   if(empty(trim($telefono))){
    array_push($errores, "se debe ingresar el teléfono");
   }
   else if(!isPhone(trim($telefono))){

    array_push($errores,"El teléfono ingresado es incorrecto");
   }


   if(empty(trim($correo))){
    array_push($errores, "se debe ingresar el correo");
   }
   else if(!isMail(trim($correo))){

    array_push($errores,"Formato de correo erróneo");
   }

   if(empty($errores)){

    echo "<h1> Usuario registrado exitosamete</h1>";

   }
   else {
    $_SESSION['errores']=$errores;
    $_SESSION['datos']=[ 'nombres'=>$nombres,
                         'apellidos'=>$apellidos,
                         'telefono'=>$telefono,
                         'correo'=>$correo,
                         'carnet'=>$carnet];
    header('Location:index.php');



   }
 // var_dump($errores);

   //print_r($errores);


}