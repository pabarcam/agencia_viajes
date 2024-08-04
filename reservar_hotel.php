<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$hotel_id = $_POST['hotel_id'];
$fecha_checkin = $_POST['fecha_checkin'];
$fecha_checkout = $_POST['fecha_checkout'];
$cantidad_personas = $_POST['cantidad_personas'];
$id_usuario = 1; // Supongamos que el usuario está autenticado y tiene un id de 1

// Validaciones básicas
if (empty($hotel_id) || empty($fecha_checkin) || empty($fecha_checkout) || empty($cantidad_personas)) {
    die("Todos los campos son obligatorios.");
}

// Insertar la reserva en la base de datos
$sql = "INSERT INTO reservas (id_usuario, id_hotel, fecha_checkin, fecha_checkout, cantidad_personas, estado) VALUES (?, ?, ?, ?, ?, 'pendiente')";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("iissi", $id_usuario, $hotel_id, $fecha_checkin, $fecha_checkout, $cantidad_personas);

if ($stmt->execute()) {
    echo "Reserva realizada con éxito.";
} else {
    echo "Error al realizar la reserva: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
