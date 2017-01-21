<?php
    //vkljucimo config
    include('config.php');
    session_start();

    // ce je seja 'idStranka' vzpostavljena
    if(isset($_SESSION['idStranka'])){

        $user_check = $_SESSION['idStranka'];
        $ses_sql = mysqli_prepare($db, "SELECT * FROM stranke WHERE idStranke = ?");
        //bind parameters to prevent sql injection
        mysqli_stmt_bind_param($ses_sql, 'i', $user_check);
        mysqli_stmt_execute($ses_sql);
        $ses_sql = $ses_sql->get_result();

        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
        $name = $row['Ime'];
        $surname=$row['Priimek'];
        $email = $row['Eposta'];
        $customerId = $row['idStranke'];


        //display articles
        $select_articles = mysqli_query($db, "SELECT * FROM artikli");
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

        //get tax value (double)
        $selectTax = mysqli_query($db, "SELECT * FROM ddv WHERE aktiven = '0' LIMIT 1");
        $taxRow = mysqli_fetch_array($selectTax, MYSQLI_ASSOC);
        $tax = $taxRow['Vrednost'];
        $taxId = $taxRow['idDDV'];
	//select all sellers
	$select_sellers = mysqli_query($db, "SELECT * FROM prodajalci");

	//get tax value (double)
	$selectTax = mysqli_query($db, "SELECT * FROM ddv WHERE aktiven = '0' LIMIT 1");
	$taxRow = mysqli_fetch_array($selectTax, MYSQLI_ASSOC);
	$tax = $taxRow['Vrednost'];

        //get all customer's purchases
        $select_purchases= mysqli_prepare($db, "SELECT * FROM narocila WHERE idStranke = ? ORDER BY idNarocila desc");
        //bind parameters to prevent sql injection
        mysqli_stmt_bind_param($select_purchases, 'i', $user_check);
        mysqli_stmt_execute($select_purchases);
        $select_purchases = $select_purchases->get_result();

        if(isset($_SESSION['cart'])){
            $numberOfItemsInCart = 0;
            foreach ($_SESSION['cart'] as $cartItem){
                $numberOfItemsInCart = $numberOfItemsInCart + $cartItem['quantity'];
            }
        }

        //switch to https
        // TODO: NEEDS special attention and certificate installation
        if ($_SERVER['SERVER_PORT']!=443)
        {
            $url = "https://". $_SERVER['SERVER_NAME'] . ":443".$_SERVER['REQUEST_URI'];
            header("Location: $url");
        }


    }
    // ce seja ni vzpostavljena, redirect na login
    else {
        header("Location: login.php");
    }


?>