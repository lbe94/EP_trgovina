<?php
include('config.php');
$id = $_POST['id'];
$result = mysqli_prepare($db, "DELETE FROM Stranke WHERE idStranke = ?");

//bind parameters to prevent sql code injection
mysqli_stmt_bind_param($result, 'i', $id);
mysqli_stmt_execute($result);
$result = $result->get_result();

$newURL = 'pregled_strank.php';
header('Location: '.$newURL);