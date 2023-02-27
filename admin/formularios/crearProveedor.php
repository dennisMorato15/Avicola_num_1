<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Avicola</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href ="../.././css/custome.css" rel="stylesheet">
        <link href ="../.././libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../.././js/bootstrap.bundle.min.js"> </script>
    </head>

<body>

<?php
            include '../.././modules/menu/menu.php';
        ?>
        <div class="row">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <?php
    
                include '../.././modules/sidebar/sidAdmin.php';
                ?>
            </div>
    <div class="col ms-4 "> 
        <h1 class="text-center mt-3 mb-3"><b> Crear Usuario</b></h1>
            <div class="container mt-2 " style="border-radius:15px;">
                <div class="card mb-3" style="max-width: 90%; margin-left:100px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../../img/user.jpg" style="height:600px;"class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <form action="../controller/crearProveedor.php" method="POST" class="was-validated p-3">
                    <div class="form-floating mt-4">
                        <input class="form-control form-control-md" type="text" name="nombreP" id="nombreP" placeholder="Nombres" required>
                        <label for="rol"><i class="bi bi-file-person"></i>Nombre y Apellido:</label>
                        </div>
                        <div class="form-floating mt-4">
                            <input class="form-control form-control-md" type="email" name="email" id="email" placeholder="Apellidos" required>
                            <label for="rol"><i class="bi bi-person"></i>Correo Empresa:</label>
                        </div>

                        <div class="form-floating mt-4">
                            <input class="form-control form-control-md" type="text" name="empresa" id="empresa" placeholder="Correo" required>
                            <label for="rol"><i class="bi bi-envelope"></i>Nombre de la empresa:</label>
                        </div>

                        <div class="form-floating mt-4">
                            <input class="form-control form-control-md" type="number" name="numero" id="numero" placeholder="Numero télefonico" required>
                            <label for="rol"><i class="bi bi-telephone-fill"></i>Telefono:</label>
                        </div>

                        <div class="form-floating mt-4">
                            <input class="form-control form-control-md" type="text" name="direccion" id="direccion" placeholder="Dirección" required>
                            <label for="rol"><i class="bi bi-bag-x-fill"></i>Dirección de la empresa:</label>
                        </div>

                        <div class="d-grid mt-3 mb-3">
                            <button type="submit" class="btn btn-success">Crear Producto</button>
                        </div>
                    </form>
    </div>
                </div>
            </div>
            </div>
        
</div>
</body>
</html>