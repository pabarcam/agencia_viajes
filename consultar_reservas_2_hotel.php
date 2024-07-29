<?php
include 'conexion.php';

$sql_avanzada = "SELECT HOTEL.nombre, COUNT(RESERVA.id_reserva) AS total_reservas 
                 FROM RESERVA 
                 JOIN HOTEL ON RESERVA.id_hotel = HOTEL.id_hotel 
                 GROUP BY HOTEL.id_hotel 
                 HAVING total_reservas > 2";

$result_avanzada = mysqli_query($conn, $sql_avanzada);

if (mysqli_num_rows($result_avanzada) > 0) {
    echo "<h2>Hoteles con más de 2 reservas</h2>";
    echo "<table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Total Reservas</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result_avanzada)) {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["total_reservas"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No hay hoteles con más de 2 reservas";
}

mysqli_close($conn);
?>