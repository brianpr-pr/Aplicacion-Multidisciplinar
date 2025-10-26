<?php
/* (iguales, mínimo 10 caracteres, con mayusculas y minusculas, 
algun numero y algun simbolo), 
imprima por pantalla si las contraseñas introducidas por 
el usuario coinciden y cumplen las caracteristicas.*/

function validarContraseñas($contraseña, $contraseñaRepetida){
    $respuesta = "";

    if($contraseña !== $contraseñaRepetida){
        $respuesta .= "<br>Las contraseñas deben de ser iguales.<br>";
    }

    if(strlen($contraseña) < 10 
    || strlen($contraseñaRepetida) < 10){
        $respuesta .= "<br>Las contraseña debe de tener minimo 10 caracteres<br>";
    }

    if(!preg_match("/[a-z]{1,}/", $contraseña) 
        || !preg_match("/[a-z]{1,}/", $contraseñaRepetida) ){
        $respuesta .= "<br>Las contraseña debe de tener letras minusculas<br>";
    }

    if(!preg_match("/[A-Z]{1,}/", $contraseña) 
        || !preg_match("/[A-Z]{1,}/", $contraseñaRepetida) ){
        $respuesta .= "<br>Las contraseña debe de tener letras mayusculas<br>";
    }
    
    if(!preg_match("/[0-9]{1,}/", $contraseña) 
        || !preg_match("/[0-9]{1,}/", $contraseñaRepetida) ){
        $respuesta .= "<br>Las contraseña debe de tener números<br>";
    }

    if(!preg_match("/[-_*?.]{1,}/", $contraseña) 
        || !preg_match("/[-_*?.]{1,}/", $contraseñaRepetida) ){
        $respuesta .= "<br>Las contraseñas deben de tener alguno de los caracteres especiales: '_' '-' '*' '?' '.'<br>";
    }

    if($respuesta === ""){
        $respuesta .= "Contraseñas son validas";
    }

    return $respuesta;
}