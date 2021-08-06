<?php
$conexion = mysqli_connect("localhost", "root", "yes", "registrodepolizas");
$nombre = $_POST ["nombre"];
$fechai = $_POST ["fechai"];
$fechav = $_POST ["fechav"];


if($_FILES["archivo"])
{
$nombre_base = basename($_FILES["archivo"]["name"]);
$nombre_final = date("m-d-y"). "-". date("h-i-s"). "-". $nombre_base;
$ruta = "archivos/". $nombre_final;
$subir_archivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
    if($subir_archivo)
    {
        $insertarSQL = "INSERT INTO registrodepolizas(Nombre, Fechai, Fechav, Pdf) VALUES('$nombre', '$fechai', '$fechav', '$ruta')";
        $resultado = mysqli_query($conexion, $insertarSQL);
            if($resultado)
            {
                echo "<script>alert('el informe se ha enviado correctamente'); window.location= 'inicio.php'</script>";
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