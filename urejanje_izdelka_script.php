<?php
include('config.php');
$id = $_POST['id'];
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$zaloga = $_POST['zaloga'];
$cena = $_POST['cena'];
$s = mysqli_query($db, "UPDATE Artikli SET Naziv = '$naziv', Opis = '$opis', Zaloga = '$zaloga', Cena = '$cena' WHERE idArtikla = '$id'");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);

$newURL = 'prodajalec.php';
header('Location: '.$newURL);