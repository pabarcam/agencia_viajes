<?php
include 'conexion.php';

$sql = "SELECT * FROM vuelo";

$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Listado de Vuelos</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Vuelo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Plazas Disponibles</th>
                <th>Precio</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id_vuelo"] . "</td>";
        echo "<td>" . $row["origen"] . "</td>";
        echo "<td>" . $row["destino"] . "</td>";
        echo "<td>" . $row["fecha"] . "</td>";
        echo "<td>" . $row["plazas_disponibles"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron vuelos.";
}

mysqli_free_result($result);

mysqli_close($conn);
?>