<!DOCTYPE html>
<html>
    <head>
        <title>Login de bootstrap</title>
        <meta charset="utf-8">
        <meta name="viewport" conten="width=device-width, initial-scale=1">
        <link href ="./css/custome.css" rel="stylesheet">
        <link href ="./libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="./js/bootstrap.bundle.min.js"> </script>
    </head>
    <body style=""> 
        
    <?php
    if(isset($_SESSION["Error"])){
        echo '<div class="alert alert-danger m-0"> ';
        echo '<i class="bi bi-emoji-dizzy-fill"></i>';
        echo $_SESSION["Error"];
        echo '</div>';
        session_unset();
        session_destroy();
        
    }
    ?>

    <nav class="navbar navbar-expand-sm fixed-top bg-primary">
    <div class="container-fluid ">
        <a class="navbar-brand text-white" href="#">
         <img src="./img/logo.png" alt="" class="rounded-pill" style="width:20%; min-width:50px;">
        </a> <span class="text-white" style="font-size:23px;">El caracol</span>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#colNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="colNav" class="collapse navbar-collapse"> 
            <ul class="navbar-nav ">
                    <li class="navbar">
                        <a class="nav-link fw-bold" href="#presentacion" data-bs-toggle="modal" data-bs-target="#modal1" style="font-size:23px; color:white;">
                        <i class="bi bi-person-fill me-2" style="font-size:30px;"></i>Login</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>
<div class="modal fade" id="modal1">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #f9f6f4;" >
            <!-- Modal header-->
                        <div class="modal-header text-center">
                        <i class="bi bi-person-circle " style="font-size:120px; margin-left:170px;"></i>       
                        </div>
                        <div class="modal-body">
                            <h2 class="text-center">Acceder</h2>
                            <h6 class="text-center">Ir a pagina principal</h6>

    <form action="./controller/login.php" method="POST" class="was-validated">
        <div class="form-floating mt-4">
            <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" name="email" required>
                <div class="invalid-feedback">Por favor llene el campo</div>
                <div class="valid-feedback">Por favor llene el campo</div>
            <label for="email"><i    class="bi bi-envelope"></i>Email:</label>
        </div>


        <div class="form-floating mt-4 text-darck">
            <input type="password" class="form-control" id="password" placeholder="Ingrese su Contraseña" name="password" required>
                <div class="invalid-feedback">Por favor llene el campo</div>
                <div class="valid-feedback">Por favor llene el campo</div>
            <label for="password"><i class="bi bi-lock"></i>Password:</label>
        </div>
        

        <div class="d-grid  m-0 mt-3">
            <div class="d-grid">
                <button type="submit" class="btn btn-success ms-4 me-4"><i class="bi bi-send me-3"></i>Ingresar</button>
            </div>
        </div> 
        <hr>
    </form>
                    </div>
                    </div>
                </div>
            </div> 
        </nav>
    <!------------------targeta--------------------------------------------------------->
    <div class="text-center">
            <br>
            <img src="./img/2.jpg" class="img-fluid" alt="" style="width:70%; height: 500px;">
        </div>

        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Quienes somos?</h5>
                    <p class="card-text">Somos campesinos coprometidos con el comercio colombia, y la buena calidad de nuestro productos.</p>
                </div>
                </div>
                </div>

                <div class="col">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold" >Envios</h5>
                    <p class="card-text">Realizamos envios a cualquier ciudad de boyaca, "mayores a 100 cubetas de huevos".</p>
                </div>
                </div>
                </div>

                <div class="col">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Contactanos</h5>
                    <p class="card-text">Somos campesinos coprometidos con el comercio colombia, y la buena calidad de nuestro productos.</p>
                </div>
                </div>
                </div>
            </div>
        </div>

        <div class=" text-center">
        <h1 class="fw-bold mt-3">El campecino es la fuerza que mueve al pais</h1>
        <p>La finca avicola el buen comer, le ofrece los mejores productos del campo colombiado
            has tu pedido y disfuta.


        </p>
        </div>
<br><br><br><br><br>

    <div class="bg-dark text-secondary text-center fixed-bottom">
        <hr>
       <i class="bi bi-c-circle me-2"></i>Todos los derechos reservados.2018-<?php echo date("Y");?> 
    </div>



</body>
</html>