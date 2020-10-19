<?
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<?
	$error = '';
	$msg = '';
	$user_id = $_SESSION["MAIL"];
	$ex_id = $_SESSION["exid"];

	$host = "localhost";
    $db = "MUSEUM";
    $userdb = "root";
    $passworddb = "";
                

    $link = mysqli_connect($host, $userdb, $passworddb, $db)
    or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

    $queryLog = "SELECT COUNT(*) 
    FROM starred
    WHERE userid = $user_id AND exID = $ex_id";

    $resultOfexNameSelect = mysqli_query($link, $queryLog)
    or die("Ошибка! ".mysqli_error($link));

    $countexNamerows = mysqli_num_rows($resultOfexNameSelect);


?>