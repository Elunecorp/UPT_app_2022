<?php
// C1: Sintaxis PHP C9/24                                <?php  Etiqueta de apertura de PHP.
    // Etiqueta <br> para salto de linea en navegador.
    // $ para variables establecidas , se concatenan con . 
    // Con comillas dobles PHP es capaz de leer incluso las variables que estan dentro de ellas: echo "el nombre del pato es: $pato"
    // Pero si solo se usan comillas simples todo lo que esta dentro se tomara como texto. ''

    // C2: Funciones
    // var_dump();                  |   print_rl();
    // presenta mas informacion     |   presenta menos informacion  
    // Desordenada                  |   Ordenado

    // C3: Variables
    // Diferencia entre constantes y variables.
    // $ -> Significa que inicias una variable.
    // $nombre -> Nombre de la variable 
    // $nombre = Alex -> Valor asignado a la variable. 

# TEST_01 : Utilizacion de la funcion isset en un array y en una funcion if 
$num = 21;
var_dump(isset($num));

# Para la creacion del array tomar en cuenta:
# https://www.php.net/manual/es/language.types.array.php

$arr = array(
        "a" => "Welcome",
        "b" => "to",
        "c" => "GeeksforGeeks"
    );
  
var_dump(isset($arr["a"]));
var_dump(isset($arr["b"]));
var_dump(isset($arr["c"]));
var_dump(isset($arr["Geeks"]));

# Ahora en una funcion if:
if(isset($arr["a"])){                             
    $mensaje='<strong> Isset nos devuelve True </strong>';
    echo $mensaje;
}

# Listo , ahora comprobamos como funcionara el if que implementaremos.
# Recordemos que MAS INFO: https://es.acervolima.com/php-funcion-isset/


# TEST_02 : 

$pato = 12;
$gato = 10;
$animales = $pato + $gato;
echo $animales;
echo "\n";


if(isset($conejo)){
    $evaluacion = "Positivo";
}
else {
    $evaluacion = "Negativo";
}
#echo "\n";
var_dump($evaluacion);

?>












?>