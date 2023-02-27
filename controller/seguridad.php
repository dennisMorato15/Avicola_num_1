<?php
class Seguridad{
    private $password;

    function limpiarP($password){
        $this->$password = htmlspecialchars($password); 
        return $this->$password;
    }

    function encriptarP($password){

        $clean = $this->limpiarP($password);

        $cifrado = "AES-128-CTR";

        $options =0;
        $iv_longitud= openssl_cipher_iv_length($cifrado);
        $encryption_iv ="1234567891011121";
        $encryption_key ="AdSi";
        $encriptado = openssl_encrypt($clean,$cifrado, $encryption_key,$options, $encryption_iv);
        
        return $encriptado;

    }
}

//$limpieza = new Seguridad();
//$frase = $limpieza->limpiarP('<a href="text.php">text</a>');
//$texto='<a href="text.php">text</a>';

//echo "La password limpia seria: ".$password;
?>