<?php
	include "auth.php";
?>

<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" type="text/css" href="css/auth.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="md/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="md/css/mdb.min.css">
  <link rel="stylesheet" href="css/animate.css">

    <title>Main</title>

    <style type="text/css">


    </style>
  </head>
  <body style="background: white;">

            <script src="js/wow.min.js"></script>
    <script> new WOW().init(); </script>
    <?
        include "header.php";
    ?>

	<div class="cent">
    
        <form method="POST" class="reg-form">

            <h3>Авторизация</h3>
            
            <label>@mail:</label><br>
            <input class="text zoomIn wow" data-wow-offset='50' 
                data-wow-delay='0.1s' 
                data-wow-duration='1s' type="text" name="Mail" maxlength="50" size="25" value="">
            <br><span class="error"><?=@$eMail;?></span><br>
            
            <label>Пароль:</label><br>
            <input class="text zoomIn wow" data-wow-offset='50' 
                data-wow-delay='0.1s' 
                data-wow-duration='1s' type="text" name="Password" maxlength="50" size="25" value="">
            <br><span class="error"> <?=@$ePass;?> </span><br>
                  
            <br>

             <input class="butt" type="submit"  value="Войти">
    
        </form>

        <div class="img-back fadeInRight wow" data-wow-offset='50' 
                data-wow-delay='0.1s' 
                data-wow-duration='1s'><img src="img/Лого/лого2.png" ></div>
        
    </div>


	<footer>
        <img src="img/Лого/логоСветлый.png" width="150px" height="65px" alt="logo">


        <div class="socnetwork">
            <a href="#"><img src="img/inst.png"></a>
            <a href="#"><img src="img/face.png"></a>
            <a href="#"><img src="img/vk.png"></a>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="md/js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="md/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="md/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="md/js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
  </body>
</html>