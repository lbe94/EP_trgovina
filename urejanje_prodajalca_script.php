<?php
include('config.php');

$id = $_GET['id'];
$ime = $_POST['name'];
$priimek = $_POST['sname'];
$geslo= md5($_POST['pass']);
$posta = $_POST['mail'];
$s = mysqli_query($db, "UPDATE prodajalci SET Ime = '$ime', Priimek = '$priimek', Eposta = '$posta', Geslo = '$geslo', Aktiven = 1 WHERE idProdajalca = '$id'");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);

$newURL = 'pregled_prodajalcev.php';
header('Location: '.$newURL);