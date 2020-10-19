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
  <body style="background-color: #FAF2E8; color: #5C3F5A;">
   <?
        include "header.php";
    ?>
    <script src="js/wow.min.js"></script>
    <script> new WOW().init(); </script>

	<div class="container-fluid main-news">
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
						
			<?php

                	$host = "localhost";
                    $db = "MUSEUM";
                    $userdb = "root";
                    $passworddb = "";
                                

                    $link = mysqli_connect($host, $userdb, $passworddb, $db)
                    or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

                    $queryLog = "SELECT photo, exName, author, content, date, time, price, exhibition_id 
                                FROM `starred` left JOIN `exhibition`
                                ON starred.exID = exhibition.exhibition_id
                                LEFT JOIN `user`
                                ON starred.userID = user.user_id
                                WHERE user.mail = '".$_SESSION['MAIL']."'";

                    $resultOfexNameSelect = mysqli_query($link, $queryLog)
                    or die("Ошибка! ".mysqli_error($link));

                    $countexNamerows = mysqli_num_rows($resultOfexNameSelect); // кол-во строк запроса


echo "<h1>Избранное ($countexNamerows)</h1>
        <div class='row text-center justify-content-center ex-block'>
    <div class='container'>";
			
    for($i = 0; $i < $countexNamerows; ++$i)
    {
    	$countexNamerow = mysqli_fetch_row($resultOfexNameSelect);

    	echo "<div class='row ex-row fadeInRight wow' data-wow-offset='200' 
            data-wow-delay='0.5s' 
            data-wow-duration='2s'>
								<div class='col-sm-4 img-block'>
									<img  src='img/".$countexNamerow[0]."'>
								</div>
								<div class='col-sm-8 ex-info'>
									<h3>$countexNamerow[1]</h3>
									<h4>$countexNamerow[2]</h4>
									<a href='currExhibit.php?exid=$countexNamerow[7]'>Узнать больше</a>
									<div class='dateprice'>
										<label>$countexNamerow[4]</label>
										<label>$countexNamerow[5]</label>
										<label>$countexNamerow[6] р</label>
									</div>
								</div>
							</div>";
    }

			?>
							

							
						</div>
						
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script type="text/javascript" src="js/like.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>