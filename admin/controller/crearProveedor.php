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
    function crearProveedor(){
        $con=$this->conectarDB();
// encriptamos password
        include 'seguridad.php';
        $limpieza = new Seguridad();

        $password = $limpieza->encriptarP($_POST["password"]);

        $sql= "INSERT INTO proveedor (nombreProveedor,correo,empresaProveedor,telefonoEmpresa,direccionEmpresa)
        VALUES('".$_POST["nombreP"]."','".$_POST["email"]."','".$_POST["empresa"]."','".$_POST["numero"]."','".$_POST["direccion"]."');";
               
        $email = $_POST["email"];

        if($con->query($sql)===TRUE){
           echo "Usuario creado";
            // $_SESSION["status"]="Se ha creado el usuario";
            header('Location: ../vistas/usuarios.php');          
        }else{
           echo "Usuario no creado ";
           
            //$_SESSION["ErrorDB"]="Error el usuario no se ha creado".$con->error;
            header('Location:../formularios/crearProveedor.php');
        }
        $con->close();

    }
    
}

$conexion = new Configuracion();
$conexion->crearProveedor();
?>