<?php
    session_start();
    include_once("lib/dbconnect.php");
    include_once("lib/functions.php");
    include_once("lib/includes.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="http://localhost/site/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="assets/img/fav.jpg"/>
    

    <title>Adote.com</title>
  </head>
  <body>

    <div id="site-content">
      <?php
        $url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'pet';
        $explode = explode('/', $url);
        $dir = "pags/";
        $ext = ".php";

        if(file_exists($dir.$explode['0'].$ext)){
          //protegePagina($explode['0']);
          include($dir.$explode['0'].$ext);
        }else{
          echo "<div class='alert alert-danger'>Página não encontrada!</div>";
        }
      ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>