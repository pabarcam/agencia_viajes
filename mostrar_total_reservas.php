<?php
include 'conexion.php';

$sql = "SELECT reserva.id_reserva, reserva.id_cliente, reserva.fecha_reserva, 
               vuelo.origen AS vuelo_origen, vuelo.destino AS vuelo_destino, vuelo.fecha AS vuelo_fecha,
               hotel.nombre AS hotel_nombre, HOTEL.ubicación AS hotel_ubicacion
        FROM reserva
        LEFT JOIN vuelo ON reserva.id_vuelo = vuelo.id_vuelo
        LEFT JOIN hotel ON reserva.id_hotel = hotel.id_hotel";

$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Listado de Reservas</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Reserva</th>
                <th>ID Cliente</th>
                <th>Fecha Reserva</th>
                <th>Origen del Vuelo</th>
                <th>Destino del Vuelo</th>
                <th>Fecha del Vuelo</th>
                <th>Nombre del Hotel</th>
                <th>Ubicación del Hotel</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id_reserva"] . "</td>";
        echo "<td>" . $row["id_cliente"] . "</td>";
        echo "<td>" . $row["fecha_reserva"] . "</td>";
        echo "<td>" . $row["vuelo_origen"] . "</td>";
        echo "<td>" . $row["vuelo_destino"] . "</td>";
        echo "<td>" . $row["vuelo_fecha"] . "</td>";
        echo "<td>" . $row["hotel_nombre"] . "</td>";
        echo "<td>" . $row["hotel_ubicacion"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron reservas.";
}

mysqli_free_result($result);

mysqli_close($conn);
?>