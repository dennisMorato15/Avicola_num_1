<!DOCTYPE html>
<?php
    session_start();

   if(!isset($_SESSION["Usuario"])){
        header('Location: ../../index.php');
   }

?>
<html lang="en">
<head>
<head>
        <title>Avicola</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href ="../.././css/custome.css" rel="stylesheet">
        <link href ="../.././libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../.././js/bootstrap.bundle.min.js"> </script>
    </head>
</head>
<body >

        <?php
            include '../.././modules/menu/menu.php';
        ?>
        <div class="row">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <?php
                include '../.././modules/sidebar/sidAdmin.php';
                ?>
            </div>
    <div class="col ms-4" style=""> 
    <div class="container mt-5 justify-content-center">

    <h1 class="text-center text-dark mt-3 mb-4"><b>Nuevo Galpon</b></h1>
        <div class="card mb-3 " style="max-width: 980px; margin-left:200px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../../img/galpon.jpg" style="width:100%; height:450px;" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <form action="../controller/crearGalpon.php" method="POST" class="was-validated mt-5" enctype="multipart/form-data">
                        <div class="form-floating mt-4 mb-4">
                            <input class="form-control form-control-md" type="text" name="nombreGalpon" id="nombreGalpon" placeholder="nombre" required>
                            <label for="rol"><i class="bi bi-house-door"></i></i>Nombre galpon:</label>
                        </div>   

                        <div class="form-floating mt-4">
                            <input class="form-control form-control-md" type="number" name="capacidadGalpon" id="capacidadGalpon" placeholder="capacidad" required>
                            <label for="rol"><i class="bi bi-card-heading"></i>Capacidad:</label>
                        </div>

                        <div class="form-floating mt-4">
                            <input class="form-control form-control-md" type="number" name="ponederos" id="ponederos" placeholder="ponederos" required>
                            <label for="rol"><i class="bi bi-card-heading"></i>Cantidad de ponederos:</label>
                        </div>

                        <div class="form-floating mt-4">
                            <input class="form-control form-control-md" type="number" name="comederos" id="comederos" placeholder="comederos" required>
                            <label for="rol"><i class="bi bi-card-heading"></i>Cantidad de comederos:</label>
                        </div>

                        <div class="form-floating mt-4">
                            <input class="form-control form-control-md" type="number" name="vevederos" id="vevederos" placeholder="vevederos" required>
                            <label for="rol"><i class="bi bi-card-heading"></i>Cantidad de vevederos:</label>
                        </div>

                        <div class="form-floating mt-4">
                            <input class="form-control form-control-md" type="text" name="tamaño" id="tamaño" placeholder="tamaño" required>
                            <label for="rol"><i class="bi bi-card-heading"></i>Tamaño del galpon:</label>
                        </div>
    
                        <label for="archivoSubir">Imagen</label>
                         <input type="file" name="archivoSubir" id="archivoSubir" class="form-control" placeholder="ponederos" require>


                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg mt-3 mb-3" id="submit"><i class="bi bi-plus-square-fill me-2" style="color: white;"></i>Nuevo Galpon</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
            
        </div>
</div>
</div>
    </body>
</html>