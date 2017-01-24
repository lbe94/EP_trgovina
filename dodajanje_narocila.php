<?php
include('index_session.php');
include ('dodaj_stranko_script.php');
if(isset($_SESSION['idStranke'])){
    header("Location: login-staff.php");
}
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
            <li><a href="#">Naročila</a></li>
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
            <h3 class="h3" >Dodajanje naročila</h3>
        </div>
        <form action="dodajanje_narocila_script.php" method="post">
            <div class="panel-body" >
                <label>Vnesite ime:
                    <input type="name" name="name" placeholder="Vnesite ime" required>
                </label>
                <label style="margin-left: 20px;">Vnesite priimek:
                    <input type="name" name="sname" placeholder="Vnesite priimek" required>
                </label>
                <br>
                <br>
                <label>Vnesite geslo:
                    <input type="password" name="pass" placeholder="Vnesite geslo" required>
                </label>
                <label style="margin-left: 20px;">Ponovite geslo:
                    <input type="password" placeholder="Vnesite geslo" required>
                </label>
                <br>
                <br>
                <label>Vnesite elektronsko pošto:
                    <input type="email" name="mail" placeholder="Vnesite e-naslov" required>
                </label>
            </div>
            <div class="panel-footer">
                <input type="submit" name="dodaj" class="btn btn-success btn-lg" value="Dodaj"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>
