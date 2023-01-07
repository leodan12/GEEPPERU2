function mensaje(resp) {

    if (resp == 1) {
        Swal.fire({
            text: "Registro Guardado",
            icon: "success"
        });

    } else if (resp == 2) {
        Swal.fire({
            text: "Registro Actualizado",
            icon: "success"
        });
    } else if (resp == 3) {
        Swal.fire({
            text: "Registro Eliminado",
            icon: "success"
        });
    } else if (resp == -1) {
        Swal.fire({
            text: "Error al Guardar",
            icon: "error"
        });
    } else if (resp == -2) {
        Swal.fire({
            text: "Error al Actualizar",
            icon: "error"
        });
    } else if (resp == -3) {
        Swal.fire({
            text: "Error al Eliminar",
            icon: "error"
        });
    } else if (resp == -5) {
        Swal.fire({
            text: "El Registro no Existe",
            icon: "error"
        });
    }
    else if (resp == 'email_duplicado') {
        Swal.fire({
            text: "El Email Ya Esta Registrado",
            icon: "error"
        });
    }
    else if (resp == '6') {
        Swal.fire({
            text: "Consulta enviada",
            icon: "success"
        });
    }
    else if (resp == '-6') {
        Swal.fire({
            text: "error al enviar consulta",
            icon: "error"
        });
    }
}
