<!DOCTYPE html>
<?php
    session_start();

   if(!isset($_SESSION["Usuario"])){
        header('Location: ../../index.php');
   }

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
            <div class="row">
            <div class="col col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <?php

                    include '../.././modules/sidebar/sidAdmin.php';
                    ?>
                </div>
                <div class="col ms-4 text-center">
          
        <h1 class="text-center mt-3">Usuarios registrados</h1>
        <div class="container p-3">
            <div class="row">
                <div class="col">
                    <a class="btn btn-outline-success" href="../formularios/crearUsuario.php">Usuario nuevo</a>
                    <button class="btn btn-outline-dark" onclick="regresar()">Regresar</button>
                </div>
                <div class="col">
                <form>
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
                <tr class="bg-primary"><th>Nombre</th>
                <th>Apellido</th><th>Correo</th>
                <th>Cargo</th><th>Número</th>
                <th>Opciones</th></tr>
                </thead>
                <tbody id="tabla" class="text-center">
                    <?php
                    include '../controller/buscarUsuario.php';
                    ?>
                    </tbody>
            </table>
            </div>
        </div>
            </DIV>
            <script>
                function eliminar(id){
                    if(confirm("Desea eliminar el registro?")){
                    const xhttp = new XMLHttpRequest();
                        xhttp.onload = function(){
                            //document.getElementById("destino").innerHTML = this.responseText;
                            alert('Registro eliminado');
                        };
                        xhttp.open("GET", "eliminar.php?id="+id);
                        xhttp.send();
                }
            }
           
           
            buscarUsuario()

            function buscarUsuario(){
            var mensaje;
            var consulta = document.getElementById("buscar").value;
            var content = document.getElementById("tabla");
            var url = '../controller/buscarUsuario.php';
            let formaData = new FormData();
            formaData.append('buscar' , consulta);

            fetch(url,{
                method : 'POST',
                body : formaData
            }).then(response => response.json()).
            then(data =>{
                content.innerHTML = data
            }).catch(err => console.log(err))

            // const xhttp = new XMLHttpRequest();
            // xhttp.onload= function(){
            //     document.getElementById("tabla").innerHTML = this.responseText;
            // };
            // xhttp.open("GET","../controller/buscarUsuario.php?consulta="+consulta);
            // xhttp.send();
            }

            function regresar(){
                window.history.back();
            }
                </script>
    </body>
</html>