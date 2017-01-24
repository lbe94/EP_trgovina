<?php
include('index_session_prodajalec.php');
$id = $_POST['id'];
$s = mysqli_prepare($db, "SELECT * FROM narocila WHERE idNarocila = ?");
mysqli_stmt_bind_param($s, 'i', $id);
mysqli_stmt_execute($s);
$s =$s->get_result();
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);
$bool = 1;
$value = $result['Potrjeno'];
if ($result['Potrjeno'] == 0) {
    $s2 = mysqli_prepare($db, "SELECT * FROM Prodajalci WHERE Ime = ?");
    mysqli_stmt_bind_param($s2, 's', $name);
    mysqli_stmt_execute($s2);
    $s2 = $s2->get_result();
    $result2 = mysqli_fetch_array($s2, MYSQLI_ASSOC);
    $idP = $result2['idProdajalca'];
    if ($_POST['storniraj']) {
        $s3 = mysqli_prepare($db, "UPDATE racuni SET Zakljucen = 1 WHERE idNarocila = ?");
        mysqli_stmt_bind_param($s3, 'i', $id);
        mysqli_stmt_execute($s3);
        $s3 = $s3->get_result();
        $result3 = mysqli_fetch_array($s3, MYSQLI_ASSOC);
    }
    else {
        $s3 = mysqli_prepare($db, "UPDATE racuni SET Aktiven = 1 WHERE idNarocila = ?");
        mysqli_stmt_bind_param($s3, 'i', $id);
        mysqli_stmt_execute($s3);
        $s3 = $s3->get_result();
        $result3 = mysqli_fetch_array($s3, MYSQLI_ASSOC);
    }
}
else if ($result['Potrjeno'] == 1) {
    $s2 = mysqli_prepare($db, "SELECT * FROM Prodajalci WHERE Ime = ?");
    mysqli_stmt_bind_param($s2, 's', $name);
    mysqli_stmt_execute($s2);
    $s2 = $s2->get_result();
    $result2 = mysqli_fetch_array($s2, MYSQLI_ASSOC);
    $bool = 0;
    $idP = $result2['idProdajalca'];
    $dat =  date("Y-m-d h:i:sa");
    $s3 = mysqli_prepare($db, "INSERT INTO racuni ".
        "(idNarocila, idProdajalca, Aktiven, Zakljucen, DatumSpremembe) ".
        "VALUES ".
        "(?, ?, 0, 0, ?)");
    mysqli_stmt_bind_param($s3, 'iid', $id, $idP, $dat);
    mysqli_stmt_execute($s3);
    $s3 = $s3->get_result();
    $result3 = mysqli_fetch_array($s3, MYSQLI_ASSOC);
}

$s1 = mysqli_prepare($db, "UPDATE Narocila SET Potrjeno = '$bool' WHERE idNarocila = ?");
mysqli_stmt_bind_param($s1, 'i', $id);
mysqli_stmt_execute($s1);
$s1 = $s1->get_result();
$result1 = mysqli_fetch_array($s1, MYSQLI_ASSOC);

$newURL = "pregled_narocila.php?id=$id&&s=$val";
header('Location: '.$newURL);
