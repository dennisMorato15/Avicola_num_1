
<div class="modal fade" id="galpon<?php echo $fila['id']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title" id="exampleModalLabel"><b><?php echo $fila['nombre']; ?></b></h3>

            
            </div>

        <form action="../controller/actualizarUsuario.php" method="POST" class="was-validated mt-3" class="m-5">
        <input type="hidden" name="id" id="id" value="<?php echo $fila['id']; ?>">
        <div class="form-floating mt-4">
            <input class="form-control form-control-md" type="text" name="nombre" id="nombre" placeholder="Nombres" value="<?php echo $fila['nombre']; ?>">
            <label for="rol"><i class="bi bi-envelope"></i>Nombre:</label>
            </div>
            <div class="form-floating mt-4">
                <input class="form-control form-control-md" type="text" name="apellido" id="apellido" placeholder="Apellidos" value="<?php echo $fila['apellido']; ?>">
                <label for="rol"><i class="bi bi-envelope"></i>Apellido:</label>
            </div>

            <div class="form-floating mt-4">
                <input class="form-control form-control-md" type="email" name="email" id="email" placeholder="Correo" value="<?php echo $fila['email']; ?>">
                <label for="rol"><i class="bi bi-envelope"></i>Email:</label>
            </div>

            <div class="form-floating mt-4">
                    <select class="form-select" id="cargo" name="cargo" require>
                        <option selected disabled value="">Rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Empleado</option>
                        <option value="3">Vendedor</option>
                        </select>
                <label for="rol"><i class="bi bi-envelope"></i>Cargo:</label>
            </div>

            <div class="form-floating mt-4">
                <input class="form-control form-control-md" type="number" name="numero" id="numero" placeholder="Número" value="<?php echo $fila['numero']; ?>">
                <label for="rol"><i class="bi bi-envelope"></i>Telefono:</label>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>   
        </div>
    </div>
</div>  