<!DOCTYPE html>
<?php
    session_start();

   if(!isset($_SESSION["Usuario"])){
        header('Location: ../../index.php');
   }
   include '../../controller/conexion.php';
   $con = new Conexion();
   $con = $con->conectarDB();

        
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
    <div class="container mt-2">
         <h1 class="text-center mt-3 mb-3"><b>Entradas de productos</b></h1>
        <form action="#" method="POST">
         <label for="" style="font-size:24px;">Selecciones a que inventario ingresa el producto</label>
                    <select class="form-select form-select-lg mb-3" name="entradas" id="entradas" aria-label=".form-select-lg example">
                        <option value="1">Herramientas</option>
                        <option value="2">Quimicos</option>
                        <option value="3">Alimentación</option>
                    </select>
            <button type="submit" id="submit" name = "submit" class="btn btn-dark">Seleccionar</button>
        </form>

         <div class="card mb-3 mt-2" style="max-width: 1090px; margin-left:100px;">
                <form action="../controller/entradas.php" method="POST" class="was-validated mt-3 p-2">
                    <div class="form-floating mt-4">
                    <select class="form-select" name="producto" id="producto" >
                        <?php
                           if (isset($_POST['submit'])) {
                            $inventario = $_POST['entradas'];
                            switch ($inventario){
                                    case '1':
                                        $sql = 'SELECT * FROM herramienta;';
                                         $resulset = $con->query($sql);
                                        if ($resulset->num_rows >0) {
                                          while ($row = $resulset->fetch_assoc()) {
                                           
                                            echo '<option value="'.$row["idHerramienta"].'">'.$row["nombreHerra"].'</option>';
                                          }
                                        }
                                        echo '<input type="hidden" name="herra" id="herra" value="herramienta">';  

                                            break;
                                            case '2':
                                                $sql = 'SELECT * FROM quimicos';
                                                $resulset = $con->query($sql);
                                                if ($resulset->num_rows >0) {
                                                  while ($row = $resulset->fetch_assoc()) {
                                                    echo '<option value="1">'.$row["nombreQuim"].'</option>';
                                                  }
                                                } 
                                                echo '<input type="hidden" name="quim" id="quim" value="quimicos">'; 
                                                break;
                                            case '3':
                                                $sql = 'SELECT * FROM alimentacion';
                                                $resulset = $con->query($sql);
                                                if ($resulset->num_rows >0) {
                                                  while ($row = $resulset->fetch_assoc()) {
                                                    echo '<option value="1">'.$row["nombreAlim"].'</option>';
                                                  }
                                                } 
                                                echo '<input type="hidden" name="alim" id="alim" value="alimentacion">'; 
                                                break;
                                            }
                                            }else{
                                                $inventario = 0;
                                            }
                        ?>
                    </select>
                    </div>
                    <div class="form-floating mt-4">
                        <input class="form-control form-control-md" type="number" name="cantidadP" id="cantidadP" placeholder="Cantidad Producto" required>
                        <label for="rol"><i class="bi bi-geo-alt"></i>Cantidad Producto:</label>
                    </div>

                    <div class="d-grid mt-3 mb-3">
                        <button type="submit" class="btn btn-success">Agregar cliente</button>
                    </div>
        </form>
                </div>
            </div>
            </div>

</body>
</html>