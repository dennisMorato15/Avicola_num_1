
<div class="modal fade" id="galpon<?php echo $fila['idGalpon']; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title " id="exampleModalLabel"></h5>
                <h1><b><?php echo $fila['nombreGalpon']; ?></b></h1>
                </button>
            </div>

        <form method="POST" action="./controller/produccionGalpon.php">    
            <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="<?php echo $fila['idGalpon']; ?>">

                <div class="form-group">
                    <label for="nombreGalpon" class="col-form-label">Nombre Galpon:</label>
                    <input type="text" class="form-control" id="nombreGalpon" name="nombreGalpon" value="<?php echo $fila['nombreGalpon']; ?>" require>
                </div>

                <div class="form-group">
                    <label for="capacidadGalpon" class="col-form-label">produccion Galpon:</label>
                    <input type="number" class="form-control" id="produccion" name="produccion" require>
                </div>

                <div class="form-group">
                    <label for="">Huevos tipo</label>
                    <select class="form-select" id="producto" name="producto" require>
                    <?php 
                        $query = "SELECT * FROM inventario";
                        $resultado = $con->query($query);
                        if($resultado->num_rows>0){
                            while($row = $resultado->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['idInventario'];?>"><?php echo $row['nombreProducto'];?></option>
                            <?php
                            }
                        }
                    ?>
                       
                        </select>
                    </div>           
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark" >Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  