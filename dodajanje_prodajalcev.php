<?php
include('navbar.php');
include ('dodaj_prodajalca_script.php');
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

	echo $navadmin;
	?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="h3" >Dodajanje prodajalca</h3>
            </div>
            <form name="ime" action="dodajanje.php" method="post">
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
                        <input type="password" name="pass2" placeholder="Vnesite geslo" required>
                    </label>
                    <?php if ($_GET['err'] == 1) { ?>
                        <p class="">Gesli se ne ujemata!</p>
                    <?php } ?>
                    <br>
                    <br>
                    <label>Vnesite elektronsko pošto:
                        <input type="email" name="mail" placeholder="Vnesite e-naslov" required>
                    </label>
                </div>
                <div class="panel-footer">
                    <input type="submit" name="dodaj1" class="btn btn-success btn-lg" value="Dodaj"/>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
