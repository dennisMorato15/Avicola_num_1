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
// encriptamos password
        include 'seguridad.php';
        $limpieza = new Seguridad();

        $password = $limpieza->encriptarP($_POST["password"]);

        $sql= "INSERT INTO USUARIO (nombre,apellido,email,id_cargo,password,numero)
        VALUES('".$_POST["nombre"]."','".$_POST["apellido"]."','".$_POST["email"]."','".$_POST["cargo"]."','".$password."','".$_POST["numero"]."');";
               
        $email = $_POST["email"];

        $verificar_email = mysqli_query($con, "SELECT * FROM USUARIO WHERE email = '$email' ");
        
             if(mysqli_num_rows($verificar_email) > 0){
                header('Location: ../formularios/crearUsuario.php');
                    //echo "Tu correo ya a sido registrado";
                    //$_SESSION["ErrorDB"]="El correo ya se encuentra registrado, Intentelo con otro correo";
                    //header('Location: ../vistas/registro.php'); 
        
             exit();
         }
        if($con->query($sql)===TRUE){
           echo "Uusario creado";
            // $_SESSION["status"]="Se ha creado el usuario";
            header('Location: ../vistas/usuarios.php');          
        }else{
           echo "Usuario no creado ";
           
            //$_SESSION["ErrorDB"]="Error el usuario no se ha creado".$con->error;
            header('Location:../formularios/crearUsuario.php');
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