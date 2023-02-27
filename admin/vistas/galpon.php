<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header('location: ../../index.php');

    }

    include '../../controller/conexion.php';
    $con = new Conexion();
    $con = $con->conectarDB();
    $sql = 'SELECT * FROM galpon ORDER BY idGalpon DESC';
    //$resultset = $con->query($sql);
    $query = mysqli_query($con, $sql);

    $cantidad = mysqli_num_rows($query);
?>


<html>
    <head>
    <title>fauna</title>
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
    <div class="container-fluid">
    <!--<div class="container container-sm p-2">
    <a class="btn btn-outline-success p-2" href="../formularios/crearProducto.php">Nuevo<i class="bi bi-plus-square-fill"></i></a>-->
    <div class="row">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <?php
    
                include '../.././modules/sidebar/sidAdmin.php';
                ?>
            </div>
                <div class="col ms-4 text-center">

                        <h1 class="mt-5 mb-5 "><b>Galpones registrados</b></h1>

                        <div class="container p-3">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-primary" href="../formularios/crearGalpon.php">Nuevo galpon</a>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" id="codigo_producto"
                            placeholder="Buscar galpo">
                    </div>
                    <h1 hidden="hidden"><strong>Total: </strong><span id="contenedor_total"></span></h1>
                    </div>
                </div>
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr class="bg-primary">

                                <th>Nombre Galpon</th>
                                <th>Capacidad</th> 
                                <th>imagen</th>                                  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="destino">   
                            <?php    
                                              
                            while($fila = mysqli_fetch_array($query)){                                                      
                            ?>
                            <tr>
                                <td><?php echo $fila['nombreGalpon']; ?></td>
                                <td><?php echo $fila['capacidadGalpon']; ?></td>
                                <td><img src="../.././img/<?php echo $fila['imagenGalpon']; ?>" alt="" style="width:100px; height:50px;"></td>
                                <td><button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#galpon<?php echo $fila['idGalpon']; ?>"  onclick="modal(this.value)"><i class="bi bi-pencil-fill"></i>Actualizar</button>   
                                <button class='btn btn-danger' value="<?php echo $fila['idGalpon'] ?>" onclick='eliminarGalpon(this.value)'><i class="bi bi-trash3-fill"></i>Eliminar</button>
                                <a class="btn btn-primary text-center" href="vermas.php?id='<?php echo $fila['idGalpon']?>'"><i class="bi bi-eyes"></i>Ver mas</a>
                            </tr>
                            <?php
                             include 'modalEdi.php';
                               }
                            
                            ?>                                
                        </tbody>  
                         
                       </table>                    
                    </div>
        </div>
        <script>

            function eliminarGalpon(id){
                if(confirm("Desea eliminar el registro?")){
                const xhttp = new XMLHttpRequest;
                    xhttp.onload = function(){
                        document.getElementById("destino").innerHTML = this.responseText;
                        alert('Registro eliminado');
                    };
                    xhttp.open("GET", "../controller/eliminarGalpon.php?id="+id);
                    xhttp.send();
            }
        }

            </script>
    </body>
</html>


    
