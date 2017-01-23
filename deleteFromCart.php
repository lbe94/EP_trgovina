<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 2. 01. 2017
 * Time: 11:16
 */

include('config.php');
include('artikel.php');
include('index_session.php');

//$page = 'index.php';

if(isset($_POST['idArtikla'])){
    $id = $_POST['idArtikla'];

//unset($_SESSION['cart']);
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }

    if(empty($_SESSION['cart'])){
        unset($_SESSION['cart']);
    }
    echo "Success";
}

else {
    header("Location: index.php");
}


?>