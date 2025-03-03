<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Datos del empleado</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body class='container'>
<?php
spl_autoload_register(function($className){
    include_once("class/{$className}.class.php");
});
if(isset($_POST['enviar'])){
    echo "<h3>Boleta de pago del empleado</h3>";
    $name = $_POST['nombre'] ?? "";
    $apellido = $_POST['apellido'] ?? "";
    $sueldo = floatval($_POST['sueldo'] ?? 0.0);
    $numHorasExtras = intval($_POST['horasextras'] ?? 0);
    $pagohoraextra = floatval($_POST['pagohoraextra'] ?? 0.0);
    $prestamo = floatval($_POST['prestamo'] ?? 0.0);

    $empleado1 = new empleado();
    $empleado1->obtenerSalarioNeto($name, $apellido, $sueldo, $numHorasExtras, $pagohoraextra, $prestamo);
} else {
?>
<section class="container">
<nav class="navbar navbar-dark bg-primary text-white">
<h1>Formulario empleado</h1>
</nav>
<article>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
 <div class="form-group">
 <label>Nombre empleado:</label>
 <input type="text" name="nombre" class="form-control" />
</div>
 <div class="form-group">
 <label>Apellido empleado:</label>
 <input type="text" name="apellido" class="form-control" />
</div>
 <div class="form-group">
 <label>Sueldo empleado ($):</label>
 <input type="text" name="sueldo" class="form-control" />
</div>
 <div class="form-group">
 <label>Número horas extras:</label>
 <input type="text" name="horasextras" class="form-control" />
</div>
 <div class="form-group">
 <label>Pago por hora extra:</label>
 <input type="text" name="pagohoraextra" class="form-control" />
</div>
 <div class="form-group">
 <label>Descuento por préstamo ($):</label>
 <input type="text" name="prestamo" class="form-control" />
</div>
 <input type="submit" name="enviar" class="btn btn-primary" value="Enviar" />
 <input type="reset" class="btn btn-secondary" value="Restablecer" />
</form>
</article>
</section>
<?php } ?>
</body>
</html>
