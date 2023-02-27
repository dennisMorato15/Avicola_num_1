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
        <link href=".././css/custome.css" rel="stylesheet">
        <link href=".././libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src=".././js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
    <?php
        include '.././modules/menu/menu.php';
    ?>
    <div class="row">
    <div class="col col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <?php
                include '.././modules/sidebar/sidebarVen.php';
            ?>
        </div>
        <div class="col ms-4 text-center">

        <h1 class="text-center mt-3"><b>Ventas realizadas</b></h1>
        <div class="container p-3">
            <div class="row">
                <div class="col">
                    <a class="btn btn-outline-success" href="index.php">Nueva venta</a>
                    <button class="btn btn-outline-dark" onclick="regresar()">Regresar</button>
                </div>
                <div class="col">
                <form action="" >
                    <div class="input-group">
                    <input class="form-control bg-light border border-dark" type="text" id="buscar" name="buscar" onkeyup="buscarVenta()" placeholder = "Buscar venta">
                    </div>
                </form>
            </div>
            <h1 hidden="hidden"><strong>Total: </strong><span id="contenedor_total"></span></h1>
            </div>
        </div>

            <div class=" container text-center border">
                    <div class="table-responsive">
                        <table class="table table-bordered border-primary mt-4">

                <thead class="text-center bg-primary">
                            <tr><th>Venta</th><th>Cliente</th><th>Producto</th><th>Cantidad</th><th>Total venta</th><th>Fecha venta</th><th>Opciones</th></tr>
                </thead>
                <tbody id="tabla" class="text-center">
                    <?php
                    include './controller/buscarVenta.php';
                    ?>
                    </tbody>
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
                        xhttp.open("GET", "../controller/eliminarVen.php?id="+id);
                        xhttp.send();
                }
            }

            function buscarVenta(){
            var mensaje;
            var consulta = document.getElementById("buscar").value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
            };
            xhttp.open("GET","./controller/buscarVenta.php?consulta="+consulta);
            xhttp.send();
            }

            function regresar(){
                window.history.back();
            }
                </script>


    </body>
</html>