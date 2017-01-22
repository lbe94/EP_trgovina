<?php
if(isset($_SESSION['idStranke'])){
    header("Location: login-staff.php");
}
include('config.php');

$id = $_GET['id'];
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$zaloga = $_POST['zaloga'];
$cena = $_POST['cena'];
$cifra = 0;
$s = mysqli_prepare($db, "INSERT INTO artikli ".
    "(Naziv, Opis, Zaloga, Cena, Aktiven) ".
    "VALUES ".
    "(?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($s, 'ssidi', $naziv, $opis, $zaloga, $cena, $cifra);
mysqli_stmt_execute($s);
$s = $s->get_result();
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);

$newURL = 'prodajalec.php';
header('Location: '.$newURL);