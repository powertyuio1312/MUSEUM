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
    <link rel="stylesheet" type="text/css" href="css/adminEditPanel.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Main</title>
    <style>
        .chart-div{
            width: 100%;
            height: 30%;
            margin-left: auto;
            margin-right: auto;
            padding-bottom: 5%;            
        }
    </style>
  </head>
  <body style="background-color: white;">
   <?
        include "header.php";
    ?>


	<div class="container-fluid main-news">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<ul class="ul-category" >
						<li><a href="adminOffice.php">Редактирование</a></li>
						<li><a href="adminStatistic.php">Статистика</a></li>
						<li><img src="img/Лого/лого2.png" width="100%"></li>
					</ul>
				</div>
				<div class="col-sm-8 text-center justify-content-center news-cont">
					<h1>Рейтинг</h1><br>
                        <!--  text-center justify-content-center -->
                        <div class="row">
                            <div class="chart-div">
                                <div>
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                            <?php

                            // $host = "localhost";
                            // $db = "MUSEUM";
                            // $userdb = "root";
                            // $passworddb = "";
                                        

                            // $link = mysqli_connect($host, $userdb, $passworddb, $db)
                            // or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

                            // $queryLog = "SELECT e.exName, COUNT(*)
                            //              FROM starred s inner JOIN exhibition e 
                            //              ON s.exID = e.exhibition_id
                            //              GROUP BY e.exName";


                            // $resultOfexNameSelect = mysqli_query($link, $queryLog)
                            // or die("Ошибка! ".mysqli_error($link));

                            // $countexNamerows = mysqli_num_rows($resultOfexNameSelect); // кол-во строк запроса
                            // <?php 
                                                    
                                                        //print("'$countNamerow[0]',");                        
                                                    //}
                                            //
                            // echo json_encode($countexNamerows);

                            echo "<script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var chart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [ 'Чад Вис', 'Андре Ларцев', 'Лоренцо Бернини', 'SaponyukArtDolls', 'Жан-Мишель Бихорель' ],
                                    datasets: [{
                                        label: 'Статистика добавления в избранное',
                                        backgroundColor: [  'rgb(245, 235, 109, 0.6)',
                                                            'rgb(92, 63, 90, 0.6)',
                                                            'rgb(245, 235, 109, 0.6)',
                                                            'rgb(92, 63, 90, 0.6)',
                                                            'rgb(245, 235, 109, 0.6)',
                                                            'rgb(92, 63, 90, 0.6)',
                                                            'rgb(245, 235, 109, 0.6)',
                                                            'rgb(92, 63, 90, 0.6)',
                                                            'rgb(245, 235, 109, 0.6)',
                                                            'rgb(92, 63, 90, 0.6)',
                                                            'rgb(245, 235, 109, 0.6)',
                                                            'rgb(92, 63, 90, 0.6)',
                                                            'rgb(245, 235, 109, 0.6)',
                                                         ],
                                        borderColor: 'rgb(173, 3, 252)',
                                        data: [155, 95, 128, 111, 171]
                                    }]
                                },
                                options: {}
                                });

                            </script>"
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
