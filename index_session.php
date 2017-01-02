<?php
    //vkljucimo config
    include('config.php');
    session_start();

    // ce je seja 'idStranka' vzpostavljena
    if(isset($_SESSION['idStranka'])){
        $user_check = $_SESSION['idStranka'];
        $ses_sql = mysqli_query($db, "SELECT Ime FROM stranke WHERE idStranke = '$user_check'");
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
        $name = $row['Ime'];

        //display articles
        $select_articles = mysqli_query($db, "SELECT * FROM artikli");

    }
    // ce seja ni vzpostavljena, redirect na login
    else {
        header("Location: login.php");
    }
?>