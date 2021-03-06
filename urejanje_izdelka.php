<?php
if(isset($_SESSION['idStranke'])){
    header("Location: login-staff.php");
}
include('navbar.php');
include ('dodaj_stranko_script.php');

$id = $_POST['id'];
$s = mysqli_query($db, "SELECT * FROM artikli WHERE idArtikla = '$id'");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);
?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>E - trgovina</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="engine.js"></script>
    </head>
    <body>
	<?php
	if(isset($_SESSION['idAdministrator'])){
		echo $navadmin;
	}
	else if(isset($_SESSION['idProdajalca'])){
		echo $navprodajalec;
	}
	?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form method="post" action="izbrisi.php">
                    <input type="hidden" name="id" value="<?php echo $result['idArtikla'] ?>">
                    <button class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%; float:right; width: 10%">Izbrisi</button>
                </form>
                <h3 class="h3" >Urejanje izdelka</h3>
            </div>
            <form name="ime" action="urejanje_izdelka_script.php" method="post">
                <div class="panel-body" >
                    <input type="hidden" name="id" value="<?php echo $result['idArtikla'] ?>">
                    <label>Vnesite naziv izdelka:
                        <input type="name" name="naziv" placeholder="Vnesite naziv" value="<?php echo $result['Naziv'] ?>" required>
                    </label>
                    <br>
                    <br>
                    <label style="margin-left: 20px;">Vnesite opis izdelka:
                        <textarea type="name" name="opis" placeholder="Vnesite opis" style="width: 150%; height: 30%;" required><?php echo $result['Opis'] ?></textarea>
                    </label>
                    <br>
                    <br>
                    <label>Zaloga:
                        <input type="number" name="zaloga" placeholder="Vnesite vrednost zaloge" value="<?php echo $result['Zaloga'] ?>" required>
                    </label>
                    <label style="margin-left: 20px;">Cena:
                        <input type="number" name="cena" placeholder="Vnesite ceno" value="<?php echo $result['Cena']?>" required>
                    </label>
                </div>
                <div class="panel-footer">
                    <input type="submit" name="dodaj" class="btn btn-success btn-lg" value="Uredi"/>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
