<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $plazas_disponibles = $_POST['plazas_disponibles'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) 
            VALUES ('$origen', '$destino', '$fecha', $plazas_disponibles, $precio)";
    
    if (mysqli_query($conn, $sql)) {
        echo "Vuelo agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
