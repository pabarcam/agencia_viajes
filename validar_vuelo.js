function validarFormularioVuelo() {
    var origen = document.forms["formVuelo"]["origen"].value;
    var destino = document.forms["formVuelo"]["destino"].value;
    if (origen == "" || destino == "") {
        alert("Todos los campos deben ser llenados");
        return false;
    }
    return true;
}