function validarFormularioHotel() {
    var nombre = document.forms["formHotel"]["nombre"].value;
    var ubicacion = document.forms["formHotel"]["ubicacion"].value;
    if (nombre == "" || ubicacion == "") {
        alert("Todos los campos deben ser llenados");
        return false;
    }
    return true;
}