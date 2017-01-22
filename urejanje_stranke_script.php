<?php
if(isset($_SESSION['idStranke'])){
    header("Location: login-staff.php");
}
include('config.php');

$id = $_GET['id'];
$ime = $_POST['name'];
$priimek = $_POST['sname'];
$geslo= md5($_POST['pass']);
$posta = $_POST['mail'];
$result = mysqli_prepare($db, "UPDATE Stranke SET Ime = ?, Priimek = ?, Eposta = ?, Geslo = ?, Aktiven = 1 WHERE idStranke = ?");

mysqli_stmt_bind_param($result, 'ssssi', $ime, $priimek, $posta, $geslo, $id);
mysqli_stmt_execute($result);
$result = $result->get_result();

$newURL = 'pregled_strank.php';
header('Location: '.$newURL);