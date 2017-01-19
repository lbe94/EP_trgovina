<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 19. 01. 2017
 * Time: 18:57
 */

include('artikel.php');
include('index_session.php');

    $totalPrice = 0;

    foreach ($_SESSION['cart'] as $sis) {
        $totalPrice = $totalPrice + $sis['artikel'] -> getCena() * $sis['quantity'];
    }

    $dateNow = date("Y-m-d H:i:s");
    $sql = mysqli_query($db, "INSERT INTO narocila (idStranke, DatumOddaje, Potrjeno, Znesek, idDDV) VALUES ('$customerId', '$dateNow', '1', '$totalPrice', '$taxId')");
    // get the last inserted value
    $idNarocilaTmp = mysqli_insert_id($db);


    if($sql == TRUE){
        foreach ($_SESSION['cart'] as $sis) {
            $articleIdTmp = $sis['artikel'] -> getIdArtikla();
            $quantityTmp = $sis['quantity'];
            $separateSql = mysqli_query($db, "INSERT INTO narocila_det (idNarocila, idArtikla, Kolicina) VALUES ('$idNarocilaTmp', '$articleIdTmp', '$quantityTmp')");
        }
        unset($_SESSION['cart']);
        $_SESSION['message'] = "Vaš nakup je bil uspešno zaključen";
        header("Location: index.php");
    }
    else {
        $_SESSION['error']= "Nakup ni bil uspešno zaključen";
        header("Location: index.php");
    }

?>