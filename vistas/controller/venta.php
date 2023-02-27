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
    function crearUsuario(){
        $con=$this->conectarDB();
        
        $cliente = $_POST['cliente'];
        $producto = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $total = $cantidad * $precio;

        $sql= "INSERT INTO ventas (idCliente,idInventario,cantidad,total)
        VALUES('$cliente','$producto','$cantidad','$total');";
               
        if($con->query($sql)===TRUE){
           //echo "Uusario creado";
            // $_SESSION["status"]="Se ha creado el usuario";
            header('Location: ../index.php');          
        }else{
           //echo "Usuario no creado ";
           
            //$_SESSION["ErrorDB"]="Error el usuario no se ha creado".$con->error;
            echo "<script> alert('Venta no realizada')</script>;";
            header('Location:../index.php');
        }
        $con->close();

    }
    
}

$conexion = new Configuracion();
//Linea para crear la data base del proyecto
//$conexion->crearDB();
//Crear usuario enn data base
//$conexion->conectarDB();
$conexion->crearUsuario();
?>