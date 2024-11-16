const mensaje_error = (msj) => {
    swal({
        title: "Error!",
        text: msj,
        icon: "warning",
        button: "Aceptar",
    });
};

const mensaje_exito = (msj) => {
    swal({
        title: "Correcto!",
        text: msj,
        icon: "success",
        button: "Aceptar",
    });
};

const iniciar_registro = () => {
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let usuario = $("#usuario").val();
    let password = $("#password").val();

    if (nombre === "") {
        mensaje_error("Por favor, ingresa tu nombre.");
        return;
    }
    if (apellido === "") {
        mensaje_error("Por favor, ingresa tu apellido.");
        return;
    }
    if (usuario === "") {
        mensaje_error("Por favor, ingresa tu correo electrónico.");
        return;
    }
    if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(usuario)) {
        mensaje_error("El correo electrónico no tiene un formato válido.");
        return;
    }
    if (password === "") {
        mensaje_error("Por favor, ingresa tu contraseña.");
        return;
    }
    if (password.length < 8) {
        mensaje_error("La contraseña debe tener al menos 8 caracteres.");
        return;
    }

    let data = new FormData();
    data.append("nombre", nombre);
    data.append("apellido", apellido);
    data.append("usuario", usuario);
    data.append("password", password);
    data.append("metodo", "iniciar_registro");

    fetch("./app/controller/Registro.php", {
        method: "POST",
        body: data,
    }).then((respuesta) => respuesta.json())
        .then((respuesta) => {
            if (respuesta[0] == 1) {
                mensaje_exito(respuesta[1]);
                window.location = "login";
            } else {
                mensaje_error(respuesta[1]);
            }
        });
};

$("#btn_registro").on('click', () => {
    iniciar_registro();
});
