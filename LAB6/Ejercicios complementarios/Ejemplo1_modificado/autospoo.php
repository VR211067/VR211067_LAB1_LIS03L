<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
crossorigin="anonymous">
 <title>Venta de autos</title>
</head>
<body>
<div class="container">
<header class="my-4">
 <h1>Autos disponibles</h1>
</header>

<?php
spl_autoload_register(function($class){
 if (is_file("class/{$class}.class.php")){
 include_once("class/{$class}.class.php");
 } else {
 die("class/{$class}.class.php No existe en el proyecto");
 }
});

// Crear los autos
$movil = [
 new auto("Peugeot", "307", "Gris", "img/peugeot.jpg"),
 new auto("Renault", "Clio", "Rojo", "img/renaultclio.jpg"),
 new auto("BMW", "X3", "Negro", "img/bmwserie6.jpg"),
 new auto("Toyota", "Avalon", "Blanco", "img/toyota.jpg"),
 new auto()
];

// Obtener la marca seleccionada si existe
$marcaSeleccionada = $_POST['marca'] ?? '';
?>

<!-- Formulario para seleccionar auto -->
<form method="post" class="mb-4">
 <div class="form-group">
 <label for="marca">Seleccione la marca del auto:</label>
 <select name="marca" id="marca" class="form-control">
   <option value="">-- Seleccionar --</option>
   <?php
   foreach ($movil as $auto) {
     $marca = $auto->getMarca();
     $selected = ($marca == $marcaSeleccionada) ? 'selected' : '';
     echo "<option value='$marca' $selected>$marca</option>";
   }
   ?>
 </select>
 </div>
 <button type="submit" class="btn btn-primary">Mostrar Auto</button>
</form>

<div class="row">
<?php
// Mostrar solo el auto seleccionado
if ($marcaSeleccionada) {
 foreach ($movil as $auto) {
   if ($auto->getMarca() == $marcaSeleccionada) {
     $auto->mostrar();
     break;
   }
 }
}
?>
</div>

</div>
</body>
</html>
