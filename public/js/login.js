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

const iniciar_sesion = () => {
    let usuario = $("#usuario").val();
    let password = $("#password").val();

    
    if (usuario === "") {
        mensaje_error("Por favor, ingresa tu correo electrónico.");
        return;
    }
    if (password === "") {
        mensaje_error("Por favor, ingresa tu contraseña.");
        return;
    }

    let data = new FormData();
    data.append("usuario", usuario);
    data.append("password", password);
    data.append("metodo", "iniciar_sesion");

    fetch("./app/controller/Login.php", {
        method: "POST",
        body: data,
    }).then((respuesta) => respuesta.json())
        .then((respuesta) => {
            if (respuesta[0] == 1) {
                mensaje_exito(respuesta[1]);
                window.location = "inicio";
            } else {
                mensaje_error(respuesta[1]);
            }
        });
};

$("#btn_iniciar").on('click', () => {
    iniciar_sesion();
});
