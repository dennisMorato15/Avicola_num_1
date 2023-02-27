<?php
include '../../controller/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();
    $id = $_GET['id'];
    $sql = "DELETE FROM galpon WHERE idGalpon = $id";
    $resulset = $con->query($sql);
    
    $sql = 'SELECT * FROM galpon';
    $resultset = $con->query($sql);

    if($resultset->num_rows>0){
        while($fila = $resultset->fetch_assoc()){
?>
        <tr>
            <td><?php echo $fila['nombreGalpon']; ?></td>
            <td><?php echo $fila['capacidadGalpon']; ?></td>
            <td><img src="../.././img/<?php echo $fila['imagenGalpon']; ?>" alt="" style="width:100px; height:50px;"></td>
            <td><button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#galpon<?php echo $fila['idGalpon']; ?>"  onclick="modal(this.value)"><i class="bi bi-pencil-fill"></i>Actualizar</button>   
            <button class='btn btn-danger' value="<?php echo $fila['idGalpon'] ?>" onclick='eliminarGalpon(this.value)'><i class="bi bi-trash3-fill"></i>Eliminar</button>
        </tr>
<?php
    }
}
?>