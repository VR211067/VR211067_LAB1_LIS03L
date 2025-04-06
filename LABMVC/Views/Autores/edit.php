<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <?php include 'Views/cabecera.php'; ?>
</head>
<body>
    <?php include 'Views/menu.php'; ?>
    
    <div class="container mt-4">
        <div class="row">
            <h3>Editar Autor</h3>
        </div>
        <div class="row">
            <div class="col-md-7">

                <?php
                if (isset($errores)) {
                    echo "<div class='alert alert-danger'>";
                    echo "<ul>";
                    foreach ($errores as $error) {
                        echo "<li>$error</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                }
                ?>

                <form role="form" action="<?= PATH ?>/Autores/update" method="POST">
                    <!-- Código del Autor (No editable) -->
                    <input type="hidden" name="codigo_autor" value="<?= $autor['codigo_autor'] ?>">
                    
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código del Autor:</label>
                        <input type="text" class="form-control" id="codigo_autor" value="<?= $autor['codigo_autor'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Autor:</label>
                        <input type="text" class="form-control" name="nombre_autor" id="nombre_autor" placeholder="Ingresa el nombre del autor" value="<?= $autor['nombre_autor'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                        <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Ingresa la nacionalidad del autor" value="<?= $autor['nacionalidad'] ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a class="btn btn-danger" href="<?= PATH ?>/Autores">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
