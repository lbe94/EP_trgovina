<?php
/**
 * Created by PhpStorm.
 * User: Puska
 * Date: 13. 01. 2017
 * Time: 21:34
 */

if(isset($_POST['register'])){
    // vkljucimo config datoteko, kjer so nastavljeni parametri za strežnik in se vzpostavi povezava ($db)
    include("config.php");

    // varnostni parametri, da preprecimo sql
    //TODO: html special chars
    $ime = strip_tags(($_POST['ime']));
    $priimek = strip_tags(($_POST['priimek']));
    $email = strip_tags(($_POST['email']));
    $pass1 = strip_tags(($_POST['password1']));
    $pass2 = strip_tags(($_POST['password2']));

    $ime = stripslashes(($_POST['ime']));
    $priimek = stripslashes(($_POST['priimek']));
    $email = stripslashes(($_POST['email']));
    $pass1 = stripslashes(($_POST['password1']));
    $pass2 = stripslashes(($_POST['password2']));

    $ime = mysqli_real_escape_string($db, ($_POST['ime']));
    $priimek = mysqli_real_escape_string($db,($_POST['priimek']));
    $email = mysqli_real_escape_string($db,($_POST['email']));
    $pass1 = mysqli_real_escape_string($db,($_POST['password1']));
    $pass2 = mysqli_real_escape_string($db,($_POST['password2']));

    $email = htmlspecialchars($email);
    $pass1 = htmlspecialchars($pass1);
    $pass2 = htmlspecialchars($pass2);
    $ime = htmlspecialchars($ime);
    $priimek = htmlspecialchars($priimek);

    if($pass1 == $pass2){
        $pass1 = md5($pass1);
        $sql = "SELECT idStranke FROM stranke WHERE Eposta = '$email'";
        $query = mysqli_query($db, $sql);

        if ($query->num_rows == 0) {
           $sql = "INSERT INTO stranke (idStranke, Ime, Priimek, Eposta, Geslo, Aktiven)
                  VALUES (NULL, '$ime', '$priimek', '$email', '$pass1', '0')";

            $dbWrite = mysqli_query($db, $sql);

            if ($dbWrite) {  //  if query successful
                echo "Success!";
            } else {  //  if query failed
                die("Database query failed. " . mysqli_error($db));
            }
        }
    }
    else{
        echo "passwords did not match";
    }
}




?>