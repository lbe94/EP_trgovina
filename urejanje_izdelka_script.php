<?php
if(!isset($_SESSION['idProdajalca']) || !isset($_SESSION['idAdministrator'])){
    header("Location: login-staff.php");
}
include('config.php');
$id = $_POST['id'];
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$zaloga = $_POST['zaloga'];
$cena = $_POST['cena'];
$result = mysqli_prepare($db, "UPDATE Artikli SET Naziv = ?, Opis = ?, Zaloga = ?, Cena = ? WHERE idArtikla = ?");

//bind parameters to prevent sql code injection
mysqli_stmt_bind_param($result, 'ssiii', $naziv, $opis, $zaloga, $cena, $id);
mysqli_stmt_execute($result);
$result = $result->get_result();

$newURL = 'prodajalec.php';
header('Location: '.$newURL);