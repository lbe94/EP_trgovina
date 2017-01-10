<?php

include('config.php');
$ime = $_POST['name'];
$priimek = $_POST['sname'];
$eposta = $_POST['mail'];
$geslo = $_POST['pass'];
$geslo1 = $_POST['pass2'];
if ($geslo != $geslo1) {
    $newURL = 'dodajanje_stranke.php?err=1';
    header('Location: '.$newURL);
}
else {
    $cifra = 1;
    $geslo = md5($geslo);
    $sql = "INSERT INTO stranke ".
        "(Ime, Priimek, Eposta, Geslo, Aktiven) ".
        "VALUES ".
        "('$ime', '$priimek', '$eposta', '$geslo', '$cifra')";
    $s = mysqli_query($db,$sql);
    $result = mysqli_fetch_array($s, MYSQLI_ASSOC);

    $newURL = 'pregled_strank.php';
    header('Location: '.$newURL);
}

