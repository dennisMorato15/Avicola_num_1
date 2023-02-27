<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header('location: ../../index.php');

    }

    include '../../controller/conexion.php';
    $con = new Conexion();
    $con = $con->conectarDB();
    $sql = 'SELECT * FROM inventario';
    $resultset = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Avicola</title>
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
                    if(isset($_SESSION["User"])){
                        echo '<div class="alert alert-success m-0">  ';
                        echo '<i class="bi bi-emoji-dizzy-fill"></i>';
                        echo $_SESSION["User"];
                        echo '</div>';     
                    }
                ?>
                <h1 class="mt-3 mb-3"><b>Inventario de productos</b></h1>

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
                <table class="table table-bordered border-primary mt-4">
                    <tr class="bg-primary"><th>Cod</th><th>Nombre Producto</th><th>Precio Producto </th><th>Existencias</th><th>Stock</th><th>Imagen</th><th>Opciones</th></tr>
                <?php
                if($resultset->num_rows>0){
                    $i = 0;
                while($fila = $resultset->fetch_assoc()){
                    $i = $i + 1;
                    echo "<tr><td>".$i."</td><td>".$fila["nombreProducto"]."</td><td>".$fila["precioProducto"].
                    "</td><td>".$fila["existencias"]."</td><td>".$fila["stock"]." </td><td><img src="."../../img/".$fila["imagen"]." style = 'width:100px; height:50px;' alt='La imagen de huevos'>".
                    "</td><td><button class='btn btn-danger' value='".$fila['idInventario']."' onclick='eliminarProducto(this.value)'><i class='bi bi-trash3-fill'></i>Eliminar</button>"." "
                ?>
                <button class="btn btn-dark text-center" data-bs-toggle="modal" data-bs-target="#galpon<?php echo $fila['idInventario']; ?>"><i class="bi bi-pencil-fill"></i>Actualizar</button>
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


    
