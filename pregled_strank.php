<?php

include('navbar.php');
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
else{echo $navprodajalec;}

?>
<div class="container">
    <?php
    while($result = mysqli_fetch_array($select_customers, MYSQLI_ASSOC)){?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="h3" ><?php echo $result['Ime']?> <?php echo $result['Priimek']?></h3>
                <form method="post" action="urejanje_stranke.php">
                    <input type="hidden" name="id" value="<?php echo $result['idStranke'] ?>">
                    <button class="btn btn-success btn-lg" style="float: right; margin-top: -50px;">Uredi</button>
                </form>
            </div>
            <div class="panel-body">
                <p1 class="h5">Elektronska pošta: <?php echo $result['Eposta']?></p1>
            </div>
            <div class="panel-footer">
                <p1 class="h5">Geslo: <?php echo $result['Geslo']?></p1>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center">
            <a href="dodajanje_stranke.php?err=0">
                <img src="images/add_button.png" alt="button">
            </a>
        </div>
    </div>
</div>
</body>
</html>
