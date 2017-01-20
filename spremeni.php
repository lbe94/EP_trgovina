<?php
include('index_session.php');
$id = $_POST['id'];
$s = mysqli_query($db, "SELECT * FROM narocila WHERE idNarocila = '$id'");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);
$bool = 1;
$value = $result['Potrjeno'];
if ($result['Potrjeno'] == 0) {
    $s2 = mysqli_query($db, "SELECT * FROM Prodajalci WHERE Ime = '$name'");
    $result2 = mysqli_fetch_array($s2, MYSQLI_ASSOC);
    $idP = $result2['idProdajalca'];
    if ($_POST['storniraj']) {
        $s3 = mysqli_query($db, "UPDATE racuni SET Zakljucen = 1 WHERE idNarocila = '$id'");
        $result3 = mysqli_fetch_array($s3, MYSQLI_ASSOC);
    }
    else {
        $s3 = mysqli_query($db, "UPDATE racuni SET Aktiven = 1 WHERE idNarocila = '$id'");
        $result3 = mysqli_fetch_array($s3, MYSQLI_ASSOC);
    }
}
else if ($result['Potrjeno'] == 1) {
    $s2 = mysqli_query($db, "SELECT * FROM Prodajalci WHERE Ime = '$name'");
    $result2 = mysqli_fetch_array($s2, MYSQLI_ASSOC);
    $bool = 0;
    $idP = $result2['idProdajalca'];
    $dat =  date("Y-m-d h:i:sa");
    $s3 = mysqli_query($db, "INSERT INTO racuni ".
        "(idNarocila, idProdajalca, Aktiven, Zakljucen, DatumSpremembe) ".
        "VALUES ".
        "('$id', '$idP', 0, 0, '$dat')");
    $result3 = mysqli_fetch_array($s3, MYSQLI_ASSOC);
}

$s1 = mysqli_query($db, "UPDATE Narocila SET Potrjeno = '$bool' WHERE idNarocila = '$id'");
$result1 = mysqli_fetch_array($s1, MYSQLI_ASSOC);

$newURL = "pregled_narocila.php?id=$id&&s=$val";
header('Location: '.$newURL);
