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
        $customerId = $row['idStranke'];


        //display articles
        $select_articles = mysqli_query($db, "SELECT * FROM artikli");

        //martin
        $select_narocila = mysqli_query($db, "SELECT * FROM narocila");
        $select_customers = mysqli_query($db, "SELECT * FROM stranke");

        //get tax value (double)
        $selectTax = mysqli_query($db, "SELECT * FROM ddv WHERE aktiven = '0' LIMIT 1");
        $taxRow = mysqli_fetch_array($selectTax, MYSQLI_ASSOC);
        $tax = $taxRow['Vrednost'];
        $taxId = $taxRow['idDDV'];

        //get all customer's purchases
        $select_purchases = mysqli_query($db, "SELECT * FROM narocila WHERE idStranke = '$user_check'");

        $totalPrice = 0;


    }
    // ce seja ni vzpostavljena, redirect na login
    else {
        header("Location: login.php");
    }
?>