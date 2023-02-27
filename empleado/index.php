<!DOCTYPE html>
<?php

        session_start();

        if(!isset($_SESSION["Usuario"])){
            header('Location: ../index.php');
        }

    include '../controller/conexion.php';
    $con = new Conexion();
    $con = $con->conectarDB();
    $sql = 'SELECT * FROM galpon ORDER BY idGalpon DESC';
    //$resultset = $con->query($sql);
    $consulta = mysqli_query($con, $sql);

    $cantidad = mysqli_num_rows($consulta);
?>


<html>
    <head>
    <title>fauna</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/custome.css" rel="stylesheet">
        <link href="../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../js/bootstrap.bundle.min.js"></script>
        <link href ="../css/custome.css" rel="stylesheet">
    </head>
    <body>

    <?php
        include '.././modules/menu/menu.php';
    ?>
    <div class="row">
    <div class="col col-md-3 col-xl-2 px-sm-2 bg-dark">
            <?php

            include '.././modules/sidebar/sidebarEmp.php';
            ?>
        </div>
        <div class="col ms-4 text-center">
                <h1 class="text-center">Galpones</h1>
                    <div class="row">
                            <?php    
                                              
                            while($fila = mysqli_fetch_array($consulta)){                                                      
                            echo '<div class="card card-sm me-3 mb-3" style="width:18rem;">
                                    <img src="../img/'.$fila['imagenGalpon'].'" class="" alt="Imagenes de huevos BD">
                                <div class="card-body">
                                  <h3 class="card-title text-center">'.$fila['nombreGalpon'].'</h3> 
                                  <div class="d-grid">
                            '?>
                                    <button class="btn btn-dark text-center" data-bs-toggle="modal" data-bs-target="#galpon<?php echo $fila['idGalpon']; ?>">Producción</button></td>
                            <?php
                            
                            echo '
                                    </div>
                                </div>  
                              </div>';
                              include 'modalEmple.php';
                            }
                            ?>  
                        </div>
                    </div>                              
               
                </div>
        </div>
    </body>
</html>


    
