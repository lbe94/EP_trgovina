<?php
session_start();

if(isset($_POST['login'])){
    // vkljucimo config datoteko, kjer so nastavljeni parametri za strežnik in se vzpostavi povezava ($db)
    include("config.php");

    // varnostni parametri, da preprecimo sql
    $username = strip_tags(($_POST['username']));
    $password = strip_tags(($_POST['password']));
    $username = stripslashes(($_POST['username']));
    $password = stripslashes(($_POST['password']));
    $username = mysqli_real_escape_string($db, ($_POST['username']));
    $password = mysqli_real_escape_string($db, ($_POST['password']));

    //brisanje html znakov
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $sql = "SELECT * FROM stranke WHERE Eposta = ? LIMIT 1";
    $query = mysqli_prepare($db, $sql);

    //bind parameters to prevent sql injection
    mysqli_stmt_bind_param($query, 's', $username);
    mysqli_stmt_execute($query);
    $query = $query->get_result();

    $row = mysqli_fetch_array($query);
    $id = $row['idStranke'];
    $db_password = $row['Geslo'];

    // ce je vpisano geslo (md5 za enkripcijo) enako kot geslo v db, se prijavimo
    if(md5($password) == $db_password){
        $_SESSION['idStranka'] = $id;
        header("Location: index.php");
    }
    else {

    }

}
?>