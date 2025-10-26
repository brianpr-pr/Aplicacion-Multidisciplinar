<?php

function comprobarDatos($arrDatos){
    $errores = "";
    $resultado = true;
    foreach($arrDatos as $dato){
        if(gettype($dato) === "array"){
            $resultado = $dato[0];
            $errores .= $dato[1];
        }
    }

    return [$resultado, $errores];
}