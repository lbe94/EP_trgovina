<?php
include('index_session.php');
include ('dodaj_stranko_script.php');

$id = $_GET['id'];
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
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="prodajalec.php">E - trgovina</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="pregled_narocila.php">Naročila</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $name ?>
                        <span class="glyphicon glyphicon-user"></span></a>
                    <ul class="dropdown-menu col-md-10">
                        <a href="pregled_strank.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Stranke</a>
                        <a href="#" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moj profil</a>
                        <a href="logout.php" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%">Odjava</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="izbrisi.php?id=<?php echo $result['idArtikla'] ?>" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%; float:right; width: 10%">Izbrisi</a>
                <h3 class="h3" >Urejanje izdelka</h3>
            </div>
            <form name="ime" action="urejanje_izdelka_script.php?id=<?php echo $result['idArtikla'] ?>" method="post">
                <div class="panel-body" >
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
