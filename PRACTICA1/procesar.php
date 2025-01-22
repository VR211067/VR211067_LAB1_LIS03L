<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <?php

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $motivo=$_POST['motivo'];
    $mensaje=$_POST['message'];

 

    
    ?>

     <div class="container">

     <div class="row">
     <h2> Datos Recibidos </h2>
        <table class="table table-bordered">
            

         <!-- (tr>td*2)*5 -->

            <tr>
                <td>Nombre</td>
                <td><?= $nombre ?></td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td> <?= $apellido ?></td>
            </tr>
            <tr>
                <td>Correo</td>
                <td><?= $correo ?></td>
            </tr>
            <tr>
                <td>Motivo</td>
                <td><?= $motivo ?></td>
            </tr>
            <tr>
                <td>Mensaje</td>
                <td><?= $mensaje ?></td>
            </tr>

        </div>
     </div>
     </div>

</body>
</html>