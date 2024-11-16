<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Lista de productos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-4">
                    <a class="nav-link" href="<?=url('inicio');?>">Inicio</a>
                </li>
                <li class="nav-item me-4">
                </li>
                <li class="nav-item d-flex align-items-center me-3">
                    <span class="navbar-text text-white">
                        <?= isset($_SESSION['usuario']) ? $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido'] : 'Usuario'; ?>
                    </span>
                </li>
                <li class="nav-item ms-2">
                    <button type="button" class="btn btn-danger" id="btn_cerrar">Cerrar sesión</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
    if (!isset($_SESSION['usuario'])) {
        header("location:login");
        exit();
    }
?>
<div class="container mt-5">
    <div class="row justify-content-center bg-card">
        <div class="col-12 text-end mt-3">
        </div>
        <div class="col-10 text-center mt-3">
            <h2>Inventario</h2>
        </div>
        <div class="col-10 text-end mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">Añadir producto</button>
            <table id="myTable" class="display table text-white">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="contenido_producto">
                </tbody>
            </table>
        </div>
        <div class="col-10 text-end">
            <hr class="text-primary">
        </div>
    </div>
</div>

<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" hidden id="id_prodcuto_act">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_producto" name="edit_producto" type="text" placeholder="Producto">
                            <label class="text-primary" for="usuario">Producto</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_precio" name="edit_precio" type="text" placeholder="Precio">
                            <label class="text-primary" for="usuario">Precio</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_unidades" name="edit_unidades" type="text" placeholder="Unidades">
                            <label class="text-primary" for="usuario">Unidades</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="producto" name="producto" type="text" placeholder="Producto">
                            <label class="text-primary" for="usuario">Producto</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="precio" name="precio" type="text" placeholder="Precio">
                            <label class="text-primary" for="usuario">Precio</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="unidades" name="unidades" type="text" placeholder="Unidades">
                            <label class="text-primary" for="usuario">Unidades</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_agregar">Añadir</button>
            </div>
        </div>
    </div>
</div>
