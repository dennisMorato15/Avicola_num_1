<?php
include '../../controller/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();
    $id = $_GET['id'];
    $sql = "DELETE FROM ventas WHERE idVenta = $id";
    $resulset = $con->query($sql);
    $con->close();

    $con = $conexion->conectarDB();
    $sql = "SELECT * FROM ventas v INNER JOIN cliente c ON v.idCliente = c.id
                        INNER JOIN inventario ON v.idInventario = inventario.idInventario";
                        $resultset = $con->query($sql);
                        ?>
                    <div class="table-responsive">
                        <table class="table table-bordered border-primary " id="tabla">
                <?php
                    if($resultset->num_rows>0){

                    while($fila = $resultset->fetch_assoc()){

                            echo "<tr ><td>".$fila["idVenta"]."</td><td>".$fila["nombreCliente"]."</td><td>".$fila["nombreProducto"].
                            "</td><td>".$fila["cantidad"]."</td><td>".$fila["total"]."</td><td>".$fila["fecha"].
                            "</td><td><button class='btn btn-outline-danger btn-sm' value='".$fila['idVenta']."' onclick='eliminar(this.value)'>Eliminar</button>"."</td></tr>";
                    }
                }
                    ?>
                    </table>
            </div>
    
