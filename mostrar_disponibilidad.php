<?php
include 'conexion.php';

$sql_vuelos = "SELECT * FROM VUELO";
$sql_hoteles = "SELECT * FROM HOTEL";

$result_vuelos = mysqli_query($conn, $sql_vuelos);
$result_hoteles = mysqli_query($conn, $sql_hoteles);

echo "<h2>Disponibilidad de Vuelos</h2>";
if (mysqli_num_rows($result_vuelos) > 0) {
    while ($row = mysqli_fetch_assoc($result_vuelos)) {
        echo "Vuelo ID: " . $row["id_vuelo"]. " - Origen: " . $row["origen"]. " - Destino: " . $row["destino"]. " - Fecha: " . $row["fecha"]. " - Plazas Disponibles: " . $row["plazas_disponibles"]. " - Precio: " . $row["precio"]. "<br>";
    }
} else {
    echo "0 resultados";
}

echo "<h2>Disponibilidad de Hoteles</h2>";
if (mysqli_num_rows($result_hoteles) > 0) {
    while ($row = mysqli_fetch_assoc($result_hoteles)) {
        echo "Hotel ID: " . $row["id_hotel"]. " - Nombre: " . $row["nombre"]. " - Ubicación: " . $row["ubicación"]. " - Habitaciones Disponibles: " . $row["habitaciones_disponibles"]. " - Tarifa por Noche: " . $row["tarifa_noche"]. "<br>";
    }
} else {
    echo "0 resultados";
}
mysqli_close($conn);
?>
