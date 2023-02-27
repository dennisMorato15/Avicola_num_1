<?php
session_start();
class Configuracion{

    private $servidor;
    private $user;
    private $password;
    private $status=0;

    function conexion(){
        $servidor ="localhost";
        $user ="root";
        $password ="";

        $con = new mysqli($servidor,$user,$password);
        return $con;
    }

    function conectarDB(){
        $servidor ="localhost";
        $user ="root";
        $password ="";
        $database="dbavicola";

        $con = new mysqli($servidor,$user,$password,$database);

        if($con->connect_error){
           echo "no ha sido completada la conexión";
        }else{
           echo  "la conexion a sido establecida";
        }
        return $con;
    }

    function crearGalpon(){
        $con=$this->conectarDB();
            $directorio  = "../../img/";
                    $archivo = $directorio . basename($_FILES["archivoSubir"]["name"]);
                    $estado = 1;
                    $tipoArchivo  = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    
                    //Verificar si es o no una imagen por medio de getimagesize
                    
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
    
    
            $ruta = basename($_FILES["archivoSubir"]["name"]);
            echo $ruta;

        $sql= "INSERT INTO galpon (nombreGalpon,capacidadGalpon,ponederos,comederos,vevederos,tamaño,imagenGalpon)
        VALUES('".$_POST["nombreGalpon"]."','".$_POST["capacidadGalpon"]."','".$_POST["ponederos"]."',
        '".$_POST["comederos"]."','".$_POST["vevederos"]."','".$_POST["tamaño"]."','$ruta');";
               
        if($con->query($sql)===TRUE){
           echo "Uusario creado";
            // $_SESSION["status"]="Se ha creado el usuario";
            header('Location: ../vistas/galpon.php');          
        }else{
           echo "Usuario no creado ";
           
            //$_SESSION["ErrorDB"]="Error el usuario no se ha creado".$con->error;
            header('Location:../formularios/crearGalpon.php');
        }
        $con->close();

    }
    
}


$conexion = new Configuracion();
//Linea para crear la data base del proyecto
//$conexion->crearDB();
//Crear usuario enn data base
//$conexion->conectarDB();
$conexion->crearGalpon();
?>