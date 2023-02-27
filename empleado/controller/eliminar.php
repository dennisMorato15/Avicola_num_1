<?php
include '../../controller/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();
    $id = $_GET['id'];
    $sql = "DELETE FROM produciongalpon WHERE idProduccion = $id";
    $resulset = $con->query($sql);
    $con->close();

                $con = $conexion->conectarDB();
                $sql = "SELECT * FROM producionGalpon p INNER JOIN galpon g ON p.idGalpon = g.idGalpon
                INNER JOIN inventario ON p.idInventario = inventario.idInventario";
                $resultset = $con->query($sql);

            ?>

            <div class="table-responsive">
                <table class="table table-bordered border-primary mt-4" id="tabla">
                    <tr><th>n° produccion</th><th>Galpon</th><th>Produción</th><th>Producto</th><th>Fecha</th><th>Modifica</th></tr>
            <?php

            if($resultset->num_rows>0){
            while($fila = $resultset->fetch_assoc()){
                    echo "<tr><td>".$fila["idProduccion"]."</td><td>".$fila["nombreGalpon"]."</td><td>".$fila["produccionGalpon"].
                    "</td><td>".$fila["nombreProducto"]."</td><td>".$fila["fechas"].
                    "</td><td><button class='btn btn-outline-danger btn-sm' value='".$fila['idProduccion']."' onclick='eliminar(this.value)'>Eliminar</button>"."</td></tr>";
            //include 'modalUsu.php';
            }
            }
            ?>
</table>
</div>

    
