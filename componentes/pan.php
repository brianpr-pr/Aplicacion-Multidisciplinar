<?php
//Hacer validación para el pan.
function validarCantidadPan($panFresco, $panAntiguo){
    $resultado = []; 
    $errores = "";
    if(!is_numeric($panFresco)){
        $errores .= "<br>Error: La cantidad de pan de otro día ingresada tiene que ser un número.<br>";
    }

    $panFresco = intval($panFresco);

    if(gettype($panFresco) !== "integer"){
        $errores .= "<br>Error: La cantidad de pan de otro día ingresada tiene que ser un número.<br>";
    }

    if($panFresco < 0){
        $errores .= "<br>Error: La cantidad de pan de otro día ingresada tiene que ser un número mayor o igual a 0.<br>";
    }


    if(!is_numeric($panAntiguo)){
        $errores .= "<br>Error: La cantidad de pan de otro día ingresada tiene que ser un número.<br>";
    }

    $panAntiguo = intval($panAntiguo);

    if(gettype($panAntiguo) !== "integer"){
        $errores .= "<br>Error: La cantidad de pan de otro día ingresada tiene que ser un número.<br>";
    }

    if($panAntiguo < 0){
        $errores .= "<br>Error: La cantidad de pan de otro día ingresada tiene que ser un número mayor o igual a 0.<br>";
    }

    //Compruebo que al menos compre un pan de un tipo.
    if( $panFresco === 0 && $panAntiguo === 0){
        $errores = "<br>La cantidad de panes frescos y de otro día no pueder ser 0, aumente el numero de panes frescos o de panes de otro día.<br>";
    }

    if($errores === ""){
        return [$panFresco,$panAntiguo];
    } else{
        return [false,$errores];
    }
}

function resultadoCompra($panFresco, $panAntiguo){
    $total = ($panFresco + $panAntiguo) * 3.49;
    $total = round($total,2);
    $descuento = $panAntiguo * 3.49 * 0.60;
    $descuento = round($descuento, 2);
    $subtotal = $total - $descuento;
    $subtotal = round($subtotal, 2);
    return "Cantidad total: {$total}<br>
    Descuento del 60% sobre las {$panAntiguo}/U compradas: -{$descuento}<br> 
    Subtotal: {$subtotal}";
}