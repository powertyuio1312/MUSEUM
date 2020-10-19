<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
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



    <link rel="stylesheet" type="text/css" href="css/1.css">

    <title>Main</title>
		
  </head>
  <body style="background: white;">
  <?
        include "header.php";
  ?>
	<script src="js/wow.min.js"></script>
	<script> new WOW().init(); </script>


<!-- ------------------------------------------------- -->
    
	<div class="container-fluid">
  <div class="container welcome-block">
    <div class="row">
      <div class="col-lg-5">
        <div class="main" >
            <img src="img/Лого/лого2.png">
        </div>


        <div class="rot">
            <img src="img/Лого/circle.png" width="100%">
        </div>
        
      </div>
      <div class="col-lg-7">
        <div class="my-title fadeInRight wow" data-wow-offset='0' 
                                                            data-wow-delay='0.5s' 
                                                            data-wow-duration='1s'>
            <H1>МУЗЕЙ СОВРЕМЕННОГО ИСКУССТВА</H1>
            <p>Проникнись атмосферой нашего музея и произведений искусств современных художников и скульпторов. Здесь тебя ждет увлекательное путешествие за пределы твоего сознания!</p>
        </div>
      </div>
    </div>
</div>
</div>

<div class="pink-block"></div>
<div class="container-fluid">

			<div class="banner-rass ">
				<div class="banner ZoomIn wow" data-wow-offset='200' 
data-wow-delay='0.5s' 
data-wow-duration='2s'><img src="img/первое.gif"></div>
				<div class="rassylka ZoomIn wow" data-wow-offset='200' 
data-wow-delay='0.5s' 
data-wow-duration='2s'>
					<p>Хотите быть в курсе ближайших выставок? <br>ПОДПИШИТЕСЬ НА НАШУ<br>РАССЫЛКУ</p>
					<input type="text" name="rassylka" placeholder="@mail">
				</div>
			</div>
	</div>
<div class="container-fluid p-0 main-news">

<?php

	$host = "localhost";
    $db = "MUSEUM";
    $userdb = "root";
    $passworddb = "";
                

    $link = mysqli_connect($host, $userdb, $passworddb, $db)
    or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

    $queryLog = "SELECT exName, content, photo, exhibition_id FROM exhibition";

    $resultOfexNameSelect = mysqli_query($link, $queryLog)
    or die("Ошибка! ".mysqli_error($link));

    $countexNamerows = mysqli_num_rows($resultOfexNameSelect); // кол-во строк запроса


echo "<div class='container'>";
			
    for($i = 0; $i < $countexNamerows/2; ++$i)
    {
    	$countexNamerow = mysqli_fetch_row($resultOfexNameSelect);
    	echo "<div class='row news-block '>
    			<div class='col-lg-6 p-0 img-news fadeInLeft wow' data-wow-offset='200' 
data-wow-delay='0.5s' 
data-wow-duration='2s'>
    				<img src='img/$countexNamerow[2]' class='img-responsive'  width='100%'>
    			</div>
				<div class='col-lg-6 news-cont ZoomIn wow' data-wow-offset='200' 
data-wow-delay='0.5s' 
data-wow-duration='2s' style='padding: 5% 10% 0 10%;'>
					<h1>$countexNamerow[0]</h1>
					<p>$countexNamerow[1]</p>
					<div class='dateprice'>
						<a href='exhibitions.php'>Перейти к выставкам</a>
					</div>
				</div>
			</div>
			<hr>";

		$countexNamerow = mysqli_fetch_row($resultOfexNameSelect);

		echo "<div class='row news-block '>
				<div class='col-lg-6 news-cont ZoomIn wow' data-wow-offset='200' 
data-wow-delay='0.5s' 
data-wow-duration='2s' style='padding: 5% 10% 0 10%;'>
					<h1>$countexNamerow[0]</h1>
					<p>$countexNamerow[1]</p>
						<div class='dateprice'>
						<a href='exhibitions.php'>Перейти к выставкам</a>
					</div>
				</div>
				<div class='col-lg-6 p-0 img-news fadeInRight wow' data-wow-offset='200' 
data-wow-delay='0.5s' 
data-wow-duration='2s'>
					<img src='img/$countexNamerow[2]' class='img-responsive'  width='100%'>
				</div>
			 </div>
			 <hr>";

    }
echo "</div>";



?>
		
	</div>
	</div>

	<footer>
		<img src="img/Лого/лого2текст.png" width="150px" height="65px" alt="logo">


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