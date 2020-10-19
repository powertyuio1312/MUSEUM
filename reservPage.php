<?php
include 'reservation.php';
$ex_id = $_SESSION['exid'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/reservPage.css">

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
  </head>
    <script src="js/wow.min.js"></script>
    <script> new WOW().init(); </script>
  <body style="background-color: White; color: #5C3F5A;">
<?
    include 'header.php';
?>

	<div class="container-fluid">

        <?php            

            $host = "localhost";
            $db = "MUSEUM";
            $userdb = "root";
            $passworddb = "";      

            $link = mysqli_connect($host, $userdb, $passworddb, $db)
            or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

                        $queryLog = "SELECT exName, author, date, time, price 
                                     FROM exhibition 
                                     WHERE exhibition_id ='".$ex_id."'";

                        $resultOfexNameSelect = mysqli_query($link, $queryLog)
                        or die("Ошибка! ".mysqli_error($link));

                        $countexNamerows = mysqli_num_rows($resultOfexNameSelect);
                        $countexNamerow = mysqli_fetch_row($resultOfexNameSelect);


                echo "
                    <div class='container '>
                        <div class='row zoomIn wow ' data-wow-offset='200' 
data-wow-delay='0.5s' 
data-wow-duration='2s'>
                            <div class='col title-block'>
                                <h1>$countexNamerow[0]</h1>
                                <p>$countexNamerow[1]</p>
                                <h3>Цена: $countexNamerow[4] р</h3>

                                <div class='dateprice'>
                                    <p>$countexNamerow[2], $countexNamerow[3]</p>
                                    <p>г. Минск, п-т. Независимости, 23</p>
                                </div>
                            </div>
                        </div>
                    </div>";
                        
?>
        



    	<div class="row fadeInUp wow " data-wow-offset='50' 
                data-wow-delay='0.1s' 
                data-wow-duration='1s'>
    					
            <form method="POST" class="reg-form">
                
                
                <input class="text" type="text" name="Name" maxlength="50" size="25" placeholder="Введите имя">
                <br><span class="error"><?=@$eMail;?></span><br>
                
                
                <input class="text" type="text" name="Surname" maxlength="50" size="25" placeholder="Введите фамилию">
                <br><span class="error"> <?=@$ePass;?> </span><br>
                      
                <br>
    				
    			<input class="butt" type="submit" name="getOrder" value="Забронировать билет">
    		</form>	

    	</div>
    </div>


<footer>
        <img src="img/Лого/логоСветлый.png" width="150px" height="65px" alt="logo">


        <div class="socnetwork">
            <a href="#"><img src="img/inst.png"></a>
            <a href="#"><img src="img/face.png"></a>
            <a href="#"><img src="img/vk.png"></a>
        </div>
</footer>

  <!-- jQuery -->
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