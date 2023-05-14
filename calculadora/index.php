<?php 
// Con esta línea desactivamos el reporte de errores y warnings
error_reporting(0);
// Si no se ha pulsado ningún botón reseteamos las variables
if (!isset($_POST['resultado'])) {
    $resultado="";
    $operador="";
}
// Si hemos pulsado algun botón iniciamos la calculadora
if (isset($_POST['resultado'])) {
    // Si lo que se ha enviado es un número lo añadimos a nuestra operación
    if (isset($_POST['numero']) && $_POST['numero'] >= 0) {
        $numero = $_POST['numero'];
        $resultado = $_POST['resultado'] . "$numero"; 
        // con el . concatenamos el valor de $_POST['resultado'] (es decir, 
        // lo que tenemos en la pantalla de la calculadora) con el numero introducido
        $signo = $_POST['signo']; // Mantenemos el signo enviado
    } 
    // Si lo que se ha enviado es un operador lo añadimos a nuestra operación
    if (isset($_POST['operador'])) {
        $resultado = $_POST['resultado'] . $_POST['operador'];
        // con el . concatenamos el valor de $_POST['resultado'] (es decir, 
        // lo que tenemos en la pantalla de la calculadora) con el operador introducido
        $signo = $_POST['operador']; // Guardamos el signo para saber la operación a realizar
    } 
    // Si se ha pulsado = vamos a resolver la operacion
    if (isset($_POST['igual'])) {
        $signo = $_POST['signo']; // Mantenemos el signo enviado
        $resultado = $_POST['resultado']; // Recibimos la operación completa
        $numeros = explode("$signo", $resultado); // Separamos los números de la operación
        // En función del signo aplicamos la operación que corresponda
        switch ($signo) {
            case "+":
                $resultado = $numeros[0] + $numeros[1];
                $signo = "";
                break;
            case "-":
                $resultado = $numeros[0] - $numeros[1];
                $signo = "";
                break;
            case "*":
                $resultado = $numeros[0] * $numeros[1];
                $signo = "";
                break;
            case "/":
                $resultado = $numeros[0] / $numeros[1];
                $signo = "";
                break; 
        }
    }
    // Si se ha pulsado la tecla C, reseteamos todas las variables
    if (isset($_POST['clear'])) {
        $resultado = "";
        $signo = "";
        $operador = "";
        $numeros = "";
    }
}
?> 
<!DOCTYPE html>
<html lang="es">
<head>    
    <title>Calculadora defectuosa</title>
    <link rel="stylesheet" href="css/estilos.css">
    
</head>
<body>   
    
        <form action="#" method="POST">
            <div class="tabla">             
            
                <input class="screen" name="resultado" type="text" value="<?php echo $resultado; ?>">
                <input type="hidden" name="signo" value="<?php echo $signo; ?>">
            <table>        
            <tr>
                <td><button class="button1" name="numero" value="1" type="submit"></button></td>
                <td><button class="button2" name="numero" value="2" type="submit"></button></td>
                <td><button class="button3" name="numero" value="3" type="submit"></button></td>
                <td><button class="buttonmas" name="operador" value="+" type="submit"></button></td>
            </tr>
            <tr>
                <td><button class="button4" name="numero" value="4" type="submit"></button></td>
                <td><button class="button5" name="numero" value="5" type="submit"></button></td>
                <td><button class="button6" name="numero" value="6" type="submit"></button></td>
                <td><button class="buttonmenos" name="operador" value="-" type="submit"></button></td>
            </tr>
            <tr>
                <td><button class="button7" name="numero" value="7" type="submit"></button></td>
                <td><button class="button8" name="numero" value="8" type="submit"></button></td>
                <td><button class="button9" name="numero" value="9" type="submit"></button></td>
                <td><button class="buttonx" name="operador" value="*" type="submit"></button></td>
            </tr>
            <tr>
                <td><button class="buttonc" name="clear" value="clear" type="submit"></button></td>
                <td><button class="button0" name="numero" value="0" type="submit"></button></td>
                <td><button class="buttonigual" name="igual" value="=" type="submit"></button></td>
                <td><button class="buttondividir" name="operador" value="/" type="submit"></button></td>
            </tr>            
            </table>
            </div>    
        </form>
    
    
</body>
</html>