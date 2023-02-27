
<div class="modal fade" id="galpon<?php echo $fila['idInventario']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

        <form method="POST" action="./controller/venta.php">    
            <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="<?php echo $fila['idInventario']; ?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo $fila['precioProducto']; ?>">
                <div class="form-group">
                    <label for="nombreGalpon" class="col-form-label">Producto</label>
                    <input type="text" class="form-control" id="nombreGalpon" name="nombreGalpon" value="<?php echo $fila['nombreProducto']; ?>"require>
                </div>
                <div class="form-group">

                <label for="rol"><i class="bi bi-envelope"></i>Nombre del establecimiento:</label>
                
                <select class="form-select" id="cliente" name="cliente" require>
                    <?php 
                        $query = "SELECT * FROM cliente";
                        $resultado = $con->query($query);
                        if($resultado->num_rows>0){
                            while($row = $resultado->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['nombreEstablecimiento'];?></option>
                            <?php
                            }
                        }
                    ?>
                       
                        </select>
                </div>                
                <div class="form-group">
                    <label for="imagenGalpon" class="col-form-label">Cantidad en cubetas:</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" require>
                </div>            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar Venta</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Vender</button>
            </div>
        </form>    
        </div>
    </div>
</div>  