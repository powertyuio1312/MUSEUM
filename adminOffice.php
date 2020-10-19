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
						<li><a href="adminOffice.php">Редактирование</a></li>
						<li><a href="adminStatistic.php">Статистика</a></li>
						<li><img src="img/Лого/лого2.png" width="100%"></li>
					</ul>
				</div>
				<div class="col-sm-8 text-center justify-content-center news-cont">
					<h1>Редактирование</h1><br>
                        <!--  text-center justify-content-center -->
                                        <div class="row">
                            <form method="POST" class="add-item" action="DelItem.php">

                                <h3>Не отображать выставку:</h3><br><br>
                                
                                <label>Название выставки</label><br>
                                <input class="text" type="text" name="DelByName" maxlength="50" size="25" value="">
                                <br><span class="error"><?=@$eMail;?></span><br>

                                 <input class="butt" type="submit" name="DelButt"  value="Удалить">
                            </form>
                    </div>  
                    <div class="row">
                            <form method="POST" class="add-item" action="AddItem.php">

                                <h3>Добавить выставку:</h3><br><br>
                                
                                <label>Название выставки</label><br>
                                <input class="text" type="text" name="Name" maxlength="50" size="25" value="">
                                <br><br><!-- <span class="error"><?=@$eMail;?></span><br> -->
                                
                                <label>Автор</label><br>
                                <input class="text" type="text" name="Author" maxlength="50" size="25" value=""><br><br>
                                
                                <label>Контент</label><br>
                                <input class="text" type="text" name="Content" maxlength="50" size="25" value=""><br><br>

                                <label>Дата</label><br>
                                <input class="text" type="text" name="Date" maxlength="50" size="25" value="2020-03-01"><br><br>

                                <label>Время</label><br>
                                <input class="text" type="text" name="Time" maxlength="50" size="25" value="34:00:00"><br><br>

                                <label>Цена</label><br>
                                <input class="text" type="text" name="Price" maxlength="50" size="25" value=""><br><br>

                                <label>Фото</label><br>
                                <input class="text" type="text" name="Photo" maxlength="50" size="25" value="photoName.jpg"><br><br>
                                <br>

                                 <input class="butt" type="submit" name="AddButt"  value="Добавить">

                                 
                            </form>
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
