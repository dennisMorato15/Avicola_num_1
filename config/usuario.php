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

         /*if($con->connect_error){
           $_SESSION["ErrorDB"] = "No ha sido posible establecer la conexion";
            header('Location: config.php');
        }/*else{
            $_SESSION["status"] = "Se ha conectado a la base de datos";
            header('Location: config.php');
        }*/
        return $con;
    }

    function conectarDB(){
        $servidor ="localhost";
        $user ="root";
        $password ="";
        $database="dbavicola";

        $con = new mysqli($servidor,$user,$password,$database);

        if($con->connect_error){
            $_SESSION["ErrorDB"] = "No ha sido posible establecer la conexion con la base de datos";
            header('Location: config.php');
        }else{
            $_SESSION["status"] = "Se ha creado la base de datos".$con->error;
            header('Location: config.php');
        }
        return $con;
    }

    /*function crearDB(){
        $con=$this->conexion();
        
        $sql = "CREATE DATABASE dbavicola;";

        if($con->query($sql)=== TRUE){
            //$_SESSION["ErrorDB"]="Se ha creado la base de datos";
            //header('Location: config.php');
        }else{
            //$_SESSION["ErrorDB"]="Error creando la base de datos".$con->error;
            //header('Location: config.php');
        }
        $con->close();
    }

    function crearTabla(){
        $con=$this->conectarDB();
        $sql = "CREATE TABLE PRODUCTO(
            id INT(6) AUTO_INCREMENT PRIMARY KEY,
            nombreProducto varchar(50) NOT NULL,
            precioProducto integer(12) NOT NULL,
            cantidadProducto integer(12) NOT NULL,
            colorProducto integer(12) NOT NULL,
            fecha_reg TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON 
            UPDATE CURRENT_TIMESTAMP

        );";
        if($con->query($sql)===TRUE){
            $_SESSION["ErrorDB"]="Error creando la tabla en la base de datos".$con->error;
            header('Location: ./vistas/.php');
        }else{
            $status=1;
        }
        $con->close();
    }

   */ 
    function crearUsuario(){
        $con=$this->conectarDB();
// encriptamos password
        include '../controller/seguridad.php';
        $limpieza = new Seguridad();

        $password = $limpieza->encriptarP($_POST["password"]);

        $sql= "INSERT INTO USUARIO (nombre,apellido,email,cargo,password,numero)
        VALUES('".$_POST["nombre"]."','".$_POST["apellido"]."','".$_POST["email"]."','".$_POST["cargo"]."','".$password."','".$_POST["phone"]."');";
        
        $correo = $_POST["email"];

        $verificar_email = mysqli_query($con, "SELECT * FROM USUARIO WHERE email = '$correo' ");

        if(mysqli_num_rows($verificar_email) > 0){
            $_SESSION["ErrorDB"]="El correo ya se encuentra registrado, Intentelo con otro correo";
            header('Location: ../vistas/registro.php'); 

            exit();
        }

        if($con->query($sql)===TRUE){
            $_SESSION["status"]="Se ha creado el usuario";
           header('Location: ../vistas/registro.php');          
        }else{
            $_SESSION["ErrorDB"]="Error el usuario no se ha creado".$con->error;
            header('Location: ../vistas/registro.php');
        }
        $con->close();

    }
}

$conexion = new Configuracion();
//Linea para crear la data base del proyecto
//$conexion->crearDB();
//Crear usuario enn data base
$conexion->crearTabla();
//$conexion->crearDB();
?>