<?php
$edades=[10,14,25,96,96.7];//creando arreglo

echo $edades[0]."<br/>";//accediendo a un arreglo

$edades[1]=28;// modificando un elemento
array_push($edades,100);//añadiendo un nuevo elemento
$edades[10]=10;
unset($edades[0]);//eliminando posicion 0
print_r($edades);


echo "<h2>Recorriendo el arreglo</h2>";
foreach($edades as $edad){
    echo "<p>$edad</p>";
}
$tamaño=count($edades);
echo "<p>El tamaño del arreglo es $tamaño</p>";

//ordenando un arreglo
sort($edades);//ordenamos de forma mutable
$edades=array_reverse($edades);//invertimos el orden de forma inmutable
print_r($edades);

$datos_personales=[];
$datos_personales['nombre']="Nemesis";
$datos_personales['apellido']="Valencia";
$datos_personales['estatura']=1.59;
$datos_personales['genero']="Femenino";
print_r($datos_personales);
echo "<h2>Imprimiendo los elementos del arreglo asociativo</h2>";

foreach($datos_personales as $clave=>$dato){

    echo "<p>$clave : $dato</p>";
}

$persona2=[

'nombre'=>"Nemesis",
'apellido'=>"Valencia",
'estatura'=>1.59,
'genero'=>"Femenino"
    
];
print_r($persona2);