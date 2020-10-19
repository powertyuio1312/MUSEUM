<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
//$h = "";
// $_SESSION['PAGE'] = 'exhib';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" type="text/css" href="css/exhibitions.css">
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

    <title>Main</title>
  </head>
  <body style="background-color: white;">
    <?
        include "header.php";
    ?>
    <script src="js/wow.min.js"></script>
    <script> new WOW().init(); </script>

	<div class="container-fluid main-news">
        <!-- <img src="img/Лого/лого2.png" width="100%" style="position: fixed; opacity: 0.2"> -->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 ">
					<ul class="ul-category" >
						<li><a href="#">Ближайшие</a></li>
						<li><a href="#">Прошедшие</a></li>
						<li><img src="img/Лого/лого2.png" width="100%"></li>
					</ul>
				</div>
				<div class="col-sm-8 news-cont">
					<h1>Ближайшие выставки</h1>
					<div class="row text-center justify-content-center ex-block">
						
<?php

	$host = "localhost";
    $db = "MUSEUM";
    $userdb = "root";
    $passworddb = "";
                

    $link = mysqli_connect($host, $userdb, $passworddb, $db)
    or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

    $queryLog = "SELECT photo, exName, author, content, date, time, price, exhibition_id, isDisplay FROM exhibition";

    $resultOfexNameSelect = mysqli_query($link, $queryLog)
    or die("Ошибка! ".mysqli_error($link));

    $countexNamerows = mysqli_num_rows($resultOfexNameSelect); // кол-во строк запроса




echo "<div class='container'>";
			
    for($i = 0; $i < $countexNamerows; ++$i)
    {
    	$countexNamerow = mysqli_fetch_row($resultOfexNameSelect);            
        
        if($countexNamerow[8] == 1)
        {
        	echo "<div class='row ex-row zoomIn wow hoverable' data-wow-offset='50' 
                data-wow-delay='0.1s' 
                data-wow-duration='1s'>
    				<div class='col-sm-4 img-block'>
    					<img  src='img/$countexNamerow[0]'>
    						</div>
    							<div class='col-sm-8 ex-info'>
                                    <form method='POST'>
        								<h3>$countexNamerow[1]</h3>
        								<h4>$countexNamerow[2]</h4>
        								<a href='currExhibit.php?exid=$countexNamerow[7]'>Узнать больше</a>
        								    <div class='dateprice'>
            									<label>$countexNamerow[4]</label>
            									<label>$countexNamerow[5]</label>
            									<label>$countexNamerow[6] р</label>
        									</div>
                                            <div style='float:right; padding-top:3%;'>
                                                <button class='btn' type='submit' onclick='Like($countexNamerow[7])'>";

                                                        
                                                        $query = "SELECT COUNT(*) 
                                                                  FROM starred
                                                                  WHERE exID = $countexNamerow[7]";

                                                        $result = mysqli_query($link, $query)
                                                        or die("Ошибка! ".mysqli_error($link));

                                                        $rows = mysqli_num_rows($result); // кол-во строк запроса
                                                        $row = mysqli_fetch_row($result);


                                                        ///////////
                                                        $query1 = "SELECT userID, exID , mail
                                                                    FROM starred LEFT JOIN user
                                                                    ON starred.userID = user.user_id
                                                                  WHERE mail = '".$_SESSION['MAIL']."' AND exID = $countexNamerow[7]";

                                                        $result1 = mysqli_query($link, $query1)
                                                        or die("Ошибка! ".mysqli_error($link));

                                                        $rows1 = mysqli_num_rows($result1);

                                                        if ($rows1)
                                                            {
                                                                echo "<img class='img-like' src='img/LikeOn.png' width='100%'>
                                                                        <span class='likesCount'>".$row[0]."</span>";

                                                            }
                                                            else
                                                            {
                                                                echo "<img class='img-like' src='img/Like.png' width='100%'>
                                                                        <span class='likesCount'>".$row[0]."</span>";
                                                            }
                                                        echo "
                                                </button>
                                            </div>
                                    </form>
    							</div>
    			            </div>";
        }
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script type="text/javascript" src="js/like.js"></script>
  </body>
</html>