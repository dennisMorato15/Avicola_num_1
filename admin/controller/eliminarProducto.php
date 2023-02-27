<?php
include '../../controller/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();
    $id = $_GET['idInventario'];
    $sql = "DELETE FROM inventario WHERE idInventario = $id";
    $resulset = $con->query($sql);
    $con->close();
?>
    <div class="table-responsive" id="destino">
    <table class="table table-bordered border-primary mt-4">
        <tr class="bg-primary"><th>Cod</th><th>Nombre Producto</th><th>Precio Producto </th><th>Existencias</th><th>Stock</th><th>Imagen</th><th>Opciones</th></tr>
    <?php
    $con = $conexion->conectarDB();
    $sql = 'SELECT * FROM inventario';
    $resultset = $con->query($sql);
    if($resultset->num_rows>0){
        $i = 0;
    while($fila = $resultset->fetch_assoc()){
        $i = $i + 1;
        echo "<tr><td>".$i."</td><td>".$fila["nombreProducto"]."</td><td>".$fila["precioProducto"].
        "</td><td>".$fila["existencias"]."</td><td>".$fila["stock"]." </td><td><img src="."../../img/".$fila["imagen"]." style = 'width:100px; height:50px;' alt='La imagen de huevos'>".
        "</td><td><button class='btn btn-danger' value='".$fila['idInventario']."' onclick='eliminarProducto(this.value)'><i class='bi bi-trash3-fill'></i>Eliminar</button>"." "
    ?>
    <button class="btn btn-dark text-center" data-bs-toggle="modal" data-bs-target="#galpon<?php echo $fila['idInventario']; ?>"><i class="bi bi-pencil-fill"></i>Actualizar</button>
    <?php
        echo '    
            </td></tr>';
            include '../vistas/modalProdu.php';
            }
           }
               ?>
               </table>
       </div>

