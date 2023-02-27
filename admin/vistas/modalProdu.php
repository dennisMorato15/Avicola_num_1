
<div class="modal fade" id="galpon<?php echo $fila['idInventario']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel"><b>Producto: <?php echo $fila['nombreProducto']; ?> </b></h5>
            </div>

        <form method="POST" action="../controller/actualizarProducto.php" enctype="multipart/form-data">    
            <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="<?php echo $fila['idInventario']; ?>">
                <div class="form-group">
                    <label for="nombreProducto" class="col-form-label">Nombre Producto</label>
                    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="<?php echo $fila['nombreProducto']; ?>"require>
                </div>
                <div class="form-group">
                    <label for="precioProducto" class="col-form-label">Capacidad Producto</label>
                    <input type="text" class="form-control" id="precioProducto" name="precioProducto" value="<?php echo $fila['precioProducto']; ?>"require>
                </div>    
                <div class="form-group">
                    <label for="stock" class="col-form-label">Stock Producto</label>
                    <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $fila['stock']; ?>"require>
                </div>             
                    <input type="text" hidden name="imagenBD" id="imagenBD" value="<?php echo $fila['imagen']; ?>">
                    <label for="archivoSubir">Imagen</label>
                    <input type="file" name="archivoSubir" id="archivoSubir" class="form-control" require>           
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" id="btnGuardar" name="submit" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  