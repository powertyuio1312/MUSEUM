<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
if  (!empty($_POST["Name"]) && !empty($_POST["Surname"]))
    {        
        $name = $_POST["Name"];
        $surname = $_POST["Surname"];
        //isSubscribe isAdmi

        

        	$host = "localhost";
    		$db = "MUSEUM";
    		$userdb = "root";
    		$passworddb = "";


            
            

    		$link = mysqli_connect($host, $userdb, $passworddb, $db)
    		or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

            ///////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////////
            $queryLog = "SELECT user_id 
                        FROM user 
                        WHERE mail ='".$_SESSION['MAIL']."'";

            $resultOfexNameSelect = mysqli_query($link, $queryLog)
            or die("Ошибка select! ".mysqli_error($link));

            $countexNamerows = mysqli_num_rows($resultOfexNameSelect);
            $countexNamerow = mysqli_fetch_row($resultOfexNameSelect);

            $userID = $countexNamerow[0];
            //////////////////////////////////////////////
            ///////////////////////////////////////////////////////

            $query = "INSERT INTO `reservation` ( `Name`, `Surname`, `exID`, `userID`) 
                        VALUES ('".$name."', '".$surname."', '".$_SESSION['exid']."', '".$userID."')";

            $resultOfInsert = mysqli_query($link, $query)
            or die("Ошибка insert! ".mysqli_error($link)); 



            if($resultOfInsert)
                {
                            // include 'authorisation.php';
                    print "<script language='Javascript' type='text/javascript'>
                    alert('Готово! Просмотреть свои заказы можно в личном кабинете в разделе Заказы.');
                            function reload(){location = 'office.php'};
                                reload();
                                </script>";
                }
                else
                {
                    $ePass = "Данные не были внесены в бд<br>";
                }
    

        mysqli_close($link);

        }

?>