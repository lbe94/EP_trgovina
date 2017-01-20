<?php
    session_start();
		if (isset($_SESSION['idAdministrator']) || isset($_SESSION['idProdajalca'])){
			session_destroy();
			header("Location: login-staff.php");
		}
		else{
			session_destroy();
			header("Location: login.php");			
		}
        exit();
?>