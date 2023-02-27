<?php

    if($_POST == $_POST['herra']){
    function editarHerramienta(){

        $id = $_POST['producto'];
        $cantidad = $_POST['cantidadP'];
        $query = 'UPDATE herramienta SET contidadHerra = '.$cantidad.'  WHERE idHerramienta ='.$id;
    }
    editarHerramienta();
    }else if ( $_POST == $_POST['quim']) {
        function editarQuimicos(){
            $id = $_POST['producto'];
            $cantidad = $_POST['cantidadP'];
            $query = 'UPDATE quimicos SET cantidadQuim = '.$cantidad.'  WHERE idquimico ='.$id;
        }
        editarQuimicos();

    }else if ($_POST == $_POST['alim']) {
        function editarAlimentacion(){
            $id = $_POST['producto'];
            $cantidad = $_POST['cantidadP'];
            $query = 'UPDATE alimentacion SET cantidadAlim = '.$cantidad.'  WHERE idAlim ='.$id;
        }
        editarAlimentacion();
    }



?>