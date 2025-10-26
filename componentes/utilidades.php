<?php

function comprobarDatos($arrDatos){
    $errores = "";
    $resultado = true;
    foreach($_POST as $dato){
        if(gettype($dato) === "array"){
            $resultado = $dato[0];
            $errores .= $dato[1];
        }
    }

    return [$resultado, $errores];
}