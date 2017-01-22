<?php
include('artikel.php');
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
<?php echo $navadmin; ?>
<div class="container">
    <?php
    while($result = mysqli_fetch_array($select_articles, MYSQLI_ASSOC)){?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="h2" ><?php echo $result['Naziv']?></h2>
                <a href="urejanje_izdelka.php?id=<?php echo $result['idArtikla']?>" class="btn btn-success btn-lg" style="float: right; margin-top: -50px;">Uredi</a>
            </div>
            <div class="panel-body">
                <p1 class="h5"><?php echo $result['Opis']?></p1>
            </div>
            <div class="panel-footer">
                <p1 class="h3 text-danger pull-right" style="padding-left: 50px;"><?php echo $result['Cena']." "?><span class="glyphicon-euro"></span></p1>
                <br><br>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center">
            <a href="dodajanje_izdelka.php">
                <img src="images/add_button.png" alt="button">
            </a>
        </div>
    </div>
</div>
</body>
</html>