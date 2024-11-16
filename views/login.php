<?php
    if(isset($_SESSION['usuario'])){
        header("location:inicio");
        exit();
    }
?>
<form id="frm_login" class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-4 fondo">
            <div class="py-4">
                <h3 class="text-center">Iniciar Sesion</h3>
                <br>
                <div class="form-floating mb-3">
                    <input class="form-control" id="usuario" name="usuario" type="text" placeholder="e-mail">
                    <label class="text-primary" for="usuario">Ingresar Correo Electrónico</label>
                </div>
                <div class="form-floating mb-3">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                    <label class="text-primary" for="password">Ingresar Contraseña</label>
                </div>
                <button class="btn btn-primary w-100 mb-3" type="button" id="btn_iniciar">Iniciar sesión</button>
                <a href="registro" class="btn btn-danger w-100 mb-3">Registrarse</a>
            </div>
        </div>
    </div>
</form>
<script src="./public/js/login.js"></script>
