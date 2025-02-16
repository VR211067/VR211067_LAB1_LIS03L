<?php
// Función para convertir unidades de longitud
function convertirLongitud($cantidad, $unidad1, $unidad2) {
    // Factores de conversión
    $conversiones = [
        'metros' => 1,
        'yardas' => 1.09361,
        'pies' => 3.28084,
        'varas' => 1.19631
    ];
    
    // Convertir la cantidad a metros
    $cantidadEnMetros = $cantidad / $conversiones[$unidad1];
    
    // Convertir de metros a la unidad destino
    return $cantidadEnMetros * $conversiones[$unidad2];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cantidad = floatval($_POST['cantidad']);
    $unidad1 = $_POST['unidad_origen'];
    $unidad2 = $_POST['unidad_destino'];
    $resultado = convertirLongitud($cantidad, $unidad1, $unidad2);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Unidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0d0d0d, #3b0764, #6a1b9a);
            color: #e1bee7;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
            background: #1c1c1c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
        }
        .btn-primary {
            background-color: #9c27b0;
            border-color: #9c27b0;
        }
        .btn-primary:hover {
            background-color: #7b1fa2;
        }
        .form-control, .form-select {
            background: #2a2a2a;
            color: #e1bee7;
            border: 1px solid #7b1fa2;
        }
        .alert {
            background: #4a148c;
            color: #ffffff;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Conversor de Unidades</h2>
        <form method="post">
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" step="any" name="cantidad" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="unidad_origen" class="form-label">Desde:</label>
                <select name="unidad_origen" class="form-select">
                    <option value="metros">Metros</option>
                    <option value="yardas">Yardas</option>
                    <option value="pies">Pies</option>
                    <option value="varas">Varas</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="unidad_destino" class="form-label">Hasta:</label>
                <select name="unidad_destino" class="form-select">
                    <option value="metros">Metros</option>
                    <option value="yardas">Yardas</option>
                    <option value="pies">Pies</option>
                    <option value="varas">Varas</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Convertir</button>
        </form>
        
        <?php if (isset($resultado)): ?>
            <div class="alert mt-3" role="alert">
                Resultado: <?php echo round($resultado, 4) . " " . $unidad2; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
