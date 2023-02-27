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

        $sql= "INSERT INTO cliente (nombreCliente,direccionCliente,nombreEstablecimiento, telefonoCliente)
        VALUES('".$_POST["nombreCliente"]."','".$_POST["direccionCliente"]."','".$_POST["nombreEstablecimiento"]."','".$_POST["telefonoCliente"]."');";
               
        if($con->query($sql)===TRUE){
            $_SESSION["status1"]="Se ha creado un nuevo cliente";
            header('Location: ../vistas/cliente.php');          
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