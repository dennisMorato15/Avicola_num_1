<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header('location: ../../index.php');

    }

    include '../../controller/conexion.php';
    $con = new Conexion();
    $con = $con->conectarDB();
    $id= $_GET['id'];
    $sql = 'SELECT * FROM galpon WHERE idGalpon='.$id;
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
                <?php
                    if($resultset->num_rows>0){
                        $i = 0;
                        while($fila = $resultset->fetch_assoc()){
                ?>
                <h1 class="mt-3 mb-3"><b><?php echo $fila['nombreGalpon']?></b></h1>

                <div class="container p-3">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-outline-success" href="../formularios/crearProducto.php">Nuevo Producto</a>
                            <button class="btn btn-outline-dark" onclick="regresar()">Regresar</button>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" id="codigo_producto"
                            placeholder="Buscar Producto">
                    </div>
                    </div>
                </div>

                <div class="table-responsive" id="destino">
                <table class="table table-bordered border-primary mt-4 w-75">
                   <theader>
                    <tr class="bg-primary">
                        <th>Cantidad ponederos</th>
                        <th>Cantidad comederos</th>
                        <th>Cantidad vevederos</th>
                        <th>tamaño del galpon</th>
                        <th>Acciones</th>
                    </tr>
                  </theader> 
                  <tbody>
                    <tr>
                        <th><?php echo $fila['ponederos'];?></th>
                        <th><?php echo $fila['comederos'];?></th>
                        <th><?php echo $fila['vevederos'];?></th>
                        <th><?php echo $fila['tamaño'];?></th>
                        <th><button class="btn btn-dark">Actualizar</button></th>
                    </tr>
                  </tbody>
                <?php
                    echo '    
                        </td></tr>';
                        include 'modalProdu.php';
                        }
                       }
                           ?>
                           </table>
                   </div>
            </div>
        </div>
        </div>
        <script>
            function regresar(){
                window.history.back();
            }

            </script>
    </body>
</html>


    
