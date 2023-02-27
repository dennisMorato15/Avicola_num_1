<!DOCTYPE html>
<?php
    session_start();

   if(!isset($_SESSION["Usuario"])){
        header('Location: ../../index.php');
   }
   $_SESSION["Usuario"] = "Administrador";
?>
<html>
    <head>
    <title>Avicola</title>
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
            <div class="row">s
            <div class="col col-sm-4 col-xl-2 px-sm-2 px-0 bg-dark" id="w">
                    <?php

                    include '../.././modules/sidebar/sidAdmin.php';
                    ?>
                </div>
    
        <div class="col col-ms text-center">
          
        <h1 class="text-center mt-3">Proveedores</h1>
        <div class="container p-3">
            <div class="row">
                <div class="col">
                    <a class="btn btn-outline-success" href="../formularios/crearUsuario.php">Proveedor nuevo</a>
                    <button class="btn btn-outline-dark" onclick="regresar()">Regresar</button>
                </div>
                <div class="col">
                <form action="" >
                    <div class="input-group">
                    <input class="form-control bg-light border border-dark" type="text" id="buscar" name="buscar" onkeyup="buscarUsuario()" placeholder = "Buscar usuario">
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
                <tr class="bg-primary"><th>Nombre Proveedor</th><th>Correo Empresa</th><th>Empresa</th><th>Télefono Empresa</th><th>Dirección Empresa</th><th>Opciones</th></tr>
                </thead>
                <tbody id="tabla" class="text-center">
                    <?php
                    include '../controller/buscarProveedor.php';
                    ?>
                    </tbody>
            </table>
            </div>
        </div>
            </DIV>
            <script>
                function eliminar(id){
                    if(confirm("Desea eliminar el registro?")){
                    const xhttp = new XMLHttpRequest;
                        xhttp.onload = function(){
                            //document.getElementById("destino").innerHTML = this.responseText;
                            alert('Registro eliminado');
                        };
                        xhttp.open("GET", "../controller/eliminar.php?id="+id);
                        xhttp.send();
                }
            }

            function buscarUsuario(){
            var mensaje;
            var consulta = document.getElementById("buscar").value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
            };
            xhttp.open("GET","../controller/buscarProveedor.php?consulta="+consulta);
            xhttp.send();
            }

            function regresar(){
                window.history.back();
            }
                </script>
    </body>
</html>