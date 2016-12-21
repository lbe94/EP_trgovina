<?php
    if (isset($_POST['dodaj'])) {
        // vkljucimo config datoteko, kjer so nastavljeni parametri za strežnik in se vzpostavi povezava ($db)
        include("config.php");

        // varnostni parametri, da preprecimo sql injection
        $name = strip_tags(($_POST['name']));
        $sname = strip_tags(($_POST['sname']));
        $name = stripslashes(($_POST['name']));
        $sname = stripslashes(($_POST['sname']));
        $name = mysqli_real_escape_string($db, ($_POST['name']));
        $sname = mysqli_real_escape_string($db, ($_POST['sname']));
        $mail = strip_tags(($_POST['mail']));
        $mail = stripslashes(($_POST['mail']));
        $mail = mysqli_real_escape_string($db, ($_POST['mail']));
        $pass = strip_tags(($_POST['pass']));
        $pass = stripslashes(($_POST['pass']));
        $pass = mysqli_real_escape_string($db, ($_POST['pass']));
        console($name);

        $sql = "INSERT INTO stranke VALUES ($name, $sname, $pass, $geslo, 0)";
        $query = mysqli_query($db, $sql);
    }
?>