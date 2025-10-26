<?php
include "./componentes/datosFinancieros.php";
include "./componentes/utilidades.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>


<?php
$outputCapitalInvertir = "";
$outputCuentaAhorros = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST['capital'], $_POST['interes'], $_POST['años'] )){
        $_POST['capital'] = validarCapital($_POST['capital']);
        $_POST['interes'] = validarInteres($_POST['interes']);
        $_POST['años'] = validarAños($_POST['años']);

        $validacionResultados = comprobarDatos($_POST);
        
        //Calculo interes compuesto.
        if($validacionResultados[0]){ 
            $outputCapitalInvertir .= getInteresCompuesto($_POST['capital'], $_POST['interes'], $_POST['años']);
        } else{
            $outputCapitalInvertir .= $validacionResultados[1];
        }
    }

    if(isset($_POST['capitalCuentaAhorro'], $_POST['interesCuentaAhorro'], $_POST['añosCuentaAhorro'] )){
        $_POST['capitalCuentaAhorro'] = validarCapital($_POST['capitalCuentaAhorro']);
        $_POST['interesCuentaAhorro'] = validarInteres($_POST['interesCuentaAhorro']);
        $_POST['añosCuentaAhorro'] = validarAños($_POST['añosCuentaAhorro']);

        $validacionResultados = comprobarDatos($_POST);
        
        //Calculo interes compuesto.
        if($validacionResultados[0]){ 
            $outputCuentaAhorros .= getInteresesCuentaAhorro($_POST['capitalCuentaAhorro'], $_POST['interesCuentaAhorro'], $_POST['añosCuentaAhorro']);
        } else{
            $outputCuentaAhorros .= $validacionResultados[1];
        }
    }
}

?>


<body>
    <div id="" class="div-app">
        <h1>Invertir capital.</h1>
        <form method="POST">
            <label for="capital" id="" class="">Ingrese la cantidad a invertir.</label>
            <input type="number" id="capital" class="" name="capital"/>

            <label for="interes" id="" class="">Ingrese el interes anual.</label>
            <input type="number" id="interes" class="" name="interes"/>

            <label for="años" id="" class="">Ingrese la cantidad de años.</label>
            <input type="number" id="años" class="" name="años"/>

            <button type="submit" id="" class="">Enviar</button>
            <button type="reset" id="" class="">Cancelar</button>
        </form>
        <br>
        <h2><?php echo $outputCapitalInvertir;?></h2>
    </div>
    <br>

    <div class="div-app">
        <h1>Cuenta de ahorros.</h1>
        <form method="POST">
            <label for="capitalCuentaAhorro" id="" class="">Ingrese la cantidad a invertir.</label>
            <input type="number" id="capitalCuentaAhorro" class="" name="capitalCuentaAhorro"/>

            <label for="interesCuentaAhorro" id="" class="">Ingrese el interes anual.</label>
            <input type="number" id="interesCuentaAhorro" class="" name="interesCuentaAhorro"/>

            <label for="añosCuentaAhorro" id="" class="">Ingrese la cantidad de años.</label>
            <input type="number" id="añosCuentaAhorro" class="" name="añosCuentaAhorro"/>

            <button type="submit" id="" class="">Enviar</button>
            <button type="reset" id="" class="">Cancelar</button>
        </form>
        <br>
        <h2><?php echo $outputCuentaAhorros;?></h2>
    </div>

</body>
</html>