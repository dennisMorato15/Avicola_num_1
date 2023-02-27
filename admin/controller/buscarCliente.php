<?php
    include '../../controller/conexion.php';
        $conexion = new Conexion();
        $con = $conexion->conectarDB();

        $where= "";
        if(!empty($_GET)){
            $valor= $_GET['consulta'];
            if(!empty($valor)){
                $where= "WHERE nombreCliente LIKE '%$valor%'
                or direccionCliente LIKE '%$valor%'  
                or nombreEstablecimiento LIKE '%$valor%' 
                or telefonoCliente LIKE '%$valor%'";
            }
        } 
    $sql="SELECT * FROM cliente $where ORDER BY nombreCliente ASC LIMIT 10";  
    $resultset = $con->query($sql);
        if($resultset->num_rows>0){
            while($fila = $resultset->fetch_assoc()){
            echo "<tr><td>".$fila["nombreCliente"]."</td><td>".$fila["direccionCliente"]."</td><td>".$fila["nombreEstablecimiento"].
            "</td><td>".$fila["telefonoCliente"].
            "</td><td><button class='btn btn-danger' value='".$fila['id']."' onclick='eliminar(this.value)'><i class='bi bi-trash3-fill'></i>Eliminar</button>"." "
    ?>
        <button class="btn btn-dark text-center" data-bs-toggle="modal" data-bs-target="#galpon<?php echo $fila['id']; ?>"><i class="bi bi-pencil-fill"></i>Actualizar</button>
    <?php
    echo '    
    </tr></td>';
    include '../vistas/modalClien.php';
    }
}
    ?>
                