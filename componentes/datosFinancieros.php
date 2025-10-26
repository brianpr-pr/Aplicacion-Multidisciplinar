<?php
function validarCapital($cantidad){
    if(!is_numeric($cantidad)){
        return [false, "<br>Error: El capital tiene que ser un número.<br>"];
    }

    $cantidad = floatval($cantidad);

    if(gettype($cantidad) !== "double"){
        return [false, "<br>Error: El capital tiene que ser un número.<br>"];
    }

    if($cantidad <= 0){
        return [false, "<br>Error: El capital tiene que ser un número mayor a 0.<br>"];
    }

    return $cantidad;
}

function validarInteres($cantidad){
    if(!is_numeric($cantidad)){
        return [false, "<br>Error: El interes tiene que ser un número.<br>"];
    }

    $cantidad = floatval($cantidad);

    if(gettype($cantidad) !== "double"){
        return [false, "<br>Error: El interes tiene que ser un número.<br>"];
    }

    if($cantidad <= 0){
        return [false, "<br>Error: El interes tiene que ser un número mayor a 0.<br>"];
    }

    return $cantidad;
}

function validarAños($años){
    if(!is_numeric($años)){
        return [false, "<br>Error: La cantidad de años ingresada tiene que ser un número.<br>"];
    }

    $años = intval($años);

    if(gettype($años) !== "integer"){
        return [false, "<br>Error: La cantidad de años ingresada tiene que ser un número.<br>"];
    }

    if($años <= 0){
        return [false, "<br>Error: La cantidad de años ingresada tiene que ser un número mayor a 0.<br>"];
    }
    return $años;
}


function getInteresCompuesto($capitalInicial, $interesCompuesto, $numeroAños){
    for($i=0; $i<$numeroAños; $i++){
        $capitalInicial += $capitalInicial / 100 * $interesCompuesto;
    }
    return $capitalInicial;
}

function getInteresesCuentaAhorro($capitalInicial, $interesCompuesto, $numeroAños){
    $resultado = "Año 0: {$capitalInicial}<br>";
    for($i=1; $i<=$numeroAños; $i++){
        $capitalInicial += $capitalInicial / 100 * $interesCompuesto;
        $resultado .= "Año {$i}: {$capitalInicial}<br>";
    }
    return $resultado;
}