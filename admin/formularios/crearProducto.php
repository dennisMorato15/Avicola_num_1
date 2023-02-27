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
<body>
<body>
        <?php
            include '../.././modules/menu/menu.php';
        ?>
        <div class="row">
        <div class="col col-xl-2 px-sm-2 px-0 bg-dark">
                <?php
    
                include '../.././modules/sidebar/sidAdmin.php';
                ?>
            </div>
            <div class="col ms-4 text-center">
        
            <?php
                if(isset($_SESSION["status1"])){
                    echo '<div class="alert alert-success m-0">  ';
                    echo '<i class="bi bi-emoji-dizzy-fill"></i>';
                    echo $_SESSION["status1"];
                    echo '</div>';     
                }
            ?>
    
    <h1 class="text-center mt-3 mb-3"><b>Nuevo Producto</b> </h1>
        <div class="container">
        <div class="card mb-3 card-sm w-100" style="">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../../img/galpon.jpg" style="height:500px;" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">

                <form action="../controller/crear.php" method="POST" class="was-validated" enctype="multipart/form-data">
                <div class="form-floating mt-4">
                    <input class="form-control form-control-md" type="text" name="nombreProducto" id="nombreProducto" placeholder="Apellidos" required>
                    <label for="rol"><i class="bi bi-envelope"></i>NombreProducto:</label>
                </div>   

                <div class="form-floating mt-4">
                    <input class="form-control form-control-md" type="number" name="precioProducto" id="precioProducto" placeholder="Apellidos" required>
                    <label for="rol"><i class="bi bi-envelope"></i>Precio Venta:</label>
                </div>

                <div class="form-floating mt-4">
                    <input class="form-control form-control-md" type="number" name="existencias" id="existencias" placeholder="Apellidos" required>
                    <label for="rol"><i class="bi bi-envelope"></i>Existencias:</label>
                </div>

                <div class="form-floating mt-4">
                    <input class="form-control form-control-md" type="number" name="stock" id="stock" placeholder="Apellidos" required>
                    <label for="rol"><i class="bi bi-envelope"></i>Stock:</label>
                </div>

            
                <label for="archivoSubir">Imagen</label>
                <input type="file" name="archivoSubir" id="archivoSubir" class="form-control" require>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success mt-3 mb-3" name="submit"><i class="bi bi-plus-square-fill me-2" style="color: white;"></i>Crear Producto</button>
                </div>
            </form>
                </div>
                </div>
            </div>
            </div>
        </div>
</div>

    </body>
</html>