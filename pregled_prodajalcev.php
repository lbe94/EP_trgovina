<?php
include('admin_script.php');
include('navbar.php');
if(!isset($_SESSION['idAdministratorja'])){
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
<?php 
echo $navadmin;

?>
<div class="container">
    <?php
    while($result = mysqli_fetch_array($select_sellers, MYSQLI_ASSOC)){?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="h3" ><?php echo $result['Ime']?> <?php echo $result['Priimek']?></h3>
                <a href="urejanje_prodajalca.php?id=<?php echo $result['idProdajalca']?>" class="btn btn-success btn-lg" style="float: right; margin-top: -50px;">Uredi</a>
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
            <a href="dodajanje_prodajalcev.php?err=0">
                <img src="images/add_button.png" alt="button">
            </a>
        </div>
    </div>
</div>
</body>
</html>

