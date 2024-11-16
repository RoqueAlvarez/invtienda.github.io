
const cerrar_sesion = () =>{
    let data = new FormData();
    data.append("metodo","cerrar_sesion");
    fetch("./app/controller/Login.php",{
        method:"POST",
        body:data
    })
    .then(respuesta => respuesta.json())
    .then(respuesta => {
        alert(respuesta[1]);
        window.location="login";
    });
}

$("#btn_cerrar").on('click',()=>{
    cerrar_sesion();
});