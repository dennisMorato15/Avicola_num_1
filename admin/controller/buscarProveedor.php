<?php
    include '../../controller/conexion.php';
        $conexion = new Conexion();
        $con = $conexion->conectarDB();

        $where= "";
        if(!empty($_GET)){
            $valor= $_GET['consulta'];
            if(!empty($valor)){
                $where= "WHERE empresaProveedor LIKE '%$valor%'
                or direccionEmpresa LIKE '%$valor%'";
            }
        } 
        $sql = "SELECT * FROM proveedor $where";
        $resultset = $con->query($sql);
    
    if($resultset->num_rows>0){    
        while($fila = $resultset->fetch_assoc()){
                echo "<tr><td>".$fila["nombreProveedor"]."</td><td>".$fila["correo"]."</td><td>".$fila["empresaProveedor"].
                "</td><td>".$fila["telefonoEmpresa"]."</td><td>".$fila["direccionEmpresa"].
                "</td><td><button class='btn btn-danger btn-sm' value='".$fila['idProveedor']."' onclick='eliminar(this.value)'><i class='bi bi-trash3-fill'></i>Eliminar</button>"." "
        ?>
            <button class="btn btn-dark text-center" data-bs-toggle="modal" data-bs-target="#galpon<?php echo $fila['id']; ?>"><i class="bi bi-pencil-fill"></i>Actualizar</button>
        <?php
        echo '    
        </td></tr>';
        include '../vistas/modalUsu.php';
        }
    }
    ?>

    <script>

    </script>
                