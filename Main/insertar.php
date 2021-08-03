<?php
$conexion = mysqli_connect("localhost", "root", "yes", "bd_pruebas");
$nombre = $_POST ["nombre"];
$apellido = $_POST ["apellido"];
$fecha = $_POST ["fecha"];

if($_FILES["archivos"])
{
$nombre_base = basename($_FILES["archivo"]["name"]);
$nombre_final = date("m-d-y"). "-". date("h-i-s"). "-". $nombre_base;
$ruta = "archivos/". $nombre_final;
$subir_archivo = move_uploaded_file($_FILES["archivo"]["tmp_nom"], $ruta);
    if($subir_archivo)
    {
        $insertarSQL = "INSERT INTO informes(nombre, apellidos, fecha, archivo) VALUES('$nombre', '$apellido', '$fecha', '$ruta')";
        $resultado = mysqli_query($conexion, $insertarSQL);
            if($resultado)
            {
                echo "<script>alert('el informe se ha enviado correctamente'); window.location= 'indexPrueba.html'</script>";
            }else
            {
                printf("Errormessage: %s\n", mysqli_error($conexion));
            }   
    }
    else
    {
        echo "Error al subir el archivo";
    }
}
?>