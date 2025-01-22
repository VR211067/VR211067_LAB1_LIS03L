<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $name = "Nemesis";
    $last_name= "Valencia";
    $edad=22;
    echo "Hola $name tiene $edad años <br>";

    echo 'Mi nombre es '. $name .' '. $last_name.'<br>';

    //Coercion de tipos
    $numero=5;
    $numero2="5";
    var_dump( $numero==$numero2);
    var_dump( $numero===$numero2);


    //casting explicito
    $numero3=(int)$numero2;
    var_dump($numero3===$numero);
    ?>
</body>
</html>