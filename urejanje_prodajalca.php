<?php
include('navbar.php');
include ('dodaj_prodajalca_script.php');
if(!isset($_SESSION['idAdministrator'])){
    header("Location: login-staff.php");
}
$id = $_GET['id'];
$s = mysqli_query($db, "SELECT * FROM prodajalci WHERE idProdajalca = '$id'");
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
	<?php echo $navadmin;?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="izbrisi_prodajalca.php?id=<?php echo $result['idProdajalca'] ?>" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%; float:right; width: 10%">Izbrisi</a>
                <h3 class="h3" >Urejanje prodajalca</h3>
            </div>
            <form name="ime" action="urejanje_prodajalca_script.php?id=<?php echo $result['idProdajalca'] ?>" method="post">
                <div class="panel-body" >
                    <label>Vnesite ime:
                        <input type="name" name="name" placeholder="Vnesite ime" value="<?php echo $result['Ime'] ?>" required>
                    </label>
                    <label style="margin-left: 20px;">Vnesite priimek:
                        <input type="name" name="sname" placeholder="Vnesite priimek" value="<?php echo $result['Priimek'] ?>" required>
                    </label>
                    <br>
                    <br>
                    <label>Ceslo:
                        <input type="password" name="pass" placeholder="Vnesite geslo" required>
                    </label>
                    <label style="margin-left: 20px;">Eposta:
                        <input type="email" name="mail" placeholder="Vnesite elektronsko posto" value="<?php echo $result['Eposta']?>" required>
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
<?php
/**
 * Created by PhpStorm.
 * User: Martin Kozmelj
 * Date: 05-Jan-17
 * Time: 15:24
 */