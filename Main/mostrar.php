<?php
    $conexion = mysqli_connect("localhost", "root", "yes", "bd_pruebas");
    $consulta = "SELECT * FROM informes";
    $result = mysqli_query($conexion, $consulta);
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mostrar Datos</title>
        <link rel="stylesheet"  type="text/css" href="estilo.css" >
    </head>

    <body>
        
        <?php
        if(!$result)
        {
            echo "Sorry bro no jalo ";
        }else
        {
            echo "<table>";
            echo "<tr>";
            echo "<th> <h1>Id</h1> </th>";
            echo "<th> <h1>Nombre</h1> </th>";
            echo "<th> <h1>Apeido</h1> </th>";
            echo "<th> <h1>Fecha</h1> </th>";
            echo "<th> <h1>PDF</h1> </th>";
            echo "<tr>";
        }
        while ($colum = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td><h2>" . $colum['idinformes']. "</h2></td>";
            echo "<td><h2>" . $colum['nombre']. "</h2></td>";
            echo "<td><h2>" . $colum['apellidos']. "</h2></td>";
            echo "<td><h2>" . $colum['fecha']. "</h2></td>";
            echo "<td><h2>" . $colum['archivo']. "</h2></td>";
            echo "</tr>";
        }

        mysqli_close($conexion);

        //Vamos para atras uwu
        echo "<tr>";
        echo "<td>";
        echo'<a href="indexPrueba.html"> Volver Atrás</a>';
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        ?>
    </body>
</html>