<?php

require 'almacen.php';
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$pdf = $_POST['pdf'];

$Insertar = "INSERT INTO registro VALUES ('$nombre','$fecha','$pdf')";

$query = mysqli_connect($Conect, $Insertar);

if($query)
{
    echo "correcto";
}else
{
    echo "incorrecto";
}

?>