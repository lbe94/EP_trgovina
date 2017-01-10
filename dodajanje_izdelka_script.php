<?php
include('config.php');

$id = $_GET['id'];
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$zaloga = $_POST['zaloga'];
$cena = $_POST['cena'];
$cifra = 0;
$s = mysqli_query($db, "INSERT INTO artikli ".
    "(Naziv, Opis, Zaloga, Cena, Aktiven) ".
    "VALUES ".
    "('$naziv', '$opis', '$zaloga', '$cena', '$cifra')");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);

$newURL = 'prodajalec.php';
header('Location: '.$newURL);