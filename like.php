<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

    $host = "localhost";
    $db = "MUSEUM";
    $userdb = "root";
    $passworddb = "";
                

    $link = mysqli_connect($host, $userdb, $passworddb, $db)
    or die("Ошибка с подключением к базе данных! ".mysqli_error($link)."<br>");

        if(isset($_SESSION['MAIL'])){

            if(isset($_POST['id'])){


            $id= $_POST['id'];
            $mail = $_SESSION['MAIL'];

            $query="SELECT user_id FROM user WHERE mail='$mail'";

            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
            if($result)            {
                $row = mysqli_fetch_row($result);
                $idUser=$row[0];
                mysqli_free_result($result);

            }


            $query="SELECT * FROM starred WHERE exID='$id' AND userID='$idUser'";

            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
            if($result)
            {
                $row = mysqli_fetch_row($result);
                // var_dump($row[0]);
                mysqli_free_result($result);

            }
            if(!$row[0]){

                $query="INSERT INTO starred (exID,userID) VALUES ('$id','$idUser')";

                $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                if($result){
                    echo "<script language='Javascript' type='text/javascript'>
                    alert ('Ваша оценка записана! ');
                    </script>";
            }


        }
        else{
            echo "<script language='Javascript' type='text/javascript'>
            alert ('Вы уже оценивали этот фильм!');

            </script>";
        }
    }
    else{
        echo "<script language='Javascript' type='text/javascript'>
        alert ('Что-то пошло не так!');

        </script>";
    }
}
else{
    echo "<script language='Javascript' type='text/javascript'>
    alert ('Оценивать фильм могу только авторизованные пользователи! ');

    </script>";
}

?>