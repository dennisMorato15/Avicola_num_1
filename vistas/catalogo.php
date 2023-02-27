
<!DOCTYPE html>
<?php
    session_start();

   if(!isset($_SESSION["Usuario"])){
        header('Location: ../../index.php');
   }

?>
<html>
    <head>
        <title>Avicola</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href ="../css/custome.css" rel="stylesheet">
        <link href ="../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../js/bootstrap.bundle.min.js"> </script>
    </head>
<body>
    <?php
    include '../modules/menu/menu.php';
    ?>
    <div class="container text-center p-2">
        <div class="row">
        </div>
    </div>

    <script>
     </script>
</body>
</html>