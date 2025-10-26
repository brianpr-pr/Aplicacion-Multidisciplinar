<?php
function validarFecha($fecha){
    if(gettype($fecha) !== "string"){
        return [false, "Error: Formato de datos enviados incorrectos"];
    }

    if(!preg_match("/^[0-9]{4,4}-[0-9]{2,2}-[0-9]{2,2}$/", $fecha)){
        return [false, "Error: Formato de datos invalidos solo se admite: YYYY-mm-dd"];
    }

    $fecha = explode("-",$fecha);

    foreach($fecha as &$elemento){
        if(is_numeric($elemento)){
            $elemento = intval($elemento);
        }
    }   

    if($fecha[0] < 1000){
        return [false, "No se admiten años de nacimiento anteriores a el año 1000 D.C"];
    }

    if($fecha[0] > 9999){
        return [false, "No se admiten años de nacimiento posteriores a el año 9999 D.C"];
    }

    if($fecha[1] < 1){
        return [false, "No se admiten meses de nacimiento anteriores a Enero"];
    }

    if($fecha[1] > 12){
        return [false, "No se admiten meses de nacimiento posteriores a Diciembre"];
    }

    if($fecha[2] < 1){
        return [false, "No se admiten dias de nacimiento inferiores a 1"];
    }

    if(in_array($fecha[1], [1,3,5,7,8,10,12])){
        if($fecha[2] > 31){
            return [false, "No se admiten dias de nacimiento superiores a 31"];
        }
    }

    if(in_array($fecha[1], [2])){
        if($fecha[2] > 29){
            return [false, "No se admiten dias de nacimiento superiores a 29"];
        }
    }

    if(in_array($fecha[1], [4,6,9,11])){
        if($fecha[2] > 30){
            return [false, "No se admiten dias de nacimiento superiores a 30"];
        }
    }

    $fechaValidada = "";

    for($i = 0; $i < count($fecha); $i++){
        $fechaValidada .= $fecha[$i];
        if($i < (count($fecha) - 1) ){
            $fechaValidada .= "-";
        }
    }

    return $fechaValidada;
}

function resultadoFecha($fecha){
    $mayoriaEdad = date("Y-m-d", strtotime('-18 year'));
    if($fecha <= $mayoriaEdad){
        return "Usted es mayor de edad.";
    } else{
        return "Usted es menor de edad.";
    }
}