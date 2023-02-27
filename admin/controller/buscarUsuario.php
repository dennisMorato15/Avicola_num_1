<?php
    include '../../controller/conexion.php';
        $conexion = new Conexion();
        $con = $conexion->conectarDB();

        $where= "";
        $campo = isset($_POST['buscar']) ? $con->real_escape_string('buscar') : null; 

        if ($campo != null) {
            $where = "WHERE nombre LIKE '%$campo%'
            or apellido LIKE '%$campo%'  
            or cargo LIKE '%$campo%'";
        }


        $sql = "SELECT * FROM usuario p INNER JOIN cargo c ON p.id_cargo = c.idCargo $where";
        $resultset = $con->query($sql);
    
    if($resultset->num_rows>0){    
        while($fila = $resultset->fetch_assoc()){
                $html = "<tr>";
                $html .="<td>".$fila['nombre']."</td>";
                $html .="<td>".$fila['apellido']."</td>";
                $html .="<td>".$fila['email']."</td>";
                $html .="<td>".$fila['cargo']."</td>";
                $html .="<td>".$fila['numero']."</td>";
                $html .="<td><button class='btn btn-danger btn-sm' value='".$fila['id']."' onclick='eliminar(this.value)'><i class='bi bi-trash3-fill'></i>Eliminar</button>"."</td>";
                $html .="</tr>";
        ?>
            <!--<button class="btn btn-dark text-center" data-bs-toggle="modal" data-bs-target="#galpon<?php// echo $fila['id']; ?>"><i class="bi bi-pencil-fill"></i>Actualizar</button>-->
        <?php
        echo ($html);
                }
            }

    ?>

    <script>

    </script>
                