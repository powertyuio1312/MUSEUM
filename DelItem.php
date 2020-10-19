<?php
	if  (!empty($_POST["DelByName"]))
    {        
        $ExName = $_POST["DelByName"];

		$host = "localhost";
        $db = "MUSEUM";
        $userdb = "root";
        $passworddb = "";
                                

        $link = mysqli_connect($host, $userdb, $passworddb, $db)
                or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

                    $queryLog = "UPDATE `exhibition` 
                                 SET `isDisplay` = '0' 
                                 WHERE `exName` = '".$ExName."'";

        $resultOfexNameSelect = mysqli_query($link, $queryLog)
                or die("Ошибка! ".mysqli_error($link));

                var_dump($resultOfexNameSelect);

        if($resultOfexNameSelect)
        {
            print "<script language='Javascript' type='text/javascript'>
                    alert('Данные изменены.');
                    function reload(){location = 'adminOffice.php'};
                    reload();
                    </script>";
        }
        else{
            print "<script language='Javascript' type='text/javascript'>
                    alert('Ошибка');
                    function reload(){location = 'adminOffice.php'};
                    reload();
                    </script>";            
        }


    }
?>