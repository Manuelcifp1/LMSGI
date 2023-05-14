<?php 

// Leer el JSON de un archivo
$json = file_get_contents('superheroes.json');

// Decodificar el JSON en un array asociativo
$jsonDecode = json_decode($json, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo JSON tabla</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body class="marvel_logo">
    <header>
        <img style="width: 200px" src="https://logos-world.net/wp-content/uploads/2020/12/Marvel-Entertainment-Logo-2006.png" alt="">
    </header>    
        <table>
            <tr>
                <th></th>
                <th>nombre</th>
                <th>alter ego</th>
                <th>grupo</th>
                <th>imagen</th>
            </tr>
            <?php
                $numeroPersonaje = 1;
                foreach ($jsonDecode['superheroes'] as $personaje) {
                    $imagen = $personaje['imagen'];
                    echo "<tr>";
                    echo "<td>Personaje {$numeroPersonaje}</td>";
                    echo "<td>{$personaje['nombre']}</td>";
                    echo "<td>{$personaje['alter ego']}</td>";
                    echo "<td>{$personaje['grupo']}</td>";
                    echo "<td><img style='width: 75px;' src=\"$imagen\" alt=\"{$personaje['nombre']}\" /></td>";
                    echo "</tr>\n";
                    $numeroPersonaje++;
                }
                ?>
            </table>
        </body>
        </html>