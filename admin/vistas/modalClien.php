
<div class="modal fade" id="galpon<?php echo $fila['id']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title" id="exampleModalLabel" style="margin-left:150px;"><b>Cliente: <?php echo $fila['nombreCliente']; ?></b></h3>
            </div>

        <form method="POST" action="../controller/actualizarCliente.php">    
            <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="<?php echo $fila['id']; ?>">
                <div class="form-group">
                    <label for="cliente" class="col-form-label">Nombre cliente:</label>
                    <input type="text" class="form-control" id="cliente" name="cliente" value="<?php echo $fila['nombreCliente']; ?>"require>
                </div>
                <div class="form-group">
                    <label for="direccion" class="col-form-label">Dirección cliente:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $fila['direccionCliente']; ?>"require>
                </div> 
                
                <div class="form-group">
                    <label for="establecimiento" class="col-form-label">Nombre establecimiento cliente:</label>
                    <input type="text" class="form-control" id="establecimiento" name="establecimiento" value="<?php echo $fila['nombreEstablecimiento']; ?>"require>
                </div>

                <div class="form-group">
                    <label for="telefono" class="col-form-label">télefono cliente:</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" value="<?php echo $fila['telefonoCliente']; ?>"require>
                </div>
           
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  