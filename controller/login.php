<?php
        session_start();

    class Login{
        private $email;
        private $password;
        
        function inicio(){
            $email= $_POST["email"];
            include 'seguridad.php';
            
            $encriptar = new Seguridad();
            $password = $encriptar->encriptarP($_POST["password"]);
         
            include 'conexion.php';
            $conexion = new Conexion();
            $con = $conexion->conectarDB();

            $sql ="SELECT *FROM USUARIO WHERE email = '".$email."' AND password='".$password."'; ";
            $resultset = $con->query($sql);

            if($resultset->num_rows >0){
                while($fila=$resultset->fetch_assoc()){
                    $_SESSION["Usuario"] = $fila["id_cargo"];
                    
                    if ($_SESSION["Usuario"] == 1) {
                        header('Location: ../admin/index.php');
                    }else if ($_SESSION["Usuario"] == 2) {
                        header('Location: ../empleado/index.php');
                    }else if ($_SESSION["Usuario"] == 3) {
                        header('Location: ../vistas/vender.php');
                    }
                }
            }else{
                $_SESSION["Error"]="Por favor verifique sus credenciales de acceso";
                header('Location: ../index.php');
            }
            $con->close();
            
        }
    }
    $init = new Login();
    $init->inicio();

?>  