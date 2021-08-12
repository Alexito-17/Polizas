<?php
include("conexion.php");
$idPolizas= $_POST["idPolizas"];

$sentencia = "DELETE FROM registrodepolizas WHERE idPolizas=".$idPolizas.";";

$result = mysqli_query($Conect, $sentencia);
if($result)
{
  echo "<script>alert('La poliza fue eliminada con exito'); window.location= 'indexPrueba.html'</script>";
}else
{
  echo "No jalo";
}

?>