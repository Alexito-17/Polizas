<?php

require 'conexion.php';
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$pdf = $_POST['pdf'];

$Insertar = "INSERT INTO registrodepolizas VALUES ('$nombre','$fecha','$pdf')";

$query = mysqli_query($Conect, $Insertar);
var_dump($query);
echo $Insertar;
if($query)
{
    echo "correcto";
}else
{
    echo "incorrecto";
}

?>