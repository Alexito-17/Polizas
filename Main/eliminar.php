<?php
include_once("conexion.php");
$idPolizas= $_POST["idPolizas"];

$sentencia = $base_de_datos->prepare("DELETE FROM registrodepolizas WHERE idPolizas=:idPolizas;");
$sentencia->bindParam(':idPolizas', $idPolizas);

if($sentencia->execute())
{
return header("Location:inicio.php");
}
else
{
return "error";
}
?>