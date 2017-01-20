<?php
include('config.php');
$id = $_GET['id'];
$s = mysqli_query($db, "DELETE FROM Prodajalci WHERE idProdajalca = '$id'");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);

$newURL = 'pregled_prodajalcev.php';
header('Location: '.$newURL);