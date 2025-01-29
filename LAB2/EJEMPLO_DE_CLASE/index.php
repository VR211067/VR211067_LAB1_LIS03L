<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculadora de CUM</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

           
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
       
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
         
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    </head>
<body>



<div class="container">
    <h1 class="page-header text-center">Calculadora de CUM</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar materia</a>
            
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Uv</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php

                    $materias=simplexml_load_file('materias.xml');
                    //var_dump($materias);
                    $cum=0;
                    $numerador=0;
                    $denominador=0;


                    foreach($materias->materia as $materia){
                        $numerador+=$materia->nota*$materia->uvs; 
                        $denominador+=$materia->uvs;

                    
                    ?>
            
                <tr>
                    <td><?= $materia->codigo  ?></td>
                    <td><?= $materia->nombre ?></td>
                    <td><?= $materia->uvs  ?></td>
                    <td><?= $materia->nota  ?></td>
                    <td>
                    
                        <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#editModal" onclick="editarMateria('<?= $materia->codigo ?>', '<?= $materia->nombre ?>', '<?= $materia->uvs ?>', '<?= $materia->nota ?>')">Editar</a>
                        <a href="borrar.php?codigo=<?=$materia->codigo?>" class="btn btn-danger">Borrar</a>
                   

                    </td>
                </tr>

                <?php

               
                
                    }
                ?>
                <script>
                    function editarMateria(codigo, nombre, uvs, nota) {
                        
                        document.getElementById('editCodigo').value = codigo;
                        document.getElementById('editNombre').value = nombre;
                        document.getElementById('editUvs').value = uvs;
                        document.getElementById('editNota').value = nota;
                    }
                </script>


                
                </tbody>
            </table>


            
            <?php

                if($denominador!= 0){
                    $cum=round($numerador/$denominador,2);
                    echo"<h2>CUM: $cum</h2>";
                }
            ?>
         
        </div>


        <!-- Editar Materia -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Materia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="editar.php" method="POST">
                            <input type="hidden" name="codigo" id="editCodigo">
                            
                            <div class="form-group">
                                <label for="editNombre">Nombre de la Materia:</label>
                                <input type="text" name="nombre" id="editNombre" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="editUvs">UVs:</label>
                                <input type="number" name="uvs" id="editUvs" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="editNota">Nota:</label>
                                <input type="number" name="nota" id="editNota" class="form-control" step="0.01" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


        <?php
              include_once('nueva_modal.php');
              if(isset($_GET[ 'exito']))
              {

              
        ?>
        <script>

        alertify.success('materia agregada exitosamente');
        </script>

        <?php
              }
        ?>

        <?php
        if (isset($_GET['editado'])) {
            echo "<script>alertify.success('Materia editada exitosamente');</script>";
        }
        ?>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>