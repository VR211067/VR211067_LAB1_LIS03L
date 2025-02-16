<?php

//distancia entre puntos

function  calcularDistanciaentrePuntos($x0,$y0,$x1=0,$y1=0){

    return round( sqrt(pow($x1-$x0,2)+pow($y1-$y0,2)),2);
}

echo "La distancia del punto(3,5) al origen es ".calcularDistanciaentrePuntos(3,5);
echo "<br/>La distancia del punto (3,5) al (1,1) es ".calcularDistanciaentrePuntos(3,5,1,1);

//media y varianza

function calcularMediaVarianza(...$numeros){
    $n=count($numeros);
    if($n==0){
        return 0;
    }
    else{
       $suma= array_sum($numeros);
       $promedio =$suma/$n;
       $suma_numerador=0;
       foreach($numeros as $num){
        $suma_numerador+= pow($num-$promedio,2);

        }

        $varianza=$suma_numerador/$n;
        return[ 
            "promedio"=> $promedio,
            "varianza"=>$varianza];
    }
}
$resultados = calcularMediaVarianza(10,12,14,16,18);

echo "<br/> El promedio es: ".$resultados["promedio"];
echo "<br/> La varianza es: ".$resultados["varianza"];



function factorialRecursivo($n){

    if($n==1){
        return 1;
    }

    else{
        return $n*factorialRecursivo($n-1);
    }
}

echo "<br/> El factorial de 6 es: ".factorialRecursivo(6);

