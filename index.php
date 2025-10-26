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
$outputFinanzas = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST['capital'], $_POST['interes'], $_POST['años'] )){
        $_POST['capital'] = validarCapital($_POST['capital']);
        $_POST['interes'] = validarInteres($_POST['interes']);
        $_POST['años'] = validarAños($_POST['años']);

        $validacionResultados = comprobarDatos($_POST);
        
        //Calculo interes compuesto.
        if($validacionResultados[0]){ 
            $outputFinanzas .= getInteresCompuesto($_POST['capital'], $_POST['interes'], $_POST['años']);
        } else{
            $outputFinanzas .= $validacionResultados[1];
        }
    }
}

?>


<body>
    <div id="" class="">
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
    </div>
    <br>
    <h2><?php echo $outputFinanzas;?></h2>
    <br>
</body>
</html>