<?php
    //vkljucimo config
    include('config.php');
    session_start();

    // ce je seja 'idStranka' vzpostavljena
    if(isset($_SESSION['idStranka'])){

        $user_check = $_SESSION['idStranka'];
        $ses_sql = mysqli_query($db, "SELECT * FROM stranke WHERE idStranke = '$user_check'");
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    }

    else if (isset($_SESSION['idAdministrator'])){
        
		$user_check = $_SESSION['idAdministrator'];
		$ses_sql = mysqli_query($db, "SELECT * FROM administrator WHERE idAdministrator = '$user_check'");
		$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    }
	
	else if (isset($_SESSION['idProdajalca'])){

		$user_check = $_SESSION['idProdajalca'];
		$ses_sql = mysqli_query($db, "SELECT * FROM prodajalci WHERE idProdajalca = '$user_check'");
		$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    }
	
    // ce seja ni vzpostavljena, redirect na login
    else {
       header("Location: guest.php");
    }

	$name = $row['Ime'];
	$surname= $row['Priimek'];
	$email = $row['Eposta'];
	
	//display articles
	$select_articles = mysqli_query($db, "SELECT * FROM artikli");

	//martin
	$select_narocila = mysqli_query($db, "SELECT * FROM narocila");
	$select_customers = mysqli_query($db, "SELECT * FROM stranke");

	//select all sellers
	$select_sellers = mysqli_query($db, "SELECT * FROM prodajalci");
	
	//get tax value (double)
	$selectTax = mysqli_query($db, "SELECT * FROM ddv WHERE aktiven = '0' LIMIT 1");
	$taxRow = mysqli_fetch_array($selectTax, MYSQLI_ASSOC);
	$tax = $taxRow['Vrednost'];

	//get all customer's purchases
	$select_purchases = mysqli_query($db, "SELECT * FROM narocila WHERE idStranke = '$user_check'");
	

?>