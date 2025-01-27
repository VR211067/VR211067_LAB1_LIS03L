<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Conversión</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8d7da;
        }

        .btn-rosa {
            background-color: #e83e8c;
            color: white;
            border: none;
        }

        .btn-rosa:hover {
            background-color: #c2185b;
        }

        table.table-bordered td, table.table-bordered th {
            border: 2px solid #e83e8c;
        }

        .container {
            background-color: #fff3f5;
            border-radius: 8px;
            padding: 30px;
        }

        h2 {
            color: #e83e8c;
        }

        td {
            color: #e83e8c;
        }
    </style>
</head>
<body>
    <?php
       
        if(isset($_POST['cantidad_dolares']) && is_numeric($_POST['cantidad_dolares'])) {
            $cantidad_dolares = $_POST['cantidad_dolares'];

         
            $tasa_cambio = 0.92;  

            
            $cantidad_euros = $cantidad_dolares * $tasa_cambio;
        } else {
            $cantidad_dolares = $cantidad_euros = 0;
        }
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Resultado de Conversión</h2>

        <!-- Tabla resultados -->
        <table class="table table-bordered">
            <tr>
                <td>Cantidad en Dólares</td>
                <td><?= $cantidad_dolares ?> USD</td>
            </tr>
            <tr>
                <td>Equivalente en Euros</td>
                <td><?= number_format($cantidad_euros, 2) ?> EUR</td>
            </tr>
        </table>

        <!-- Botón formulario -->
        <a href="form.html" class="btn btn-rosa">Volver al Formulario</a>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
