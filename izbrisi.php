<?php
include('config.php');
$id = $_POST['id'];
$s = mysqli_query($db, "DELETE FROM Artikli WHERE idArtikla = '$id'");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);

$newURL = 'prodajalec.php';
header('Location: '.$newURL);