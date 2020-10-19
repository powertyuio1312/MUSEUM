<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Main</title>

    <style type="text/css">
    	header{
    		display: flex;
    		/*background-color: #5C3F5A;*/
    		padding: 1% 1% 0 1%;
    		justify-content: space-between;
    	}
    	.form-block{
    		display: flex;
    	}

    	.input-search{
    		border-radius: 20px;
    		background: #eeeeee;
    		color: #CB917E;
    		font-size: 0.5em;
    	}
    	.btn-search{
    		padding: 0;
    		width: 10%;
    		height: 50%;
    		margin-right: 5%;

    	}
        .search-block
        {
                display: flex;
        }
    	.enter img{
    	width: 30px;
    	height: 30px;
    	}
    	.enter{
    	}
    	a {
    		font-size: 1em;
    		text-decoration: none;
    		color: #5C3F5A;
    	}
    	a:hover {
    		text-decoration: none;
    		color: #8E668C;
    	}

		.my-nav{
			padding-left: 20%;
			/*background-color: #5C3F5A;*/
			color: #FDD5C8;
			font-size: 0.7em;

		}

        .nav-el {
            /*background-color: #5C3F5A;*/
            color: #5C3F5A;
        }
	    .nav-el:hover{
	    	/*background-color: #FAF2E8;*/
			color: #5C3F5A;
            border-bottom: 1px solid;
	    }
	    @media only screen and (max-width: 414px)
	    {
	    	.search-block{
	    		display: none;
	    	}
	    }
		



    </style>
  </head>
  <body style="background-color: #FAF2E8; color: #5C3F5A;">
 <header>
    <a href="index.php" class="navbar-brand">
        <img src="img/Лого/лого2текст.png" width="110px" height="45px" alt="logo" />
    </a>
        <form class="form-block my-2 my-lg-0">
            <div class="search-block">
                <input type="text" class="input-search form-control mr-sm-2" placeholder="Поиск" aria-label="search">
                <button class="btn btn-search my-2 my-sm-0">
                    <img src="img/search.png" width="100%">
                </button>
            </div>
            <div class="enter">
                <?php
            if(!empty($_SESSION["MAIL"]))
            {
                 echo "<a href='registration.php'>
                    <img src='img/exit.png' alt='Выход' title='Выход'>
                </a>";
                
            }
            else
            {
                echo "<a href='registration.php'>
                    <img src='img/enter.png' alt='Вход/Регистрация' title='Вход/Регистрация''>
                </a>";
                // $_SESSION["MAIL"] = "";
                // session_destroy();
            }
            ?>
                
                </div>
        </form>

</header>
<div class="container-fluid my-nav">
        <div class="row">
            <a class="nav-el col-md-3" href="exhibitions.php">Выставки</a>
            <a class="nav-el col-md-3" href="#">Галерея</a>
            <a class="nav-el col-md-3" href="#">Контакты</a>
            <?php
            if($_SESSION["MAIL"] && $_SESSION['isAdmin'] == 0)
            {
                 echo "<a class='nav-el col-md-3' href='office.php''>Кабинет</a>";
            }
            else if($_SESSION["MAIL"] && $_SESSION['isAdmin'] == 1)
            {
                echo "<a class='nav-el col-md-3' href='adminOffice.php''>Администрирование</a>";
            }
            ?>
        </div>
    
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>