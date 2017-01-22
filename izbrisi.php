<?php
include('config.php');
$id = $_POST['id'];
$result = mysqli_prepare($db, "DELETE FROM Artikli WHERE idArtikla = ?");

//bind parameters to prevent sql code injection
mysqli_stmt_bind_param($result, 'i', $id);
mysqli_stmt_execute($result);
$result = $result->get_result();

$newURL = 'prodajalec.php';
header('Location: '.$newURL);