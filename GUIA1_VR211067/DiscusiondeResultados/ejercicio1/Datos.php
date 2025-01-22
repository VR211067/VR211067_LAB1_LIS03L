<?php
// MIS DATOS
$nombre_completo = "Némesis Alejandra Valencia Rivera";
$lugar_nacimiento = "San Salvador, El Salvador";
$edad = 22;
$carnet_universidad = "VR211067";


echo "<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 2px solid #e83e8c;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f8d7da;
        color: #e83e8c;
    }
    td {
        background-color: #fff3f5;
    }
</style>";

echo "<table>";
echo "<tr><th colspan='2' style='text-align: center;'>MIS DATOS</th></tr>";
echo "<tr><td>Nombre Completo</td><td>$nombre_completo</td></tr>";
echo "<tr><td>Lugar de Nacimiento</td><td>$lugar_nacimiento</td></tr>";
echo "<tr><td>Edad</td><td>$edad</td></tr>";
echo "<tr><td>Carnet de la Universidad</td><td>$carnet_universidad</td></tr>";
echo "</table>";
?>

