<?php
include('config.php');
if(!isset($_SESSION['idAdministrator'])){
    header("Location: login-staff.php");
}
$id = $_GET['id'];
$result = mysqli_prepare($db, "DELETE FROM Prodajalci WHERE idProdajalca = ?");

//bind parameters to prevent sql code injection
mysqli_stmt_bind_param($result, 'i', $id);
mysqli_stmt_execute($result);
$result = $result->get_result();

$newURL = 'pregled_prodajalcev.php';
header('Location: '.$newURL);