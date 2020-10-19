<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
$exid = $_GET['exid'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/like.css">
    <link rel="stylesheet" type="text/css" href="css/currEx1.css">

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

    <style type="text/css">
        
    </style>

    <title>Main</title>
  </head>
  <body style="background-color: white; color: #5C3F5A;">
   <?
        include "header.php";
    ?>
        <script src="js/wow.min.js"></script>
    <script> new WOW().init(); </script>

	<div class="container-fluid">
        <?php
            

            $host = "localhost";
            $db = "MUSEUM";
            $userdb = "root";
            $passworddb = "";

                            

            $link = mysqli_connect($host, $userdb, $passworddb, $db)
            or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

                        $queryLog = "SELECT exName, author, content, date, time, price, photo, exhibition_id
                                     FROM exhibition 
                                     WHERE exhibition_id ='".$exid."'";

                        $resultOfexNameSelect = mysqli_query($link, $queryLog)
                        or die("Ошибка! ".mysqli_error($link));

                        $countexNamerows = mysqli_num_rows($resultOfexNameSelect);
                        $countexNamerow = mysqli_fetch_row($resultOfexNameSelect);


                echo "
        		    <div class='container'>
        			    <div class='row'>
        				    <div class='col title-block fadeInDown wow' data-wow-offset='100' 
                                                            data-wow-delay='0.3s' 
                                                            data-wow-duration='1s''>
                        		<h1>$countexNamerow[0]</h1>
                        		<h3>$countexNamerow[1]</h3>
                                <div>
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

        	                </div>
        			    </div>

        			    <div class='row main-row '>
            				<div class='col-sm-6 p-0 fadeInLeft wow' data-wow-offset='100' 
                                                            data-wow-delay='0.5s' 
                                                            data-wow-duration='2s''>
            					<img src='img/$countexNamerow[6]' width='100%'>
            				</div>

            				<div class='col-sm-6 ex-content fadeInRight wow' data-wow-offset='100' 
                                                            data-wow-delay='0.5s' 
                                                            data-wow-duration='2s''>
            					<p>$countexNamerow[2]</p>

                				<div class='dateprice'>
                					<label>$countexNamerow[3]</label>
                					<label>$countexNamerow[4]</label>
                				</div>

                				<div class='butt_price'>
                					<form method='post'>
                                        <input class='butt' type='submit' name='getOrder' value='Забронировать билет''>               
                                    </form>
        					        <label>$countexNamerow[5] р</label>
        				</div>";
                        $_SESSION['exid'] = $exid;
?>
                <?php
                    if($_POST['getOrder'] == "Забронировать билет" )
                        echo  "<script language='Javascript' type='text/javascript'>
                                function reload(){location = 'reservPage.php'};
                                reload();
                                </script>";
                ?>
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


<!-- В описании необходимо рассказать, что именно будет на выставке:

фотографии или картины – следует указать, портретные они или пейзажные, в каком стиле работает автор, какие темы поднимает, пользуется ли особыми техниками;
книги и периодические издания – нужно прописать их названия и имена авторов, коротко ознакомить читателей с содержанием (или темой – если выставка тематическая);
кратко (не более абзаца) описать судьбу писателя или поэта, если событие приурочено к его юбилею; если это выставка любительского творчества (детских рисунков, работ кружка декоративно-прикладного искусства и т. п.), обязательно рассказать о работах, авторах, по какому случаю они создавались (в рамках клуба, к празднику, в течение учебного года).
По этому же принципу составляется описание выставок любого типа. Главное: в центре повествования всегда должен быть объект выставки, и только потом – дополнительная информация.Бывают случаи, когда о предстоящей выставке известно совсем мало – например, организатор привезет авторский проект, но список экспонатов еще не утвержден. В таком случае можно рассказать о художнике (фотографе, скульпторе), его творческом пути, в каком жанре он работает, чем интересен сегодняшнему зрителю, какие настроения преобладают в его работах и т. д. -->