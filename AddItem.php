<?php
	if  (!empty($_POST["Name"]) && !empty($_POST["Author"])
		&& !empty($_POST["Content"]) && !empty($_POST["Date"])
		&& !empty($_POST["Time"]) && !empty($_POST["Price"])
		&& !empty($_POST["Photo"]))
    {        
        $name = $_POST["Name"];
        $author = $_POST["Author"];
        $content = $_POST["Content"];
        $date = $_POST["Date"];
        $time = $_POST["Time"];
        $price = $_POST["Price"];
        $photo = $_POST["Photo"];

		$host = "localhost";
        $db = "MUSEUM";
        $userdb = "root";
        $passworddb = "";
                                

        $link = mysqli_connect($host, $userdb, $passworddb, $db)
                or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

                    $queryLog = "INSERT INTO `exhibition` (`exName`, `author`, `content`, `date`, `time`, `price`, `photo`) 
                    			 VALUES ('".$name."', '".$author."', '".$content."', '".$date."', '".$time."', '".$price."', '".$photo."')";

        $resultOfInsert = mysqli_query($link, $queryLog)
                or die("Ошибка! ".mysqli_error($link));


        if($resultOfInsert)
        {
        	print "<script language='Javascript' type='text/javascript'>
                    alert('Готово');
                    function reload(){location = 'adminOffice.php'};
                    reload();
                    </script>";
        }


    }
?>