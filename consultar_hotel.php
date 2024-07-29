<?php
include 'conexion.php';

$sql = "SELECT * FROM hotel";

$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Listado de Hoteles</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Hotel</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Habitaciones Disponibles</th>
                <th>Tarifa por Noche</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id_hotel"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["ubicación"] . "</td>";
        echo "<td>" . $row["habitaciones_disponibles"] . "</td>";
        echo "<td>" . $row["tarifa_noche"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron hoteles.";
}

mysqli_free_result($result);

mysqli_close($conn);
?>
