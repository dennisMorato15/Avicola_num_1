<?php
    include '../../controller/conexion.php';
        $conexion = new Conexion();
        $con = $conexion->conectarDB();

        $where= "";
        if(!empty($_GET)){
            $valor= $_GET['consulta'];
            if(!empty($valor)){
                $where= "WHERE fecha LIKE '%$valor%'
                or nombreCliente LIKE '%$valor%'  
                or nombreProducto LIKE '%$valor%'";
            }
        } 
    $sql="SELECT * FROM ventas v INNER JOIN cliente c ON v.idCliente = c.id 
    INNER JOIN inventario ON v.idInventario = inventario.idInventario $where";  
    $resultset = $con->query($sql);
        if($resultset->num_rows>0){
            while($fila = $resultset->fetch_assoc()){
                echo "<tr><td>".$fila["idVenta"]."</td><td>".$fila["nombreCliente"]."</td><td>".$fila["nombreProducto"].
                "</td><td>".$fila["cantidad"]."</td><td>".$fila["total"]."</td><td>".$fila["fecha"].
                "</td><td><button class='btn btn-outline-danger btn-sm' value='".$fila['idVenta']."' onclick='eliminar(this.value)'>Eliminar</button>"."</td></tr>";
    }
}
    ?>
                