<?php
include('config.php');

$id = $_GET['id'];
$ime = $_POST['name'];
$priimek = $_POST['sname'];
$geslo= md5($_POST['pass']);
$posta = $_POST['mail'];
$result = mysqli_prepare($db, "UPDATE prodajalci SET Ime = ?, Priimek = ?, Eposta = ?, Geslo = ?, Aktiven = 1 WHERE idProdajalca = ?");

//bind parameters to prevent sql code injection
mysqli_stmt_bind_param($result, 'ssssi', $ime, $priimek, $posta, $geslo, $id);
mysqli_stmt_execute($result);
$result = $result->get_result();

$newURL = 'pregled_prodajalcev.php';
header('Location: '.$newURL);