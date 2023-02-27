<?php
    $directorio  = "../img/";
    $archivo = $directorio . basename($_FILES["archivoSubir"]["name"]);
    $estado = 1;
    $tipoArchivo  = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    //Verificar si es o no una imagen por medio de getimagesize
    if (isset($_POST["submit"])) {
        $verificar = getimagesize($_FILES["archivoSubir"]["tmp_name"]);

        if ($verificar !== false) {
            echo "El archivo es una imagnen";
        }else{
            echo "El archivo no es una imagens";
            $estado = 0;
        }
    }
    
    //Verificar si el archivo existe

    if (file_exists($archivo)) {
            echo "</br>";
            echo "El archivo ya existe en la ruta destino";
            $estado = 0;
    }else{
            echo "</br>";
            echo "El archivo no existe en el directorio";
    }

    //Verificar tipo del archivo

    if ($tipoArchivo != "png" && $tipoArchivo != "jpg" && $tipoArchivo != "jpeg") {
            echo "</br>Tipo de archivo no permitido";
            $estado = 0;
    } else{
            echo "</br> El archivo es de tipo ".$tipoArchivo;
    }  

    //Verificar tamaño del archivo:
    
    if ($_FILES["archivoSubir"]["size"] > 1000000) {
            echo "</br>El tamaño del archivo excede el tamaño permitido";
            $estado = 0;
    }
    
    //Verificar si el archivo es apto para subir

    if ($estado == 0) {
            echo "</br>Lo sentimos, su archivo no ha podido subirse";
    }else{
        if (move_uploaded_file($_FILES["archivoSubir"]["tmp_name"], $archivo)) {//se le puede contatenar, $directorio . "nombreArchivo" . $tipoArchivo para cambiar el nombre del archivo
            echo "</br> El archivo ". basename($_FILES["archivoSubir"]["name"]) . " ha sido subido exitosamente!";
        }else {
            echo "<br>Ha ocurrido un error";//compouser descargar
        }
    }
    

?>