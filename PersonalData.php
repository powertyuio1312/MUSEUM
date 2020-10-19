<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/exhibitions.css">
    <link rel="stylesheet" type="text/css" href="css/like.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Main</title>
  </head>
  <body style="background-color: #FAF2E8; color: #5C3F5A;">
   <?
        include "header.php";
    ?>


	<div class="container-fluid main-news" style="margin-bottom: 1%; ">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<ul class="ul-category" >
						<li><a href="PersonalData.php">Данные пользователя</a></li>
						<li><a href="starred.php">Избранное</a></li>
                        <li><a href="office.php">Заказы</a></li>
						<li><img src="img/Лого/лого2.png" width="100%"></li>
					</ul>
				</div>
				<div class="col-sm-8 news-cont">
					<h1>Данные пользователя:</h1>
					<div class="row ex-block" style="margin-left: 2%">
						
			<?php

                	$host = "localhost";
                    $db = "MUSEUM";
                    $userdb = "root";
                    $passworddb = "";
                                

                    $link = mysqli_connect($host, $userdb, $passworddb, $db)
                    or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

                    $queryLog = "SELECT mail, isSubscribe
                                FROM `user`
                                WHERE user.mail = '".$_SESSION['MAIL']."'";

                    $resultOfexNameSelect = mysqli_query($link, $queryLog)
                    or die("Ошибка! ".mysqli_error($link));

                    $countexNamerows = mysqli_num_rows($resultOfexNameSelect); // кол-во строк запроса


                    ///////// count of exhibitions

                    $queryCount = "SELECT COUNT(*)
                                FROM `reservation` LEFT JOIN `user`
                                ON reservation.userID = user.user_id
                                WHERE user.mail = '".$_SESSION['MAIL']."'";

                    $resultOfCount = mysqli_query($link, $queryCount)
                    or die("Ошибка! ".mysqli_error($link));

                    $countCountrows = mysqli_num_rows($resultOfCount);



                	$countexNamerow = mysqli_fetch_row($resultOfexNameSelect);
                    $countCountrow = mysqli_fetch_row($resultOfCount);

                	echo "<div class='row ex-row'>
            								<div class='col-sm-8 ex-info'>
            									<h3>$countexNamerow[0]</h3>
            									<br>
                                                <div class='dateprice'
                                                    <h3>Количество посещенных выставок:</h3>
                                                    <h2>$countCountrow[0]</h2>
                                                </div>
            								</div>
            							</div>";
			?>

							
						</div>
						
					
				</div>
			</div>
			
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>