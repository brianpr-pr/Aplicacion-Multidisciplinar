<?php
function validarTelefono($telefono){
    if(gettype($telefono) !== "string"){
        return [false, "Error: Formato de datos enviados incorrectos"];
    }

    if(!preg_match("/^[0-9]{2,2}-[0-9]{9,9}-[0-9]{2,2}$/", $telefono)){
        return [false, "Error: Formato de datos invalidos solo se admite: NN-NNNNNNNNN-NN"];
    }
    return $telefono;
}

function resultadoTelefono($telefono){
    $telefono = explode("-",$telefono);
    return "Número de telefono sin extensiones: [{$telefono[1]}]";
}