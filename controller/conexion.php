    <?php
    //session_start();
    class Conexion{

        private $servidor;
        private $user;
        private $password;
        private $database;

        function conectarDB(){
            $servidor ="localhost";
            $user ="root";
            $password ="";
            $database="dbavicola";

            $con = new mysqli($servidor,$user,$password,$database);

            if($con->connect_error){
            }else{
            }
            return $con;
        }
    }
    ?>