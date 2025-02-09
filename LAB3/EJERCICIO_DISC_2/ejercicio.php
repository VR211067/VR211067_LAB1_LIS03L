<?php
session_start();


if (!isset($_SESSION['estudiantes'])) {
    $_SESSION['estudiantes'] = [];
}

// calcular el promedio 
function calcularPromedio($tarea, $investigacion, $examen) {
    $promedio = ($tarea * 0.50) + ($investigacion * 0.30) + ($examen * 0.20);
    return $promedio;
}

// agregar un estudiante
if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $tarea = $_POST['tarea'];
    $investigacion = $_POST['investigacion'];
    $examen = $_POST['examen'];

    // Verificar que las notas estén entre 0 y 10
    if ($tarea < 0 || $tarea > 10 || $investigacion < 0 || $investigacion > 10 || $examen < 0 || $examen > 10) {
        echo "Las notas deben estar entre 0 y 10.";
    } else {
        $_SESSION['estudiantes'][] = ['nombre' => $nombre, 'tarea' => $tarea, 'investigacion' => $investigacion, 'examen' => $examen];
    }
}

// modificar estudiante
if (isset($_POST['modificar'])) {
    $indice = $_POST['indice'];
    $nombre = $_POST['nombre'];
    $tarea = $_POST['tarea'];
    $investigacion = $_POST['investigacion'];
    $examen = $_POST['examen'];

    // verificar que las notas estén entre 0 y 10
    if ($tarea < 0 || $tarea > 10 || $investigacion < 0 || $investigacion > 10 || $examen < 0 || $examen > 10) {
        echo "Las notas deben estar entre 0 y 10.";
    } else {
        $_SESSION['estudiantes'][$indice] = ['nombre' => $nombre, 'tarea' => $tarea, 'investigacion' => $investigacion, 'examen' => $examen];
    }
}


//  eliminar estudiante
if (isset($_POST['eliminar'])) {
    $indice = $_POST['indice'];
    unset($_SESSION['estudiantes'][$indice]);
    $_SESSION['estudiantes'] = array_values($_SESSION['estudiantes']); // Reindexar el array
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Notas de Estudiantes</title>
    <link rel="stylesheet" href="css/diseño.css">
</head>
<body>


    <table>
        <caption>Notas Promediadas de Estudiantes</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tarea</th>
                <th>Investigación</th>
                <th>Examen Parcial</th>
                <th>Promedio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['estudiantes'] as $indice => $estudiante): 
                $promedio = calcularPromedio($estudiante['tarea'], $estudiante['investigacion'], $estudiante['examen']); ?>
                <tr>
                    <td><?php echo $estudiante['nombre']; ?></td>
                    <td><?php echo $estudiante['tarea']; ?></td>
                    <td><?php echo $estudiante['investigacion']; ?></td>
                    <td><?php echo $estudiante['examen']; ?></td>
                    <td class="promedio"><?php echo number_format($promedio, 2); ?></td>
                    <td>
                       
                        <button class="btn" onclick="openModalModificar(<?php echo $indice; ?>)">Modificar</button>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                            <button type="submit" name="eliminar" class="btn">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal agregar estudiante -->
    <div id="modalAgregar" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalAgregar')">&times;</span>
            <h2>Agregar Estudiante</h2>
            <form method="post">
                <input type="text" name="nombre" placeholder="Nombre del estudiante" required><br>
                <input type="number" name="tarea" placeholder="Nota de Tarea" min="0" max="10" step="0.1" required><br>
                <input type="number" name="investigacion" placeholder="Nota de Investigación" min="0" max="10" step="0.1" required><br>
                <input type="number" name="examen" placeholder="Nota de Examen Parcial" min="0" max="10" step="0.1" required><br>
                <button type="submit" name="agregar" class="btn">Agregar Estudiante</button>
            </form>

        </div>
    </div>

    <!-- Modal modificar estudiante -->
    <div id="modalModificar" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalModificar')">&times;</span>
            <h2>Modificar Estudiante</h2>
            <form id="formModificar" method="post">
                <input type="hidden" name="indice" id="indiceModificar">
                <input type="text" name="nombre" id="nombreModificar" placeholder="Nombre del estudiante" required><br>
                <input type="number" name="tarea" id="tareaModificar" placeholder="Nota de Tarea" min="0" max="10" step="0.1" required><br>
                <input type="number" name="investigacion" id="investigacionModificar" placeholder="Nota de Investigación" min="0" max="10" step="0.1" required><br>
                <input type="number" name="examen" id="examenModificar" placeholder="Nota de Examen Parcial" min="0" max="10" step="0.1" required><br>
                <button type="submit" name="modificar" class="btn">Modificar Estudiante</button>
            </form>

        </div>
    </div>

    <!-- Botón  modal de agregar -->
    <div style="text-align: center; margin-top: 20px;">
        <button class="btn" onclick="openModal('modalAgregar')">Agregar Estudiante</button>
    </div>

    <script>
      
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

       
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        
        function openModalModificar(indice) {
          
            var estudiantes = <?php echo json_encode($_SESSION['estudiantes']); ?>;
            var estudiante = estudiantes[indice];

            
            document.getElementById('indiceModificar').value = indice;
            document.getElementById('nombreModificar').value = estudiante.nombre;
            document.getElementById('tareaModificar').value = estudiante.tarea;
            document.getElementById('investigacionModificar').value = estudiante.investigacion;
            document.getElementById('examenModificar').value = estudiante.examen;

            
            openModal('modalModificar');
        }
    </script>

</body>
</html>
