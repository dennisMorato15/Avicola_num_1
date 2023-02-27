<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header('location: ../../index.php');

    }

    include '../../controller/conexion.php';
    $con = new Conexion();
    $con = $con->conectarDB();
    $sql = 'SELECT * FROM lotegallina p INNER JOIN g galpon ON p.idGalpon = g.idGalpon';
    $resultset = $con->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Invetario Galpon</title>
        <meta charset="utf-8">
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

            include '../.././modules/sidebar/sidAdmin.php';
            ?>
        </div>
        <div class="col ms-4 text-center">
            <div class="row">
                <h1 class="mt-3 mb-3"><b>Inventario de Galpones</b></h1>

                <div class="container p-3">
                    <div class="row">
                        <div class="col">
                        <div class="table-responsive" id="destino">
                            <table class="table table-bordered border-primary mt-4">
                                <tr class="bg-primary">
                                    <th>Cód Lote</th>
                                    <th>fechas Ingreso</th>
                                    <th>Cantidad Gallinas</th>
                                    <th>Raza</th>
                                    <th>Galpón</th>
                            </tr>
                            <?php
                            if($resultset->num_rows > 0){
                            while($fila = $resultset->fetch_assoc()){
                                
                            ?>
                            <tbody>
                                <tr>
                                    <th><?php echo $fila['codLote'];?></th>
                                    <th><?php echo $fila['fecha_in'];?></th>
                                    <th><?php echo $fila['catidadGallinas'];?></th>
                                    <th><?php echo $fila['razaGallina'];?></th>
                                    <th><?php echo $fila['nombreGalpon'];?></th>
                                </tr>
                            </tbody>
                            <?php
                                    include 'modalProdu.php';
                                    }
                                }
                                    ?>
                                    </table>
                            </div>
                        </div>
                        <div class="col">
                        <div class="table-responsive" id="destino">
                            <table class="table table-bordered border-primary mt-4">
                                <tr class="bg-primary">
                                    <th>Cod</th>
                                    <th>Nombre Quimicos</th>
                                    <th>Cantidad</th>
                                </tr>
                            <?php
                            $query = 'SELECT * FROM quimicos';
                            $result = $con->query($query);
                            if($result->num_rows>0){
                                $i = 0;
                            while($row = $result->fetch_assoc()){
                                $i = $i + 1;
                            ?>
                            <tbody>
                                <tr>
                                    <th><?php echo $row['idQuimico'];?></th>
                                    <th><?php echo $row['nombreQuim'];?></th>
                                    <th><?php echo $row['catidadQuim'];?></th>
                                </tr>
                            </tbody>
                            <?php
                                    include 'modalProdu.php';
                                    }
                                }
                                    ?>
                            </table>
                   </div>
                    </div>
                    </div>
                </div>
                <div class="d-md-block">
                    <button class="btn btn-primary" type="button">Productos de alimentación</button>
                    <button class="btn btn-primary" type="button">Atras</button>
                </div>
            </div>
        </div>
        </div>
        <script>
           /* function cargarDocument(){
                const xhttp = new XMLHttpRequest();

                xhttp.onload = function(){
                    //document.getElementById("d1").innerHTML = this.responseText;

                }
                xhttp.open("GET", "info.txt?t="+Math.random());
                xhttp.send();
            }
*/
            function eliminarProducto(id){
                if(confirm("Desea eliminar el registro?")){
                const xhttp = new XMLHttpRequest;
                    xhttp.onload = function(){
                        document.getElementById("destino").innerHTML = this.responseText;
                    alert('Registro eliminado');
                    };
                    xhttp.open("GET", "../controller/eliminarProducto.php?idInventario="+id);
                    xhttp.send();
            }
        }
            function regresar(){
                window.history.back();
            }

            </script>
    </body>
</html>


    
