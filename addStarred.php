<?
	$host = "localhost";
    $db = "MUSEUM";
    $userdb = "root";
    $passworddb = "";
                

    $link = mysqli_connect($host, $userdb, $passworddb, $db)
    or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

    $queryLog = "SELECT photo, exName, author, content, date, time, price, exhibition_id, isDisplay, likes_count FROM exhibition";

    $resultOfexNameSelect = mysqli_query($link, $queryLog)
    or die("Ошибка! ".mysqli_error($link));

    $countexNamerows = mysqli_num_rows($resultOfexNameSelect);


?>