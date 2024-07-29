<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones_disponibles = $_POST['habitaciones_disponibles'];
    $tarifa_noche = $_POST['tarifa_noche'];

    $sql = "INSERT INTO hotel (nombre, ubicación, habitaciones_disponibles, tarifa_noche) 
            VALUES ('$nombre', '$ubicacion', $habitaciones_disponibles, $tarifa_noche)";
    
    if (mysqli_query($conn, $sql)) {
        echo "Hotel agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
