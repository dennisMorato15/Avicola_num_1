
<div class="modal fade" id="galpon<?php echo $fila['idGalpon']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h3 class="modal-title" id="exampleModalLabel" style="margin-left:150px;"><b>Galpon: <?php echo $fila['nombreGalpon']; ?></b></h3>
            </div>

        <form method="POST" action="../controller/editarGalpon.php" enctype="multipart/form-data">    
            <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="<?php echo $fila['idGalpon']; ?>">
                <div class="form-group">
                    <label for="nombreGalpon" class="col-form-label">Nombre Galpon:</label>
                    <input type="text" class="form-control" id="nombreGalpon" name="nombreGalpon" value="<?php echo $fila['nombreGalpon']; ?>"require>
                </div>
                <div class="form-group">
                    <label for="capacidadGalpon" class="col-form-label">Capacidad Galpon:</label>
                    <input type="text" class="form-control" id="capacidadGalpon" name="capacidadGalpon" value="<?php echo $fila['capacidadGalpon']; ?>"require>
                </div>                
                <div class="form-group">
                <input type="text" hidden name="imagenBD" id="imagenBD" value="<?php echo $fila['imagenGalpon']; ?>">
                    <label for="archivoSubir">Imagen</label>
                    <input type="file" name="archivoSubir" id="archivoSubir" class="form-control" require>          
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  