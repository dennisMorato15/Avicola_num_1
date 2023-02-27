<?php
    session_start();
    $session = $_SESSION["Usuario"];
    if(!isset($session)){
        header('location: ../index.php');
    }
    include '../controller/conexion.php';
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
        <link href=".././css/custome.css" rel="stylesheet">
        <link href=".././libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src=".././js/bootstrap.bundle.min.js"></script>
        <link href =".././css/custome.css" rel="stylesheet">
    </head>
    <body>
        
    <?php
        include '.././modules/menu/menu.php';
    ?>
    <div class="row">
    <div class="col col-md-3 col-xl-2 px-sm-2 bg-dark">
            <?php

            include '.././modules/sidebar/sidebarVen.php';
            ?>
        </div>
        <div class="col ms-4 text-center">
        <?php
            if(isset($_SESSION["status"])){
                echo '<div class="alert alert-success m-0">';
                echo '<i class="bi bi-emoji-dizzy-fill"></i>';
                echo $_SESSION["status"];
                echo '</div>';
            }
    ?>
            <div class="row">
                <?php
                    if($resultset->num_rows>0){
                        while($fila = $resultset->fetch_assoc()){
                        echo '<div class="card card-sm me-3 mt-3" style="width:18rem;">
                        <img src=".././img/'.$fila['imagen'].'" style = "width:100%; height:200px;" class="mt-2" alt="La imagen de huevos">
                        <div class="card-body">
                        <h3 class="card-title">'.$fila['nombreProducto'].'</h3>
                        <h4 class="card-text">Precio: '.$fila['precioProducto'].'</h4>'
                        ?>
                            <button class="btn btn-dark text-center mt-3" data-bs-toggle="modal" data-bs-target="#galpon<?php echo $fila['idInventario']; ?>"><i class="bi bi-cart4"></i>Vender</button></td>
                        <?php echo'
                        </div>
                    </div>';
                    include 'modalVen.php';
                    }
                }
                
                ?>
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
                        //document.getElementById("destino").innerHTML = this.responseText;
                        alert('Registro eliminado');
                    };
                    xhttp.open("GET", "../controller/eliminarProducto.php?idInventario="+id);
                    xhttp.send();
            }
        }

            </script>
    </body>
</html>