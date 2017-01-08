<?php
    //vkljucimo config
    include('config.php');
    session_start();

    // ce je seja 'idStranka' vzpostavljena
    if(isset($_SESSION['idStranka'])){
        $user_check = $_SESSION['idStranka'];
        $ses_sql = mysqli_query($db, "SELECT * FROM stranke WHERE idStranke = '$user_check'");
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
        $name = $row['Ime'];
        $surname=$row['Priimek'];
        $email = $row['Eposta'];


        //display articles
        $select_articles = mysqli_query($db, "SELECT * FROM artikli");

        $selectTax = mysqli_query($db, "SELECT * FROM ddv WHERE aktiven = '0' LIMIT 1");
        $taxRow = mysqli_fetch_array($selectTax, MYSQLI_ASSOC);
        $tax = $taxRow['Vrednost'];

    }
    // ce seja ni vzpostavljena, redirect na login
    else {
        header("Location: login.php");
    }
?>