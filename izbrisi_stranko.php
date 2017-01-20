<?php
include('config.php');
$id = $_POST['id'];
$s = mysqli_query($db, "DELETE FROM Stranke WHERE idStranke = '$id'");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);

$newURL = 'pregled_strank.php';
header('Location: '.$newURL);