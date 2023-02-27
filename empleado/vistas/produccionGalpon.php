<!DOCTYPE html>
<?php
    session_start();

   if(!isset($_SESSION["Usuario"])){
        header('Location: ../index.php');
   }

?>
<html>
    <head>
    <title>fauna</title>
        <meta charset="UTF  -8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../css/custome.css" rel="stylesheet">
        <link href="../../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../../js/bootstrap.bundle.min.js"></script>
        <link href ="../../css/custome.css" rel="stylesheet">
    </head>

    <body>
    <?php
        include '../.././modules/menu/menu.php';
    ?>
    <div class="row">
    <div class="col col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <?php

            include '../.././modules/sidebar/sidebarEmp.php';
            ?>
        </div>
        <div class="col ms-4 text-center">

            <div class=" container text-center border">
                <?php
                    include '../../controller/conexion.php';
                    $conexion = new Conexion();
                    $con = $conexion->conectarDB();

                        $sql = "SELECT * FROM producionGalpon p INNER JOIN galpon g ON p.idGalpon = g.idGalpon
                        INNER JOIN inventario ON p.idInventario = inventario.idInventario";
                        $resultset = $con->query($sql);
                    
                    ?>

                    <div class="table-responsive">
                        <table class="table table-bordered border-primary mt-4" id="tabla">
                            <tr><th>n° producción</th><th>Galpon</th><th>Produción</th><th>Producto</th><th>Fecha</th><th>Modifica</th></tr>
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
        </div>
            <script>
                function eliminar(id){
                    if(confirm("Desea eliminar el registro?")){
                    const xhttp = new XMLHttpRequest;
                        xhttp.onload = function(){
                            document.getElementById("tabla").innerHTML = this.responseText;
                            alert('Registro eliminado');
                        };
                        xhttp.open("GET", "../controller/eliminar.php?id="+id);
                        xhttp.send();
                }
            }
                </script>
    </body>
</html>