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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Main</title>
  </head>
  <body style="background-color: #FAF2E8; color: #5C3F5A;">
    <?
        include "header.php";
    ?>


	<div class="container-fluid main-news">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
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

// $query1 = "SELECT userID 
//                                                                   FROM starred
//                                                                   WHERE exID = $countexNamerow[7]";

//                                                         $result1 = mysqli_query($link, $query1)
//                                                         or die("Ошибка! ".mysqli_error($link));
//                                                         $rows1 = mysqli_num_rows($result1); // кол-во строк запроса
                                                        
                                                            // if ($row1[0] == 1)
                                                            // {

// $query1 = "SELECT  mail
//           FROM starred LEFT JOIN user
//           ON starred.userID = user.user_id";

// $result1 = mysqli_query($link, $query1)
//           or die("Ошибка! ".mysqli_error($link));

// $rows1 = mysqli_num_rows($result1); // кол-во строк запроса
 

                                                         $query1 = "SELECT  user_id, mail, exID
                                                                  FROM starred LEFT JOIN user
                                                                  ON starred.userID = user.user_id";   
$result1 = mysqli_query($link, $query1)
          or die("Ошибка! ".mysqli_error($link));

$rows1 = mysqli_num_rows($result1); // кол-во строк запроса



echo "<div class='container'>";
			
    for($i = 0; $i < $countexNamerows; ++$i)
    {
    	$countexNamerow = mysqli_fetch_row($resultOfexNameSelect);
        $row1 = mysqli_fetch_row($result1);
            
        
        if($countexNamerow[8] == 1)
        {
        	echo "<div class='row ex-row'>
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

                                                        // $query1 = "SELECT userID 
                                                        //           FROM starred
                                                        //           WHERE exID = $countexNamerow[7]";

                                                        // $result1 = mysqli_query($link, $query1)
                                                        // or die("Ошибка! ".mysqli_error($link));
                                                        // $rows1 = mysqli_num_rows($result1); // кол-во строк запроса
                                                        
                                                        // $query1 = "SELECT  user_id, mail
                                                        //           FROM starred LEFT JOIN user
                                                        //           ON starred.userID = user.user_id
                                                        //           WHERE starred.exID = $countexNamerow[7]";

                                                        // $result1 = mysqli_query($link, $query1)
                                                        //           or die("Ошибка! ".mysqli_error($link));

                                                        // $rows1 = mysqli_num_rows($result1);

                                                        // for($i = 0; $i < $rows1; $i++)
                                                        // {
                                                            // $row1 = mysqli_fetch_row($result1);

                                                            if ($row1[1] == $_SESSION['MAIL'] || $row1[2] == $countexNamerow[7])
                                                            {
                                                                echo "<img class='img-like' src='img/LikeOn.png' width='100%'>
                                                                        <span class='likesCount'>".$row[0]. $row1[1]. $row1[2]."</span>";

                                                            }
                                                            else
                                                            {
                                                                echo "<img class='img-like' src='img/Like.png' width='100%'>
                                                                        <span class='likesCount'>".$row[0] .$row1[1]. $row1[2]."</span>";
                                                            }
                                                        // }

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
    <div class="aa">
        
    </div>


<footer>
        <img src="img/Лого/логоСветлый.png" width="150px" height="65px" alt="logo">


        <div class="socnetwork">
            <a href="#"><img src="img/inst.png"></a>
            <a href="#"><img src="img/face.png"></a>
            <a href="#"><img src="img/vk.png"></a>
        </div>
    </footer>
    <!-- <script type="text/javascript" src="js/like.js"></script> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script type="text/javascript" src="js/like.js"></script>
  </body>
</html>