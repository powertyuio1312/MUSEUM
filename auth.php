<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
if  (!empty($_POST["Mail"]) && !empty($_POST["Password"]))
    {        
        $mail = $_POST["Mail"];
        $pass = $_POST["Password"];
        //isSubscribe isAdmi

        

        	$host = "localhost";
    		$db = "MUSEUM";
    		$userdb = "root";
    		$passworddb = "";
                

    		$link = mysqli_connect($host, $userdb, $passworddb, $db)
    		or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

    		 $queryLog = "SELECT mail, user_id FROM user
        WHERE mail = '$mail'";

        $resultOfLOGINSelect = mysqli_query($link, $queryLog)
        or die("Ошибка! ".mysqli_error($link)); // возвращает obj

       

        $countLOGINrows = mysqli_num_rows($resultOfLOGINSelect); // кол-во строк запроса

            if($countLOGINrows != 0)
            { 

                $passHASH = md5($pass);

                $queryPass = "SELECT mail, isAdmin FROM user
                WHERE password = '$passHASH'";

                $resultOfPassSelect = mysqli_query($link, $queryPass)
                or die("Ошибка! ".mysqli_error($link));

                $countPASSrows = mysqli_num_rows($resultOfPassSelect);

                if($countPASSrows != 0)
                {
                    
                    $countexNamerow = mysqli_fetch_row($resultOfPassSelect);
                    $isAdmin = $countexNamerow[1];
                    if($isAdmin == 1){
                        $_SESSION['isAdmin'] = 1;
                    }
                    else{
                        $_SESSION['isAdmin'] = 0;
                    }
                   $_SESSION['MAIL'] = $mail;

                print "<script language='Javascript' type='text/javascript'>
                     function reload(){location = 'index.php'};
                     reload();
                     </script>";
                }
                else
                {
                    $ePass = "Пароль введен не верно.<br>";
                }
            }
            else
            {
                $eMail = "Пользователь с таким логином не найден.<br>";
            }
    

        mysqli_close($link);

        }

?>