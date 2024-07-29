<?php
include 'conexion.php';

for ($i = 1; $i <= 10; $i++) {
    $id_cliente = $i;
    $fecha_reserva = date("Y-m-d");
    $id_vuelo = rand(1, 3);
    $id_hotel = rand(1, 3);
    $sql_reserva = "INSERT INTO reserva (id_cliente, fecha_reserva, id_vuelo, id_hotel) 
                    VALUES ($id_cliente, '$fecha_reserva', $id_vuelo, $id_hotel)";
    
    if (mysqli_query($conn, $sql_reserva)) {
        echo "Reserva $i agregada exitosamente<br>";
    } else {
        echo "Error: " . $sql_reserva . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>