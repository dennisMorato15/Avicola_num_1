<!DOCTYPE html>
<?php
    session_start();

   if(!isset($_SESSION["Usuario"])){
        header('Location: ../../index.php');
   }

?>
<html lang="en">

    <head>
        <title>Avicola</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href ="../.././css/custome.css" rel="stylesheet">
        <link href ="../.././libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../.././js/bootstrap.bundle.min.js"> </script>
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
    <div class="col ms-4 text-center">
    <?php
                if(isset($_SESSION["status1"])){
                    echo '<div class="alert alert-success m-0">  ';
                    echo '<i class="bi bi-emoji-dizzy-fill"></i>';
                    echo $_SESSION["status1"];
                    echo '</div>';     
                }
            ?>
         
    <div class="container mt-2">
         <h1 class="text-center mt-3 mb-3"><b> Crear Cliente</b></h1>

         <div class="card mb-3" style="max-width: 1090px; margin-left:100px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../../img/tienda.jpg" style="height:400px;" class="img-fluid rounded-start mt-2" alt="...">
                </div>
                <div class="col-md-8">
                <form action="../controller/crearCliente.php" method="POST" class="was-validated mt-3 p-2">
                <div class="form-floating mt-4">
                    <input class="form-control form-control-md" type="text" name="nombreCliente" id="nombreCliente" placeholder="Nombres" required>
                    <label for="rol"><i class="bi bi-person-circle"></i>Nombre:</label>
                    </div>
                    <div class="form-floating mt-4">
                        <input class="form-control form-control-md" type="text" name="direccionCliente" id="direccionCliente" placeholder="direccionClientes" required>
                        <label for="rol"><i class="bi bi-geo-alt"></i>Direccion:</label>
                    </div>

                    <div class="form-floating mt-4">
                        <input class="form-control form-control-md" type="text" name="nombreEstablecimiento" id="nombreEstablecimiento" placeholder="Correo" required>
                        <label for="rol"><i class="bi bi-shop"></i>Establecimineto:</label>
                    </div>

                    <div class="form-floating mt-4">
                        <input class="form-control form-control-md" type="number" name="telefonoCliente" id="telefonoCliente" placeholder="Telefono" required>
                        <label for="rol"><i class="bi bi-telephone-outbound-fill"></i>Telefono:</label>
                    </div>

                    <div class="d-grid mt-3 mb-3">
                        <button type="submit" class="btn btn-success">Agregar cliente</button>
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