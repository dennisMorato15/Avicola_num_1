<!DOCTYPE html>
<?php
    session_start();
        if(!isset($_SESSION["Usuario"])){
            header('location: ../../index.php');
    
        }
?>

<html>
    <head>
    <title>fauna</title>
        <meta charset="UTF-8">
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
        <div class="col-auto col-ms col-xl-2  px-0 bg-dark">
                <?php
    
                include '../.././modules/sidebar/sidAdmin.php';
                ?>
            </div>
    <div class="col">        
        <div class="container ">
               
            <h1 class="text-center mt-5 mb-5"><b>Clientes registrados</b></h1>

            <div class="row p-4">
                <div class="col">
                    <a class="btn btn-outline-success" href="../formularios/crearCliente.php">Cliente nuevo</a>
                    <button class="btn btn-outline-dark" onclick="regresar()">Regresar</button>
                </div>
                <div class="col">

                <form action="" >
                    <div class="input-group">
                    <input class="form-control text-white bg-light  border border-dark" type="text" id="buscar" name="buscar" onkeyup="buscarCliente()" placeholder="Buscar Cliente">
                    </div>
                </form>

            </div>
            <h1 hidden="hidden"><strong>Total: </strong><span id="contenedor_total"></span></h1>
            </div>
        </div>

            <div class=" container text-center border">

                    <div class="table-responsive" >
                        <table class="table table-bordered border-primary mt-4">

                            <thead class="text-center bg-primary">
                                <th>Nombre</th><th>Dirección</th><th>Establecimiento</th><th>Teléfono</th><th>Opciones</th>
                            </thead>
                    <tbody id="tabla" class="text-center">
                    <?php
                    include '../controller/buscarCliente.php';
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
                            document.getElementById("destino").innerHTML = this.responseText;
                        alert('Registro eliminado');
                        };
                        xhttp.open("GET", "../controller/eliminar.php?id="+id);
                        xhttp.send();
                }
            }

         function buscarCliente(){
            var mensaje;
            var consulta = document.getElementById("buscar").value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
            };
            xhttp.open("GET","../controller/buscarCliente.php?consulta="+consulta);
            xhttp.send();
            }

            function regresar(){
                window.history.back();
            }
                </script>
    </body>
</html>