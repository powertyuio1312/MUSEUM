<?php
session_start();
if  (!empty($_POST["Mail"]) && !empty($_POST["Password"])
        && !empty($_POST["Password1"]))
    {        
        $mail = $_POST["Mail"];
        $pass = $_POST["Password"];
        $pass1 = $_POST["Password1"];
        $isSubsc = $_POST["isSubscribe"];
        //isSubscribe isAdmi

        $regexMail = '/[0-9a-zA-Z]{3,}@\w*(mail)\\.[a-z]+$/';
        $regexPass = '/^[0-9a-zA-Zа-яёА-ЯЁ]{10,}$/u';

        $rez4 = strpos($mail, ".io");

        if(!preg_match($regexMail,$mail) || $rez4) 
        {
            $eMail = "Неправильный формат @mail";
        }
        else if(!preg_match($regexPass,$pass)) 
        {
            $ePass = "Проверь формат написания Password\n";
        }
        else if ($pass1 != $pass)
        {
            $ePass1 = "Пароли не совпали\n";
        }
        else
        {
            if(!empty($isSubsc))
            {
                $isSubsc = 1;
            }
            else
            {
                $isSubsc = 0;
            }

        	$host = "localhost";
    		$db = "MUSEUM";
    		$userdb = "root";
    		$passworddb = "";
                

    		$link = mysqli_connect($host, $userdb, $passworddb, $db)
    		or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

    		$passHASH = md5($pass);

                $HasMail = "SELECT mail FROM user
                WHERE mail = '$mail'";

                $resultOfHasMail = mysqli_query($link, $HasMail)
                or die("Ошибка! ".mysqli_error($link));

                $countHasMailrows = mysqli_num_rows($resultOfHasMail); // кол-во строк запроса

                if($countHasMailrows == 0)
                {
                    $_SESSION['mail'] = $mail;
                    $query = "INSERT INTO user(mail, password,  isSubscribe)
                    VALUES('$mail','$passHASH', '$isSubsc')";

                    $resultOfInsert = mysqli_query($link, $query)
                    or die("Ошибка! ".mysqli_error($link)); //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                        if($resultOfInsert)
                        {
                            // include 'authorisation.php';
                            print "<script language='Javascript' type='text/javascript'>
                                function reload(){location = 'authorisation.php'};
                                reload();
                                </script>";
                        }
                        else
                        {
                            $ePass = "Данные не были внесены в бд<br>";
                        }
                }
                else
                {
                    $eMail = "Пользователь с таким логином существует";
                }
    }
}
?>