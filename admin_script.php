<?php
/**
 * Created by PhpStorm.
 * User: Puska
 * Date: 15. 01. 2017
 * Time: 01:30
 */


if(isset($_POST['login'])){
    // vkljucimo config datoteko, kjer so nastavljeni parametri za strežnik in se vzpostavi povezava ($db)
    include("config.php");
    session_start();

    // varnostni parametri, da preprecimo sql
    //TODO: html special chars
    $username = strip_tags(($_POST['username']));
    $password = strip_tags(($_POST['password']));
    $username = stripslashes(($_POST['username']));
    $password = stripslashes(($_POST['password']));
    $username = mysqli_real_escape_string($db, ($_POST['username']));
    $password = mysqli_real_escape_string($db, ($_POST['password']));

	
	$sql = "SELECT * FROM prodajalci WHERE Eposta = '$username' LIMIT 1";
    $query = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($query);
	$id = $row['idProdajalca'];
	$db_password = $row['Geslo'];
	
	if($db_password == NULL){
		$sql = "SELECT * FROM administrator WHERE Eposta = '$username' LIMIT 1";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$id = $row['idAdministrator'];
		$db_password = $row['Geslo'];
		
		// ce je vpisano geslo (md5 za enkripcijo) enako kot geslo v db, se prijavimo
		if(md5($password) == $db_password){
			$_SESSION['idAdministrator'] = $id;
			header("Location: admin.php");
		}
    }
	else{
		
		// ce je vpisano geslo (md5 za enkripcijo) enako kot geslo v db, se prijavimo
		if(md5($password) == $db_password){
			$_SESSION['idProdajalca'] = $id;
			header("Location: prodajalec.php");
		}
	}
}
?>