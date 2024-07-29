<?php

function validarFecha($fecha) {
    $d = DateTime::createFromFormat('Y-m-d', $fecha);
    return $d && $d->format('Y-m-d') === $fecha;
}

function validarCiudad($ciudad) {
    return !empty($ciudad) && ctype_alpha(str_replace(' ', '', $ciudad));
}

function buscarVuelos($origen, $destino, $fecha) {
    if (!validarCiudad($origen) || !validarCiudad($destino)) {
        echo "Error: Ciudad de origen o destino no válida.<br>";
        return;
    }
    if (!validarFecha($fecha)) {
        echo "Error: Fecha no válida. Usa el formato YYYY-MM-DD.<br>";
        return;
    }
    echo "Buscando vuelos de $origen a $destino para la fecha $fecha.<br>";
}

// Ejemplo de uso
buscar_vuelos("Punta Arenas", "Santiago", "2024-08-12");
buscar_vuelos("Santiago", "Tokio", "2024-09-10");
buscar_vuelos("Concepción", "New York", "2024-11-22");
?>
